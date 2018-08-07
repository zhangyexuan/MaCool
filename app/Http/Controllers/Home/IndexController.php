<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
	 //网站首页
      public function index(){
          $NumberNovel = 5;
		      $CategorySort =  DB::table('category')->get();
      		foreach ($CategorySort as $v) {
      			$Result[]       =  DB::table('novel')->where('category_id',$v->id)->orderBy('id', 'desc')->skip(0)->take(5)->get();
      			$CategoryName[] =  $v->sortname;
      		}
          return view('Home.index',compact('Result','CategoryName')); 
       }
      
      public function list(){

      		$CategorySort =  DB::table('category')->get();
      		
      		return view('Home.list',compact('CategorySort')); 
      }

      public function article($id){
          $NovelInfo    =  DB::table('novel')->where('id',$id)->first();
          $NovelChapter =  DB::table('chapter')->where('novel_id',$id)->get();
          $ChapterInfo    =  DB::table('chapter')->where('novel_id',$id)->orderBy('id','desc')->first();
          $ChapterId    =  DB::table('chapter')->where('novel_id',$id)->orderBy('id','ASC')->value('id');
          $CountChapter =  count($NovelChapter);

          return view('Home.article',compact('NovelInfo','CountChapter','NovelChapter','ChapterInfo','ChapterId','id')); 
      }

      public function reader($id,$article)
      {
        
        $DataUrl =  DB::table('chapter')->where('novel_id',$id)->where('id',$article)->value('url');
        // $DataUrl =  DB::table('chapter')->where('novel_id',$article)->value('url');
        $AjaxData = '/Api/chapter/'.base64_encode('https://m.qu.la'.$DataUrl);
        $Page_N =  DB::table('chapter')->where('novel_id',$id)->where('id','>',$article)->value('id');
        $Page_S =  DB::table('chapter')->where('novel_id',$id)->where('id','<',$article)->orderBy('id','desc')->value('id');
         
        return  view('home.read',compact('$DataUrl','AjaxData','Page_N','Page_S','id'));
      }


}
