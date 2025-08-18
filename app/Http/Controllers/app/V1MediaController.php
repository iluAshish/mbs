<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductBrands;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductSpecificationHead;
use App\Models\ProductSpecification;
use App\Http\Helpers\Helper;
use App\Models\Brands;
use App\Models\Media;
use App\Models\MediaGallery;
use App\Models\ProductBrandGallery;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class V1MediaController extends Controller
{
    public function index()
    {
        $medias = Media::active()->get();
    
        return view('app.media.list', compact('medias'));
    }

    public function media_create(Request $request){
        $key = "Create";
        $title = "Create Media";

        return view('app.media.form', compact('key', 'title'));
    }

    public function media_store(Request $request){
        // Validation will automatically redirect back with errors if validation fails.

        DB::beginTransaction();
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,
            svg|max:2048',
        ]);

        $media = new Media();

        if ($request->hasFile('image')) {
            $media->web_image = Helper::uploadWebpImage($request->image, 'uploads/media/image/webp/', $request->short_url);
            $media->image = Helper::uploadFile($request->image, 'uploads/media/image/', $request->short_url);
        }
        
        $media->title = ucfirst($validateData['title']);
        $media->short_url = $request->short_url;


        $media->description = $request->description ?? '';

        $media->image_attribute = $request->image_attribute ?? '';

        $meta_title = $request->meta_title ?? '';
        $meta_description = $request->meta_description ?? '';
        $meta_keyword = $request->meta_keyword ?? '';
        $other_meta_tag = $request->other_meta_tag ?? '';

        if ($meta_title == '') {
            $media->meta_title = strtoupper($validateData['title']);
        } else {
            $media->meta_title = $request->meta_title ?? '';
        }
        if ($meta_description == '') {
            $media->meta_description = strtoupper($validateData['title']);
        } else {
            $media->meta_description = $request->meta_description ?? '';
        }
        if ($meta_keyword == '') {
            $media->meta_keyword = strtoupper($validateData['title']);
        } else {
            $media->meta_keyword = $request->meta_keyword ?? '';
        }
        if ($other_meta_tag == '') {
            $media->other_meta_tag = strtoupper($validateData['title']);
        } else {
            $media->other_meta_tag = $request->other_meta_tag ?? '';
        }

        $sort_order = media::orderBy('sort_order', 'DESC')->first();

        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $media->sort_order = $sort_number;

        if ($media->save()) {
            session()->flash('success', "medias '" . $media->title . "' has been added successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'media');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the media");
        }
        
    }

    public function media_edit($id){
        $key = "Update";
        $title = "Update Media";
        $media = Media::find($id);
        if ($media) {
            return view('app.media.form', compact('key', 'title', 'media'));
        } else {
            return view('app.error.404');
        }
    }

    public function media_update(Request $request, $id){

        DB::beginTransaction();

        $media = Media::find($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,
            svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if (File::exists(public_path($media->image))) {
                File::delete(public_path($media->image));
            }
            if (File::exists(public_path($media->web_image))) {
                File::delete(public_path($media->web_image));
            }
            $media->web_image = Helper::uploadWebpImage($request->image, 'uploads/media/image/webp/', $request->short_url);
            $media->image = Helper::uploadFile($request->image, 'uploads/media/image/', $request->short_url);
        }

        $media->title = ucfirst($validatedData['title']);
        $media->short_url = $request->short_url ?? '';
  

        $media->image_attribute = $request->image_attribute ?? '';

        $media->description = $request->description ?? '';

        // //    $media->description = $validatedData['description'];
        // $media->thumbnail_image_attribute = $request->thumbnail_image_attribute ?? '';

        $meta_title = $request->meta_title ?? '';
        $meta_description = $request->meta_description ?? '';
        $meta_keyword = $request->meta_keyword ?? '';
        $other_meta_tag = $request->other_meta_tag ?? '';

        if ($meta_title == '') {
            $media->meta_title = strtoupper($validatedData['title']);
        } else {
            $media->meta_title = $request->meta_title ?? '';
        }
        if ($meta_description == '') {
            $media->meta_description = strtoupper($validatedData['title']);
        } else {
            $media->meta_description = $request->meta_description ?? '';
        }
        if ($meta_keyword == '') {
            $media->meta_keyword = strtoupper($validatedData['title']);
        } else {
            $media->meta_keyword = $request->meta_keyword ?? '';
        }
        if ($other_meta_tag == '') {
            $media->other_meta_tag = strtoupper($validatedData['title']);
        } else {
            $media->other_meta_tag = $request->other_meta_tag ?? '';
        }
        $media->updated_at = now();
        if ($media->save()) {
            session()->flash('success', "media '" . $media->title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'media');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the media");
        }
    }

    public function delete_media(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $media = Media::find($request->id);
            if ($media) {
                if (File::exists(public_path($media->image))) {
                    File::delete(public_path($media->image));
                }
                if (File::exists(public_path($media->web_image))) {
                    File::delete(public_path($media->web_image));
                }
                if ($media->delete()) {
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

    public function gallery($media_id)
    {
        $mediaData  = Media::find($media_id);
        $title = " Gallery List - " . $mediaData->title;
        $mediaGalleryList = MediaGallery::where('media_id', '=', $media_id)->get();
        return view('app.media.gallery.list', compact('mediaGalleryList', 'title', 'media_id','mediaData'));
    }

    public function gallery_create($media_id)
    {
        $mediaData = Media::find($media_id);
        $key = "Create";
        $title = "Create Media Gallery  - " . $mediaData->title;
        return view('app.media.gallery.form', compact('key', 'title', 'media_id','mediaData'));
    }

    public function gallery_store(Request $request)
    {
        // dd("i am here", $request);
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'image_attribute' => 'required',
        ]);

        $media = Media::find($request->media_id);
        $sort_order = $media->activeGalleries;
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $added_images = $not_added_images = 0;
        if ($request->media_type == "Image") {
            foreach ($request->image as $gallery_image) {
                $media_gallery = new MediaGallery();
                $media_gallery = $this->gallery_store_items($request, $gallery_image, $media_gallery, $media, $sort_number);
                $media_gallery->sort_order = $sort_number;
                if ($media_gallery->save()) {
                    $added_images++;
                } else {
                    $not_added_images++;
                }
                $sort_number++;
            }
        } else {
            $media_gallery = new MediaGallery;
            $gallery_image = $request->image;
            $media_gallery = $this->gallery_store_items($request, $gallery_image, $media_gallery, $media, $sort_number);
            $media_gallery->sort_order = $sort_number;
            if ($media_gallery->save()) {
                $added_images++;
            } else {
                $not_added_images++;
            }
        }

        if ($not_added_images == 0) {
            session()->flash('message', $added_images . " gallery images of media '" . $media->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'medias/gallery/' . $request->media_id);
        } else {
            return back()->with('message', 'Error while creating the media gallery');
        }
    }

    public function gallery_store_items(Request $request, $gallery_image, $media_gallery, $media, $sort_number)
    {
        $media_gallery->image_webp = Helper::uploadWebpImage($gallery_image, 'uploads/medias/gallery/image/webp/', $media->short_url);
        $media_gallery->image = Helper::uploadFile($gallery_image, 'uploads/medias/gallery/image/', $media->short_url);
        $media_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $media_gallery->video_url = $request->video_url;
        }
        $media_gallery->media_id = $media->id;
        $media_gallery->image_attribute = $request->image_attribute;

        return $media_gallery;
    }

    public function gallery_edit($id)
    {
        $key = "Update";
        $media_gallery = MediaGallery::find($id);
        $title = "Update Media Gallery";
        if ($media_gallery) {
            $media_id = $media_gallery->media_id;
            $mediaData = Media::find($media_id);
            return view('app.media.gallery.form', compact('key', 'media_gallery', 'title', 'media_id','mediaData'));
        } else {
            return view('app.error.404');
        }
    }

    public function gallery_update(Request $request, $id)
    {
        $media_gallery = MediaGallery::find($id);
        $media = Media::find($request->media_id);
        if ($request->hasFile('image')) {
            if (File::exists(public_path($media_gallery->image))) {
                File::delete(public_path($media_gallery->image));
            }
            if (File::exists(public_path($media_gallery->image_webp))) {
                File::delete(public_path($media_gallery->image_webp));
            }
            $media_gallery->image_webp = Helper::uploadWebpImage($request->image, 'uploads/medias/gallery/image/webp/', $media->short_url);
            $media_gallery->image = Helper::uploadFile($request->image, 'uploads/medias/gallery/image/', $media->short_url);
        }
        $media_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $media_gallery->video_url = $request->video_url;
        }
        $media_gallery->media_id = $request->media_id;
        $media_gallery->image_attribute = $request->image_attribute;
        $media_gallery->updated_at = now();
        if ($media_gallery->save()) {
            session()->flash('message', "media gallery has been updated successfully");
            return redirect(Helper::sitePrefix() . 'media/gallery/' . $media->id);
        } else {
            return back()->with('message', 'Error while updating the gallery');
        }
    }

    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $media_gallery = MediaGallery::find($request->id);
            if ($media_gallery) {
                if (File::exists(public_path($media_gallery->image))) {
                    File::delete(public_path($media_gallery->image));
                }
                if (File::exists(public_path($media_gallery->image_webp))) {
                    File::delete(public_path($media_gallery->image_webp));
                }
                if ($media_gallery->delete()) {
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
}