<?php
require_once("includes/initialize.php");

if (!$session->is_logged_in()) {
    redirect_to("index.php");
}
?>

<?php
if (empty($_GET['id'])) {
    $session->message("No product ID was provided");
}

$photo = Product::find_by_id($_REQUEST['id']);

if (!$photo) {
    $session->message("The product could not be located");
    redirect_to('edit_product.php');
}
/*
//populate lists
$categories = ProductCategory::find_all();
//var_dump($categories);

$cat_color = array();
$cat_type = array();
$cat_size = array();

if (!empty($categories)) {
    foreach ($categories as $cat) {
        $cat_color[$cat->id] = CategoryColor::find_all_by_cat_id($cat->id);
        $cat_type[$cat->id] = CategoryType::find_all_by_cat_id($cat->id);
        $cat_size[$cat->id] = CategorySize::find_all_by_cat_id($cat->id);
    }
}
//end

$product_cat = ProductCategory::find_by_id($photo->cat_id);
$product_size = CategorySize::find_by_id($photo->size_id);
$product_color = CategoryColor::find_by_id($photo->color_id);
$product_type = CategoryType::find_by_id($photo->type_id);


if (isset($_POST['submit'])) {
    $photo->attach_file($_FILES['image_1'], 1);
    $photo->attach_file($_FILES['image_2'], 2);
    $photo->attach_file($_FILES['image_3'], 3);
    $photo->attach_file($_FILES['image_4'], 4);
    $photo->title = trim($_POST['title']);
    $photo->i_code = trim($_POST['i_code']);
    $photo->cat_id = trim($_POST['cat_id']);
    $photo->size_id = trim($_POST['size_' . $photo->cat_id]);
    $photo->color_id = trim($_POST['color_' . $photo->cat_id]);
    $photo->price = trim($_POST['product_price']);
    $photo->type_id = trim($_POST['type_' . $photo->cat_id]);
    $photo->quan = trim($_POST['quan']);

    //$update_product = Photograph::save($photo->id,$photo->filename,$photo->type,$photo->size,$product_name,$pcategory,$psize,$pcolor,$pprize,$ptype);
    $update_product = $photo->save();
    //var_dump($update_product);

    if ($update_product) {
        //$new_comment->try_to_send_notification();
        $message = "sucess";
        redirect_to("edit_click.php?id={$photo->id}");
    } else {
        $message = "there is error updating product";
    }
} else {
    //$message="there is error updating product"; */
//}
?>


<?php
//include_layout_template('header.php');
//var_dump($_SERVER);
require_once('layouts/header1.php');
?>
<center><h1 class="main_toc">Edit Product</h1></center>
<?php require_once('layouts/header2.php'); ?>

<link rel="stylesheet" href="css/jquery-ui.css"></link>
<script src="javascripts/jquery-1.8.3.min.js" ></script>
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

<style>
    .large_img_container{
        float: left;
        width: 300px;
    }

    .small_img_container{
        float:left;
        width: 100px;
    }

    .no_img_div{
        border: 1px solid #000;
        width: 100px;
        height: 100px;
    }

    .border_right_none{
        border-right: none;
    }
</style>

<a href="edit_document.php">&laquo; Back</a><br/>
<br/>
<div style="margin-left: 20px;">
    <div style="height:225px">
        <div class="large_img_container">
            <img src="../<?php// echo $photo->image_path(); ?>" width="300"/>
        </div>

        <!--<div class="small_img_container">
            <?php if (!empty($photo->image_2)) {
                ?>
                <img src="../<?php echo $photo->image_path(2); ?>" width="100"/>
                <a href="delete_one_photo.php?id=<?php echo $photo->id;  ?>&photo=2">Delete</a>
            <?php } else {
                ?>
                <div class="no_img_div border_right_none"></div>
                <?php
            }
            ?>
        </div>


      <!--  <div class="small_img_container">
            <?php if (!empty($photo->image_3)) {
                ?>
                <img src="../<?php echo $photo->image_path(3); ?>" width="100"/>
                <a href="delete_one_photo.php?id=<?php echo $photo->id;  ?>&photo=3">Delete</a>
            <?php } else {
                ?>
                <div class="no_img_div border_right_none"></div> 
                <?php
            }
            ?>
        </div>


        <div class="small_img_container">
            <?php if (!empty($photo->image_4)) {
                ?>
                <img src="../<?php echo $photo->image_path(4); ?>" width="100"/>
                <a href="delete_one_photo.php?id=<?php echo $photo->id;  ?>&photo=4">Delete</a>
            <?php } else {
                ?>
                <div class="no_img_div"></div>   
                <?php
            }
            ?>
        </div> -->


    </div>
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
        <br>Hand Over To :<?php $photo->assing_to; ?>
        <br>Development Reviewed Date :<?php echo $photo->develop_r_date;?>
        <br>Documantation Complete/not :<?php echo $photo->document_complet;?>
        <br>Date Hand Over TO QA :<?php echo $photo->date_hand_qa;?>
        <br>QA Testing Competed ON :<?php echo $photo->qa_complete;?>
        <br>Date Hand Over To IT Ops :<?php echo $photo->date_back_it;?>
        <br>Release Date :<?php echo $photo->release_date;?>
        <br>Status :<?php echo $photo->status;?>
            
    </div>
