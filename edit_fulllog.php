<?php
require_once ("includes/initialize.php");

if (! $session->is_logged_in ()) {
	redirect_to ( "login.php" );
}

/*
 * $cat_all = new ProductCategory(); $cat_all->id = 0; $cat_all->category = "All"; $prod_cat_array = ProductCategory::find_all(); //$prod_typ_array = array( // '0' => 'All', // 'Office' => 'Office', // 'Wedding' => 'Wedding', // 'Casual' => 'Casual' // ); $cat_type = array(); if (!empty($prod_cat_array)) { array_unshift($prod_cat_array, $cat_all); foreach ($prod_cat_array as $cat) { $cat_type[$cat->id] = CategoryType::find_all_by_cat_id($cat->id); $cat_type_all = new CategoryType(); $cat_type_all->id = 0; $cat_type_all->type = "All"; array_unshift($cat_type[$cat->id], $cat_type_all); } }
 */

?>

<?php


$page = ! empty ( $_GET ['page'] ) ? ( int ) $_GET ['page'] : 1;

$per_page = 2;

//$total_count = Product::count_all ();


//$pagination = new Pagination($page,$per_page,$total_count);
  
 // $sql = "SELECT * FROM ndb_doc ";
 // $sql .= "LIMIT {$per_page} ";
 // $sql .= "OFFSET {$pagination->offset()}";
  
 // $photos = Product::find_by_sql($sql);

//$page = ! empty ( $_GET ['page'] ) ? ( int ) $_GET ['page'] : 1;

//$per_page = 3;

//$total_count = Edithistory::count_all ();

// $photos= Photograph::find_all();

//$pagination = new Pagination ( $page, $per_page, $total_count );

$allCats = array(
	"All" => "All",
	"CR" => "CR",
	"BRD" => "BRD",
	"RR" => "REPORT"
);

$reference = $selectedCrr =$assing_to= "";

//$sql = "SELECT * FROM edit_log";
//$sql2 = "SELECT COUNT(*) FROM edit_log";

$sql3 = "SELECT edit_log.* FROM edit_log";
$sql3 .= " JOIN ndb_doc ON edit_log.doc_id=ndb_doc.d_id ";

if (! empty ( $_REQUEST ['prod_name'] )) {
	$reference = $_REQUEST ['prod_name'];
	$sql3 .= " WHERE lower(ndb_doc.reffull) like lower('%{$_REQUEST ['prod_name']}%')";
}

if (! empty ( $_REQUEST ['crr'] ) && $_REQUEST ['crr'] != 'All') {
	$selectedCrr = $_REQUEST ['crr'];
	$sql3 .= (! empty ( $_REQUEST ['prod_name'] )) ? " AND " : "";
	$sql3 .= " cr_brd = '{$_REQUEST ['crr']}'";
}

if (! empty ( $_REQUEST ['assing_to'] )) {
	$assing_to = $_REQUEST ['assing_to'];
	$sql3 .= " AND lower(reffull) like lower('%{$_REQUEST ['assing_to']}%')";
}

// $sql .= "LIMIT {$per_page} ";
// $sql .= "OFFSET {$pagination->offset()}";

//$photos = Product::find_by_sql ( $sql );



//$ $photo->edited_by;

$photoCount = Edithistory::find_by_sql ( $sql3 );

$total_count = count($photoCount);

$pagination = new Pagination($page,$per_page,$total_count);

$sql2 = $sql3;
$sql2 .= " LIMIT {$per_page} ";
$sql2 .= " OFFSET {$pagination->offset()}";

//$photos = Edithistory::find_by_sql ( $sql2 );
//var_dump($sql2);
 $edithistory = Edithistory::find_by_sql ( $sql2 );








?>


<?php 
// include_layout_template('header.php');
      // var_dump($_SERVER);
require_once ('layouts/header1.php');
?>


<script src="javascrpits/jquery-1.8.3.min.js"></script>
<script>
//     $(function() {
//         showCategoryOptions();
//         getProductList();
//         $("select[name=prod_cat]").change(function() {
//             showCategoryOptions();
//         });
//     });

    
// 	$(function(){
// 		$("select[name=crr]").change(function(e){
// 			//e.preventDefault();
// 			$("form[name=ajax_param]").submit();
// 		});
// 	});
	
    function submitSearch(){
    	$("form[name=ajax_param]").submit();
    }
</script>
<style>
a {
	cursor: pointer;
	color: blue;
}
</style>

<center>
	<h1 class="main_toc5">Document Editing Log History</h1>
</center>
<?php require_once('layouts/header2.php'); ?>
      
      
      
      
      
      
      <?php echo output_message($message); ?>
