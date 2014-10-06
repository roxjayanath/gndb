<?php
require_once("includes/initialize.php");



if (!$session->is_logged_in()) {
    redirect_to("login.php");
}



/* $cat_all = new ProductCategory();
    $cat_all->id = 0;
    $cat_all->category = "All";
    
 $prod_cat_array = ProductCategory::find_all();
//$prod_typ_array = array(
//                        '0' => 'All',
//                        'Office' => 'Office',
//                        'Wedding' => 'Wedding',
//                        'Casual' => 'Casual'
//                        ); 
 
 $cat_type = array();
 if (!empty($prod_cat_array)) {
     array_unshift($prod_cat_array, $cat_all);
    foreach ($prod_cat_array as $cat) {
        $cat_type[$cat->id] = CategoryType::find_all_by_cat_id($cat->id);
        $cat_type_all = new CategoryType();
        $cat_type_all->id = 0;
        $cat_type_all->type = "All";
        array_unshift($cat_type[$cat->id], $cat_type_all);
    }
    
}*/

?>

<?php
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

$per_page = 3;




//$prod_name->reference= $_POST['reference'];
//$prod_cat->cr_brd= $_POST['crr'];

//$prod_name = !empty($_REQUEST['prod_name']) ? $_REQUEST['prod_name'] : '';
//$prod_cat = !empty($_REQUEST['prod_cat']) ? $_REQUEST['prod_cat'] : '';
//$prod_typ = !empty($_REQUEST['prod_typ']) ? $_REQUEST['prod_typ'] : '';

//$searchString = Product::get_search_string($prod_name, $prod_cat);
//var_dump($searchString);

//$total_count = Product::count_all($searchString);




//  $photos= Photograph::find_all();

//$pagination = new Pagination($page, $per_page, $total_count);

$sql = "SELECT * FROM ndb_doc ";
//search
//$sql .= $searchString;
//$sql .= "LIMIT {$per_page} ";
//$sql .= "OFFSET {$pagination->offset()}";

//echo $sql;


$photos = Product::find_by_sql($sql); 
?>


<?php //include_layout_template('header.php');
 //var_dump($_SERVER);
 require_once('layouts/header1.php');
 ?>
 
 
 <script src="javascripts/jquery-1.8.3.min.js" ></script>
<script>
    $(function() {
        showCategoryOptions();
        getProductList();
        $("select[name=prod_cat]").change(function() {
            showCategoryOptions();
        });
    });

    function showCategoryOptions() {
        var catId = $("select[name=prod_cat]").val();
        $("select[name^=prod_typ_]").hide();
        $("select[name=prod_typ_" + catId + "]").show();
    }

    function getProductList(page) {
        if (page)
            $("form[name=ajax_param] input[name=page]").val(page);
        var formData = $("form[name=ajax_param]").serialize();
        //console.log(formData);
        $.post("ajax_product_delete.php", formData, function(result) {
            $("#product_list_div").html(result);
        });
    }
</script>
<style>
     a{
                cursor: pointer;
                color: blue;                
            }
</style>
 
 <center><h1 class="main_toc">View Document</h1></center>
 <?php require_once('layouts/header2.php'); ?>
      
      
      
      
      
      
      <?php echo output_message($message); ?>
      <div id="admin_content">
	        <form method="POST" name="ajax_param">
		<input type="hidden" name="page" value="1" />	      
      	<table class="search_tabel" cellpadding="5px">
            <tr>
            <th>Reference Name</th>
            <th><input type="text" name="prod_name" value="<?php //echo $prod_name ?>" /></th>
            <th>CR/BRD/REPORT : <select name="crr">
	    <option value="All">All</option>
             <option value="CR">CR</option>
             <option value="BRD">BRD</option>
             <option value="REPORT">REPORT</option>
  
           </select></th>
            
            <th ><input type="button" name="submit" value="Search" onclick="getProductList()" /></th>
            </tr>
            </table>
            
           
           
		</form>
		<div id="product_list_div"></div>
		<?php include_layout_template("footer.php"); ?>
	 </div>
 </div> 
 
 <center><div  class="logo3"><br/></div></center>

</body>
</html>
