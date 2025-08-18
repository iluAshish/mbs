<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\SectionHeading;
use App\Models\Testimonial;
use App\Models\ServiceTestimoialsConnect;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    //

    public function list()
    {
        $title = "Testimonial List";
        $testimonials = Testimonial::get();

        return view('app.home.testimonial.list', compact( 'title','testimonials'));
    }

    public function create()
    {
        $key = "Create";
        $type = "create";
        $title = "Add Testimonial";
        $testimonials = Testimonial::active()->get();
        return view('app.home.testimonial.form', compact('key', 'title','type','testimonials'));
    }


    public function store(Request $request)
    {
        // var_dump($request);
        $validatedData = $request->validate([
            'author_name'=>'required|min:2|max:60',
            'message'=>'required|min:2',
            'designation'=>'required|min:2',
        ]);



        $testimonial = new Testimonial;

        $testimonial->name=$validatedData['author_name'];
        $testimonial->designation=$request->designation;
       $testimonial->location=$request->title;
        $testimonial->video_url=$request->video_url??'';
        $testimonial->message=$validatedData['message'];
        $testimonial->rating=$request->rating??1;
        $testimonial->review_type=$request->review_type??'Normal';
        $testimonial->image_attribute = $request->image_meta_tag??'';
        $testimonial->author_image_attribute = $request->author_image_attribute??'';

        if ($request->hasFile('author_image')) {
            $testimonial->author_image_webp = Helper::uploadWebpImage($request->author_image, 'uploads/home/testimonial/webp_image/', 'testimonial');
            $testimonial->author_image = Helper::uploadFile($request->author_image, 'uploads/home/testimonial/image/', 'testimonial');
        }

        $testimonial->service_id = null;
        $testimonial->connectid = null;
        $sort_order = Testimonial::active()->orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $testimonial->sort_order = $sort_number;
        $testimonial->save();

        if($testimonial->save()){
            session()->flash('success', 'Testimonial has been added successfully');
            return redirect(Helper::sitePrefix().'home/testimonial');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Testimonial";
        $type = "create";

        $testimonial = Testimonial::find($id);
        if($testimonial){
            return view('app.home.testimonial.form', compact('testimonial','title','key','type'));
        }else{
            return view('app/errors/404');
        }

    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'author_name'=>'required|min:2|max:60',
            'message'=>'required|min:2',
            'designation'=>'required|min:2',
        ]);
            $testimonial = Testimonial::find($id);

            $testimonial->webp_image = null;
            $testimonial->image = null;
            $testimonial->author_image_webp = null;
            $testimonial->author_image = null;
            $testimonial->name=$validatedData['author_name'];
            $testimonial->designation=$request->designation;
            $testimonial->location=$request->title;
            $testimonial->video_url=$request->video_url;
            $testimonial->message=$validatedData['message'];

            if ($request->hasFile('author_image')) {
                $testimonial->author_image_webp = Helper::uploadWebpImage($request->author_image, 'uploads/home/testimonial/webp_image/', 'testimonial');
                $testimonial->author_image = Helper::uploadFile($request->author_image, 'uploads/home/testimonial/image/', 'testimonial');
            }

            $testimonial->rating=$request->rating??1;
            $testimonial->review_type=$request->review_type??'Normal';
            $testimonial->image_attribute = $request->image_meta_tag??'';
            $testimonial->author_image_attribute = $request->author_image_attribute??'';
            $testimonial->updated_at = date('Y-m-d h:i:s');
            $testimonial->save();

        if($testimonial->save()){
            session()->flash('success', 'Testimonial has been updated successfully');
            return redirect(Helper::sitePrefix().'home/testimonial');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete(Request $request){

       if (isset($request->id) && $request->id != null) {
           $testimonial = Testimonial::find($request->id);
           if ($testimonial->delete()) {
               $deleted = $testimonial->delete();
               if ($deleted == true) {
                   echo(json_encode(array('status' => true)));
               } else {
                   echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
               }
           } else {
               echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
           }
       } else {
           echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
       }

    }
}
