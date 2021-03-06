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
<link rel="shortcut icon" href="images/ndblogo.jpg" />
<title>NDB Bank</title>
<link rel="stylesheet"  type="text/css" href="css/style_user_home.css" />
</head>

<body>
 <div id="wrap">
       <center><img src="images/ndbl.jpg" /></center><br/>
       <p class="para"><?php echo $user->us_name; ?><a href="logout.php" style="color:#069;">Logout</a></p>
   
      <div id="tile_wrap">
      <?php if(!empty($user->rights)){ ?>
      
      	<?php if($user->rights[RIGHT_INSERT_DOC]){ ?>
      	<div id="my_profile" class="my_style">
        	<a href="admin_my_profile.php" class="profile_link">
            <p class="toc">Edit My Profile</p></a>
        
        </div>
        <?php } ?>
        
        <?php if($user->rights[RIGHT_EDIT_DOC]){ ?>
        <div id="password" class="my_style">
        	<a href="new_admin.php" class="profile_link">
            <p class="toc2">New User</p></a>
        
        </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_VIEW_DOC]){ ?>
        <div id="new_admin" class="my_style">
        	<a href="editadmin.php" class="profile_link">
            <p class="toc3">Edit User Profiles</p></a>
        
        </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_DELETE_DOC]){ ?>
        <div id="invoice" class="my_style">
        	<a href="admin_home.php" class="profile_link">
            <p class="toc">Home </p></a>
        
       <!-- </div>
        <?php } ?>
        <?php if($user->rights[RIGHT_USER_CONTROL]){ ?>
        <div id="add_product" class="my_style">
        	<a href="#" class="profile_link">
            <p class="toc"></p></a>
        
        </div>
        <?php } ?>
        <div id="edit_product" class="my_style">
        	<a href="e#" class="profile_link">
            <p class="toc2"></p></a>
        
        </div> -->
        
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
