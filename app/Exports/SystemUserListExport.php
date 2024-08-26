<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Traits\ManageUserTrait;

class SystemUserListExport implements FromCollection, WithHeadings, WithMapping
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
            'Role Name',
            'Email',
            'Status',
        ];

        return $heading;
    }

    public function map($item): array
    {

        return [
            $item->name,
            $item->role_name,
            $item->email,
            $item->status_text,
        ];
    }
}
