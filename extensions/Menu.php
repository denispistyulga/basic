<?

namespace app\extensions;

use yii\helpers\Html;
use yii\helpers\Url;

class Menu
{

    protected array $itemsMenu;
    protected array $itemsId;
    protected int $parent_id;

    public function __construct(array $itemsMenu, $parent_id = 0)
    {
        $this->itemsMenu = $itemsMenu['arr_cat'];
        $this->itemsId = $itemsMenu['arr_id'];
        $this->parent_id = $parent_id;
        return $this;
    }

    public function getRenderMenu(): string
    {
        return $this->itemsMenu($this->parent_id);
    }

    protected function itemsMenu(int $parent_id = 0)
    {
        if (empty($this->itemsMenu[$parent_id])) {
            return '';
        }
        $ul = '<ul>';
        $ul .= ($parent_id != 0 && !empty($this->itemsId[$parent_id]) ? $this->getRenderMainItems($this->itemsId[$parent_id]) : '');
        for ($i = 0; $i < count($this->itemsMenu[$parent_id]); $i++) {
            $ul .= $this->getRenderItems($this->itemsMenu[$parent_id][$i]);
        }
        $ul .= '</ul>';
        return $ul;
    }


    protected function getRenderMainItems($element)
    {
        return $element['name'];
    }


    protected function getRenderItems(array $element): string
    {
        $items = '<li>';
        $items .= Html::a($element['name'], [Url::to('@web/trade'), 'id' => $element['id']], ['class' => 'profile-link']);
        $items .= $this->itemsMenu($element['id']);
        $items .= '</li>';
        return $items;
    }

    protected function getRenderClick(array $element): string
    {
        $items = '<li>';
        $items .= Html::a($element['name'], [Url::to('@web/trade'), 'id' => $element['id']], ['class' => 'profile-link']);
        $items .= $this->itemsMenu($element['id']);
        $items .= '</li>';
        return $items;
    }

}


?>