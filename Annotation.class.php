<?php
/**
 * 
 * @author Facundo Capua <facundocapua@gmail.com>
 *
 */
class Annotation
{
	private $_reflector = null;
	
	private $_classAnotations = null;
	private $_propertiesAnnotations = array();
	
	
	private static $_annotationRegEx = "/@(\S*)\s(.*)/";
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $object
	 */
	public function __construct($object)
	{
		$this->_reflector = new ReflectionClass($object);
	}
	
	
	public function getPropertyAnnotation($property_name, $name)
	{
		$propertyAnnotations = $this->getPropertyAnnotations($property_name);
		var_dump($propertyAnnotations);
		return isset($propertyAnnotations[$name]) ? $propertyAnnotations[$name] : null;
	}
	
	public function getPropertyAnnotations($property_name)
	{
		if(!isset($this->_propertiesAnnotations[$property_name]))
		{
			$property = $this->_reflector->getProperty($property_name);
			$comments = $property->getDocComment();
			$this->_propertiesAnnotations[$property_name] = array();
			preg_match_all(self::$_annotationRegEx, $comments, $matches);
			if($matches){
				foreach($matches[1] as $key=>$value){
					$this->_propertiesAnnotations[$property_name][$value] = !empty($matches[2][$key]) ? $matches[2][$key] : true;
				}	
			}
		}
		
		return $this->_propertiesAnnotations[$property_name];
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	public function getClassAnnotation($name)
	{
		$annotations = $this->getClassAnnotations();
		
		return isset($annotations[$name]) ? $annotations[$name] : null;
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function getClassAnnotations()
	{
		if($this->_classAnotations === null){
			$comments = $this->_reflector->getDocComment();
			$this->_classAnotations = array();
			preg_match_all(self::$_annotationRegEx, $comments, $matches);
//			var_dump($matches);exit;
			if($matches){
				foreach($matches[1] as $key=>$value){
					$this->_classAnotations[$value] = isset($matches[2][$key]) ? $matches[2][$key] : true;
				}	
			}
		}
		
		return $this->_classAnotations;
	}
}