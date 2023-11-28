<?namespace app\widgets;

use app\models\trade\Category;
//use common\models\Menu;
//use yii\bootstrap\Widget;
//use yii\bootstrap4\Widget;
use yii\base\Widget;
use yii\helpers\Url;


class MenuWidget extends Widget
{

    public $count_m=0;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;


    protected function getTree(){
        $tree = [];

        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    public function run()
    {
        $this->data = Category::find()
            ->indexBy('id')
            ->orderBy([
//                'sorted'=>SORT_ASC,
                'name'=>SORT_ASC])
            ->asArray()
            ->all();

        $this->tree = $this->getTree();

        $this->menuHtml = $this->getMenuHtml($this->tree);

        //  Yii::$app->cache->set('menu', $this->menuHtml, 60*60*24*30); // в секундах



        return $this->menuHtml;
        //  return $this->render("menu",['model'=>$model]);

    }


    protected function getMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start(); // буферизирует
        include __DIR__ . '/views/Menu.php' ;
        return ob_get_clean();
    }

    function showCat($data){

        $string = '';
        foreach($data as $item){

            $string .= $this->tplMenu($item);

        }

        return $string;

    }

    function showCat2($data){


        $this->count_m++;
        $string= '<div id="megam" class="mega-menu'.$this->count_m.'" aria-hidden="true" role="menu">';
        $string.= '<div class="row">';
        $string.='<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8   right_p itemmenutop">';

        // Тут будет меню
        $i=0;

        foreach($data as $item) {
            $string.= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  left_p itemmenu" >';
            $string.=  '<a href="'.Url::to(['@web/main/product/production','categorya'=>$item['id']]).'">' . $item['name'] . '</a>';
            $string.= '</div>';

            $i++;
        }


        $string.= '</div>';
        $string.='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  left_p ">';

        $string.='Тут картинка и ссылка на меню';
        $string.= '</div>';
        $string.= '</div>';
        $string.= '</div>';

        return $string;



    }


}

?>