<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\SectionHeading;
use App\Models\Service;
use App\Models\ServiceFaq;
// use App\Models\ServiceGallery;
use App\Models\SubService;
use App\Models\ServiceFaqconnect;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }

    public function service()
    {
        $title = "Service List";
        $type = "service";
        $serviceList = Service::whereNull('parent_id')->latest()->get();
        $home_heading = SectionHeading::where('type', 'home_service')->first();
        $service_heading = SectionHeading::where('type', 'service_page')->first();

        return view('app.service.list', compact('serviceList', 'title', 'type', 'home_heading', 'service_heading'));
    }

    public function service_create()
    {
        $key = "Create";
        $type = "service";
        $title = "Create Service";
        return view('app.service.form', compact('key', 'title', 'type'));
    }

    public function service_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'category' => 'nullable|min:2|max:255',
            'short_description' => 'nullable|string|min:2',
            'description' => 'nullable|min:2',
            'alternate_description' => 'nullable|min:2',
            'image' => 'required',
        ]);
        

        $service = new Service;
        if ($request->hasFile('banner_image')) {
            $service->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/service/banner/', 'service');
            $service->banner_image = Helper::uploadFile($request->banner_image, 'uploads/service/banner/', 'service');
        }
        // service image
        if ($request->hasFile('image')) {
            $service->image_webp = Helper::uploadWebpImage($request->image, 'uploads/service/webp_image/', 'service');
            $service->image = Helper::uploadFile($request->image, 'uploads/service/image/', 'service');
        }
//        // alternate service image
       if ($request->hasFile('alternate_image')) {
           $service->alternate_image_webp = Helper::uploadWebpImage($request->alternate_image, 'uploads/service/alternate/webp_image/', 'service');
           $service->alternate_image = Helper::uploadFile($request->alternate_image, 'uploads/service/alternate/image/', 'service');
       }
//        // listing service image : homepage
//        if ($request->hasFile('list_image')) {
//            $service->list_image_webp = Helper::uploadWebpImage($request->list_image, 'uploads/service/list/', 'service_list');
//            $service->list_image = Helper::uploadFile($request->list_image, 'uploads/service/list/', 'service_list');
//        }

        $service->banner_image_attribute = $request->banner_image_attribute ?? '';
        $service->image_attribute = $request->image_attribute ?? '';
       $service->alternate_image_attribute = $request->alternate_image_attribute ?? '';
       $service->sub_title = $request->sub_title ?? '';
//        $service->list_image_attribute = $request->list_image_attribute ?? '';

        $service->title = $validatedData['title'];
        $service->short_url = $request->short_url ?? '';
        $service->banner_title = $request->banner_title ?? '';

        $service->short_description = $request->short_description ?? '';
        $service->description = $request->description ?? '';
        $service->alternate_description = $request->alternate_description ?? '';

        $service->benefits = $request->benefits ?? '';

        $service->meta_title = $request->meta_title ?? $validatedData['title'];
        $service->meta_description = $request->meta_description ?? $validatedData['title'];
        $service->meta_keyword = $request->meta_keyword ?? $validatedData['title'];
        $service->other_meta_tag = $request->other_meta_tag ?? '';

        $sort_order = Service::orderBy('sort_order', 'DESC')->whereNull('parent_id')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $service->sort_order = $sort_number;
        if ($service->save()) {
            session()->flash('success', 'Service "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix() . 'service/');
        } else {
            return back()->with('message', 'Error while creating Service');
        }
    }

    public function service_edit(Request $request, $id)
    {
        $key = "Update";
        $type = "service";
        $title = "Update Service";
        $service = Service::find($id);
        if ($service) {
            return view('app.service.form', compact('key', 'title', 'service', 'type'));
        } else {
            return view('web.error.404');
        }
    }

    public function service_update(Request $request, $id)
    {
        $service = Service::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'category' => 'nullable|min:2|max:255',

            'short_description' => 'nullable|string|min:2',
            'description' => 'nullable|min:2',
            'alternate_description' => 'nullable|min:2',

        ]);
        
        if ($request->hasFile('banner_image')) {
            Helper::deleteFile($service, 'banner_image');
            Helper::deleteFile($service, 'banner_image_webp');
            $service->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/service/banner/', 'service');
            $service->banner_image = Helper::uploadFile($request->banner_image, 'uploads/service/banner/', 'service');
        }
        // service image
        if ($request->hasFile('image')) {
            Helper::deleteFile($service, 'image');
            Helper::deleteFile($service, 'image_webp');
            $service->image_webp = Helper::uploadWebpImage($request->image, 'uploads/service/image/', 'service');
            $service->image = Helper::uploadFile($request->image, 'uploads/service/image/', 'service');
        }
        // alternate service image
        if ($request->hasFile('alternate_image')) {
            Helper::deleteFile($service, 'alternate_image');
            Helper::deleteFile($service, 'alternate_image_webp');
            $service->alternate_image_webp = Helper::uploadWebpImage($request->alternate_image, 'uploads/service/alternate/', 'service');
            $service->alternate_image = Helper::uploadFile($request->alternate_image, 'uploads/service/alternate/', 'service');
        }
