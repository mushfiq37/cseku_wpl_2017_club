<?php
// write dao object for each class
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class ModuleDAO{

	private $_DB;
	private $_Module;

	function ModuleDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Module = new ClubModule();

	}

	//get all the Club from the database using the database query
	public function getAllModule(){

		$ModuleList = array();

		session_start();
		$t=$_SESSION['variable_name1'];
		$this->_DB->doQuery("SELECT * FROM tbl_Club_Module WHERE ClubID ='$t' ");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Module = new ClubModule();

		    $this->_Module->setClubID ( $row['ClubID']);
		    $this->_Module->setModuleID( $row['ModuleID']);
		    $this->_Module->setModuleName( $row['ModuleName'] );
		    $this->_Module->setPositionX( $row['PositionX'] );
		    $this->_Module->setPositionY( $row['PositionY'] );
		    $this->_Module->setSizeX( $row['SizeX'] );
		    $this->_Module->setSizeY( $row['SizeY'] );
		    $this->_Module->setContent( $row['Content']);



		    $ModuleList[]=$this->_Module;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($ModuleList);

		return $Result;
	}

	//create Position funtion with the Position object
	public function createModule($Module){

		$ID=$Module->getClubID();
		$ModuleID=$Module->getModuleID();
		$Name=$Module->getModuleName();
		$IsVisible=$Module->getIsVisible();
		$PositionX=$Module->getPositionX();
		$PositionY=$Module->getPositionY();
		$SizeX=$Module->getSizeX();
		$SizeY=$Module->getSizeY();
		$Content=$Module->getContent();
		//$NoOfModules=$Module->getNoOfModules();
		


		$SQL = "INSERT INTO tbl_Club_Module(ClubID,ModuleID,ModuleName,IsVisible,PositionX,PositionY,SizeX,SizeY,Content) VALUES('$ID','$ModuleID','$Name','$IsVisible','$PositionX','$PositionY','$SizeX','$SizeY','$Content')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	//read an Position object based on its id form Position object
	public function readModule($Module){
		
		
		$SQL = "SELECT * FROM tbl_Club_Module WHERE ModuleID='".$Module->getModuleID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Position from the database
		$row = $this->_DB->getTopRow();

		$this->_Module = new ClubModule();

		//preparing the Position object
	    $this->_Module->setClubID ( $row['ClubID']);
	    $this->_Module->setModuleID ( $row['ModuleID']);
	    $this->_Module->setModuleName( $row['ModuleName'] );
	    $this->_Module->setIsVisible( $row['IsVisible'] );
	    $this->_Module->setPositionX( $row['PositionX'] );
	    $this->_Module->setPositionY( $row['PositionY'] );
	    $this->_Module->setSizeX( $row['SizeX'] );
	    $this->_Module->setSizeY( $row['SizeY'] );
 	    $this->_Module->setContent( $row['Content'] );
 	   // $this->_Module->setNoOfModules( $row['NoOfModules'] );






	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Module);

		return $Result;
	}

	//update an Position object based on its 
	public function updateModule($Module){

		$SQL = "UPDATE tbl_Club_Module SET ModuleName='".$Module->getModuleName()."',IsVisible='".$Module->getIsVisible()."', PositionX='".$Module->getPositionX()."',  PositionY='".$Module->getPositionY()."', SizeX='".$Module->getSizeX()."', SizeY='".$Module->getSizeY()."', Content='".$Module->getContent()."' WHERE ModuleID='".$Module->getModuleID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Position based on its id of the databas
	public function deleteModule($Module){


		$SQL = "DELETE from tbl_Club_Module where ModuleID ='".$Module->getModuleID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}



}

echo '<br> log:: exit the class.moduledao.php';

?>