<?php

include_once '/../util/class.util.php';
include_once '/../dao/class.membersdao.php';


/*
	Position Business Object 
*/
Class MembersBAO{

	private $_DB;
	private $_MembersDAO;

	function MembersBAO(){

		$this->_MembersDAO = new MembersDAO();

	}

	//get all Positions value
	public function getAllMembers(){

		$Result = new Result();	
		$Result = $this->_MembersDAO->getAllMembers();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in PositionDAO.getAllPositions()");		

		return $Result;
	}

	//create Position funtion with the Position object
	public function createMembers($Members){

		$Result = new Result();	
		$Result = $this->_MembersDAO->createMembers($Members);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in PositionDAO.createPosition()");		

		return $Result;

	
	}

	//read an Position object based on its id form Position object
	public function readMembers($Members){


		$Result = new Result();	
		$Result = $this->_MembersDAO->readMembers($Members);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in MembersDAO.readMembers()");		

		return $Result;


	}

	//update an Position object based on its current information
	public function updateMembers($Members){

		$Result = new Result();	
		$Result = $this->_MembersDAO->updateMembers($Members);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in PositionDAO.updatePosition()");		

		return $Result;
	}

	//delete an existing Position
	public function deleteMembers($Members){

		$Result = new Result();	
		$Result = $this->_MembersDAO->deleteMembers($Members);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in MembersDAO.deleteMembers()");		

		return $Result;

	}

}

//echo '<br> log:: exit the class.Membersbao.php';

?>