<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentrumObslugiProjektow extends Model
{
    protected $table = 'centrum_obslugi_projektow';
    protected $primaryKey = 'Numer_Inwentarzowy';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Numer_Inwentarzowy',
        'Nazwa',
        'Opis',
        'Wartosc',
        'Data_Zakupu',
        'Data_Likwidacji',
        'Ilosc',
        'Srodek',
        'Lokalizacja',
        'Numer_Pola_Spisowego'
    ];
}
