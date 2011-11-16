<?php
require 'Annotation.class.php';

abstract class baseRecord
{
	public function save()
	{
		$annotation = new Annotation($this);
		
		$table = $annotation->getClassAnnotation('table');
		$reflector = new ReflectionClass($this);
		$properties = $reflector->getProperties();
        $data = array();
        foreach($properties as $property){
        	$isPersistent = $annotation->getPropertyAnnotation($property->getName(), 'persistent');
        	$field_name = $annotation->getPropertyAnnotation($property->getName(), 'field');
        	var_dump($field_name);
        	if(true === $isPersistent){
        		$data[$field_name] = $property->getValue();
        	}
        }
        
        var_dump($data);
	}
}