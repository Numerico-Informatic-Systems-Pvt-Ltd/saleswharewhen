<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Navigation {

    public function create($nav, $menu = array()) {
        foreach ($nav as $value) {
            $arr = explode("/", $value->actual_path);
            switch (count($arr)) {
                case 2:
                    $menu[$arr[1]] = array(
                        'id' => $value->id,
                        'category' => $value->category,
                        'parent_id' => $value->parent_id,
                        'category_image' => $value->category_image,
                        'category_type' => $value->category_type,
                        'status' => $value->status
                        
                    );
                    break;
                case 3:
                    $menu[$arr[1]]['child'][$arr[2]] = array(
                        'id' => $value->id,
                        'category' => $value->category,
                        'parent_id' => $value->parent_id,
                        'category_image' => $value->category_image,
                        'category_type' => $value->category_type,
                        'status' => $value->status
                    );
                    break;
                case 4:
                    $menu[$arr[1]]['child'][$arr[2]]['child'][$arr[3]] = array(
                        'id' => $value->id,
                        'category' => $value->category,
                        'parent_id' => $value->parent_id,
                        'category_image' => $value->category_image,
                        'category_type' => $value->category_type,
                        'status' => $value->status
                    );
                    break;
            }
        }
        return $menu;
    }

}
