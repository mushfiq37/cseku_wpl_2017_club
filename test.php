<?php

include_once 'C:\wamp\www\2017_education-master\util\class.util.php';

include_once 'blade/view.clubpage.blade.php';
//include_once 'blade/view.module.blade.php';
include_once '/../../common/class.common.php';
include_once '/../../modules/club/modules.css';


$connect = mysqli_connect("localhost","root","","cseku_wpl_2017_education");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
  <script type="text/javascript">

function redirect() {
  window.location.href = "http://localhost/2017_education-master/modules/club/view.members.php";

}

</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CLUB</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>

  <style 
  #form {
    width: 70px;
    height: 300px;
    border: 1px solid #c3c3c3;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-align-content: center;
    align-content: center;
}

#form div {
    width: 70px;
    height: 70px;
}

  ></style>

<body>

  <div id="header">
    
  </div>

  
  <div id = "form">

  
          

        
    
<br />


<?php
    //if(isset($_POST["proceed"]))
//{   //count row
    session_start();
    $x=$_SESSION['variable_name1'];
    //echo $x;
    //echo "no";
    $querycnt = "SELECT COUNT(*) FROM tbl_club_module WHERE ClubID = '$x'";
    $resultCount = mysqli_query($connect, $querycnt);
    while($count = mysqli_fetch_array($resultCount))
    {
      session_start();
      $_SESSION['variable_name3']=$count['COUNT(*)'];
      //$y=
      $y=$_SESSION['variable_name3'];

      
    }
  //}
    ?>

 <?php
    //if(isset($_POST["proceed"]))
//{   
    session_start();
    $x=$_SESSION['variable_name1'];

    //echo "no";
    $query = "SELECT * FROM tbl_club WHERE ID = '$x'";
    $result = mysqli_query($connect, $query);
    while($row1 = mysqli_fetch_array($result))
    {
      ?>
      <div class="name">
      <?php
      echo $row1['Name'];
      ?>
        
      </div>
      <?php  
      echo '
        <img src="data:image/jpeg;base64,'.base64_encode($row1['CoverPhoto']).'" height = "250" width = "1000"/>
        ';

      echo $row1['Description'];
    }
  //}
    ?>

    
    <br>
    <br>

    <input type="button" onclick="redirect()" value="Members">
    <br>
    <br>
    

    
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>




    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  
  

?>

    </table>
    </div>
    <br>
    <table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 1 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>





    </td>   
</tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 1 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  
  

?>
</td>
      
      </tr>
      </table>

      <br>
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 2 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>




    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 2 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  

?>

    </table>

    <br>
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 3 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>



    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 3 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  
  

?>

    </table>

    <br>
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 4 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>




    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t' LIMIT 1 OFFSET 4 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  
  

?>

    </table>

    <br>
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 5 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>




    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 5 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  
  

?>

    </table>

    <br>
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 6 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>




    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 6 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      //echo $row['Description'];
    }
    
    
  
  

?>

    </table>

    <br>
<table>
    <tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 7 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];

      //echo $row2['Content'];

      //echo $row['Description'];
    }

    
  
  

?>




    </td>   
<tr>
    <td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 7 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['Content'];
    }
?>
    </table>

    <br>
<table>
    <tr>
    <td>

<?php

$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 8 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      echo $row2['ModuleName'];
  
    }
?>

    </td>   
<tr>
    <td>

<?php

$query1 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 8 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
      

      echo $row2['Content'];

      
    }
    
    
  


?>

    </table>


<br>


  </div>
      
  



</body>
</html>