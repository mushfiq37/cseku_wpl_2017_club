<?php

include_once '/../util/class.util.php';
include_once '/../dao/class.clubpagedao.php';


/*
	Position Business Object 
*/
Class ClubBAO{

	private $_DB;
	private $_ClubDAO;

	function ClubBAO(){

		$this->_ClubDAO = new ClubDAO();

	}

	//get all Positions value
	public function getAllClub(){

		$Result = new Result();	
		$Result = $this->_ClubDAO->getAllClub();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.getAllClub()");		

		return $Result;
	}

	//create Position funtion with the Position object
	public function createClub($Club){

		$Result = new Result();	
		$Result = $this->_ClubDAO->createClub($Club);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.createClub()");		

		return $Result;

	
	}

	//read an Position object based on its id form Position object
	public function readClub($Club){


		$Result = new Result();	
		$Result = $this->_ClubDAO->readClub($Club);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.readClub()");		

		return $Result;


	}

	//update an Position object based on its current information
	public function updateClub($Club){

		$Result = new Result();	
		$Result = $this->_ClubDAO->updateClub($Club);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.updateClub()");		

		return $Result;
	}

	//delete an existing Position
	public function deleteClub($Club){

		$Result = new Result();	
		$Result = $this->_ClubDAO->deleteClub($Club);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in ClubDAO.deleteClub()");		

		return $Result;

	}

}

//echo '<br> log:: exit the class.clubbao.php';

?>