<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    protected $table = 'tb_sinpro_menu_items';


    public static function get()
    {
        $menu_list = MenuItems::where("menu", 1)->where('fl_status', '1')->orderBy("sort", "asc")->get();
        $roots = $menu_list->where('menu', (integer) 1)->where('parent', 0);

        $items = self::tree($roots, $menu_list);

        return $items;
    }

    /**
     * Monta arvore do menu
     *
     * @param $items
     * @param $all_items
     * @return array
     */
    private static function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            $find = $all_items->where('parent', $item->id);

            $data_arr[$i]['child'] = array();

            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }

            $i++;
        }

        return $data_arr;
    }
}
