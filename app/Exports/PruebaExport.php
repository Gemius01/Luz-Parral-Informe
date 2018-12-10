<?php

namespace App\Exports;

use App\User;

use Illuminate\Support\Facades\DB;




class PruebaExport implements FromView
{
    public function view(): View
    {
        $users= User::all();
        return view('export', compact(['users']));
    }
}