</div>

<div id="admin_content">
    <form action="edit_click.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" /><!--
        <p class="title">Chose your Image : <input type="file" name="file_upload" /> </p> -->

        

        <p class="title">Core / NonCore :  <select name="core">
             <option value="Core">Core</option>
             <option value="NonCore">NonCore</option>
             
  
           </select> </p>
         <p class="title">CR/BRD/REPORT : <select name="crr">
             <option value="CR">CR</option>
             <option value="BRD">BRD</option>
             <option value="REPORT">REPORT</option>
  
           </select> </p>
         <p class="title">Referance :  <input type="text" name="i_code" value="<?php echo $photo->reference; ?>"/> </p>
         <p class="title">Requester :  <input type="text" name="i_code" value="<?php echo $photo->requester; ?>"/> </p>
         <p class="title">Unit :  <input type="text" name="i_code" value="<?php echo $photo->unit; ?>"/> </p>
         <p class="title">Contact Person :  <input type="text" name="i_code" value="<?php echo $photo->contact_p; ?>"/> </p>
         <p class="title">Date Submit : <input type="text" class="datepicker" /> </p>
         <p class="title">Description : <textarea><?php echo $photo->description;?></textarea> </p>
         <p class="title">Date Recived (IT): <input type="text" class="datepicker" value="<?php echo $photo->date_reciv_it;?>"/> </p>
         <p class="title">SMRC Reviewed Date : <input type="text" class="datepicker" value="<?php echo $photo->smrc_date;?>"/> </p>
         <p class="title">SMRC Status : <input type="text" name="i_code" value="<?php echo $photo->smrc_status;?>"/> </p>
         <p class="title">Prority :  <input type="text" name="i_code" value="<?php echo $photo->priority;?>"/> </p>
         <p class="title">Date Hand Over To Development : <input type="text" class="datepicker"  value="<?php echo $photo->date_develop;?>"/> </p>
          <p class="title">Date Hand Over To Temonors/FLS : <input type="text" class="datepicker" value="<?php echo $photo->date_temo;?>"/> </p>
           <p class="title">Remarks : <textarea ><?php echo $photo->remarks;?></textarea> </p>
            <p class="title">Development Reviewed Date :  <input type="text" name="i_code" value="<?php echo $photo->develop_r_date;?>"/> </p>
             <p class="title">Documantation Complete/not :  <input type="text" name="i_code" value="<?php echo $photo->document_complet;?>"/> </p>
              <p class="title">Date Hand Over TO QA : <input type="text" class="datepicker" value="<?php echo $photo->date_hand_qa;?>"/> </p>
               <p class="title">QA Testing Competed ON : <input type="text" class="datepicker" value="<?php echo $photo->qa_complete;?>"/> </p>
               <p class="title">Date Hand Over To IT Ops : <input type="text" class="datepicker" value="<?php echo $photo->date_back_it;?>"/> </p>
               <p class="title">Release Date : <input type="text" class="datepicker" value="<?php echo $photo->release_date;?>"/> </p>
               <p class="title">Status :  <input type="text" name="i_code" value="<?php echo $photo->status;?>"/> </p>
               
               
               
        
        
        
        
        
      
    <p class="title">
            Scan Document 1 : <input type="file" name="image_1" class="box" />
        </p>
        <p class="title">
            Scan Document 2 : <input type="file" name="image_2" class="box" />
        </p>
        <p class="title">
            Scan Document 3 : <input type="file" name="image_3" class="box" />
        </p>
        <p class="title">
            Scan Document 4 : <input type="file" name="image_4" class="box" />
        </p>

        <br/>
        <input type="submit" value="Edit" name="submit"><input type="reset" value="Cancel" name="cancel">
    </form>
</div>




<?php include_layout_template('footer.php'); ?>