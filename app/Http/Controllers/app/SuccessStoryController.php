<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use App\Models\SuccessAward;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SuccessStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success_stories()
    {
        $success_stories_list = SuccessStory::latest()->get();
        $title = "Success Story List";
        $type = 'Success Story';
        return view('app.success_story.list', compact('success_stories_list', 'title', 'type'));
    }


    public function success_story_create()
    {
        $key = "Create";
        $title = 'Create Success Story';
        return view('app.success_story.form', compact('key', 'title'));
    }

    public function success_story_store(Request $request)
    {
        DB::beginTransaction();
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_description' => 'required'
        ]);
        $success_story = new SuccessStory();
        if ($request->hasFile('image_1')) {
            $success_story->image_1_webp = Helper::uploadWebpImage($request->image_1, 'uploads/success_story/image/webp/', $request->title);
            $success_story->image_1 = Helper::uploadFile($request->image_1, 'uploads/success_story/image/', $request->title);
        }
        if ($request->hasFile('image_2')) {
            $success_story->image_2_webp = Helper::uploadWebpImage($request->image_2, 'uploads/success_story/image/webp/', $request->title);
            $success_story->image_2 = Helper::uploadFile($request->image_2, 'uploads/success_story/image/', $request->title);
        }
        if ($request->hasFile('image_3')) {
            $success_story->image_3_webp = Helper::uploadWebpImage($request->image_3, 'uploads/success_story/image/webp/', $request->title);
            $success_story->image_3 = Helper::uploadFile($request->image_3, 'uploads/success_story/image/', $request->title);
        }

        $success_story->title = ucfirst($validatedData['title']);
        $success_story->date = $request->date ?? '';




        $success_story->short_description = $request->short_description ?? '';
        $success_story->description = $request->description ?? '';

        $success_story->image_1_attribute = $request->image_1_attribute ?? '';
        $success_story->image_2_attribute = $request->image_2_attribute ?? '';
        $success_story->image_3_attribute = $request->image_3_attribute ?? '';
        

        $sort_order = SuccessStory::orderBy('sort_order', 'DESC')->first();

        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $success_story->sort_order = $sort_number;



        if ($success_story->save()) {
            session()->flash('success', "Success Story '" . $success_story->title . "' has been added successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'success-stories');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the Success Story");
        }
    }

    public function success_story_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Success Story";
        $success_story = SuccessStory::find($id);
        if ($success_story) {
            return view('app.success_story.form', compact('key', 'title', 'success_story'));
        } else {
            return view('app.error.404');
        }
    }

    public function success_story_update(Request $request, $id)
    {
        DB::beginTransaction();
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_description' => 'required'
        ]);
        $success_story = SuccessStory::find($id);
        if ($request->hasFile('image_1')) {
            if (File::exists(public_path($success_story->image_1))) {
                File::delete(public_path($success_story->image_1));
            }
            if (File::exists(public_path($success_story->image_1_webp))) {
                File::delete(public_path($success_story->image_1_webp));
            }
            $success_story->image_1_webp = Helper::uploadWebpImage($request->image_1, 'uploads/success_story/image/webp/', $request->title);
            $success_story->image_1 = Helper::uploadFile($request->image_1, 'uploads/success_story/image/', $request->title);
        }
        if ($request->hasFile('image_2')) {
            if (File::exists(public_path($success_story->image_2))) {
                File::delete(public_path($success_story->image_2));
            }
            if (File::exists(public_path($success_story->image_2_webp))) {
                File::delete(public_path($success_story->image_2_webp));
            }
            $success_story->image_2_webp = Helper::uploadWebpImage($request->image_2, 'uploads/success_story/image/webp/', $request->title);
            $success_story->image_2 = Helper::uploadFile($request->image_2, 'uploads/success_story/image/', $request->title);
        }
        if ($request->hasFile('image_3')) {
            if (File::exists(public_path($success_story->image_3))) {
                File::delete(public_path($success_story->image_3));
            }
            if (File::exists(public_path($success_story->image_3_webp))) {
                File::delete(public_path($success_story->image_3_webp));
            }
            $success_story->image_3_webp = Helper::uploadWebpImage($request->image_3, 'uploads/success_story/image/webp/', $request->title);
            $success_story->image_3 = Helper::uploadFile($request->image_3, 'uploads/success_story/image/', $request->title);
        }

        $success_story->title = ucfirst($validatedData['title']);
        $success_story->date = $request->date ?? '';




        $success_story->short_description = $request->short_description ?? '';
        $success_story->description = $request->description ?? '';

        $success_story->image_1_attribute = $request->image_1_attribute ?? '';
        $success_story->image_2_attribute = $request->image_2_attribute ?? '';
        $success_story->image_3_attribute = $request->image_3_attribute ?? '';

        $success_story->updated_at = now();
        if ($success_story->save()) {
            session()->flash('success', "Success Story '" . $success_story->title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'success-stories');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the success story");
        }
    }
    //
    public function delete_success_story(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $success_story = SuccessStory::find($request->id);
            if ($success_story) {
                if (File::exists(public_path($success_story->image_1))) {
                    File::delete(public_path($success_story->image_1));
                }
                if (File::exists(public_path($success_story->image_1_webp))) {
                    File::delete(public_path($success_story->image_1_webp));
                }
                if (File::exists(public_path($success_story->image_2))) {
                    File::delete(public_path($success_story->image_2));
                }
                if (File::exists(public_path($success_story->image_2_webp))) {
                    File::delete(public_path($success_story->image_2_webp));
                }
                if (File::exists(public_path($success_story->image_3))) {
                    File::delete(public_path($success_story->image_3));
                }
                if (File::exists(public_path($success_story->image_3_webp))) {
                    File::delete(public_path($success_story->image_3_webp));
                }
                if ($success_story->delete()) {
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

    public function awards($success_story_id)
    {
        $key = "Create";
        $title = "Create Awards";
        $success_story = SuccessStory::find($success_story_id);
        $awards = SuccessAward::where('success_story_id', $success_story_id)->get();
        return view('app.success_story.awards.list', compact('key', 'title', 'success_story_id', 'awards', 'success_story'));
    }

    public function awards_create($success_story_id)
    {
        $title = "Success Story Add Awards";
        $type = "create";
        return view('app.success_story.awards.success_awards', compact('title', 'success_story_id', 'type'));
    }

    public function awards_store(Request $request)
    {
        if (isset($request->title) && $request->short_description != NULL) {
            $award = new SuccessAward;

            $award->success_story_id = $request->success_story_id;
            $award->title = $request->title;
            $award->short_description = $request->short_description;
            if ($request->hasFile('image')) {
                $award->image_webp = Helper::uploadWebpImage($request->image, 'uploads/award/image/webp/', $request->title);
                $award->image = Helper::uploadFile($request->image, 'uploads/award/image/', $request->title);
            }
            $sort_order = SuccessAward::where('success_story_id', $request->success_story_id)->latest('sort_order')->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $award->sort_order = $sort_number;
            if ($award->save()) {

                //$saved = $this->store_awards($request, $award);
                if ($award->save()) {
                    session()->flash('success', "Award has been updated successfully");
                } else {
                    session()->flash('error', "Error while updating the specification");
                }
            }
            return redirect(Helper::sitePrefix() . 'success-stories/awards/' . $request->success_story_id);
        }
    }


    //    public function awards_row(Request $request)
    //    {
    //        $primary_key = $request->unique_id + 1;
    //        return view('app.product.specification.product_extra_content', compact('primary_key'));
    //    }


    //    public function remove_awards_row(Request $request)
    //    {
    //        $productExtra = SuccessAward::find($request->id);
    //        if ($productExtra) {
    //            $deleted = $productExtra->delete();
    //            if ($deleted == true) {
    //                echo(json_encode(array('status' => true)));
    //            } else {
    //                echo(json_encode(array('status' => false, 'message' => 'Some error occurred,please try after sometime')));
    //            }
    //        } else {
    //            echo(json_encode(array('status' => false, 'message' => 'Not found')));
    //        }
    //    }


    public function awards_edit($id)
    {
        $title = "Product Edit Specification";
        $success_award = SuccessAward::where([['status', 'Active'], ['id', $id], ['deleted_at', Null]])->get()->first();
        $success_story_id = $success_award->success_story_id;
        $type = 'edit';
        // dd($SuccessAward);
        return view('app.success_story.awards.success_awards', compact('title', 'success_story_id', 'success_award', 'type'));
    }

    public function awards_update(Request $request, $id)
    {
        if (isset($request->title) ) {
            $head = new SuccessAward;
            if ($id == 0) {
                $award = new SuccessAward;
            } else {
                $award = SuccessAward::find($id);
                $award->updated_at = now();
            }

            $award->success_story_id = $request->success_story_id;
            $award->title = $request->title;
            $award->short_description = $request->short_description;

            if ($request->hasFile('image')) {
                if (File::exists(public_path($award->image))) {
                    File::delete(public_path($award->image));
                }
                if (File::exists(public_path($award->image_webp))) {
                    File::delete(public_path($award->image_webp));
                }
                $award->image_webp = Helper::uploadWebpImage($request->image, 'uploads/award/image/webp/', $request->title);
                $award->image = Helper::uploadFile($request->image, 'uploads/award/image/', $request->title);
            }


            if ($head->save()) {
                //    $saved = $this->store_specifications($request, $head);
                if ($head->save()) {
                    session()->flash('success', "Award has been updated successfully");
                } else {
                    session()->flash('error', "Error while updating the Award");
                }
            }
            return redirect(Helper::sitePrefix() . 'success-stories/awards/' . $request->success_story_id);
        }
    }


    public function delete_awards(Request $request)
    {

        if (isset($request->id) && $request->id != null) {
            $award = SuccessAward::find($request->id);
            if ($award) {

                if (File::exists(public_path($award->image))) {
                    File::delete(public_path($award->image));
                }
                if (File::exists(public_path($award->image_webp))) {
                    File::delete(public_path($award->image_webp));
                }

                // $speciications = SuccessAward::where('success_story_id', $request->success_story_id)->count();
                // if ($speciications > 0) {
                //     $speciications = SuccessAward::where('success_story_id', $request->success_story_id)->delete();
                // }
                $deleted = $award->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occurred,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
}