<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $table = "about";
    protected $fillable = [
        'judul','picture','description'
    ];

    
}
