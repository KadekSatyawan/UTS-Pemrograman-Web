<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;
    public $primarykey= 'PetaniID';

    protected $filelable = [
        'kelompokID', 'namaPetani', 
        'asal', 'alamat', 
        'NIK', 'foto','kelompokName'
    ];
    static public function getPetani(){
       $return=DB::table('petanis')
        ->join('kelompok_tani','petanis.kelompokID','=','kelompok_tani.kelompokID');
        return $return;
    }
    public function kelompok_tani(){
        return $this->belongsTo(KelompokTani::class, 'kelompokID','kelompokID');
    }
}

