<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class Comptesimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
           
            'cif' => $row[0],
        'nom'    => $row[1],
        'nutelephone'  => $row[2],  
        'adhesion'     => $row[3],
        'ccl'   => $row[4],
        'etat'     => $row[5],
        'cover'   => $row[6], 

        ]);
    }
}
