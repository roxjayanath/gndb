<?php
require_once("includes/initialize.php");  
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<?php //if($session->is_logged_in()){
    //redirect_to("admin_home.php");
    //$message="Login Success wrong with admin page";
    
  //  }
    ?>



<?php

if(isset($_POST['commit'])){
     
    
    
    $username=trim($_POST['login']);
    $password=trim($_POST['password']);
    
    //$hashed_password=sha1($password);
    
    $found_user=User::authentucate($username,$password);
    
    if($found_user){
        //var_dump($found_user);
        $session->login($found_user);
        log_action('Login',"{$found_user->username} logged in .");
        redirect_to("admin_home.php");
    }else{
        $message="Username / password wrong";
        echo output_message($message);
    }
    
}else{
    $username="";
    $password="";
}
    
    
   
?>




<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>NDB Login Form</title>
  <link rel="stylesheet" href="css/style_login_panel.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
  <center><img src="images/ndbl.jpg"/></center>
  <br/>
    <div class="login">
      <h1>Login </h1>
      
            <?php echo output_message($message);?>

      
      <form method="post" action="index.php">
        <p><input type="text" name="login" value="<?php echo htmlentities($username);?>" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="<?php echo htmlentities($password);?>" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      
    </div>
    </section>
</body>
</html>


