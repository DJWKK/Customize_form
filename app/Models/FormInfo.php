<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Exception;

class FormInfo extends Model
{
    protected $table = "form_info";

    /***
     * 获取表单信息
     * @param $id
     * @return |null
     */
    public static function GetFormInfo($id){
        try {
            return FormInfo::select('info')
                            ->where("form_id",$id)
                            ->get();

        }catch (Exception $e){
            logError("获取表单",$e->getMessage());
            return null;
        }
    }

    public static function InsertInfo($arry){
        try {
            return FormInfo::insertGetId($arry);

        }catch (Exception $e){
            logError("获取表单",$e->getMessage());
            return null;
        }
    }
}
