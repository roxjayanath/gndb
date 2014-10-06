<?php 
require_once("includes/initialize.php");
if(!$session->is_logged_in()){
    redirect_to("index.php");
}

if (!empty($session)) {
	$user = User::find_by_id($session->user_id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NDB Bank</title>
<link rel="stylesheet"  type="text/css" href="css/style_admin_home.css" />
</head>

<body>
 <div id="wrap">
       <center><img src="images/ndbl.jpg" /></center><br/>
       <p class="para"><?php echo $user->us_name; ?><a href="logout.php" style="color:#069;"> Logout</a></p>
   
      <div id="tile_wrap">
      <?php if(!empty($user->rights)){ ?>
      
      	<?php if($user->rights[RIGHT_INSERT_DOC]){ ?>
      	<div id="my_profile" class="my_style">
        	<a href="admin_page.php" class="profile_link">
            <p class="toc">Insert New Document</p></a>
        
        </div>
        <?php } ?>
        
        <?php if($user->rights[RIGHT_EDIT_DOC]){ ?>
        <div id="password" class="my_style">
        	<a href="edit_document.php" class="profile_link">
            <p class="toc2">Edit Document</p></a>
        
        </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_VIEW_DOC]){ ?>
        <div id="new_admin" class="my_style">
        	<a href="viwe_document.php" class="profile_link">
            <p class="toc3">View Document</p></a>
        
        </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_DELETE_DOC]){ ?>
        <div id="invoice" class="my_style">
        	<a href="delete_document.php" class="profile_link">
            <p class="toc3">Delete Document</p></a>
        
        </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_USER_CONTROL]){ ?>
        <div id="add_product" class="my_style">
        	<a href="user_control.php" class="profile_link">
            <p class="toc">User Control</p></a>
        
        </div>
        <?php } ?>
        <div id="edit_product" class="my_style">
        	<a href="edit_product.php" class="profile_link">
            <p class="toc2">Log Hisotry</p></a>
        
        </div>
        
       <!-- <div id="remove_product" class="my_style">
        	<a href="list_photos.php" class="profile_link">
            <p class="toc2">Remove Product</p></a>
        
        </div>
        
        <div id="customer" class="my_style">
        	<a href="#" class="profile_link">
            <p class="toc">Viwe Customer</p></a>
        
        </div>

      -->
      <?php } ?>
      </div>
    
 </div>

</body>
</html>
