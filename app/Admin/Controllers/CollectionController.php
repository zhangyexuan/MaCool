<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Box;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Table;
class CollectionController extends Controller
{
    public $url;
    public function index(Request $request)
    {   
        $this->url = $request->server('SERVER_NAME');
         return Admin::content(function (Content $content) {
            $content->header('采集管理');
            $content->description('嗯哈，采集');
            $box1 = new Box('采集提示-公告', '<pre>本页面为之后的多数据源做基础，本页面暂时只会说明采集方法，不会有实际的操作方法 <h3>所以采集的Url请看最下面</h3></pre>');
            


            $box2 = new Box('采集提示-热门采集', '<p>热门采集自动开始，不用手动采集(蜘蛛和用户访问触发 之后会更新 自动采集的开关（热门会有600-700的小说）)</p><p>但是你也可以进行手动采集但是意义并不大，并且章节更新会优先更新热门资源</p>');
            $box3 = new Box('采集提示-普通采集','普通采集需要手动触发，也可以使用网络云监控触发');
            $headers = ['名称', 'Url', '注释'];
            $rows = [
                ['热门采集', 'http://'.$this->url.'/Api/hoting', '【自动触发】【挂机触发】【手动触发】访问一次更新10条建议10分钟采集一次'],
                ['普通采集', 'http://'.$this->url.'/Api/pting',  '【挂机触发】【手动触发】访问一次更新10条建议10分钟采集一次'],
                ['章节更新', 'http://'.$this->url.'/Api/gx',  '【挂机触发】【手动触发】优先更新热门小说的章节'],
                
            ];
            $table = new Table($headers, $rows);
             $box4 = new Box('采集Url', $table);
            
           

            $content->row($box1->collapsable());
            $content->row($box2->style('danger'));
            $content->row($box3->removable()->style('warning'));
            $content->row($box4->solid()->style('primary'));
          
        });
    }
}
