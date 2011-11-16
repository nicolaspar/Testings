<?php
/**
 * 
 * Enter description here ...
 * @author Facundo Capua <facundocapua@gmail.com>
 * @table User
 *
 */
class User extends baseRecord
{
	/**
	 * @persistent
	 * @field first_name 
	 */
	private $_first_name = null;
	
	/**
	 * @persistent
	 * @field last_name 
	 */
	private $_last_name = null;
	
	
	public function __construct($firstname, $lastname)
	{
		$this->setFirstName($firstname);
		$this->setLastName($lastname);
	}
	
	
	/**
	 * @return the $_first_name
	 */
	public function getFirstName() {
		return $this->_first_name;
	}

	/**
	 * @return the $_last_name
	 */
	public function getLastName() {
		return $this->_last_name;
	}

	/**
	 * @param field_type $_first_name
	 */
	public function setFirstName($_first_name) {
		$this->_first_name = $_first_name;
	}

	/**
	 * @param field_type $_last_name
	 */
	public function setLastName($_last_name) {
		$this->_last_name = $_last_name;
	}
	
	
}