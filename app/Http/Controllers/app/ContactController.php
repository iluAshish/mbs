<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\ContactFormRequest;
use App\Models\Location;
use App\Models\HomeContactUs;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }

    public function contact()
    {
        $key = "Update";
        $title = "Contact";
        $contact = SiteInformation::first();
        return view('app.contact_us.contact_form',compact('key','title','contact'));
    }

    public function contact_store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'nullable|min:2|max:230',
            'sub_title' => 'nullable|min:2',
        ]);

        if($request->id==0){
            $contact = new SiteInformation();
        }else{
            $contact = SiteInformation::find($request->id);
            $contact->updated_at = date('Y-m-d h:i:s');
        }

        $contact->contact_title = $request->title;
        $contact->google_map = $request->google_map;
        $contact->contact_sub_title = $request->sub_title;

        if($contact->save()){
            session()->flash('success', 'Contact page details has been updated successfully');
            return redirect(Helper::sitePrefix().'contact');
        }else{
            return back()->with('error', 'Error while updating the contact page details');
        }
    }

    public function location()
    {
        $title = "Location List";
        $locationList = Location::latest()->get();
        return view('app.contact_us.location.list', compact('locationList', 'title'));
    }

    public function location_create()
    {
        $key = "Create";
        $title = "Create Location";
        return view('app.contact_us.location.form', compact('key', 'title'));
    }

    public function location_store(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'nullable|min:2|max:255',
            'office_address' => 'required|min:2',
            'name' => 'nullable',
            'phone_number' => 'required|nullable|regex:/^([0-9\+]*)$/|min:7|max:17',
            'land_phone' => 'nullable|regex:/^([0-9\+]*)$/|min:7|max:17',
            'email' => 'required|email|min:2|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'alternate_email' => 'nullable|email|min:2|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ]);
        $location = new Location;
         if ($request->hasFile('image')) {
            $location->image = Helper::uploadFile($request->image, 'uploads/home/lcoation/image/', 'location');
        }
        $location->location = $validatedData['location'];
        $location->office_address = $validatedData['office_address'];
        $location->phone_number = $request->phone_number;
        $location->phone_number2 = $request->phone_number2;
        
        $location->name = $request->name;
        $location->google_map = $request->google_map;
        $location->land_phone = $request->land_phone??'';
        $location->working_hours = $request->working_hours;
        $location->email = $request->email;
        $location->alternate_email = $request->alternate_email??'';

        $sort_order = Location::latest('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $location->sort_order = $sort_number;

        if ($location->save()) {
            session()->flash('success', "Location '" . $request->location . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'contact/location');
        } else {
            return back()->with('error', 'Error while creating the Location');
        }
    }

    public function location_edit(Request $request, $id)
    {
        $about = "Update";
        $title = "Update Location";
        $location = Location::find($id);
        if ($location) {
            return view('app.contact_us.location.form', compact('about', 'location', 'title'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function location_update(Request $request, $id)
    {
        $location = Location::find($id);
        $validatedData = $request->validate([
            'location' => 'required|min:2|max:255',
            'office_address' => 'required|min:2',
            'name' => 'nullable',
            'phone_number' => 'nullable|regex:/^([0-9\+]*)$/|min:7|max:17',
            'land_phone' => 'nullable|regex:/^([0-9\+]*)$/|min:7|max:17',
            'email' => 'required|email|min:2|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'alternate_email' => 'nullable|email|min:2|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ]);
        if ($request->hasFile('image')) {
            $location->image = Helper::uploadFile($request->image, 'uploads/home/lcoation/image/', 'location');
        }
        $location->location = $validatedData['location'];
        $location->office_address = $validatedData['office_address'];
        $location->phone_number = $request->phone_number;
        $location->phone_number2 = $request->phone_number2;
        $location->name = $request->name;
        $location->land_phone = $request->land_phone??'';
        $location->land_phone = $request->land_phone??'';
        $location->working_hours = $request->working_hours??'';
        $location->email = $request->email;
        $location->alternate_email = $request->alternate_email??'';
        $location->google_map = $request->google_map;
        $location->updated_at = now();

        if ($location->save()) {
            session()->flash('success', "Location'" . $request->location . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'contact/location');
        } else {
            return back()->with('error', 'Error while updating the Location');
        }
    }

    public function delete_location(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $location = Location::find($request->id);
            if ($location) {
                if ($location->delete()) {
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
