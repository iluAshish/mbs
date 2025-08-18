<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\SectionHeading;
use App\Models\Testimonial;
use App\Models\Associate;
use App\Models\GroupCompanies;
use App\Models\siteimages;
use App\Models\home_footer_section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class GroupCompaniesController extends Controller
{
    //

    public function list()
    {
        $title = "Group Companies List";
        $associateList = GroupCompanies::orderBy('sort_order')->get();
        
        return view('app.home.group-companies.list', compact('associateList', 'title'));
    }

    public function create()
    {
        $key = "Create";
        $title = "Add Client";
        return view('app.home.group-companies.form', compact('key', 'title'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:512',
            'image_meta_tag'=>'nullable|min:2|max:225',
        ]);
        $clss=GroupCompanies::latest()->first();
        if($clss)
        {
         $clssname=$clss->class;   
        }
        else
        {
           $addclss='clientSliderOne';  
           $clssname=''; 
        }
        

        if($clssname == 'clientSliderOne' || $clssname == 'clientSliderTwo')
        {
            $addclss='clientSliderThree';
        }
                elseif($clssname == 'clientSliderTwo' || $clssname == 'clientSliderThree')
        {
           $addclss='clientSliderOne'; 
        }
                elseif($clssname == 'clientSliderOne' || $clssname == 'clientSliderThree')
        {
            $addclss='clientSliderTwo';
        }
        else
        {
            $addclss='clientSliderTwo';
        }
        $associate = new GroupCompanies;

        if ($request->hasFile('image')) {
            $associate->image_webp = Helper::uploadWebpImage($request->image, 'uploads/group-companies/image/', 'group_companies');
            $associate->image = Helper::uploadFile($request->image, 'uploads/group-companies/image/', 'group_companies');
        }
        
        $associate->title=$validatedData['title'];
     
        $sort_order = GroupCompanies::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $associate->sort_order = $sort_number;
        $associate->image_attribute = $request->image_attribute??'';
        

        if($associate->save()){
            session()->flash('success', 'Clients has been added successfully');
            return redirect(Helper::sitePrefix().'home/clients');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Group Companies";
        $associate = GroupCompanies::find($id);
        if($associate){
            return view('app.home.group-companies.form', compact('associate','title','key'));
        }else{
            return view('app/errors/404');
        }
    }

    public function update(Request $request, $id)
    {
        $associate =  GroupCompanies::find($id);
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:512',
            'image_meta_tag'=>'nullable|min:2|max:225',
        ]);

        if ($request->hasFile('image')) {
            $associate->image_webp = Helper::uploadWebpImage($request->image, 'uploads/group-companies/image/', 'group_companies');
            $associate->image = Helper::uploadFile($request->image, 'uploads/group-companies/image/', 'group_companies');
        }

        $associate->title=$validatedData['title'];

        $associate->updated_at = date('Y-m-d h:i:s');
        $associate->image_attribute = $request->image_attribute??'';

        if($associate->save()){
            session()->flash('success', 'Group companies has been updated successfully');
            return redirect(Helper::sitePrefix().'home/clients');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $associate = GroupCompanies::find($request->id);
            if($associate){
                Helper::deleteFile($associate, 'image');
                Helper::deleteFile($associate, 'image_webp');
                DB::beginTransaction();
                $deleted = $associate->delete();
                if($deleted==true){
                    DB::commit();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
        } 
    }
        public function image()
    {
        $key = "Add";
        $keyfeature = siteimages::where('section','clients')->first();
        $title = "Add Image";
        $footersec= home_footer_section::find(1);
        return view('app.home.group-companies.image', compact('key', 'title','keyfeature','footersec'));
    }
    public function create_image(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:255',
            
        ]);

         $footersec= home_footer_section::find(1);
         if($footersec)
         {

         }
         else
         {
            $footersec= new home_footer_section();
         }
        if ($request->hasFile('image')) {
          
            $footersec->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/footersection/webp_image/', 'key_feature_image');
            $footersec->image = Helper::uploadFile($request->image, 'uploads/home/footersection/image/', 'key_feature_image');
        }
        if ($request->hasFile('iconimage')) {
            $footersec->icon_webp_image = Helper::uploadWebpImage($request->iconimage, 'uploads/home/footersec/webp_image/', 'key_feature_image');
            $footersec->icon_image = Helper::uploadFile($request->iconimage, 'uploads/home/footersec/image/', 'key_feature_image');
        }
        
       
        $footersec->title=$request->title;
        $footersec->text=$request->text;
        $footersec->phone=$request->phone;
        $footersec->button_text=$request->button_text;
        $footersec->button_url=$request->button_url;
       
        
        if ($footersec->save()) {
            session()->flash('success', 'Content updated successfully');
            return redirect(Helper::sitePrefix() . 'home/footersection');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }
}
