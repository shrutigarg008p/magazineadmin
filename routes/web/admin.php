<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PodcastController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\NotifTemplateController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RssFeedController;
use App\Http\Controllers\Admin\AdScreenController;
use App\Http\Controllers\Admin\Affiliations;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HeardFromController;
use App\Http\Controllers\Admin\MagazineController;
use App\Http\Controllers\Admin\NewspaperController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RefundController;
use App\Http\Controllers\Api\Customer\ForgotPasswordController;
use App\Http\Controllers\CropImageController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\ApplePlanController;

# Define All Admin Routes 
Route::prefix('admin')->name('admin.')->group( function(){
    Route::get('/', [AdminAuthController::class, 'index'])->name('index');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login');
    
    Route::middleware('auth.admin')->group( function(){

        Route::post('logout', [AdminAuthController::class, 'logout'])
            ->name('logout');
        Route::get('dashboard', [AdminController::class, 'index'])
            ->name('dashboard');
        Route::get('settings', [AdminController::class, 'settings'])
            ->name('settings');

        Route::post('changepassword', [AdminController::class, 'changePassword'])
            ->name('changePassword');
        Route::middleware(['can:manage users'])->group(function () {
            Route::resource('users', UserController::class);
            Route::get('/systemusers',[UserController::class,'system_users'])->name('users.systemUsers');
            Route::get('createsystemuser',[UserController::class,'createSystemUser'])->name('users.createsystemuser');
            Route::post('storesystemuser',[UserController::class,'storesystemuser'])->name('users.storesystemuser');
            Route::post('sendPasswordResetLink',[UserController::class,'sendPasswordResetLink'])->name('users.sendPasswordResetLink');
            Route::post('importusers', [UserController::class,'importUsers'])->name('importusers');
            Route::get('getUserListDataAjax',[UserController::class,'getUserListDataAjax'])->name('users.getUserListDataAjax');
            
            Route::get('affiliations', [Affiliations::class, 'index'])->name('affiliations');
            Route::post('affiliations_exports_file', [ReportController::class, 'affiliations_exports_file'])->name('affiliations_exports_file');
        });
        
          Route::get('plans/add-subscriptions', [UserController::class, 'addSubscriptions'])
        ->name('plans.addSubscriptions');
        
        Route::get('changepassword', [AdminController::class, 'change_view'])
            ->name('changeview');
        Route::post('changeadminpassword', [AdminController::class, 'changeAdminPassword'])
            ->name('changepassword');

        Route::middleware(['can:categories'])->group(function () {
            Route::resource('magcats', CategoryController::class);
            Route::post('magcats/{magcat}/changestatus', [CategoryController::class, 'changestatus'])
            ->name('magcats.changestatus');
        });

        Route::middleware(['can:publications'])->group(function () {
            Route::resource('publications', PublicationController::class);
            Route::post('publications/{publication}/changestatus', [PublicationController::class, 'changestatus'])
            ->name('publications.changestatus');
        });
        

        


        Route::middleware(['can:gallery'])->group(function () {
            Route::resource('galleries', GalleryController::class);
            Route::post('galleries/{gallery}/changestatus2', [GalleryController::class, 'changestatus'])->name('galleries.changestatus2');
            Route::post('galleries/{album}/changestatus', [GalleryController::class, 'changestatus'])->name('galleries.changestatus');
        });
        Route::middleware(['can:podcasts'])->group(function () {
            Route::resource('podcasts', PodcastController::class);
            Route::post('podcasts/{podcast}/changestatus', [PodcastController::class, 'changestatus'])->name('podcasts.changestatus');
        });
        Route::middleware(['can:videos'])->group(function () {
            Route::resource('videos', VideoController::class);
            Route::post('videos/{video}/changestatus', [VideoController::class, 'changestatus'])->name('videos.changestatus');
        });
        
        Route::middleware(['can:coupons'])->group(function () {
            Route::resource('coupon', CouponController::class);
        });
        
        Route::middleware(['can:blogs'])->group(function () {
            Route::resource('blogcats', BlogCategoryController::class);
            Route::resource('blogs', BlogController::class);
        });
        
        Route::middleware(['can:appleplan'])->group(function () {
            Route::resource('appleplan', ApplePlanController::class);
        });

        Route::middleware(['can:ads'])->group(function () {
            Route::resource('adscreen', AdScreenController::class);
            Route::get('changeScreenStatus', [AdScreenController::class,'changeStatus']);
            Route::get('changeShowStatus', [AdsController::class,'changeShowStatus']);
            Route::resource('ads',AdsController::class);
        });
        
        Route::middleware(['can:positions'])->group(function () {
            Route::get('custom',[PositionController::class,'index']);
            Route::post('custom-sortable',[PositionController::class,'update']);
        });

        Route::middleware(['can:notifications'])->group(function () {
            Route::match(['get', 'post'], 'notif_templates', [NotifTemplateController::class, 'index'])
            ->name('notif_templates.index');
        });
        
        Route::middleware(['can:rss'])->group(function () {
            Route::resource('rss_feed_mgt', RssFeedController::class);
            Route::post('resync/{rss_feed_mgt}', [RssFeedController::class, 'resync'])
            ->name('rss_feed_mgt.resync');
        });
        
        // Route::resource('tags', TagController::class);
        
        Route::middleware(['can:content manager'])->group(function () {
            Route::resource('content_manager',ContentController::class,['only'=>['index','edit','update']]);
        });
        

        

        
        
        Route::resource('plans', PlanController::class);
            
        Route::post('plans/{plan}/changestatus', [PlanController::class, 'changestatus'])
        ->name('plans.changestatus');
        
      
        
        Route::middleware(['can:magazines'])->group(function () {
            Route::resource('magazines', MagazineController::class);
        });
        Route::middleware(['can:newspapers'])->group(function () {
            Route::resource('newspapers', NewspaperController::class);
        });
        

        Route::middleware(['can:reports'])->group(function () {
            Route::get('getPdf/{type}/{file}', [PDFController::class,'getPdfByType'])->name('downloadPDF');
            // Route::get('exportUserExcel/{type}', [ExcelController::class, 'exportUserExcel'])->name('exportUserExcel');
            Route::prefix('reports')->group(function(){
                Route::get('/users/{type}', [ReportController::class, 'userreport'])->name('userreport');
                Route::post('getPdf/{type}/{file}', [ReportController::class,'getuserReport'])->name('downloadPDF');
                Route::get('download_report', [ReportController::class,'download_report'])->name('E_Report');
                Route::post('download_report_file', [ReportController::class,'download_report_file'])->name('E_Report_file');
                Route::post('download_ads_report_file', [ReportController::class,'download_ads_report_file'])->name('ads_report_file');
                Route::get('download_report_info/{id}/{type}', [ReportController::class,'download_report_info'])->name('E_ReportInfo');
                Route::get('subscription_report', [ReportController::class,'subscription_report'])->name('subscriptionReport');
                Route::get('Usersubscription_report/{id}/{status}', [ReportController::class,'Usersubscription_report'])->name('User_subscriptionReport');
                Route::get('download_subscription_file', [ReportController::class,'download_subscription_file'])->name('download_subscribe_file');
                Route::get('download_subscriptionfilters', [ReportController::class,'download_subscriptionfilters'])->name('download_E_subscript_filters');
                Route::get('ad_reading_views_report', [ReportController::class,'ad_reading_views_report'])->name('ad_reading_views_report');
                Route::post('payments_export_reports', [ReportController::class, 'payments_export_reports'])->name('payments_export_reports');
                Route::post('refund_export_reports', [ReportController::class, 'refund_export_reports'])->name('refund_export_reports');
                Route::post('plans_export_reports', [ReportController::class, 'plans_export_reports'])->name('plans_export_reports');
                Route::post('blogs_export_reports', [ReportController::class, 'blogs_export_reports'])->name('blogs_export_reports');
            });
        });
        

        Route::group([
            'prefix' => 'refund',
            'as' => 'refund.'
        ], function() {
            Route::get('/', [RefundController::class, 'index'])
                ->name('index');
            Route::post('process_refund', [RefundController::class, 'process_refund'])
                ->name('process_refund');
        });

        Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/banner/{id}/update', [BannerController::class, 'update'])->name('banner.update');

        Route::match(['get', 'post'], '/heard_from', [HeardFromController::class, 'index'])
            ->name('heard_from');

        Route::post('heard_from/{heard_from}/update', [HeardFromController::class, 'update'])
            ->name('heard_from.update');

        Route::post('heard_from/store', [HeardFromController::class, 'store'])
            ->name('heard_from.store');

        Route::match(['get', 'post'], 'payments', [PaymentsController::class, 'index'])->name('payments.index');
        Route::match(['get', 'post'], 'payments/update', [PaymentsController::class, 'update'])
            ->name('payments.update');
    });
   
}); 
Route::get('forgotpassword/{token}',[ForgotPasswordController::class,'checktoken']);
Route::post('forgetpasswordupdate',[ForgotPasswordController::class,'forgetpasswordupdate']);
Route::get('user/verify/{token}',[UserController::class,'verifyLinkFromAdmin'])->name('verifyLinkFromAdmin');
// Route::get('crop-image', [CropImageController::class,'index']);
// Route::post('crop-image', [CropImageController::class,'uploadCropImage'])->name('croppie.upload-image');

