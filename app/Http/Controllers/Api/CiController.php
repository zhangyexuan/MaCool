<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QL\QueryList;
use DB;
class CiController extends Controller
{
    public $RandPage;
    public $RandCategory;

    public function __construct(){
        $this->RandPage = rand(1,10);
        $this->RandCategory = rand(1,7);
    }

    public function index(){
        set_time_limit (0);
        $Content = QueryList::get('https://m.qu.la/waptop/week'.$this->RandCategory.'_'.$this->RandPage.'.html');
       
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
                    'hot'  =>   '1';
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

    public function hot(){
        set_time_limit (0);
        $Content = QueryList::get('https://m.qu.la/waptop/week'.$this->RandCategory.'_'.$this->RandPage.'.html');
       
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
                    'hot'  =>   '1';
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

    public function chapter(){
        $Content = QueryList::get('https://m.qu.la/book/94158/5062735.html');
        $Rules = array(
            'content'          =>   array('#chaptercontent','text'),
            'name'          =>   array('.title','text'),
        ); 
        $Data = $Content->rules($Rules)->query()->getData();
        $Data = json_decode(json_encode($Data));
        $DataContent = $Data[0]->content;
        $DataName    = $Data[0]->name;
        // $array()
         $DataContent =   str_replace('『章节错误,点此举报』',"",$DataContent);
         $DataContent =   str_replace('ps:书友们，我是唐家三少，推荐一款免费小说app，支持小说下载、听书、零广告、多种阅读模式。请您关注微信公众号：dazhuzaiyuedu（长按三秒复制）书友们快关注起来吧！',"",$DataContent);
         $DataContent =   str_replace('『加入书签，方便阅读』',"",$DataContent);
         $DataContent =   str_replace('app2()',"",$DataContent);

         $Data = array('content'=>$DataContent,'name'=>$DataName);
         return $Data;    
    }

}

