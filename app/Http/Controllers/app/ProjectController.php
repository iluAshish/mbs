<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\ProjectGallery;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index(Request $request){
        $projectList = Project::latest()->get();

        $title = "Project List";
        $type = 'project';
        return view('app.project.list', compact('projectList', 'title', 'type'));
    }

    public function project_create(){
        $title = "Create Project";
        $type = 'project';
        return view('app.project.form', compact('title', 'type'));
    }

    public function project_store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'short_url' => 'required|string|max:255|unique:projects,short_url',
            'starting_year' => 'required|integer',
            'location' => 'required|string|max:255',
            'staff_count' => 'required|integer',
            'description' => 'nullable|string',
            'challenges' => 'required|string',
            'services_delivered' => 'required|string',
            'approach' => 'required|string',
            'result_archieved' => 'required|string',
            'conclusion' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = new Project();

        if ($request->hasFile('project_image')) {
            $project->webp_image = Helper::uploadWebpImage($request->project_image, 'uploads/project/image/webp/', $request->short_url);
            $project->image = Helper::uploadFile($request->project_image, 'uploads/project/image/', $request->short_url);
        }

        if ($request->hasFile('logo_image')) {
            $project->logo_web_image = Helper::uploadWebpImage($request->logo_image, 'uploads/project/logo_image/webp/', $request->short_url);
            $project->logo_image = Helper::uploadFile($request->logo_image, 'uploads/project/logo_image/', $request->short_url);
        }

        $project->title = $request->title;
        $project->short_url = $request->short_url;
        $project->start_year = $request->starting_year;
        $project->end_year = $request->ending_year ?? null;
        $project->location = $request->location;
        $project->staff_count = $request->staff_count;
        $project->description = $request->description;
        $project->challenges = $request->challenges;
        $project->services_delivered = $request->services_delivered;
        $project->approach = $request->approach;
        $project->result_archieved = $request->result_archieved;
        $project->conclusion = $request->conclusion;

        $project->image_attribute = $request->project_image_attribute ?? '';
        $project->logo_image_attribute = $request->logo_image_attribute ?? '';

        $project->meta_title = $request->meta_title ?? '';
        $project->meta_description = $request->meta_description ?? '';
        $project->meta_keywords = $request->meta_keyword ?? '';
        $project->other_meta_tag = $request->other_meta_tag ?? '';

        $sort_order = Project::orderBy('sort_order', 'DESC')->first();

        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $project->sort_order = $sort_number;

        if ($project->save()) {
            session()->flash('success', "Project '" . $project->title . "' has been added successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'project');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the project");
        }
    }

    public function project_edit($id){
        $project = Project::findOrFail($id);
        $title = "Edit Project";
        $type = 'project';
        
        if(!$project) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        return view('app.project.form', compact('project', 'title', 'type'));
    }

    public function project_update(Request $request, $id){
        $project = Project::findOrFail($id);
        $title = "Update Project";
        $type = 'project';
        if(!$project) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'short_url' => 'required|string|max:255|unique:projects,short_url,' . $project->id,
            'starting_year' => 'required|integer',
            'location' => 'required|string|max:255',
            'staff_count' => 'required|integer',
            'description' => 'nullable|string',
            'challenges' => 'required|string',
            'services_delivered' => 'required|string',
            'approach' => 'required|string',
            'result_archieved' => 'required|string',
            'conclusion' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('project_image')) {
           
            if (File::exists(public_path($project->image))) {
                File::delete(public_path($project->image));
            }
            if (File::exists(public_path($project->webp_image))) {
                File::delete(public_path($project->webp_image));
            }
            $project->webp_image = Helper::uploadWebpImage($request->project_image, 'uploads/project/image/webp/', $request->short_url);
            $project->image = Helper::uploadFile($request->project_image, 'uploads/project/image/', $request->short_url);
        }

        if ($request->hasFile('logo_image')) {
            if (File::exists(public_path($project->logo_image))) {
                File::delete(public_path($project->logo_image));
            }

            if (File::exists(public_path($project->logo_web_image))) {
                File::delete(public_path($project->logo_web_image));
            }

            $project->logo_web_image = Helper::uploadWebpImage($request->logo_image, 'uploads/project/logo_image/webp/', $request->short_url);
            $project->logo_image = Helper::uploadFile($request->logo_image, 'uploads/project/logo_image/', $request->short_url);
        }

        $project->title = $request->title;
        $project->short_url = $request->short_url;
        $project->start_year = $request->starting_year;
        $project->end_year = $request->ending_year ?? null;
        $project->location = $request->location;
        $project->staff_count = $request->staff_count;
        $project->description = $request->description;
        $project->challenges = $request->challenges;
        $project->services_delivered = $request->services_delivered;
        $project->approach = $request->approach;
        $project->result_archieved = $request->result_archieved;
        $project->conclusion = $request->conclusion;
        $project->image_attribute = $request->project_image_attribute ?? '';
        $project->logo_image_attribute = $request->logo_image_attribute ?? '';

        $project->meta_title = $request->meta_title ?? '';
        $project->meta_description = $request->meta_description ?? '';
        $project->meta_keywords = $request->meta_keyword ?? '';
        $project->other_meta_tag = $request->other_meta_tag ?? '';
        $project->sort_order = $request->sort_order ?? $project->sort_order;

        if ($project->save()) {
            session()->flash('success', "Project '" . $project->title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'project');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the project");
        }

    }

    public function delete_project(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $project = Project::find($request->id);
            if ($project) {
                if (File::exists(public_path($project->image))) {
                    File::delete(public_path($project->image));
                }
                if (File::exists(public_path($project->webp_image))) {
                    File::delete(public_path($project->webp_image));
                }
                if (File::exists(public_path($project->logo_image))) {
                    File::delete(public_path($project->logo_image));
                }
                if (File::exists(public_path($project->logo_web_image))) {
                    File::delete(public_path($project->logo_web_image));
                }
                if ($project->delete()) {
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


    public function gallery($project_id)
    {
        $project = Project::find($project_id);
        $title = " Gallery List - " . $project->title;
        $projectGalleryList = ProjectGallery::where('project_id', '=', $project_id)->get();
        return view('app.project.gallery.list', compact('projectGalleryList', 'title', 'project_id'));
    }

    public function gallery_create($project_id)
    {
        $project = Project::find($project_id);
        $key = "Create";
        $title = "Create Project Gallery  - " . $project->title;
        return view('app.project.gallery.form', compact('key', 'title', 'project_id'));
    }

    public function gallery_store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'image_attribute' => 'required',
        ]);

        $project = Project::find($request->project_id);
        $sort_order = $project->activeGalleries;
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $added_images = $not_added_images = 0;
        if ($request->media_type == "Image") {
            foreach ($request->image as $gallery_image) {
                $project_gallery = new ProjectGallery;
                $project_gallery = $this->gallery_store_items($request, $gallery_image, $project_gallery, $project, $sort_number);
                $project_gallery->sort_order = $sort_number;
                if ($project_gallery->save()) {
                    $added_images++;
                } else {
                    $not_added_images++;
                }
                $sort_number++;
            }
        } else {
            $project_gallery = new ProjectGallery;
            $gallery_image = $request->image;
            $project_gallery = $this->gallery_store_items($request, $gallery_image, $project_gallery, $project, $sort_number);
            $project_gallery->sort_order = $sort_number;
            if ($project_gallery->save()) {
                $added_images++;
            } else {
                $not_added_images++;
            }
        }

        if ($not_added_images == 0) {
            session()->flash('message', $added_images . " gallery images of Project '" . $project->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'project/gallery/' . $request->project_id);
        } else {
            return back()->with('message', 'Error while creating the project gallery');
        }
    }

    public function gallery_store_items(Request $request, $gallery_image, $project_gallery, $project, $sort_number)
    {
        $project_gallery->image_webp = Helper::uploadWebpImage($gallery_image, 'uploads/project/gallery/image/webp/', $project->short_url);
        $project_gallery->image = Helper::uploadFile($gallery_image, 'uploads/project/gallery/image/', $project->short_url);
        $project_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $project_gallery->video_url = $request->video_url;
        }
        $project_gallery->project_id = $project->id;
        $project_gallery->image_attribute = $request->image_attribute;

        return $project_gallery;
    }

    public function gallery_edit($id)
    {
        $key = "Update";
        $project_gallery = ProjectGallery::find($id);
        $title = "Update Project Gallery";
        if ($project_gallery) {
            $project_id = $project_gallery->project_id;
            return view('app.project.gallery.form', compact('key', 'project_gallery', 'title', 'project_id'));
        } else {
            return view('app.error.404');
        }
    }

    public function gallery_update(Request $request, $id)
    {
        $project_gallery = ProjectGallery::find($id);
        $project = Project::find($request->project_id);
        if ($request->hasFile('image')) {
            if (File::exists(public_path($project_gallery->image))) {
                File::delete(public_path($project_gallery->image));
            }
            if (File::exists(public_path($project_gallery->image_webp))) {
                File::delete(public_path($project_gallery->image_webp));
            }
            $project_gallery->image_webp = Helper::uploadWebpImage($request->image, 'uploads/project/gallery/image/webp/', $project->short_url);
            $project_gallery->image = Helper::uploadFile($request->image, 'uploads/project/gallery/image/', $project->short_url);
        }
        $project_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $project_gallery->video_url = $request->video_url;
        }
        $project_gallery->project_id = $request->project_id;
        $project_gallery->image_attribute = $request->image_attribute;
        $project_gallery->updated_at = now();
        if ($project_gallery->save()) {
            session()->flash('message', "Project gallery has been updated successfully");
            return redirect(Helper::sitePrefix() . 'project/gallery/' . $project->id);
        } else {
            return back()->with('message', 'Error while updating the gallery');
        }
    }

    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $project_gallery = ProjectGallery::find($request->id);
            if ($project_gallery) {
                if (File::exists(public_path($project_gallery->image))) {
                    File::delete(public_path($project_gallery->image));
                }
                if (File::exists(public_path($project_gallery->image_webp))) {
                    File::delete(public_path($project_gallery->image_webp));
                }
                if ($project_gallery->delete()) {
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