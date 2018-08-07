<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/collection', 'CollectionController@index');
    // $router->resource('/config', 'configController');
    // $router->get('/config', 'configController@index');
    // $router->get("novel/{id?}","NovelController@index");
    $router->resource("/novel_xuanhuan","NovelController");
    $router->resource("/novel_wuxia","NovelAController");
    $router->resource("/novel_dushi","NovelBController");
    $router->resource("/novel_lishi","NovelCController");
    $router->resource("/novel_kehuan","NovelDController");
    $router->resource("/novel_wangyou","NovelEController");
    $router->resource("/novel_nvsheng","NovelFController");
    
});

