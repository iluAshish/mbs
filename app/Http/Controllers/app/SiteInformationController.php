<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
// use App\Models\QuckLink;
use App\Models\SiteInformation;
// use App\Models\VisitLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SiteInformationController extends Controller
{
    //

    public function site_information()
    {
        $key = "Update";
        $title = "Site Settings";
        $siteInformation = SiteInformation::first();

        return view('app.site_information.form',compact('key','title','siteInformation'));
    }

    public function site_information_store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|min:2|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg|max:512',
            'dashboard_logo' => 'image|mimes:jpeg,png,jpg|max:512',
            'footer_logo' => 'image|mimes:jpeg,png,jpg|max:512',
            'call_free' => 'nullable|min:2|max:20',
            'copyright' => 'nullable|min:2',
            'logo_attribute' => 'nullable|min:2|max:255',
            'footer_logo_attribute' => 'nullable|min:2|max:255',
        ]);

        if($request->id==0){
            $siteInformation = new SiteInformation();
        }else{
            $siteInformation = SiteInformation::find($request->id);
            $siteInformation->updated_at = date('Y-m-d h:i:s');
        }

        if ($request->hasFile('logo')) {
            Helper::deleteFile($siteInformation, 'logo');
            Helper::deleteFile($siteInformation, 'logo_webp');
            $siteInformation->logo_webp = Helper::uploadWebpImage($request->logo,  'uploads/site_information/logo_webp/', 'logo');
            $siteInformation->logo = Helper::uploadFile($request->logo,  'uploads/site_information/logo/', 'logo');
        }

        if ($request->hasFile('dashboard_logo')) {
            Helper::deleteFile($siteInformation, 'dashboard_logo');
            Helper::deleteFile($siteInformation, 'dashboard_logo_webp');
            $siteInformation->dashboard_logo_webp = Helper::uploadWebpImage($request->dashboard_logo,  'uploads/site_information/dashboard_logo/', 'dashboard_logo');
            $siteInformation->dashboard_logo = Helper::uploadFile($request->dashboard_logo,  'uploads/site_information/dashboard_logo/', 'dashboard_logo');
        }
       if ($request->hasFile('footer_logo')) {
               Helper::deleteFile($siteInformation, 'footer_logo');
               Helper::deleteFile($siteInformation, 'footer_logo_webp');
           $siteInformation->footer_logo_webp = Helper::uploadWebpImage($request->footer_logo,  'uploads/site_information/footer_logo_webp/','footer_logo');
           $siteInformation->footer_logo = Helper::uploadFile($request->footer_logo,  'uploads/site_information/footer_logo/','footer_logo');
       }
        $siteInformation->brand_name = $request->brand_name??'';

        $siteInformation->logo_attribute = $request->logo_attribute??'';
        $siteInformation->dashboard_logo_attribute = $request->dashboard_logo_attribute ?? '';

        $siteInformation->email = $request->email??'';
        $siteInformation->alternate_email = $request->alternate_email??'';
        $siteInformation->email_recipient = $request->email_recipient??'';
        $siteInformation->phone = $request->phone??'';
        $siteInformation->landline = $request->landline??'';
        $siteInformation->whatsapp_number = $request->whatsapp_number??'';

        // social media links
        $siteInformation->facebook_url = $request->facebook_url??'';
        $siteInformation->instagram_url = $request->instagram_url??'';
        $siteInformation->twitter_url = $request->twitter_url??'';
        $siteInformation->linkedin_url = $request->linkedin_url??'';
        $siteInformation->youtube_url = $request->youtube_url??'';
        $siteInformation->pinterest_url = $request->pinterest_url??'';
        $siteInformation->snapchat_url = $request->snapchat_url??'';
        $siteInformation->telegram_url = $request->telegram_url??'';
        $siteInformation->tiktok_url = $request->tiktok_url??'';

        $siteInformation->footer_logo_attribute = $request->footer_logo_attribute??'';
        $siteInformation->footer_location = $request->footer_location??'';

        $siteInformation->company_info_footer = $request->company_info_footer??'';
        $siteInformation->copyright = $request->copyright??'';

        $siteInformation->terms_and_conditions = $request->terms_and_conditions??'';
        $siteInformation->privacy_policy = $request->privacy_policy??'';

        $siteInformation->working_hours = $request->working_hours??'';


        if($siteInformation->save()){
            session()->flash('success', 'Site information has been updated successfully');
            return redirect(Helper::sitePrefix().'site-settings');
        }else{
            return back()->with('error', 'Error while updating the site information');
        }
    }

    // Visit Us Link

    // public function visit_us()
    // {
    //     $title = "Visit Us Link";
    //     $visitLink = VisitLink::orderBy('sort_order')->get();

    //     return view('app.site_information.visit_us.list', compact('visitLink', 'title'));
    // }

    // public function visit_us_create()
    // {
    //     $key = "Create";
    //     $label = "Visit Us Link";
    //     $title = "Add Visit Us Link";
    //     return view('app.site_information.visit_us.form', compact('key', 'label','title'));
    // }


    // public function visit_us_store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title'=>'required|min:2|max:60',
    //         'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
    //         'image_attribute'=>'nullable|min:2|max:225',
    //     ]);

    //     $associate = new VisitLink;

    //     if ($request->hasFile('image')) {
    //         $associate->image_webp = Helper::uploadWebpImage($request->image, 'uploads/visit-us/image/', 'visit_us');
    //         $associate->image = Helper::uploadFile($request->image, 'uploads/visit-us/image/', 'visit_us');
    //     }

    //     $associate->title=$validatedData['title'];

    //     $sort_order = VisitLink::orderBy('sort_order', 'DESC')->first();
    //     if ($sort_order) {
    //         $sort_number = ($sort_order->sort_order + 1);
    //     } else {
    //         $sort_number = 1;
    //     }
    //     $associate->url = $request->url??'';
    //     $associate->sort_order = $sort_number;
    //     $associate->image_attribute = $request->image_attribute??'';

    //     if($associate->save()){
    //         session()->flash('success', 'Visit us link has been added successfully');
    //         return redirect(Helper::sitePrefix().'site-settings/visit-us');
    //     }else{
    //         return back()->withInput($request->input())->withErrors("Error while updating the content");
    //     }
    // }

    // public function visit_us_edit(Request $request, $id)
    // {
    //     $key = "Update";
    //     $label = "Visit Us Link";
    //     $title = "Update Visit Us Link";
    //     $visitLink = VisitLink::find($id);
    //     if($visitLink){
    //         return view('app.site_information.visit_us.form', compact('visitLink','title','key','label'));
    //     }else{
    //         return view('app/errors/404');
    //     }
    // }

    // public function visit_us_update(Request $request, $id)
    // {
    //     $associate =  VisitLink::find($id);
    //     $validatedData = $request->validate([
    //         'title'=>'required|min:2|max:60',
    //         'image' => 'image|mimes:jpeg,png,jpg|max:512',
    //         'image_meta_tag'=>'nullable|min:2|max:225',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $associate->image_webp = Helper::uploadWebpImage($request->image, 'uploads/visit-us/image/', 'visit_us');
    //         $associate->image = Helper::uploadFile($request->image, 'uploads/visit-us/image/', 'visit_us');
    //     }

    //     $associate->title=$validatedData['title'];
    //     $associate->url = $request->url??'';
    //     $associate->updated_at = date('Y-m-d h:i:s');
    //     $associate->image_attribute = $request->image_attribute??'';

    //     if($associate->save()){
    //         session()->flash('success', 'Visit us link has been updated successfully');
    //         return redirect(Helper::sitePrefix().'site-settings/visit-us');
    //     }else{
    //         return back()->withInput($request->input())->withErrors("Error while updating the content");
    //     }
    // }

    // public function delete_visit_us(Request $request){
    //     if(isset($request->id) && $request->id!=NULL){
    //         $associate = VisitLink::find($request->id);
    //         if($associate){
    //             Helper::deleteFile($associate, 'image');
    //             Helper::deleteFile($associate, 'image_webp');
    //             DB::beginTransaction();
    //             $deleted = $associate->delete();
    //             if($deleted==true){
    //                 DB::commit();
    //                 echo(json_encode(array('status'=>true)));
    //             }else{
    //                 echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
    //             }
    //         }else{
    //             DB::rollBack();
    //             echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
    //         }
    //     }else{
    //         echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
    //     }
    // }

