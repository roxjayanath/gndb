<?php require_once("includes/initialize.php");?>
<?php if(!$session->is_logged_in()){
    redirect_to("index.php");
}
?>

<?php

  $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
  
  $photo=User::find_by_id($session->user_id);
  
   
   if($photo->us_id==1){
   
    if(isset($_GET['clear']) && $_GET['clear']=='true'){
    file_put_contents($logfile,'');
    log_action('Logs Cleared',"by User ID {$session->user_id}");
    redirect_to('log_histry.php');
   
   }
   }
   else
   {

	 $session->message("You dont have sufficient privileges to clear the history file");
    redirect_to('log_histry.php');
    
  }
?>


<a href="index.php">&laquo; Back</a><br/>
<br/>
<h2>Log File</h2>
<p><a href="logfile.php?clear=true">Clear log file</a></p>
<?php

if(file_exists($logfile)&& is_readable($logfile)&& $handle=fopen($logfile,'r')){
  echo "<ul class=\"log-entries\">";
  while(!feof($handle)){
    $entry=fgets($handle);
    if(trim($entry)!=""){
      echo "<li>{$entry}</li>";
    }
  }
  echo "</ul>";
  fclose($handle);
  
}else{
  echo "Cound not read from {$logfile}";
}

?>