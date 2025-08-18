<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
// use App\Models\SectionHeading;
use App\Models\Offer;
use App\Models\Service;
// use App\Models\ServiceFaq;
// use App\Models\ServiceGallery;
// use App\Models\SubService;
// use App\Models\ServiceFaqconnect;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offer()
    {
        $title = "Offer List";
        $type = "offer";
        $offerList = Offer::where('deleted_at',NULL)->get();
        return view('app.offer.list', compact('offerList', 'title', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offer_create()
    {
        $key = "Create";
        $title = "Create Offer";
        $parentServices = Service::whereNull('parent_id')->active()->get();
        return view('app.offer.form', compact( 'parentServices', 'title', 'key'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function offer_store(Request $request)
    {
        DB::beginTransaction();
        $valid = $third_valid = true;
        $validatedData = $request->validate([
            'parent_id' => 'required',
            'offer_service_title' => 'required|min:2|max:50',
            'offer_title' => 'required|min:2|max:55',
            'offer_price' => 'required|min:2|max:55',
            'offer_image' => 'image|mimes:jpeg,png,jpg|max:512',
            'description' => 'required|min:2',
        ]);

        
        $offer = new Offer;

        if ($request->hasFile('offer_image')) {
            $offer->offer_home_page_image_webp = Helper::uploadWebpImage($request->offer_image, 'uploads/offer/image_webp/', 'offer');
            $offer->offer_home_page_image = Helper::uploadFile($request->offer_image, 'uploads/offer/image/', 'offer');
        }

        $offer->service_id = $validatedData['parent_id'];

        $offer->offer_service_title = $validatedData['offer_service_title'];
        $offer->offer_title = $request->offer_title ?? '';

        $offer->price = $request->offer_price ?? '';
        $offer->vat = $request->offer_vat ?? '';

        $offer->is_display_home = $request->is_display_home ?? '';

        $offer->offer_image_attribute = $request->offer_image_attribute ?? '';
        $offer->description = $request->description ?? '';
        
        $offer->meta_title = $request->meta_title ?? '';
        $offer->meta_description = $request->meta_description ?? '';
        $offer->meta_key_words = $request->meta_keyword ?? '';
        $offer->other_meta = $request->other_meta_tag ?? '';
        $sort_order = offer::whereNotNull('service_id')->where('service_id', $validatedData['parent_id'])
            ->orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $offer->sort_order = $sort_number;

        if ($offer->save()) {
            session()->flash('success', "offer '" . $offer->title . "' has been added successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'offer/');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the offer");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function offer_edit(Offer $offer, $id)
    {
        $key = "Update";
        $title = "Update Offer";
        $offer = Offer::find($id);
        if ($offer) {
            $parentServices = Service::whereNull('parent_id')->active()->get();
            $type = "offer";
            return view('app.offer.form', compact('key', 'title', 'parentServices',
                'type', 'offer'));
        } else {
            return view('web.error.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function offer_update(Request $request, Offer $offer, $id)
    {
        DB::beginTransaction();
        $offer = Service::find($id);
        $validatedData = $request->validate([
            'parent_id' => 'required',
            'offer_service_title' => 'required|min:2|max:50',
            'offer_title' => 'required|min:2|max:55',
            'offer_vat' => 'required|min:2|max:55',
            'offer_price' => 'required|min:2|max:55',
            'offer_image' => 'image|mimes:jpeg,png,jpg|max:512',
            'description' => 'required|min:2',
        ]);

        
        

        if ($request->hasFile('offer_image')) {
            Helper::deleteFile($offer, 'offer_image');
            Helper::deleteFile($offer, 'offer_image_webp');
            $offer->offer_image = Helper::uploadFile($request->offer_image, 'uploads/offer/image/', 'offer');
            $offer->offer_image_webp = Helper::uploadWebpImage($request->offer_image, 'uploads/offer/image_webp/', 'offer');
        }
        $offer->service_id = $validatedData['parent_id'];

        $offer->offer_service_title = $validatedData['offer_service_title'];
        $offer->offer_title = $request->offer_title ?? '';

        $offer->price = $request->offer_price ?? '';
        $offer->vat = $request->offer_vat ?? '';

        $offer->is_display_home = $request->is_display_home ?? '';

        $offer->offer_image_attribute = $request->offer_image_attribute ?? '';
        $offer->description = $request->description ?? '';
        
        $offer->meta_title = $request->meta_title ?? '';
        $offer->meta_description = $request->meta_description ?? '';
        $offer->meta_key_words = $request->meta_keyword ?? '';
        $offer->other_meta = $request->other_meta_tag ?? '';
        $sort_order = offer::whereNotNull('service_id')->where('service_id', $validatedData['parent_id'])
            ->orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $offer->sort_order = $sort_number;

        $offer->updated_at = date('Y-m-d h:i:s');

        if ($offer->save()) {
            session()->flash('success', "offer '" . $offer->title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'offer');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the service");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function offer_delete(Offer $offer)
    {
        //
    }
}
