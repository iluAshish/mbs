<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Portfolio;
use App\Models\PortfolioGallery;
use App\Models\SectionHeading;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function portfolio()
    {
        $title = "Portfolio List";
        $portfolioLists = Portfolio::latest()->get();
        return view('app.portfolio.list', compact('portfolioLists', 'title'));
    }

    public function portfolio_create()
    {
        $key = "Create";
        $title = "Create Portfolio";
        return view('app.portfolio.form', compact('key', 'title'));
    }

    public function portfolio_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $portfolio = new Portfolio();
        $sort_order = Portfolio::orderBy('sort_order', 'desc')->first();
        if ($sort_order) {
            $portfolio_sort_number = ($sort_order->sort_order + 1);
        } else {
            $portfolio_sort_number = 1;
        }
        // if ($request->hasFile('image')) {
        //     $portfolio->image_webp = Helper::uploadWebpImage($request->image, 'uploads/portfolio/webp_image/', 'portfolio');
        //     $portfolio->image = Helper::uploadFile($request->image, 'uploads/portfolio/image/', 'portfolio');
        // }
        $portfolio->title = $request->title;
        $portfolio->image_attribute = $request->image_attribute ?? '';
        $portfolio->sort_order = $portfolio_sort_number;

        if ($portfolio->save()) {
            session()->flash('Portfolio has been added successfully');
            return redirect(Helper::sitePrefix() . 'portfolio');
        } else {
            return back()->with('message', 'Error while creating the portfolio gallery');
        }
    }

    public function portfolio_edit($id)
    {
        $key = "Update";
        $title = "Update Portfolio";
        $portfolio = Portfolio::find($id);
        if($portfolio){
            return view('app.portfolio.form', compact('key', 'title', 'portfolio'));
        } else {
            return view('web.error.404');
        }
    }

    public function portfolio_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $portfolio = Portfolio::find($id);
        if($portfolio){
            if ($request->hasFile('image')) {
                Helper::deleteFile($portfolio, 'image');
                 Helper::deleteFile($portfolio, 'webp_image');
                $portfolio->image_webp = Helper::uploadWebpImage($request->image, 'uploads/portfolio/webp_image/', 'portfolio');
                $portfolio->image = Helper::uploadFile($request->image, 'uploads/portfolio/image/', 'portfolio');
            }
            $portfolio->title = $request->title;
            $portfolio->image_attribute = $request->image_attribute ?? '';
            if($portfolio->save()){
                session()->flash('message', $portfolio->title . "' has been updated successfully");
                return redirect(Helper::sitePrefix() . 'portfolio');
            } else {
                return back()->with('message', 'Error while updating the portfolio');
            }
        } else {
            return view('web.error.404');
        }
    }

    public function delete_portfolio(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $portfolio = Portfolio::find($request->id);

            if ($portfolio) {
                // Check if there are any portfolio gallery images associated with this portfolio
                $portfolioGalleryCount = PortfolioGallery::where('portfolio_id', $portfolio->id)->count();
            
                if ($portfolioGalleryCount > 0) {
                    // If there are associated portfolio gallery images, do not delete the portfolio
                    return response()->json(['status' => false, 'message' => 'Cannot delete. Portfolio has associated gallery images. delete gallery images first.']);
                }
            
                // If there are no associated portfolio gallery images, proceed with deletion
                Helper::deleteFile($portfolio, 'image');
                Helper::deleteFile($portfolio, 'webp_image');
            
                if ($portfolio->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'There is some error deleting the portfolio.']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found.']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }


   public function gallery($portfolio_id)
   {
       if($portfolio_id){
           $portfolioData = Portfolio::find($portfolio_id);
           if($portfolioData) {
               $title = "Gallery List";
               $portfolioGalleryList = PortfolioGallery::where('portfolio_id', $portfolio_id)->latest()->get();
               return view('app.portfolio.gallery.list', compact('portfolioGalleryList',
                   'title', 'portfolioData'));
           }
       } else {
           return view('web.error.404');
       }
   }

   public function gallery_create($portfolio_id)
   {
       if($portfolio_id) {
           $portfolioData = Portfolio::find($portfolio_id);
           if($portfolioData){
               $key = "Create";
               $title = "Create Gallery";
               return view('app.portfolio.gallery.form', compact('key', 'title', 'portfolioData'));
           } else {
               return view('web.error.404');
           }
       } else {
           return view('web.error.404');
       }
   }

   public function gallery_store(Request $request, $id)
   {
       $validatedData = $request->validate([
           'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
           'image_attribute' => 'required',
       ]);

       $portfolio = Portfolio::find($request->portfolio_id);
       if($portfolio){
           $sort_order = $portfolio->activeGalleries->sortByDesc('sort_order')->first();
           if ($sort_order) {
               $sort_number = ($sort_order->sort_order + 1);
           } else {
               $sort_number = 1;
           }
           $added_images = $not_added_images = 0;
           if ($request->image) {
               foreach ($request->image as $gallery_image) {
                   $portfolio_gallery = new PortfolioGallery();
                   $portfolio_gallery = $this->gallery_store_items($request, $gallery_image, $portfolio_gallery, $portfolio, $sort_number);
                   $portfolio_gallery->sort_order = $sort_number;
                   if ($portfolio_gallery->save()) {
                       $added_images++;
                   } else {
                       $not_added_images++;
                   }
                   $sort_number++;
               }
           }
           if ($not_added_images == 0) {
               session()->flash('message', $added_images . " gallery images of Portfolio '" . $portfolio->title . "' has been added successfully");
               return redirect(Helper::sitePrefix() . 'portfolio/gallery/' . $request->portfolio_id);
           } else {
               return back()->with('message', 'Error while creating the portfolio gallery');
           }
       } else {
           return view('web.error.404');
       }
   }

   public function gallery_edit($id)
   {
       $key = "Update";
       $portfolio_gallery = PortfolioGallery::find($id);
       $portfolioData = Portfolio::find($portfolio_gallery->portfolio_id);
       $title = "Update - " . $portfolio_gallery->portfolio->title;
       if ($portfolio_gallery) {
           $portfolio_id = $portfolio_gallery->portfolio_id;
           return view('app.portfolio.gallery.form', compact('key', 'portfolio_gallery', 'title',
               'portfolio_id', 'portfolioData'));
       } else {
           return view('web.error.404');
       }
   }

   public function gallery_update(Request $request, $id)
   {
       $portfolio_gallery = PortfolioGallery::find($id);
       $portfolio = Portfolio::find($request->portfolio_id);
       if ($request->hasFile('image')) {
           if (File::exists(public_path($portfolio_gallery->image))) {
               File::delete(public_path($portfolio_gallery->image));
           }
           if (File::exists(public_path($portfolio_gallery->image_webp))) {
               File::delete(public_path($portfolio_gallery->image_webp));
           }
           $portfolio_gallery->image_webp = Helper::uploadWebpImage($request->image, 'uploads/portfolio/gallery/image_webp/', $portfolio->title);
           $portfolio_gallery->image = Helper::uploadFile($request->image, 'uploads/portfolio/gallery/image/', $portfolio->title);
       }

       $portfolio_gallery->title = $request->title;
       $portfolio_gallery->video_url = $request->video_url;
       $portfolio_gallery->portfolio_id = $request->portfolio_id;
       $portfolio_gallery->image_attribute = $request->image_attribute;
       $portfolio_gallery->updated_at = now();
       if ($portfolio_gallery->save()) {
           session()->flash('message', "Portfolio gallery has been updated successfully");
           return redirect(Helper::sitePrefix() . 'portfolio/gallery/' . $portfolio_gallery->portfolio_id);
       } else {
           return back()->with('message', 'Error while updating the gallery');
       }
   }

   public function delete_gallery(Request $request)
   {
       if (isset($request->id) && $request->id != null) {
           $portfolio_gallery = PortfolioGallery::find($request->id);
           if ($portfolio_gallery) {
               if (File::exists(public_path($portfolio_gallery->image))) {
                   File::delete(public_path($portfolio_gallery->image));
               }
               if (File::exists(public_path($portfolio_gallery->image_webp))) {
                   File::delete(public_path($portfolio_gallery->image_webp));
               }
               if ($portfolio_gallery->delete()) {
                   return response()->json(['status' => true]);
               } else {
                   return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
               }
           } else {
               return response()->json(['status' => false, 'message' => 'Not found']);
           }
       } else {
           return response()->json(['status' => false, 'message' => 'Empty value submitted']);
       }
   }

   public function gallery_store_items(Request $request, $gallery_image, $portfolio_gallery, $portfolio, $sort_number)
   {
       $portfolio_gallery->image_webp = Helper::uploadWebpImage($gallery_image, 'uploads/portfolio/gallery/image_webp/', $portfolio->title);
       $portfolio_gallery->image = Helper::uploadFile($gallery_image, 'uploads/portfolio/gallery/image/', $portfolio->title);
       if ($request->video_url) {
           $portfolio_gallery->video_url = $request->video_url;
       }
       if ($request->title) {
           $portfolio_gallery->title = $request->title;
       }
       $portfolio_gallery->portfolio_id = $portfolio->id;
       $portfolio_gallery->image_attribute = $request->image_attribute;

       return $portfolio_gallery;
   }
}
