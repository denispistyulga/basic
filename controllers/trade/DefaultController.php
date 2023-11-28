<?php

namespace app\controllers\trade;

use app\models\trade\Category;
use yii\web\Controller;
use app\extensions\Menu;

class DefaultController extends Controller
{

      public function actionIndex($id=0)
    {
        $array=Category::getCategoryAllArray($id);
//        print_r($array['arr_id']);
        $menu = (new Menu($array, $id))->getRenderMenu();
        return $this->render('index', compact('menu'));
    }





}
