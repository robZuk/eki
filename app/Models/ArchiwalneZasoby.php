<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiwalneZasoby extends Model
{
    protected $table = 'archiwalne_zasoby';
    protected $primaryKey = 'Numer_Inwentarzowy';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Numer_Inwentarzowy',
        'Nazwa',
        'Opis',
	'Numer_Dok_Zakupu',
        'Wartosc',
        'Data_Zakupu',
        'Data_Likwidacji',
        'Ilosc',
        'Srodek',
        'Lokalizacja',
        'Numer_Pola_Spisowego',
        'Status',
	'Komentarz',
        'Archiwalny_Numer_Pola_Spisowego',
    ];

    protected $casts = [
        'Wartosc' => 'decimal:2',
        'Ilosc' => 'integer',
    ];
}
