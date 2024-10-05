<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiTin;
use App\Models\Comment;

class TinTuc extends Model
{
    use HasFactory;
    protected $table='tintuc';
    public function loaitins(){
        return $this->belongsTo(LoaiTin::class,'idLoaiTin','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'idTinTuc','id');
    }
}
