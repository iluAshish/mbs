<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }



    public function about_us()
    {
        $key = "Update";
        $title = "About Us";
        $about = AboutUs::first();
        return view('app.about.about_us_form', compact('key', 'title', 'about'));
    }

    public function about_us_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:230',
            'description' => 'nullable|min:2',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'image_attribute' => 'nullable|min:2|max:230',
        ]);

        if ($request->id == 0) {
            $about = new AboutUs;
        } else {
            $about = AboutUs::find($request->id);
            $about->updated_at = now();
        }
        
        if ($request->hasFile('image')) {
            if ($about->image) {
                Helper::deleteFile($about, 'image');
            }
            if ($about->webp_image) {
                Helper::deleteFile($about, 'webp_image');
            }
            $about->webp_image = Helper::uploadWebpImage($request->image, 'uploads/about-us/image/', 'about');
            $about->image = Helper::uploadFile($request->image, 'uploads/about-us/image/', 'about');
        }

        if($request->hasFile('mission_vision_image')) {
            if($about->mission_vision_image) {
                Helper::deleteFile($about, 'mission_vision_image');
            }

            if($about->mission_vision_web_image) {
                Helper::deleteFile($about, 'mission_vision_web_image');
            }

            $about->mission_vision_web_image = Helper::uploadWebpImage($request->mission_vision_image, 'uploads/about-us/image/', 'about');

            $about->mission_vision_image = Helper::uploadFile($request->mission_vision_image, 'uploads/about-us/image/', 'about');
        }
        

        if($request->hasFile('core_value_image')){
            if($about->core_value_image) {
                Helper::deleteFile($about, 'core_value_image');
            }

            if($about->core_value_web_image) {
                Helper::deleteFile($about, 'core_value_web_image');
            }

            $about->core_value_web_image = Helper::uploadWebpImage($request->core_value_image, 'uploads/about-us/image/', 'about');

            $about->core_value_image = Helper::uploadFile($request->core_value_image, 'uploads/about-us/image/', 'about');
           
        }

        if($request->hasFile('ceo_image')){
            if($about->ceo_image) {
                Helper::deleteFile($about, 'ceo_image');
            }

            if($about->ceo_web_image) {
                Helper::deleteFile($about, 'ceo_web_image');
            }

            $about->ceo_web_image = Helper::uploadWebpImage($request->ceo_image, 'uploads/about-us/image/', 'about');

            $about->ceo_image = Helper::uploadFile($request->ceo_image, 'uploads/about-us/image/', 'about');
           
        }

        if($request->hasFile('legacy_image')){
            if($about->legacy_image) {
                Helper::deleteFile($about, 'legacy_image');
            }
            if($about->legacy_web_image) {
                Helper::deleteFile($about, 'legacy_web_image');
            }
            
            $about->legacy_web_image = Helper::uploadWebpImage($request->legacy_image, 'uploads/about-us/image/', 'about');
            $about->legacy_image = Helper::uploadFile($request->legacy_image, 'uploads/about-us/image/', 'about');
        }

        if($request->hasFile('reginal_image')){

            if($about->regional_image) {
                Helper::deleteFile($about, 'reginal_image');
            }
            if($about->regional_web_image) {
                Helper::deleteFile($about, 'regional_web_image');
            }
            
            $about->regional_web_image = Helper::uploadWebpImage($request->reginal_image, 'uploads/about-us/image/', 'about');
            $about->regional_image = Helper::uploadFile($request->reginal_image, 'uploads/about-us/image/', 'about');
        }

        if($request->hasFile('alternate_image')) {
            if($about->alternate_image) {
                Helper::deleteFile($about, 'alternate_image');
            }
            if($about->alternate_web_image) {
                Helper::deleteFile($about, 'alternate_web_image');
            }
            
            $about->alternate_web_image = Helper::uploadWebpImage($request->alternate_image, 'uploads/about-us/image/', 'about');
            $about->alternate_image = Helper::uploadFile($request->alternate_image, 'uploads/about-us/image/', 'about');
        }

        if($request->hasFile('alternate_image')) {
            if($about->alternate_image) {
                Helper::deleteFile($about, 'alternate_image');
            }
            if($about->alternate_web_image) {
                Helper::deleteFile($about, 'alternate_web_image');
            }
            
            $about->alternate_web_image = Helper::uploadWebpImage($request->alternate_image, 'uploads/about-us/image/', 'about');
            $about->alternate_image = Helper::uploadFile($request->alternate_image, 'uploads/about-us/image/', 'about');
        }

        $about->ceo_message_description = $request->ceo_description ?? '';
        $about->ceo_image_alt = $request->ceo_image_attribute ?? '';

        $about->mission_vision_image_attribute = $request->mission_vision_image_attribute ?? '';

        $about->core_value_image_attribute = $request->core_value_image_attribute ?? '';
        $about->core_value_description = $request->core_value_description ?? '';

        $about->legacy_description = $request->legacy_description ?? '';
        $about->legacy_image_attribute = $request->legacy_image_attribute ?? '';

        $about->regional_description = $request->regional_description ?? '';
        $about->regional_image_attribute = $request->regional_image_attribute ?? '';

        $about->designation = $request->designation ?? '';
        $about->ceo_name = $request->ceo_name ?? '';

        $about->ceo_image_alt = $request->ceo_image_attribute ?? '';


        $about->title = $request->title ?? '';
        $about->sub_title = $request->sub_title ?? '';
        $about->short_description = $request->short_description ?? '';
        
        $about->vision_title = $request->vision_title ?? '';
        $about->mission_title = $request->mission_title ?? '';
        $about->vision_description = $request->vision_description ?? '';
        $about->mission_description = $request->mission_description ?? '';
        $about->description = $request->description ?? '';
        $about->alternate_description = $request->alternate_description ?? '';
        $about->image_attribute = $request->image_attribute ?? '';
        if ($about->save()) {
            session()->flash('success', 'About Us content has been updated successfully');
            return redirect(Helper::sitePrefix() . 'about-us');
        } else {
            return back()->with('error', 'Error while updating the about content');
        }
    }
}
