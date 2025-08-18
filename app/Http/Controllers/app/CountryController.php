<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\ShippingCharge;
use App\Models\State;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }

    public function country()
    {
        $title = "Country List";
        $countryList = Country::get();
        return view('app.team.country.list', compact('countryList', 'title'));

    }

    public function country_create()
    {
        // $country = '';
        $key = "Create";
        $title = "Add Country";
        return view('app.team.country.form', compact('key', 'title'));

    }

    public function country_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255|unique:countries,title',
        ]);
        $country = new Country;
        $country->title = $validatedData['title'];
        if ($country->save()) {
            session()->flash('success', 'Country has been added successfully');
            return redirect(Helper::sitePrefix() . 'our-team/country');
        } else {
            return back()->with('error', 'Error while creating country');
        }
    }

    public function country_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Country Update";
        $country = country::find($id);
        if ($country) {
            return view('app.team.country.form', compact('key', 'country', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function country_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255|unique:countries,title,' . $id,
        ]);
        $country = Country::find($id);
        $country->title = $validatedData['title'];
        $country->updated_at = now();
        if ($country->save()) {
            session()->flash('success', 'Country has been updated successfully');
            return redirect(Helper::sitePrefix() . 'our-team/country');
        } else {
            return back()->with('error', 'Error while updating country');
        }
    }

    public function delete_country(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $country = Country::find($request->id);
            if ($country) {
                $deleted = $country->delete();
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
}
