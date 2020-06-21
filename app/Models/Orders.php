<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $fillable = ['order_name','gender','customer_id','email','address','phone_number','note','total_price','payment','status'];
    public function Customer()
    {
        return $this->belongsTo("\App\Models\Customer","customer_id");
    }
    public function getStatus()
    {
        if ($this->__get("status")==0)
        {
            return 'Đang Chờ';
        }else if ($this->__get("status")==1){
            return "Đã Xác Nhận";
        }else if ($this->__get("status")==2){
            return "Đang Giao";
        }else if ($this->__get("status")==3){
            return "Hoàn Thành";
        }else if ($this->__get("status")==4){
            return "Bị Hủy";
        }
    }
    public function getTotalPrice()
    {
        return number_format($this->__get("total_price"))." "."VNĐ";
    }
    public function getEmail()
    {
        if ($this->__get("customer_id")!= null)
        {
            return $this->Customer->email;
        }else{
            return $this->email;
        }
    }
    public function getGender()
    {
        if ($this->__get("gender")==1)
        {
            return "Nam";
        }else if ($this->__get("gender")==2)
        {
            return "Nữ";
        }else{
            return "Null";
        }
    }
    public function getNote()
    {
        if ($this->__get("note")==null)
        {
            return "không có";
        }else{
            return $this->__get("note");
        }
    }
}
