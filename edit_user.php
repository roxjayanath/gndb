<?php
    require_once("includes/initialize.php");

    if (!$session->is_logged_in()) {
        redirect_to("index.php");
    }
    
    ?>
     <?php
	// if(empty($_REQUEST['id'])){
   // $session->message("No User ID was provided");
    //redirect_to('index.php');
   //}
   
   //$photos=User::find_by_id($_GET['id']);
	// $user=User::find_by_id(32);
    // $user=User::find_by_id($_REQUEST['id']);
    //$user = User::find_by_id($session->user_id);
	
    $photo = User::find_by_id($_REQUEST['id']);
	//$photo = User::find_by_id(32);
	
	if (!$photo) {
    $session->message("The product could not be located");
    redirect_to('edit_clicknew.php');
}
	$user_id = $photo->us_id;
    $oldUsername = $photo->us_name;
  //  $user->us_id = $_GET['id'];
    ?>
	<?php
	$user = new User();
    if (isset($_POST['commit'])) {


        //if ($user->us_id == 1) {
           // $session->message("The admin {$user->us_name} cant update");
           // redirect_to('edit_user.php');
       // } else {

  // $user->us_id = $_POST['id'];
            //$username = trim($_POST['login']);
            
       $user->us_id = $user_id;
      $user->us_name = trim($_POST['login']);
//    $photo->password = trim($_POST['password']);
           //$user->us_id = $_GET['id'];
           // $user->us_name = $username;
            

            //$update_username = $user->update();
            $update_username = $user->update_username();
            //var_dump($update_product);

            if ($update_username) {
                //$new_comment->try_to_send_notification();
                $session->message("The admin {$user->us_name} updated");
                $message = "The admin {$user->us_name} updated";
                //redirect_to("editadmin.php");
            } //else {
                //$session->message("there is error updating admin");
            //    $message = !empty($user->errors['username']) ? $user->errors['username'] : '';
            //    $user->us_name = $oldUsername;
                //var_dump($user->errors);
           // }
            //redirect_to('edit_user.php');
       // }
    }
    
    
    
    
    ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Your Username</title>
<link rel="stylesheet" href="css/popup_style.css" type="text/css">
</head>

<body>
<?php $doc_id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : "0"; ?>
	<center><div  class="logo"><img src="images/ndbl.jpg"/></div></center><br/>
	<?php echo output_message($message); ?>
   <form method="post" action="edit_user.php">
   
   <?php// echo $_GET['id'];?>
    <?php// echo $_REQUEST['id'];?>
	<input type="hidden" name="id" value="<?php echo $doc_id  ?>" />
	
   <div class="content">
   <br/>
    <center><h1 class="topic">Your Current Name</h1>
        <input style="margin-left: 24px;" class="text_box" type="text" value="<?php echo $photo->us_name; ?>" disabled="true"/>
    </center>
    <br/>
    <center><h1 class="topic">Enter Your New Name</h1>
        <input class="text_box2" name="login"  type="text" />
    </center>
    <br/>
   
    <center><input class="buttons"  type="submit" name="commit" value="Change" onclick="return confirm('Are you sure you want to edit?');">
    <input class="buttons" type="button" name="cancel" value="Close" onclick="window.close();"></center>
    <br/>
    </div>
   </form>

</body>
</html>
