<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class ToolsModel extends Model
{
    public static function Uuid(){
        return Uuid::uuid4();
    }

    public static function status($message, $code)
    {
        return json_encode((object)["status" => $code, "message" => $message]);
    }

//    public static function randomPassword($maxlength = 6) {
//        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//        $pass = array();
//        $alphaLength = strlen($alphabet) - 1;
//        for ($i = 0; $i < $maxlength; $i++) {
//            $n = rand(0, $alphaLength);
//            $pass[] = $alphabet[$n];
//        }
//        return implode($pass);
//    }
}
