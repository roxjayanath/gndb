<?php
    require_once("includes/initialize.php");

    if (!$session->is_logged_in()) {
        redirect_to("index.php");
    }

    ?>
     <?php
    
    $user = User::find_by_id($session->user_id);
    //$photo = User::find_by_id($_REQUEST['id']);
    $oldUsername = $user->us_name;
    
    
   
    
    
    
    
    ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Your Username</title>
<link rel="stylesheet" href="css/popup_style.css" type="text/css">
</head>

<body>

	<center><div  class="logo"><img src="images/ndbl.jpg"/></div></center><br/>
	<?php echo output_message($message); ?>
   <form method="post" action="edit_user.php">
	
   <div class="content">
   <br/>
    <center><h1 class="topic">Your Current Name</h1>
        <input style="margin-left: 24px;" class="text_box" type="text" value="<?php echo $user->us_name; ?>" disabled="true"/>
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
