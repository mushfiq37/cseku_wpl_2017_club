<?php

include_once 'blade/view.module.blade.php';
include_once '/../../common/class.common.php';
include_once '/../../modules/club/modules.css';
$connect = mysqli_connect("localhost","root","","cseku_wpl_2017_education");
//include_once 'blade/view.club.blade.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Create Club</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		<form method="post" >
			<table width="100%" border="1" cellpadding="15">
			
			
				<tr>
					<label>
					<?php
					 session_start();
					 	
					$n=$_SESSION['variable_name2'] ;
					echo $n;
					//session_destroy();
					//session_destroy(); ?></label></td>


				</tr>
				<tr>
					<td><input type="text" name="txtModuleName" placeholder="Module Name" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getModuleName();  ?>" /></td>

				</tr>
				<tr><td><textarea  cols="40" rows="5" name="txtContent" placeholder="Module Content" style="height:200px;width:500px" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getContent();  ?>" ></textarea></td></tr>
				<tr>

					<td><input type="numeric" name="txtPosX" placeholder="PosX" style="height:30px;width:80px" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getPositionX();  ?>" />

					<input type="numeric" name="txtPosY" placeholder="PosY" style="height:30px;width:80px" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getPositionY();  ?>" />

					<input type="numeric" name="txtSizeX" placeholder="SizeX" style="height:30px;width:80px" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getSizeX();  ?>" />

					<input type="numeric" name="txtSizeY" placeholder="SizeY" style="height:30px;width:80px" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getSizeY();  ?>" /></td>

					
				</tr>

					<td><input type="checkbox" style="height:30px;width:80px" name="visible" value="Yes">Check for Visibility for This Module<br></td>
					 
				</tr>
				<tr>
				
					<td>
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<button type="submit" name="update">update</button>
							<?php
						}
						else
						{
							?>
							
							<button type="submit" onclick="<?php
							//$count=0;
							
							//echo $count; ?>" name="addModule" >Add</button>
							
							<?php
							//echo $count;
						}
						?>
					</td>
				</tr>
				</table>

				</form>
<br />

	<table width="100%" border="1" cellpadding="15" align="center">
	<?php
	
	
	$Result = $_ModuleBAO->getAllModule();

	//if DAO access is successful to load all the Positions then show them one by one
	if($Result->getIsSuccess()){

		$ModuleList = $Result->getResultObject();
	?>
		<tr>
			<td>Module Name</td>
		</tr>
		<?php
		for($i = 0; $i < sizeof($ModuleList); $i++) {
			$Module = $ModuleList[$i];
			?>
		    <tr>
			    <td><?php echo $Module->getModuleName(); ?></td>
			    <td><a href="?edit=<?php echo $Module->getModuleID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td><a href="?del=<?php echo $Module->getModuleID(); ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
			    
		    </tr>
	    <?php

		}

	}
	else{

		echo $Result->getResultObject(); //giving failure message
	}

	?>
	</table>
	<form method="post">
	<button type="submit" name="proceed" >Proceed</button>
	</form>
	
							

				
	</div>
</center>

</body>
</html>