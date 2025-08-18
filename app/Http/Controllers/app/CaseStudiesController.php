<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\AboutUs;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CaseStudiesController extends Controller
{
     public function list()
    {
        $title = "Case Study List";
        $case_studies = CaseStudy::get();
        return view('app.home.casestudy.list', compact('case_studies', 'title'));
    }

    public function create()
    {
        $key = "Add";
        $title = "Add Case Study";
        return view('app.home.casestudy.form', compact('key', 'title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
        ]);

        $caseStudy = new CaseStudy();

        //upload image and logo in store
        if ($request->hasFile('image')) {
            $caseStudy->image_webp = Helper::uploadWebpImage($request->image, 'uploads/case-study/image/webp/', $request->short_url);
            $caseStudy->image = Helper::uploadFile($request->image, 'uploads/case-study/image/', $request->short_url);
        }
        
        //sort order logic
        $sort_order = CaseStudy::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $caseStudy->sort_order = $sort_number;
        
        $caseStudy->image_attribute = $request->image_attribute ?? '';
        $caseStudy->title = $validatedData['title'];

        $caseStudy->description = $request->description ?? '';

        $caseStudy->short_url = $request->short_url ?? '';
        $caseStudy->alternate_description = $request->alternate_description ?? '';

        if ($caseStudy->save()) {
            session()->flash('success', 'Case study has been added successfully');
            return redirect(Helper::sitePrefix(). 'home/case-study');
            
        } else {
            // If there was an error saving the case study, you can return an error message
            session()->flash('error', 'Error while adding doctor case study');
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Case Study";
        $case_study = CaseStudy::find($id);
        // dd($caseStudy);
        if ($case_study) {
            return view('app.home.casestudy.form', compact('case_study' , 'title', 'key'));
        } else {
            return view('app.errors.404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
        ]);

        $caseStudy = CaseStudy::find($id);
        if (!$caseStudy) {
            session()->flash('error', 'Case study not found');
            return redirect(Helper::sitePrefix() . 'home/case-study');
        }

        //upload image and logo in update
        if ($request->hasFile('image')) {
           
            if (File::exists(public_path($caseStudy->image))) {
                File::delete(public_path($caseStudy->image));
            }
            if (File::exists(public_path($caseStudy->webp_image))) {
                File::delete(public_path($caseStudy->webp_image));
            }
            $caseStudy->webp_image = Helper::uploadWebpImage($request->image, 'uploads/case-study/image/webp/', $request->short_url);
            $caseStudy->image = Helper::uploadFile($request->image, 'uploads/case-study/image/', $request->short_url);
        }

        $caseStudy->image_attribute = $request->image_attribute ?? '';
        $caseStudy->title = $validatedData['title'];
        $caseStudy->description = $validatedData['description'] ?? '';

        if ($caseStudy->save()) {
            session()->flash('success', 'Case study has been updated successfully');
            return redirect(Helper::sitePrefix() . 'home/case-study');
        } else {
            session()->flash('error', 'Error while updating case study');
            return redirect()->back();
        }
        
    }
    public function delete(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $caseStudy = CaseStudy::find($request->id);
            if ($caseStudy) {
                DB::beginTransaction();
                $deleted = $caseStudy->delete();
                if ($deleted == true) {
                    DB::commit();
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occurred, please try after sometime')));
                }
            } else {
                DB::rollBack();
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function case_study_popular(Request $request){
        $state = $request->state;
        $primary_key = $request->id;
        if($state=='true'){
            $status = "Yes";
        }else{
            $status = "No";
        }
        $data = DoctorCaseStudy::find($primary_key);
        if($data!=NULL){
            $data->popular = $status;
            if($data->save()){
                echo(json_encode(array('status'=>true,'message'=>'Popular option status has been changed')));
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Error while changing the popular option')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Client not found')));
        }
    }

}