<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QL\QueryList;
use DB;
class IndexController extends Controller
{
    public $RandPage;
    public $RandCategory;

    public function __construct(){
        $this->RandPage = rand(1,100);
        $this->RandCategory = rand(1,7);
    }

    //----------------------------------总控制开始-----------------------
    
    public function control($value='')
    {
        $dayBegin = strtotime(date('Y-m-d', time()));
        $dayEnd = $dayBegin + 24 * 60 * 60;
        $LogCount = DB::table('collect_log')->where('time','>',$dayBegin)->where('time','<',$dayEnd)->count();
        $YesterDay = DB::table('novel')->where('updata_time','<',$dayBegin)->get();
        if ($LogCount >= 70) {
            $this->hot();
        }else{
            // $this->updata();
            if (empty($YesterDay)) {
                $this->updata();
            }else{
                $this->index();
            }
        }
        
    }
    //----------------------------------总控制结束-----------------------


    //----------------------------------普通更新开始-----------------------
    public function index(){
        set_time_limit (0);
        $Content = QueryList::get('https://m.qu.la/wapsort/'.$this->RandCategory.'_'.$this->RandPage.'.html');
       
        $Rules = array(
            'name'          =>   array('.title','text'),
            'introduction'  =>   array('.review','text'),
            'img'           =>   array('.lazy','data-original'),
            'author'        =>   array('.author','text'),
            'url'           =>   array('.hot_sale a','href'),
        ); 
        $Data = $Content->rules($Rules)->query()->getData();
        $Data = json_decode(json_encode($Data));
        foreach ($Data as $k => $v) {
            $Url          =   "https://m.qu.la/booklist/".explode("/",trim($v->url,"/"))[1].".html";
            $Author       =   str_replace("作者：","",$v->author);
            $Introduction =   str_replace('简介：',"",str_replace(' ',"",$v->introduction));
          
            $FinalData[] =array(
                    'introduction' =>   $Introduction,
                    'url'          =>   $Url,   
                    'novelname'    =>   $v->name,
                    'author'       =>   $Author,
                    'img'          =>   $v->img,
                    'enter_time'   =>   time(),
                    'category_id'  =>   $this->RandCategory

            );
        }
        foreach ($FinalData as $k => $v) {
            $Res  = DB::table('novel')->where('novelname',$v['novelname'])->value('novelname');
            if (!$Res) {
              $Final =  DB::table("novel")->insertGetId($v);
              if ($Final) {
                  $this->mulu($Final,$v['url']);
              }
            }
        }  
    }
    //----------------------------------普通更新结束-----------------------
    //----------------------------------热门更新开始-----------------------
    public function hot(){
        set_time_limit (0);
        $log = rand(1,7).'_'.rand(1,10);
        $dayBegin = strtotime(date('Y-m-d', time()));
        $dayEnd = $dayBegin + 24 * 60 * 60;
        $LogCount = DB::table('collect_log')->where('time','>',$dayBegin)->where('time','<',$dayEnd)->where('cai_record',$log)->get();
        
        if (empty(!$LogCount)) {
           
            $LogDdata = array('time' => time(),'cai_record'=>$log,'class'=>'hot');
            DB::table('collect_log')->insert($LogDdata);
            $Content = QueryList::get('https://m.qu.la/waptop/week'.$log.'.html');
        
        $Rules = array(
            'name'          =>   array('.title','text'),
            'introduction'  =>   array('.review','text'),
            'img'           =>   array('.lazy','data-original'),
            'author'        =>   array('.author','text'),
            'url'           =>   array('.hot_sale a','href'),
        ); 
        $Data = $Content->rules($Rules)->query()->getData();
        $Data = json_decode(json_encode($Data));
        foreach ($Data as $k => $v) {
            $Url          =   "https://m.qu.la/booklist/".explode("/",trim($v->url,"/"))[1].".html";
            $Author       =   str_replace("作者：","",$v->author);
            $Introduction =   str_replace('简介：',"",str_replace(' ',"",$v->introduction));
          
            $FinalData[] =array(
                    'introduction' =>   $Introduction,
                    'url'          =>   $Url,   
                    'novelname'    =>   $v->name,
                    'author'       =>   $Author,
                    'img'          =>   $v->img,
                    'enter_time'   =>   time(),
                    'category_id'  =>   $this->RandCategory,
                    'hot'          =>   1,
            );
        }
        foreach ($FinalData as $k => $v) {
            $Res  = DB::table('novel')->where('novelname',$v['novelname'])->value('novelname');
                if (!$Res) {
                    $Final =  DB::table("novel")->insertGetId($v);
                    if ($Final) {
                      $this->mulu($Final,$v['url']);
                    }
                }
        } 
        } 
    } 

