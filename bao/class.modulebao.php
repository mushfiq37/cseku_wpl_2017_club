<?php

include_once '/../util/class.util.php';
include_once '/../dao/class.moduledao.php';
//include_once '/../dao/class.clubdao.php';


/*
	Position Business Object 
*/
Class ModuleBAO{

	private $_DB;
	private $_ModuleDAO;

	function ModuleBAO(){

		$this->_ModuleDAO = new ModuleDAO();

	}

	//get all Positions value
	public function getAllModule(){

		$Result = new Result();	
		$Result = $this->_ModuleDAO->getAllModule();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ModuleDAO.getAllClub()");		

		return $Result;
	}

	//create Position funtion with the Position object
	public function createModule($Module){

		$Result = new Result();	
		$Result = $this->_ModuleDAO->createModule($Module);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.createClub()");		

		return $Result;

	
	}

	//read an Position object based on its id form Position object
	public function readModule($Module){


		$Result = new Result();	
		$Result = $this->_ModuleDAO->readModule($Module);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.readClub()");		

		return $Result;


	}

	//update an Position object based on its current information
	public function updateModule($Module){

		$Result = new Result();	
		$Result = $this->_ModuleDAO->updateModule($Module);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.updateClub()");		

		return $Result;
	}

	//delete an existing Position
	public function deleteModule($Module){

		$Result = new Result();	
		$Result = $this->_ModuleDAO->deleteModule($Module);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.deleteClub()");		

		return $Result;

	}

}

echo '<br> log:: exit the class.molulebao.php';

?>