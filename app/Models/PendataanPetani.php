<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendataanPetani extends Model
{
    use HasFactory;
    public $primarykey= 'PetaniID';

    protected $filelable = [
        'kelompokID', 'namaPetani', 
        'asal', 'alamat', 
        'NIK', 'foto','kelompokName'
    ];
    static public function getPendataanPetani(){
       $return=DB::table('pendataan_petani')
        ->join('kelompok_tani','pendataan_petani.kelompokID','=','kelompok_tani.kelompokID');
        return $return;
    }
    public function kelompok_tani(){
        return $this->belongsTo(KelompokTani::class, 'kelompokID','kelompokID');
    }
}
