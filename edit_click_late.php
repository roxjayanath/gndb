<?php
require_once("includes/initialize.php");
if (!$session->is_logged_in()) {
   redirect_to("index.php"); 
} 
?>

<?php 
$photo = Product::find_by_id($_REQUEST['id']);
//$photo = Product::find_by_id();

$user = User::find_by_id($session->user_id);
$userss = User::find_by_id ($photo->edited_by);
if (!$photo) {
    $session->message("The product could not be located");
    redirect_to('edit_clicknew.php');
}
?>

<?php
$max_file_size = 1048576;

$tempmax=0;
$tempmaxid=0;


$categories = DEVCategory::find_all();

$fixCategories = FixCategory::find_all();

$devCategories = DEVCategory::find_all();




$coreNCore = array(
		0 => "-select-",
		"Core" => "Core",
		"NonCore" => "NonCore" 
);

$crBrdReport = array(
		0 => "-select-",
		"CR" => "CR",
		"BRD" => "BRD",
		"REPORT" => "REPORT"
);

$allUnits = array(
		0 => "-select-",
	"BC" => "Balance Confirmation Unit",
	"RETAIL" => "Retail Banking",
	"CARDS" => "Card Center",
	"CM" => "Cash Management",
	"CAU"=>"Credit Administration Unit",
	"REC"=>"Collections and Recoveries",
	"COM"=>"Compliance",
	"CPU"=>"Central Processing Unit",
	"CRU"=>"Central Reconcilation Unit",
	"FIN"=>"Finance Department",
	"TRADE"=>"Trade Finance",
	"LOAN"=>"Home Loans",
	"IB"=>"Islamic Banking",
	"IT"=>"Information Technology",
	"MRU"=>"MRU",
	"PF"=>"Project Finance",
	"REM"=>"Remittance",
	"SME"=>"SME",
	"TBO"=>"Treasury Back Office",
	"TREASURY"=>"Treasury",
	"NC"=>"Non Core"
	
	
);

$allref = array(
		0 => "-select-",
	"BC-R-" => "BC-R-",
	"C-" => "C-",
	"CARDS-" => "CARDS-",
	"CARDS-BRD-" => "CARDS-BRD-",
	"CARDS-R-" => "CARDS-R-",
	"CAU-" => "CAU-",
	"CAU-" => "CAU-",
	"CAU-BRD-" => "CAU-BRD-",
	"CAU-R-" => "CAU-R-",
	"CM" => "CM",
	"CM-BRD-" => "CM-BRD-",
	"CM-R-" => "CM-R-",
	"CPU-" => "CPU-",
	"CPU-R-" => "CPU-R-",
	"CPU-BRD-" => "CPU-BRD-",
	"CRISIL-" => "CRISIL-",
	"FIN-" => "FIN-",
	"FIN-R-" => "FIN-R-",
	"IB" => "IB",
	"IB-BRD-" => "IB-BRD-",
	"IB-R-" => "IB-R-",
	"INS-ALT-R-" => "INS-ALT-R-",
	"IT-" => "IT-",
	"PF-R-" => "PF-R-",
	"REM-" => "REM-",
	"RET-" => "RET-",
	"RET-BRD-" => "RET-BRD-",
	"RET-R-" => "RET-R-",
	"RISK-" => "RISK-",
	"RISK-R-" => "RISK-R-",
	"RISK-BRD-" => "RISK-BRD-",
	"SME-" => "SME-",
	"SME-R-" => "SME-R-",
	"SME-BRD-" => "SME-BRD-",
	"SUP-AIB-UPD-" => "SUP-AIB-UPD-",
	"TBO-" => "TBO-R-",
	"TBO-R-" => "TBO-R-",
	"TBO-FIN-R-" => "TBO-FIN-R-",
	"TO-" => "TO-",
	"TRADE-" => "TRADE-",
	"TRADE-BRD" => "TRADE-R",
	"CUSTOM" => "CUSTOM"
	
	
	);

$priorityArray = array(
	"Low" => "Low",
		"Medium" => "Medium",
		"High" => "High"
		
);


$stageArray = array(
	"STAGING" => "STAGING",
		"SP1" => "SP1",
		"SP2" => "SP2",
		"SP3" => "SP3",
		"SP4" => "SP4",
		"SP4" => "SP4"
		
);



$testcArray = array(
	"1" => "1",
		"2" => "3",
		"3" => "3",
		"4" => "4",
		"5" => "5",
		"6" => "6",
		"7" => "7",
		"8" => "8",
		"9" => "9",
		"10" => "10"
		
);



