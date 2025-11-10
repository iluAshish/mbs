<?php

use App\Http\Controllers\app\AboutController;
use App\Http\Controllers\app\AdminController;
use App\Http\Controllers\app\auth\LoginController;
 use App\Http\Controllers\app\BannerController;
use App\Http\Controllers\app\BrandsController;
use App\Http\Controllers\app\CaseStudiesController;
use App\Http\Controllers\app\CategoryController;
use App\Http\Controllers\app\SuccessStoryController;
use App\Http\Controllers\app\ContactController;
use App\Http\Controllers\app\HomeController;
use App\Http\Controllers\app\PortfolioController;
use App\Http\Controllers\app\ServiceController;
use App\Http\Controllers\app\SiteInformationController;
use App\Http\Controllers\app\TagController;
use App\Http\Controllers\app\TestimonialController;
use App\Http\Controllers\app\MediaController;
use App\Http\Controllers\app\EnquiryController;
 use App\Http\Controllers\app\GroupCompaniesController;
use App\Http\Controllers\app\OurSectorController;
use App\Http\Controllers\app\ProductController;
use App\Http\Controllers\app\ProjectController;
use App\Http\Controllers\app\V1MediaController;
use App\Http\Controllers\web\HomeController as WebHome;
use App\Models\SiteInformation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('route:clear');
    // return what you want
});

Route::get('/', [WebHome::class, 'home']);
Route::get('about-us', [WebHome::class, 'about_us'])->name('about-us');
Route::get('services', [WebHome::class, 'services'])->name('services');
Route::get('service-detail/{short_url}', [WebHome::class, 'service_detail'])->name('service-detail');
Route::get('projects', [WebHome::class, 'projects'])->name('projects');
Route::get('project-detail/{short_url}', [WebHome::class, 'project_detail'])->name('project-detail');
Route::get('sectors', [WebHome::class, 'sectors'])->name('sectors');
Route::get('media', [WebHome::class, 'media'])->name('media');
Route::get('brands', [WebHome::class, 'brands'])->name('brands');
Route::get('brands/{short_url}', [WebHome::class, 'brand_detail'])->name('brands.brand_detail');
Route::get('category-detail/{short_url}', [WebHome::class, 'category_detail'])->name('category.category_detail');



Route::get('home', [WebHome::class, 'home']);
Route::get('blogs', [WebHome::class, 'blogs'])->name('blogs.list')->defaults('type', 'blog');
Route::get('news-events', [WebHome::class, 'blogs'])->name('news-events.list')->defaults('type', 'news-events');

Route::get('products', [WebHome::class, 'products']);
Route::get('products/category/{short_url}', [WebHome::class, 'products'])->name('categories.detail');
Route::get('products/brand/{short_url}', [WebHome::class, 'products'])->name('brands.detail');

// Route::get('products/{short_url}', [WebHome::class, 'products']);
// Route::get('products', [WebHome::class, 'products']);

Route::get('product-detail/{short_url}', [WebHome::class, 'product_detail'])->name('product-detail');


// Route::get('product/{short_url}', [WebHome::class, 'category_detail']);
// Route::get('{type}/{short_url}', [WebHome::class, 'blog_detail']);

Route::get('blog/{short_url}', [WebHome::class, 'blog_detail'])->name('blogs.blog_detail')->defaults('type', 'blog');
Route::get('news-events/{short_url}', [WebHome::class, 'blog_detail'])->name('news-events.blog_detail')->defaults('type', 'news-events');

Route::get('about', [WebHome::class, 'about_us']);

Route::get('companies', [WebHome::class, 'companies']);
Route::get('portfolio', [WebHome::class, 'portfolio']);
Route::get('portfoliodetail{id}', [WebHome::class, 'portfoliodetail']);
Route::get('contact', [WebHome::class, 'contact']);
Route::post('portfolio-load-more', [WebHome::class, 'portfolioLoadMore']);
Route::post('products-load-more', [WebHome::class, 'productsLoadMore']);
Route::post('blog-load-more', [WebHome::class, 'blogLoadMore']);
Route::post('service-load-more', [WebHome::class, 'serviceLoadMore']);
Route::post('category-load-more', [WebHome::class, 'categoryProductLoadMore']);
Route::post('product-load-more', [WebHome::class, 'singleCategoryProductLoadMore']);

