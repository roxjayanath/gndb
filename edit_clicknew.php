<?php
require_once("includes/initialize.php");

if (!$session->is_logged_in()) {
    redirect_to("index.php");
}
?>

<?php
//if (empty($_GET['id'])) {
  //  $session->message("No product ID was provided");
//}

$photo = Product::find_by_id($_REQUEST['id']);
//$photo = Product::find_by_id();

if (!$photo) {
    $session->message("The product could not be located");
    redirect_to('edit_clicknew.php');
}

//$max_file_size = 1048576;

//if (empty($_GET['id'])) {
 //   $session->message("No product ID was provided");
//}

//$photo = Product::find_by_id(2);

//if (!$photo) {
  //  $session->message("The product could not be located");
   // redirect_to('edit_clicknew.php.php');
//}

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
    //$product = Product::::find_by_id($photo->d_id);
    
    $product = new Product();
    
    $product->d_id = $_POST['id'];
    
    $product->attach_file($_FILES['pdf1'], 1);
    $product->attach_file($_FILES['pdf2'], 2);
    $product->attach_file($_FILES['pdf3'], 3);
    
    
    
    $product->cor_non= $_POST['core'];
    $product->cr_brd= $_POST['crr'];
    $product->reference= $_POST['reference'];
    $product->requester= $_POST['requester'];
    $product->unit= $_POST['unit'];
    $product->contact_p= $_POST['contact_p'];
    
    $product->date_sub= $_POST['date_sub'];
    $product->description= $_POST['description'];
    $product->date_reciv_it= $_POST['date_reciv_it'];
    $product->smrc_date= $_POST['smrc_date'];
    $product->smrc_status= $_POST['smrc_status'];
    $product->priority= $_POST['priority'];
    
     $product->date_develop= $_POST['date_develop'];
     $product->date_temo= $_POST['date_temo'];
     $product->remarks= $_POST['remarks'];
    $product->develop_r_date= $_POST['develop_r_date'];
    $product->document_complet= $_POST['document_complet'];
     $product->date_hand_qa= $_POST['date_hand_qa'];
     
     
     $product->qa_complete= $_POST['qa_complete'];
     $product->date_back_it= $_POST['date_back_it'];
    $product->release_date= $_POST['release_date'];
    $product->status= $_POST['status'];
	
	
	$update_product = $product->update_document();
	
	if ($update_product) {
        //$new_comment->try_to_send_notification();
        $message = "sucess";
        redirect_to("edit_clicknew.php?id={$photo->d_id}");
    } else {
        $message = "there is error updating product";
    }
	
     
    }
    
    
    
    //$product->title = $_POST['product_name'];
  //  $product->i_code = $_POST['i_code'];
  //  $product->cat_id = $_POST['category'];
  //  $product->size_id = isset($_POST['size_' . $product->cat_id]) ? $_POST['size_' . $product->cat_id] : 0;
   // $product->color_id = isset($_POST['color_' . $product->cat_id]) ? $_POST['color_' . $product->cat_id] : 0;
   // $product->type_id = isset($_POST['type_' . $product->cat_id]) ? $_POST['type_' . $product->cat_id] : 0;
  //  $product->price = $_POST['product_price'];
   // $product->quan = $_POST['quan'];

   /* if ($product->save()) {
        $session->message("Document {$product->reference} Upload Successfully  by {$user->us_name}");
        echo $product->reference;
        redirect_to('admin_page.php');
    } else {
       // $message = join("<br/>", $photo->errors);
        echo $message;
    }

    //var_dump($product->errors);
} */

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

<div style="margin-left: 20px;float:left;">
    
    <div>
         <br>ID : <?php echo $photo->d_id;?>
        <br>Core / NonCore : <?php echo $photo->cor_non;?>
        <br>CR/BRD/REPORT :<?php echo $photo->cr_brd;?>
		<br>Reference : <?php echo $photo->reference;?>
		<br>Requester : <?php echo $photo->requester;?>
		<br>Unit : <?php echo $photo->unit;?>
		<br>Contact Person : <?php echo $photo->contact_p;?> 
		
        <br>Date Submit :<?php echo $photo->date_sub;?>
        <br>Description :<?php echo $photo->description;?>
        <br>Date Recived (IT):<?php echo $photo->date_reciv_it;?>
        <br>SMRC Reviewed Date :<?php echo $photo->smrc_date;?>
        <br>SMRC Status :<?php echo $photo->smrc_status;?>
        <br>Prority :<?php echo $photo->priority;?>
        <br>Date Hand Over To Development :<?php echo $photo->date_develop;?>
        <br>Date Hand Over To Temonors/FLS :<?php echo $photo->date_temo;?>
        <br>Remarks :<?php echo $photo->remarks;?>
        <br>Development Reviewed Date :<?php echo $photo->develop_r_date;?>
        <br>Documantation Complete/not :<?php echo $photo->document_complet;?>
        <br>Date Hand Over TO QA :<?php echo $photo->date_hand_qa;?>
        <br>QA Testing Competed ON :<?php echo $photo->qa_complete;?>
        <br>Date Hand Over To IT Ops :<?php echo $photo->date_back_it;?>
        <br>Release Date :<?php echo $photo->release_date;?>
        <br>Status :<?php echo $photo->status;?>
        <br>
        <br>Scan document 1 : <?php echo $photo->scan_doc1; ?>
        <br>Scan document 2 : <?php echo $photo->scan_doc2; ?>
        <br>Scan document 3 : <?php echo $photo->scan_doc3; ?>
            
    </div>




