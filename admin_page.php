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
if (isset($_POST['submit'])) {
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
    $user = User::find_by_id($session->user_id);
    
    $product = new Product();
    $product->attach_file($_FILES['pdf1'], 1);
    $product->attach_file($_FILES['pdf2'], 2);
    $product->attach_file($_FILES['pdf3'], 3);
    
    
    $product->cor_non= $_POST['core'];
    $product->cr_brd= $_POST['crr'];
    $product->reference= $_POST['product_name'];
    $product->requester= $_POST['product_name'];
    $product->unit= $_POST['product_name'];
    $product->contact_p= $_POST['product_name'];
    
    $product->date_sub= $_POST['product_name'];
    $product->description= $_POST['product_name'];
    $product->date_reciv_it= $_POST['product_name'];
    $product->smrc_date= $_POST['product_name'];
    $product->smrc_status= $_POST['product_name'];
    $product->priority= $_POST['product_name'];
    
     $product->date_develop= $_POST['product_name'];
     $product->date_temo= $_POST['product_name'];
     $product->remarks= $_POST['product_name'];
    $product->develop_r_date= $_POST['product_name'];
    $product->document_complet= $_POST['product_name'];
     $product->date_hand_qa= $_POST['product_name'];
     
     
     $product->qa_complete= $_POST['product_name'];
     $product->date_back_it= $_POST['product_name'];
    $product->release_datev= $_POST['product_name'];
    $product->statusv= $_POST['product_name'];
     
    
    
    
    
    //$product->title = $_POST['product_name'];
  //  $product->i_code = $_POST['i_code'];
  //  $product->cat_id = $_POST['category'];
  //  $product->size_id = isset($_POST['size_' . $product->cat_id]) ? $_POST['size_' . $product->cat_id] : 0;
   // $product->color_id = isset($_POST['color_' . $product->cat_id]) ? $_POST['color_' . $product->cat_id] : 0;
   // $product->type_id = isset($_POST['type_' . $product->cat_id]) ? $_POST['type_' . $product->cat_id] : 0;
  //  $product->price = $_POST['product_price'];
   // $product->quan = $_POST['quan'];

    if ($product->save()) {
        $session->message("Photograph upload successfully. by {$user->us_name}");
        echo $product->reference;
        redirect_to('admin_page.php');
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
//}
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
        <p>Reference : <input type="text" name="" /></p>
        <p>Requester : <input type="text" name=""  /></p>
        <p>Unit : <input type="text" name=""  /></p>
        <p>Contact Person : <input type="text" name="" /></p>
        <p>Date Submit : <input type="text" class="datepicker"name="" /></p>
        <p>Description : <textarea name=""></textarea></p>
        <p>Date Recived (IT): <input type="text" class="datepicker" name=""/></p>
        <p>SMRC Reviewed Date : <input type="text" class="datepicker" name=""/></p>
        <p>SMRC Status : <input type="text" name="" /></p>
        <p>Priority : <input type="text"  name=""/></p>
        <p>Date Hand Over To Development : <input type="text" class="datepicker" name="" /></p>
        <p>Date Hand Over To Temonors/FLS : <input type="text" class="datepicker"name="" /></p>
        <p>Remarks : <textarea name=""></textarea></p>
        <p>Development Reviewed Date : <input type="text" class="datepicker" name="" /></p>
        <p>Documantation Complete/not : <input type="text" name="" /></p>
        <p>Date Hand Over TO QA : <input type="text" class="datepicker" name=""/></p>
        <p>QA Testing Competed ON : <input type="text" class="datepicker" name=""/></p>
        <p>Date Hand Over To IT Ops : <input type="text" class="datepicker" name="" /></p>
        <p>Release Date : <input type="text" class="datepicker" name="" /></p>
        <p>Status : <input type="text"  name=""/></p>
        <p>Scan Document 1 : <input type="file" class="box" name="pdf1" /></p>
        <p>Scan Document 2 : <input type="file" class="box"  name="pdf2"/></p>
        <p>Scan Document 3 : <input type="file" class="box" name="pdf3" /></p>
        
        
       
        
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
