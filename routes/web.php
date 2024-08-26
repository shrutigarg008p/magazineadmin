<?php

use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Vendor\VendorController;
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
/*
 * Back-ends Admin Routes
 */
require __DIR__ . '/web/customer.php';

/**
 * Back-ends Admin Routes
 */

require __DIR__ . '/web/admin.php';

/**
 * Vendor User Routes
 */

require __DIR__ . '/web/vendor.php';


Route::post('9980_kta', function() {
    return 'OK';
});

Route::post('save_epub_blob', [VendorController::class, 'save_epub_blob'])
    ->name('save_epub_blob');

Route::match(['get', 'post'], 'send_test_mail_88983929016', function() {

    $request = request();

    if( $request->isMethod('post') ) {
        $mail_to = request()->get('mail_to');

        if( empty($mail_to) || !filter_var($mail_to, FILTER_VALIDATE_EMAIL) ) {
            $mail_to = 'sumit.wadhwa@unyscape.com';
        }
    
        $from_mail = config('mail.from.address') ?? 'support@graphicnewsplus.com';
        $from_name = config('mail.from.name') ?? 'Graphic News Plus';
    
        try{
            Illuminate\Support\Facades\Mail::send('mail/test', array( 
                'name' => 'john doe'
            ), function($message) use($mail_to, $from_mail, $from_name) { 
                $message->from($from_mail, $from_name);
                $message->to($mail_to, 'john doe')->subject("Test mail - Graphic news plus");
            });
        } 
        catch(\Exception $e) {
            logger(' issue: '.$e->getMessage());

            echo 'mail could not be sent'; die;
        }

        echo 'mail sent successfully <br><br>';
    }

    return '<form action="'.url()->current().'" method="post">'.csrf_field().'<input type="email" value="sumit.wadhwa@unyscape.com" name="mail_to" required autofocus placeholder="john.doe@email.com" /><input type="submit" value="submit"></form>';
});

Route::match(['get', 'post'], '/apple-in-app', function() {
    logger('apple event occured: '. \json_encode(request()->all()));
    return response('ok');
})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::match(['get', 'post'], 'expressgh_hook', [CommonController::class, 'expressgh_hook'])
    ->name('expressgh_hook')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);


// download magazine or newspaper file
Route::match(['get', 'post'], 'ak_125561_read_file/{type}/{file}', function($type, $file) {
    //echo "Hello"; die; 
    // $user = auth()->user() ?? auth('api')->user();

    $request = request();

    if( !in_array($type, ['magazines', 'newspapers']) ) {
        return response('', 404);
    }

    if( empty($ak = $request->get('ak')) ) {
        return response('', 404);
    }

    $token_for_app = config('app.file_download_secret_token');

    // -- 
    // ignore if the request is from an app (_ig88988910)
    // or if the request is for a preview file
    if( $request->get('_ig88988910') != $token_for_app && \strpos($file, '-preview') === false ) {

        // if the web has no session- abort
        if( ! $request->hasSession() ) {
            return response('', 404);
        }

        // get token from the url
        if( !($x = $request->get('x')) ) {
            return response('', 404);
        }

        // added by the viewer.js file just-in-case
        // to prevent any download manager hitting this pdf file before our pdf-viewer
        if( $request->get('tf') != '3482934273078' ) {
            return response('', 404);
        }

        $token_data = (array)session()->get('_content_read_fresh');

        if( !isset($token_data[$ak]) || $token_data[$ak] != $x ) {
            return response('', 404);
        }

        unset($token_data[$ak]);

        session()->put('_content_read_fresh', $token_data);
    }

    $final_file_path = storage_path("app/public/{$type}/{$file}.pdf");

    if( file_exists($final_file_path) ) {
        return response()->file($final_file_path);
    }

    return response('', 404);

    // return \Illuminate\Support\Facades\Storage::download(
    //     "public/{$type}/{$file}.pdf"
    // );
})
->name('ak_125560_read_file');