Route::get('contact-us', [WebHome::class, 'contact_us'])->name('contact-us');
Route::get('testimonials', [WebHome::class, 'testimonials']);
Route::post('testimonial-load-more', [WebHome::class, 'testimonialLoadMore']);
Route::get('medicom-scientific', [WebHome::class, 'services']);
Route::post('sub-services-load-more', [WebHome::class, 'subServiceLoadMore']);
// Route::get('service/{short_url}', [WebHome::class, 'service_detail']);
Route::get('faqs', [WebHome::class, 'faqs']);
Route::get('terms-and-conditions', [WebHome::class, 'terms_and_conditions']);
Route::get('privacy-policy', [WebHome::class, 'privacy_policy']);



Route::get('thankyou', [WebHome::class, 'thankyou'])->name('thankyou');
Route::post('enquiry', [WebHome::class, 'enquiry']);
Route::post('service-enquiry', [WebHome::class, 'enquiry']);
Route::post('product-enquiry', [WebHome::class, 'serviceEnquiry']);

Route::post('/newsletter/subscribe', [WebHome::class, 'subscribe']);
Route::get('/newsletter/unsubscribe/{token}', [WebHome::class, 'unsubscribe']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
    Route::post('/', [LoginController::class, 'login']);
    Route::post('forgot-password', [LoginController::class, 'forgot_password']);
    Route::get('reset-password/{token}', [LoginController::class, 'reset_password']);
    Route::post('reset-password', [LoginController::class, 'reset_password_store']);
    Route::post('reset-password-store', [LoginController::class, 'reset_password_store']);
    Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify');

    Route::prefix('subscription')->group(function () {

        Route::get('/', [HomeController::class, 'subscriber_list']);
        Route::post('delete', [HomeController::class, 'delete_subscriber']);

    });


    Route::prefix('success-stories')->group(function () {

        Route::get('/', [SuccessStoryController::class, 'success_stories']);
        Route::get('create', [SuccessStoryController::class, 'success_story_create']);
        Route::post('create', [SuccessStoryController::class, 'success_story_store']);
        Route::get('edit/{id}', [SuccessStoryController::class, 'success_story_edit']);
        Route::post('edit/{id}', [SuccessStoryController::class, 'success_story_update']);
        Route::post('delete', [SuccessStoryController::class, 'delete_success_story']);

        Route::prefix('awards')->group(function () {
            Route::get('/{success_story_id}', [SuccessStoryController::class, 'awards']);
            Route::get('/create/{id}', [SuccessStoryController::class, 'awards_create']);
            Route::get('/edit/{id}', [SuccessStoryController::class, 'awards_edit']);
            Route::post('/edit/{id}', [SuccessStoryController::class, 'awards_update']);
            Route::post('create/{id}', [SuccessStoryController::class, 'awards_store']);
            Route::post('delete', [SuccessStoryController::class, 'delete_awards']);
        });

    });

    Route::prefix('media')->group(function () {

        Route::get('/', [V1MediaController::class, 'index']);
        Route::get('create', [V1MediaController::class, 'media_create']);
        Route::post('create', [V1MediaController::class, 'media_store']);
        Route::get('edit/{id}', [V1MediaController::class, 'media_edit']);
        Route::post('edit/{id}', [V1MediaController::class, 'media_update']);
        Route::post('delete', [V1MediaController::class, 'delete_media']);

        Route::prefix('gallery')->group(function () {
            Route::get('/{media_id}', [V1MediaController::class, 'gallery']);
            Route::get('create/{media_id}', [V1MediaController::class, 'gallery_create']);
            Route::post('create/{media_id}', [V1MediaController::class, 'gallery_store']);
            Route::get('edit/{id}', [V1MediaController::class, 'gallery_edit']);
            Route::post('edit/{id}', [V1MediaController::class, 'gallery_update']);
            Route::post('delete', [V1MediaController::class, 'delete_gallery']);
        });
    });

    Route::prefix('products')->group(function () {

        Route::get('/', [ProductController::class, 'products']);
        Route::get('create', [ProductController::class, 'product_create']);
        Route::post('create', [ProductController::class, 'product_store']);
        Route::get('edit/{id}', [ProductController::class, 'product_edit']);
        Route::post('edit/{id}', [ProductController::class, 'product_update']);
        Route::post('delete', [ProductController::class, 'delete_product']);

        Route::prefix('gallery')->group(function () {
            Route::get('/{product_id}', [ProductController::class, 'gallery']);
            Route::get('create/{product_id}', [ProductController::class, 'gallery_create']);
            Route::post('create/{product_id}', [ProductController::class, 'gallery_store']);
            Route::get('edit/{id}', [ProductController::class, 'gallery_edit']);
            Route::post('edit/{id}', [ProductController::class, 'gallery_update']);
            Route::post('delete', [ProductController::class, 'delete_gallery']);
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [ProductController::class, 'category_list']);
            Route::get('create', [ProductController::class, 'category_create']);
            Route::post('create', [ProductController::class, 'category_store']);
            Route::get('edit/{id}', [ProductController::class, 'category_edit']);
            Route::post('edit/{id}', [ProductController::class, 'category_update']);
            Route::post('delete', [ProductController::class, 'delete_category']);
            Route::post('featured-to-home', [HomeController::class, 'featured_to_home']);
        });

        Route::prefix('brand')->group(function () {
            Route::get('/', [ProductController::class, 'brand_list']);
            Route::get('create', [ProductController::class, 'brand_create']);
            Route::post('create', [ProductController::class, 'brand_store']);
            Route::get('edit/{id}', [ProductController::class, 'brand_edit']);
            Route::post('edit/{id}', [ProductController::class, 'brand_update']);
            Route::post('delete', [ProductController::class, 'brand_delete']);
            Route::post('display-to-home', [HomeController::class, 'display_to_home']);

            Route::prefix('gallery')->group(function () {
                Route::get('/{brand_id}', [ProductController::class, 'brand_gallery']);
                Route::get('create/{brand_id}', [ProductController::class, 'brand_gallery_create']);
                Route::post('create/{brand_id}', [ProductController::class, 'brand_gallery_store']);
                Route::get('edit/{id}', [ProductController::class, 'brand_gallery_edit']);
                Route::post('edit/{id}', [ProductController::class, 'brand_gallery_update']);
                Route::post('delete', [ProductController::class, 'brand_gallery_delete']);
            });

            Route::prefix('icon')->group(function () {
                Route::get('/{brand_id}', [ProductController::class, 'brand_icon']);
                Route::get('create/{brand_id}', [ProductController::class, 'brand_icon_create']);
                Route::post('create/{brand_id}', [ProductController::class, 'brand_icon_store']);
                Route::get('edit/{id}', [ProductController::class, 'brand_icon_edit']);
                Route::post('edit/{id}', [ProductController::class, 'brand_icon_update']);
                Route::post('delete', [ProductController::class, 'brand_icon_delete']);
            });
        });

        // Route::prefix('specification')->group(function () {
        //     Route::get('/{product_id}', [ProductController::class, 'specification']);
        //     Route::get('/create/{id}', [ProductController::class, 'specification_create']);
        //     Route::get('/edit/{id}', [ProductController::class, 'specification_edit']);
        //     Route::post('/edit/{id}', [ProductController::class, 'specification_update']);
        //     Route::post('create/{id}', [ProductController::class, 'specification_store']);
        //     Route::post('delete', [ProductController::class, 'delete_specification']);
        // });

    });

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard']);
    // dd('asdfd');

    // projects started here 
    Route::prefix('project')->group(function () {

        Route::get('/', [ProjectController::class, 'index']);
        Route::get('create', [ProjectController::class, 'project_create']);
        Route::post('create', [ProjectController::class, 'project_store']);
        Route::get('edit/{id}', [ProjectController::class, 'project_edit']);
        Route::post('edit/{id}', [ProjectController::class, 'project_update']);
        Route::post('delete', [ProjectController::class, 'delete_project']);

        Route::prefix('gallery')->group(function () {
            Route::get('/{project_id}', [ProjectController::class, 'gallery']);
            Route::get('create/{project_id}', [ProjectController::class, 'gallery_create']);
            Route::post('create/{project_id}', [ProjectController::class, 'gallery_store']);
            Route::get('edit/{id}', [ProjectController::class, 'gallery_edit']);
            Route::post('edit/{id}', [ProjectController::class, 'gallery_update']);
            Route::post('delete', [ProjectController::class, 'delete_gallery']);
        });
    }); 

    Route::prefix('sector')->group(function () {

        Route::get('/', [OurSectorController::class, 'index']);
        Route::get('create', [OurSectorController::class, 'sector_create']);
        Route::post('create', [OurSectorController::class, 'sector_store']);
        Route::get('edit/{id}', [OurSectorController::class, 'sector_edit']);
        Route::post('edit/{id}', [OurSectorController::class, 'sector_update']);
        Route::post('delete', [OurSectorController::class, 'delete_sector']);
    });


    // end here 

    /************************** Admin starts *****************************/
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/', [AdminController::class, 'list']);
        Route::get('create', [AdminController::class, 'create']);
        Route::post('create', [AdminController::class, 'store']);
        Route::get('edit/{id}', [AdminController::class, 'edit']);
        Route::get('view/{id}', [AdminController::class, 'view']);
        Route::post('edit/{id}', [AdminController::class, 'update']);
        Route::post('delete/', [AdminController::class, 'delete_admin']);
        Route::group(['prefix' => 'reset-password'], function () {
            Route::get('/{id}', [AdminController::class, 'reset_password']);
            Route::post('/{id}', [AdminController::class, 'reset_password_store']);
        });
        Route::get('profile', [AdminController::class, 'profile']);
        Route::post('profile', [AdminController::class, 'profile_store']);
    });

    Route::post('status-change', [HomeController::class, 'status_change']);
    Route::post('change-bool-status', [HomeController::class, 'display_to_home']);
    Route::post('featured-bool-status', [HomeController::class, 'featured_to_home']);
    Route::post('case-bool-status', [HomeController::class, 'case_study_status']);
    
    
     Route::group(['prefix' => 'companies'], function () {
            Route::get('/', [BrandsController::class, 'company_list']);
            Route::get('create', [BrandsController::class, 'company_create']);
            Route::post('create', [BrandsController::class, 'company_store']);
            Route::get('edit/{id}', [BrandsController::class, 'company_edit']);
            Route::post('edit/{id}', [BrandsController::class, 'company_update']);
            Route::post('delete', [BrandsController::class, 'company_delete']);


        });
        
    /************************** Home starts *******************************/
    Route::group(['prefix' => 'home'], function () {

        Route::post('sort_order', [HomeController::class, 'sort_order']);
        Route::post('delete-file', [HomeController::class, 'delete_file']);

        Route::group(['prefix' => 'slider'], function () {
            Route::get('/', [HomeController::class, 'slider_list']);
            Route::get('create', [HomeController::class, 'slider_create']);
            Route::post('create', [HomeController::class, 'slider_store']);
            Route::get('edit/{id}', [HomeController::class, 'slider_edit']);
            Route::post('edit/{id}', [HomeController::class, 'slider_update']);
            Route::post('delete', [HomeController::class, 'delete_slider']);
        });

        Route::get('/about-us', [HomeController::class, 'home_about_us']);
        Route::post('/about-us', [HomeController::class, 'home_about_us_store']);

        Route::get('/home-video-banner', [HomeController::class, 'homevideobanner']);
        Route::post('/home-video-banner', [HomeController::class, 'homevideobanner_store']);

        Route::get('/how-we-can-help', [HomeController::class, 'how_we_can_help']);
        Route::post('/how-we-can-help', [HomeController::class, 'how_we_can_help_store']);

        // Route::get('/our-services', [HomeController::class, 'home_our_services']);
        // Route::post('/our-services', [HomeController::class, 'home_our_services_store']);

        Route::get('/why-choose-us', [HomeController::class, 'home_why_choose_us']);
        Route::get('/why-choose-us/{id}', [HomeController::class, 'home_why_choose_us_edit']);
        Route::post('/why-choose-us/{id}', [HomeController::class, 'home_why_choose_us_store']);
        Route::get('/why-choose-us-index', [HomeController::class, 'home_why_choose_us_index']);
        Route::post('/why-choose-us', [HomeController::class, 'home_why_choose_us_store']);
        Route::post('/why-choose-us-delete', [HomeController::class, 'delete_why_choose_us']);
        Route::post('/common-content', [HomeController::class, 'common_content']);
       


        Route::group(['prefix' => 'clients'], function () {
            Route::get('/', [GroupCompaniesController::class, 'list']);
            Route::get('create', [GroupCompaniesController::class, 'create']);
            Route::post('create', [GroupCompaniesController::class, 'store']);
            Route::get('edit/{id}', [GroupCompaniesController::class, 'edit']);
            Route::post('edit/{id}', [GroupCompaniesController::class, 'update']);
            Route::post('delete', [GroupCompaniesController::class, 'delete']);


        });

        Route::group(['prefix' => 'case-study'], function () {
            Route::get('/', [CaseStudiesController::class, 'list']);
            Route::get('create', [CaseStudiesController::class, 'create']);
            Route::post('create', [CaseStudiesController::class, 'store']);
            Route::get('edit/{id}', [CaseStudiesController::class, 'edit']);
            Route::post('edit/{id}', [CaseStudiesController::class, 'update']);
            Route::post('delete', [CaseStudiesController::class, 'delete']);


        });

        Route::group(['prefix' => 'brands'], function () {
            Route::get('/', [BrandsController::class, 'list']);
            Route::get('create', [BrandsController::class, 'create']);
            Route::post('create', [BrandsController::class, 'store']);
            Route::get('edit/{id}', [BrandsController::class, 'edit']);
            Route::post('edit/{id}', [BrandsController::class, 'update']);
            Route::post('delete', [BrandsController::class, 'delete']);
        });


        Route::group(['prefix' => 'key-feature'], function () {
            Route::get('/', [HomeController::class, 'key_feature']);
            Route::get('create', [HomeController::class, 'key_feature_create']);
            Route::post('create', [HomeController::class, 'key_feature_store']);
            Route::get('edit/{id}', [HomeController::class, 'key_feature_edit']);
            Route::post('edit/{id}', [HomeController::class, 'key_feature_update']);
            Route::post('delete', [HomeController::class, 'delete_key_feature']);
            Route::get('/image', [HomeController::class, 'key_feature_image']);
            Route::post('image/create', [HomeController::class, 'key_feature_create_image']);
        });

        Route::group(['prefix' => 'features'], function () {
            Route::get('/', [HomeController::class, 'feature']);
            Route::get('create', [HomeController::class, 'feature_create']);
            Route::post('create', [HomeController::class, 'feature_store']);
            Route::get('edit/{id}', [HomeController::class, 'feature_edit']);
            Route::post('edit/{id}', [HomeController::class, 'feature_update']);
            Route::post('delete', [HomeController::class, 'delete_feature']);
            Route::get('/image', [HomeController::class, 'feature_image']);
            Route::post('image/create', [HomeController::class, 'feature_create_image']);
        });

        /************************ Testimonial starts ************************************/
        Route::group(['prefix' => 'testimonial'], function () {
            Route::get('/', [TestimonialController::class, 'list']);
            Route::get('create', [TestimonialController::class, 'create']);
            Route::post('create', [TestimonialController::class, 'store']);
            Route::get('edit/{id}', [TestimonialController::class, 'edit']);
            Route::post('edit/{id}', [TestimonialController::class, 'update']);
            Route::post('delete', [TestimonialController::class, 'delete']);
        });
    });
    /************************ Home ends ************************************/

    /************************ Portfolio starts *****************************/
     Route::group(['prefix' => 'portfolio'], function () {
         Route::get('/', [PortfolioController::class, 'portfolio']);
         Route::get('create', [PortfolioController::class, 'portfolio_create']);
         Route::post('create', [PortfolioController::class, 'portfolio_store']);
         Route::get('edit/{id}', [PortfolioController::class, 'portfolio_edit']);
         Route::post('edit/{id}', [PortfolioController::class, 'portfolio_update']);
         Route::post('delete', [PortfolioController::class, 'delete_portfolio']);

         Route::group(['prefix' => 'gallery'], function () {
            Route::get('/{id}', [PortfolioController::class, 'gallery']);
            Route::get('create/{id}', [PortfolioController::class, 'gallery_create']);
            Route::post('create/{id}', [PortfolioController::class, 'gallery_store']);
            Route::get('edit/{id}', [PortfolioController::class, 'gallery_edit']);
            Route::post('edit/{id}', [PortfolioController::class, 'gallery_update']);
            Route::post('delete', [PortfolioController::class, 'delete_gallery']);
        });
        
     });

    /*********************** Portfolio ends *********************************/

    /************************ About starts ************************************/
    Route::group(['prefix' => 'about-us'], function () {
        Route::get('/', [AboutController::class, 'about_us']);
        Route::post('/', [AboutController::class, 'about_us_store']);

    
    });

    /************************ Service starts *************************************/
    Route::group(['prefix' => 'service'], function () {

        Route::get('/', [ServiceController::class, 'service']);
        Route::get('create/', [ServiceController::class, 'service_create']);
        Route::post('create/', [ServiceController::class, 'service_store']);
        Route::get('edit/{id}', [ServiceController::class, 'service_edit']);
        Route::post('edit/{id}', [ServiceController::class, 'service_update']);
        Route::get('view/{id}', [ServiceController::class, 'service_view']);
        Route::post('delete/', [ServiceController::class, 'service_delete']);

        Route::group(['prefix' => 'sub-services'], function () {
            Route::get('/', [ServiceController::class, 'sub_service']);
            Route::get('create/', [ServiceController::class, 'sub_service_create']);
            Route::post('create/', [ServiceController::class, 'sub_service_store']);
            Route::get('edit/{id}', [ServiceController::class, 'sub_service_edit']);
            Route::post('edit/{id}', [ServiceController::class, 'sub_service_update']);
            Route::post('delete/', [ServiceController::class, 'delete_sub_service']);
        });

        Route::group(['prefix' => 'faq'], function () {
            Route::get('/', [ServiceController::class, 'faq']);
            Route::get('create/', [ServiceController::class, 'faq_create']);
            Route::post('create/', [ServiceController::class, 'faq_store']);
            Route::get('edit/{id}', [ServiceController::class, 'faq_edit']);
            Route::post('edit/{id}', [ServiceController::class, 'faq_update']);
            Route::get('view/{id}', [ServiceController::class, 'faq_view']);
            Route::post('delete/', [ServiceController::class, 'faq_delete']);
        });


    });


    /************************ Banner starts *************************************/
    Route::prefix('banner')->group(function () {
        Route::get('/{type}', [BannerController::class, 'banner']);
        Route::post('{type}', [BannerController::class, 'banner_store']);
    });
    /************************ Banner ends *************************************/

    /***************************** Meta Tags Starts ***********************************/
     Route::group(['prefix' => 'tag'], function () {
         Route::get('/{type}/', [TagController::class, 'tag']);
         Route::post('/{type}/', [TagController::class, 'tag_store']);
     });

     Route::group(['prefix' => 'other-meta-tag'], function () {
         Route::get('/', [TagController::class, 'other_meta_tag']);
         Route::post('/', [TagController::class, 'other_meta_tag_store']);
     });
    /*************************** Meta Tags Ends **************************************/

    /***************************** Site Information Starts ***********************/

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'contact']);
        Route::post('/', [ContactController::class, 'contact_store']);

        Route::group(['prefix' => 'location'], function () {
            Route::get('/', [ContactController::class, 'location']);
            Route::get('create/', [ContactController::class, 'location_create']);
            Route::post('create/', [ContactController::class, 'location_store']);
            Route::get('edit/{id}', [ContactController::class, 'location_edit']);
            Route::post('edit/{id}', [ContactController::class, 'location_update']);
            Route::post('delete/', [ContactController::class, 'delete_location']);
        });
    });


    Route::group(['prefix' => 'site-settings'], function () {
        Route::get('/', [SiteInformationController::class, 'site_information']);
        Route::post('/', [SiteInformationController::class, 'site_information_store']);

    });
    /*************************** Site Information Ends **************************************/

    /************************ Blog starts ************************************/
    Route::group(['prefix' => 'media'], function () {
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', [MediaController::class, 'blog_list'])->name('blog.list')->defaults('type', 'blog');
            Route::get('create', [MediaController::class, 'blog_create'])->name('blog.create')->defaults('type', 'blog');
            Route::post('create', [MediaController::class, 'blog_store'])->name('blog.store')->defaults('type', 'blog');
            Route::get('edit/{id}', [MediaController::class, 'blog_edit'])->name('blog.edit')->defaults('type', 'blog');
            Route::post('edit/{id}', [MediaController::class, 'blog_update'])->name('blog.update')->defaults('type', 'blog');
            Route::post('delete', [MediaController::class, 'delete_blog'])->name('blog.delete');
        });
    
        Route::group(['prefix' => 'news-events'], function () {
            Route::get('/', [MediaController::class, 'blog_list'])->name('news-events.list')->defaults('type', 'news-events');
            Route::get('create', [MediaController::class, 'blog_create'])->name('news-events.create')->defaults('type', 'news-events');
            Route::post('create', [MediaController::class, 'blog_store'])->name('news-events.store')->defaults('type', 'news-events');
            Route::get('edit/{id}', [MediaController::class, 'blog_edit'])->name('news-events.edit')->defaults('type', 'news-events');
            Route::post('edit/{id}', [MediaController::class, 'blog_update'])->name('news-events.update')->defaults('type', 'news-events');
            Route::post('delete', [MediaController::class, 'delete_blog'])->name('news-events.delete');
        });
    });

    

    Route::prefix('enquiry')->group(function () {
        Route::post('reply', [EnquiryController::class, 'reply_to_enquiry']);
         Route::post('servicereply', [EnquiryController::class, 'reply_to_serviceenquiry']);
        Route::post('text_us_partner_reply', [EnquiryController::class, 'reply_to_text_us_partner']);

        // Route::prefix('enquiries')->group(function () {
        //     Route::get('/', [EnquiryController::class, 'enquiry_list']);
        //     Route::get('view/{id}', [EnquiryController::class, 'enquiry_view']);
        //     Route::post('delete', [EnquiryController::class, 'delete_enquiry']);
        //     Route::post('delete-multiple', [EnquiryController::class, 'delete_multi_enquiry']);
        // });

        Route::prefix('contact-us')->group(function () {
            Route::get('/', [EnquiryController::class, 'enquiry_list']);
            Route::get('view/{id}', [EnquiryController::class, 'enquiry_view']);
            Route::post('delete', [EnquiryController::class, 'delete_enquiry']);
            Route::post('delete-multiple', [EnquiryController::class, 'delete_multi_enquiry']);
        });

        Route::prefix('service-detail')->group(function () {
            Route::get('/', [EnquiryController::class, 'service_enquiry_list']);
            Route::get('view/{id}', [EnquiryController::class, 'service_enquiry_view']);
            Route::post('delete', [EnquiryController::class, 'delete_service_enquiry']);
            Route::post('delete-multiple', [EnquiryController::class, 'delete_multi_service_enquiry']);
        });

        Route::prefix('product-detail')->group(function () {
            Route::get('/', [EnquiryController::class, 'product_enquiry_list']);
            Route::get('view/{id}', [EnquiryController::class, 'product_enquiry_view']);
            Route::post('delete', [EnquiryController::class, 'delete_product_enquiry']);
            Route::post('delete-multiple', [EnquiryController::class, 'delete_multi_product_enquiry']);
        });

        Route::prefix('brand-detail')->group(function () {
            Route::get('/', [EnquiryController::class, 'brand_enquiry_list']);
            Route::get('view/{id}', [EnquiryController::class, 'brand_enquiry_view']);
            Route::post('delete', [EnquiryController::class, 'delete_brand_enquiry']);
            Route::post('delete-multiple', [EnquiryController::class, 'delete_multi_brand_enquiry']);
        });
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::any('{catchall}', [WebHome::class, 'page_404'])->where('catchall', '.*');