// // Quick Links / Footer Menu CRUD
// public function quick_links(){

//     $title = "Quick Links";
//     $quickLinkList = QuckLink::active()->orderBy('sort_order')->get();
//     return view('app.quick_link.list', compact('quickLinkList', 'title'));
// }
// public function quick_links_create()
// {
//     $key = "Create";
//     $title = "Add Quick Link";
//     return view('app.quick_link.form', compact('key', 'title'));
// }
// public function quick_links_store(Request $request)
// {
//     $validatedData = $request->validate([
//         'title'=>'required|min:2|max:60',
//         'url' => 'required|min:2|max:255',
//     ]);

//     $quickLink = new QuckLink;

//     $quickLink->title=$validatedData['title'];
//     $quickLink->url=$validatedData['url'];

//     $sort_order = QuckLink::orderBy('sort_order', 'DESC')->first();

//     if ($sort_order) {
//         $sort_number = ($sort_order->sort_order + 1);
//     } else {
//         $sort_number = 1;
//     }

//     $quickLink->sort_order = $sort_number;

//     if($quickLink->save()){
//         session()->flash('success', 'Quick Link has been added successfully');
//         return redirect(Helper::sitePrefix().'quick-links');
//     }else{
//         return back()->withInput($request->input())->withErrors("Error while updating the content");
//     }
// }
// public function quick_links_edit(Request $request, $id)
// {
//     $key = "Update";
//     $title = "Update Quick Link";
//     $quickLink = QuckLink::find($id);
//     if($quickLink){
//         return view('app.quick_link.form', compact('quickLink','title','key'));
//     }else{
//         return view('app/errors/404');
//     }
// }
// public function quick_links_update(Request $request, $id)
// {
//     $quickLink =  QuckLink::find($id);

//     $validatedData = $request->validate([
//         'title'=>'required|min:2|max:60',
//         'url'=>'required|min:2|max:255',
//     ]);

//     $quickLink->title=$validatedData['title'];
//     $quickLink->url=$validatedData['url'];

//     $quickLink->updated_at = date('Y-m-d h:i:s');

//     if($quickLink->save()){
//         session()->flash('success', ' Quick Link has been updated successfully');
//         return redirect(Helper::sitePrefix().'quick-links');
//     }else{
//         return back()->withInput($request->input())->withErrors("Error while updating the content");
//     }
// }
// public function quick_links_update_delete(Request $request){
//     if(isset($request->id) && $request->id!=NULL){
//         $record = QuckLink::find($request->id);
//         if($record){
//             DB::beginTransaction();
//             $deleted = $record->delete();
//             if($deleted==true){
//                 DB::commit();
//                 echo(json_encode(array('status'=>true)));
//             }else{
//                 echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
//             }
//         }else{
//             DB::rollBack();
//             echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
//         }
//     }else{
//         echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
//     }
// }

}
