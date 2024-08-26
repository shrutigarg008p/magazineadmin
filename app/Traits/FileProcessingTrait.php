<?php
namespace App\Traits;

use App\Exports\MagazineNewspaperExport;
use App\Exports\CouponExport;
use App\Models\Magazine;
use App\Models\Newspaper;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CouponUserExport;
use App\Exports\UserListExport;
use App\Exports\SystemUserListExport;
use App\Models\UserUsedCoupon;
use App\Models\User;
use DB;

trait FileProcessingTrait
{
    public function export_listing(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth('web')->user();

        $request->validate([
            'content_type' => ['required', 'in:magazine,newspaper'],
            'filetype' => ['required', 'in:pdf,excel']
        ]);

        $filetype = $request->query('filetype');

        $content_type = $request->get('content_type');

        $content = $content_type == 'magazine'
            ? Magazine::query()
            : Newspaper::query();

        if( $user->isVendor() ) {
            $content->where('user_id', $user->id);
        }
        
        $collection = $content
            ->with(['vendor', 'publication', 'category'])
            ->active()->latest()->get();

        if( $filetype === 'pdf' ){

            $mpdf = new \Mpdf\Mpdf(
                [
                    'tempDir' => storage_path('temp'),
                    'mode' => 'utf-8',
                    'format' => 'A4-L',
                    'orientation' => 'L'
                ]
            );

            $mpdf->WriteHTML(
                view('vendoruser.magazines.pdf', compact('collection','content_type'))->render()
            );

            return $mpdf->Output('ContentListing.pdf', 'D');
        }

        else if( $filetype === 'excel' ) {
            return Excel::download(
                new MagazineNewspaperExport($collection, $content_type),
                'ContentListing.xls'
            );
        }

        return back();
    }

    // sudo -v && wget -nv -O- https://download.calibre-ebook.com/linux-installer.sh | sudo sh /dev/stdin
    protected function epub_to_pdf($ebook_file_path, $pdf_file_path)
    {
        if( is_readable($ebook_file_path) ) {
            $output = [];
            exec("ebook-convert $ebook_file_path $pdf_file_path", $output);

            if( file_exists($pdf_file_path) ) {
                return $pdf_file_path;
            }
        }

        return false;
    }

    protected function update_pdf($pdf_file_path, $output_file_path = null, $add_watermark = true, $page_count_percent = 0)
    {
        $watermark = public_path('assets/frontend/img/logo_big_wr.png');

        if( file_exists($pdf_file_path) ) {
            try {

                if( !file_exists($watermark) && $add_watermark ) {
                    throw new \Exception('watermark logo does not exist');
                }

                $pdf = new \Mpdf\Mpdf(
                    ['tempDir' => storage_path('temp')]
                );
    
                $pdf->SetAutoPageBreak(false);

                $page_count = 1;
                $totalPages = $pdf->setSourceFile($pdf_file_path);

                if( $page_count_percent > 0 ) {
                    // $page_count = intval(floor($totalPages * ($page_count_percent/100)));
                    // $page_count = $page_count > 0 ? $page_count : 1;
                    $page_count = $totalPages > 2 ? 2 : 1;
                } else {
                    $page_count = $totalPages;
                }

                for( $i =1; $i<=$page_count; $i++ ) {
                    $pdf->AddPage();
                    $pdf->useTemplate($pdf->importPage($i));

                    if( $add_watermark ) {
                        $pdf->SetWatermarkImage($watermark, 0.1);
                        $pdf->showWatermarkImage = true;
                    }

                    if( $page_count_percent > 0 ) {
                        $pdf->SetWatermarkText('PREVIEW');
                        $pdf->showWatermarkText = true;
                    }
                }

                // new file path or just replace the old
                $finalPath = $output_file_path ?? $pdf_file_path;
    
                $pdf->Output(
                    $finalPath,
                    \Mpdf\Output\Destination::FILE
                );

                return basename($finalPath);
            } catch(\Exception $e) {
                logger($e->getMessage());
            }
        }

        return false;
    }
    
    public function export_listing_coupon(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth('web')->user();

        $request->validate([
            'content_type' => ['required', 'in:magazine,newspaper,coupon'],
            'filetype' => ['required', 'in:pdf,excel']
        ]);

        $filetype = $request->query('filetype');

        $content_type = $request->get('content_type');

        $content = CouponCode::query();
            
        // dd($collection);
        $collection = $content->orderby('id','DESC')->get();

        
        if( $filetype === 'pdf' ){

            $mpdf = new \Mpdf\Mpdf(
                [
                    'tempDir' => storage_path('temp'),
                    'mode' => 'utf-8',
                    'format' => 'A4-L',
                    'orientation' => 'L'
                ]
            );

            $mpdf->WriteHTML(
                view('vendoruser.magazines.couponpdf', compact('collection','content_type'))->render()
            );

            return $mpdf->Output('ContentListing.pdf', 'D');
        }

        else if( $filetype === 'excel' ) {
            return Excel::download(
                new CouponExport($collection, $content_type),
                'ContentListing.xls'
            );
        }

        return back();
    }
    
