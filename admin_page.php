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

$tempmax=0;
$tempmaxid=0;

$allUnits = array(
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
	
	$maxnum = Product::find_by_sql2( );
	
	echo $maxnum;
	echo var_dump($maxnum);
	
	//echo $maxnum;
	echo $product->ref1;
	echo $product->ref1 ;
	
	//$sql22 = "SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE  unit= '".$product->ref1 ."' AND cr_brd= '". $product->ref2 ."' " ;
	
	
	
	
	//$maxquery = mysqli_query($conn->connection,$sql22);
	//$row=mysqli_fetch_array($conn->connection,$maxquery);
	//$tempmaxid= $row[0];
	//while($row=mysqli_fetch_array($conn->connection,$sql22)){
	
	//$tempmax =$row['maxnumber'];
	//echo " value".$row['maxnumber'];
	//}
	
	//$photoCount = Product::find_by_sql2 ( $sql22 );
	
	   // global $database;
        //$sql3 = "SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE  unit= '".$product->ref1 ."' AND cr_brd= '". $product->ref2 ."' ";
       // $sql3 .= $searchString;
        //$result_set = $database->query($sql3);
        //$row = $database->fetch_array($result_set);
        //return array_shift($row);
	
	     // $tempref = $row;
		 
		 
		 //$result = mysqli_query($conn->connection,$sql22) or die(mysql_error());
		// while($row = mysqli_fetch_array($conn->connection,$result)){
		 
		 
		 //$tempref2=$row['maxnumber'];
		 
		 
		 
	
	
	
	
  
  
  
  
  //echo  $photoCount->maxvalue;
	
	
	
	//$product->ref3= $tempref;
	$product->reffull=  $product->ref1 ."-". $product->ref2."-".$product->ref3;
	
	
	
	
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
     $product->assing_to= $_POST['assing_to'];
	 $product->ded_line= $_POST['ded_line'];
    $product->develop_r_date= $_POST['develop_r_date'];
    $product->document_complet= $_POST['document_complet'];
     $product->date_hand_qa= $_POST['date_hand_qa'];
     
     
     $product->qa_complete= $_POST['qa_complete'];
     $product->date_back_it= $_POST['date_back_it'];
    $product->release_date= $_POST['release_date'];
    $product->status= $_POST['status'];
     
    
    
    
    
    //$product->title = $_POST['product_name'];
  //  $product->i_code = $_POST['i_code'];
  //  $product->cat_id = $_POST['category'];
  //  $product->size_id = isset($_POST['size_' . $product->cat_id]) ? $_POST['size_' . $product->cat_id] : 0;
   // $product->color_id = isset($_POST['color_' . $product->cat_id]) ? $_POST['color_' . $product->cat_id] : 0;
   // $product->type_id = isset($_POST['type_' . $product->cat_id]) ? $_POST['type_' . $product->cat_id] : 0;
  //  $product->price = $_POST['product_price'];
   // $product->quan = $_POST['quan'];

    if ($product->save()) {
        $session->message("Document {$product->reference} Upload Successfully  by {$user->us_name}");
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





<div id="admin_content">
    <!--<center><h3>Add Product</h3></center>-->
    <form action="admin_page.php" enctype="multipart/form-data" method="post">
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div id="tab-container" class='tab-container'>
 <ul class='etabs'>
   <li class='tab'><a href="#tabs1-html">Page 1</a></li>
   <li class='tab'><a href="#tabs1-js">Page 2</a></li>
   <li class='tab'><a href="#tabs1-css">Page 3</a></li>
     

 </ul>
 <div class='panel-container'>
  <div id="tabs1-html">
   

  
    <code>
<p> <?php echo " value" ?> 


<p class="detailll" >Core / NonCore : <select name="core" class="detailindate1">
             <option value="Core">Core</option>
             <option value="NonCore">NonCore</option>
             
  
           </select></p>
           
           <p class="detailll">Unit : <select name="unit" class="detailindate5">
						<?php foreach ($allUnits as $key => $value){
							$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option name="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select></p>
		
           
           
           
           
           <p class="detailll" > CR/BRD/REPORT : <select name="crr" class="detailindate2">
             <option value="CR">CR</option>
             <option value="BRD">BRD</option>
             <option value="REPORT">REPORT</option>
  
           </select></p>
          
           <p class="detailll">Reference : 
		   
		   <select name="ref1" class="detailindate55">
						<?php foreach ($allref as $key => $value){
							$selected = ($selectedCrr == $key) ? "selected" : "";
							?>
							<option name="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
							<?php
						} ?>

				</select><input type="text" name="reference" class="" />
		   
		   
		   
		   </p>
        <p class="detailll">Requester :<input type="text" class="datepicker"name="date_req" style="margin-left: 160px;"/> <input type="text" name="requester" class="detailindate4" /></p>
        <!--<p class="detailll"> Unit : <input type="text" name="unit"  class="detailindate5"/></p> -->
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
        
         <p class="detailll">Contact Person : <input type="text" name="contact_p" class="detailindate6"/></p>
        <p class="detailll">Date Submit : <input type="text" class="datepicker"name="date_sub"  style="margin-left: 130px;"/></p>
        <p class="detailll">Description : <textarea name="description" class="detailindate7"></textarea></p>
        <p class="detailll">Date Recived (IT): <input type="text" class="datepicker" name="date_reciv_it" style="margin-left: 80px;"/></p>
          
          
          </p>
    </code>
    
  
  </div>
  
  
  
  
  
  
  
  
  
  
  
   <div id="tabs1-js">
   

   
    <code>
<p>
            
            
        <p class="detailll">SMRC Reviewed Date : <input type="text" class="datepicker" name="smrc_date" style="margin-left: 100px;"/></p>
        <p class="detailll">SMRC Status : <input type="text" name="smrc_status" class="detailindate10"/></p>
        <p class="detailll">Priority : <input type="text"  name="priority" class="detailindate11"/></p>
        <p class="detailll">Date Hand Over To Development : <input type="text" class="datepicker" name="date_develop" /></p>
        <p class="detailll">Date Hand Over To Temonors/FLS : <input type="text" class="datepicker"name="date_temo" /></p>
        <p class="detailll">Remarks : <textarea name="remarks" class="detailindate101"></textarea></p>
        
        <p class="detailll">Hand over to : <input type="text" name="assing_to" class="detailindate100"/></p>
       
	   <p class="detailll">Dead Line : <input type="text" class="datepicker" name="ded_line" style="margin-left: 185px;"/></p>


	   <p class="detailll">Development Reviewed Date : <input type="text" class="datepicker" name="develop_r_date" style="margin-left: 25px;"/></p>
        <p class="detailll">Documantation Complete/not : <input type="text" name="document_complet" style="margin-left: 15px;"/></p>
            
            
            
          </p>
    </code>
  

  </div>
   
   
   
   
   
   
   
  <div id="tabs1-css">


  <code>
    
<p>
            
             <p class="detailll">Date Hand Over TO QA : <input type="text" class="datepicker" name="date_hand_qa" style="margin-left: 45px;"/></p>
        <p class="detailll">QA Testing Competed ON : <input type="text" class="datepicker" name="qa_complete" style="margin-left: 23px;"/></p>
        <p class="detailll">Date Hand Over To IT Ops : <input type="text" class="datepicker" name="date_back_it" style="margin-left: 5px;"/></p>
        <p class="detailll">Release Date : <input type="text" class="datepicker" name="release_date" style="margin-left: 120px;"/></p>
        <p class="detailll">Status :  <select name="status" class="detailindate9">
             <option value="pending">Pending</option>
             <option value="completed">Completed</option>
              <option value="rejected">Rejected</option>
               <option value="close">Close</option>
                <option value="hold">Hold</option>
           </select></p>
        <p class="detailll">Scan Document 1 : <input type="file" class="box" name="pdf1" /></p>
        <p class="detailll">Scan Document 2 : <input type="file" class="box"  name="pdf2" /></p>
        <p class="detailll">Scan Document 3 : <input type="file" class="box" name="pdf3"  /></p>
            
            
          </p>  
  </code>

  </div>
 </div>
</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       
       
       
        
        
       
        
        
       
        
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
