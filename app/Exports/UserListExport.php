<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Traits\ManageUserTrait;

class UserListExport implements FromCollection, WithHeadings, WithMapping
{
    use ManageUserTrait;
    public $collection;
    public $type;

    public function __construct($collection, $type)
    {
        $this->collection = $collection;
        $this->type = $type;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->collection;
    }

    public function headings(): array
    {
        $heading = [
            'Name',
            'Email',
            'Referred By',
            'Phone',
            'Refferal Code',
            'Status',
        ];

        return $heading;
    }

    public function map($item): array
    {

        return [
            $item->first_name.' '.$item->last_name,
            $item->email,
            ucwords($this->getUserByReferCodeName($item->refer_by)),
            $item->phone,
            $item->refer_code,
            ($item->status == 1)?'Verified':'Not Verified',
        ];
    }
}
