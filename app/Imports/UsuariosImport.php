<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsuariosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        DB::transaction(function () use ($row) {
            User::create([
            'dni'=>$row['dni'],
            'paternal_surname'=>$row['paternal_surname'],
            'maternal_surname'=>$row['maternal_surname'],
            'name'=>$row['nombres'],
            'email'=>$row['dni']."@fis.edu",
            'password'=>bcrypt('secreto')

            ]);
        });
    }
}
