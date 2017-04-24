<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.clubbao.php';
//$connect = mysqli_connect("localhost","root","","cseku_wpl_2017_education");

$_ClubBAO = new ClubBAO();
$_DB = DBUtil::getInstance();
$Club = new Club();


/* saving a new Position account
if(isset($_POST["save"]))
{
	 $Club = new Club();	
	 $Club->setID(Util::getGUID());
     $Club->setName($_DB->secureInput($_POST['txtName']));
     $Club->setDescription($_DB->secureInput($_POST['txtDes']));
     $file = addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
     $Club->setCoverPhoto($_DB->secureInput('$file'));
     $Club->setCreationDate($_DB->secureInput(date("Y/m/d")));
	 $_ClubBAO->createClub($Club);
	 	 
}
*/



// deleting an existing Club
if(isset($_GET['del']))
{

	$Club = new Club();	
	$Club->setID($_GET['del']);	
	$_ClubBAO->deleteClub($Club); //reading the Club object from the result object

	header("Location: view.Club.php");
}
 


//reading an existing Position information 
if(isset($_GET['edit']))
{
	$Club = new Club();	
	$Club->setID($_GET['edit']);	
	$getROW = $_ClubBAO->readClub($Club)->getResultObject(); //reading the Position object from the result object
}


//updating an existing Position information
if(isset($_POST['update']))
{
	$Club = new Club();	

    $Club->setID ($_GET['edit']);
    $Club->setName( $_POST['txtName'] );
    $Club->setDescription( $_POST['txtDes'] );

	
	$_ClubBAO->updateClub($Club);

	header("Location: view.club.php");
}

if(isset($_GET['add']))
{
	$Club = new Club();	
	$Club->setID($_GET['add']);	
	$getROW = $_ClubBAO->readClub($Club)->getResultObject();
	
	header("Location: view.module.php");
}

if(isset($_GET['addMember']))
{
	$Club = new Club();	
	$Club->setID($_GET['addMember']);	
	$getROW = $_ClubBAO->readClub($Club)->getResultObject();
	
	header("Location: view.Members.php");
}
if(isset($_GET['page']))
{
	$Club = new Club();	
	$Club->$_GET['page'];
	//$club=$_GET['page'];
	
	header("Location: view.clubpage.php"); //reading the Position object from the result object
}



echo '<br> log:: exit blade.club.php';

?>