<div id="admin_content" style="margin-left: 0px">
    <!--<center><h3>Add Product</h3></center>-->
    <form action="edit_clicknew.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : 0; ?>" />
        <p class="detailll" >Core / NonCore : <select name="core" class="about_userrrr">
             <option value="Core">Core</option>
             <option value="NonCore">NonCore</option>
             
  
           </select></p>
        <p class="detailll"> CR/BRD/REPORT : <select name="crr" class="about_userrrr">
             <option value="CR">CR</option>
             <option value="BRD">BRD</option>
             <option value="REPORT">REPORT</option>
  
           </select></p>
        <p class="detailll">Reference : <input type="text" name="reference" class="about_userrrr" value="<?php echo $photo->reference; ?>" /></p>
        <p class="detailll">Requester : <input type="text" class="datepicker"name="date_req" /> <input type="text" name="requester" class="about_userrrr" /></p>
        <p class="detailll">Unit : <input type="text" name="requester" class="about_userrrr" value="<?php echo $photo->requester; ?>"/></p>
        <p class="detailll">Unit : <input type="text" name="unit"  class="about_userrrr" value="<?php echo $photo->unit; ?>"/></p>
        <p class="detailll">Contact Person : <input type="text" name="contact_p" class="about_userrrr" value="<?php echo $photo->contact_p; ?>"/></p>
        <p class="detailll">Date Submit : <input type="text" class="datepicker"name="date_sub" value="<?php echo $photo->date_sub; ?>"/></p>
        <p class="detailll">Description : <textarea name="description" class="about_userrrr"><?php echo $photo->description;?></textarea></p>
        <p class="detailll">Date Recived (IT): <input type="text" class="datepicker" name="date_reciv_it" value="<?php echo $photo->date_reciv_it;?>" /></p>
        <p class="detailll">SMRC Reviewed Date : <input type="text" class="datepicker" name="smrc_date" value="<?php echo $photo->smrc_date;?>"/></p>
        <p class="detailll">SMRC Status : <input type="text" name="smrc_status" class="about_userrrr" value="<?php echo $photo->smrc_status;?>"/></p>
        <p class="detailll">Priority : <input type="text"  name="priority" class="about_userrrr" value="<?php echo $photo->priority;?>"/></p>
        <p class="detailll">Date Hand Over To Development : <input type="text" class="datepicker" name="date_develop" value="<?php echo $photo->date_develop;?>"/></p>
        <p class="detailll">Date Hand Over To Temonors/FLS : <input type="text" class="datepicker"name="date_temo" value="<?php echo $photo->date_temo;?>"/></p>
        <p class="detailll">Remarks : <textarea name="remarks" class="about_userrrr"><?php echo $photo->remarks;?></textarea></p>
        <p class="detailll">Development Reviewed Date : <input type="text" class="datepicker" name="develop_r_date" value="<?php echo $photo->develop_r_date;?>"/></p>
        <p class="detailll">Documantation Complete/not : <input type="text" name="document_complet" class="about_userrrr" value="<?php echo $photo->document_complet;?>"/></p>
        <p class="detailll">Date Hand Over TO QA : <input type="text" class="datepicker" name="date_hand_qa" value="<?php echo $photo->date_hand_qa;?>"/></p>
        <p class="detailll">QA Testing Competed ON : <input type="text" class="datepicker" name="qa_complete" value="<?php echo $photo->qa_complete;?>"/></p>
        <p class="detailll">Date Hand Over To IT Ops : <input type="text" class="datepicker" name="date_back_it" value="<?php echo $photo->date_back_it;?>"/></p>
        <p class="detailll">Release Date : <input type="text" class="datepicker" name="release_date" value="<?php echo $photo->release_date;?>"/></p>
        <p class="detailll">Status : <select name="status" class="about_userrrr">
             <option value="pending">Pending</option>
             <option value="completed">Completed</option>
              <option value="rejected">Rejected</option>
               <option value="close">Close</option>
                <option value="new">New</option>
           </select></p>
        <p class="detailll">Scan Document 1 : <input type="file" class="box" name="pdf1" /></p>
        <p class="detailll">Scan Document 2 : <input type="file" class="box"  name="pdf2" /></p>
        <p class="detailll">Scan Document 3 : <input type="file" class="box" name="pdf3"  /></p>
        
        
       
        
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <br/>
        <center>
            <p class="line">
            <p class="detail2">
            <p >
                <input type="submit" value="Update" name="submit" class="create_button">
            </p>
            <p >
                <input type="reset" value="Cancel" name="cancel" class="create_button">
            </p>
            </p></p>
        </center>

    </form>
</div>
</div>

</div>

</body>
</html>
