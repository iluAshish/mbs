<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\casestudies;
use App\Models\casestudytypes;
use App\Models\Photo;
use App\Models\PhotoGallery;
use App\Models\Video;
use App\Models\SectionHeading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    //
    public function blog_list($type)
    {
        $title = ucfirst($type) . " List";
        $blogList = Blog::where('type', $type)->get();
        $heading = SectionHeading::where('type', $type)->first();
        return view('app.blog.list', compact('blogList', 'title', 'heading', 'type'));
    }

    public function blog_create($type)
    {
        $key = "Create";
        $title = "Add " . ucfirst($type);
        return view('app.blog.form', compact('key', 'title', 'type'));
    }

    public function blog_store(Request $request, $type)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required|unique:blogs,short_url,NULL,id,deleted_at,NULL|min:2|max:255',
            'banner_title' => 'nullable|min:2|max:255',
            'meta_title' => 'nullable|min:2|max:255',
            'written_by' => 'nullable|min:2|max:60',
            'posted_date' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'video_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);

        $blog = new Blog;
        $blog->type = $type; // Set the type

        // Handle file uploads
        if ($request->hasFile('image')) {
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/image_webp/', 'blog');
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', 'blog');
        }
        if ($request->hasFile('video_thumbnail_image')) {
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image_webp/', 'blog');
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }

        if ($request->hasFile('admin_image')) {
            $blog->admin_webp_image = Helper::uploadWebpImage($request->admin_image, 'uploads/blog/admin_image_webp/', 'blog');
            $blog->admin_image = Helper::uploadFile($request->admin_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }

        if ($request->hasFile('banner_image')) {
            $blog->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/blog/banner_image_webp/', 'blog');
            $blog->banner_image = Helper::uploadFile($request->banner_image, 'uploads/blog/banner_image/', 'blog');
        }

        // Set blog attributes
        $blog->title = $validatedData['title'];
        $blog->sub_title = $request->sub_title;
        $blog->short_url = $validatedData['short_url'];
        $blog->posted_date = $request->posted_date ?? date('Y-m-d');
        $blog->written_by = $request->written_by;

        $blog->image_attribute = $request->image_attribute ?? '';
        $blog->description = $request->description ?? '';
        $blog->video_url = $request->video_url ?? '';
        $blog->video_thumbnail_attribute = $request->video_attribute ?? '';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->banner_title = $request->banner_title ?? '';
        $blog->banner_sub_title = $request->banner_sub_title ?? '';
        $blog->banner_image_attribute = $request->banner_image_attribute ?? '';
        $blog->admin_image_attribute = $request->admin_image_attribute ?? '';

        $blog->meta_title = $request->meta_title ?? $validatedData['title'];
        $blog->meta_description = $request->meta_description ?? $validatedData['title'];
        $blog->meta_keyword = $request->meta_keyword ?? $validatedData['title'];
        $blog->other_meta_tag = $request->other_meta_tag ?? '';

        if ($blog->save()) {
            session()->flash('success', ucfirst($type) . ' "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix() . 'media/' . $type);
        } else {
            return back()->with('message', 'Error while creating ' . $type);
        }
    }

    public function blog_edit($id, $type)
    {
        $key = "Update";
        $title = ucfirst($type) . " Update";
        $blog = Blog::where('id', $id)->where('type', $type)->first();

        if ($blog != null) {
            return view('app.blog.form', compact('key', 'blog', 'title', 'type'));
        } else {
            return view('app.error.404');
        }
    }

    public function blog_update(Request $request, $id, $type)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required|unique:blogs,short_url,' . $id . ',id,deleted_at,NULL|min:2|max:255',
            'banner_title' => 'nullable|min:2|max:255',
            'meta_title' => 'nullable|min:2|max:255',
            'written_by' => 'nullable|min:2|max:60',
            // 'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'video_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);

        $blog = Blog::where('id', $id)->where('type', $type)->first();
        // dd($request, $id, $type);
        // Handle file uploads
        if ($request->hasFile('image')) {
            Helper::deleteFile($blog, 'image');
            Helper::deleteFile($blog, 'image_webp');
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/image_webp/', 'blog');
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', 'blog');
        }
        if ($request->hasFile('video_thumbnail_image')) {
            Helper::deleteFile($blog, 'video_thumbnail_image');
            Helper::deleteFile($blog, 'video_thumbnail_image_webp');
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image_webp/', 'blog');
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }
        if ($request->hasFile('banner_image')) {
            Helper::deleteFile($blog, 'banner_image');
            Helper::deleteFile($blog, 'banner_image_webp');
            $blog->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/blog/banner_image_webp/', 'blog');
            $blog->banner_image = Helper::uploadFile($request->banner_image, 'uploads/blog/banner_image/', 'blog');
        }

        if ($request->hasFile('admin_image')) {
            Helper::deleteFile($blog, 'admin_image');
            Helper::deleteFile($blog, 'admin_webp_image');
            $blog->admin_webp_image = Helper::uploadWebpImage($request->admin_image, 'uploads/blog/admin_image_webp/', 'blog');
            $blog->admin_image = Helper::uploadFile($request->admin_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }

        // Set blog attributes
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->short_url = $validatedData['short_url'];
        $blog->posted_date = $request->posted_date ?? date('Y-m-d');
        $blog->written_by = $request->written_by;

        $blog->image_attribute = $request->image_attribute ?? '';
        $blog->description = $request->description ?? '';
        $blog->video_url = $request->video_url ?? '';
        $blog->video_thumbnail_attribute = $request->video_attribute ?? '';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->banner_title = $request->banner_title ?? '';
        $blog->banner_sub_title = $request->banner_sub_title ?? '';
        $blog->banner_image_attribute = $request->banner_image_attribute ?? '';
        
        $blog->admin_image_attribute = $request->admin_image_attribute ?? '';

        $blog->meta_title = $request->meta_title ?? $validatedData['title'];
        $blog->meta_description = $request->meta_description ?? $validatedData['title'];
        $blog->meta_keyword = $request->meta_keyword ?? $validatedData['title'];
        $blog->other_meta_tag = $request->other_meta_tag ?? '';
        $blog->updated_at = date('Y-m-d h:i:s');

        if ($blog->save()) {
            session()->flash('success', ucfirst($type) . ' "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix() . 'media/' . $type);
        } else {
            return back()->with('message', 'Error while updating ' . $type);
        }
    }

    public function delete_blog(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = Blog::find($request->id);
            if ($blog) {
                Helper::deleteFile($blog, 'image');
                Helper::deleteFile($blog, 'image_webp');
                Helper::deleteFile($blog, 'video_thumbnail_image');
                Helper::deleteFile($blog, 'video_thumbnail_image_webp');
                Helper::deleteFile($blog, 'desktop_banner');
                Helper::deleteFile($blog, 'desktop_banner_webp');
                Helper::deleteFile($blog, 'mobile_banner');
                Helper::deleteFile($blog, 'mobile_banner_webp');
                $deleted = $blog->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occurred, please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        }
    }
    public function portfolio_list()
    {
        $title = "Portfolio List";
        $blogList = Portfolio::get();
        $heading = SectionHeading::where('type','portfolio')->first();
        return view('app.portfolio.list', compact('blogList', 'title','heading'));
    }

    public function portfolio_create()
    {
        $key = "Create";
        $title = "Add Portfolio";
        return view('app.portfolio.form', compact('key', 'title'));
    }

    public function portfolio_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required|unique:blogs,short_url,NULL,id,deleted_at,NULL|min:2|max:255',
            'banner_title'=>'nullable|min:2|max:255',
            'meta_title'=>'nullable|min:2|max:255',
            'written_by'=>'nullable|min:2|max:60',
            'website'=>'required|min:2|max:255',
            'scope'=>'required|min:2|max:255',
            'type'=>'required|min:2|max:255',
            'website'=>'required|min:2|max:255',
            'image'=>'required|min:2|max:255',
            'posted_date'=>'required',
            'description'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'video_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);

        $blog = new Portfolio;
        if ($request->hasFile('image')) {
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/image_webp/', 'blog');
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', 'blog');
        }
        if ($request->hasFile('video_thumbnail_image')) {
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image_webp/', 'blog');
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }
        if ($request->hasFile('banner_image')) {
            $blog->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/blog/banner_image_webp/', 'blog');
            $blog->banner_image = Helper::uploadFile($request->banner_image, 'uploads/blog/banner_image/', 'blog');
        }
        $blog->title = $validatedData['title'];
        $blog->sub_title = $request->sub_title;
        $blog->short_url = $validatedData['short_url'];
        $blog->posted_date = $request->posted_date??date('Y-m-d');
        $blog->written_by = $request->written_by;
        $blog->scope = $request->scope;
        $blog->Location = $request->location;
        $blog->Type = $request->type;
        $blog->Website = $request->website;

        $blog->image_attribute = $request->image_attribute??'';
        $blog->description = $request->description??'';
        $blog->video_url = $request->video_url?? '';
        $blog->video_thumbnail_attribute = $request->video_attribute??'';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->banner_title = $request->banner_title??'';
        $blog->banner_sub_title = $request->banner_sub_title??'';
        $blog->banner_image_attribute = $request->banner_image_attribute??'';

        $blog->meta_title = $request->meta_title??'Pentacodes It solutions';
        $blog->meta_description = $request->meta_description??'Pentacodes It solutions';
        $blog->meta_keyword = $request->meta_keyword??'Pentacodes It solutions';
        $blog->other_meta_tag = $request->other_meta_tag??'';

        if ($blog->save()) {
            session()->flash('success', 'Blog "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix().'media/portfolio/');
        } else {
            return back()->with('message', 'Error while creating Portfolio');
        }

    }

    public function portfolio_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Portfolio Update";
        $blog = Portfolio::find($id);
        if ($blog != null) {
            return view('app.portfolio.form', compact('key', 'blog', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function portfolio_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required|unique:blogs,short_url,' . $id . ',id,deleted_at,NULL|min:2|max:255',
            'banner_title'=>'nullable|min:2|max:255',
            'meta_title'=>'nullable|min:2|max:255',
            'website'=>'required|min:2|max:255',
            'scope'=>'required|min:2|max:255',
            'image'=>'required|min:2|max:255',
            'type'=>'required|min:2|max:255',
            'written_by'=>'nullable|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'video_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);
        $blog = Portfolio::find($id);
        if ($request->hasFile('image')) {
            Helper::deleteFile($blog, 'image');
            Helper::deleteFile($blog, 'image_webp');
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/image_webp/', 'blog');
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', 'blog');
        }
        if ($request->hasFile('video_thumbnail_image')) {
            Helper::deleteFile($blog, 'video_thumbnail_image');
            Helper::deleteFile($blog, 'video_thumbnail_image_webp');
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image_webp/', 'blog');
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }
        if ($request->hasFile('banner_image')) {
            Helper::deleteFile($blog, 'banner_image');
            Helper::deleteFile($blog, 'banner_image_webp');
            $blog->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/blog/banner_image_webp/', 'blog');
            $blog->banner_image = Helper::uploadFile($request->banner_image, 'uploads/blog/banner_image/', 'blog');
        }

        $blog->title = $validatedData['title'];
        $blog->sub_title = $request->sub_title;
        $blog->short_url = $validatedData['short_url'];
        $blog->posted_date = $request->posted_date??date('Y-m-d');
        $blog->written_by = $request->written_by;
        $blog->scope = $request->scope;
        $blog->Location = $request->location;
        $blog->Type = $request->type;
        $blog->Website = $request->website;
        $blog->image_attribute = $request->image_attribute??'';
        $blog->description = $request->description??'';
        $blog->video_url = $request->video_url?? '';
        $blog->video_thumbnail_attribute = $request->video_attribute??'';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->banner_title = $request->banner_title??'';
        $blog->banner_sub_title = $request->banner_sub_title??'';
        $blog->banner_image_attribute = $request->banner_image_attribute??'';

        $blog->meta_title = $request->meta_title??'';
        $blog->meta_description = $request->meta_description??'';
        $blog->meta_keyword = $request->meta_keyword??'';
        $blog->other_meta_tag = $request->other_meta_tag??'';
        $blog->updated_at = date('Y-m-d h:i:s');

        if ($blog->save()) {
            session()->flash('success', 'Blog "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix().'media/portfolio/');
        } else {
            return back()->with('message', 'Error while updating portfolio');
        }
    }

    public function delete_portfolio(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = Portfolio::find($request->id);
            if ($blog) {

                Helper::deleteFile($blog, 'image');
                Helper::deleteFile($blog, 'image_webp');
                Helper::deleteFile($blog, 'video_thumbnail_image');
                Helper::deleteFile($blog, 'video_thumbnail_image_webp');
                Helper::deleteFile($blog, 'desktop_banner');
                Helper::deleteFile($blog, 'desktop_banner_webp');
                Helper::deleteFile($blog, 'mobile_banner');
                Helper::deleteFile($blog, 'mobile_banner_webp');
                $deleted = $blog->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        }
    }
        public function casestudies_list()
    {
        $title = "Casestudies List";
        $blogList = casestudies::get();
        $heading = SectionHeading::where('type','casestudies')->first();
        return view('app.casestudies.list', compact('blogList', 'title','heading'));
    }

    public function casestudies_create()
    {
        $key = "Create";
        $title = "Add Casestudies";
        return view('app.casestudies.form', compact('key', 'title'));
    }

    public function casestudies_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required|unique:blogs,short_url,NULL,id,deleted_at,NULL|min:2|max:255',
            'banner_title'=>'nullable|min:2|max:255',
            'meta_title'=>'nullable|min:2|max:255',
            'written_by'=>'nullable|min:2|max:60',
            'location'=>'required|min:2|max:255', 
            'website'=>'required|min:2|max:255',
            'scope'=>'required|min:2|max:255',
            'image'=>'required|min:2|max:255',
            'type'=>'required|min:2|max:255',            
            'posted_date'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
            'video_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);

        $blog = new casestudies;
        if ($request->hasFile('image')) {
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/image_webp/', 'blog');
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', 'blog');
        }
        if ($request->hasFile('video_thumbnail_image')) {
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image_webp/', 'blog');
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }
        if ($request->hasFile('banner_image')) {
            $blog->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/blog/banner_image_webp/', 'blog');
            $blog->banner_image = Helper::uploadFile($request->banner_image, 'uploads/blog/banner_image/', 'blog');
        }
        $blog->title = $validatedData['title'];
        $blog->sub_title = $request->sub_title;
        $blog->short_url = $validatedData['short_url'];
        $blog->posted_date = $request->posted_date??date('Y-m-d');
        $blog->written_by = $request->written_by;

        $blog->image_attribute = $request->image_attribute??'';
        $blog->description = $request->description??'';
        $blog->scope = $request->scope??'';
        $blog->website = $request->website??'';
        $blog->location = $request->location??'';
        $blog->type = $request->type??'';
        $blog->video_url = $request->video_url?? '';
        $blog->video_thumbnail_attribute = $request->video_attribute??'';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->banner_title = $request->banner_title??'';
        $blog->banner_sub_title = $request->banner_sub_title??'';
        $blog->banner_image_attribute = $request->banner_image_attribute??'';

        $blog->meta_title = $request->meta_title??$validatedData['title'];
        $blog->meta_description = $request->meta_description??$validatedData['title'];
        $blog->meta_keyword = $request->meta_keyword??$validatedData['title'];
        $blog->other_meta_tag = $request->other_meta_tag??'';

        if ($blog->save()) {
            session()->flash('success', 'Casestudies "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix().'media/casestudies/');
        } else {
            return back()->with('message', 'Error while creating casestudies');
        }

    }

    public function casestudies_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Casestudies Update";
        $blog = casestudies::find($id);
        if ($blog != null) {
            return view('app.casestudies.form', compact('key', 'blog', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function casestudies_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required|unique:blogs,short_url,' . $id . ',id,deleted_at,NULL|min:2|max:255',
            'banner_title'=>'nullable|min:2|max:255',
            'meta_title'=>'nullable|min:2|max:255',
             'website'=>'required|min:2|max:255',
            'scope'=>'required|min:2|max:255',
           
            'type'=>'required|min:2|max:255',  
            'location'=>'required|min:2|max:255', 
            'written_by'=>'nullable|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'video_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);
        $blog = casestudies::find($id);
        if ($request->hasFile('image')) {
            Helper::deleteFile($blog, 'image');
            Helper::deleteFile($blog, 'image_webp');
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/image_webp/', 'blog');
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', 'blog');
        }
        if ($request->hasFile('video_thumbnail_image')) {
            Helper::deleteFile($blog, 'video_thumbnail_image');
            Helper::deleteFile($blog, 'video_thumbnail_image_webp');
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image_webp/', 'blog');
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail_image, 'uploads/blog/video_thumbnail_image/', 'blog');
        }
        if ($request->hasFile('banner_image')) {
            Helper::deleteFile($blog, 'banner_image');
            Helper::deleteFile($blog, 'banner_image_webp');
            $blog->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/blog/banner_image_webp/', 'blog');
            $blog->banner_image = Helper::uploadFile($request->banner_image, 'uploads/blog/banner_image/', 'blog');
        }

        $blog->title = $validatedData['title'];
        $blog->sub_title = $request->sub_title;
        $blog->short_url = $validatedData['short_url'];
        $blog->posted_date = $request->posted_date??date('Y-m-d');
        $blog->written_by = $request->written_by;

        $blog->image_attribute = $request->image_attribute??'';
        $blog->description = $request->description??'';
        $blog->video_url = $request->video_url?? '';
        $blog->video_thumbnail_attribute = $request->video_attribute??'';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->banner_title = $request->banner_title??'';
        $blog->scope = $request->scope??'';
        $blog->website = $request->website??'';
        $blog->location = $request->location??'';
        $blog->type = $request->type??'';        
        $blog->banner_sub_title = $request->banner_sub_title??'';
        $blog->banner_image_attribute = $request->banner_image_attribute??'';

        $blog->meta_title = $request->meta_title??$validatedData['title'];
        $blog->meta_description = $request->meta_description??$validatedData['title'];
        $blog->meta_keyword = $request->meta_keyword??$validatedData['title'];
        $blog->other_meta_tag = $request->other_meta_tag??'';
        $blog->updated_at = date('Y-m-d h:i:s');

        if ($blog->save()) {
            session()->flash('success', 'Casestudies "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix().'media/casestudies/');
        } else {
            return back()->with('message', 'Error while updating blog');
        }
    }

    public function delete_casestudies(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = casestudies::find($request->id);
            if ($blog) {

                Helper::deleteFile($blog, 'image');
                Helper::deleteFile($blog, 'image_webp');
                Helper::deleteFile($blog, 'video_thumbnail_image');
                Helper::deleteFile($blog, 'video_thumbnail_image_webp');
                Helper::deleteFile($blog, 'desktop_banner');
                Helper::deleteFile($blog, 'desktop_banner_webp');
                Helper::deleteFile($blog, 'mobile_banner');
                Helper::deleteFile($blog, 'mobile_banner_webp');
                $deleted = $blog->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        }
    } 
        public function casestudytypes_list()
    {
        $title = "Casestudies List";
        $cases = casestudytypes::get();
        $heading = SectionHeading::where('type','casestudies')->first();
        return view('app.casestudytypes.list', compact('cases', 'title','heading'));
    }

    public function casestudytypes_create()
    {
        $key = "Create";
        $title = "Add Casestudies";
        return view('app.casestudytypes.form', compact('key', 'title'));
    }

    public function casestudytypes_store(Request $request)
    {


        $blog = new casestudytypes;
        $blog->title = $request->title;
        $blog->save();

        if ($blog->save()) {
            session()->flash('success', 'casestudytype "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix().'media/casestudytypes/');
        } else {
            return back()->with('message', 'Error while creating casestudytypes');
        }

    }

    public function casestudytypes_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Casestudies Update";
        $blog = casestudytypes::find($id);
        if ($blog != null) {
            return view('app.casestudytypes.form', compact('key', 'blog', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function casestudytypes_update(Request $request, $id)
    {

        $blog = casestudytypes::find($id);
        $blog->title = $request->title;
        $blog->updated_at = date('Y-m-d h:i:s');

        if ($blog->save()) {
            session()->flash('success', 'casestudytype "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix().'media/casestudytypes/');
        } else {
            return back()->with('message', 'Error while updating casestudytypes');
        }
    }

    public function delete_casestudytypes(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = casestudytypes::find($request->id);
            if ($blog) {

                $deleted = $blog->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        }
    }          
}
