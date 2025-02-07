<?php

namespace App\Imports;

use App\Models\Zasoby;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZasobyImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['data_zakupu'])) {
            return null;
        }

        $existingRecord = Zasoby::where('Numer_Inwentarzowy', $row['numer_inwentarzowy'])->first();

        if ($existingRecord) {
            return null;
        }

        return new Zasoby([
            'Numer_Inwentarzowy' => $row['numer_inwentarzowy'],
            'Nazwa' => $row['nazwa'],
            'Opis' => $row['opis'],
            'Wartosc' => $row['wartosc'],
            'Data_Zakupu' => $row['data_zakupu'],
            'Data_Likwidacji' => $row['data_likwidacji'],
            'Ilosc' => $row['ilosc'],
            'Srodek' => $row['srodek'],
            'Lokalizacja' => $row['lokalizacja'],
            'Numer_Pola_Spisowego' => $row['numer_pola_spisowego'],
            'Status' => $row['status'],
        ]);
    }
}
