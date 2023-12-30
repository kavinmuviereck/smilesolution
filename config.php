<?php session_start();


function xss_clean($data)
{
// Fix &entity\n;
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

// Remove any attribute starting with "on" or xmlns
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do
{
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while ($old_data !== $data);

// we are done...
return $data;
}
function mysql_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }

    return $inp;
}


if(isset($_POST)){
        foreach($_POST as $pstkey => $pstvalue){
          if($pstkey!="description" && $pstkey!="full_descp"){	
            if($pstkey!="description" && $pstkey!="full_descp"){
            foreach($_POST[$pstkey] as $pstkey1 => $pstvalue1){
              $_POST[$pstkey][$pstkey1] = mysql_escape_mimic(xss_clean($_POST[$pstkey][$pstkey1]));
            }
          }
          else{
            $_POST[$pstkey] = mysql_escape_mimic(xss_clean($_POST[$pstkey]));
          }
        }
      }
      }



date_default_timezone_set("Asia/Calcutta");

$varAdminFolder = "manage";



// $_SESSION['lang'] = 'french';

define("DS", DIRECTORY_SEPARATOR);



define("PATH_ROOT", dirname(__FILE__));



define("PATH_LIB", PATH_ROOT . DS . "library" . DS);


// define("URL_ROOT", "https://smilesolutions.muviereck.com/");
define("URL_ROOT", "http://localhost/smilesolution/");




define("SELF", basename($_SERVER['PHP_SELF']));



define("DATE_FORMAT", "d/m/Y H:i:s");



define("ADMIN_TITLE", "Muviereck Technology");



define("COPY_RIGHT", "Copyright  2020 . Powered By Muviereck Technologies Private Ltd | All rights reserved .");



//define RegX expressions

define("REGX_MAIL", "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/");

define("REGX_URL", "/^(http(s)?\:\/\/(?:www\.)?[a-zA-Z0-9]+(?:(?:\-|_)[a-zA-Z0-9]+)*(?:\.[a-zA-Z0-9]+(?:(?:\-|_)[a-zA-Z0-9]+)*)*\.[a-zA-Z]{2,4}(?:\/)?)$/i");

define("REGX_PHONE", "/^[0-9\+][0-9\-\(\)\s]+[0-9]$/");

define("REGX_PRICE", "/^[0-9\.]+$/");

ini_set('post_max_size', '128M');

ini_set('upload_max_filesize', '128M');



$base_url = constant('URL_ROOT');



require_once(PATH_LIB."validations.php");

require_once(PATH_LIB."class.database.php");



$inputvalidation = new Validation();



/* Local Connection */



//$db=new MySqlDb("103.235.105.237","nca","VaxLDsm8QU8lrP0N+.","groena");




// $db=new MySqlDb("localhost","muviere_smilead","5QjdQYxj7p26","muviere_smile");
$db=new MySqlDb("localhost","root","","new_solution");




require_once(PATH_LIB."functions.php");



$pagename=basename($_SERVER['PHP_SELF']);

$base_url = constant('URL_ROOT');

    //Display Product Name with limited character

    //10-jan-2019

    function custom_character($x, $length)

    {

        if(strlen($x)<=$length)

        {

          return $x;

        }

        else

        {

          $y=substr($x,0,$length) . '...';

          return $y;

        }

    }



    //fucntion : time_elapsed_string()

    //Desc : Get Last time ago calculation.

    function time_elapsed_string($datetime, $full = false) {

        $now = new DateTime;

        $ago = new DateTime($datetime);

        $diff = $now->diff($ago);



        $diff->w = floor($diff->d / 7);

        $diff->d -= $diff->w * 7;



        $string = array(

            'y' => 'year',

            'm' => 'month',

            'w' => 'week',

            'd' => 'day',

            'h' => 'hour',

            'i' => 'minute',

            's' => 'second',

        );

        foreach ($string as $k => &$v) {

            if ($diff->$k) {

                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');

            } else {

                unset($string[$k]);

            }

        }



        if (!$full) $string = array_slice($string, 0, 1);

        return $string ? implode(', ', $string) . ' ago' : 'just now';

    }



        function slugify($text)

{

  // replace non letter or digits by -

  $text = preg_replace('~[^\pL\d]+~u', '-', $text);



  // transliterate

  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);



  // remove unwanted characters

  $text = preg_replace('~[^-\w]+~', '', $text);



  // trim

  $text = trim($text, '-');



  // remove duplicate -

  $text = preg_replace('~-+~', '-', $text);



  // lowercase

  $text = strtolower($text);



  if (empty($text)) {

    return 'n-a';

  }



  return $text;

}





?>

