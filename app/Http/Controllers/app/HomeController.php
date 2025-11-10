<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\HomeAboutUs;
use App\Models\HomeBanner;
use App\Models\HomeVideoBanner;
use App\Models\slider; 
use App\Models\WhyChooseUs;
use App\Models\HomeOurService;
use App\Models\SectionHeading;
use App\Models\Testimonial;
use App\Models\KeyFeature;
use App\Models\HowWeCanHelp;
use App\Models\siteimages;
use App\Models\Blog;
use App\Models\CommonContent;
use App\Models\Feature;
use App\Models\ServiceFaq;
use App\Models\PortfolioGallery;
use App\Models\Subscriber;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PHPUnit\TextUI\Help;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }


    public function dashboard()
    {
        $title = "Dashboard";
        return view('app.landing', compact('title'));
    }

    public function slider_list()
    {
        $title = "Slider List";
        $sliderList = HomeBanner::where('deleted_at',NULL)->get();
        return view('app.home.slider.slider_list', compact('sliderList', 'title'));
    }

    public function slider_create()
    {
        $key = "Create";
        $title = "Create Slider";
        return view('app.home.slider.slider_form', compact('key', 'title'));
    }

    public function slider_store(Request $request)
    {
        $validatedData = $request->validate([
            // 'title' => 'required|min:2|max:200',
            // 'sub_title' => 'required|min:2|max:200',
            // 'image' => 'image|mimes:jpeg,png,jpg,svg|max:2024',
            'image_attribute' => 'nullable|min:2',
            'button_url' => 'nullable|min:2',
            // 'button_text' => 'nullable|min:2',
        ]);
        $slider = new HomeBanner;
        if ($request->hasFile('image')) {
            $slider->image_webp = Helper::uploadWebpImage($request->image, 'uploads/home/slider/image/', 'home-slider');
            $slider->image = Helper::uploadFile($request->image, 'uploads/home/slider/image/', 'home-slider');
        }
        if ($request->hasFile('bg_image')) {
            $slider->bg_image_webp = Helper::uploadWebpImage($request->bg_image, 'uploads/home/slider/bg_image/', 'home-slider');
            $slider->bg_image = Helper::uploadFile($request->bg_image, 'uploads/home/slider/bg_image/', 'home-slider');
        }
        $active_count = HomeBanner::where('status', 'Active')->where('deleted_at',NULL)->count();
        if($active_count > 2){
            $slider->status = 'InActive';
            
        }else{
            $slider->status = 'Active';
        }
        
        $sort_order = HomeBanner::orderBy('sort_order', 'DESC')->first();
        
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $slider->title = $request->title ?? '';
        
        $slider->sub_title = $request->sub_title ?? '';
        $slider->image_title = $request->image_title ?? '';
        $slider->image_attribute = $request->image_attribute ?? '';
        $slider->button_url = ($request->button_url) ?? '';
        $slider->button_txt = ($request->button_text) ?? '';
        $slider->sort_order = $sort_number;
        if ($slider->save()) {
            session()->flash('success', "'Slider' has been added successfully");
            return redirect(Helper::sitePrefix() . 'home/slider');
        } else {
            return back()->withInput($request->input())->withErrors("Error while adding the content");
        }
    }

    public function slider_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Edit Slider";
        $slider = HomeBanner::find($id);
        if ($slider) {
            return view(
                'app.home.slider.slider_form',
                compact('key', 'slider', 'title')
            );
        } else {
            return view('app.errors.404');
        }
    }

    public function slider_update(Request $request, $id)
    {
        $slider = HomeBanner::find($id);
        $validatedData = $request->validate([
            // 'title' => 'required|min:2|max:200',
            // 'sub_title' => 'required|min:2|max:200',
            // 'image' => 'image|mimes:jpeg,png,jpg,svg|max:2024',
            'image_attribute' => 'nullable|min:2',
            'button_url' => 'nullable|min:2',
            'button_text' => 'nullable|min:2',
        ]);

        if ($request->hasFile('image')) {
            File::delete(public_path($slider->image));
            File::delete(public_path($slider->image_webp));
            $slider->image_webp = Helper::uploadWebpImage($request->image, 'uploads/home/slider/webp_image/', 'home-slider');
            $slider->image = Helper::uploadFile($request->image, 'uploads/home/slider/image/', 'home-slider');
        }
        if ($request->hasFile('bg_image')) {
            File::delete(public_path($slider->bg_image));
            File::delete(public_path($slider->bg_image_webp));
            $slider->bg_image_webp = Helper::uploadWebpImage($request->bg_image, 'uploads/home/slider/bg_image/', 'home-slider');
            $slider->bg_image = Helper::uploadFile($request->bg_image, 'uploads/home/slider/bg_image/', 'home-slider');
        }
        $slider->title = $request->title ?? '';
        $slider->sub_title = $request->sub_title ?? '';
        $slider->image_attribute = $request->image_attribute ?? '';
        $slider->button_url = ($request->button_url) ?? '';
        $slider->button_txt = ($request->button_text) ?? '';

        if ($slider->save()) {
            session()->flash('success', "'Slider' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'home/slider');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_slider(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $slider = HomeBanner::find($request->id);
            if ($slider) {
                $slider->sort_order = null;
                $slider->save();
                File::delete($slider->image);
                File::delete($slider->image_webp);

                $deleted = $slider->delete();
                if ($deleted == true) {
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
    
    public function home_about_us()
    {
        $key = "Update";
        $title = "About";
        $about = HomeAboutUs::first();
        return view('app.home.home_about_us_form', compact('key', 'title', 'about'));
    }

    public function home_about_us_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:225',
            'sub_title' => 'required|min:2|max:50',
            'short_description' => 'required|min:2',
            //'image' => 'image|mimes:jpeg,png,jpg,jpeg|max:512',
            'image_attribute' => 'nullable|min:5',
            'button_text' => 'nullable|min:2',
        ]);

        if ($request->id == 0) {
            $about = new HomeAboutUs;
        } else {
            $about = HomeAboutUs::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('image')) {
            Helper::deleteFile($about, 'image');
            Helper::deleteFile($about, 'webp_image');
            $about->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/about/image/', 'home-about');
            $about->image = Helper::uploadFile($request->image, 'uploads/home/about/image/', 'home-about');
        }
       
    
        $about->title = $request->title ?? '';
        $about->sub_title = $request->sub_title ?? '';
        $about->short_description = $request->short_description ?? '';
        $about->image_attribute = $request->image_attribute ?? '';
        $about->button_text = $request->button_text ?? '';
        $about->button_url = $request->button_url ?? '';
        $about->years_of_experience = $request->years_of_experience ?? '';
        if ($about->save()) {
            session()->flash('success', 'Home-About Us content has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/about-us');
        } else {
            return back()->with('error', 'Error while updating the home-about content');
        }
    }

    public function common_content(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|min:2|max:225',
            'content_description' => 'required|min:2',
        ]);
        // dd($request);

        if ($request->id == 0) {
            $common_contant = new CommonContent();
        } else {
            $common_contant = CommonContent::find($request->id);
            $common_contant->updated_at = date('Y-m-d h:i:s');
        }
       
    
        $common_contant->type = $request->type ?? '';
        $common_contant->content_description = $request->content_description ?? '';
        if ($common_contant->save()) {
            return back()->with('success', 'Content has been updated successfully');
        } else {
            return back()->with('error', 'Error while updating the home-about content');
        }
    }
    
    public function homevideobanner()
    {
        $key = "Update";
        $title = "About";
        $video_banner = HomeVideoBanner::first();
        return view('app.home.homevideobanner_form', compact('key', 'title', 'video_banner'));
    }

    public function homevideobanner_store(Request $request)
    {
        $validatedData = $request->validate([
            // 'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:100240', // Adjust the maximum file size for videos as needed
            'button_text' => 'nullable|min:2',
        ]);
        
        $video_banner = ($request->id == 0) ? new HomeVideoBanner : HomeVideoBanner::find($request->id);
        
        // if ($request->hasFile('image')) {
        //     Helper::deleteFile($video_banner, 'image');
            
        //     $video_banner->image = Helper::uploadFile($request->file('image'), 'uploads/home/image/', 'image');
        // }
        
        if ($request->hasFile('video')) {
            Helper::deleteFile($video_banner, 'video');
            
            // Handle video upload logic here, similar to image upload logic
            $video_banner->video = Helper::uploadFile($request->file('video'), 'uploads/home/videos/', 'video');
        }
        
        $video_banner->title = $request->title ?? '';
        $video_banner->sub_title = $request->sub_title ?? '';
        $video_banner->short_description = $request->short_description ?? '';
        $video_banner->button_text = $request->button_text ?? '';
        $video_banner->button_url = $request->button_url ?? '';
        
        if ($video_banner->save()) {
            session()->flash('success', 'Home Video Banner has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/home-video-banner');
        } else {
            return back()->with('error', 'Error while updating the video banner content');
        }
    }

    // Home How can we help
    public function how_we_can_help()
    {
        $key = "Update";
        $title = "How can we help";
        $how_we_can_help = HowWeCanHelp::first();
        return view('app.home.how_we_can_help_form', compact('key', 'title', 'how_we_can_help'));
    }

    public function how_we_can_help_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:225',
            'description' => 'required|min:2',
        ]);

        if ($request->id == 0) {
            $about = new HowWeCanHelp;
        } else {
            $about = HowWeCanHelp::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }

        
        $about->title = $request->title ?? '';
        $about->description = $request->description ?? '';
        $about->button_text = $request->button_text ?? '';
        $about->button_url = $request->button_url ?? '';
        if ($about->save()) {
            session()->flash('success', 'Home-How can we help content has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/how-we-can-help');
        } else {
            return back()->with('error', 'Error while updating the Home-How can we help content');
        }
    }
    // Home How can we help
    // Home Get in touch in footer
    public function home_why_choose_us()
    {
        
        $key = "Create";
        $title = "Why Choose Us";
        return view('app.home.why_choose_us_form', compact('key', 'title'));
    }
    public function home_why_choose_us_edit($id)
    {
        
        $key = "Update";
        $title = "Why Choose Us";
        $why_choose_us = WhyChooseUs::find($id);
        return view('app.home.why_choose_us_form', compact('key', 'title', 'why_choose_us'));
    }

    public function delete_why_choose_us(Request $request)
    {
        
        $request->validate([
            'id' => 'required|integer|exists:why_choose_us,id'
        ]);

        $record = WhyChooseUs::find($request->id);
        $record->delete();

        return response()->json(['status' => true, 'message' => 'Deleted successfully']);

    }

    

    public function home_why_choose_us_index()
    {
        
        $key = "List";
        $title = "Why Choose Us";
        $why_choose_us_list = WhyChooseUs::get();
        $content = CommonContent::where('type','why_choose_us')->first();
        // dd('list',$why_choose_us_list);
        return view('app.home.why_choose_us_index', compact('key', 'title', 'why_choose_us_list','content'));
    }

    public function home_why_choose_us_store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|min:2|max:225',
            'description' => 'required|min:2',
        ]);

        if($validatedData['title'] == '' || $validatedData['description'] == '') {
            return back()->with('error', 'Title and Description are required fields.');
        }

        if ($request->id == 0) {
            $about = new WhyChooseUs;
        } else {
            $about = WhyChooseUs::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }
      
        if ($request->hasFile('image')) {
                
            File::delete(public_path($about->image));
            File::delete(public_path($about->webp_image));
            $about->webp_image = Helper::uploadWebpImage($request->image, 'uploads/imk/webp_image/','managers');
            $about->image = Helper::uploadFile($request->image, 'uploads/imk/image/','managers');
        }  
        $about->title = $request->title ?? '';
        $about->subtitle = $request->subtitle ?? '';
        $about->description = $request->description ?? '';
        if ($about->save()) {
            session()->flash('success', 'Home-Why Choose us content has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/why-choose-us-index');
        } else {
            return back()->with('error', 'Error while updating the Home-why-choose-us content');
        }
    }
    // Home Get in touch in footer

    public function sort_order(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $table = $request->table;
            $appPrefix = 'App';
            $model = $appPrefix . '\\Models\\' . $table;
            //            if ($request->extra != NULL) {
            //                $sortOrder = $model::where([['sort_order', '=', $request->sort_order], [$request->extra, '=', $request->extra_key], ['id', '!=', $request->id]])->count();
            //            } else {
            //                $sortOrder = $model::where([['sort_order', '=', $request->sort_order], ['id', '!=', $request->id]])->count();
            //            }
            //            if ($sortOrder) {
            //                return response()->json(['status' => false, 'message' => 'Sort order "' . $request->sort_order . '" has been already taken']);
            //            } else {
            $data = $model::find($request->id);
        
            $data->sort_order = $request->sort_order;
            if ($data->save()) {
                return response()->json(['status' => true, 'message' => 'Sort order updated successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Error while updating the sort order']);
            }
            //            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function status_change(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        $field = $request->field ?? 'status';
        $limit = $request->limit;
        $limit_field = $request->limit_field;
        $limit_field_value = $request->limit_field_value;
        if ($state == 'true') {
            $status = "Active";
        } else {
            $status = "Inactive";
        }
        $model = 'App\\Models\\' . $table;
        $data = $model::find($primary_key);
        if ($limit && $status == "Active") {
            if ($limit_field && $limit_field_value) {
                $active_data = $model::where($limit_field, $limit_field_value)->Where($field, 'Active');
            } else {
                $active_data = $model::Where($field, 'Active');
            }
            if ($active_data->count() >= $limit) {
                return response()->json([
                    'status' => false,
                    'message' => 'Only ' . $limit . ' active items is possible.'
                ]);
            }
        }
        $data->$field = $status;

        if($table == 'ServiceFaqconnect')
        {
            ServiceFaq::where('connectid',$primary_key)->update(['status'=>$status]);
        }
        if($table=='Portfolio'){
            PortfolioGallery::where('portfolio_id', $primary_key)->update(['status' => $status]);
        }
        if ($data->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Status has been changed successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error while changing the status.'
            ]);
        }
    }
     
    public function is_featured(Request $request) 
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $is_featured = "Yes";
        } else {
            $is_featured = "No";
        }
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->is_featured = $is_featured;

        if ($data->save()) {
            echo (json_encode(array('status' => true, 'message' => 'Featured status has been changed')));
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Error while changing the featured status')));
        }
    }


    public function is_open(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $is_open = "Yes";
        } else {
            $is_open = "No";
        }
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->is_open = $is_open;

        if ($data->save()) {
            echo (json_encode(array('status' => true, 'message' => 'Open status has been changed')));
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Error while changing the open status')));
        }
    }


    public function display_to_home(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $display_to_home = "Yes";
        } else {
            $display_to_home = "No";
        }
        $field = $request->field ?? 'status';
        $limit = $request->limit;
        $limit_field = $request->limit_field;
        $limit_field_value = $request->limit_field_value;
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->display_to_home = $display_to_home;
        // if ($display_to_home == "Yes") {
        //     if ($limit_field && $limit_field_value) {
        //         $active_data = $model::where($limit_field, $limit_field_value)->Where($field, 'Yes');
        //     } else {
        //         $active_data = $model::Where($field, 'Yes');
        //     }
        //     if ($active_data->count() >= $limit) {
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'Only ' . $limit . ' active items is possible.'
        //         ]);
        //     }
        // }
        if ($data->save()) {
            echo (json_encode(array('status' => true, 'message' => 'Display to Home status has been changed')));
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Error while changing the Display to Home status')));
        }
    }

    public function case_study_status(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $case_study_status = "Yes";
        } else {
            $case_study_status = "No";
        }
        $field = $request->field ?? 'status';
        $limit = $request->limit;
        $limit_field = $request->limit_field;
        $limit_field_value = $request->limit_field_value;
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->case_study_status = $case_study_status;
        
        if ($data->save()) {
            echo (json_encode(array('status' => true, 'message' => 'Case study status has been changed')));
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Error while changing the Case study status')));
        }
    }

    public function featured_to_home(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $featured_to_home = "Yes";
        } else {
            $featured_to_home = "No";
        }
        $field = $request->field ?? 'status';
        $limit = $request->limit;
        $limit_field = $request->limit_field;
        $limit_field_value = $request->limit_field_value;
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->featured_to_home = $featured_to_home;
        // if ($featured_to_home == "Yes") {
        //     if ($limit_field && $limit_field_value) {
        //         $active_data = $model::where($limit_field, $limit_field_value)->Where($field, 'Yes');
        //     } else {
        //         $active_data = $model::Where($field, 'Yes');
        //     }
        //     if ($active_data->count() >= $limit) {
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'Only ' . $limit . ' active items is possible.'
        //         ]);
        //     }
        // }
        if ($data->save()) {
            echo (json_encode(array('status' => true, 'message' => 'Featured to Home status has been changed')));
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Error while changing the Featured to Home status')));
        }
    }


    public function top_tier(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $top_tier = "Yes";
        } else {
            $top_tier = "No";
        }
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->top_tier = $top_tier;

        if ($data->save()) {
            echo (json_encode(array('status' => true, 'message' => 'Top Tier status has been changed')));
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Error while changing the Top Tier status')));
        }
    }

    public function delete_file(Request $request)
    {
        $filetype = explode('/', $request->type);
        $table = $filetype[0];
        $field = $filetype[1];
        $id = $filetype[2];

        $webp_field = isset($filetype[3]) ? $filetype[3] : '';
        $model = 'App\\Models\\' . $table;
        $data = $model::find($id);

        if ($data) {
            if (File::exists(public_path($data->$field))) {
                File::delete(public_path($data->$field));
            }
            if ($webp_field != '') {
                if (File::exists(public_path($data->$webp_field))) {
                    File::delete(public_path($data->$webp_field));
                }
                $data->$webp_field = NULL;
            }
            $data->$field = NULL;
            if ($data->save()) {
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    /*********************** Key feature Starts here *******************************/
    
    public function key_feature()
    {
        $title = "Key Feature List";
        $keyfeatureList = KeyFeature::where('deleted_at',NULL)->get();
        return view('app.home.keyfeature.list', compact(
            'keyfeatureList',
            'title'
        ));
    }

    public function key_feature_create()
    {
        $key = "Add";
        $title = "Add Key Feature";
        return view('app.home.keyfeature.form', compact('key', 'title'));
    }

    public function key_feature_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:255',
        ]);
        $key_feature = new KeyFeature;
        if ($request->hasFile('image')) {
            $key_feature->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/key_feature/webp_image/', 'key_feature');
            $key_feature->image = Helper::uploadFile($request->image, 'uploads/home/key_feature/image/', 'key_feature');
        }
    
        $key_feature->title = $validatedData['title'];
        $key_feature->number = $request->number;
        $key_feature->description = $request->description;
        $key_feature->image_meta_tag = $request->image_attribute;
        $sort_order = KeyFeature::orderBy('sort_order', 'DESC')->first();
        $active_count = KeyFeature::where('status', 'Active')->where('deleted_at',NULL)->count();
 
       
        if($active_count > 4){
            $key_feature->status = 'InActive';
            
        }else{
            $key_feature->status = 'Active';
        }
     
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
  
        $key_feature->sort_order = $sort_number;
        if ($key_feature->save()) {
            session()->flash('success', 'Key Feature has been added successfully');
            return redirect(Helper::sitePrefix() . 'home/key-feature');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function key_feature_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Key Feature";
        $keyfeature = KeyFeature::find($id);
        if ($keyfeature) {
            return view('app.home.keyfeature.form', compact('keyfeature', 'title', 'key'));
        } else {
            return view('app/errors/404');
        }
    }

    public function key_feature_update(Request $request, $id)
    {
        $key_feature = KeyFeature::find($id);
        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:255',
        ]);
        if ($request->hasFile('image')) {
            Helper::deleteFile($key_feature, 'image');
            Helper::deleteFile($key_feature, 'webp_image');
            $key_feature->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/key_feature/webp_image/', 'key_feature');
            $key_feature->image = Helper::uploadFile($request->image, 'uploads/home/key_feature/image/', 'key_feature');
        }

        $key_feature->title = $validatedData['title'];
        $key_feature->number = $request->number;
        $key_feature->description = $request->description;
        $key_feature->image_meta_tag = $request->image_attribute;
        $key_feature->updated_at = date('Y-m-d h:i:s');
        if ($key_feature->save()) {
            session()->flash('success', 'Key Feature has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/key-feature');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_key_feature(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $key_feature = KeyFeature::find($request->id);
            if ($key_feature) {
                Helper::deleteFile($key_feature, 'image');
                Helper::deleteFile($key_feature, 'webp_image');

                $deleted = $key_feature->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function key_feature_image()
    {
        $key = "Add";
        $keyfeature = siteimages::where('section','keyfeature')->latest()->first();
        $title = "Add Key Feature Image";
        return view('app.home.keyfeature.image', compact('key', 'title','keyfeature'));
    }
    public function key_feature_create_image(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $key_feature = new siteimages;
        if ($request->hasFile('image')) {
            $key_feature->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/key_feature/webp_image/', 'key_feature_image');
            $key_feature->image = Helper::uploadFile($request->image, 'uploads/home/key_feature/image/', 'key_feature_image');
        }

        $key_feature->section = 'keyfeature';
        
        if ($key_feature->save()) {
            session()->flash('success', 'Key Feature Image has been added successfully');
            return redirect(Helper::sitePrefix() . 'home/key-feature');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    // features over here 
    public function feature()
    {
        $title = "Feature List";
        $featureList = Feature::get();
        return view('app.home.feature.list', compact(
            'featureList',
            'title'
        ));
    }

    public function feature_create()
    {
        $key = "Add";
        $title = "Add Feature";
        return view('app.home.feature.form', compact('key', 'title'));
    }

    public function feature_store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:255',
        ]);

        $feature = new Feature();
        if ($request->hasFile('image')) {
            $feature->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/features/webp_image/', 'features');
            $feature->image = Helper::uploadFile($request->image, 'uploads/home/features/image/', 'features');
        }
    
        $feature->title = $validatedData['title'];
        $feature->description = $request->description ?? '';
        $feature->image_attribute = $request->image_attribute ?? '';
        $feature->alternate_description = $request->alternate_description ?? '';
        $feature->button_text = $request->button_text ?? '';
        $feature->button_url = $request->button_url ?? '';


        if ($feature->save()) {
            session()->flash('success', 'Feature has been added successfully');
            return redirect(Helper::sitePrefix() . 'home/features');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function feature_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Feature";
        $feature = Feature::find($id);
        if ($feature) {
            return view('app.home.feature.form', compact('feature', 'title', 'key'));
        } else {
            return view('app/errors/404');
        }
    }

    public function feature_update(Request $request, $id)
    {
        $feature = Feature::find($id);
        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:255',
        ]);
        if ($request->hasFile('image')) {
            Helper::deleteFile($feature, 'image');
            Helper::deleteFile($feature, 'webp_image');
            $feature->webp_image = Helper::uploadWebpImage($request->image, 'uploads/home/features/webp_image/', 'features');
            $feature->image = Helper::uploadFile($request->image, 'uploads/home/features/image/', 'features');
        }

        $feature->title = $validatedData['title'];
        $feature->description = $request->description ?? '';
        $feature->image_attribute = $request->image_attribute ?? '';
        $feature->alternate_description = $request->alternate_description ?? '';
        $feature->button_text = $request->button_text ?? '';
        $feature->button_url = $request->button_url ?? '';

        $feature->updated_at = date('Y-m-d h:i:s');
        if ($feature->save()) {
            session()->flash('success', 'Feature has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/features');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_feature(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $key_feature = Feature::find($request->id);
            if ($key_feature) {
                Helper::deleteFile($key_feature, 'image');
                Helper::deleteFile($key_feature, 'webp_image');

                $deleted = $key_feature->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }


    public function section_heading()
    {
       $sectionheadings= SectionHeading::get();
       return view('app.sectionheadings.list',compact('sectionheadings'));
    }
      public function section_heading_edit($id)
    {
       $sectionheadings= SectionHeading::find($id);
       $typename=$sectionheadings->type;
       
       $title='Update';
       return view('app.sectionheadings.form',compact('sectionheadings','title','typename'));
    }  
    public function update_section_heading(Request $request)
    {
        $return_back = false;
        if (isset($request->type)) {
            $validatedData = $request->validate([
                'image' => 'nullable|mimes:jpg,jpeg,png|max:512',
            ]);
            $home_heading = SectionHeading::type($request->type)->first();
            if (!$home_heading) {
                $home_heading = new SectionHeading();
            }
            
            if ($request->hasFile('image')) {
                Helper::deleteFile($home_heading, 'image');
                Helper::deleteFile($home_heading, 'webp_image');
                $home_heading->webp_image = Helper::uploadWebpImage($request->image, 'uploads/heading/' . $request->type . '/webp_image/', $request->type);
                $home_heading->image = Helper::uploadFile($request->image, 'uploads/heading/' . $request->type . '/image/', $request->type);
            }
            $home_heading->type = $request->type;
            $home_heading->title1 = $request->title;
            $home_heading->sub_title = $request->subtitle;
            $home_heading->title2 = $request->shortdescription;
            $home_heading->description = $request->description;
            $home_heading->image_attribute = $request->image_attribute;
            $home_heading->button_text = $request->buttontext;
            $home_heading->button_url = $request->buttonurl;
            $home_heading->buttontwo_text = $request->buttontwotext;
            $home_heading->buttontwo_url = $request->buttontwourl;            
          
            if ($home_heading->save()) {
                           session()->flash('success', 'Updated successfully');
            return redirect(Helper::sitePrefix() . 'section-heading');
                 
                }
             else {
               
               return redirect()->back()->with('error', 'Error while saving ');
            
           } }
    }

    // aur subscriber list 

    public function subscriber_list()
    {
        $type = "Subscriber List";
        $subscriberList = Subscriber::get();
        return view('app.subscriber.list', compact(
            'subscriberList',
            'type'
        ));
    }

    public function delete_subscriber(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $subscriber = Subscriber::find($request->id);
            if ($subscriber) {
                $deleted = $subscriber->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }



    // Home Our Services
    // public function home_our_services()
    // {
    //     $key = "Update";
    //     $title = "Our Services";
    //     $about = HomeOurService::first();
    //     return view('app.home.our_services.home_our_service_form', compact('key', 'title', 'about'));
    // }

    // public function home_our_services_store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|min:2|max:225',
    //         'sub_title' => 'required|min:2|max:50',
    //         'description' => 'required|min:2',
    //         'short_description' => 'nullable|min:2',
    //         'button_text' => 'required|min:2',
    //         'button_url' => 'required|min:2',
    //          'image' => 'nullable|max:512',
      
    //     ]);

    //     if ($request->id == 0) {
    //         $about = new HomeOurService;
    //     } else {
    //         $about = HomeOurService::find($request->id);
    //         $about->updated_at = date('Y-m-d h:i:s');
    //     }


    //         if ($request->hasFile('image')) {
              
    //             $about->webp_image = Helper::uploadWebpImage($request->image, 'uploads/servicecontact/' . $request->type . '/webp_image/', $request->type);
    //             $about->image = Helper::uploadFile($request->image, 'uploads/servicecontact/' . $request->type . '/image/', $request->type);
    //         }
    //     $about->title = $request->title ?? '';
    //     $about->sub_title = $request->sub_title ?? '';
    //     $about->short_description = $request->short_description ?? '';
    //     $about->description = $request->description ?? '';
    //     $about->button_text = $request->button_text ?? '';
    //     $about->button_url = $request->button_url ?? '';
    //     $about->contactperson = $request->contactperson ?? '';
    //     $about->phone = $request->phone ?? '';
    //     $about->designation = $request->designation ?? '';
       

    //     if ($about->save()) {
    //         session()->flash('success', 'Home-Our Services content has been updated successfully');
    //         return redirect(Helper::sitePrefix() . 'home/our-services');
    //     } else {
    //         return back()->with('error', 'Error while updating the home-Our Services content');
    //     }
    // }
}
