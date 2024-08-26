<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeardFrom;
use Illuminate\Http\Request;
use App\Models\User;

class HeardFromController extends Controller
{
    public function index(Request $request)
    {
        if( $request->isMethod('post') ) {

            $content = intval($request->get('content'));
            $action = $request->post('action');

            if( $content && ($content = HeardFrom::find($content)) ) {
                
                $_message = '';

                if( $action === 'status_change' ) {
                    $content->status = boolval($content->status) ? 0 : 1;
                    $content->update();

                    $_message = 'Status Updated';
                }

                else if( $action === 'delete' ) {
                    $content->delete();

                    $_message = 'Deleted';
                }

                else {
                    return back();
                }

                return back()->withInfo($_message);
            }
        }

        $collection = HeardFrom::all();
        foreach($collection as $value){
          $user_counts =   User::where('referred_from',$value->title)->get()->count();
          $value->user_counts = $user_counts;
        }

        return view('admin.heard_from.index', compact('collection'));
    }

    public function update(Request $request, HeardFrom $heard_from)
    {
        $request->validate([
            'title' => ['required', 'max:1000']
        ]);

        $heard_from->title = $request->get('title');
        $heard_from->update();

        return back()->withSuccess('Updated Successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:1000']
        ]);

        $heard_from = new HeardFrom([
            'title' => $request->get('title')
        ]);

        $heard_from->save();

        return back()->withSuccess('Created Successfully');
    }
    
    public function heard_report_file(Request $request){
         $type = $request->type;
        if($request->type=='main'){
            $getUsers = DB::table('user_downloads')->pluck('user_id')->unique()->values();
            $users = User::whereIn('id',$getUsers->all());
            $users = $this->downloadFilterCheck($request,$users);
            $users = $users->get();
            if($request->file_type=='pdf'){
                $mpdf = new \Mpdf\Mpdf(
                    ['tempDir' => storage_path('temp')]
                );
                $htmlData =view('admin.report.pdfViews.download_report_file', compact('users','type'))->render();
                $mpdf->WriteHTML($htmlData);
                $mpdf->Output("File Download Report.pdf", "D");
            }else{
                $user = new DownloadReportExport($users,$type);
                return \Excel::download($user,'File Download Report.xls');
            }
        }elseif ($type=='by_user') {
            $Covertype = $request->Cover_type;
            $user = User::find($request->usersID);
            if($Covertype=="magazine"){
                $users = $user->magazine_downloads()->get();
            }else{
                $users = $user->newspaper_downloads()->get();
            }
            if($request->file_type=='pdf'){
                $mpdf = new \Mpdf\Mpdf(
                    ['tempDir' => storage_path('temp')]
                );
                $htmlData =view('admin.report.pdfViews.download_report_file', compact('users','type'))->render();
                $mpdf->WriteHTML($htmlData);
                $mpdf->Output("File Download Report.pdf", "D");
            }else{
                $user = new DownloadReportExport($users,$type);
                return \Excel::download($user,'File Download Report.xls');
            }
        }
    }
}
