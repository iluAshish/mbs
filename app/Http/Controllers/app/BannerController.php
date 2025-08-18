<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }

    public function banner($type)
    {
        $type = trim(ucfirst($type));
        $key = "Update";
        $title = "Update " . $type . ' Banner';
        $banner = Banner::where('type', $type)->first();
        return view('app.banner.banner_form', compact('key', 'title', 'banner', 'type'));
    }

    public function banner_store(Request $request)
    {

        $type_array = array('About', 'Blog', 'Services', 'Testimonials', 'Faq', 'Team', 'Certificate', 'Contact','Privacy-policy', 'Terms-conditions','All-rights-reserved','Portfolio','Products','Career');
        if (in_array($request->type, $type_array)) {
//            $val=$request->id? 'image|mimes:jpeg,png,jpg|max:512:': 'required|image|mimes:jpeg,png,jpg|max:512';

            $validatedData = $request->validate([
                'type' => 'required',
                'title' => 'nullable|min:2|max:255',

            ]);
            if ($request->id == 0) {
                $banner = new Banner;
            } else {
                $banner = Banner::find($request->id);
                $banner->updated_at = now();
            }
            if ($request->hasFile('image')) {
                Helper::deleteFile($banner, 'image');
                Helper::deleteFile($banner, 'webp_image');
                $banner->webp_image = Helper::uploadWebpImage($request->image, 'uploads/banner/'.$request->type.'/image/', 'home-about');
                $banner->image = Helper::uploadFile($request->image, 'uploads/banner/'.$request->type.'/image/', 'home-about');
            }

            $banner->title = $validatedData['title']??'null';
            $banner->sub_title = $request->sub_title;
            $banner->type = $validatedData['type'];
            $banner->image_attribute = $request->image_attribute;

            if ($banner->save()) {
                session()->flash('success', $request->type . ' banner has been updated successfully');
                return redirect(Helper::sitePrefix() . 'banner/' . strtolower($request->type));
            } else {
                return back()->with('error', 'Error while updating the ' . $request->type);
            }
        } else {
            abort(403, 'You are requested type ' . $request->type . ' does not exist');
        }
    }

    public function banner_delete(Request $request)
    {
        if ($request->type) {
            $typeData = explode('/', $request->type);
            $type = $typeData[0];
            $banner_webp = $typeData[1];
            $banner = Banner::where('type', $type)->first();
            $removalFile = $banner->$banner_webp;
            $banner->$banner_webp = NULL;
            if ($banner->save()) {
                if (File::exists($banner->banner)) {
                    File::delete($banner->banner);
                }
                if (File::exists($banner->webp_banner)) {
                    File::delete($banner->webp_banner);
                }
                if (File::exists($banner->mobile_banner)) {
                    File::delete($banner->mobile_banner);
                }
                if (File::exists($banner->mobile_webp_banner)) {
                    File::delete($banner->mobile_webp_banner);
                }
                return response()->json([
                    'status' => true,
                    'success' => 'File has been removed'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'success' => 'Unable to remove the file'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'success' => 'Unable to find the file'
            ]);
        }
    }
}
