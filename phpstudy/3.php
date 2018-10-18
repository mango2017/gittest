<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 12:23
 */
/*highlight_string("<?php echo 1;?>");*/
//show_source("2.php");

//echo php_strip_whitespace("2.php");
//echo php_strip_whitespace("test.php");
//highlight_file("test.php");
//echo str_word_count("helloworld  jly");
//$arr = array(1,2,3);
//$arr1 = array(6,7,8);
//print_r(get_defined_vars());

echo $_SERVER['HTTP_USER_AGENT'];
$browser = get_browser();
print_r($browser);
