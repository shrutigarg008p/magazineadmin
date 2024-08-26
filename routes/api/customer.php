<?php

use App\Http\Controllers\Api\Customer\HomeController;
use App\Http\Controllers\Api\Customer\MagazineController;
use App\Http\Controllers\Api\Customer\NewspaperController;
use App\Http\Controllers\Api\Customer\BlogPostController;
use App\Http\Controllers\Api\Customer\PodcastController;
use App\Http\Controllers\Api\Customer\VideosController;
use App\Http\Controllers\Api\Customer\CategoryController;
use App\Http\Controllers\Api\Customer\GalleryController;
use App\Http\Controllers\Api\Customer\TagController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\Customer\ForgotPasswordController;
use App\Http\Controllers\Api\Customer\ContactUsController;
use App\Http\Controllers\Api\Customer\AboutUsController;
use App\Http\Controllers\Api\Customer\ActivityCountController;
use App\Http\Controllers\Api\Customer\ArchiveCotroller;
use App\Http\Controllers\Api\Customer\BlogSubscriptionController;
use App\Http\Controllers\Api\Customer\PremiumContentController;
use App\Http\Controllers\Api\Customer\SubscriptionController;
use App\Http\Controllers\Api\Customer\UserSettingController;
use Illuminate\Support\Facades\Route;

