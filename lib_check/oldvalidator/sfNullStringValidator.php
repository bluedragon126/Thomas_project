<?php

/**
 * @author siddhatech
 * @copyright 2011
 */

 class sfNullStringValidator extends sfValidatorString{
     public function mergeWith(sfValidatorString $template) {
	   $this->setOptions(array_merge($this->getOptions(), $template->getOptions()));
	   $this->setMessages(array_merge($this->getMessages(), $template->getMessages()));
	   return $this;
    }
    
     protected function doClean($value) {
	$value = parent::doClean($value);
	if($value == "") {
	    $value = null;
	}

	return $value;
    }
    
    public function isEmpty($value) {
	   return false;
    }
 }

?>