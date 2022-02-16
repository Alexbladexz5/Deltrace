<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $fillable = [
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

    public static function getDeliveriesRoute($idRoute){
        $sql = "SELECT * FROM deliveries WHERE route_id = '$idRoute'";
        $result = DB::SELECT($sql);
        return $result;
    }

    public static function saveDelivery($data) {
        DB;
    }
}
