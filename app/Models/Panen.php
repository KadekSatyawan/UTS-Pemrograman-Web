<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Panen extends Model
{
    use HasFactory;
    public $primarykey= 'panenID';
    // protected $table="panens";
    protected $filelable = [
        'productID', 'kelompokID', 'user_id', 
        'perkiraanPanenDate', 'perkiraanPanenJumlah', 
        'PanenDate', 'PanenJumlah','satuan'
    ];
    static public function getPanen(){
       $return=DB::table('panens')
        ->join('products', 'panens.productID','=','products.productID');
        return $return;
    }
    public function product(){
        return $this->belongsTo(Product::class, 'productID','productID');
    }
}

