<?php

//include_once 'C:\wamp\www\2017_education-master\util\class.util.php';

//include_once 'blade/view.clubpage.blade.php';
//include_once 'blade/view.module.blade.php';
//include_once '/../../common/class.common.php';
include_once 'C:/wamp/www/2017_education-master/modules/club/blade/view.members.blade.php';
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
    <?php 
    session_start();
    $y=$_SESSION['variable_name2'];
    $x=$_SESSION['variable_name1'];
    ?>
    <title>echo $y</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>

  
<body>

  <div id="header">
    
  </div>

  <div id="container">
  <div id="leftContent"><?php
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
      
      <?php  
      echo '
        <img src="data:image/jpeg;base64,'.base64_encode($row1['CoverPhoto']).'" height = "300" width = "800"/>
        ';
        ?>

        <br>
<div class="name">

      <?php
      echo $row1['Name'];
      ?>
      <br>
      <br>


      <div class="Des">
      	<?php
      		//echo "Club Description";
      	?>
      </div>

      </div>
      
     
      <?php
      //echo $row1['Description'];
    }

    ?>

    	
    	<br>
    	

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c0">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c01">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>
<br>
<br>
<br>
<br>



<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 2 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c2">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c21">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>

<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 4 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c4">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c41">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>



<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 6 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c6">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c61">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>

<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 8 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c8">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c81">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>
<table width="100%" border="1" cellpadding="15" align="center">
  <?php
  
  
  $Result = $_MembersBAO->getAllMembers();

  //if DAO access is successful to load all the Positions then show them one by one
  if($Result->getIsSuccess()){

    $MembersList = $Result->getResultObject();
  ?>
    <tr>
      <td>Members</td>
      <td>Designation</td>
      
    </tr>
    <?php
    for($i = 0; $i < sizeof($MembersList); $i++) {
      $Members = $MembersList[$i];
      ?>
        <tr>
          <td><?php echo $Members->getName(); ?></td>
          <td><?php echo $Members->getDesignation(); ?></td>
         
          
          
        </tr>
      <?php

    }

  }
  else{

    echo $Result->getResultObject(); //giving failure message
  }

  ?>
  </table>




    

</div>
  <div id="mainContent"></div>
  <div id="rightContent">
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
      
     

        <br>

      <div class="Desc">
        <?php
          echo "Club Description";
        ?>
      </div>

      
      <div class="Description">
     
      <?php
      echo $row1['Description'];
    }

    ?>

      </div>

<br>
      <br>
      <br>
      <br>
      <br>
      <br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 1 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c1">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c11">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>

<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 3 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c3">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c31">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>
<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 5 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c5">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c51">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>

<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 7 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c7">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c71">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>

<br>
<br>
<br>
<br>

<?php
//print Content
session_start();
$t=$_SESSION['variable_name1'];
$query1 = "SELECT * FROM tbl_club_module WHERE ClubID = '$t'  LIMIT 1 OFFSET 9 ";
$result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {?>
<div class = "c9">
<?php
      echo $row2['ModuleName'];?>
      	
      </div>
      
<div class="c91">
<?php
echo $row2['Content'];?>
	
</div>
<?php 
    }

?>





	</div>
</div>
  <div id = "form">

  </div>
      
  



</body>
</html>