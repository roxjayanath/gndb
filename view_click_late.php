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


if (empty($_GET['id'])) {
    $session->message("No product ID was provided");
}

$photo = Product::find_by_id($_REQUEST['id']);

if (!$photo) {
    $session->message("The product could not be located");
    redirect_to('edit_product.php');
}


$userss = User::find_by_id ($photo->edited_by);


if(!empty($photo->TEST_MEM))
{

$assing_user = FixCategory::find_by_id ($photo->TEST_MEM);
$displayus=$assing_user->qa_name;
}
else{
//$assing_user = FixCategory::find_by_id ('2');
$displayus='';
}


$max_file_size = 1048576;

$tempmax=0;
$tempmaxid=0;

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
	"BC" => "BC",
	"Branch Banking" => "Branch Banking",
	"Cards" => "Cards",
	"Cash Management" => "Cash Management",
	"CAU"=>"CAU",
	"CM"=>"CM",
	"Collections and REcoveries"=>"Collections and Recoveries",
	"Compliance"=>"Compliance",
	"CPU"=>"CPU",
	"CM"=>"CM",
	"Collections and Recoveries"=>"Collections and Recoveries",
	"Complaince"=>"Compliance",
	"CPU"=>"CPU",
	"CPU,FINANCE,SME,RISK,CRU"=>"CPU,FINANCE,SME,RISK,CRU",
	"CRU"=>"CRU",
	"FIN"=>"FIN",
	"Finance"=>"Finance",
	"Finance/Trade"=>"Finance/Trade",
	"FIN-CRU"=>"FIN-CRU",
	"Home Loans"=>"Home Loans",
	"IB"=>"IB",
	"ISLAMIC BANKING"=>"ISLAMIC BANKING",
	"IT"=>"IT",
	"MRU"=>"MRU",
	"Project Finance"=>"Project Finance",
	"Recoveries"=>"Recoveries",
	"Remittance"=>"Remittance",
	"Retail"=>"Retail",
	"SME"=>"SME",
	"TBO"=>"TBO",
	"TO"=>"TO",
	"Trade"=>"Trade",
	"Treasury"=>"Treasury"
	
	
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
$tempref2=1;


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
    
    
    $product->cor_non= $_POST['core'];
    $product->cr_brd= $_POST['crr'];
	
	$product->ref1= $_POST['unit'];
	$product->ref2= $_POST['crr'];
        
        
        
        
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
        
        
        
        
        
        
        
        
        
	
	
	$product->reffull=  $product->ref1 ."-". $product->ref2."-".$product->ref3;
	
	
	
	
    //$product->reference= $_POST['reference'];
    $product->requester= $_POST['requester'];
    $product->unit= $_POST['unit'];
    
    
    
    $product->contact_p= $_POST['contact_p'];
    
    $product->date_sub= $_POST['date_req'];
    
    $product->description= $_POST['description'];
    $product->date_reciv_it= $_POST['date_reciv_it'];
    $product->smrc_date= $_POST['smrc_date'];
    
    
    $product->AVPIT= $_POST['avp_it'];
    $product->VPIT= $_POST['vp_it'];
    $product->COST_DATE= $_POST['biss_date'];
    $product->CFO_DATE= $_POST['cfo_date'];
    $product->BRP= $_POST['brd_date'];
    $product->date_develop= $_POST['date_develop'];
    $product->assing_to= $_POST['assing_to'];
    
    
    $product->PACK_DATE= $_POST['pack_date'];
     $product->DEV_TESTER= $_POST['dev_ass'];
      $product->TEST_ENV= $_POST['dev_en'];
	  $product->TEST_MEM= $_POST['test_mem'];
      $product->TEST_C_NO= $_POST['dev_cy'];
      $product->develop_r_date= $_POST['date_ret_date'];
	  $product->USER_ASS= $_POST['user_ass_date'];
      $product->ded_line= $_POST['ass_user'];
      $product->TEST_COM_DATE= $_POST['test_com_date'];
       $product->TEST_STAT= $_POST['test_status'];
    
    
    $product->date_hand_qa= $_POST['date_hand_qa'];
    $product->QA_REF_N= $_POST['qaref'];
    $product->QA_TEST_N= $_POST['qatestname'];
    $product->QA_STATUS= $_POST['qastatus'];
    $product->qa_complete= $_POST['qa_complete'];
    
    
    $product->date_back_it= $_POST['or_r_date'];
    $product->D_FIX_BY= $_POST['doc_fix'];
    $product->USER_Not= $_POST['user_noty'];
    $product->remarks= $_POST['remark'];
    
    
    
    $product->smrc_status= $_POST['smrc_status'];
    $product->priority= $_POST['priority'];
    
     
     $product->date_temo= $_POST['date_temo'];
     
     
	
   
    $product->document_complet= $_POST['document_complet'];
     
     
     
     
    
    $product->release_date= $_POST['release_date'];
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

    if ($product->save()) {
        $session->message("Document {$product->reffull} Upload Successfully  by {$user->us_name}");
        echo $product->reference;
        redirect_to('admin_page.php');
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
<center><h1 class="main_toc5">View Document</h1></center>
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
  <script src="javascrpits/jquery.hashchange.min.js" type="text/javascript"></script>
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
    .etabs { margin: 0; padding: 0; }
    .tab { display: inline-block; zoom:1; *display:inline; background: #eee; border: solid 1px #999; border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; }
    .tab a { font-size: 14px; line-height: 2em; display: block; padding: 0 10px; outline: none; }
    .tab a:hover { text-decoration: underline; }
    .tab.active { background: #fff; padding-top: 6px; position: relative; top: 1px; border-color: #666; }
    .tab a.active { font-weight: bold; }
    .tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; }
    .panel-container { margin-bottom: 10px; }
  </style>





<div id="admin_content" style="font-style: normal;">
    <!--<center><h3>Add Product</h3></center>-->
    <form name="mine" action="edit_click_late.php" enctype="multipart/form-data" method="post" onsubmit="return valemty()" >
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div id="tab-container" class='tab-container'>
 <ul class='etabs'>

 <li class='tab'><a href="#tabs1-html">Details</a></li>
 <li class='tab'><a href="#tabs1-jss">Approvals</a></li>
 
   <li class='tab'><a href="#tabs1-csss">System Suport Testing & Developing</a></li>
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
            
            
        <p class="detailll">PACK Received   Date : <?php echo $photo->PACK_DATE;?></p>
		<p class="detailll">Developer Testing Assinged To :  <?php echo $photo->DEV_TESTER;?></p>
		   
		   <p class="detailll">Testing Enviroriment  :  <?php echo $photo->TEST_ENV;?></p>
		   <p class="detailll">Assigned Test Team Member : <?php echo $displayus;?></p>
		   
		   <p class="detailll">Testing Cycle No: <?php echo $photo->TEST_C_NO;?></p>
		
				<p class="detailll">Date Return To Developer :  <?php echo $photo->develop_r_date;?></p>
				<p class="detailll">Assign User : <?php echo $photo->USER_ASS;?></p>
				
				
				
				
				<p class="detailll">User Assign Date : <?php echo $photo->ded_line;?></p>
				
				
				
				
				
				
				<p class="detailll">Tested Completed Date :  <?php echo $photo->TEST_COM_DATE;?></p>
				
				
				<p class="detailll">Testing Status :  <?php echo $photo->TEST_STAT;?></p>
				
      
            
            
            
          </p>
    </code>
  

  </div>
 
 
 
 
 
 <div id="tabs1-jss">
   

   
    <code>
<p>
            <p style="
    font-family: serif;
    font-size: 30px;
">Document submit for Review/Approval </p>
            
        <p class="detailll">Development Review Date : <?php echo $photo->smrc_date;?></p>
		<p class="detailll">AVP-IT Approval Date : <?php echo $photo->AVPIT;?></p>
		<p class="detailll">VP-IT Approval Date : <?php echo $photo->VPIT;?></p>
		<p class="detailll">Bussiness Line Cost Approval Date : <?php echo $photo->COST_DATE;?></p>
        <p class="detailll">CFO Approval Date : <?php echo $photo->CFO_DATE;?></p>
		<p class="detailll">BRP Approval Date : <?php echo $photo->BRP;?></p>
		<p class="detailll">Date Hand Over To Development :<?php echo $photo->date_develop;?></p>
		<!--<p class="detailll">Document held with previosly : <?php //echo?></p> -->
		<p class="detailll">Document Hand over to : <?php echo $photo->assing_to;?></p>
		
		
		
		
		
            
          </p>
    </code>
  

  </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  <div id="tabs1-html">
   

  
    <code>
 

<p style="
    font-family: serif;
    font-size: 30px;
">Details of the Document </p>

          
         <!--<p class="detailll" >Reference : 
		   
		  
				<?php// echo $photo->reffull;?>
		     
		   
		   
		   </p>  -->
		   
		   <div class="detailll">
			<div style="float: left;width:135px">Reference : </div>
			<div style="margin-left: 200px"><?php echo $photo->reffull;?></div>
		</div>
		   
		   
		   <br>
		   
       <!-- <p class="detailll" >Requester :<?php// echo $photo->requester;?></p> -->
		
		<div class="detailll">
			<div style="float: left;width:135px">Requester : </div>
			<div style="margin-left: 198px"><?php echo $photo->requester;?></div>
		</div>
		<br>
		<!--<p class="detailll">Request Date :<?php //echo $photo->date_sub;?></p>  -->
		
		<div class="detailll">
			<div style="float: left;width:145px">Request Date : </div>
			<div style="margin-left: 196px"><?php echo $photo->date_sub;?></div>
		</div>
		
		
        <!--<p class="detailll"> Unit : <input type="text" name="unit"  class="detailindate5"/></p> -->
		
		<!-- <p class="detailll">Description : <?php //echo $photo->description;?></p> -->
		<div class="multiline">
			<div style="float: left;width:130px">Description : </div>
			<div style="margin-left: 197px; margin-top: -34px;"><?php echo $photo->description;?></div>
		</div>
		
		
		<!--<p class="detailll">Date Recived (IT): <?php// echo $photo->date_reciv_it;?></p> -->
		
		<div class="detailll">
			<div style="float: left;width:184px">Date Recived (IT): </div>
			<div style="margin-left: 194px;  "><?php $time= strtotime($photo->testdate);
      $newformat = date('m/d/Y',$time);
      echo $newformat;?></div>
		</div>
		
		<br>
		<!--<p class="detailll">Priority : <?php echo $photo->priority;?></p> -->
		   <div class="detailll">
			<div style="float: left;width:135px">Priority : </div>
			<div style="margin-left: 196px"><?php echo $photo->priority;?></div>
		</div>
		  
		
		<!--<p class="detailll">Remarks : <?php// echo $photo->remarks;?></p> -->
		<div class="multiline">
			<div style="float: left;width:130px">Remarks : </div>
			<div style="margin-left: 194px; margin-top: -34px;"><?php echo $photo->remarks;?></div>
		</div>
		
		
		
		
		
		<!--<p class="detailll">Status :  <?php //echo $photo->status;?></p> -->
		
		 <div class="detailll">
			<div style="float: left;width:135px">Status : </div>
			<div style="margin-left: 194px"><?php echo $photo->status;?></div>
		</div>
        
		<br>
		<div class="detailll">
			<div style="float: left;width:135px">Cost ($): </div>
			<div style="margin-left: 180px"><?php echo $photo->COST;?></div>
		</div>
        
		<br>
		<br>
		
		<div class="detailll">
			<div style="float: left;width:195px">Last Activity By : </div>
			<div style="margin-left: 200px"><?php echo $userss->us_name;?> @ <?php echo $photo->update_on;?></div>
		</div>
        
		<br>
		
		
		  <br>Scan document 1 : <a href="JavaScript:newPopup('<?php echo $photo->image_path(); ?>');" ><?php echo $photo->scan_doc1; ?></a>
		  <br>Scan document 2 : <a href="JavaScript:newPopup('<?php echo $photo->image_path(2); ?>');" ><?php echo $photo->scan_doc2; ?></a>
		  <br>Scan document 3 : <a href="JavaScript:newPopup('<?php echo $photo->image_path(3); ?>');" ><?php echo $photo->scan_doc3; ?></a>
        <!-- <br>Scan document 2 : <?php //echo $photo->scan_doc2; ?>
        <br>Scan document 3 : <?php //echo $photo->scan_doc3; ?>  -->
		

		
		
		
		
		
		
		
		
		
        
        
          
          
          </p>
    </code>
    
  
  </div>
  
  
  
  
  
  
  
  
  
  
  
   
   
   
   
   
   
   
   
  <div id="tabs1-js">


  <code>
    
<p>
            
             <p class="detailll">QA Assign Date :<?php echo $photo->date_hand_qa;?></p>
			  <p class="detailll">QA Reference Number : <?php echo $photo->QA_REF_N;?></p>
			  <p class="detailll">QA Tester Name : <?php echo $photo->QA_TEST_N;?></p>
			  <p class="detailll">QA Status :  <?php echo $photo->QA_STATUS;?></p>
			 
        <p class="detailll">Live Transfer Date : <?php echo $photo->qa_complete;?></p>
        
        
            
            
          </p>  
  </code>

  </div>
  
  
  
  <div id="tabs1-css">


  <code>
    
<p>
            
             <p class="detailll">Original Document Recived Date : <?php echo $photo->date_back_it;?></p>
 <p class="detailll">Documentation Fix By :<?php echo $photo->D_FIX_BY;?></p>	

<p class="detailll">Sender User Notification : <?php echo $photo->USER_Not;?></p>	




			 
        
        
            
            
          </p>  
  </code>

  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 </div>
</div>




 </div>
</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       
       
       
        
        
       
        
        
       
        
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <br/>
        <center>
            <!--<p class="line">
            <p class="detail2">
            <p >
                <input type="submit" value="Add" name="submit" class="create_button">
            </p>
            <p >
                <input type="reset" value="Cancel" name="cancel" class="create_button">
            </p>
            </p></p> -->
        </center>

    </form>
</div>

</div>

</body>
</html>
