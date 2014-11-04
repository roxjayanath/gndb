<?php

require_once ("includes/initialize.php");

if (! $session->is_logged_in ()) {
	redirect_to ( "login.php" );
}

$sname;
$total_all = Product::count_all ();

$total_count = Product::count_status ();
$total_countcr = Product::count_statuscr ();
$total_countbr = Product::count_statusbr ();
$total_countrep = Product::count_statusrep ();
$total_countcomlete = Product::count_statuscomplet();
$total_countclose = Product::count_statusclose();
$total_countreject = Product::count_statusreject();
$total_counthold = Product::count_statushold();
$total_countin = Product::count_statusin();


$total_countdev = Product::count_statusdev();

$total_countpetem = Product::count_statpendtem();
$total_countqatest = Product::count_statqatest();





//$total_countassing = Product::count_statusassing_to ();
//$total_countassing2 = Product::count_statusassing_to2();

//echo $total_count;
//echo $total_countcr;
//echo $total_countbr;
//echo $total_countrep;

$temsname='';
$tempcount='';
$photos='';
//echo $total_countassing;


//$assing_to= "";

if (isset($_POST['submit'])) {

 $product = new Product();
 
 //$total_countassing2 = $product->count_statusassing_to2($product->sname= $_POST['assing_to']);
 $product->count_statusassing_to2namelist($product->sname= $_POST['assing_to']);
 $total_countassing2 = Product::count_statusassing_to2($product->sname= $_POST['assing_to']);
 
 
 //echo $total_countassing2;
 //echo $product->assing_to;
 //echo $product->sname;
 
 $temsname=$product->sname;
 $tempcount = $total_countassing2;
 
 
 //SELECTt * FROM ndb_doc WHERE d_visible =1 AND lower(assing_to) like lower('%m%')
 
 $sql = "SELECT * FROM ndb_doc WHERE d_visible =1  AND lower(assing_to) like lower('%".$product->sname= $_POST['assing_to'];
 $sql.= "%')";
 $photos = Product::find_by_sql ( $sql );
 


}




//http://localhost/php_sandbox/gndb/public/upload/docs/CR/1_1413125778.pdf



?>

<?php
//include_layout_template('header.php');
//var_dump($_SERVER);
require_once('layouts/header1.php');
?>
<center><h1 class="main_toc5">Reports and Charts</h1></center>
<p><a href="admin_home.php" style="
   
    font-size: 20px;
    color: blue;
">Home Page</a>
<br/>
<a href="docholder.php" style="
   
    font-size: 20px;
    color: blue;
">Find Document Holder</a>
<br/>
<a href="viwe_document.php" style="
   
    font-size: 20px;
    color: blue;
">View Documents</a></p>
<head>
	<link rel="stylesheet" href="css/jquery-ui.css"></link>
<script src="javascrpits/jquery-1.8.3.min.js" ></script>
<script src="javascrpits/jquery-ui.js" ></script>

 <script src="javascrpits/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="javascrpits/jquery.easytabs.min.js" type="text/javascript"></script>
	
	
	
	
	

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    




<script type="text/javascript">
		// Popup window code
		function newPopup(url) {
			popupWindow = window.open(
				url,'popUpWindow','height=350,width=400,left=400,top=400,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
		}
		</script>
 

  
  <script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
	
	$(document).ready( function() {
      $('#tab-container1').easytabs();
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
  
  

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  
	  

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Pending',     <?php echo $total_count; ?>],
          ['Development',     <?php echo $total_countdev; ?>],
          ['QA Testing',  <?php echo $total_countqatest; ?>],
          ['Inprogress', <?php echo $total_countin; ?>],
          ['Hold',    <?php echo $total_counthold; ?>]
        ]);

        var options = {
          title: 'FUll Status '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	
	
	
  </head>
  <body>
 
  
  
  
  
  
   <div id="tab-container" class='tab-container'>
 <ul class='etabs'>

 <li class='tab'><a href="#tabs1-h">Full Status</a></li>

   <li class='tab'><a href="#tabs1-js">Pending CR/BRD/RR</a></li>

  
   
   
 <!--  <li class='tab'><a href="#tabs1-htmll">Details</a></li>
   <li class='tab'><a href="#tabs1-html">Approvals</a></li>
   <li class='tab'><a href="#tabs1-js">Development</a></li>
   <li class='tab'><a href="#tabs1-css">System Suport Testing</a></li>
   <li class='tab'><a href="#tabs1-css1">QA Testing</a></li>
   <li class='tab'><a href="#tabs1-css2">Document Closer</a></li> -->
     

 </ul>
 <div class='panel-container'>
 
 <div id="tabs1-h">
   

   
    <code>
<p><h1 style="font-family: -webkit-pictograph;">Full Status</h1>
        <table border="1">
		
		
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total Pending</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_count; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total Pending Temonos</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countpetem; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total Development</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countdev; ?> </p> </th>
		
		</tr>
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total QA Testing</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countqatest; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total Hold</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_counthold; ?> </p> </th>
		
		</tr>
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total Reject</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countreject; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th><p style="font-family: -webkit-pictograph;">Total Close</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countclose; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th style="
    /* margin-left: 0px; */
    padding: 20px;
"><p style="font-family: -webkit-pictograph;">Total Issues</p> </th>
		<th style="
    /* margin-left: 0px; */
    padding: 20px;
"><p style="font-family: -webkit-pictograph;"><?php echo $total_all; ?> </p> </th>
		
		</tr>

		</table>       
            
        
		
		
		
		
				
     
	
	
	
	
            
            
            
          </p>
    </code>
  

  </div>
  
  
 
  
  <div id="tabs1-js">
   

   
    <code>
<p>
             
			 <h1 style="font-family: -webkit-pictograph;">Pending CR/BRD/RR</h1>
			 <table border="1">
		<tr>
		<th style="
    /* margin-left: 0px; */
    padding: 30px;
"><p style="font-family: -webkit-pictograph;">CR pending</p> </th>
		<th style="
    /* margin-left: 0px; */
    padding: 20px;
"><p style="font-family: -webkit-pictograph;"><?php echo $total_countcr; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th style="
    /* margin-left: 0px; */
    padding: 30px;
"><p style="font-family: -webkit-pictograph;">BRD pending</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countbr; ?> </p> </th>
		
		</tr>
		
		<tr>
		<th style="
    /* margin-left: 0px; */
    padding: 30px;
"><p style="font-family: -webkit-pictograph;">REPORT pending</p> </th>
		<th><p style="font-family: -webkit-pictograph;"><?php echo $total_countrep; ?> </p> </th>
		
		</tr>
		
		
		
		</table>
			 
			 
			
			
            
        
	
            
          </p>
    </code>
  

  </div>
 
 
 
 </div>
 
 
 
 
  
  
  
  
  
  
  
  
  
  
  
  
      
	
	<br>
	<br>
	
	
	  <div id="piechart" style="width: 900px; height: 500px;"></div>
	 
					
					
					
					
					
  </body>