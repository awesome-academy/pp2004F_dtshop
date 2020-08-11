<?php
namespace App\Components;

use App\Menu;

class MenuRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecusiveAdd($parent_id = 0, $text ='-')
    {
        $data = Menu::where('parent_id', $parent_id)->get();
        foreach ($data as $item)
        {
            $this->html .= '<option value="'.$item->id.'"> '.$text .$item->name.' </option>';
            $this->menuRecusiveAdd($item->id, $text . '-');
        }
        return $this->html;
    }
    
    public function menuRecusiveEdit($parentId, $parent_id = 0, $text ='-')
    {
        $data = Menu::where('parent_id', $parent_id)->get();
        foreach ($data as $item)
        {
            if($parentId == $item->id)
            {
                $this->html .= '<option selected value="'.$item->id.'"> '.$text .$item->name.' </option>';
            } else {
                $this->html .= '<option value="'.$item->id.'"> '.$text .$item->name.' </option>';
            }
            $this->menuRecusiveEdit($parentId, $item->id, $text . '-');
        }
        return $this->html;
    }
}