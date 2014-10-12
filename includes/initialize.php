<?php

//define('DS',         DIRECTORY_SEPARATOR);
define('DS',         '/');

//define('SITE_ROOT',           DS.'wamp'.DS.'www'.DS.'php_sandbox'.DS.'gndb');
define('SITE_ROOT',           '/Applications/XAMPP/htdocs/gndb');
//define('SITE_ROOT',           DS.'wamp'.DS.'www'.DS.'phpsandbox'.DS.'gndb');
 
define('LIB_PATH',            SITE_ROOT.DS.'includes');

 
require_once(LIB_PATH.DS.'constants.php');
require_once(LIB_PATH.DS.'functions.php');
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'pagination.php');

//require_once(LIB_PATH.DS."phpMailer".DS."class.phpmailer.php");
//require_once(LIB_PATH.DS."phpMailer".DS."class.smtp.php");
//require_once(LIB_PATH.DS."phpMailer".DS."language".DS."phpmailer.lang-en.php");

require_once(LIB_PATH.DS.'user.php');
//require_once(LIB_PATH.DS.'photograph.php');
//require_once(LIB_PATH.DS.'customer.php');
//require_once(LIB_PATH.DS.'PurchaseDate.php');
//require_once(LIB_PATH.DS.'comment.php');

?>