//
//        // listing service image : homepage
//        if ($request->hasFile('list_image')) {
//            Helper::deleteFile($service, 'list_image');
//            Helper::deleteFile($service, 'list_image_webp');
//            $service->list_image_webp = Helper::uploadWebpImage($request->list_image, 'uploads/service/list/', 'service_list');
//            $service->list_image = Helper::uploadFile($request->list_image, 'uploads/service/list/', 'service_list');
//        }

        $service->banner_image_attribute = $request->banner_image_attribute ?? '';
        $service->image_attribute = $request->image_attribute ?? '';
//        $service->alternate_image_attribute = $request->alternate_image_attribute ?? '';
//        $service->list_image_attribute = $request->list_image_attribute ?? '';
        $service->sub_title = $request->sub_title ?? '';

        $service->title = $validatedData['title'];
        $service->short_url = $request->short_url ?? '';
        $service->banner_title = $request->banner_title ?? '';
        $service->benefits = $request->benefits ?? '';

        $service->short_description = $request->short_description ?? '';
        $service->description = $request->description ?? '';
        $service->alternate_description = $request->alternate_description ?? '';

        $service->meta_title = $request->meta_title ?? $validatedData['title'];
        $service->meta_description = $request->meta_description ?? $validatedData['title'];
        $service->meta_keyword = $request->meta_keyword ?? $validatedData['title'];
        $service->other_meta_tag = $request->other_meta_tag ?? '';
        $service->updated_at = date('Y-m-d h:i:s');

        if ($service->save()) {
            session()->flash('success', "Service '" . $service->title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'service');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the service");
        }
    }

    public function service_delete(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $service = Service::find($request->id);
            if ($service) {
                if ($service->sub->count() > 0) {
                    echo(json_encode(array('status' => false, 'message' => 'Service ' . $service->title . ' has sub services')));
                } else {
                    Helper::deleteFile($service, 'banner_image');
                    Helper::deleteFile($service, 'banner_image_webp');
                    $deleted = $service->delete();
                    if ($deleted == true) {
                        echo(json_encode(array('status' => true, 'message' => 'Service deleted successfully')));
                    } else {
                        echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'The requested service not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function sub_service()
    {
        $title = "Sub-service List";
        $subserviceList = Service::whereNotNull('parent_id')->latest()->get();
        $type = 'sub-service';
        return view('app.service.sub_service.list', compact('subserviceList','title', 'type'));
    }

    public function sub_service_create()
    {
        $key = "Create";
        $title = "Create Sub Service";
        $type = "sub-service";
        $parentServices = Service::whereNull('parent_id')->active()->get();
        return view('app.service.sub_service.form', compact('key', 'title', 'type','parentServices'));
    }

    public function sub_service_store(Request $request)
    {
        // var_dump($request->pros);
        DB::beginTransaction();

        $validatedData = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|min:2|max:255',
            // 'sub_title' => 'nullable|min:2|max:255',
            // 'banner_title' => 'nullable|min:2|max:255',
            // 'banner_sub_title' => 'nullable|min:2|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);

        $serviceShortExist = Service::where('short_url', $request->short_url)->count();

            $service = new Service;

            if ($request->hasFile('image')) {
                $service->image_webp = Helper::uploadWebpImage($request->image, 'uploads/service/image_webp/', 'service');
                $service->image = Helper::uploadFile($request->image, 'uploads/service/image/', 'service');
            }
            if ($request->hasFile('alternate_image')) {
                $service->alternate_image_webp = Helper::uploadWebpImage($request->alternate_image, 'uploads/service/alternate_image_webp/', 'service');
                $service->alternate_image = Helper::uploadFile($request->alternate_image, 'uploads/service/alternate_image/', 'service');
            }
            if ($request->hasFile('menu_image')) {
                $service->menu_image_webp = Helper::uploadWebpImage($request->menu_image, 'uploads/service/menu_image_webp/', 'service');
                $service->menu_image = Helper::uploadFile($request->menu_image, 'uploads/service/menu_image/', 'service');
            }
            if ($request->hasFile('banner_image')) {
                $service->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/service/banner_image_webp/', 'service');
                $service->banner_image = Helper::uploadFile($request->banner_image, 'uploads/service/banner_image/', 'service');
            }
            if ($request->hasFile('list_image')) {
                $service->list_image_webp = Helper::uploadWebpImage($request->list_image, 'uploads/service/list_image_webp/', 'service');
                $service->list_image = Helper::uploadFile($request->list_image, 'uploads/service/list_image/', 'service');
            }

            $service->parent_id = $validatedData['parent_id'];
            $service->title = $validatedData['title'];
            $service->short_url = '';
            // $service->sub_title = $validatedData['sub_title'];
            $service->image_attribute = $request->image_attribute ?? '';
            $service->alternate_image_attribute = $request->alternate_image_attribute ?? '';
            $service->menu_image_attribute = $request->menu_image_attribute ?? '';
            $service->description = $request->description ?? '';
            $service->alternate_description = $request->alternate_description ?? '';
            $service->banner_title = $request->banner_title ?? '';
            // $service->banner_sub_title = $request->banner_sub_title ?? '';
            $service->banner_image_attribute = $request->banner_image_attribute ?? '';
            $service->meta_title = $request->meta_title ?? '';
            $service->meta_description = $request->meta_description ?? '';
            $service->meta_keyword = $request->meta_keyword ?? '';
            $service->other_meta_tag = $request->other_meta_tag ?? '';
            $sort_order = Service::whereNotNull('parent_id')->where('parent_id', $validatedData['parent_id'])
                ->orderBy('sort_order', 'DESC')->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $service->sort_order = $sort_number;

            if ($service->save()) {
                // $service->syncGallery()->sync($request->gallery);
                session()->flash('success', "Sub-services '" . $service->title . "' has been added successfully");
                DB::commit();
                return redirect(Helper::sitePrefix() . 'service/sub-services');
            } else {
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the sub-service");
            }
    }

    public function sub_service_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Sub Service";
        $sub = Service::find($id);
        if ($sub) {
            $parentServices = Service::whereNull('parent_id')->active()->get();
            $type = "sub-service";
            return view('app.service.sub_service.form', compact('key', 'title', 'parentServices',
                'type', 'sub'));
        } else {
            return view('web.error.404');
        }
    }

    public function sub_service_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|min:2|max:255',
            // 'sub_title' => 'nullable|min:2|max:255',
            'banner_title' => 'nullable|min:2|max:255',
            // 'banner_sub_title' => 'nullable|min:2|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'alternate_image' => 'image|mimes:jpeg,png,jpg|max:512',
            'menu_image' => 'image|mimes:jpeg,png,jpg|max:512',
            'banner_image' => 'image|mimes:jpeg,png,jpg|max:512',
        ]);

        $service = Service::find($id);
        if ($service) {

            if ($request->hasFile('image')) {
                Helper::deleteFile($service, 'image');
                Helper::deleteFile($service, 'image_webp');
                $service->image_webp = Helper::uploadWebpImage($request->image, 'uploads/service/image_webp/', 'service');
                $service->image = Helper::uploadFile($request->image, 'uploads/service/image/', 'service');
            }
            if ($request->hasFile('alternate_image')) {
                Helper::deleteFile($service, 'alternate_image');
                Helper::deleteFile($service, 'alternate_image_webp');
                $service->alternate_image_webp = Helper::uploadWebpImage($request->alternate_image, 'uploads/service/alternate_image_webp/', 'service');
                $service->alternate_image = Helper::uploadFile($request->alternate_image, 'uploads/service/alternate_image/', 'service');
            }
            if ($request->hasFile('menu_image')) {
                Helper::deleteFile($service, 'menu_image');
                Helper::deleteFile($service, 'menu_image_webp');
                $service->menu_image_webp = Helper::uploadWebpImage($request->menu_image, 'uploads/service/menu_image_webp/', 'service');
                $service->menu_image = Helper::uploadFile($request->menu_image, 'uploads/service/menu_image/', 'service');
            }
            if ($request->hasFile('banner_image')) {
                Helper::deleteFile($service, 'banner_image_webp');
                Helper::deleteFile($service, 'banner_image');
                $service->banner_image_webp = Helper::uploadWebpImage($request->banner_image, 'uploads/service/banner_image_webp/', 'service');
                $service->banner_image = Helper::uploadFile($request->banner_image, 'uploads/service/banner_image/', 'service');
            }
            if ($request->hasFile('list_image')) {
                Helper::deleteFile($service, 'list_image_webp');
                Helper::deleteFile($service, 'list_image');
                $service->list_image_webp = Helper::uploadWebpImage($request->list_image, 'uploads/service/list_image_webp/', 'service');
                $service->list_image = Helper::uploadFile($request->list_image, 'uploads/service/list_image/', 'service');
            }

            $service->parent_id = $validatedData['parent_id'];
            $service->title = $validatedData['title'];
            // $service->sub_title = $validatedData['sub_title'];
            $service->image_attribute = $request->image_attribute ?? '';
            $service->alternate_image_attribute = $request->alternate_image_attribute ?? '';
            $service->menu_image_attribute = $request->menu_image_attribute ?? '';
            $service->description = $request->description ?? '';
            $service->alternate_description = $request->alternate_description ?? '';
            $service->banner_title = $request->banner_title ?? '';
            $service->short_description = $request->short_description ?? '';
            $service->banner_image_attribute = $request->banner_image_attribute ?? '';
            $service->meta_title = $request->meta_title ?? '';
            $service->meta_description = $request->meta_description ?? '';
            $service->meta_keyword = $request->meta_keyword ?? '';
            $service->other_meta_tag = $request->other_meta_tag ?? '';
            $service->updated_at = date('Y-m-d h:i:s');
            if ($service->save()) {
                // $service->syncGallery()->sync($request->gallery);
                session()->flash('success', "Sub-service '" . $service->title . "' has been updated successfully");
                return redirect(Helper::sitePrefix() . 'service/sub-services');
            } else {
                return back()->withInput($request->input())->withErrors("Error while updating the sub-service");
            }
        } else {
            return view('web.error.404');
        }
    }

    public function delete_sub_service(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $service = Service::find($request->id);
            if ($service) {
                Helper::deleteFile($service, 'image');
                Helper::deleteFile($service, 'webp_image');
                Helper::deleteFile($service, 'alternate_image');
                Helper::deleteFile($service, 'alternate_webp_image');
                Helper::deleteFile($service, 'desktop_banner');
                Helper::deleteFile($service, 'desktop_banner_webp');
                Helper::deleteFile($service, 'mobile_banner');
                Helper::deleteFile($service, 'mobile_banner_webp');
                $deleted = $service->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true, 'message' => 'Sub service deleted successfully')));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'The sub service not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    // public function faq($service_id)
    // {
    //     $service = Service::find($service_id);
    //     $title = " Service List - " . $service->title;
    //     $faqList = ServiceFaq::where('service_id', $service_id)->get();
    //     return view('app.service.sub_service.faq.list', compact('faqList', 'title', 'service_id', 'service'));
    // }


    public function faq_create()
    {
        $service = 1;
        $key = "Create";
        $title = "Create  FAQ";
        $services = Service::active()->orderBy('sort_order')->get();
        return view('app.service.faq.form', compact('key', 'title', 'service', 'services'));
    }

    // public function faq_store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'question' => 'required|min:2|max:230',
    //         'answer' => 'required',
    //     ]);
    //     $faq = new ServiceFaq();

    //     $faq->question = $validatedData['question'];
    //     $faq->service_id = $request->service_id;
    //     $faq->answer = $request->answer;
    //     $sort_order = ServiceFaq::where('service_id', $request->service_id)->orderBy('sort_order', 'DESC')->first();
    //     if ($sort_order) {
    //         $sort_number = ($sort_order->sort_order + 1);
    //     } else {
    //         $sort_number = 1;
    //     }
    //     $faq->sort_order = $sort_number;
    //     if ($faq->save()) {
    //         session()->flash('success', "FAQ has been added successfully");
    //         return redirect(Helper::sitePrefix() . 'service/sub-service/faq/' . $request->service_id);
    //     } else {
    //         return back()->with('success', 'Error while creating the FAQ');
    //     }
    // }

   public function faq()
    {
        $title = "Faqs List";
        $type = "faq";
        $faqList = ServiceFaqconnect::latest()->get();
        return view('app.service.faq.list', compact('faqList', 'title', 'type'));
    }
 public function faq_store(Request $request)
    {
        $validatedData = $request->validate([
            'service_id'=>'required',
            'question' => 'required|min:2|max:230',
            'answer' => 'required',
        ]);

        $services = $request->service_id;
        $connect=new ServiceFaqconnect();
        $connect->question=$validatedData['question'];
        $connect->answer=$request->answer;
        $connect->status='Active';

        $connect->save();
        $conid=ServiceFaqconnect::latest()->first();
        $apconid=$conid->id;
        foreach ($services as $item) {

            //echo $item . '<br>';

            $faq = new ServiceFaq();
            $faq->service_id = $item;
            $faq->question = $validatedData['question'];
            $faq->answer = $request->answer;
            $faq->connectid = $apconid;
            $sort_order = ServiceFaq::where('service_id', $item)->orderBy('sort_order', 'DESC')->first();

            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }

            $faq->sort_order = $sort_number;

            $faq->save();
        }

        if ($faq->save()) {
            session()->flash('success', "FAQ has been added successfully");
            return redirect(Helper::sitePrefix() . 'service/faq');
        } else {
            return back()->with('success', 'Error while creating the FAQ');
        }

    }

    public function faq_edit(Request $request, $id)
    {
        $id=$id;
        $key = "Update";
        $faq = ServiceFaqconnect::find($id);
        $title = "Update FAQ";
        $services = Service::active()->orderBy('sort_order')->get();
        if ($faq) {
            $service_id = $faq->service_id;
            $service = Service::find($service_id);
            return view('app.service.faq.form', compact('key', 'faq', 'title', 'service_id', 'service','services','id'));
        } else {
           // return view('app.error.404');
        }
    }

    public function faq_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:2|max:230',
            'answer' => 'required',
        ]);

            $services = $request->service_id;
            $connect=ServiceFaqconnect::find($id);
            $connect->question=$validatedData['question'];
            $connect->answer=$request->answer;
            $connect->save();
            ServiceFaq::where('connectid',$id)->delete();
        foreach ($services as $item) {

            //echo $item . '<br>';

            $faq = new ServiceFaq();
            $faq->service_id = $item;
            $faq->question = $validatedData['question'];
            $faq->answer = $request->answer;
            $faq->connectid = $id;
            $sort_order = ServiceFaq::where('service_id', $item)->orderBy('sort_order', 'DESC')->first();

            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }

            $faq->sort_order = $sort_number;

            $faq->save();
        }
        $faq->updated_at = date('Y-m-d h:i:s');
        if ($faq->save()) {
            session()->flash('success', "FAQ has been updated successfully");
            return redirect(Helper::sitePrefix() . 'service/faq/');
        } else {
            return back()->with('success', 'Error while creating the FAQ');
        }
    }

    public function faq_delete(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $faq = ServiceFaqconnect::find($request->id);
            if ($faq) {
             ServiceFaq::where('connectid',$request->id)->delete();
                $deleted = $faq->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    }
