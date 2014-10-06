<?php
require_once("includes/initialize.php");
if (!$session->is_logged_in()) {
   redirect_to("index.php"); 
} else if(!empty($session->user_id)){
	$user = User::find_by_id($session->user_id);
	if(empty($user)){
		redirect_to("index.php");
	} else if(!$user->isAuthorized(RIGHT_INSERT_DOC)){
		redirect_to("admin_home.php");
	}
} else {
	redirect_to("index.php");
}
?>

<?php
$max_file_size = 1048576;

//$message="";
/*if (isset($_POST['submit'])) {
//    $photo = new Photograph();
//    $photo->attach_file($_FILES['file_upload']);
//    $photo->product_name = $_POST['product_name'];
//    $photo->pcategory = $_POST['category'];
//    $photo->psize = $_POST['size'];
//    $photo->pcolor = $_POST['color'];
//    $photo->pprize = $_POST['product_price'];
//    $photo->ptype = $_POST['type'];
//
//
//
//
//    if ($photo->save()) {
//        $session->message("Photograph upload successfully.{$username}");
//        redirect_to('admin_page.php');
//    } else {
//        $message = join("<br/>", $photo->errors);
//        echo $message;
//    }
  /*  $user = User::find_by_id($session->user_id);
    
    $product = new Product();
    $product->attach_file($_FILES['image_1'], 1, TRUE);
    $product->attach_file($_FILES['image_2'], 2);
    $product->attach_file($_FILES['image_3'], 3);
    $product->attach_file($_FILES['image_4'], 4);
    $product->title = $_POST['product_name'];
    $product->i_code = $_POST['i_code'];
    $product->cat_id = $_POST['category'];
    $product->size_id = isset($_POST['size_' . $product->cat_id]) ? $_POST['size_' . $product->cat_id] : 0;
    $product->color_id = isset($_POST['color_' . $product->cat_id]) ? $_POST['color_' . $product->cat_id] : 0;
    $product->type_id = isset($_POST['type_' . $product->cat_id]) ? $_POST['type_' . $product->cat_id] : 0;
    $product->price = $_POST['product_price'];
    $product->quan = $_POST['quan'];

    if ($product->save()) {
        //$session->message("Photograph upload successfully. by {$user->username}");
       // echo $product->title;
       // redirect_to('admin_page.php');
    } else {
        $message = join("<br/>", $photo->errors);
        echo $message;
    }

    //var_dump($product->errors);
}

//$categories = ProductCategory::find_all();
//var_dump($categories);

//$cat_color = array();
//$cat_type = array();
//$cat_size = array();

//if (!empty($categories)) {
    //foreach ($categories as $cat) {
       // $cat_color[$cat->id] = CategoryColor::find_all_by_cat_id($cat->id);
       // $cat_type[$cat->id] = CategoryType::find_all_by_cat_id($cat->id);
       // $cat_size[$cat->id] = CategorySize::find_all_by_cat_id($cat->id);
   // }
//}*/
?>







<?php
//include_layout_template('header.php');
//var_dump($_SERVER);
require_once('layouts/header1.php');
?>
<center><h1 class="main_toc5">Add New Document</h1></center>
 <?php echo output_message($message); ?>
<?php require_once('layouts/header2.php'); ?>

<style>
    .create_button{
        width: 100px;
    }
    
/*    .error_msg{
        color: #FF0000; 
        float: left;
        clear: right;
    }*/
</style>
<link rel="stylesheet" href="css/jquery-ui.css"></link>
<script src="javascrpits/jquery-1.8.3.min.js" ></script>
<script src="javascrpits/jquery-ui.js" ></script>

<script>
    $(function() {
        showCategoryOptions();

        $("select[name=category]").change(function() {
            showCategoryOptions();
        });

        $(".datepicker").datepicker();
    });

    function showCategoryOptions() {
        var catId = $("select[name=category]").val();
        $("select[name^=size_], select[name^=color_], select[name^=type_]").hide();
        $("select[name=size_" + catId + "], select[name=color_" + catId + "], select[name=type_" + catId + "]").show();
    }
</script>

<div id="admin_content">
    <!--<center><h3>Add Product</h3></center>-->
    <form action="admin_page.php" enctype="multipart/form-data" method="post">
        
        
        
        
        <p>Core / NonCore : <select name="core">
             <option value="Core">Core</option>
             <option value="NonCore">NonCore</option>
             
  
           </select></p>
        <p> CR/BRD/REPORT : <select name="crr">
             <option value="CR">CR</option>
             <option value="BRD">BRD</option>
             <option value="REPORT">REPORT</option>
  
           </select></p>
        <p>Referance : <input type="text"  /></p>
        <p>Requester : <input type="text"  /></p>
        <p>Unit : <input type="text"  /></p>
        <p>Contact Person : <input type="text"  /></p>
        <p>Date Submit : <input type="text" class="datepicker" /></p>
        <p>Description : <textarea></textarea></p>
        <p>Date Recived (IT): <input type="text" class="datepicker" /></p>
        <p>SMRC Reviewed Date : <input type="text" class="datepicker" /></p>
        <p>SMRC Status : <input type="text"  /></p>
        <p>Prority : <input type="text"  /></p>
        <p>Date Hand Over To Development : <input type="text" class="datepicker"  /></p>
        <p>Date Hand Over To Temonors/FLS : <input type="text" class="datepicker" /></p>
        <p>Remarks : <textarea></textarea></p>
        <p>Development Reviewed Date : <input type="text" class="datepicker" /></p>
        <p>Documantation Complete/not : <input type="text"  /></p>
        <p>Date Hand Over TO QA : <input type="text" class="datepicker" /></p>
        <p>QA Testing Competed ON : <input type="text" class="datepicker" /></p>
        <p>Date Hand Over To IT Ops: <input type="text" class="datepicker" /></p>
        <p>Release Date: <input type="text" class="datepicker" /></p>
        <p>Status: <input type="text"  /></p>
        <p>Scan Document : <input type="file" class="box"  /></p>
        
       
        
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <br/>
        <center>
            <p class="line">
            <p class="detail2">
            <p >
                <input type="submit" value="Add" name="submit" class="create_button">
            </p>
            <p >
                <input type="reset" value="Cancel" name="cancel" class="create_button">
            </p>
            </p></p>
        </center>

    </form>
</div>

</div>

</body>
</html>
