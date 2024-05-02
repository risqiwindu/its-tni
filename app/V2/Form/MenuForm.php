<?php

namespace App\V2\Form;

use Laminas\Form\Form;

class MenuForm extends Form {
    public function __construct($name = null)
    {
    	// we want to ignore the name passed
    	parent::__construct('user');
    	$this->setAttribute('method', 'post');



    	$this->add(array(
    		'name'=>'parent_id',
    	    'attributes' => array(
    	    'type'=>'text',
    	    		'class'=>'form-control ',
    	    		'required'=>'required',
    	        ),
    	    'options'=>array('label'=>__lang('Parent Id')),
    	));

    	$this->add(array(
    			'name'=>'name',
    	    'attributes' => array(
    			'type'=>'text',
    	    		'class'=>'form-control ',
    	    		'required'=>'required',
    	        ),
    			'options'=>array('label'=>__lang('Name')),
    	));

    	$this->add(array(
    			'name'=>'description',
    			'attributes' => array(
    					'type'=>'textarea',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Description')),
    	));

    	$this->add(array(
    			'name'=>'location',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Location')),
    	));


    }

}

?>