<div id="admin_content">
	<form method="POST" name="ajax_param" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" name="page" value="1" />
		<table class="search_tabel" cellpadding="5px" style="
    font-size: 13px;">
			<tr>
				<th>Reference</th>
				<th><input type="text" name="prod_name"
					value="<?php echo $reference ?>" /></th>
					<th><input type="submit" name="sub" value="Search"
					onclick="submitSearch()" /></th>
					
					<th>Assing to </th>
				<th><input type="text" name="assing_to"
					value="<?php echo $assing_to; ?>" /></th>
					<th><input type="submit" name="sub2" value="Search"
					onclick="submitSearch()" /></th>
					
					
					
				<th>CR/BRD/REPORT : <select name="crr" onchange="submitSearch()">
						<?php foreach ($allCats as $key => $value){
							$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select></th>

				
			</tr>
		</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	   	
	
	 
	    
<!--  <<<<<<< HEAD  -->
	 <center>  <table class="customer" cellpadding="6px" cellspacing="10px" style="
    font-size: 13px; padding-right: 136PX;">
            <tr class="head_row">
                
                
		
		
		<th class="head_toc" style="
    padding-right: 34px;
">Reference</th>
<th class="head_toc">Action By</th>
		<th class="head_toc" style="
    /* margin-left: 45px; */
    /*padding-right: 150px;*/
">Action Type</th>
                <th class="head_toc">Time</th>
				
                
                
                
                
            </tr>
<!-- =======
	<!-- <center>
			<table class="customer" cellpadding="6px" cellspacing="10px">
				<tr class="head_row">
					<th class="head_toc">ID</th>
					<th class="head_toc">Core / NonCore</th>
					<th class="head_toc">CR/BRD/REPORT</th>
					<th class="head_toc">Date Submit</th>
					<th class="head_toc">Description</th>
					<th class="head_toc">Date Recived (IT)</th>
					<th class="head_toc">SMRC Reviewed Date</th>
					<th class="head_toc">SMRC Status</th>
					<th class="head_toc">Prority</th>
					<th class="head_toc">Date Hand Over To Development</th>
					<th class="head_toc">Date Hand Over To Temonors/FLS</th>
					<th class="head_toc">Remarks</th>
					<th class="head_toc">Development Reviewed Date</th>
					<th class="head_toc">Documantation Complete/not</th>
					<th class="head_toc">Date Hand Over TO QA</th>
					<th class="head_toc">QA Testing Competed ON</th>
					<th class="head_toc">Date Hand Over To IT Ops</th>
					<th class="head_toc">Release Date</th>
					<th class="head_toc">Status</th>





					<th>&nbsp;</th>
				</tr>
>>>>>>> origin/master   -->
            <?php foreach($edithistory as $photo): ?>
			<?php 
			
			$product = Product::find_by_id ($photo->doc_id);
			$user = User::find_by_id ($photo->user_id);
			
			
			?>
            
            <tr>

					
					<td><?php echo $product->reffull;?></td>
					<td><?php echo $user->us_name;?></td>

					<td><?php echo $photo->ed_type;?></td>
					<td><?php echo $photo->ed_time;?></td>
					
					






					<td>
						<!--<a href="comments.php?id=<?php //echo $photo->id;?>"> -->
                <?php //echo count($photo->comments());?></td>
					</a>
					
					<!-- <td><a href="delete_admin.php?id=<?php //echo $photo->id;?>">Delete</a></td>
                 -->
				</tr>
            
            <?php endforeach;?>
            
            
            
           </table>
		   
		   <?php echo date("Y-m-d H:i:s "); ?>
		</center>



<div id="pagination" style="clear: both; padding-left: 428px;">
    <?php
        if($pagination->total_pages()>1){
        	
        	$params = $_REQUEST;
        	$pageUrl = '?';
        	if(!empty($params['page'])){
        		unset($params['page']);
        	}
        	$pageUrl .= http_build_query($params);
        	$pageUrl .= (count($params) > 0 ? '&' : '') . 'page=';
        	
        	//echo "<br>".$pageUrl."<br>";
            
            if($pagination->has_previous_page()){
//                 echo " <a href=\"edit_fulllog.php?page=";
            	echo " <a href=\"edit_fulllog.php{$pageUrl}";
                echo $pagination->previous_page();
                echo "\">&laquo; Previous</a> ";
            }
            for($i=1;$i<=$pagination->total_pages();$i++){
               if($i==$page){
                echo " <span class=\"selected\">{$i}</span> ";
               }else{
                //echo " <a href=\"edit_fulllog.php?page={$i}\">{$i}</a> ";
               	echo " <a href=\"edit_fulllog.php{$pageUrl}{$i}\">{$i}</a> ";
               }
            }
            
            
            if($pagination->has_next_page()){
//                 echo " <a href=\"edit_fulllog.php?page=";
            	echo " <a href=\"edit_fulllog.php{$pageUrl}";
                echo $pagination->next_page();
                echo "\">Next &raquo;</a> ";
            }
            }      
    ?>
    
</div>	










	</form>
	<div id="product_list_div"></div>
		<?php include_layout_template("footer.php"); ?>
	 </div>
</div>

<center>
	<div class="logo3">
		<br />
	</div>
</center>

</body>
</html>
