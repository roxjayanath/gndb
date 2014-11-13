<?php
require_once("includes/initialize.php");



if(!$session->is_logged_in()){
    redirect_to("login.php");
}
?>


<?php
   if(empty($_GET['id'])){
    $session->message("No User ID was provided");
    redirect_to('index.php');
   }
   
   $photo=User::find_by_id($_GET['id']);
   
   if($photo->us_id==1){
    $session->message("The admin {$photo->us_name} cant delete");
    redirect_to('editadmin.php');
   }
   else
   {
   if($photo&& $photo->delete()){
    
    if($photo->id==$session->id){
	$session->message("The admin {$photo->us_name} was deleted");
         redirect_to('editadmin.php');
    }
    else{
    
    $session->message("The admin {$photo->us_name} was deleted");
    redirect_to('editadmin.php');
    }
   }else{
    $session->message("The admin cound not be deleted");
    redirect_to('index.php');
   
   }
   }
   
?>
<?php if(isset($database)){
    $database->close_connection();
}
    ?>