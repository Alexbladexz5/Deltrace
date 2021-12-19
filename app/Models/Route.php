<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $filliable = [
        'date_time',
        'user_id'
    ];

    public static function getRoutes(){
        $sql = "SELECT routes.*, users.name FROM routes INNER JOIN users WHERE users.id = routes.user_id";
        $result = DB::SELECT($sql);
        return $result;
    }
}
