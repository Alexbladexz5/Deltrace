<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barcode extends Model
{
    use HasFactory;

    protected $table = 'barcodes';

    protected $fillable = [
        'code',
        'name',
        'address'
    ];

    public static function getInfoBarcode($code){
        $sql = "SELECT code, name, address FROM barcodes WHERE code = '$code'";
        $result = DB::SELECT($sql);
        return $result;
    }
}
