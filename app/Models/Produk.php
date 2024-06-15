<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $guarded = ['id'];

    function Post(){
        return $this->belongsTo(Post::class);
    }

    function Kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
