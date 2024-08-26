<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\MagazineController;
use App\Http\Controllers\Web\NewspaperController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\ForgotPasswordController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\TagsController;
use App\Http\Controllers\Web\VideosController;
use App\Http\Controllers\Web\PodcastsController;
use App\Http\Controllers\Web\GalleriesController;
use App\Http\Controllers\Web\BookmarkController;
use App\Http\Controllers\Web\HomeSearchController;
use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\ShareSocialController; 
use App\Http\Controllers\Web\SubscriptionController; 
use App\Http\Controllers\Web\WebProfileController; 
use App\Http\Controllers\Web\InstagramController; 
use App\Http\Controllers\Web\PremiumController; 
use App\Http\Controllers\Web\SocialController;
use App\Http\Controllers\Web\ArchiveController;

Route::prefix('customer')->name('customer.')->group( function(){
    Route::resource('user', UserController::class);
    Route::post('login', [UserController::class, 'login'])->name('login');
    // Route::get('home',[UserController::class,'homepage'])->name('home');
    Route::group(['middleware'=>'disable_back_btn'],function(){
        Route::group(['middleware'=>'weblogin'],function(){
        Route::get('/',[UserController::class,'index'])->name('home');
        });
    });    
    // Route::get('/',[UserController::class,'index'])->name('home')->middleware('weblogin');
    Route::get('user/verify/{token}',[UserController::class,'verifylink'])
        ->name('verify.email.link');
    /*forgot password*/
    Route::post('forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])
    ->name('forgotpassword');
    Route::get('forgotpassword/{token}',[ForgotPasswordController::class,'checktoken']);
    Route::post('forgotpasswordupdate',[ForgotPasswordController::class,'forgetpasswordUpdate']);
    /*end*/
    Route::get('web_terms',[UserController::class,'web_terms'])->name('terms');

});
Route::post('/contact-form', [ContactUsController::class, 'storeContactForm'])->name('contact-form.store'); 
Route::get('/', [UserController::class, 'index'])->name('home');
// Route::get('/', function () {
//     // Auth::logout();
//     return view('customer.pages.login');
// })->name('home');
// Route::get('/', [UserController::class, 'index'])->name('home');

// Route::get('/',[UserController::class,'index'])->name('home');
# Auth Routes
Route::get('login', function () {
    // Auth::logout();
    if(auth()->user()){

        return redirect()->route('customer.home')->with('error','Already Logged in.');
    }else{
        $request = request();

        if( $redirect_to = $request->query('redirect_to') ) {
            if( ($d = @parse_url($redirect_to)) && isset($d['host']) ) {
                if( $request->getHost() == $d['host'] ) {
                    $request->session()->put('redirect_route', $redirect_to);
                }
            }
        }

        return view('customer.pages.login');
    }
})->name('login');

Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('getstory', [UserController::class, 'getstory'])->name('universalLink');
// Route::view('categories/details', 'customer.categories.show')->name('categories.show');
// Route::get('categories/{category}/details',[CategoryController::class,'details']);


#Popular Categories Details and List Route
// Route::get('categories/{category}/details',[CategoryController::class,'details']);
Route::get('categories/listing',[CategoryController::class,'listing']);
#category listing filter on behalf on user preferences
Route::get('categories/listing/{id}',[CategoryController::class,'listing']);
#end
#end

#Tags Details And Listing
Route::get('tags/{tag}/details',[TagsController::class,'details']);
Route::get('tags/listing',[TagsController::class,'listing']);
#end

#promoted details and Listing
Route::get('promoted',[BlogController::class,'indexPromoted']);
#Promoted Details
// Route::get('promoted/{blog}/details',[BlogController::class,'detailsContent'])
//     ->name('promoted.detail');

// #TopStory Details
// Route::get('topstory/{blog}/details',[BlogController::class,'details'])
//     ->name('topstory.detail');
// #end

// Route::get('blogpost/{blog}/details',[BlogController::class,'blogpost'])
//     ->name('blog.post');

#topstory details and listing
Route::get('topstory',[BlogController::class,'indexTopStory']);

#Slider details
Route::get('blog/{blog}/details',[BlogController::class,'blogDetails']);
#end

#end
#magazines list
Route::get('magazine/listing',[MagazineController::class,'listing']);

#new list
Route::get('newspapers/listing',[NewspaperController::class,'listing']);
#end

#videos list
Route::get('videos/listing',[VideosController::class,'listing']);
#Videos Share view
Route::get('videos/{video}/view',[VideosController::class,'view'])->name('video.view');
#end

#podcasts list
Route::get('podcasts/listing',[PodcastsController::class,'listing']);
#Podcast Share View
Route::get('podcasts/{podcast}/view',[PodcastsController::class,'view'])
    ->name('podcast.view')
    ->middleware(['auth']);
#end

#galleries list
Route::get('galleries/listing',[GalleriesController::class,'listing']);
#end



#related magazines,newspapers
Route::get('related/magazine/{magazine}/listing',[MagazineController::class,'relatedMagazineList']);
Route::get('related/newspapers/{newspaper}/listing',[NewspaperController::class,'relatedMagazineList']);
#end

/*search blade magazines list with include header*/
Route::get('magazine/list',[MagazineController::class,'magazinesListing'])->name('magazines');
Route::get('magazine/category/{category}/details',[MagazineController::class,'magazinesByCategory']);
Route::post('filter',[MagazineController::class,'searchFilter'])->name('filter');
/*end*/

/*Archive*/
Route::post('filter/archive',[ArchiveController::class,'filterArchive'])->name('archive');
/**/

/*search blade news list with include header*/
Route::get('newspapers/list',[NewspaperController::class,'newsListing'])->name('news');
Route::get('news/category/{category}/details',[NewspaperController::class,'newsByCategory']);
Route::post('filter/news',[NewspaperController::class,'searchFilterNews'])->name('filternews');
/*end*/

/*for news listing by category*/
Route::get('newspapers/category/{category}/details',[NewspaperController::class,'newspapersByCategory']);

/*for magazine listiing by category */
Route::get('magazine/list/{category}/details',[MagazineController::class,'magazinesByCat']);

#filter news
Route::post('filter/news',[NewspaperController::class,'searchFilterNewspaper'])->name('filternews');

#filter magazine
Route::post('filter/mags',[MagazineController::class,'searchFilterMagazine'])->name('filtermags');

#download newspapers
Route::post('download',[NewspaperController::class,'download'])->name('download');

#download magazines
Route::post('download/mags',[MagazineController::class,'download'])->name('download_mags');



#Bookmark
Route::post('set_bookmark', [BookmarkController::class, 'set_bookmark']);


Route::get('magazines/{magazine}/de', [MagazineController::class, 'de']);


         

// Route::view('login', 'customer.pages.login')->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
// Route::view('register', 'customer.pages.register')->name('register');
Route::view('forgot-password', 'customer.pages.forgot_password')->name('forgot_password');
# Pages Routes
// Route::view('aboutus', 'customer.pages.aboutus')->name('aboutus');
Route::view('contactus', 'customer.pages.contactus')->name('contactus');
Route::view('faq', 'customer.pages.faq')->name('faq');
# Magazines Routes
// Route::view('magazines', 'customer.magazines.index')->name('magazines');
Route::view('magazines/details', 'customer.magazines.show')->name('magazines.show');
#Magazine News Details
Route::get('magazine/{magazine}/details',[MagazineController::class,'details']);
Route::get('newspapers/{newspaper}/details',[NewspaperController::class,'details']);



#aboutus
Route::get('aboutus',[AboutUsController::class,'index'])->name('aboutus');
#end

Route::get('privacyPolicy',[AboutUsController::class,'privacyPolicy']);
Route::get('courtesies',[AboutUsController::class,'courtesies']);
Route::get('policiesandlicences',[AboutUsController::class,'policiesandlicences']);
Route::get('faq',[AboutUsController::class,'faq'])->name('faq');
Route::get('terms',[AboutUsController::class,'terms'])->name('terms');


#Pdf Viewer for Homepage Show Details
Route::get('pdf/{magazine}/viewer',[MagazineController::class,'pdfViewer'])
    ->name('magazine.pdfviewer');
Route::get('pdf/{newspaper}/pdfviewer',[NewspaperController::class,'pdfViewer'])
    ->name('newspaper.pdfviewer');
#end


// Route::get('categories/{category}/details',[NewspaperController::class,'details'])->middleware('weblogin');
// Route::get('top_story/{id}/details',[NewspaperController::class,'details'])->middleware('weblogin');
// Route::get('popular_cont/{id}/details',[NewspaperController::class,'details'])->middleware('weblogin');

# News Routes
// Route::view('news', 'customer.news.index')->name('news');
Route::view('news/details', 'customer.news.show')->name('news.show');
# My Account Routes
Route::prefix('cp')->name('cp.')->group(function(){
    Route::view('/', 'customer.account.profile')->name('index');
    Route::view('subscriptions', 'customer.account.subscriptions')
        ->name('subscriptions');
    Route::view('subscriptions/details', 'customer.account.subscription_details')
        ->name('subscriptions.show');
    Route::view('downloads', 'customer.account.downloads')
        ->name('downloads');
    Route::view('refer-friend', 'customer.account.refer_friend')
        ->name('referfriend');
    Route::view('settings', 'customer.account.settings')
        ->name('settings');
});

#social
Route::get('/share-social', [ShareSocialController::class,'shareSocial']);
#end
// Route::get('/subscription', [SubscriptionController::class,'subsView']);

#Profile Web
Route::post('profile',[WebProfileController::class,'profileStore'])->name('profile-store')
    ->middleware(['auth']);
Route::post('savePreferences',[WebProfileController::class,'savePreferences'])->name('savePreferences');
#end

#Changepassword
Route::post('changepassword', [WebProfileController::class, 'changePassword'])->name('changePassword');
#end

// Route::get('plans',[SubscriptionController::class,'subsView'])->name('plans');

#for test Paystack
//Route::get('index', [App\Http\Controllers\Web\SubscriptionController::class, 'show']);
// Route::post('/pay', [App\Http\Controllers\Web\PaymentController::class,'redirectToGateway'])->name('pay');
// Route::get('/payment/callback', [App\Http\Controllers\Web\PaymentController::class, 'handleGatewayCallback']);

 #Home Searching
    Route::post('/home-search', [HomeSearchController::class, 'homeSearching']);
Route::group([
    'middleware' => ['auth']
], function() {
    #user download listing
    Route::get('user/downloads', [MagazineController::class, 'user_downloads'])->name('user_downloads');
    Route::get('user/my_purchases', [MagazineController::class, 'my_purchases'])->name('my_purchases');
    #Profile
    Route::get('profile',[WebProfileController::class,'profile'])->name('profile');

    #Archive list
    Route::get('archive/list',[ArchiveController::class,'archiveListing']);

    #Bookmark Listing
    Route::get('bookmarks/list', [BookmarkController::class, 'bookmarksList'])->name('book_list');

    #category details
    Route::get('categories/{category}/details',[CategoryController::class,'details']);
      
    # All PLans listing view
    Route::get('all_plans', [SubscriptionController::class, 'all_plans'])->name('all_plans');
    #Bundle and custom subscription with Paystack
    Route::post('/pay', [App\Http\Controllers\Web\PaymentController::class,'paystack_new_plan'])->name('pay');
    Route::post('custom/pay', [App\Http\Controllers\Web\PaymentController::class,'custom_paystack_new_plan'])->name('custom_pay');
    Route::get('/payment/callback', [App\Http\Controllers\Web\PaymentController::class, 'paystack_verify'])->name('verifyWebPayment');
    Route::get('custom/payment/callback', [App\Http\Controllers\Web\PaymentController::class, 'custom_paystack_verify']);
    #end

    #mysubscription
    Route::get('subscriptions', [SubscriptionController::class, 'my_subscriptions']);
    #end

    #Refer friend
    Route::get('refer-friend', [SubscriptionController::class, 'referFriend']);
    
    Route::get('renew/{userSubscription}', [SubscriptionController::class, 'renew'])
        ->name('renew_plan');
    Route::get('single-purchase', [SubscriptionController::class, 'singlePurchase']);

    
    Route::get('single/magazine/{id}', [PremiumController::class, 'singleMagazinePurchase'])->name('single_magazine');
    Route::post('buy/magazine', [App\Http\Controllers\Web\PremiumController::class,'buy'])->name('buy_magazine');
    Route::any('buy', [App\Http\Controllers\Web\PremiumController::class, 'buy_verify'])->name('verify_mags');

    Route::get('single/newspaper/{id}', [PremiumController::class, 'singleNewspaperPurchase'])->name('single_news');
    Route::post('buy/news', [App\Http\Controllers\Web\PremiumController::class,'buy_news'])->name('buy_news');
    Route::any('buy_news', [App\Http\Controllers\Web\PremiumController::class, 'buy_verify_news'])->name('verifyNews');
   Route::post('subscription_refund', [SubscriptionController::class, 'subscription_refund']);
   Route::post('referral_new_plan', [SubscriptionController::class, 'referral_new_plan']);

    Route::get('promoted/{blog}/details',[BlogController::class,'detailsContent'])
        ->name('promoted.detail');

    #TopStory Details
    Route::get('topstory/{blog}/details',[BlogController::class,'details'])
        ->name('topstory.detail');
    #end

    Route::get('blogpost/{blog}/details',[BlogController::class,'blogpost'])
        ->name('blog.post');

});

#instagram
Route::get('instagram', [InstagramController::class, 'instagramData']);
#end


// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [SocialController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [SocialController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('paystack_callback_wv', function() {
    return '<h2>Please wait while we\'re processing your request...</h2>';
})->name('paystack_callback_wv');

#

// Route::get('single/magazine/{id}', [PremiumController::class, 'singleMagazinePurchase'])->name('single_magazine');
// Route::post('buy/magazine', [App\Http\Controllers\Web\PremiumController::class,'buy'])->name('buy_magazine');
// Route::any('buy', [App\Http\Controllers\Web\PremiumController::class, 'buy_verify'])->name('verify_mags');

// Route::get('single/newspaper/{id}', [PremiumController::class, 'singleNewspaperPurchase'])->name('single_news');
// Route::post('buy/news', [App\Http\Controllers\Web\PremiumController::class,'buy_news'])->name('buy_news');
// Route::any('buy_news', [App\Http\Controllers\Web\PremiumController::class, 'buy_verify_news'])->name('verifyNews');
Route::get('albums/gallery/{album}/list', [GalleriesController::class, 'AlbumGalleryListing'])
    ->middleware(['auth']);
Route::any('membersPrice', [App\Http\Controllers\Web\PaymentController::class, 'membersPrice'])->name('customer.membersPrice');