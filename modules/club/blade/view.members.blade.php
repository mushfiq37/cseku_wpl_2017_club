<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.membersbao.php';


$_MembersBAO = new MembersBAO();
$_DB = DBUtil::getInstance();

/* saving a new Position account*/
if(isset($_POST['save']))
{
	 $Members = new Members();
	 session_start();
	 $Members->setClubID($_DB->secureInput($_SESSION['variable_name1']));
	 $Members->setMemberID(Util::getGUID());
     $Members->setName($_DB->secureInput($_POST['txtName']));
     $Members->setDesignation($_DB->secureInput($_POST['txtDes']));
	 $_MembersBAO->createMembers($Members);		 
}

if(isset($_POST['back']))
{
	 header("Location: view.Club.php");	 
}

/* deleting an existing Position */
if(isset($_GET['del']))
{

	$Members = new Members();	
	$Members->setMemberID($_GET['del']);	
	$_MembersBAO->deleteMembers($Members); //reading the Position object from the result object

	header("Location: view.Members.php");
}


/* reading an existing Position information */
if(isset($_GET['edit']))
{
	$Members = new Members();	
	$Members->setMemberID($_GET['edit']);	
	$getROW = $_MembersBAO->readMembers($Members)->getResultObject(); //reading the Position object from the result object
}

/*updating an existing Position information*/
if(isset($_POST['update']))
{
	$Members = new Members();	

    $Members->setMemberID ($_GET['edit']);
    $Members->setName( $_POST['txtName'] );
    $Members->setDesignation( $_POST['txtDes'] );
	
	$_MembersBAO->updateMembers($Members);

	header("Location: view.Members.php");
}



//echo '<br> log:: exit blade.Members.php';

?>