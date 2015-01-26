<?php
/*
 * @Age
 */
if(!function_exists("age"))
{
    function age($birthDate)
    {
        //explode the date to get month, day and year
        $birthDate = explode("-", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-1):(date("Y")-$birthDate[0]));

        return $age;
    }
}


/*
 * @Url Youtube
 */
if(!function_exists("parse_url_youtube"))
{
    function parse_url_youtube($url,$key)
    {
        //$url = 'http://www.youtube.com/watch?v=Z29MkJdMKqs&feature=grec_index';

        // break the URL into its components
        $parts = parse_url($url);

        // $parts['query'] contains the query string: 'v=Z29MkJdMKqs&feature=grec_index'

        // parse variables into key=>value array
        $query = array();
        parse_str($parts['query'], $query);

        //echo $query['v']; // Z29MkJdMKqs
        //echo $query['feature'] ;// grec_index

        return $query[$key];
    }
}

/*
 * Date format
 */
if(!function_exists("date_now"))
{
    function date_now($time=false)
    {
        date_default_timezone_set('UTC');
        if($time){
            return date('Y-m-d H:i:s');
        }else {
           return date('Y-m-d');
        }
    }
}

/*
 * Penghitungan waktu berdasarkan UTC / GMT
 */
if(!function_exists("date_utc"))
{
    function date_utc($date)
    {
        $date = date("Y-m-d H:i:s", strtotime('+7 hours', strtotime($date)));

        return $date;
    }
}

if(!function_exists("format_date"))
{
    function format_date($date,$format = 'F d, Y')
    {
        $return = '';
        if(!empty($date)){
            $date = new DateTime($date);
            $return .=$date->format($format);
        }
        return $return;
    }
}

/*
 * Config Setting
 */
if(!function_exists("xml"))
{
    function xml($id = '')
    {
    	$CI =& get_instance();

        return $CI->config->item($id);
    }
}

/*
 * Membership login
 */
if(!function_exists("is_membership"))
{
    function is_membership()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in');
        
        return $v = isset($is_logged_in) ? $is_logged_in : false;
    }
}

if(!function_exists("user_id"))
{
    function user_id()
    {
        $CI =& get_instance();
        $user_id = $CI->session->userdata('user_id');

        return $v = isset($user_id) ? $user_id : 0;
    }
}

if(!function_exists("fullname"))
{
    function fullname()
    {
        $CI =& get_instance();
        $full = $CI->session->userdata('fullname');

        return $v = isset($full) ? $full : "";
    }
}

if(!function_exists('role'))
{
    function role()
    {
        $CI =& get_instance();
        $role = $CI->session->userdata('role');
        
        return $v = isset($role) ? $role : 0;
    }
}


if(!function_exists('check_page_access'))
{
    function check_page_access($page_access=NULL,$page=FALSE)
    {
        $access = FALSE;
        if(!empty ($page_access) && $page)
        {
            $rows = explode(',', $page_access);
            foreach ($rows as $value)
            {
                if($value == $page){
                    $access = TRUE;
                }
            }
        }

        return $access;
    }
}

if(!function_exists("page_access"))
{
    function page_access()
    {
        $CI =& get_instance();
        $CI->load->model('account/admin_mod');

        $page_access = NULL;
        $row = $CI->admin_mod->get_byuid(user_id());
        if($row) {
            $page_access = $row->page_access;
        }

        return $page_access;
    }
}

if(!function_exists('contains_id'))
{
    function contains_id($ids=NULL,$id=FALSE)
    {
        $ststus = FALSE;
        if(!empty ($ids) && $id)
        {
            $rows = explode(',', $ids);
            foreach ($rows as $value)
            {
                if($value == $id){
                    $ststus = TRUE;
                }
            }
        }

        return $ststus;
    }
}
if(!function_exists('set_number_format'))
{
    function set_number_format($string=NULL,$decimals=2,$to_insert_db=FALSE)
    {
        //Jika ingin di jadikan format mysql maka harus dibersihkan tanda pemisah (koma)
        $koma = ',';
        if($to_insert_db){
            $string = str_replace(",", "", $string);
            $koma = '';
        }
        return number_format($string,$decimals,'.',$koma);
    }
}
