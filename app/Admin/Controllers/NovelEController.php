<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Novel;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\MessageBag;
class NovelEController extends Controller
{

        use ModelForm;
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         return Admin::content(function (Content $content) {

            $content->header('网友竞技');//这里是页面标题
            $content->description('列表');//这里是详情描述
            $content->body($this->grid());//指向grid方法显示表格
        });
    }


    public  function name($value='')
    {
        return 123;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  123456;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
                $content->header('修改');
                $content->description('修改小说内容');
                $content->body($this->form()->edit($id));
        });

    }

    protected function form()
    {
        return Admin::form(Novel::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('novelname','小说名');
            $form->text('author','作者');
            $form->text('readnum','阅读数');
            $form->textarea('introduction','简介');
            $form->radio('hot','热门设置')->options(['0' => '非热门', '1'=> '热门']);
            $form->disableReset();
          
            
        });
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['novelname'] = $request->post('novelname');
        $data['author'] = $request->post('author');
        $data['readnum'] = $request->post('readnum');
        $data['introduction'] = $request->post('introduction');
        $data['hot'] = $request->post('hot');
        $num = Novel::where('id', $id)->update($data);
        if ($num) {
             $success = new MessageBag([
                'title'   => '成功',
                'message' => '恭喜您修改成功....',
         ]);
            return back()->with(compact('success'));
        }else{
            $error = new MessageBag([
                'title'   => '失败',
                'message' => 'MMP：居然修改失败了....',
            ]);

        return back()->with(compact('error'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function grid()
    {//页面显示的表格

        return Admin::grid(Novel::class, function (Grid $grid) {
               //grid显示表格内容，$grid->数据库中相应的字段（‘在页面上显示的名称’）->其他方法();或者$grid->column（‘数据库中相应的字段’，‘在页面上显示的名称’）->其他方法();
            $grid->model()->where('category_id', '=', 6);
            $grid->id('ID')->sortable();
            $grid->novelname('小说名');
            $grid->author('作者');
            $grid->readnum('阅读量');
            // $grid->category_id('分类');
            $grid->enter_time('入库时间')->display(function($enter_time) {
                    return date("Y-m-d",$enter_time);
                });;
            $grid->updata_time('最近更新时间')->display(function($updata_time) {
                    return date("Y-m-d",$updata_time);
                });;;
            $grid->disableExport();//禁用导出数据按钮
            $grid->disableCreateButton();
            $grid->disableRowSelector();
    });
        
    }
}