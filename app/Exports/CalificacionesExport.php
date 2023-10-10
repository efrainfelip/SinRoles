<?php
namespace App\Exports;



use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\SheetCollection;
use Illuminate\Support\Collection;

class CalificacionesExport
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function export()
    {
        return (new FastExcel($this->data))
            ->export('calificaciones.xlsx');
    }
}
