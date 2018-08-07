<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('后台');
            $content->description('没有什么可以描述的');

            

            $content->row(function ($row) {
                $CountNovel = \DB::table('novel')->count();
                $CountChapter = \DB::table('chapter')->count();
                $CountReadnum = \DB::table('novel')->sum('readnum');
                $row->column(3, new InfoBox('小说总数', 'users', 'aqua', '', $CountNovel));
                // $row->column(3, new InfoBox('New Orders', 'shopping-cart', 'green', '/demo/orders', '150%'));
                $row->column(3, new InfoBox('章节总数', 'book', 'yellow', '', $CountChapter));
                $row->column(3, new InfoBox('阅读总数', 'file', 'red', '', $CountReadnum));
                $row->column(3, new InfoBox('用户总数', 'file', 'red', '', '预留位置'));
            });
            $content->row(Dashboard::title());
            $content->row(function (Row $row) {

                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::environment());
                });


                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
        });
    }
}
