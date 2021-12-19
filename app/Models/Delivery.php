<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $filliable = [
        'name',
        'address',
        'coordinates',
        'estimated_time',
        'route_id'
    ];

    public static function getDeliveries(){
        $sql = "SELECT * FROM deliveries";
        $result = DB::SELECT($sql);
        return $result;
    }
}
