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

//populate lists
/*$categories = ProductCategory::find_all();
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
//}  */
?>


<?php
//include_layout_template('header.php');
//var_dump($_SERVER);
require_once('layouts/header1.php');
?>
<center><h1 class="main_toc">Edit Product</h1></center>
<?php require_once('layouts/header2.php'); ?>

<link rel="stylesheet" href="css/jquery-ui.css"></link>
<script src="../javascripts/jquery-1.8.3.min.js" ></script>
<script src="javascrpits/jquery-ui.js" ></script>
<script>
    $(function() {
        showCategoryOptions();

        $("select[name=cat_id]").change(function() {
            showCategoryOptions();
        });
    });

    function showCategoryOptions() {
        var catId = $("select[name=cat_id]").val();
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
        <br>Development Reviewed Date :<?php echo $photo->develop_r_date;?>
        <br>Documantation Complete/not :<?php echo $photo->document_complet;?>
        <br>Date Hand Over TO QA :<?php echo $photo->date_hand_qa;?>
        <br>QA Testing Competed ON :<?php echo $photo->qa_complete;?>
        <br>Date Hand Over To IT Ops :<?php echo $photo->date_back_it;?>
        <br>Release Date :<?php echo $photo->release_date;?>
        <br>Status :<?php echo $photo->status;?>
            
    </div>
</div>






<?php include_layout_template('footer.php'); ?>