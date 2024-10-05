<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TinTuc;
// use App\Models\Users;
use App\Models\User;
class Comment extends Model
{
    use HasFactory;
    protected $table='comment';
    public function tintucs(){
        return $this->belongsTo(TinTuc::class,'idTinTuc','id');
    }   
    public function users(){
        return $this->belongsTo(Users::class,'idUser','id');
    }
    protected $fillable = ['idtintuc', 'iduser', 'noidung'];
}
