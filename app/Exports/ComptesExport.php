<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

class ComptesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Post::where('ccl', Auth::user()->name)->select('cif','nom','nutelephone','etat','ccl','adhesion')
        ->latest()->get();
    }
}
