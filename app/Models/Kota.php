<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model {
    use HasFactory;
    protected $table = 'kota-kota';
    protected $guarded = ['id'];
    public $timestamps = false;
}
