<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrganizadoresExport implements FromCollection
{
    protected $organizadores;

    public function __construct($organizadores)
    {
        $this->organizadores = $organizadores;
    }
    public function collection()
    {
        return $this ->organizadores;
    }
}
