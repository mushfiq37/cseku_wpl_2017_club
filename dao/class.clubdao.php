<?php
// write dao object for each class
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class ClubDAO{

	private $_DB;
	private $_Club;

	function ClubDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Club = new Club();

	}

	//get all the Club from the database using the database query
	public function getAllClub(){

		$ClubList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_Club");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Club = new Club();

		    $this->_Club->setID ( $row['ID']);
		    $this->_Club->setName( $row['Name'] );


		    $ClubList[]=$this->_Club;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($ClubList);

		return $Result;
	}

	//create Position funtion with the Position object
	public function createClub($Club){

		$ID=$Club->getID();
		$Name=$Club->getName();
		$CoverPhoto=$Club->getCoverPhoto();
		$Description=$Club->getDescription();
		$CreationDate=$Club->getCreationDate();
		$mail=$Club->getMail();


		$SQL = "INSERT INTO tbl_Club(ID,Name,CoverPhoto,Description,CreationDate,mail) VALUES('$ID','$Name','$CoverPhoto','$Description','$CreationDate',$mail)";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	//read an Position object based on its id form Position object
	public function readClub($Club){
		
		
		$SQL = "SELECT * FROM tbl_Club WHERE ID='".$Club->getID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Position from the database
		$row = $this->_DB->getTopRow();

		$this->_Club = new Club();

		//preparing the Position object
	    $this->_Club->setID ( $row['ID']);
	    $this->_Club->setName( $row['Name'] );
	    $this->_Club->setDescription( $row['Description'] );
	    $this->_Club->setMail( $row['mail'] );



	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Club);

		return $Result;
	}

	//update an Position object based on its 
	public function updateClub($Club){

		$SQL = "UPDATE tbl_Club SET Name='".$Club->getName()."', Description='".$Club->getDescription()."',mail='".$Club->getMail()."' WHERE ID='".$Club->getID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Position based on its id of the database
	public function deleteClub($Club){


		$SQL = "DELETE from tbl_Club where ID ='".$Club->getID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

echo '<br> log:: exit the class.clubdao.php';

?>