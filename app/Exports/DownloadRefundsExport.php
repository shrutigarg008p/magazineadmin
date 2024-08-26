<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class DownloadRefundsExport implements FromCollection, WithHeadings, WithMapping
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
            $hArr = ['Customer','For','Paid Amount','Refunded Amount','Status','Created At'];
        }else{
            $hArr = ['Title','Category','Publisher','Copyright Owner','Price','Published Date'];
        }
        $heading = $hArr;
        return $heading;
    }

    public function map($user): array
    {
        $arr = [];
        if($this->type=='main'){
            
            $arr = [
                $user->user->first_name ??null,
                $user->entity_str,
                $user->paid_amount,
                $user->refund_amount??'-',
                $user->status_str,
                $user->created_at->format('Y-m-d H:i'),
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