$teststatArray = array(
	"Pending" => "Pending",
		"Inprogress" => "Inprogress",
		"Rejected" => "Rejected",
		"Close" => "Close",
		"Hold" => "Hold"
		
);



$usernotArray = array(
	"YES" => "YES",
		"NO" => "NO"
		
);




$statusArray = array(
	"Pending" => "Pending",
		"Inprogress" => "Inprogress", 
		"Approval Pending" => "Approval Pending",
		"Development" => "Development",
		"Support Team Testing" => "Support Team Testing",
		"User Testing" => "User Testing",
		"QA Testing" => "QA Testing",
		"Rejected" => "Rejected",
		"Close" => "Close",
		"Hold" => "Hold",
		"Pending Temonos" => "Pending Temonos"
);

$qaStatus = array(
	"pending" => "Pending",
		"inprogress" => "Inprogress", 
		"rejected" => "Rejected",
		"close" => "Close",
		"hold" => "Hold"
);

$fixCategories = FixCategory::find_all();

$devCategories = DEVCategory::find_all();

$tempref2=1;

$product = new Product();
$product->errors['title']=" ";
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



$tempref=2;

//        echo $message;
//    }
    $user = User::find_by_id($session->user_id);
	
  
	
	$row =0;
	
	
	
	
	
	$conn= new MySQLDatabase();
	$database= new MySQLDatabase();
	
	
	
    
    $product = new Product();
    $product->attach_file($_FILES['pdf1'], 1);
    $product->attach_file($_FILES['pdf2'], 2);
    $product->attach_file($_FILES['pdf3'], 3);
    
    $product->d_id = $_POST['id'];
    //$product->cor_non= $_POST['core'];
   // $product->cr_brd= $_POST['crr'];
   if ($photo != null) {
		$product->cr_brd = $photo->cr_brd;
	}
	
	//$product->ref1= $_POST['unit'];
	//$product->ref2= $_POST['crr'];
        
        
        
        
//          $host="localhost";
//     $username="root";
//     $password="";
//     $db_name="ndb_b";
//    $con= mysqli_connect("$host","$username","$password")or die("cannot connect");
//     $con->select_db("$db_name")or die("cannot select DB");

//     $max="SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE unit= '".$product->ref1."' AND cr_brd= '".$product->ref2."'";
//     $maxquery= mysqli_query($con,$max) or die (died);
//    while($row = mysqli_fetch_assoc($maxquery)) {
//     echo "The max num is ". $row['maxnumber']."this is it";
//     $newnumber = $row['maxnumber'] + 1;
//     echo "NEW index number:". $newnumber;
//}
       
        
        
        
       // $product->ref3= $newnumber;
