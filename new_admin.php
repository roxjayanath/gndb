<?php require_once("includes/initialize.php");

if(!$session->is_logged_in()){
    redirect_to("index.php");
}

?>

<?php

if(isset($_POST['commit'])){
     
    $new_admin= new User();
    
     //$photo->caption=$_POST['caption'];
    
    $new_admin->us_name=$_POST['login'];
    $new_admin->us_pass=$_POST['password'];
    $new_admin->us_level=$_POST['ulevel'];
    
    $cpassword = $_POST['cpassword'];
    
    if($cpassword == $new_admin->us_pass){
    
    if($new_admin->create_user()){
        $session->message("Successfully created User :{$new_admin->us_name}");
        redirect_to('new_admin.php');
    }else{
        //$message=join("<br/>",$new_admin->errors);
        $message="Fail";
    }
    }else{
	      $session->message(" Password dont match"); 
	       }  
        
    }
    
    
    

?>




<?php //include_layout_template('header.php');
 //var_dump($_SERVER);
 require_once('layouts/header1.php');
 ?>
 <center><h1 class="main_toc">Create New User</h1></center>
 <?php require_once('layouts/headeruser.php'); ?>
      
      <div id="admin_content">
      
        <?php echo output_message($message);?>
          <form method="post" action="new_admin.php"> 
      	
        
        <p class="line"><p class="detail">User Name </p><p class="about_user2"><input class="box" type="text" name="login"/></p></p>
        
        <p class="line"><p class="detail">Password </p><p class="about_user2"><input class="box" type="password" name="password" /></p></p>
        
        <p class="line"><p class="detail">Confirm Password </p><p class="about_user2"><input class="box" type="password" name="cpassword" /></p></p><br/>
	<p class="line"><p class="detail">User Level </p><p class="about_user2">
	<select name="ulevel">
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
  
           </select>
	</p></p><br/>
        
        <p class="line"><p class="detail"><input type="submit" value="Create" name="commit" class="create_button" onclick="return confirm('Are you shure you want to Create');"></p></p>
      	
        
	  </form>
	
      </div>
    
 </div>
 
 <center></div></center>

</body>
</html>