# Define All Customer API Routes 
Route::prefix('customer')->group( function(){
    # Guest routes

    # Authenticated Routes
    Route::middleware('jwt.verify')->group( function(){
        Route::get('/home', [HomeController::class, 'index'])->name('api.guest.home');
        Route::get('/home_dev', [HomeController::class, 'index_dev']);            # duplicate url for testing 
        Route::post('/home-search', [HomeController::class, 'homeSearching']);            # searching api
        Route::post('/home-search2', [HomeController::class, 'homeSearching2'])->name('api.guest.search2');            # searching api
        Route::post('/publication_list', [HomeController::class, 'publication_list'])->name('api.guest.publication_list');            # searching api

        # Magazine Routes
        Route::prefix('magazines')->group(function(){
            Route::get('/', [MagazineController::class, 'index'])->name('api.guest.magazine.listing');
            Route::get('/{magazine}/view', [MagazineController::class, 'view'])->name('api.guest.magazine.detail');
            Route::get('/{magazine}/pdf', [MagazineController::class, 'sendPdf']);
            Route::get('/{magazine}/mark_as_downloaded', [MagazineController::class, 'markFileAsDownloaded']);
        });
        Route::prefix('newspapers')->group(function(){
            Route::post('/', [NewspaperController::class, 'index'])->name('api.guest.newspaper.listing');
            Route::get('/{newspaper}/view', [NewspaperController::class, 'view'])->name('api.guest.newspaper.detail');
            Route::get('/{newspaper}/pdf', [NewspaperController::class, 'sendPdf']);
            Route::get('/{newspaper}/mark_as_downloaded', [NewspaperController::class, 'markFileAsDownloaded']);

        });
        Route::prefix('blogs')->group(function(){
            Route::get('promoted_content/listing', [BlogPostController::class, 'promoted_content'])->name('api.guest.promoted_content');
            Route::get('promoted_content/{promoted_content}/view', [BlogPostController::class, 'view']);
            Route::get('top_story/listing', [BlogPostController::class, 'top_story'])->name('api.guest.top_story');
            Route::get('top_story/{top_story}/view', [BlogPostController::class, 'viewTopStory']);
        });
        Route::prefix('podcasts')->group(function(){
            Route::get('/', [PodcastController::class, 'index'])->name('api.guest.podcast.listing');
            Route::post('/detail', [PodcastController::class, 'detail']);
        });
        Route::prefix('videos')->group(function(){
            Route::get('/', [VideosController::class, 'index'])->name('api.guest.video.listing');
            Route::post('/detail', [VideosController::class, 'detail']);
        });
        Route::prefix('gallery')->group(function(){
            Route::get('/', [GalleryController::class, 'index'])->name('api.guest.gallery.listing');
            Route::match(['get','post'], '/galleryListing', [GalleryController::class, 'galleryListingforAlbum'])->name('api.guest.gallery.listing.album');
            Route::get('/albumListing', [GalleryController::class, 'albumListing'])->name('api.guest.album_listing');
        });
        Route::prefix('coupons')->group(function(){
            Route::get('/', [HomeController::class, 'couponList']);
            Route::post('/applyCoupon', [HomeController::class, 'applyCoupon']);
            Route::post('/removeCoupon', [HomeController::class, 'removeCoupon']);
        });

        // #obsolete
        Route::prefix('category')->group(function(){
            Route::get('/{category}/popular_categories_details', [CategoryController::class, 'filter_category_magazines_newspapers_data']);
            Route::get('/all_category_listing', [CategoryController::class, 'all_categories_data']);
            Route::get('/{category}/newspapers', [CategoryController::class, 'filter_category_newspapers_data']);
        });
        Route::post('topics_to_follow', [CategoryController::class, 'topics_to_follow'])->name('api.guest.topics_to_follow');

        Route::prefix('tags')->group(function(){
            Route::get('/{tags}/details', [TagController::class, 'tag_details']);
            Route::get('/listing', [TagController::class, 'tags_listing']);

        });
        Route::prefix('archive')->group(function(){
            Route::post('/listing', [ArchiveCotroller::class, 'listing']);
        });
        Route::post('getactivity_event',[ActivityCountController::class, 'get_activity_count']);

        #Buy a plan for subscription
        Route::get('all_plans', [SubscriptionController::class, 'all_plans']);
        Route::post('paystack_new_plan', [SubscriptionController::class, 'paystack_new_plan']); // also for renew
        Route::post('referral_new_plan', [SubscriptionController::class, 'referral_new_plan']);
        Route::post('paystack_verify', [SubscriptionController::class, 'paystack_verify']);
        Route::get('my_subscriptions', [SubscriptionController::class, 'my_subscriptions']);
        Route::post('subscription_refund', [SubscriptionController::class, 'subscription_refund']);

        Route::get('blog_all_plans', [BlogSubscriptionController::class, 'all_plans']);
        Route::post('blog_paystack_new_plan', [BlogSubscriptionController::class, 'paystack_new_plan']);
        Route::post('blog_paystack_verify', [BlogSubscriptionController::class, 'paystack_verify']);
        Route::get('blog_my_subscriptions', [BlogSubscriptionController::class, 'my_subscriptions']);

        #User settings
        Route::post('settings', [UserSettingController::class, 'update']);
        Route::post('profile_update', [UserSettingController::class, 'profile_update']);
        Route::get('getPreferences', [UserSettingController::class, 'getPreferences']);
        Route::match(['get','post'], 'delete_account', [UserSettingController::class, 'delete_account']);

        #Bookmarks 
        Route::post('set_bookmark', [HomeController::class, 'setBookmark']);
        Route::post('save_topics', [HomeController::class, 'savePreferences']);
        Route::get('get_bookmarks', [HomeController::class, 'getBookmarks_dev']);
        Route::get('get_bookmarks2', [HomeController::class, 'getBookmarks_dev2']);

        Route::get('user_downloads', [MagazineController::class, 'user_downloads']);

        Route::post('premium_content/buy', [PremiumContentController::class, 'buy']);
        Route::post('notification_test', [PremiumContentController::class, 'notification_test']);

        Route::post('grid_collection', [PremiumContentController::class, 'grid_collection']);

        Route::get('user_refunds', [CommonController::class, 'user_refunds']);
    });
    Route::get('magazines/flip_type/{magazine}', [MagazineController::class, 'send_link']);
    Route::get('magazines/flip_pdf/{magazine}', [MagazineController::class, 'pdf_flip_views']);

    Route::get('newspapers/flip_type/{newspaper}', [NewspaperController::class, 'send_link']);
    Route::get('newspapers/flip_pdf/{newspaper}', [NewspaperController::class, 'pdf_flip_views']);
    
    Route::get('user/verify/{token}',[AuthController::class,'verifylink']);
    Route::post('sendresetlink',[ForgotPasswordController::class,'sendresetlink']);

    Route::post('changepassword',[AuthController::class,'changepassword']);
    Route::post('contactus',[ContactUsController::class,'index']);
    Route::get('aboutus',[AboutUsController::class,'index']);
    Route::get('privacyPolicy',[AboutUsController::class,'privacyPolicy']);
    Route::get('courtesies',[AboutUsController::class,'courtesies']);
    Route::get('policiesandlicences',[AboutUsController::class,'policiesandlicences']);
    Route::get('faq',[AboutUsController::class,'faq']);
    Route::get('instagramData',[AboutUsController::class,'instagramData']);
});

Route::match(['get', 'post'], 'check_coupon', [\App\Http\Controllers\Web\UserController::class, 'check_coupon']);
Route::get('user_downloads1', [MagazineController::class, 'user_downloads1']);