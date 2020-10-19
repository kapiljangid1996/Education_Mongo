<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Category;

class CategoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all();
    }

    public function headings() : array{
        return [
            'Id',
            'Category Name',
            'Category Slug',
            'Parent Id',
            'Created At',
            'Updated At',
        ];
    }
}
