<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class test1 extends Model
{
    use HasFactory;
    protected  $table = 'users';
    protected $fillable = ['id','name','email'];
     public function loadlist($params = [])
    {
        $query = DB::table($this->table)
        ->select($this->fillable);
        $lists = $query->get();
        return $lists;
    }
    public function loadListWithPager($params= []){// phân trang 
        $query  = DB::table($this->table)
        ->select($this->fillable);
        $list =$query->paginate(5);
        return $list;
    }
    public function saveNew($params)
    {
        $data = array_merge($params['cols'],[ //array_ có rồi thì cập nhật không có thì thêm 
            'password'=>Hash::make($params['cols']['password']),
            // 'level'=>1,
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}