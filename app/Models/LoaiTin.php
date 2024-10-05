<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TinTuc;
use App\Models\theloais;


class LoaiTin extends Model
{
    use HasFactory;
    protected $table='loaitin';
    public function theloais(){
        return $this->belongsTo(TheLoai::class,'idTheLoai','id');
    }
    public function tintucs(){
        return $this->hasMany(TinTuc::class,'idLoaiTin','id');
    }
}
