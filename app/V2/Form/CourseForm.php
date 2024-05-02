<?php

namespace App\V2\Form;

use App\Lib\BaseForm;

use App\User;
use App\V2\Model\SessionCategoryTable;
use Laminas\Form\Form;

class CourseForm extends BaseForm {
    public function __construct($name = null,$type=null)
    {
        // we want to ignore the name passed
        parent::__construct('user');
        $this->setAttribute('method', 'post');


        $this->add(array(
            'name'=>'session_name',
            'attributes' => array(
                'type'=>'text',
                'class'=>'form-control',
                'required'=>'required',
            ),
            'options'=>array('label'=>__lang('Course Name')),
        ));


        $this->add(array(
            'name'=>'session_date',
            'attributes' => array(
                'type'=>'text',
                'class'=>'form-control date',
            ),
            'options'=>array('label'=>__lang('Session Date')),
        ));

        $this->add(array(
            'name'=>'session_end_date',
            'attributes' => array(
                'type'=>'text',
                'class'=>'form-control date',
            ),
            'options'=>array('label'=>__lang('Session End Date')),
        ));

        $this->add(array(
            'name'=>'enrollment_closes',
            'attributes' => array(
                'type'=>'text',
                'class'=>'form-control date',
            ),
            'options'=>array('label'=>__lang('Enrollment Closes')),
        ));


        $this->createSelect('payment_required','Payment Required',['0'=>__lang('No'),'1'=>__lang('Yes')],true,false);
        $this->createText('amount','Course Fee',false,'form-control digit',null,__lang('digits-only-optional'));
        $this->createSelect('session_status','Status',array('0'=>__lang('Disabled'),'1'=>__lang('Enabled')),true,false);




        $this->createTextArea('description','Description');
        $this->get('description')->setAttribute('id','description');


/*        $lessonsTable = new LessonTable($serviceLocator);
        $rowset = $lessonsTable->getLimitedLessonRecords($type,5000);
        foreach($rowset as $row)
        {
            //    $this->createCheckbox('lesson_'.$row->lesson_id,$row->lesson_name,$row->lesson_id);

            $this->add(array(
                'name'=>'lesson_'.$row->lesson_id,
                'type' => 'Laminas\Form\Element\Checkbox',
                'attributes'=> ['class'=>'cbox'],
                'options'=>array('label'=>$row->lesson_name,'label_attributes'=>array('class'=>'control-label'),'checked_value'=>$row->lesson_id,'unchecked_value'=>0,'disable_inarray_validator' => true),
            ));
            $this->createText('lesson_date_'.$row->lesson_id,'Date',false,'date form-control',null,'Opening Date (optional)');
            $this->createText('sort_order_'.$row->lesson_id,'Sort Order',false,'number sort_field form-control',$row->sort_order);

        }*/

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


        $this->createSelect('enable_discussion','Enable Discussions',['1'=>__lang('Yes'),'0'=>__lang('No')],true,false);
        $this->createSelect('enable_forum','Enable Forum',['1'=>__lang('Yes'),'0'=>__lang('No')],true,false);

        $this->createSelect('enable_chat','Enable Live Chat',['1'=>__lang('Yes'),'0'=>__lang('No')],true,false);

        $this->createSelect('enforce_order','Enforce Class Order',['0'=>__lang('No'),'1'=>__lang('Yes')],true,false);

        $sessionCategoryTable = new SessionCategoryTable();
        $options = $sessionCategoryTable->getAllCategories();
        $this->createSelect('session_category_id[]','Course Categories (optional)',$options,false);
        $this->get('session_category_id[]')->setAttribute('multiple','multiple');
        $this->get('session_category_id[]')->setAttribute('class','form-control select2');

        $this->createText('effort','Effort',false,null,null,__lang('six-hours-per-week'));
        $this->createText('length','Length',false,null,null,__lang('ten-weeks'));
        $this->createTextArea('short_description','Short Description',true);
        $this->get('short_description')->setAttribute('maxlength',300);
        $this->createTextArea('introduction','introduction',false);
        $this->get('introduction')->setAttribute('id','introduction');


        $rowset = User::has('admin')->where('role_id',1)->orderBy('name')->limit(3000)->get();
        $options = [];
        foreach($rowset as $row){
            $options[$row->admin->id]= $row->name.' ('.$row->email.')';
        }

        $this->createSelect('session_instructor_id[]','course-instructors-(optional)',$options,false);
        $this->get('session_instructor_id[]')->setAttribute('multiple','multiple');
        $this->get('session_instructor_id[]')->setAttribute('class','form-control select2');
        $this->createText('capacity',__lang('capacity'),false,'form-control digit',null,__lang('digits-only-optional'));
        $this->createSelect('enforce_capacity','Enforce Capacity',['0'=>__lang('No'),'1'=>__lang('Yes')],true,false);

    }

}

?>
