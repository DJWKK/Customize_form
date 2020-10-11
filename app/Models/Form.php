<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;

class Form extends Model
{
    protected $table = "form";

    /***
     * 创建表单
     * @param $html
     */
    public static function InsertForm($html){
// 输入录入
        try {
            $id = Form::insertGetId(["html"=>$html]);

            //echo $user->guid;
            return $id;
        }catch (Exception $e){
            logError("创建表单出错",$e->getMessage());
            return null;
        }
    }

    /****
     *
     * 获取表单
     * @param $id
     * @return false
     */
    public static function GetForm($id){

        try {
            return Form::where("id",$id)->get();

        }catch (Exception $e){
            logError("获取表单",$e->getMessage());
            return null;
        }
    }
}
