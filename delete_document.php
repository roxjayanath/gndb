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

$per_page = 25;

//$total_count = Product::count_all ();


//$pagination = new Pagination($page,$per_page,$total_count);
  
  //$sql = "SELECT * FROM ndb_doc ";
 // $sql .= "LIMIT {$per_page} ";
  //$sql .= "OFFSET {$pagination->offset()}";
  
  //$photos = Product::find_by_sql($sql);


//$page = ! empty ( $_GET ['page'] ) ? ( int ) $_GET ['page'] : 1;

//$per_page = 10;

//$total_count = Product::count_all ();

// $photos= Photograph::find_all();

//$pagination = new Pagination ( $page, $per_page, $total_count );

$allCats = array(
	"All" => "All",
	"CR" => "CR",
	"BRD" => "BRD",
	"RR" => "REPORT"
);

$statusArray = array(
"All" => "All",
	"Pending" => "Pending",
		"Inprogress" => "Inprogress", 
		"Approval Pending" => "Approval Pending",
		"Development" => "Development",
		"Support Team Testing" => "Support Team Testing",
		"QA Testing" => "QA Testing",
		"Rejected" => "Rejected",
		"Close" => "Close",
		"Hold" => "Hold",
		"Pending Temonos" => "Pending Temonos"
);

$reference = $selectedCrr = $statuscrr=$requester="";


$sql = "SELECT * FROM ndb_doc WHERE d_visible=1 ";

if (! empty ( $_REQUEST ['prod_name'] )) {
	$reference = $_REQUEST ['prod_name'];
	$sql .= " AND lower(reffull) like lower('%{$_REQUEST ['prod_name']}%')";
}

if (! empty ( $_REQUEST ['crr'] ) && $_REQUEST ['crr'] != 'All') {
	$selectedCrr = $_REQUEST ['crr'];
	//$sql .= (! empty ( $_REQUEST ['prod_name'] )) ? " AND " : " WHERE ";
	$sql .= "AND cr_brd = '{$_REQUEST ['crr']}'";
}


if (! empty ( $_REQUEST ['statrr'] ) && $_REQUEST ['statrr'] != 'All') {
	$statuscrr = $_REQUEST ['statrr'];
	//$sql .= (! empty ( $_REQUEST ['prod_name'] )) ? " AND " : " AND ";
	$sql .= " AND status = '{$_REQUEST ['statrr']}'";
}

if (! empty ( $_REQUEST ['req_name'] )) {
	$requester = $_REQUEST ['req_name'];
	$sql .= " AND lower(requester) like lower('%{$_REQUEST ['req_name']}%')";
}

// $sql .= "LIMIT {$per_page} ";
// $sql .= "OFFSET {$pagination->offset()}";

$photoCount = Product::find_by_sql ( $sql );

$total_count = count($photoCount);

$pagination = new Pagination($page,$per_page,$total_count);

$sql2 = $sql;
$sql2 .= " LIMIT {$per_page} ";
$sql2 .= " OFFSET {$pagination->offset()}";

$photos = Product::find_by_sql ( $sql2 );

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
	<h1 class="main_toc5">Delete Document</h1>
</center>
<?php require_once('layouts/header2.php'); ?>
      
      
      
      
      
      
      <?php echo output_message($message); ?>
<div id="admin_content6">
	<form method="POST" name="ajax_param" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" name="page" value="1" />
		<table class="" cellpadding="5px" style="
    font-size: 13px;">
			<tr>
				<th>Reference</th>
				<th><input type="text" name="prod_name"
					value="<?php echo $reference ?>" /></th>
					<th><input type="submit" name="sub" value="Search"
					onclick="submitSearch()" /></th>
				<th>CR/BRD/REPORT : <select name="crr" onchange="submitSearch()">
						<?php foreach ($allCats as $key => $value){
							$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select></th>
				
				
				
				<th>Status : <select name="statrr" onchange="submitSearch()">
						<?php foreach ($statusArray as $keys => $values){
							$selected = ($statuscrr == $keys) ? "selected" : "";
							?>
							<option value="<?php echo $keys ?>" <?php echo $selected ?>><?php echo $values ?></option>
							<?php
						} ?>

				</select></th>
				
				<th>Requester Name</th>
				<th><input type="text" name="req_name"
					value="<?php echo $requester ?>" /></th>
					<th><input type="submit" name="sub" value="Search"
					onclick="submitSearch()" /></th>
				
				

				
			</tr>

				
			</tr>
		</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	   	
	
	 
	    
<!--  <<<<<<< HEAD  -->
	 <center>  <table class="customer" cellpadding="6px" cellspacing="10px" style="
    font-size: 13px;">
            <tr class="head_row">
                <th class="head_toc">ID</th>
                <th class="head_toc">Core / NonCore</th>
                <th class="head_toc">Type</th>
		
		
		<th class="head_toc" style="
    padding-right: 34px;
">Reference</th>
                <th class="head_toc">Requester</th>
		<th class="head_toc" style="
    /* margin-left: 45px; */
    padding-right: 150px;
">Description</th>
		
		
		
		
                <th class="head_toc">Date Submit</th>
				<th class="head_toc">Status</th>
                
		
		
                
                
                
               <!-- <th>&nbsp;</th> -->
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
            <?php foreach($photos as $photo): ?>
            
            <tr>

					<td><?php echo $photo->d_id;?></td>
					<td><?php echo $photo->cor_non;?></td>
					<td><?php echo $photo->cr_brd;?></td>

					<td><?php echo $photo->reffull;?></td>
					<td><?php echo $photo->requester;?></td>
					<td style="text-transform : uppercase"><?php echo $photo->description;?></td>

					
					<td><?php echo $photo->date_sub;?></td>
					<td style="text-transform : capitalize"><?php echo $photo->status;?></td>
					






					<td>
						<!--<a href="comments.php?id=<?php echo $photo->id;?>"> -->
                <?php //echo count($photo->comments());?></td>
					</a>
					<td>
						<!--<a href="viewcusmore.php?id=<?php //echo $photo->id;?>">View</a>-->
						<a href="delete_doc.php?id=<?php echo $photo->d_id; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
					</td>
					<!-- <td><a href="delete_admin.php?id=<?php //echo $photo->id;?>">Delete</a></td>
                 -->
				</tr>
            
            <?php endforeach;?>
            
            
            
           </table>
		</center>



<div id="pagination" style="clear: both; padding-left: 428px;">
    <?php
        if($pagination->total_pages()>1){
            
            if($pagination->has_previous_page()){
                echo " <a href=\"delete_document.php?page=";
                echo $pagination->previous_page();
                echo "\">&laquo; Previous</a> ";
            }
            for($i=1;$i<=$pagination->total_pages();$i++){
               if($i==$page){
                echo " <span class=\"selected\">{$i}</span> ";
               }else{
                echo " <a href=\"delete_document.php?page={$i}\">{$i}</a> ";
               }
            }
            
            
            if($pagination->has_next_page()){
                echo " <a href=\"delete_document.php?page=";
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
