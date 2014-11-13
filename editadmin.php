<?php
require_once("includes/initialize.php");



if(!$session->is_logged_in()){
    redirect_to("login.php");
}
?>

<?php
   
    $page=!empty($_GET['page'])?(int)$_GET['page'] : 1;
    
    $per_page= 10;
    
    $total_count= User::count_all();
    



  //  $photos= Photograph::find_all();
  
  $pagination = new Pagination($page,$per_page,$total_count);
  
  $sql = "SELECT * FROM ndb_users ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  
  $photos = User::find_by_sql($sql);
 
 
 ?>
 

<?php //include_layout_template('header.php');
 //var_dump($_SERVER);
 require_once('layouts/header1.php');
 ?>
 <center><h1 class="main_toc">Edit User Profiles</h1></center>
 <?php require_once('layouts/headeruser.php'); ?>
 
 <div id="admin_content">


                 
      <script type="text/javascript">
		// Popup window code
		function newPopup(url) {
			popupWindow = window.open(
				url,'popUpWindow','height=350,width=400,left=400,top=400,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
		</script>

           <?php echo output_message($message);?>
           <table class="customer" cellpadding="6px" cellspacing="10px" style="
    padding-left: 88px;
">
            <tr class="head_row">
                <th class="head_toc">ID</th>
                <th class="head_toc">User Name</th>
                <th class="head_toc">Password</th>
                
                
                <th>&nbsp;</th>
            </tr>
            <?php foreach($photos as $photo): ?>
            
            <tr>
                
                <td><?php echo $photo->us_id;?></td>
                <td><?php echo $photo->us_name;?></td>
                <td><?php //echo $photo->us_pass;?>*********************</td>
                
                <td>
                <!--<a href="comments.php?id=<?php echo $photo->id;?>"> -->
                <?php //echo count($photo->comments());?></td>
                </a>
               <!-- <td><a href="edit_admin.php?id=<?php echo $photo->us_id;?>" onclick="return confirm('Are you shure you want to Edit');">Edit</a></td>
                -->
				<td>
				<a href="JavaScript:newPopup('edit_user.php?id=<?php echo $photo->us_id;?>');" >Edit</a>
				</td>
				
				<td><a href="delete_admin.php?id=<?php echo $photo->us_id;?>" onclick="return confirm('Are you shure you want to Delete');">Delete</a></td>
				
                
            </tr>
            
            <?php endforeach;?>
            
            
            
           </table>
           
           <div id="pagination" style="clear: both;">
    <?php
        if($pagination->total_pages()>1){
            
            if($pagination->has_previous_page()){
                echo " <a href=\"editadmin.php?page=";
                echo $pagination->previous_page();
                echo "\">&laquo; Previous</a> ";
            }
            for($i=1;$i<=$pagination->total_pages();$i++){
               if($i==$page){
                echo " <span class=\"selected\">{$i}</span> ";
               }else{
                echo " <a href=\"editadmin.php?page={$i}\">{$i}</a> ";
               }
            }
            
            
            if($pagination->has_next_page()){
                echo " <a href=\"editadmin.php?page=";
                echo $pagination->next_page();
                echo "\">Next &raquo;</a> ";
            }
            }    
    ?>
    
</div>
           <br/>
           
           </div>
          
           
<?php include_layout_template('footer.php'); ?>