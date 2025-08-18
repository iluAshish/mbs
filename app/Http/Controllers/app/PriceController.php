<?php


namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Price;
use App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PriceController extends Controller
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
   
    public function price()
    {
        $title = "Price List";
        $type = "price";
        $priceList = Price::where('deleted_at',NULL)->get();
        return view('app.price.list', compact('priceList', 'title', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function price_create()
    {
        $key = "Create";
        $title = "Create Price";
        $parentServices = Service::whereNull('parent_id')->active()->get();
        return view('app.price.form', compact( 'parentServices', 'title', 'key'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function price_store(Request $request)
    {
        $validatedData = $request->validate([
            'price_title' => 'required|min:2|max:255',
            'service_id' => 'required|min:2|max:255',
            'description' => 'required|min:2',
            'price' => 'required|min:2',
            'alternate_description' => 'nullable|min:2',
            'image' => 'nullable',      
        ]);

        $price = new Price;
        
        // price image
        if ($request->hasFile('image')) {
            $price->image_webp = Helper::uploadWebpImage($request->image, 'uploads/price/webp_image/', 'price');
            $price->image = Helper::uploadFile($request->image, 'uploads/price/image/', 'price');
        }

        $price->image_attribute = $request->image_attribute ?? '';'';

        $price->sub_service_title = $validatedData['price_title'];
        $price->price = $validatedData['price'];

        $price->service_id = $validatedData['service_id'];
        $price->vat = $request->vat ?? '';
        $price->description = $request->description ?? '';

        $sort_order = Price::orderBy('sort_order', 'DESC')->whereNull('service_id')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $price->sort_order = $sort_number;
        if ($price->save()) {
            session()->flash('success', 'Price "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix() . 'price/');
        } else {
            return back()->with('message', 'Error while creating Price');
        }
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function price_edit(Price $price, $id)
    {
        $key = "Update";
        $type = "Price";
        $title = "Update Price";
        $price = Price::find($id);
        $parentServices = Service::whereNull('parent_id')->active()->get();
        if ($price) {
            return view('app.price.form', compact('key', 'title', 'price','parentServices', 'type'));
        } else {
            return view('web.error.404');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function price_update(Request $request, $id)
    {   
        $price = Price::find($id);
        $validatedData = $request->validate([
            'price_title' => 'required|min:2|max:255',
            'service_id' => 'required|min:2|max:255',
            'description' => 'required|min:2',
            'price' => 'required|min:2',
            'alternate_description' => 'nullable|min:2',
            'image' => 'nullable',      
        ]);

        // price image
        if ($request->hasFile('image')) {
            Helper::deleteFile($price, 'image');
            Helper::deleteFile($price, 'image_webp');
            $price->image_webp = Helper::uploadWebpImage($request->image, 'uploads/price/webp_image/', 'price');
            $price->image = Helper::uploadFile($request->image, 'uploads/price/image/', 'price');
        }

        $price->image_attribute = $request->image_attribute ?? '';'';

        $price->sub_service_title = $validatedData['price_title'];
        $price->price = $validatedData['price'];

        $price->service_id = $validatedData['service_id'];
        $price->vat = $request->vat ?? '';
        $price->description = $request->description ?? '';
        $price->updated_at = date('Y-m-d h:i:s');
        
        if ($price->save()) {
            session()->flash('success', "Price '" . $price->sub_service_title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'price');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the price");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $price
     * @return \Illuminate\Http\Response
     */
    public function price_delete(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $price = Price::find($request->id);
            if ($price) {
                    Helper::deleteFile($price, 'image');
                    Helper::deleteFile($price, 'webp_image');
                    $deleted = $price->delete();
                    if ($deleted == true) {
                        echo(json_encode(array('status' => true, 'message' => 'Price deleted successfully')));
                    } else {
                        echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'The requested price not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
}
