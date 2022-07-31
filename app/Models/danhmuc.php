<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class danhmuc extends Model
{
    use HasFactory;
    protected  $table = 'danh_muc';
    protected $fillable = ['id','ten_danhmuc'];
     public function listdanhmuc($params = []) //show theo phân trang
    {
       $query = DB::table($this->table)->select($this->fillable);
       $listdm = $query->paginate(5);
       return $listdm;
    }
     public function Danhmuc()//show danh sách
    {
       $query = DB::table($this->table)->get();
       return $query;
// df
    }
    public function Savedm($params){
        $data = array_merge($params['cols']);
        $res  = DB::table($this->table)->insertGetId($data);
        return $res;
    }
 }
