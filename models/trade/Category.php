<?php

namespace app\models\trade;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class Category extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%category_t}}';
    }

    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    //Получаем все категории
    public  static function  getCategoryAll() {
        return self::find()
            ->select('id, name, parent_id')
            ->asArray()
            ->all();
    }

//Получаем представление
    public static function getCategoryAllArray($id=0):array {
        $model = self::getCategoryAll();
        $arr_cat = [];
        $arr_id = [];
            foreach ($model as $row):
             
            if ($id!==0 && $row['id']==$id){
                $arr_id[$row['id']] = $row;
            }    

            if(empty($arr_cat[$row['parent_id']]) ) {
                $arr_cat[$row['parent_id']] = [];
            }

            $arr_cat[$row['parent_id']][] = $row;
                endforeach;
            return ['arr_cat'=>$arr_cat,'arr_id'=>$arr_id];
    }
    

}
