<?php


namespace App\Helpers;

class Helper{

    public static function menu($menus,$parent_id=0,$char='')
    {
        $html='';
        foreach($menus as $key=>$menu){
            if($menu->parent_id==$parent_id){
                $html.='
                <tr>
                    <td>'.$menu->id.'</td>
                    <td>'.$char.$menu->name.'</td>
                    <td>'.self::active($menu->active).'</td>
                    <td>'.$menu->updated_at.'</td>
                    <td>
                    <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'.$menu->id.'">
                        <i class="fa-solid fa-pen-to-square">Sửa</i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm" 
                        onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')">
                        <i class="fa-solid ">Xóa</i>
                    </a>
                    </td>
                </tr>
                ';
                unset($menus[$key]);
                $html .=self::menu($menus,$menu->id,$char.'--');// đoạn này có nghĩa là khi mà id của thằng danh mục cha nó sẽ đi tìm những thằng có id giống nó để xác định con của nó
            }
        }
        return $html;
    }

    public static function active($active=0):string
    {
        return $active==0 ? '<span class="btn btn-danger btn-xs" style="width:50px; font-size:15px;" >NO</span>':'<span class="btn btn-success- btn-xs " style="width:50px; font-size:15px;">Yes</span>';
    }
}