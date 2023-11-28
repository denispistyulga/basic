<?
echo '<li class="menuitem">
<a href="'.(

    empty($category['url']) ?  \yii\helpers\Url::to(['@web/main/product/production','categorya'=>$category['id'],'parent'=>0])  :

        \yii\helpers\Url::to(['@web/'.$category['url']])


    ).'"><div id="topmenu1" > '. $category['name'] .'</div></a>';
if(isset($category['childs'])){
    echo $this->showCat2($category['childs']);
}
echo '</li>';

?>