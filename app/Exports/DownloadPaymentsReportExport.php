<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Str;
class DownloadPaymentsReportExport implements FromCollection, WithHeadings, WithMapping
{

    public $data;
    public $type;
    public function __construct($data,$type)
    {
        $this->data = $data;
        $this->type = $type;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        $hArr = [];
        if($this->type=='main'){
            $hArr = ['ID','User','Type','Amount','Payment Method','Local Ref','Payment Gateway Ref','Status'];
        }else{
            $hArr = ['User Name','User Email','User phone','Plan Price','Start Date','Expire Date'];
        }
        $heading = $hArr;
        return $heading;
    }

    public function map($data): array
    {
        $arr = [];
        if($this->type=='main'){
             
            
                $arr = [
                      $data->id,
                      isset($data->user) ? $data->user->email : 'N/A' ,
                      Str::title($data->type),
                      $data->currency.' '.$data->amount,
                      Str::title($data->payment_method),
                      $data->local_ref_id,
                      $data->remote_id,
                      $data->status,
                ];
          
            return $arr;
        }else{
            $arr = [
                $data->user->name,
                $data->user->email,
                $data->user->phone,
                $data->purchased_at,
                $data->subscribed_at,
                $data->expires_at,
            ];
            return $arr;
        }
    }

}
