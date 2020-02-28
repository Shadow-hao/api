<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::get('api/:version/banner', 'api/:version.Banner/getBanner');
Route::get('api/:version/category', 'api/:version.category/getCategory');
Route::get('api/:version/hotGoods', 'api/:version.Goods/getHotGoods');
Route::get('api/:version/Goods/:id', 'api/:version.Goods/getOneGoods');
Route::get('api/:version/carList', 'api/:version.Goods/carList');