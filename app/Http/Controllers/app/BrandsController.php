<?php

namespace App\Http\Controllers\app;


use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Company;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function list()
    {
        $title = "Brands List";
        $brandsList = Brands::orderBy('sort_order')->get();
        return view('app.home.brands.list', compact('brandsList', 'title'));
    }

    public function create()
    {
        $key = "Create";
        $title = "Add Brands";
        return view('app.home.brands.form', compact('key', 'title'));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:512',
        ]);
//        var_dump($request);
        $brands = new Brands;

        if ($request->hasFile('image')) {
            $brands->image_webp = Helper::uploadWebpImage($request->image, 'uploads/group-companies/image/', 'brands');
            $brands->image = Helper::uploadFile($request->image, 'uploads/group-companies/image/', 'brands');

        }

        $brands->title=$validatedData['title'];

        $sort_order = Brands::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $brands->sort_order = $sort_number;
        $brands->image_attribute = $request->image_attribute??'';


        if($brands->save()){
            session()->flash('success', 'Brands has been added successfully');
            return redirect(Helper::sitePrefix().'home/brands');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Brands";
        $brands = Brands::find($id);
        if($brands){
            return view('app.home.brands.form', compact('brands','title','key'));
        }else{
            return view('app/errors/404');
        }
    }

    public function update(Request $request, $id)
    {
        $brands =  Brands::find($id);
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:512',
            'image_meta_tag'=>'nullable|min:2|max:225',
        ]);

        if ($request->hasFile('image')) {
            $brands->image_webp = Helper::uploadWebpImage($request->image, 'uploads/group-companies/image/', 'brands');
            $brands->image = Helper::uploadFile($request->image, 'uploads/group-companies/image/', 'brands');
        }

        $brands->title=$validatedData['title'];

        $brands->updated_at = date('Y-m-d h:i:s');
        $brands->image_attribute = $request->image_attribute??'';

        if($brands->save()){
            session()->flash('success', 'Band has been updated successfully');
            return redirect(Helper::sitePrefix().'home/brands');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $brands = Brands::find($request->id);
            if($brands){
                Helper::deleteFile($brands, 'image');
                Helper::deleteFile($brands, 'image_webp');
                DB::beginTransaction();
                $deleted = $brands->delete();
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

    //company 
    public function company_list()
    {
        $title = "Company List";
        $brandsList = Company::orderBy('sort_order')->get();
        return view('app.companies.list', compact('brandsList', 'title'));
    }

    public function company_create()
    {
        $key = "Create";
        $title = "Add Company";
        return view('app.companies.form', compact('key', 'title'));
    }


    public function company_store(Request $request)
    {

        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:512',
        ]);
//        var_dump($request);
        $brands = new Company;

        if ($request->hasFile('image')) {
            $brands->image_webp = Helper::uploadWebpImage($request->image, 'uploads/group-companies/image/', 'brands');
            $brands->image = Helper::uploadFile($request->image, 'uploads/group-companies/image/', 'brands');

        }

        $brands->title=$validatedData['title'];

        $sort_order = Company::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $brands->sort_order = $sort_number;
        $brands->image_attribute = $request->image_attribute??'';
        $brands->link = $request->link??'';
        $brands->description = $request->description??'';


        if($brands->save()){
            session()->flash('success', 'Company has been added successfully');
            return redirect(Helper::sitePrefix().'companies');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function company_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Company";
        $brands = Company::find($id);
        if($brands){
            return view('app.companies.form', compact('brands','title','key'));
        }else{
            return view('app/errors/404');
        }
    }

    public function company_update(Request $request, $id)
    {
        $brands =  Company::find($id);
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:60',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:512',
            'image_meta_tag'=>'nullable|min:2|max:225',
        ]);

        if ($request->hasFile('image')) {
            $brands->image_webp = Helper::uploadWebpImage($request->image, 'uploads/group-companies/image/', 'brands');
            $brands->image = Helper::uploadFile($request->image, 'uploads/group-companies/image/', 'brands');
        }

        $brands->title=$validatedData['title'];

        $brands->updated_at = date('Y-m-d h:i:s');
        $brands->image_attribute = $request->image_attribute??'';
        $brands->link = $request->link??'';
        $brands->description = $request->description??'';

        if($brands->save()){
            session()->flash('success', 'Band has been updated successfully');
            return redirect(Helper::sitePrefix().'companies');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function company_delete(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $brands = Company::find($request->id);
            if($brands){
                Helper::deleteFile($brands, 'image');
                Helper::deleteFile($brands, 'image_webp');
                DB::beginTransaction();
                $deleted = $brands->delete();
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

}

