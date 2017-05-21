<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.modulebao.php';
include_once '/../../../bao/class.clubbao.php';
//include_once '/../../../bao/class.clubbao.php';
//include_once 'blade/view.club.blade.php';
$connect = mysqli_connect("localhost","root","","cseku_wpl_2017_education");

$_ModuleBAO = new ModuleBAO();
$_DB = DBUtil::getInstance();
$Club = new Club();
//$_Blade = new club.blade();

/* saving a new Position account*/
if(isset($_POST['addModule']))
{
	$Club = new Club();
	 $Module = new ClubModule();	
	 session_start();
	 $Module->setClubID($_DB->secureInput($_SESSION['variable_name1']));
	 //session_destroy();
	 $Module->setModuleID(Util::getGUID());
     $Module->setModuleName($_DB->secureInput($_POST['txtModuleName']));
     //session_destroy();
   		if((isset($_POST['visible']) && $_POST['visible'] == 'Yes')){

			$Module->setIsVisible($_DB->secureInput(1));
	}
		else if((isset($_POST['visible']) && 
			$_POST['visible'] != 'Yes')){
			$Module->setIsVisible($_DB->secureInput(1));
}


     $Module->setPositionX($_DB->secureInput($_POST['txtPosX']));
     $Module->setPositionY($_DB->secureInput($_POST['txtPosY']));
     $Module->setSizeX($_DB->secureInput($_POST['txtSizeX']));
     $Module->setSizeY($_DB->secureInput($_POST['txtSizeY']));
     $Module->setContent($_DB->secureInput($_POST['txtContent']));
     //$Club->setCoverPhoto($_DB->secureInput($image));
     //$module->setCreationDate($_DB->secureInput(date("Y/m/d")));
	 $_ModuleBAO->createModule($Module);
	 	 
}




// deleting an existing Club
if(isset($_GET['del']))
{

	$Module = new ClubModule();	
	$Module->setModuleID($_GET['del']);	
	$_ModuleBAO->deleteModule($Module); //reading the Club object from the result object

	header("Location: view.Module.php");
}


//reading an existing Position information 
if(isset($_GET['edit']))
{
	$Module = new ClubModule();	
	$Module->setModuleID($_GET['edit']);	
	$getROW = $_ModuleBAO->readModule($Module)->getResultObject(); //reading the Position object from the result object
}

//updating an existing Position information
if(isset($_POST['update']))
{
	$Module = new ClubModule();	

    $Module->setModuleID ($_GET['edit']);
    $Module->setModuleName( $_POST['txtModuleName'] );
    if((isset($_POST['visible']) && $_POST['visible'] == 'Yes')){

			$Module->setIsVisible($_DB->secureInput(1));
	}
		else if((isset($_POST['visible']) && 
			$_POST['visible'] != 'Yes')){
			$Module->setIsVisible($_DB->secureInput(1));
}
	$Module->setPositionX( $_POST['txtPosX'] );	
	$Module->setPositionY( $_POST['txtPosY'] );
	$Module->setSizeX( $_POST['txtSizeX'] );
	$Module->setSizeY( $_POST['txtSizeY'] );
	$Module->setContent( $_POST['txtContent'] );

	
	$_ModuleBAO->updateModule($Module);

	header("Location: view.Module.php");
}

if(isset($_GET['add']))
{
//header("Location: view.club.php");
	$Module= new Module();
	$Module->setModuleID($_GET['add']);
	//$clubID=$_GET['add'];
	//$Club = new Club();	
	//$Club->setID($_GET['add']);	
	//$_ClubBAO->deleteClub($Club); //reading the Club object from the result object
//echo $clubID;
	
}

if(isset($_POST["proceed"]))

{

	 //echo "no";
    
	$Club=new Club();

    session_start();
    $y=$_SESSION['variable_name2'];
    $x=$_SESSION['variable_name1'];
    $ClubIDar = array();

    $query = "SELECT Name FROM tbl_club WHERE ID = '$x' LIMIT 1";
    $result = mysqli_query($connect, $query);
    while($row1 = mysqli_fetch_array($result))
    {
    if ($y==$row1['Name']) {
    	header("Location: view.clubpage.php?name=".$y);
    }
}
    $query1 = "SELECT Name FROM tbl_club WHERE ID = '$x' LIMIT 1 OFFSET 1";
    $result1 = mysqli_query($connect, $query1);
    while($row2 = mysqli_fetch_array($result1))
    {
    if ($y==$row2['Name']) {
    	header("Location: view.clubpage1.php");
    }

	//header("Location: view.clubpage.php");
	//header("Location:view.clubpage.php");
}
}







echo '<br> log:: exit blade.module.php';

?>