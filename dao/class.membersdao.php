<?php
// write dao object for each class
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class MembersDAO{

	private $_DB;
	private $_Members;

	function MembersDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Members= new Members();

	}

	// get all the Positions from the database using the database query
	public function getAllMembers(){

		$MembersList = array();

		session_start();
		$t=$_SESSION['variable_name1'];
		$this->_DB->doQuery("SELECT * FROM tbl_club_member WHERE ClubID ='$t' ");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Members = new Members();

		    $this->_Members->setClubID( $row['ClubID']);
		    $this->_Members->setMemberID( $row['MemberID']);
		    $this->_Members->setName( $row['Name'] );
			$this->_Members->setDesignation( $row['Designation']);

		    $MembersList[]=$this->_Members;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($MembersList);

		return $Result;
	}

	//create Position funtion with the Position object
	public function createMembers($Members){

		$ClubID=$Members->getClubID();
		$MemberID=$Members->getMemberID();
		$Name=$Members->getName();	
		$Designation=$Members->getDesignation();

		$SQL = "INSERT INTO tbl_club_Member(ClubID,MemberID,Name,Designation) VALUES('$ClubID','$MemberID','$Name','$Designation')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	//read an Position object based on its id form Position object
	public function readMembers($Members){
		
		
		$SQL = "SELECT * FROM tbl_club_Member WHERE MemberID='".$Members->getMemberID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Position from the database
		$row = $this->_DB->getTopRow();

		$this->_Members = new Members();

		//preparing the Position object
	    $this->_Members->setClubID ( $row['ClubID']);
	    $this->_Members->setMemberID ( $row['MemberID']);
		$this->_Members->setName( $row['Name'] );
	    $this->_Members->setDesignation ( $row['Designation']);




	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Members);

		return $Result;
	}

	//update an Position object based on its 
	public function updateMembers($Members){

		$SQL = "UPDATE tbl_club_Member SET Name='".$Members->getName()."',Designation='".$Members->getDesignation()."' WHERE MemberID='".$Members->getMemberID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Position based on its id of the database
	public function deleteMembers($Members){


		$SQL = "DELETE from tbl_club_Member where MemberID ='".$Members->getMemberID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

//echo '<br> log:: exit the class.Membersdao.php';

?>