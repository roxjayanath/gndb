<?php

require_once ("includes/initialize.php");

if (! $session->is_logged_in ()) {
	redirect_to ( "login.php" );
}

$sname;
$total_count = Product::count_status ();
$total_countcr = Product::count_statuscr ();
$total_countbr = Product::count_statusbr ();
$total_countrep = Product::count_statusrep ();
$total_countcomlete = Product::count_statuscomplet();
$total_countclose = Product::count_statusclose();
$total_countreject = Product::count_statusreject();
$total_counthold = Product::count_statushold();
$total_countin = Product::count_statusin();
//$total_countassing = Product::count_statusassing_to ();
//$total_countassing2 = Product::count_statusassing_to2();

echo $total_count;
echo $total_countcr;
echo $total_countbr;
echo $total_countrep;

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
 
 
 echo $total_countassing2;
 echo $product->assing_to;
 //echo $product->sname;
 
 $temsname=$product->sname;
 $tempcount = $total_countassing2;
 
 
 //SELECTt * FROM ndb_doc WHERE d_visible =1 AND lower(assing_to) like lower('%m%')
 
 $sql = "SELECT * FROM ndb_doc WHERE d_visible =1 AND status = 'pending' AND lower(assing_to) like lower('%".$product->sname= $_POST['assing_to'];
 $sql.= "%')";
 $photos = Product::find_by_sql ( $sql );
 


}




//http://localhost/php_sandbox/gndb/public/upload/docs/CR/1_1413125778.pdf



?>

<head>
<script src="javascrpits/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="javascrpits/jsapi.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  
	  

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Pending',     <?php echo $total_count; ?>],
          ['Reject',     <?php echo $total_countreject; ?>],
          ['Close',  <?php echo $total_countclose; ?>],
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
  <form action="charts.php" enctype="multipart/form-data" method="post">
       <h1>Full Status</h1>
    <p>Total pending = <?php echo $total_count; ?></p>
	<p>Total hold = <?php echo $total_counthold; ?></p>
	<p>Total reject = <?php echo $total_countreject; ?></p>
	<p>Total close = <?php echo $total_countclose; ?></p>
	<p>Total completed = <?php echo $total_countcomlete; ?></p>
	
	<br>
	<br>
	<h1>Pending</h1>
	<p>CR pending = <?php echo $total_countcr ?></p>
	<p>BR pending = <?php echo $total_countbr ?></p>
	<p>REPORT pending = <?php echo $total_countrep ?></p>
	
	
	 <p><p class="detailll">Hand over to : <input type="text" name="assing_to" class="detailindate12"/></p>
				<p >
                <input type="submit" value="Search" name="submit" class="create_button">
            </p>
			
			<p><?php echo $temsname; ?> Holds : <?php echo $tempcount; ?> Pendings</p>
            
					
					
					
					
					
					<center>  <table class="customer" cellpadding="6px" cellspacing="10px">
            <tr class="head_row">
                
                <th class="head_toc">Core / NonCore</th>
                <th class="head_toc">CR/BRD/<br>REPORT</th>
		
		
		<th class="head_toc">Reference</th>
                <th class="head_toc">Date Submit</th>
				<th class="head_toc">Holder</th>
				<th class="head_toc">Status</th>
				<th class="head_toc">Last Edited</th>
                
		
		
                
                
                
                <th>&nbsp;</th>
            </tr>

            <?php 
            if(!empty($photos)){
            foreach($photos as $photo): ?>
            
            <tr>

					
					<td><?php echo $photo->cor_non;?></td>
					<td><?php echo $photo->cr_brd;?></td>

					<td><?php 
            //echo $photo->reference;
					echo $photo->reffull;
					?></td>
					

					
					<td><?php echo $photo->date_sub;?></td>
					<td><?php echo $photo->assing_to;?></td>
					<td><?php echo $photo->status;?></td>
					<td><?php echo $photo->update_on;?></td>
					






					<td>
						<!--<a href="comments.php?id=<?php echo $photo->id;?>"> -->
                <?php //echo count($photo->comments());?></td>
					</a>
					
					<!-- <td><a href="delete_admin.php?id=<?php //echo $photo->id;?>">Delete</a></td>
                 -->
				</tr>
            
            <?php endforeach;
            }
            ?>
            
            
            
           </table>
		</center>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
    
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <p><a href="admin_home.php">Home Page</a></p>
    </form>
  </body>