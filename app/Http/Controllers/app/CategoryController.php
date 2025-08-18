<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Category;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function category_list()
    {
        $title = "Category List";
        $categoryList = Category::whereNull('parent_id')->get();
        $type = 'Category';
        $urlType = 'category';
        return view('app.product.category.list', compact('categoryList', 'title', 'type', 'urlType'));
    }

    public function category_create()
    {
        $key = "Create";
        $title = "Create Category";
        $type = 'Category';
        $urlType = 'category';
        $typeFlag = 'category';
        return view('app.product.category.form', compact('key', 'title', 'type', 'urlType', 'typeFlag'));
    }

    public function category_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required|unique:categories,short_url,NULL,id,deleted_at,NULL',
            'icon' => 'image|mimes:png|max:512',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'image_attribute' => 'required',
        ]);
        $category = new Category;
        if ($request->hasFile('icon')) {
            $category->icon_webp = Helper::uploadWebpImage($request->icon, 'uploads/category/icon/webp/', $request->short_url);
            $category->icon = Helper::uploadFile($request->icon, 'uploads/category/icon/', $request->short_url);
        }
        if ($request->hasFile('image')) {
            $category->image_webp = Helper::uploadWebpImage($request->image, 'uploads/category/image/webp/', $request->short_url);
            $category->image = Helper::uploadFile($request->image, 'uploads/category/image/', $request->short_url);
        }
        if ($request->hasFile('desktop_banner')) {
            $category->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/category/desktop_banner/webp/', $request->short_url);
            $category->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/category/desktop_banner/', $request->short_url);
        }
        if ($request->hasFile('mobile_banner')) {
            $category->mobile_banner_webp = Helper::uploadWebpImage($request->mobile_banner, 'uploads/category/mobile_banner/webp/', $request->short_url);
            $category->mobile_banner = Helper::uploadFile($request->mobile_banner, 'uploads/category/mobile_banner/', $request->short_url);
        }
        $category->title = ucfirst($validatedData['title']);
        $category->short_url = $validatedData['short_url'];
        $category->parent_id = null;

        $category->image_attribute = $request->image_attribute ?? '';
        $category->banner_attribute = $request->banner_attribute ?? '';
        $category->banner_title = $request->banner_title ?? '';
        $category->banner_sub_title = $request->banner_sub_title ?? '';


        $meta_title = $request->meta_title ?? '';
        $meta_description = $request->meta_description ?? '';
        $meta_keyword = $request->meta_keyword ?? '';
        $other_meta_tag = $request->other_meta_tag ?? '';

        if($meta_title==''){
           $category->meta_title = strtoupper($validatedData['title']) ;
        }
        else{
           $category->meta_title = $request->meta_title ?? '';
        }
        if($meta_description==''){
           $category->meta_description = strtoupper($validatedData['title']) ;
        }
        else{
           $category->meta_description = $request->meta_description ?? '';
        }
        if($meta_keyword==''){
           $category->meta_keyword = strtoupper($validatedData['title']) ;
        }
        else{
           $category->meta_keyword = $request->meta_keyword ?? '';
        }
        if($other_meta_tag==''){
           $category->other_meta_tag = strtoupper($validatedData['title']) ;
        }
        else{
           $category->other_meta_tag = $request->other_meta_tag ?? '';
        }



        $category->description = $request->description ?? '';
        $category->subtitle = $request->subtitle ?? '';
        if ($category->save()) {
            session()->flash('message', "Category '" . $category->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/category');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function category_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update category";
        $category = Category::find($id);
        $type = 'Category';
        $urlType = 'category';
        $typeFlag = 'category';
        if ($category) {
            return view('app.product.category.form', compact('key', 'category', 'title', 'type', 'urlType', 'typeFlag'));
        } else {
            return view('backend.error.404');
        }
    }

    public function category_update(Request $request, $id)
    {
        $category = Category::find($id);
        dd($request);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255'
        ]);
        // if ($request->hasFile('icon')) {
        //     if (File::exists(public_path($category->icon))) {
        //         File::delete(public_path($category->icon));
        //     }
        //     if (File::exists(public_path($category->icon_webp))) {
        //         File::delete(public_path($category->icon_webp));
        //     }
        //     $category->icon_webp = Helper::uploadWebpImage($request->icon, 'uploads/category/icon/webp/', $request->short_url);
        //     $category->icon = Helper::uploadFile($request->icon, 'uploads/category/icon/', $request->short_url);
        // }
        // if ($request->hasFile('image')) {
        //     if (File::exists(public_path($category->image))) {
        //         File::delete(public_path($category->image));
        //     }
        //     if (File::exists(public_path($category->image_webp))) {
        //         File::delete(public_path($category->image_webp));
        //     }
        //     $category->image_webp = Helper::uploadWebpImage($request->image, 'uploads/category/image/webp/', $request->short_url);
        //     $category->image = Helper::uploadFile($request->image, 'uploads/category/image/', $request->short_url);
        // }
        // if ($request->hasFile('desktop_banner')) {
        //     if (File::exists(public_path($category->desktop_banner))) {
        //         File::delete(public_path($category->desktop_banner));
        //     }
        //     if (File::exists(public_path($category->desktop_banner_webp))) {
        //         File::delete(public_path($category->desktop_banner_webp));
        //     }
        //     $category->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/category/desktop_banner/webp/', $request->short_url);
        //     $category->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/category/desktop_banner/', $request->short_url);
        // }
        // if ($request->hasFile('mobile_banner')) {
        //     if (File::exists(public_path($category->mobile_banner))) {
        //         File::delete(public_path($category->mobile_banner));
        //     }
        //     if (File::exists(public_path($category->mobile_banner_webp))) {
        //         File::delete(public_path($category->mobile_banner_webp));
        //     }
        //     $category->mobile_banner_webp = Helper::uploadWebpImage($request->mobile_banner, 'uploads/category/mobile_banner/webp/', $request->short_url);
        //     $category->mobile_banner = Helper::uploadFile($request->mobile_banner, 'uploads/category/mobile_banner/', $request->short_url);
        // }
        $category->title = ucfirst($validatedData['title']);
        $category->short_url = $validatedData['short_url'];
        $category->parent_id = null;
        $category->image_attribute = $request->image_attribute ?? '';
        $category->banner_attribute = $request->banner_attribute ?? '';
        $category->banner_title = $request->banner_title ?? '';
        $category->banner_sub_title = $request->banner_sub_title ?? '';





        $meta_title = $request->meta_title ?? '';
        $meta_description = $request->meta_description ?? '';
        $meta_keyword = $request->meta_keyword ?? '';
        $other_meta_tag = $request->other_meta_tag ?? '';

        if($meta_title==''){
           $category->meta_title = strtoupper($validatedData['title']) ;
        }
        else{
           $category->meta_title = $request->meta_title ?? '';
        }
        if($meta_description==''){
           $category->meta_description = strtoupper($validatedData['title']) ;
        }
        else{
           $category->meta_description = $request->meta_description ?? '';
        }
        if($meta_keyword==''){
           $category->meta_keyword = strtoupper($validatedData['title']) ;
        }
        else{
           $category->meta_keyword = $request->meta_keyword ?? '';
        }
        if($other_meta_tag==''){
           $category->other_meta_tag = strtoupper($validatedData['title']) ;
        }
        else{
           $category->other_meta_tag = $request->other_meta_tag ?? '';
        }





        $category->description = $request->description ?? '';
        $category->subtitle = $request->subtitle ?? '';

        $category->updated_at = now();
        if ($category->save()) {
            session()->flash('message', "Category '" . $category->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/category');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_category(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $category = Category::find($request->id);
            if ($category) {
                $childCategory = Category::where('parent_id', $request->id)->count();
                if ($childCategory > 0) {
                    return response()->json(['status' => false, 'message' => 'Error : Category "' . $category->title . '" has child entries']);
                } else {
                    if (File::exists(public_path($category->image))) {
                        File::delete(public_path($category->image));
                    }
                    if (File::exists(public_path($category->image_webp))) {
                        File::delete(public_path($category->image_webp));
                    }
                    if (File::exists(public_path($category->desktop_banner))) {
                        File::delete(public_path($category->desktop_banner));
                    }
                    if (File::exists(public_path($category->desktop_banner_webp))) {
                        File::delete(public_path($category->desktop_banner_webp));
                    }
                    if (File::exists(public_path($category->mobile_banner))) {
                        File::delete(public_path($category->mobile_banner));
                    }
                    if (File::exists(public_path($category->mobile_banner_webp))) {
                        File::delete(public_path($category->mobile_banner_webp));
                    }
                    if ($category->delete()) {
                        return response()->json(['status' => true]);
                    } else {
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

}
