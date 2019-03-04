<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    
    protected $table = 'goods';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $dateFormat = 'U';
  
    //一个商品属于一个分类  一对一属于关系
    public function goodscategory()
    {
        return $this->belongsTo('App\Http\Model\Admin\GoodsCategory','cate_id');
    }


    // //一个商品属于一个类型 一对一属于关系
    // public function goodstype()
    // {
    //     return $this->belongsTo('App\Http\Model\Admin\GoodsType','type_id');
    // }
    
    //一个商品对应一个品牌  一对一属于关系
    public function goodsbrand()
    {
        return $this->belongsTo('App\Http\Model\Admin\GoodsBrand','brand_id');
    }

    //一个商品对应一个多个小图  一对多关系
    public function goodsimgs()
    {
        return $this->hasMany('App\Http\Model\Admin\GoodsImgs','goods_id');
    }

    public function goodstype()
    {
        return $this->belongsTo('App\Http\Model\Admin\GoodsType','type_id');
    }
    
}