    //----------------------------------热门更新结束-----------------------
    //----------------------------------入库章节开始-----------------------

    public function mulu($id,$url){
        $Content = QueryList::get($url);
        $Rules = array(
            'chaptername'    =>   array('#chapterlist p','text'),
            'url'            =>   array('#chapterlist p a','href'),
        ); 
        $Data = $Content->rules($Rules)->query()->getData();
        $Data = json_decode(json_encode($Data));
        foreach ($Data as $k => $v) {
            $FinalData[] =array(
                    'novel_id'       =>    $id,
                    'url'            =>    $v->url,   
                    'chaptername'    =>    $v->chaptername,
            );
        }

        foreach ($FinalData as $k => $v) {
            $Res  = DB::table('chapter')->where('chaptername',$v['chaptername'])->value('chaptername');
            if (!$Res) {
               $Final =  DB::table("chapter")->insert($v);
            }
        }
    }
    //----------------------------------入库章节结束-----------------------
    //----------------------------------文章解析开始-----------------------

    public function chapter($url){
        $url=base64_decode($url);
        $Content = QueryList::get($url);
        $Rules = array(
            'content'          =>   array('#chaptercontent','html','-p -script'),
            'name'          =>   array('.title','text'),
        ); 
        $Data = $Content->rules($Rules)->query()->getData();
       
        $Data = json_decode(json_encode($Data));
        $DataContent = $Data[0]->content;
        $DataName    = $Data[0]->name;
        // $array()
         $DataContent =   str_replace('『章节错误,点此举报』',"",$DataContent);
         $DataContent =   str_replace('ps:书友们，我是唐家三少，推荐一款免费小说app，支持小说下载、听书、零广告、多种阅读模式。请您关注微信公众号：dazhuzaiyuedu（长按三秒复制）书友们快关注起来吧！',"",$DataContent);
         $DataContent =   str_replace('推荐一款免费小说app，支持小说下载、听书、零广告、多种阅读模式。请您关注微信公众号：dazhuzaiyuedu（长按三秒复制）书友们快关注起来吧！',"",$DataContent);
         $DataContent =   str_replace('『加入书签，方便阅读』',"",$DataContent);
         $DataContent =   str_replace('app2()',"",$DataContent);
         
         // $DataContent =   str_replace('\r\n',"<br>",$DataContent);
         

         $Data = array('content'=>$DataContent,'name'=>$DataName);
         return $Data;    
    }
    //----------------------------------文章解析结束-----------------------

    //----------------------------------单独章节更新开始-----------------------
    public function updata()
    {
        $YesterDay = DB::table('collect_log')->where('uptime','<',$dayBegin)->get();
        foreach ($YesterDay as  $v) {
            $v->url;
            $v->id;
            $Content = QueryList::get($v->url);
            $Rules = array(
            'chaptername'    =>   array('#chapterlist p','text'),
            'url'            =>   array('#chapterlist p a','href'),
             ); 
            $Data = $Content->rules($Rules)->query()->getData();
            $Data = json_decode(json_encode($Data));
            foreach ($Data as $k => $v) {
                $FinalData[] =array(
                        'novel_id'       =>    $v->id,
                        'url'            =>    $v->url,   
                        'chaptername'    =>    $v->chaptername,
                );
            }

            foreach ($FinalData as $k => $v) {
                $Res  = DB::table('chapter')->where('chaptername',$v['chaptername'])->value('chaptername');
                if (!$Res) {
                   $Final =  DB::table("chapter")->insert($v);
                }
            }
        }
    }
    //----------------------------------单独章节更新结束-----------------------
}

