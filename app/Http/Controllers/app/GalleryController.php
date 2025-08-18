<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\SectionHeading;
use App\Models\SiteInformation;
use App\Models\Testimonial;
use App\Models\HomeHeading;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }


    public function list()
    {
        
        $title = "Gallery List";
        $galleryList = Gallery::orderBy('sort_order')->get();
       // $heading = SectionHeading::type('testimonial')->first();
        $home_heading = HomeHeading::type('gallery')->first();

        return view('Admin.gallery.list', compact('galleryList', 'title','home_heading'));
    }

    public function create()
    {
        $key = "Create";
        $title = "Add Gallery";
        return view('Admin.gallery.form', compact('key', 'title'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
        ]);

        $gallery = new Gallery;

        $gallery->title=$validatedData['title'];
     

        $sort_order = Gallery::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $gallery->sort_order = $sort_number;

        if($gallery->save()){
            session()->flash('success', 'Gallery has been added successfully');
            return redirect(Helper::sitePrefix().'gallery');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Gallery";
        $gallery = Gallery::find($id);
        if($gallery){
            return view('Admin.gallery.form', compact('gallery','title','key'));
        }else{
            return view('app/errors/404');
        }
    }

    public function update(Request $request, $id)
    {
        $gallery =  Gallery::find($id);
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
  
        ]);


        $gallery->title=$validatedData['title'];
  
       
        $gallery->updated_at = date('Y-m-d h:i:s');

        if($gallery->save()){
            session()->flash('success', 'Gallery has been updated successfully');
            return redirect(Helper::sitePrefix().'gallery');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $gallery = Gallery::find($request->id);
            if($gallery){
           
                DB::beginTransaction();
                $deleted = $gallery->delete();
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

    public function gallery($gallery_id)
    {
        $gallery = Gallery::find($gallery_id);
        $title = " Gallery List - " . $gallery->title;
        $productGalleryList = GalleryImage::where('gallery_id', '=', $gallery_id)->get();
        return view('Admin.gallery.gallery.list', compact('productGalleryList', 'title', 'gallery_id'));
    }
    public function gallery_create($gallery_id)
    {
        $gallery = Gallery::find($gallery_id);
        $key = "Create";
        $title = "Add  Image  - " . $gallery->title;
        return view('Admin.gallery.gallery.form', compact('key', 'title', 'gallery_id'));
    }
    public function gallery_store_items(Request $request, $gallery_image, $gallery_gallery, $gallery, $sort_number)
    {
        $gallery_gallery->image_webp = Helper::uploadWebpImage($gallery_image, 'uploads/gallery/gallery/image/webp/', $gallery->short_url);
        $gallery_gallery->image = Helper::uploadFile($gallery_image, 'uploads/gallery/gallery/image/', $gallery->short_url);
       
        $gallery_gallery->gallery_id = $gallery->id;
        $gallery_gallery->image_attribute = $request->image_attribute;

        return $gallery_gallery;
    }
    public function gallery_store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'image_attribute' => 'required',
        ]);

        $gallery = Gallery::find($request->gallery_id);
 

        $sort_order = $gallery->activeGalleries->sortByDesc('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $added_images = $not_added_images = 0;
        
            foreach ($request->image as $gallery_image) {
                $gallery_gallery = new GalleryImage;
                $gallery_gallery = $this->gallery_store_items($request, $gallery_image, $gallery_gallery, $gallery, $sort_number);
                $gallery_gallery->sort_order = $sort_number;
                if ($gallery_gallery->save()) {
                    $added_images++;
                } else {
                    $not_added_images++;
                }
                $sort_number++;
            }
      
        
  

        if ($not_added_images == 0) {
            session()->flash('message', $added_images . " gallery images of Product '" . $gallery->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'gallery/gallery_image/' . $request->gallery_id);
        } else {
            return back()->with('message', 'Error while creating the product gallery');
        }
    }
    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $product_gallery = GalleryImage::find($request->id);
            if ($product_gallery) {
                if (File::exists(public_path($product_gallery->image))) {
                    File::delete(public_path($product_gallery->image));
                }
                if (File::exists(public_path($product_gallery->image_webp))) {
                    File::delete(public_path($product_gallery->image_webp));
                }
                if ($product_gallery->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    } 
    
    public function gallery_edit($id)
    {
        $key = "Update";
        $gallery_gallery = GalleryImage::find($id);
        $title = "Update Gallery Images - " . $gallery_gallery->gallery->title;
        if ($gallery_gallery) {
            $gallery_id = $gallery_gallery->gallery_id;
            $product_gallery=$gallery_gallery;
            return view('Admin.gallery.gallery.form', compact('key', 'gallery_gallery', 'title', 'gallery_id','product_gallery'));
        } else {
            return view('Admin.error.404');
        }
    }    
    public function gallery_update(Request $request, $id)
    {
        $product_gallery = GalleryImage::find($id);
        $product = Gallery::find($request->gallery_id);
        if ($request->hasFile('image')) {
            if (File::exists(public_path($product_gallery->image))) {
                File::delete(public_path($product_gallery->image));
            }
            if (File::exists(public_path($product_gallery->image_webp))) {
                File::delete(public_path($product_gallery->image_webp));
            }
            $product_gallery->image_webp = Helper::uploadWebpImage($request->image, 'uploads/gallery/gallery/image/webp/', $product->short_url);
            $product_gallery->image = Helper::uploadFile($request->image, 'uploads/gallery/gallery/image/', $product->short_url);
        }
   
        $product_gallery->gallery_id = $request->gallery_id;
        $product_gallery->image_attribute = $request->image_attribute;
        $product_gallery->updated_at = now();
        if ($product_gallery->save()) {
            session()->flash('message', "Gallery has been updated successfully");
            return redirect(Helper::sitePrefix() . 'gallery/gallery_image/' . $product->id);
        } else {
            return back()->with('message', 'Error while updating the gallery');
        }
    }
}
