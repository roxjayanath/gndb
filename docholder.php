<?php

require_once ("includes/initialize.php");

if (! $session->is_logged_in ()) {
	redirect_to ( "login.php" );
}

$sname;
$total_all = Product::count_all ();

$total_count = Product::count_status ();
$total_countcr = Product::count_statuscr ();
$total_countbr = Product::count_statusbr ();
$total_countrep = Product::count_statusrep ();
$total_countcomlete = Product::count_statuscomplet();
$total_countclose = Product::count_statusclose();
$total_countreject = Product::count_statusreject();
$total_counthold = Product::count_statushold();
$total_countin = Product::count_statusin();


$total_countdev = Product::count_statusdev();

$total_countpetem = Product::count_statpendtem();
$total_countqatest = Product::count_statqatest();





//$total_countassing = Product::count_statusassing_to ();
//$total_countassing2 = Product::count_statusassing_to2();

//echo $total_count;
//echo $total_countcr;
//echo $total_countbr;
//echo $total_countrep;

$temsname='';
$tempcount='';
$photos='';
//echo $total_countassing;


//$assing_to= "";

if (isset($_POST['submit'])) {

 $product = new Product();
 
 //$total_countassing2 = $product->count_statusassing_to2($product->sname= $_POST['assing_to']);
 $product->count_statusassing_to2namelist($product->sname= $_POST['assing_to']);
 $total_countassing2 = Product::count_statusassing_to2($product->sname= $_POST['assing_to']);
 
 
 //echo $total_countassing2;
 //echo $product->assing_to;
 //echo $product->sname;
 
 $temsname=$product->sname;
 $tempcount = $total_countassing2;
 
 
 //SELECTt * FROM ndb_doc WHERE d_visible =1 AND lower(assing_to) like lower('%m%')
 
 $sql = "SELECT * FROM ndb_doc WHERE d_visible =1  AND lower(assing_to) like lower('%".$product->sname= $_POST['assing_to'];
 $sql.= "%')";
 $photos = Product::find_by_sql ( $sql );
 


}




//http://localhost/php_sandbox/gndb/public/upload/docs/CR/1_1413125778.pdf



?>




<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});

</script>

<?php
//include_layout_template('header.php');
//var_dump($_SERVER);
require_once('layouts/header1.php');
?>
<center><h1 class="main_toc5">Find Document Holder</h1></center>
<?php require_once('layouts/headercharts.php'); ?>

<br>
<head>
	
	
	
  </head>
  <body>
 
  
 <!-- <p>If you click on the "Hide" button, I will disappear.</p>
<button id="hide">Hide</button> -->
  
  
  
   



 <form action="docholder.php" enctype="multipart/form-data" method="post">
 
 <p class="detailll" style="
    padding-left: 20px;
">Hand over to : <input type="text" name="assing_to" class="detailindate12"/>
				
                <input type="submit" value="Search" name="submit"  />
            </p>
 
 <!--<input type="button" name="answer" value="Show Div" onclick="showDiv()" /> -->
 
 
 

 <!--<div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>
<input type="button" name="answer" value="Show Div" onclick="showDiv()" />
  -->

 
 
 
					
					
					<p style="
    padding-left: 20px;
" name ="hodls"><?php echo $temsname; ?> holds : <?php echo $tempcount; ?> Documents</p>

					
				<div id="admin_content4" name="holdtable">	
					
					<center>  <table class="customer" cellpadding="6px" cellspacing="10px" border=".2" style="
    font-size: 13px;">
            <tr class="">
                
                <th class="head_toc">Core/NonCore</th>
                <th class="head_toc">Type</th>
		
		
		<th class="head_toc" style="
    padding-right: 34px;
">Reference</th>
                <th class="head_toc">Date Submit</th>
				<th class="head_toc">Descrption</th>
				<th class="head_toc">Holder</th>
				<th class="head_toc">Status</th>
				<th class="head_toc">Last Edited</th>
                
		
		
                
                
                
              
            </tr>

            <?php 
            if(!empty($photos)){
            foreach($photos as $photo): ?>
            
            <tr>

					
					<td><?php echo $photo->cor_non;?></td>
					<td><?php echo $photo->cr_brd;?></td>

					<td><?php 
            //echo $photo->reference;
					echo $photo->reffull;
					?></td>
					

					
					<td><?php echo $photo->date_sub;?></td>
					<td><?php echo $photo->description;?></td>
					<td><?php echo $photo->assing_to;?></td>
					<td><?php echo $photo->status;?></td>
					<td><?php echo $photo->update_on;?></td>
					






					
					</a>
					
					<!-- <td><a href="delete_admin.php?id=<?php //echo $photo->id;?>">Delete</a></td>
                 -->
				</tr>
            
            <?php endforeach;
            }
            ?>
            
            
            
           </table>
		</center>			
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				</div>		
					
					
    
  
    
    </form>


            
            
        
			
   
            
            
         
	 
					
					
					
					
					
  </body>