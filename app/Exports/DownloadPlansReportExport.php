<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Str;

class DownloadPlansReportExport implements FromCollection, WithHeadings, WithMapping
{

    public $users;
    public $type;
    public function __construct($users,$type)
    {
        $this->users = $users;
        $this->type = $type;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->users;
        
    }
   
    public function headings(): array
    {
        $hArr = [];
        if($this->type=='main'){
            $hArr = ['#','Title','Type','Status','Display Order'];
        }else{
            $hArr = ['Title','Category','Publisher','Copyright Owner','Price','Published Date'];
        }
        $heading = $hArr;
        return $heading;
    }

    public function map($user): array
    {
        $i=1;
        $arr = [];
        if($this->type=='main'){
            $planTye='';
            $plandisplay_order ='0';
            if($user->id!='29')
                {
                    
                  $plandisplay_order=  $user->display_order;
                $planTye=Str::upper($user->type);
            }
            
            $arr = [
                $i++,
                Str::ucfirst($user->title)." [ ID: ".$user->id."]",
                $planTye,
                $user->status ? 'ON':'OFF',
                $plandisplay_order,
                
            ];
            
            return $arr;
        }else{
            $arr = [
                $user->title,
                $user->category->name,
                $user->publication->name,
                $user->copyright_owner,
                $user->price,
                date('Y-m-d',strtotime($user->published_date))
            ];
            return $arr;
        }
    }
}
