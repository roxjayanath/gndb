<?php
require_once("includes/initialize.php");



if(!$session->is_logged_in()){
redirect_to("login.php");
}
?>


<?php
   if(empty($_GET['id'])){
    $session->message("No photograph ID was provided");
    redirect_to('index.php');
   }
   
   $user = User::find_by_id($session->user_id);
   $photo=Product::find_by_id($_GET['id']);
   if($photo&& $photo->destroy()){
    $session->message("The Document : {$photo->reffull} was deleted by {$user->us_name}");
	
	$edithistory = new Edithistory();
	
	$edithistory->doc_id=$photo->d_id;
	$edithistory->user_id= $session->user_id;
	$edithistory->ed_type="DELETE";
	$edithistory->ed_time=date("Y-m-d H:i:s ");
	$edithistory->create();
	
    redirect_to('delete_document.php');
    
   }else{
    $session->message("The photo cound not be deleted");
    redirect_to('index.php');
   }
   
?>
<?php if(isset($database)){
    $database->close_connection();
}
    ?>