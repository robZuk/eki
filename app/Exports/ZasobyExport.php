<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ZasobyExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function collection()
    {
        return $this->results->map(function ($item) {
            return [
                'Numer_Inwentarzowy' => $item->Numer_Inwentarzowy,
                'Nazwa' => $item->Nazwa,
                'Opis' => $item->Opis,
                'Wartosc' => $item->Wartosc,
                'Data_Zakupu' => $item->Data_Zakupu,
                'Data_Likwidacji' => $item->Data_Likwidacji,
                'Ilosc' => $item->Ilosc,
                'Srodek' => $item->Srodek,
                'Lokalizacja' => $item->Lokalizacja,
                'Numer_Pola_Spisowego' => $item->Numer_Pola_Spisowego,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Numer Inwentarzowy',
            'Nazwa',
            'Opis',
            'Wartość',
            'Data Zakupu',
            'Data Likwidacji',
            'Ilość',
            'Środek',
            'Lokalizacja',
            'Numer Pola Spisowego',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => true,
        ];
    }
}
