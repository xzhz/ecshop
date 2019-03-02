<?php 
/**
 * 路由使用范例
 * 所有控制器 访问 均在 app/http/controller/admin 下
 *
 * 浏览器地址 输入 localhost/admin/1访问以下路由
 * 
 */
Route::resource('user','UserController');

//后台框架
Route::get('/index', function () {
    return view('layout/admin');
});




// 商品品牌图标上传路由
Route::post('/goodsbrand/files','GoodsBrandController@files');

// 商品品牌 状态调整 路由
Route::get('/goodsbrand/editstatus/{id}','GoodsBrandController@editstatus');

// 商品品牌管理路由
Route::resource('/goodsbrand','GoodsBrandController');

/*** 管理员个人中心路由 ***/
// 执行发送修改手机号短信
Route::post('/admin/revise/{id}','AdminController@revise');
// 执行发送修改密码短信
Route::post('/admin/editpwd/{id}','AdminController@editpwd');
// 执行更换头像
Route::post('/admin/pic/{id}','AdminController@pic');
Route::resource('/admin','AdminController');

/*** 分类操作 ***/
Route::resource('/goodscategory','GoodsCategoryController');

/*** 订单主表路由 ***/
Route::resource('/goodsorder','GoodsOrderController');

/*** 地址管理 ***/
Route::resource('/useraddr','UserAddrController');




































































//轮播图管理
Route::resource('lunbo','LunboController');
//文章管理
Route::resource('articles','ArticlesController');
//属性管理
Route::resource('goodsattr','GoodsAttrController');
//商品类型
Route::resource('goodstype','GoodsTypeController');
//商品管理
Route::resource('goods','GoodsController');

















































// 广告图片上传
Route::post('/ad/files','AdvertisingController@files');

// 广告路由
Route::resource('ad','AdvertisingController');

// 导航路由
Route::resource('nav','NavigationController');

// 栏目图片上传
Route::post('/column/files','ColumnController@files');

// 栏目路由
Route::resource('column','ColumnController');

// 活动路由
Route::resource('activity','GoodsActivityController');







































































 // 引入后台首页模板
 Route::view('/index', 'index.index');
 //友情链接部分
 Route::resource('links','LinksController');
