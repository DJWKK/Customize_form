<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormInfo;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /***
     * 将表单的html存入数据库（将span标签删除）
     * @param Request $request
     */
    public function Insert(Request $request){
        $html = $request["html"];
        $html = strip_html_tags(array('span'),$html);
        $html = str_replace("draggable=\"true\""," ",$html);
        $id = Form::InsertForm($html);
        $data = array(['id'=>$id]);
        return $id!=null?
            json_success("操作成功!",$data,200):
            json_fail("操作失败!",null,100);
    }

    /****
     * 获取表单
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetForm(Request $request){

        $id = $request["id"];
        $data = Form::GetForm($id);
        return $data!=null?
            json_success("获取成功!",$data,200):
            json_fail("获取失败!",null,100);
    }

    /****
     *  获取表单数据
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetFormInfo(Request $request){

        $id = $request["id"];
        $data = FormInfo::GetFormInfo($id);
        return $data!=null?
            json_success("获取成功!",$data,200):
            json_fail("获取失败!",null,100);
    }

    /***
     * 给表单提交数据
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function InsertInfo(Request $request){
        $id = $request["form_id"];
        $info = $request["info"];
        $arry = ["form_id"=>$id,"info"=>$info];
        $data = FormInfo::InsertInfo($arry);
        return $data!=null?
            json_success("成功!",null,200):
            json_fail("失败!",null,100);
    }
}