    public function export_listing_user_coupon(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth('web')->user();

        $request->validate([
            'content_type' => ['required', 'in:usercoupons'],
            'filetype' => ['required', 'in:pdf,excel'],
            'coupon_code' => ['required']
        ]);

        $filetype = $request->query('filetype');

        $content_type = $request->get('content_type');
        
        $coupon_code = $request->get('coupon_code');

        $content = DB::table('coupon_users')->join('users','users.id','coupon_users.user_id');
        $content->where('coupon_users.code',$coupon_code);
        $collection = $content->orderby('coupon_users.id','DESC')->get();
        if( $filetype === 'pdf' ){

            $mpdf = new \Mpdf\Mpdf(
                [
                    'tempDir' => storage_path('temp'),
                    'mode' => 'utf-8',
                    'format' => 'A4-L',
                    'orientation' => 'L'
                ]
            );

            $mpdf->WriteHTML(
                view('vendoruser.coupons.couponuserpdf', compact('collection','coupon_code'))->render()
            );

            return $mpdf->Output('CouponUserListing.pdf', 'D');
        }

        else if( $filetype === 'excel' ) {
            return Excel::download(
                new CouponUserExport($collection, $content_type),
                'CouponUserListing.xls'
            );
        }

        return back();
    }
    
    public function export_listing_user_listing(Request $request){
        ini_set("pcre.backtrack_limit", "500000000"); 
        $user = auth('web')->user();

        $request->validate([
            'content_type' => ['required', 'in:users'],
            'filetype' => ['required', 'in:pdf,excel'],
        ]);

        $filetype = $request->query('filetype');

        $content_type = $request->query('content_type');
        
        $type = $request->query('type');

        $platform = $request->query('platform');

        $subsc_type = $request->query('subsc_type');
        
        $query = User::whereHas('roles', function($q){
            $q->where('name', '<>', User::SUPERADMIN);
        });
        # Handle Filter Queries
        if($request->has('subsc_type') && !is_null($request->subsc_type)){
            // $query->whereHas('subscription', function($q) use ($request){
                // $q->where('status', $request->get('subsc_type'));
            // });
            $status = strval($request->get('subsc_type'));
            if(in_array($status, ['1', '0'])){
                $query = $query->where('users.status', $status);
            }
        }
        if(in_array($type, [User::VENDOR, User::CUSTOMER, User::COMPANY])){
            $query->role([$type]);
        }
        if(in_array($platform, ['ios','android','web'])){
            if($platform != 'web' && !empty($platform)){
                $query->where('users.platform',$platform);
            }else{
              $query->where('users.platform',NULL);  
            }
        }

         // Fetch records
         $collection = $query->orderBy('id','DESC')->with(['referred_to'])->get();
        //  dd($collection);

        if( $filetype === 'pdf' ){

            $mpdf = new \Mpdf\Mpdf(
                [
                    'tempDir' => storage_path('temp'),
                    'mode' => 'utf-8',
                    'format' => 'A4-L',
                    'orientation' => 'L'
                ]
            );

            $mpdf->WriteHTML(
                view('vendoruser.users.userlistpdf', compact('collection'))->render()
            );
            

            return $mpdf->Output('Userlistpdf.pdf', 'D');
        }

        else if( $filetype === 'excel' ) {
            return Excel::download(
                new UserListExport($collection, $content_type),
                'Userlistpdf.xls'
            );
        }

        return back();
    }
    
    public function export_listing_systemuser_listing(Request $request){
        ini_set("pcre.backtrack_limit", "500000000"); 
        $user = auth('web')->user();

        $request->validate([
            'content_type' => ['required', 'in:users'],
            'filetype' => ['required', 'in:pdf,excel'],
        ]);

        $filetype = $request->query('filetype');

        $content_type = $request->query('content_type');

        $query = User::whereHas('roles', function($q){
            $q->whereNotIn('name',[User::SUPERADMIN,User::CUSTOMER,User::VENDOR]);
        });
        
        # Filter Users By Type
        $type = $request->input('type');
        if(in_array($type, [User::ADMIN, User::REPORTER])){
            $query->whereHas('roles', function($q) use ($type){
                $q->where(['name' => $type]);
            });
        }
        # Get Users Collection
        $collection = $query->orderBy('id','DESC')->get();
        if( $filetype === 'pdf' ){

            $mpdf = new \Mpdf\Mpdf(
                [
                    'tempDir' => storage_path('temp'),
                    'mode' => 'utf-8',
                    'format' => 'A4-L',
                    'orientation' => 'L'
                ]
            );
            $mpdf->WriteHTML(
                view('vendoruser.users.systemuserlistpdf', compact('collection'))->render()
            );
        
            return $mpdf->Output('Systemuserlistpdf.pdf', 'D');
        }

        else if( $filetype === 'excel' ) {
            return Excel::download(
                new SystemUserListExport($collection, $content_type),
                'SystemUserlist.xls'
            );
        }

        return back();
    }
}