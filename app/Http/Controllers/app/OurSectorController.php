<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\OurSector;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Output\Output;

class OurSectorController extends Controller
{
    public function index(Request $request){
        $sectorList = OurSector::latest()->get();

        $title = "Sector List";
        $type = 'sector';
        return view('app.sector.list', compact('sectorList', 'title', 'type'));
    }

    public function sector_create(){
        $title = "Create Sector";
        $type = 'sector';
        return view('app.sector.form', compact('title', 'type'));
    }

    public function sector_store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'short_url' => 'required|string|max:255|unique:projects,short_url',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sector = new OurSector();

        if ($request->hasFile('image')) {
            $sector->webp_image = Helper::uploadWebpImage($request->image, 'uploads/sector/image/webp/', $request->short_url);
            $sector->image = Helper::uploadFile($request->image, 'uploads/sector/image/', $request->short_url);
        }

       
        $sector->title = $request->title;
        $sector->short_url = $request->short_url;
        $sector->description = $request->description;
        

        if ($sector->save()) {
            session()->flash('success', "Sector '" . $sector->title . "' has been added successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'sector');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the sector");
        }
    }

    public function sector_edit($id){
        $sector = OurSector::findOrFail($id);
        $title = "Edit Sector";
        $type = 'sector';
        
        if(!$sector) {
            return redirect()->back()->with('error', 'Sector not found.');
        }

        return view('app.sector.form', compact('sector', 'title', 'type'));
    }

    public function sector_update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'short_url' => 'required|string|max:255|unique:projects,short_url,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sector = OurSector::findOrFail($id);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($sector->image))) {
                File::delete(public_path($sector->image));
            }
            if (File::exists(public_path($sector->webp_image))) {
                File::delete(public_path($sector->webp_image));
            }
            $sector->webp_image = Helper::uploadWebpImage($request->image, 'uploads/sector/image/webp/', $request->short_url);
            $sector->image = Helper::uploadFile($request->image, 'uploads/sector/image/', $request->short_url);
        }

        $sector->title = $request->title;
        $sector->short_url = $request->short_url;
        $sector->description = $request->description;

        if ($sector->save()) {
            session()->flash('success', "Sector '" . $sector->title . "' has been updated successfully");
            DB::commit();
            return redirect(Helper::sitePrefix() . 'sector');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the sector");
        }

    }
    /**
     * Delete a sector.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_sector(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $sector = OurSector::find($request->id);
            if ($sector) {
                if (File::exists(public_path($sector->image))) {
                    File::delete(public_path($sector->image));
                }
                if (File::exists(public_path($sector->webp_image))) {
                    File::delete(public_path($sector->webp_image));
                }
               
                if ($sector->delete()) {
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