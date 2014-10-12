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

//$page = ! empty ( $_GET ['page'] ) ? ( int ) $_GET ['page'] : 1;

//$per_page = 10;

//$total_count = Product::count_all ();

// $photos= Photograph::find_all();

//$pagination = new Pagination ( $page, $per_page, $total_count );

$allCats = array(
	"All" => "All",
	"CR" => "CR",
	"BRD" => "BRD",
	"REPORT" => "REPORT"
);

$reference = $selectedCrr = "";

$sql = "SELECT * FROM ndb_doc WHERE d_visible=1";

if (! empty ( $_REQUEST ['prod_name'] )) {
	$reference = $_REQUEST ['prod_name'];
	$sql .= " WHERE lower(reference) like lower('%{$_REQUEST ['prod_name']}%')";
}

if (! empty ( $_REQUEST ['crr'] ) && $_REQUEST ['crr'] != 'All') {
	$selectedCrr = $_REQUEST ['crr'];
	$sql .= (! empty ( $_REQUEST ['prod_name'] )) ? " AND " : " WHERE ";
	$sql .= "cr_brd = '{$_REQUEST ['crr']}'";
}

// $sql .= "LIMIT {$per_page} ";
// $sql .= "OFFSET {$pagination->offset()}";

$photos = Product::find_by_sql ( $sql );

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
	<h1 class="main_toc">Edit Document</h1>
</center>
<?php require_once('layouts/header2.php'); ?>
      
      
      
      
      
      
      <?php echo output_message($message); ?>
<div id="admin_content">
	<form method="POST" name="ajax_param" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" name="page" value="1" />
		<table class="search_tabel" cellpadding="5px">
			<tr>
				<th>Reference Name</th>
				<th><input type="text" name="prod_name"
					value="<?php echo $reference ?>" /></th>
					<th><input type="submit" name="sub" value="Search"
					onclick="submitSearch()" /></th>
				<th>CR/BRD/REPORT : <select name="crr" onchange="submitSearch()">
						<?php foreach ($allCats as $key => $value){
							$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option name="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select></th>

				
			</tr>
		</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 <?php echo output_message($message);?>
	   
	    
<!--  <<<<<<< HEAD  -->
	 <center>  <table class="customer" cellpadding="6px" cellspacing="10px">
            <tr class="head_row">
                <th class="head_toc">ID</th>
                <th class="head_toc">Core / NonCore</th>
                <th class="head_toc">CR/BRD/<br>REPORT</th>
		
		
		<th class="head_toc">Reference</th>
                <th class="head_toc">Requester</th>
		<th class="head_toc">unit</th>
		
		
		
		
                <th class="head_toc">Date Submit</th>
				<th class="head_toc">Status</th>
                
		
		
                
                
                
                <th>&nbsp;</th>
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

					<td><?php echo $photo->reference;?></td>
					<td><?php echo $photo->requester;?></td>
					<td><?php echo $photo->unit;?></td>

					
					<td><?php echo $photo->date_sub;?></td>
					<td><?php echo $photo->status;?></td>
					






					<td>
						<!--<a href="comments.php?id=<?php echo $photo->id;?>"> -->
                <?php //echo count($photo->comments());?></td>
					</a>
					<td>
						<!--<a href="viewcusmore.php?id=<?php //echo $photo->id;?>">View</a>-->
						<a href="edit_clicknew.php?id=<?php echo $photo->d_id; ?>">Edit</a>
					</td>
					<!-- <td><a href="delete_admin.php?id=<?php //echo $photo->id;?>">Delete</a></td>
                 -->
				</tr>
            
            <?php endforeach;?>
            
            
            
           </table>
		</center>














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
