<?php
  //  $answer=$_GET["answerbox"];
   // $ID=$_GET["TheID"];

    $host="localhost";
    $username="root";
    $password="";
    $db_name="ndb_b";
    
    $BC="BC";
    $CR="CR";
    
   $con= mysqli_connect("$host","$username","$password")or die("cannot connect");
    $con->select_db("$db_name")or die("cannot select DB");

    $max="SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE unit= '".$BC."' AND cr_brd= '".$CR."'";
    $maxquery= mysqli_query($con,$max) or die (died);
while($row = mysqli_fetch_assoc($maxquery)) {
    echo "The max num is ". $row['maxnumber']."this is it";
    $newnumber = $row['maxnumber'] + 1;
    echo "NEW index number:". $newnumber;
}

   // $maxnum= mysql_fetch_array($maxquery);
   // $sql="SELECT * FROM info  WHERE ID=".$ID;
   // $query = mysql_query($sql) or die(errorquery);
    //$row = mysql_fetch_array($query);
    //$trueanswer = $row['Answer'];
   // $num=$row['num'];
    //if ($num<$maxnum)
    //{
      //  $numto= $num +1 ;
       // echo "<br>".$maxnum."hh";
    //}
?>