$product->ref3= $_POST['reference'];
        
        
        
        
   $time = strtotime($_POST['test_req']);
    $newformat = date('Y-m-d',$time);
	$product->testdate= $newformat;     
        
        
        
        
	
	
	$product->reffull=  $photo->reffull;;
	
	
	
	
    //$product->reference= $_POST['reference'];
    $product->requester= $_POST['requester'];
    //$product->unit= $_POST['unit'];
    
    
    
   // $product->contact_p= $_POST['contact_p'];
    $product->COST= $_POST['cost'];
	
    $product->date_sub= $_POST['date_req'];
    
    $product->description= $_POST['description'];
    $product->date_reciv_it= $_POST['date_reciv_it'];
	
	
	if(!empty($_POST['smrc_date'])){
	 $time1 = strtotime($_POST['smrc_date']);
    $newformat1 = date('Y-m-d',$time1);
    $product->smrc_date= $newformat1;
    }else{
	 $product->smrc_date="";
	}
	
    if(!empty($_POST['avp_it'])){
    $time2 = strtotime($_POST['avp_it']);
    $newformat2 = date('Y-m-d',$time2);
	$product->AVPIT= $newformat2;
	}else{
	 $product->AVPIT="";
	}
	
	
	if(!empty($_POST['vp_it'])){
	$time4 = strtotime($_POST['vp_it']);
    $newformat4 = date('Y-m-d',$time4);
    $product->VPIT= $newformat4;
	}else{
	 $product->VPIT="";
	}
	
	
	
	if(!empty($_POST['biss_date'])){
	$time3 = strtotime($_POST['biss_date']);
    $newformat3 = date('Y-m-d',$time3);
    $product->COST_DATE= $newformat3;
	}else{
	 $product->COST_DATE="";
	}
	
	if(!empty($_POST['cfo_date'])){
	$time5 = strtotime($_POST['cfo_date']);
    $newformat5= date('Y-m-d',$time5);
    $product->CFO_DATE= $newformat5;
	}else{
	 $product->CFO_DATE="";
	}
	
	if(!empty($_POST['brd_date'])){
	$time6 = strtotime($_POST['brd_date']);
    $newformat6= date('Y-m-d',$time6);
    $product->BRP= $newformat6;
	}else{
	 $product->BRP="";
	}
	
	
	if(!empty($_POST['date_develop'])){
	$time7 = strtotime($_POST['date_develop']);
    $newformat7= date('Y-m-d',$time7);
    $product->date_develop= $newformat7;
	}else{
	 $product->date_develop="";
	}
	
	
    $product->assing_to= $_POST['assing_to'];
    
    
	if(!empty($_POST['pack_date'])){
	$time8 = strtotime($_POST['pack_date']);
    $newformat8= date('Y-m-d',$time8);
    $product->PACK_DATE= $newformat8;
	}else{
	 $product->PACK_DATE="";
	}
	
	
     $product->DEV_TESTER= $_POST['dev_ass'];
      $product->TEST_ENV= $_POST['dev_en'];
	  $product->TEST_MEM=$_POST['test_mem'];
      $product->TEST_C_NO= $_POST['dev_cy'];
	  
	  
	  if(!empty($_POST['date_ret_date'])){
	  $time9 = strtotime($_POST['date_ret_date']);
    $newformat9= date('Y-m-d',$time9);
       $product->develop_r_date= $newformat9;
	   }else{
	 $product->develop_r_date="";
	}
	  
	  if(!empty($_POST['user_ass_date'])){
	  $time10 = strtotime($_POST['user_ass_date']);
    $newformat10= date('Y-m-d',$time10);
	  $product->USER_ASS= $newformat10;
	  }else{
	 $product->USER_ASS="";
	}
	  
      $product->ded_line= $_POST['ass_user'];
	  
	  if(!empty($_POST['test_com_date'])){
	  $time11 = strtotime($_POST['test_com_date']);
    $newformat11= date('Y-m-d',$time11);
      $product->TEST_COM_DATE= $newformat11;
	  }else{
	 $product->TEST_COM_DATE="";
	}
      

	  $product->TEST_STAT= $_POST['test_status'];
    
    
	if(!empty($_POST['date_hand_qa'])){
	$time12 = strtotime($_POST['date_hand_qa']);
    $newformat12= date('Y-m-d',$time12);
    $product->date_hand_qa= $newformat12;
	}else{
	 $product->date_hand_qa="";
	}
	
	
    $product->QA_REF_N= $_POST['qaref'];
    $product->QA_TEST_N= $_POST['qatestname'];
    $product->QA_STATUS= $_POST['qastatus'];
	
	if(!empty($_POST['qa_complete'])){
	$time13 = strtotime($_POST['qa_complete']);
    $newformat13= date('Y-m-d',$time13);
    $product->qa_complete= $newformat13;
	}else{
	 $product->qa_complete="";
	}
    
    
	if(!empty($_POST['or_r_date'])){
	$time14 = strtotime($_POST['or_r_date']);
    $newformat14= date('Y-m-d',$time14);
    $product->date_back_it= $newformat14;
	}else{
	 $product->date_back_it="";
	}
	
	
    $product->D_FIX_BY= $_POST['doc_fix'];
    $product->USER_Not= $_POST['user_noty'];
    $product->remarks= $_POST['remarks'];
    
    
    
    //$product->smrc_status= $_POST['smrc_status'];
    $product->priority= $_POST['priority'];
    
     
    // $product->date_temo= $_POST['date_temo'];
     
     
	
   
    //$product->document_complet= $_POST['document_complet'];
     
     
     
     
    
   // $product->release_date= $_POST['release_date'];
    $product->status= $_POST['status'];
	$product->edited_by= $session->user_id;
     
    
    
    
    
    //$product->title = $_POST['product_name'];
  //  $product->i_code = $_POST['i_code'];
  //  $product->cat_id = $_POST['category'];
  //  $product->size_id = isset($_POST['size_' . $product->cat_id]) ? $_POST['size_' . $product->cat_id] : 0;
   // $product->color_id = isset($_POST['color_' . $product->cat_id]) ? $_POST['color_' . $product->cat_id] : 0;
   // $product->type_id = isset($_POST['type_' . $product->cat_id]) ? $_POST['type_' . $product->cat_id] : 0;
  //  $product->price = $_POST['product_price'];
   // $product->quan = $_POST['quan'];
   $edithistory = new Edithistory();
	
	$edithistory->doc_id=$product->d_id;
	$edithistory->user_id= $session->user_id;
	$edithistory->ed_type="EDIT";
	$edithistory->ed_time=date("Y-m-d H:i:s ");
	$edithistory->create();
   

    if ($product->save()) {
        $session->message("Document {$product->reffull} Upload Successfully  by {$user->us_name}");
        echo $product->reference;
        redirect_to('edit_click_late.php?id=' . $product->d_id);
    } else {
       // $message = join("<br/>", $photo->errors);
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
<center>
	<h1 class="main_toc5">Edit Document</h1>
</center>
<?php 

 
 echo output_message($message); ?>
<center>
	<p style="color: rgb(252, 0, 0);"><?php echo !empty($product->errors['title']) ? $product->errors['title'] : "";?></p>
</center>
<?php require_once('layouts/header2.php'); ?>

<style>
.create_button {
	width: 100px;
}

/*    .error_msg{
        color: #FF0000; 
        float: left;
        clear: right;
    }*/
</style>
<link rel="stylesheet" href="css/jquery-ui.css"></link>
<script src="javascrpits/jquery-1.8.3.min.js"></script>
<script src="javascrpits/jquery-ui.js"></script>


<script type="text/javascript">
		// Popup window code
		function newPopup(url) {
			popupWindow = window.open(
				url,'popUpWindow','height=850,width=600,left=400,top=400,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
		</script>



<script>
    $(function() {
        showCategoryOptions();

        $("select[name=category]").change(function() {
            showCategoryOptions();
        });

        $(".datepicker").datepicker();

        coreChange();

        unitChange();

		$("select[name=core]").change(function(){
			coreChange();
		});

		$("select[name=unit]").change(function(){
			unitChange();
		});

		$("select[name=crr]").change(function(){
			if($("select[name=crr]").val() != 0) ajaxGetDocNumber();
		});	
		
		$("select[name=qastatus]").change(function(){
			$qaVal = $("select[name=qastatus]").val();
			if($qaVal == "rejected" || $qaVal == "close" || $qaVal == "hold"){
				$("select[name=status]").val($qaVal);
			} 
			else if($qaVal == "pending" || $qaVal == "inprogress"){
				$("select[name=status]").val("qa_t");
			}
		}); 	

// 		$("select[name=status]").change(function(){
// 			$("select[name=qastatus]").val("0");
// 		}); 
        //myFunction();

//         $(".tabbertab").click(function(){
//             alert("clicked");
// 			if($(this).parent() == $(".tabbertab:first")){
// 				$("#sub, #canc").hide();
// 			} else {
// 				$("#sub, #canc").show();
// 			}
//         });
    });

    function coreChange(){
    	if($("select[name=core]").val() == 0){
			$("#unit_sec").hide();
			$("#cr_brd_sec").hide();
		} else {
			$("#unit_sec").show();
			$("#cr_brd_sec").hide();
		}
    }

    function unitChange(){
    	if($("select[name=unit]").val() == 0){
			$("#cr_brd_sec").hide();
		} else {
			$("#cr_brd_sec").show();
		}
    }

    function ajaxGetDocNumber(){
        var ref1 = $("select[name=unit]").val();
       	var ref2 = $("select[name=crr]").val();
		$.post("ajax_get_doc_number.php", {'ref1' : ref1, 'ref2' : ref2}, function(result){
			//console.log(result);
			if(result){
				$("input[name=reference]").val(result.max_doc);
			}
			
		});
    }

    function showCategoryOptions() {
        var catId = $("select[name=category]").val();
        $("select[name^=size_], select[name^=color_], select[name^=type_]").hide();
        $("select[name=size_" + catId + "], select[name=color_" + catId + "], select[name=type_" + catId + "]").show();
    }
</script>





<!--     <script src="javascrpits/jquery-1.7.1.min.js" type="text/javascript"></script>  -->
<script src="javascrpits/jquery.hashchange.min.js"
	type="text/javascript"></script>
<script src="javascrpits/jquery.easytabs.min.js" type="text/javascript"></script>




<script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
	
	
	
	
	
	
	
  </script>

<script type="text/javascript">
  function valemty(){
	var x = document.forms["mine"]["contact_p"].value;
	
	var_dump("ok");
	if(x==null || x==""){
	alert("Comtact person must be fill out");
	retun false;
	
	}
	}
</script>



<style>
/* Example Styles for Demo */
.etabs {
	margin: 0;
	padding: 0;
}

.tab {
	display: inline-block;
	zoom: 1;
	*display: inline;
	background: #eee;
	border: solid 1px #999;
	border-bottom: none;
	-moz-border-radius: 4px 4px 0 0;
	-webkit-border-radius: 4px 4px 0 0;
}

.tab a {
	font-size: 14px;
	line-height: 2em;
	display: block;
	padding: 0 10px;
	outline: none;
}

.tab a:hover {
	text-decoration: underline;
}

.tab.active {
	background: #fff;
	padding-top: 6px;
	position: relative;
	top: 1px;
	border-color: #666;
}

.tab a.active {
	font-weight: bold;
}

.tab-container .panel-container {
	background: #fff;
	border: solid #666 1px;
	padding: 10px;
	-moz-border-radius: 0 4px 4px 4px;
	-webkit-border-radius: 0 4px 4px 4px;
}

.panel-container {
	margin-bottom: 10px;
}
</style>



<?php $doc_id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : "0"; ?>



<div id="admin_content" style="font-style: normal;">
	<!--<center><h3>Add Product</h3></center>-->
	<form name="mine" action="edit_click_late.php?id=<?php echo $doc_id ?>"
		enctype="multipart/form-data" method="post"
		onsubmit="return valemty()">






		<input type="hidden" name="id" value="<?php echo $doc_id  ?>" />



















		<div id="tab-container" class='tab-container'>
			<ul class='etabs'>

				<li class='tab'><a href="#tabs1-html">Details</a></li>
				<li class='tab'><a href="#tabs1-jss">Approvals</a></li>

				<li class='tab'><a href="#tabs1-csss">System Suport Testing &
						Developing</a></li>
				<li class='tab'><a href="#tabs1-js">QA Testing</a></li>
				<li class='tab'><a href="#tabs1-css">Document Closer</a></li>



				<!--  <li class='tab'><a href="#tabs1-htmll">Details</a></li>
   <li class='tab'><a href="#tabs1-html">Approvals</a></li>
   <li class='tab'><a href="#tabs1-js">Development</a></li>
   <li class='tab'><a href="#tabs1-css">System Suport Testing</a></li>
   <li class='tab'><a href="#tabs1-css1">QA Testing</a></li>
   <li class='tab'><a href="#tabs1-css2">Document Closer</a></li> -->


			</ul>
			<div class='panel-container'>



				<div id="tabs1-csss">



					<code>
						<p>
						
						
						<p class="detailll">
							PACK Received Date : <input type="text" class="datepicker"
								name="pack_date" style="margin-left: 160px;"
								value="<?php //echo $photo->PACK_DATE; 
								if(!empty($photo->PACK_DATE)){
									$time= strtotime($photo->PACK_DATE);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
								

								?>" />
						</p>
						<!--<p class="detailll">Developer Testing Assinged To :  <select name="dev_ass" class="detailindate9" value="<?php echo $photo->DEV_TESTER; ?>">
             <option value="Name1">Name1</option>
             <option value="Name2">Name2</option>
              <option value="Name3">name 3</option>
               <option value="Name4">name4</option>
                <option value="Name5">name5</option>
           </select></p> -->








						<p style="font-size: 16px;">
























							Developer Testing Assinged To :<select name="dev_ass"
								class="detailindate9"> $devCategories = DEVCategory::find_all();

								<option value="0">-select-</option>
 	<?php foreach ($devCategories as $value){
							$selected = ($photo->DEV_TESTER == $value->dev_id) ? "selected" : "";
							?>
							<option value="<?php echo $value->dev_id ?>"
									<?php echo $selected ?>><?php echo $value->dev_name; ?></option>
							<?php
						} ?>
 	
           </select>
						</p>










						<p class="detailll">
							Testing Enviroriment : <select name="dev_en"
								class="detailindate99" value="<?php echo $photo->TEST_ENV; ?>">
								<option value="0">-select-</option>
			  <?php foreach ($stageArray as $key => $TEST_ENV){
             	$selected = $key == $photo->TEST_ENV ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $TEST_ENV ?></option>
             	<?php
             } ?>
             
  
           </select>
						</p>
						
						
						
						<p class="detailll">
							Assigned Test Team Member : <select name="test_mem"
								class="detailindate97" style="
    margin-left: 87px;
">
								<!--              <option value="Name1">Name1</option> -->
								<!--              <option value="Name2">Name2</option> -->
								<!--               <option value="Name3">name 3</option> -->
								<!--                <option value="Name4">name4</option> -->
								<!--                 <option value="Name5">name5</option> -->
								<option value="0">-select-</option>
 	<?php foreach ($fixCategories as $value){
							$selected = ($photo->TEST_MEM == $value->qa_id) ? "selected" : "";
							?>
							<option value="<?php echo $value->qa_id ?>"
									<?php echo $selected ?>><?php echo $value->qa_name; ?></option>
							<?php
						} ?>
 	
           </select>
						</p>
						
						
						
						
						
						
						
						
						
						
						
		
						
						
						
						
						
						
						
						
						
						
						

						<p class="detailll">
							Testing Cycle No: <select name="dev_cy" class="detailindate999"
								value="<?php echo $photo->TEST_C_NO; ?>">
								<option value="0">-select-</option>
			 <?php foreach ($testcArray as $key => $TEST_C_NO){
             	$selected = $key == $photo->TEST_C_NO ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $TEST_C_NO ?></option>
             	<?php
             } ?>
           </select>
						</p>





						<p class="detailll">
							Date Return To Developer : <input type="text" class="datepicker"
								name="date_ret_date" style="margin-left: 100px;"
								value="<?php //echo $photo->develop_r_date; 
								if(!empty($photo->develop_r_date)){
									$time= strtotime($photo->develop_r_date);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}		
								
							
								?>" />
						</p>
						<p class="detailll">
							Assign User : <input type="text" name="ass_user"
								class="detailindate10" value="<?php echo $photo->ded_line; ?>" />
						</p>
						<p class="detailll">
							User Assign Date : <input type="text" class="datepicker"
								name="user_ass_date" style="margin-left: 180px;"
								value="<?php //echo $photo->USER_ASS; 
								if(!empty($photo->USER_ASS)){
									$time= strtotime($photo->USER_ASS);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
								
								
								?>" />
						</p>
						<p class="detailll">
							Tested Completed Date : <input type="text" class="datepicker"
								name="test_com_date" style="margin-left: 130px;"
								value="<?php //echo $photo->TEST_COM_DATE; 
								
								if(!empty($photo->TEST_COM_DATE)){
									$time= strtotime($photo->TEST_COM_DATE);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}		
								
								
								?>" />
						</p>


						<p class="detailll">
							Testing Status : <select name="test_status"
								class="detailindate9999"
								value="<?php echo $photo->TEST_STAT; ?>">
								<option value="0">-select-</option>            
			<?php foreach ($teststatArray as $key => $TEST_STAT){
             	$selected = $key == $photo->TEST_STAT ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $TEST_STAT ?></option>
             	<?php
             } ?>
           </select>
						</p>





						</p>
					</code>


				</div>





				<div id="tabs1-jss">



					<code>
						<p>
						
						
						<p style="font-family: serif; font-size: 24px;">Document submit
							for Review/Approval</p>

						<p class="detailll">
							Development Review Date : <input type="text" class="datepicker"
								name="smrc_date" style="margin-left: 120px;"
								value="<?php //echo $photo->smrc_date;
                                    if(!empty($photo->smrc_date)){
									//$newformat222="";
									$time222= strtotime($photo->smrc_date);
                                    $newformat222 = date('m/d/Y',$time222);
                                    echo $newformat222;
									
									}else{
									}								
								
								?>" />
						</p>
						<p class="detailll">
							AVP-IT Approval Date : <input type="text" class="datepicker"
								name="avp_it" style="margin-left: 150px;"
								value="<?php //echo $photo->AVPIT; 
								if(!empty($photo->AVPIT)){
									$time= strtotime($photo->AVPIT);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
								                
								
								?>" />
						</p>
						<p class="detailll">
							VP-IT Approval Date : <input type="text" class="datepicker"
								name="biss_date" style="margin-left: 160px;"
								value="<?php //echo $photo->VPIT; 
								
								if(!empty($photo->VPIT)){
									$time= strtotime($photo->VPIT);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
								
								?>" />
						</p>
						<p class="detailll">
							Bussiness Line Cost Approval Date : <input type="text"
								class="datepicker" name="vp_it" style="margin-left: 20px;"
								value="<?php //echo $photo->COST_DATE; 
								if(!empty($photo->COST_DATE)){
									$time= strtotime($photo->COST_DATE);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
	
								?>" />
						</p>
						<p class="detailll">
							CFO Approval Date : <input type="text" class="datepicker"
								name="cfo_date" style="margin-left: 180px;"
								value="<?php //echo $photo->CFO_DATE;
								if(!empty($photo->CFO_DATE)){
									$time= strtotime($photo->CFO_DATE);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			


								?>" />
						</p>
						<p class="detailll">
							BRP Approval Date : <input type="text" class="datepicker"
								name="brd_date" style="margin-left: 180px;"
								value="<?php //echo $photo->BRP; 
								if(!empty($photo->BRP)){
									$time= strtotime($photo->BRP);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}		
								
								?>" />
						</p>
						<p class="detailll">
							Date Hand Over To Development : <input type="text"
								class="datepicker" name="date_develop"
								value="<?php //echo $photo->date_develop; 
								if(!empty($photo->date_develop)){
									$time= strtotime($photo->date_develop);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}		
	
								?>"
								style="margin-left: 60px;" />
						</p>
						<p class="detailll">Document held with previosly : <?php echo $photo->assing_to; ?></p>
						<p class="detailll">
							Document Hand over to : <input type="text" name="assing_to"
								class="detailindate100" value="<?php echo $photo->assing_to; ?>" />
						</p>






						</p>
					</code>


				</div>






















				<div id="tabs1-html">



					<code>
                         <p>

						<p style="font-family: serif; font-size: 24px;">Details of the
							Document</p>
							
							
							<div class="detailll">
			                      <div style="float: left;width:270px">Reference : </div>
			                      <div style="margin-left: 270px"><?php echo $photo->reffull;?></div>
		                    </div>


						<!--<p class="detailll">Reference : <?php// echo $photo->reffull; ?> -->
		   
		  
				<input hidden="hidden" type="text" name="reference"
								class="detailindate4" style="margin-left: 150px;" />



						</p>
						<p class="detailll">
							Requester :<input type="text" name="requester"
								class="detailindate4" value="<?php echo $photo->requester; ?>" />
						</p>

						<p class="detailll">
							Request Date :<input type="text" class="datepicker"
								name="date_req" style="margin-left: 130px;"
								value="<?php echo $photo->date_sub; ?>" />
						</p>
						
						
						

						<!--<p class="detailll"> Unit : <input type="text" name="unit"  class="detailindate5"/></p> 
						<p class="detailll">Test Date :<input type="text" class="datepicker"name="test_req" style="margin-left: 130px;" value="<?php echo $photo->testdate; ?>"/></p> 
                         -->
						 <div class="detailll">
			<div style="float: left;width:138px">Description : </div>
			<div style="margin-left: 138px"><textarea name="description" class="detailindate7" id="editor1" rows="3" cols="40"><?php echo $photo->description; ?></textarea></div>
	
		<script>
		CKEDITOR.replace('editor1');
		</script>
		</div>
						 
						 
						
<p class="detailll">Date Recived (IT): <input type="text" class="datepicker"name="test_req" style="margin-left: 80px;" value="
<?php $time= strtotime($photo->testdate);
      $newformat = date('m/d/Y',$time);
      echo $newformat;
 ?>"/></p> 



                         

						<!--<p class="detailll">
							Date Recived (IT): <input type="text" class="datepicker"
								name="date_reciv_it" style="margin-left: 80px;"
								value="<?php //echo $photo->date_reciv_it; ?>" />
						</p> -->


						<p class="detailll">
							Priority : <select name="priority" class="detailindate11"
								value="<?php echo $photo->priority; ?>">
								<!--                                <option value="Low">Low</option>  -->
								<!--                                <option value="NonCore">Medium</option>  -->
								<!-- 							    <option value="NonCore">High</option>  -->
             <?php foreach ($priorityArray as $key => $priority){
             	$selected = $key == $photo->priority ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $priority ?></option>
             	<?php
             } ?>
             
  
           </select>
						</p>
						
						  
						  
						  
						  <div class="detailll">
			<div style="float: left;width:100px">Remarks : </div>
			<div style="margin-left: 100px"><textarea name="remarks" class="detailindate101" id="editor1" rows="3" cols="40"><?php echo $photo->remarks; ?></textarea></div>
	
		<script>
		CKEDITOR.replace('editor1');
		</script>
		</div>



						

						<p class="detailll">
							Status : <select name="status" class="detailindate94">
             <?php foreach ($statusArray as $key => $status){
             	$selected = $key == $photo->status ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $status ?></option>
             	<?php
             } ?>
           </select>
						</p>
						
						
						<p class="detailll">
							Cost ($):<input type="text" name="cost"
								class="detailindate4" value="<?php echo $photo->COST; ?>"  style="
    /* padding-left: inherit; */
    margin-left: 180px;
"/>
						</p>
						
						<div class="detailll">
			<div style="float: left;width:270px">Last Activity By : </div>
			<div style="margin-left: 270px"><?php echo $userss->us_name;?> @ <?php echo $photo->update_on;?></div>
		</div>
        
		<br>
<div class="detailll">
						<br>Scan Document 1 : <a
							href="JavaScript:newPopup('<?php echo $photo->image_path(); ?>');"><?php echo $photo->scan_doc1; ?></a>
						<br>Scan Document 2 : <a
							href="JavaScript:newPopup('<?php echo $photo->image_path(2); ?>');"><?php echo $photo->scan_doc2; ?></a>
						<br>Scan Document 3 : <a
							href="JavaScript:newPopup('<?php echo $photo->image_path(3); ?>');"><?php echo $photo->scan_doc3; ?></a>

						<p class="detailll">
							Scan Document 1 : <input type="file" class="box" name="pdf1" />
						</p>
						<p class="detailll">
							Scan Document 2 : <input type="file" class="box" name="pdf2" />
						</p>
						<p class="detailll">
							Scan Document 3 : <input type="file" class="box" name="pdf3" />
						</p>


</div>











</p>
						
					</code>


				</div>



















				<div id="tabs1-js">


					<code>

						<p>
						
						
						<p class="detailll">
							QA Assign Date : <input type="text" class="datepicker"
								name="date_hand_qa" style="margin-left: 80px;"
								value="<?php //echo $photo->date_hand_qa; 
								
								if(!empty($photo->date_hand_qa)){
									$time= strtotime($photo->date_hand_qa);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}		
								
								
								?>" />
						</p>
						<p class="detailll">
							QA Reference Number : <input type="text" name="qaref"
								class="detailindate1000" value="<?php echo $photo->QA_REF_N; ?>" />
						</p>
						<p class="detailll">
							QA Tester Name : <input type="text" name="qatestname"
								class="detailindate1001"
								value="<?php echo $photo->QA_TEST_N; ?>" />
						</p>
						<p class="detailll">
							QA Status : <select name="qastatus" class="detailindate98">
								<option value="0">-select-</option>
             <?php foreach ($qaStatus as $key => $qa){
             	$selected = $key == $photo->QA_STATUS ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $qa ?></option>
             	<?php
             } ?>
<!--              <option value="inprogress">Inprogress</option> -->
								<!--               <option value="rejected">Rejected</option> -->
								<!--                <option value="close">Close</option> -->
								<!--                 <option value="hold">Hold</option> -->
							</select>
						</p>

						<p class="detailll">
							Live Transfer Date : <input type="text" class="datepicker"
								name="qa_complete" style="margin-left: 40px;"
								value="<?php //echo $photo->qa_complete; 
								
								if(!empty($photo->qa_complete)){
									$time= strtotime($photo->qa_complete);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
								
								
								?>" />
						</p>




						</p>
					</code>

				</div>



				<div id="tabs1-css">


					<code>

						<p>
						
						
						<p class="detailll">
							Original Document Recived Date : <input type="text"
								class="datepicker" name="or_r_date" style="margin-left: 45px;"
								value="<?php //echo $photo->date_back_it; 
								
								if(!empty($photo->date_back_it)){
									$time= strtotime($photo->date_back_it);
                                    $newformat= date('m/d/Y',$time);
                                    echo $newformat;
									
									}else{
									}			
								?>" />
						</p>
						<p class="detailll">
							Documentation File By : <select name="doc_fix"
								class="detailindate97">
								<!--              <option value="Name1">Name1</option> -->
								<!--              <option value="Name2">Name2</option> -->
								<!--               <option value="Name3">name 3</option> -->
								<!--                <option value="Name4">name4</option> -->
								<!--                 <option value="Name5">name5</option> -->
								<option value="0">-select-</option>
 	<?php foreach ($fixCategories as $value){
							$selected = ($photo->D_FIX_BY == $value->qa_id) ? "selected" : "";
							?>
							<option value="<?php echo $value->qa_id ?>"
									<?php echo $selected ?>><?php echo $value->qa_name; ?></option>
							<?php
						} ?>
 	
           </select>
						</p>

						<p class="detailll">
							Send User Notification : <select name="user_noty"
								class="detailindate96" value="<?php echo $photo->USER_Not; ?>">
								<option value="0">-select-</option>
			  <?php foreach ($usernotArray as $key => $USER_Not){
             	$selected = $key == $photo->USER_Not ? "selected" : "";
             	?>
             	<option value="<?php echo $key; ?>"
									<?php echo $selected ?>><?php echo $USER_Not ?></option>
             	<?php
             } ?>
              
           </select>
						</p>









						</p>
					</code>

				</div>




















			</div>
		</div>

</div>
</div>





























































































<br />
<center>
	<p class="line">
	
	
	<p class="detail2">
	
	
	<p>
		<input type="submit" value="Update" name="submit"
			class="create_button">
	</p>
	<p>
		<input type="reset" value="Cancel" name="cancel" class="create_button">
	</p>
	</p>
	</p>
</center>

</form>
</div>

</div>

</body>
</html>
