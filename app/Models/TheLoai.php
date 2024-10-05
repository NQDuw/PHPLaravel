<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\LoaiTin;
use  App\Models\TinTuc;

class TheLoai extends Model
{
    use HasFactory;
    protected $table='theloai';
    public function loaitins(){
        return $this->hasMany(LoaiTin::class,'idTheLoai','id');
    }
    public function tintucs(){
        return $this->hasManyThrough(TinTuc::class,LoaiTin::class,'idTheLoai','idLoaiTin','id');
    }
}
