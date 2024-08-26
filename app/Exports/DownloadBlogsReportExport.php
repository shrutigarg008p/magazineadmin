<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Str;

class DownloadBlogsReportExport implements FromCollection, WithHeadings, WithMapping
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
            $hArr = ['#','Title','Publishing date','Promoted?','Top Story?','Status'];
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
            
            $arr = [
                $i++,
                $user->title,
                $user->created_at->format("Y/m/d") ,
                $user->promoted ? 'Yes' : 'No',
                $user->top_story ? 'Yes' : 'No' ,
                $user->status ? 'Active':'Inactive',
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
