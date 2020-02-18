<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

 

class User extends Model
{

    protected $fillable = [
        'ori_text', 'encr_text', 'rand_key','decr_text', 
        //tambahkan kolom sesuai tabel users kecuali kolom id dan timestamp (created_at & updated_at)
    ];
    
}

