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

// $total_count = Product::count_all ();


// $pagination = new Pagination($page,$per_page,$total_count);
  
//   $sql = "SELECT * FROM ndb_doc ";
//   $sql .= "LIMIT {$per_page} ";
//   $sql .= "OFFSET {$pagination->offset()}";
  
  //$photos = Product::find_by_sql($sql);

// $photos= Photograph::find_all();

//$pagination = new Pagination ( $page, $per_page, $total_count );

$allCats = array(
	"All" => "All",
	"CR" => "CR",
	"BRD" => "BRD",
	"REPORT" => "REPORT"
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


if (! empty ( $_REQUEST ['req_name'] )) {
	$requester = $_REQUEST ['req_name'];
	$sql .= " AND lower(requester) like lower('%{$_REQUEST ['req_name']}%')";
}



if (! empty ( $_REQUEST ['crr'] ) && $_REQUEST ['crr'] != 'All') {
	$selectedCrr = $_REQUEST ['crr'];
	//$sql .= (! empty ( $_REQUEST ['prod_name'] )) ? " AND " : " AND ";
	$sql .= " AND cr_brd = '{$_REQUEST ['crr']}'";
}


if (! empty ( $_REQUEST ['statrr'] ) && $_REQUEST ['statrr'] != 'All') {
	$statuscrr = $_REQUEST ['statrr'];
	//$sql .= (! empty ( $_REQUEST ['prod_name'] )) ? " AND " : " AND ";
	$sql .= " AND status = '{$_REQUEST ['statrr']}'";
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
	<h1 class="main_toc5">View Document</h1>
</center>
<?php require_once('layouts/header2.php'); ?>
      
      
      
      
      
      
      <?php echo output_message($message); ?>
<div id="admin_content">
	<form method="POST" name="ajax_param" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" name="page" value="1" />
		
		
		
		
		
		
		<p>
		<p style="
    padding-left: 30px;
">Reference Name :
				<input type="text" name="prod_name"
					value="<?php echo $reference ?>"  style="
    margin-left: 40px;
"/>
					<th><input type="submit" name="sub" value="Search"
					onclick="submitSearch()" /> </p>
					
					<style>
					p.uppercase{
					 text-transform: uppercase;
					}
					</style>
					
					
					
					
					
				<p style="
    padding-left: 30px;
">CR/BRD/REPORT : <select name="crr" onchange="submitSearch()" style="
    margin-left: 22px;  width: 150px;
">
						<?php foreach ($allCats as $key => $value){
							$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select></p>
				
				
				<p style="
    padding-left: 30px;
">Status : <select name="statrr" onchange="submitSearch()" style="
    margin-left: 103px;
">
						<?php foreach ($statusArray as $keys => $value){
							$selected = ($statuscrr == $keys) ? "selected" : "";
							?>
							<option value="<?php echo $keys ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select></p>
				
				<p style="
    padding-left: 30px;
">Requester Name :
				<input type="text" name="req_name"
					value="<?php echo $requester ?>"  style="
    margin-left: 40px;
"/>
					<input type="submit" name="sub" value="Search"
					onclick="submitSearch()" /></p>
				
		
		
		
		</p>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 <?php echo output_message($message);?>
	   
	    

	 
	 
	 














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
