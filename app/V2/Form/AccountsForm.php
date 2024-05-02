<?php

namespace App\V2\Form;

use App\Lib\BaseForm;
use Laminas\Form\Form;

class AccountsForm extends BaseForm{
    public function __construct($name = null)
    {
    	// we want to ignore the name passed
    	parent::__construct('user');
    	$this->setAttribute('method', 'post');



    	$this->add(array(
    			'name'=>'username',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Username')),
    	));

    	$this->add(array(
    			'name'=>'password',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Password')),
    	));

    	$this->add(array(
    			'name'=>'account_type',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Account Type')),
    	));

    	$this->add(array(
    			'name'=>'access_level',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Access Level')),
    	));


    	$this->add(array(
    		'name'=>'email',
    	    'attributes' => array(
    	    'type'=>'email',
    	    'class'=>'form-control ',
    	    		'required'=>'required',
    	        ),
    	    'options'=>array('label'=>__lang('Email')),
    	));

    	$this->add(array(
    			'name'=>'first_name',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Firstname')),
    	));

    	$this->add(array(
    			'name'=>'last_name',
    			'attributes' => array(
    					'type'=>'text',
    					'class'=>'form-control ',
    					'required'=>'required',
    			),
    			'options'=>array('label'=>__lang('Lastname')),
    	));

        $this->createTextArea('account_description','About');

    }

}

?>
