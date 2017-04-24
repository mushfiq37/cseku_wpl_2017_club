<?php

include_once 'blade/view.members.blade.php';
include_once '/../../common/class.common.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Members</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>

	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		<form method="post">
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
					<td><input type="text" name="txtName" placeholder="Name of the Member" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" /></td>
				</tr>

				<tr>
					<td><input type="text" name="txtDes" placeholder="Designation" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getDesignation();  ?>" /></td>
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
							<button type="submit" name="save">save</button>
							<?php
						}
						?>
					</td>
				</tr>
			</table>
		</form>

<br />

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
			    <td><a href="?edit=<?php echo $Members->getMemberID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td><a href="?del=<?php echo $Members->getMemberID(); ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
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
	<button type="submit" name="back">Back</button>
	</form>
	</div>
</center>
</body>
</html>