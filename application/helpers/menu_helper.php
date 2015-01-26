<?php
/*
 * GROUP MENU
 * Menu yang paling atas
 */
if(!function_exists("group_menu"))
{
    function group_menu()
    {
        $CI = & get_instance();
        //Load model
        $CI->load->model('menu/menu_mod');
        
        return $CI->menu_mod->get_group();
    }
}

if(!function_exists("menu"))
{
    function menu($group_id=0)
    {
        $CI = & get_instance();
        //Load model
        $CI->load->model('menu/menu_mod');
        
        //List Data
        $where = array('menu.group_id' => $group_id);
        $rows = $CI->menu_mod->get_rows(FALSE,$where,FALSE,0,0,TRUE);
        
        //Data
        $data = FALSE;
        if($rows)
        {
            $data = array();
            foreach ($rows as $r)
            {
                $submenu = (empty($r['submenu']) or $r['submenu'] == '') ? FALSE : $r['submenu'];
                if($submenu){
                    $data['1#'.$r['submenu']][] = $r;
                }else{
                    $data['0#'.$r['id']][] = $r;
                }
            }
        }
        
        return $data;
    }
}