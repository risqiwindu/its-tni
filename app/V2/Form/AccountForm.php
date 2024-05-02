<?php

namespace App\V2\Form;

use App\V2\Model\RoleTable;
use App\Lib\BaseForm;
use Laminas\Form\Form;

class AccountForm extends BaseForm {
    public function __construct($name = null,$sm)
    {
    	// we want to ignore the name passed
    	parent::__construct('user');
    	$this->setAttribute('method', 'post');



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

    	$this->add(array(
    		'name'=>'email',
    	    'attributes' => array(
    	    'type'=>'email',
    	    'class'=>'form-control ',
    	    		'required'=>'required',
    	        ),
    	    'options'=>array('label'=>__lang('Email')),
    	));


        $rolesTable = new RoleTable($sm);
        $roles = $rolesTable->getRecords();

        $options = [];
        foreach($roles as $row){
            $options[$row->role_id]=$row->role;
        }

        $this->createSelect('role_id','Role',$options,true);
        $this->createSelect('notify','Receive Notifications',['1'=>'Yes','0'=>'No'],true,false);

        $this->createPassword('password','Password',true);
        $this->createPassword('confirm_password','Confirm Password',true);

        $this->createTextArea('account_description','About');

        $this->add(array(
            'name'=>'picture',
            'attributes' => array(
                'type'=>'hidden',
                'class'=>'form-control ',
                'required'=>'required',
                'id'=>'image'
            ),
            'options'=>array('label'=>__lang('Picture')),
        ));

        $this->createSelect('account_status','Status',['1'=>__lang('Enabled'),'0'=>__lang('Disabled')],true,false);

    }

}

?>
