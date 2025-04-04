<?php

namespace App\Exports;

use App\Models\Sport;
use Maatwebsite\Excel\Concerns\FromCollection;

class SportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sport::all();
    }
}
