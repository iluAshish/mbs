<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\ProductBrands;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\WhyChooseUs;
use App\Models\GroupCompanies;
use App\Models\Brands;
use App\Models\ProductGallery;
use App\Models\ProductSpecification;
use App\Models\Blog;
use App\Models\Enquiry;
use App\Models\HomeAboutUs;
use App\Models\KeyFeature;
use App\Models\MetaTag;
use App\Models\SectionHeading;
use App\Models\Service;
use App\Models\SiteInformation;
use App\Models\HomeBanner;
use App\Models\Testimonial;
use App\Models\Banner;
use App\Models\CaseStudy;
use App\Models\HomeVideoBanner;
use App\Models\Company;
use App\Models\Feature;
use App\Models\PortfolioGallery;
use App\Models\Location;
use App\Models\Media;
use App\Models\OurSector;
use App\Models\Project;
use App\Models\ProjectGallery;
use App\Models\SuccessStory;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function __construct()
    {
        $siteInformation = SiteInformation::first();
        $menu = Service::active()->whereNull('parent_id')->orderBy('sort_order')->get();
        $menufooter = Service::active()->whereNull('parent_id')->orderBy('sort_order')->take(8)->get();
        $sub_menu_data = Service::active()->whereNotNull('parent_id')->oldest('sort_order')->get();
        $services_list = Service::where('status', 'Active')->whereNull('parent_id')->orderBy('sort_order')->get();
        $blogCount = Blog::active()->count();
        $companyCount = Company::active()->count();
        $servicesCount = Service::active()->count();
        $testimonialCount = Testimonial::active()->count();
        $abut_us_data = AboutUs::first();
        $locationList = Location::active()->orderBy('sort_order')->get();
        $portfolio_menu = Portfolio::where('status','Active')->orderBy('sort_order')->get();
        $categories_menu=Category::where('status','Active')->with('subcategories')->whereNull('parent_id')->orderBy('sort_order')->get();
        $brands_menu=ProductBrands::where('status','Active')->displayToMenu()->orderBy('sort_order')->get();
        $companies = Company::where('status','Active')->orderBy('sort_order')->get();
        $featuredCategories = Category::where('status', 'Active')
            ->where('featured_to_home', 'Yes')
            ->orderBy('sort_order')
            ->with('products')
            ->take(8)
            ->get();
        // dd($siteInformation);

        // dd($featuredCategories);


        return View::share(compact(
            'siteInformation',
            'menu',
            'menufooter',
            'sub_menu_data',
            'servicesCount',
            'blogCount',
            'companyCount',
            'locationList',
            'portfolio_menu',
            'categories_menu',
            'brands_menu',
            'testimonialCount',
            'services_list',
            'abut_us_data',
            'companies',
            'featuredCategories'
        ));
    }

    public function seo_content($type, $page_name, $key = NULL)
    {
        if ($type == 1) {
            $meta_data = MetaTag::where('page_name', $page_name)->first();
            return $meta_data;
        } else {
            $model = 'App\\Models\\' . $page_name;
            $meta_data = $model::find($key);
            return $meta_data;
        }
    }

    public function home()
    {

        $meta_data = $this->seo_content(1, 'Home');
        $homeBanners = HomeBanner::active()->orderBy('sort_order')->get();
        $homeAbout = HomeAboutUs::first();
        $video_banner = HomeVideoBanner::first();
        $products=Product::where('status','Active')->where('display_to_home','Yes')->orderBy('sort_order')->get();
        $categories=Category::where('status','Active')->where('display_to_home','Yes')->whereNull('parent_id')->orderBy('sort_order')->get();
        $categories_home=Category::where('status','Active')->whereNull('parent_id')->orderBy('sort_order')->take(8)->get();
        $clients=GroupCompanies::where('status','Active')->orderBy('sort_order')->get();
        $partners=Brands::where('status','Active')->orderBy('sort_order')->get();
        $keyFeatures = KeyFeature::where('deleted_at',NULL)->orderBy('sort_order')->get();
        $why_choose_us = WhyChooseUs::active()->get();
        $services = Service::where('status','Active')->whereNull('parent_id')->orderBy('sort_order')->take(8)->get();
        $group_companies = GroupCompanies::active()->orderBy('sort_order')->get();
        $testimonials = Testimonial::where('status','Active')->orderBy('sort_order')->get();
        $portfolioLists = Portfolio::active()->latest()->take(6)->get();
        $blogs = Blog::active()->latest('posted_date')->take(4)->get();
        $sectors = OurSector::active()->get();
        $features = Feature::where('status','Active')->where('display_to_home', 'Yes')->get();

        $caseStudies = Project::active()->orderBy('sort_order')->where('case_study_status','Yes')->get();

        $projects = Project::active()->select('id','title','short_url','image',
                                                'image_attribute',
                                                'webp_image',
                                                'logo_image',
                                                'logo_image_attribute',
                                                'logo_web_image',)
                                            ->orderBy('sort_order')->get();

        // dd($products);

        return view('web.index', compact(
            'meta_data',
            'video_banner',
            'homeBanners',
            'homeAbout',
            'products',
            'categories',
            'categories_home',
            'why_choose_us',
            'keyFeatures',
            'features',
            'clients',
            'partners',
            'group_companies',
            'services',
            'blogs',
            'testimonials',
            'portfolioLists',
            'sectors',
            'projects',
            'caseStudies'
        ));
    }


    public function portfolio()
    {
        $banner = Banner::type('Portfolio')->first();
        $meta_data = $this->seo_content(1, 'portfolio');
        $condition = Portfolio::where('status','Active')->orderBy('sort_order')->get();
        $totalPortfolio = $condition->count();
        $portfolios = $condition;
        $offset = $portfolios->count();
        $loading_limit = 4;
        $latest=Portfolio::where('status','Active')->orderBy('sort_order')->take(10)->get();
        return view('web.portfolio',compact('portfolios','banner','totalPortfolio','offset','loading_limit','meta_data'));
    }
    public function portfolioLoadMore(Request $request)
    {
        $offset = $request->offset;
        $loading_limit = $request->loading_limit;
        $portfolio_id = $request->portfolio_id;
        $condition = PortfolioGallery::active();
        // $totalBlog = $condition->count();
        // $totalPortfolio = $condition->count();
        // $portfolios = $condition->skip($offset)->take($loading_limit)->get();
        // $offset += $portfolios->count();
        if($portfolio_id==0){
            $totalportfolio = $condition->count();
            $portfolios = PortfolioGallery::active()->orderBy('sort_order')->skip($offset)->take($loading_limit)->get();
            $offset += $portfolios->count();
        }else{
            $totalportfolio = PortfolioGallery::active()->latest()->where('portfolio_id', $portfolio_id)->count();
            $portfolios = PortfolioGallery::active()->where('portfolio_id', $portfolio_id)->orderBy('sort_order')->skip($offset)->take($loading_limit)->get();
            $offset += $portfolios->count();
        }
        return view('web.includes.portfoliolist', compact( 'loading_limit','offset','portfolios','totalportfolio','portfolio_id'));
    }

    public function contact()
    {
        return redirect('/contact-us');

    }

    public function about_us()
    {
        $meta_data = $this->seo_content(1, 'About');
        $banner = Banner::type('About')->first();
        $about = AboutUs::first();
        $clients=GroupCompanies::where('status','Active')->orderBy('sort_order')->get();
        $keyFeatures = KeyFeature::where('deleted_at',NULL)->orderBy('sort_order')->get();
        $success_stories = SuccessStory::where('status','Active')->with('awards')->orderBy('sort_order')->get();
        $why_choose_us = WhyChooseUs::active()->get();
        $brands = ProductBrands::where('status', 'Active')
                                ->latest()
                                ->take(4)
                                ->get();

        $companies = Company::where('status', 'Active')
                                ->orderBy('sort_order')
                                ->get();

        // dd($banner, $about);
        return view('web.about', compact(
            'meta_data',
            'banner',
            'about',
            'why_choose_us',
            'clients',
            'success_stories',
            'keyFeatures',
            'brands',
            'companies'
        ));
    }

        public function companies()
    {
        $meta_data = $this->seo_content(1, 'Companies');
        $banner = Banner::type('Companies')->first();
        $companies = Company::where('status','Active')->orderBy('sort_order')->get();
        return view('web.companies', compact(
            'meta_data',
            'banner',
            'companies'
        ));
    }


    // product listing, Category listing, Brand listing
    public function products($short_url = null)
    {
        $meta_data = $this->seo_content(1, 'products');
        $banner = Banner::type('Products')->first();
        $loading_limit = 10;
        $category_id = null;
        $brand_id = null;
        $related_category = null;
        $related_brand = null;
        $banner_img = '';
        if($banner->webp_image){
            $banner_img = $banner->webp_image;
        }
        $short_description = '';
        $subcategories = array();
        $subbrands = array();
        if ($short_url) {
            $category = Category::active()->where('short_url', $short_url)->first();
            if ($category) {
                $meta_data = $this->seo_content(0, 'Category', $category->id);
                $category_id = $category->id;
                $banner_img = $category->banner_image_webp;
                $short_description = $category->short_description;
                $related_category = Category::active()->where('id', '!=', $category_id)->get();
                $parent_category = $category_id;
                $categories = Category::active()->get();
                foreach($categories as $category_stored){
                    if($category_stored->parent_id == $category_id){
                        $subcategories[] = $category_stored->id;
                    }   
                }
                if(empty($subcategories)){
                    $subcategories[] = $category_id;
                }
            } else {
                $brand = ProductBrands::active()->where('short_url', $short_url)->first();
                if ($brand) {
                    $meta_data = $this->seo_content(0, 'ProductBrands', $brand->id);
                    $brand_id = $brand->id;
                    $banner_img = $brand->banner_image_webp;
                    $short_description = $brand->short_description;
                    $related_brand = ProductBrands::active()->where('id', '!=', $brand_id)->get();
                    $parent_brand = $brand_id;
                    $brands = ProductBrands::active()->get();
                    foreach($brands as $brand_stored){
                        if($brand_stored->parent_id == $brand_id){
                            $subbrands[] = $brand_stored->id;
                        }   
                    }
                    if(empty($subbrands)){
                        $subbrands[] = $brand_id;
                    }
                }
            }
        }
        $productQuery = Product::where('status', 'Active')->orderBy('sort_order');
        $type = '';
        $type_id = '';
        if ($category_id) {
            $productQuery->whereIn('category_id', $subcategories);
            // $productQuery->where('category_id', $category_id);
            $type = 'category';
            $type_id =$category_id;
        }
        if ($brand_id) {
            $productQuery->whereIn('brand_id', $subbrands);
            // $productQuery->where('brand_id', $brand_id);
            $type = 'brand';
            $type_id =$brand_id;
        }
    
        // Get the products
        $products = $productQuery->get();
        $total = $products->count();
        $products = $productQuery->take(10)->get();
        $offset = 10;
    // dd($products);



        $categories = Category::active()->whereNull('parent_id')->with('subcategories')->orderBy('sort_order')->get();
        $brands = ProductBrands::active()->get();
        // dd($brands);
        return view('web.product', compact(
            'meta_data',
            'banner',
            'total',
            'products',
            'banner_img',
            'short_description',
            'subcategories',
            'categories',
            'brands',
            'offset',
            'type',
            'type_id',
            'loading_limit',
            'category_id',
            'brand_id'
        ));
    }
    
    // public function products()
    // {
    //     $meta_data = $this->seo_content(1, 'products');
    //     $condition=Product::where('status','Active')->orderBy('sort_order')->get();
    //     $banner = Banner::type('Products')->first();
    //     $totalProducts = $condition->count();

    //     $products = $condition;
    //     $offset = $products->count();
    //     $limit = 4;
    //     return view('web.product', compact(
    //         'meta_data',
    //         'banner',
    //          'totalProducts',
    //         'products',
    //          'offset',
    //          'limit'
    //     ));
    // }
    public function productsLoadMore(Request $request)
    {
        $type = $request->type ?? '';
        $type_id = $request->type_id?? ''; 
        $offset = $request->offset;
        $limit = $request->limit;
    
        $subcategories = array();
        $subbrands = array();
        if ($type === 'category') {
            $parent_category = $type_id;
                $categories = Category::active()->get();
                foreach($categories as $category_stored){
                    if($category_stored->parent_id == $type_id){
                        $subcategories[] = $category_stored->id;
                    }   
                }
                if(empty($subcategories)){
                    $subcategories[] = $type_id;
                }
                
            $condition = Product::where('status', 'Active')
                                ->whereIn('category_id', $subcategories)
                                ->orderBy('sort_order');
        } elseif ($type === 'brand') {
            $parent_brand = $type_id;
                    $brands = ProductBrands::active()->get();
                    foreach($brands as $brand_stored){
                        if($brand_stored->parent_id == $type_id){
                            $subbrands[] = $brand_stored->id;
                        }   
                    }
                    if(empty($subbrands)){
                        $subbrands[] = $type_id;
                    }
                    
            $condition = Product::where('status', 'Active')
                                ->whereIn('brand_id', $subbrands)
                                ->orderBy('sort_order');
        } else {
            $condition = Product::where('status', 'Active')->orderBy('sort_order');
        }
    
        $totalProducts = $condition->count();
        $products = $condition->skip($offset)->take($limit)->get();
        $offset = (int)$limit + (int)$offset;
    
        return view('web.includes.product_list', compact('limit', 'totalProducts', 'offset', 'products','type','type_id'));
    }
    

    public function category_detail($shorturl)
    {
        $category_products = Category::active()->where('short_url',$shorturl)->first();
        $meta_data =  $this->seo_content(0, 'Category', $category_products->id);
        $category_id = $category_products->id;

        $related_category = Category::active()->where('id', '!=', $category_id)->get();
        $condition=Product::where('status','Active')->where('category_id',$category_id )->orderBy('sort_order')->get();
        $totalProducts = $condition->count();

        $brands = ProductBrands::where('status', 'Active')
                                ->latest()
                                ->get();
        
        $products = collect();

        if (!empty($category_products->product_ids)) {
            $productIds = json_decode($category_products->product_ids, true);

            $products = Product::whereIn('id', $productIds)
                ->active()
                ->get();
        }
        $loading_limit = 4;

        // dd($category_products);

        if ($category_products) {
            return view('web.category_detail', compact(
                'category_products',
                'meta_data',
                'related_category',
                'totalProducts',
                'loading_limit',
                'brands',
                'products'
            ));
        } else {
            return view('web.error.404');
        }
    }

    public function singleCategoryProductLoadMore(Request $request)
    {
        $offset = $request->offset;
        $loading_limit = $request->loading_limit;
        $category_id = $request->category_id;
        $condition = Product::where('status','Active')->get();
        $totalProducts = $condition->count();
        $products = $condition->where('category_id',$category_id )->skip($offset)->take($loading_limit);
        $offset += $products->count();

        return view('web.includes.categoryproduct_list', compact( 'loading_limit', 'totalProducts', 'offset', 'products'));
    }
    public function product_detail($shorturl)
    {
        // $category = Category::where('short_url', $type)->first();
        // $brand = ProductBrands::where('short_url', $type)->first();
        
        $product = Product::where('short_url', $shorturl)->where('status', 'Active')->first();
        $category_id = $product->category_id;

        $brandsList = ProductBrands::where('status', 'Active')
                                ->latest()
                                ->get();
        $relatedProducts = Product::where('id', '!=', $product->id)
                                 ->where('status', 'Active')
                                 ->where('category_id', $category_id)
                                 ->take(8)
                                 ->get();
        // if ($category) {
            // $product = Product::where('slug', $shorturl)->where('category_id', $category->id)->where('status', 'Active')->first();
        // } elseif ($brand) {
        //     $product = Product::where('slug', $shorturl)->where('brand_id', $brand->id)->where('status', 'Active')->first();
        // } else {
        //     abort(404);
        // }
        $product_id = $product->id;
        $meta_data =  $this->seo_content(0, 'Product', $product->id);
        $productGalleryList = ProductGallery::where('product_id', $product_id)->where('status', 'Active')->orderBy('sort_order')->get();
        $specifications = ProductSpecification::where('product_id', $product_id)->where('status', 'Active')->orderBy('sort_order')->get();

        if ($product) {
            return view('web.product_detail', compact(
                'meta_data',
                'product',
                'relatedProducts',
                'productGalleryList',
                'brandsList'
            ));
        } else {
            return view('web.error.404');
        }
    }

    public function projects()
    {
        $meta_data = $this->seo_content(1, 'Projects');
        $banner = Banner::type('Projects')->first();
        $condition = Project::active()->orderBy('sort_order')->get();
        $total = $condition->count();
        $projects = $condition->take(5);
        $offset = $projects->count();
        $loading_limit = 5;

        return view('web.projects', compact(
            'meta_data',
            'banner',
            'total',
            'projects',
            'offset',
            'loading_limit'
        ));
    }

    public function project_detail($short_url){
        $project = Project::where('short_url', $short_url)->first();
        if (!$project) {
            abort(404);
        }
        $meta_data = $this->seo_content(0, 'Project', $project->id);

        $projectGalleryList = ProjectGallery::where('project_id', $project->id)
                                        ->where('status', 'Active')
                                        ->orderBy('sort_order')
                                        ->get();

        $relatedProjects = Project::where('id', '!=', $project->id)
                                 ->where('status', 'Active')
                                 ->orderBy('sort_order')
                                 ->take(8)
                                 ->get();
        $banner = Banner::type('Projects')->first();
        $brandsList = ProductBrands::active()->orderBy('sort_order')->get();

        return view('web.project_detail', compact(
            'meta_data',
            'project',
            'relatedProjects',
            'banner',
            'brandsList',
            'projectGalleryList'
        ));
    }

    public function sectors(){
        $meta_data = $this->seo_content(1, 'Sectors');
        $condition = OurSector::active()->get();
        $total = $condition->count();
        $sectors = $condition->take(20);
        $offset = $sectors->count();
        $loading_limit = 20;
        $banner = Banner::type('Sectors')->first();
        // dd($sectors);
        return view('web.sectors', compact(
            'meta_data',
            'sectors',
            'total',
            'offset',
            'loading_limit',
            'banner'
        ));

    }

    public function media(){
        $meta_data = $this->seo_content(2, 'Media');
        $banner = Banner::type('Media')->first();
        $condition = Media::active()->latest();
        $total = $condition->count();
        $medias = $condition->take(10)->with('images')->get();
        $offset = $medias->count();
        $loading_limit = 10;     

        //dd($medias);
        return view('web.media', compact(
            'meta_data',
            'banner',
            'total',
            'medias',
            'offset',
            'loading_limit'
        ));
    }

    public function brands(){
        $meta_data = $this->seo_content(3, 'Brands');
        $condition = ProductBrands::active()->get();
        $total = $condition->count();
        $brands = $condition->take(20);
        $offset = $brands->count();
        $loading_limit = 20;
        $banner = Banner::type('Brands')->first();
        // dd($brands);
        return view('web.brands', compact(
            'meta_data',
            'brands',
            'total',
            'offset',
            'loading_limit',
            'banner'
        ));
    }

    public function brand_detail($short_url){
        $brand = ProductBrands::where('short_url', $short_url)->with('galleries','icons')->first();
        if (!$brand) {
            abort(404);
        }
        $meta_data = $this->seo_content(0, 'Brands', $brand->id);
        $banner = Banner::type('Brands')->first();
        $brandsList = ProductBrands::active()->orderBy('sort_order')->get();
        $relatedBrands = Brands::where('id', '!=', $brand->id)
                                 ->where('status', 'Active')
                                 ->orderBy('sort_order')
                                 ->take(8)
                                 ->get();

        $allProducts = Product::active()->get();

        $products = collect();

        if (!empty($brand->product_ids)) {
            $productIds = json_decode($brand->product_ids, true);

            $products = Product::whereIn('id', $productIds)
                ->active()
                ->get();
        }

        $services = collect();

        if (!empty($brand->service_ids)) {
            $serviceIds = json_decode($brand->service_ids, true);

            $services = Service::whereIn('id', $serviceIds)
                ->active()
                ->get();
        }
        return view('web.brand_detail', compact(
            'meta_data',
            'brand',
            'relatedBrands',
            'banner',
            'brandsList',
            'products',
            'services'
        ));
    }

     public function projectLoadMore(Request $request)
     {
         $offset = $request->offset;
         $loading_limit = $request->loading_limit;
         $condition = Project::active()->orderBy('sort_order');
         $totalProjects = $condition->count();
         $projects = $condition->skip($offset)->take($loading_limit)->get();
         $offset += $projects->count();

         return view('web.includes.project_list', compact( 'loading_limit', 'totalProjects', 'offset', 'projects'));
     }
    public function blogs($type)
    {
        if (!in_array($type, ['blog', 'news-events'])) {
            return view('web.error.404'); // Return a 404 view if the type is invalid
        }
        if($type=='news-events'){
        $meta_data = $this->seo_content(1, 'News-events');
        } else {
        $meta_data = $this->seo_content(1, 'Blog');
        }
        $banner = Banner::type('Blog')->first();

        $condition = Blog::active()->where('type', $type)->latest('posted_date')->latest();
        $total  = $condition->count();

        $blogs = $condition->take(8)->get();

        $recentBlogs = Blog::active()->where('type', $type)->latest('posted_date')->latest()->take(4)->get();
        $offset = $blogs->count();
        $loading_limit = 8;

        // dd($blogs,$recentBlogs);

        return view('web.blogs', compact(
            'meta_data',
            'banner',
            'total',
            'blogs',
            'type',
            'offset',
            'loading_limit',
            'recentBlogs'
        ));
    }

     public function blogLoadMore(Request $request)
     {
         $offset = $request->offset;
         $loading_limit = $request->loading_limit;
         $type = $request->blog_type;
         $condition = Blog::active()->where('type', $type)->latest('posted_date')->latest();
         $totalBlog = $condition->count();
         $blogs = $condition->latest('posted_date')->skip($offset)->take($loading_limit)->get();
         $offset += $blogs->count();

         return view('web.includes.blog_list', compact('blogs', 'loading_limit', 'totalBlog', 'offset', 'blogs','type'));
     }


     public function blog_detail($short_url,$type)
     {
         // Validate type
         if (!in_array($type, ['blog', 'news-events'])) {
             return view('web.error.404'); // Return a 404 view if the type is invalid
            }
            
            // dd($type, $short_url);
         $blog = Blog::active()
             ->where('type', $type)
             ->where('short_url', $short_url)
             ->first();
     
         if ($blog) {
            $banner = Banner::type('Blog')->first();
            $meta_data = $this->seo_content(0, 'Blog', $blog->id);
     
             $recentBlogs = Blog::active()
                 ->where('type', $type)
                 ->where('id', '!=', $blog->id)
                 ->orderBy('posted_date', 'desc')
                 ->limit(5)
                 ->get();
     
             $latest = Blog::active()
                 ->where('type', $type)
                 ->latest('posted_date')
                 ->take(10)
                 ->get();
     
             $previousBlog = Blog::active()
                 ->where('type', $type)
                 ->where('posted_date', '<', $blog->posted_date)
                 ->orderBy('posted_date', 'desc')
                 ->first();
     
             $nextBlog = Blog::active()
                 ->where('type', $type)
                 ->where('posted_date', '>', $blog->posted_date)
                 ->orderBy('posted_date', 'asc')
                 ->first();
     
             $services = Service::whereNull('parent_id')->active()->get();

            //  dd($blog);
     
             return view('web.blog_detail', compact(
                 'blog',
                 'recentBlogs',
                 'meta_data',
                 'previousBlog',
                 'nextBlog',
                 'type',
                 'banner',
                 'latest',
                 'services'
             ));
         } else {
             return view('web.error.404'); // Return 404 view if no blog or news-event found
         }
     }
     

    public function contact_us()
    {
        $meta_data = $this->seo_content(1, 'Contact');
        $banner = Banner::type('Contact')->first();
        $siteInformation = SiteInformation::first();
        $SectionHeading=SectionHeading::where('type', 'contact')->first();
        $locations = Location::where('status','Active')->orderBy('sort_order')->get();
        
        return view('web.contact', compact('meta_data', 'banner', 'siteInformation','SectionHeading','locations'));
    }


    public function services()
    {

        $meta_data = $this->seo_content(1, 'Services');
        $banner = Banner::type('Services')->first();
        $condition = Service::where('status','Active')->whereNull('parent_id')->orderBy('sort_order')->get();
        $total = $condition->count();
        $services = $condition->take(5);
        $offset = $services->count();
        $loading_limit = 5;

        // dd($services);
        return view('web.service', compact(
            'meta_data',
            'total',
            'banner',
            'offset',
            'loading_limit',
            'services'
        ));
    }
         public function serviceLoadMore(Request $request)
     {
         $offset = $request->offset;
         $loading_limit = $request->loading_limit;
         $condition = Service::where('status','Active')->whereNull('parent_id')->orderBy('sort_order');
         $totalServices = $condition->count();
         $services = $condition->skip($offset)->take($loading_limit)->get();
         $offset += $services->count();

         return view('web.includes.services_list', compact( 'loading_limit', 'totalServices', 'offset', 'services'));
     }

         public function containerLoadMore(Request $request)
     {
    //   dd($request->all());
        $offset = $request->offset;
        $limit = $request->limit;
        $category_id = $request->category_id;

        $containers_all = Product::where('status','Active')->where('category_id',$category_id )->orderBy('sort_order');
        $total = $containers_all->count();
        $containers = $containers_all->skip($offset)->take($limit)->get();
        $offset += $containers->count();

       

    
        //  $condition = Service::where('status','Active')->whereNull('parent_id')->orderBy('sort_order');
        //  $totalServices = $condition->count();
        //  $services = $condition->skip($offset)->take($limit)->get();
        //  $offset += $services->count();

         return view('web.includes.containers_list', compact( 'limit', 'total', 'offset', 'containers','category_id'));
     }


    public function service_detail($short_url)
    {
        
        $id="1";
        $service_details = Service::active()->where('short_url', $short_url)->first();
        if ($service_details) {
            $meta_data = $this->seo_content(0, 'Service', $service_details->id);
            $other_services = Service::where('short_url', '!=', $short_url)->where('parent_id', NULL)->active()->get();
            $service = Service::active()->where('short_url', $short_url)->first();
            if ($service) {
                $subServices = Service::where('parent_id','=', $service_details->id)->where('id', '!=', $service->id)->active()->get();
            }

            $service_banner = Banner::type('Services')->first();
            return view('web.service_detail', compact(
                'meta_data',
                'service_details',
                'other_services',
                // 'services',
                'subServices',
                'service_banner',
                'id'
            ));
        } else {
            return view('web.error.404');
        }
    }



    public function terms_and_conditions()
    {
        $meta_data = $this->seo_content(1, 'Terms');
        $banner = Banner::where('type', 'Terms-conditions')->first();

        return view('web.terms_and_conditions', compact('meta_data', 'banner'));
    }

    public function privacy_policy()
    {
        $meta_data = $this->seo_content(1, 'Privacy');
        $banner = Banner::where('type', 'Privacy-policy')->first();
        return view('web.privacy-policy', compact('meta_data', 'banner'));
    }

    public function thankyou()
    {
        $meta_data = $this->seo_content(1, 'Thankyou');
        return view('web.thankyou', compact('meta_data'));
    }


    // public function enquiry(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:60',
    //         'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:17',
    //         'email' => 'required|email',
    //     ]);
    //     $enquiry = new Enquiry();
    //     $enquiry->name = $request->name;
    //     $enquiry->phone = $request->phone;
    //     $enquiry->message = $request->message;
    //     $enquiry->date_of_appointment = $request->company ?? '';
    //     $enquiry->email = $request->email;
    //     $enquiry->enquiry_type = $request->enquiry_type ? $request->enquiry_type : 'contact-us';
    //     $enquiry->request_url = url()->previous();

    //     if ($enquiry->save()) {

    //         $sendContactMail = Helper::SendContactMail($enquiry);

    //         if ($sendContactMail) {

    //         } else {
    //             echo json_encode(array('status' => 'success', 'message' => "Error while submit the request"));
    //         }
    //     } else {
    //         return response()->json(['status' => 'error', 'message' => 'Error while submit the request']);
    //     }
    //     return view('web.thankyou');
    // }
    
    public function enquiry(Request $request)
    {
        $keyFlag = $request->prefixKey;
        $name = $keyFlag.'_name';
        $email = $keyFlag.'_email';
        $phone = $keyFlag.'_phone';
        $message = $keyFlag.'_message';

        if (filter_var($request->$email, FILTER_VALIDATE_EMAIL)) {
            $enquiry = new Enquiry();
            $enquiry->name = $request->$name;
            $enquiry->email = $request->$email;
            $enquiry->message = $request->$message ?? '';

            // $ip = $request->ip();
            $ip= '152.59.183.61';

            $locationData = Http::get("https://ipwho.is/{$ip}")->json();

            // Format phone number with country code
            $formattedPhone = $locationData['calling_code'] ? "+{$locationData['calling_code']}{$request->$phone}" : $request->$phone;

            $enquiry->phone = $formattedPhone;

            $enquiry->enquiry_type = $request->type ? $request->type : 'contact-us';
            $enquiry->request_url = url()->previous();

            if ($enquiry->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Request has been submitted successfully',
                        'redirect' => route('thankyou') // thankyou ka route
                    ]);

               

                // $sendContactMail = Helper::SendContactMail($enquiry);
        
                // if ($sendContactMail) {
                //     return view('web.thankyou'); // Redirect on success
                // } else {
                //     return response()->json(['status' => 'error', 'message' => "Error sending email. Please try again later."]); 
                // }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Error saving enquiry. Please try again later.']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error: Please enter a valid email id']);
        }
       

        // $client = new \GuzzleHttp\Client();
        // $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
        //     'form_params' => [
        //         'secret' => '6Lewbc0qAAAAAFrvhTqOqAV92IDPcWcDDjyt3oPo',
        //         'response' => $request->recaptcha_response,
        //     ],
        // ]);
    
        // $result = json_decode($response->getBody());
        // if ($result->success) {    
        //     $enquiry = new Enquiry();
        //     $enquiry->name = $request->name;
        //     $enquiry->phone = $request->phone;
        //     $enquiry->message = $request->message;
        //     $enquiry->date_of_appointment = $request->company ?? '';
        //     $enquiry->email = $request->email;
        //     $enquiry->enquiry_type = $request->type ? $request->type : 'contact-us';
        //     $enquiry->request_url = url()->previous();
        
        //     if ($enquiry->save()) {
        //         $sendContactMail = Helper::SendContactMail($enquiry);
        
        //         if ($sendContactMail) {
        //             return view('web.thankyou'); // Redirect on success
        //         } else {
        //             return response()->json(['status' => 'error', 'message' => "Error sending email. Please try again later."]); 
        //         }
        //     } else {
        //         return response()->json(['status' => 'error', 'message' => 'Error saving enquiry. Please try again later.']);
        //     }
        // }else{
        //     return response()->json(['status' => 'error', 'message' => 'Invalid reCAPTCHA. Please try again.']);
        
        // }
    
    }


    public function serviceEnquiry(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'phone' => 'required',
            'email' => 'required|email',
            'recaptcha_response' => 'required',
        ]);
        
        
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => '6Lewbc0qAAAAAFrvhTqOqAV92IDPcWcDDjyt3oPo',
                'response' => $request->recaptcha_response,
            ],
        ]);
    
        $result = json_decode($response->getBody());
        if ($result->success) {  
        
            $enquiry = new Enquiry();
            $enquiry->name = $request->name;
            $enquiry->phone = $request->phone;
            $enquiry->email = $request->email;
            $enquiry->date_of_appointment = $request->date_of_appointment ?? null;
            $enquiry->no_of_passengers = $request->no_of_passengers ?? null;
            $enquiry->type = $request->type ?? '';
            $enquiry->product_id = $request->product_id ?? null;
            $enquiry->service_id = $request->service_id;
            //$enquiry->sub_service_id = $request->sub_service;
            $enquiry->message = $request->message;
            $enquiry->request_url = url()->previous();
            $enquiry->enquiry_type = $request->enquiry_type ? $request->enquiry_type : 'service-detail';
            if ($enquiry->save()) {
                $sendContactMail = Helper::SendServiceEnquiryMail($enquiry);
                if ($sendContactMail) {
                    toast('Enquiry submited!','success','top-right');
                    // return view('web.thankyou');
                    return redirect(url('/thankyou'));
                } else {
                    echo json_encode(array('status' => 'success', 'message' => "Error while submit the request"));
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Error while submit the request']);
            }
        }else{
            return response()->json(['status' => 'error', 'message' => 'Invalid reCAPTCHA. Please try again.']);
        
        }
    }
    public function page_404(){
        return view('web.error.404');
    }
}
