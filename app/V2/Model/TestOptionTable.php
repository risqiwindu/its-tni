<?php
/**
 * Created by PhpStorm.
 * User: USER PC
 * Date: 2/1/2017
 * Time: 1:35 PM
 */

namespace App\V2\Model;


use App\Lib\BaseTable;
use Laminas\Db\Sql\Select;
use Laminas\Paginator\Adapter\DbSelect;
use Laminas\Paginator\Paginator;

class TestOptionTable extends BaseTable {
    protected $tableName = 'test_options';
    //protected $primary = 'test_option_id';

    public function getTotalOptions($id){
        $total = $this->tableGateway->select(['test_question_id'=>$id])->count();
        return $total;
    }

    public function getOptionRecords($id){
        $rowset = $this->tableGateway->select(['test_question_id'=>$id]);
        return $rowset;
    }


    public function getOptionRecordsPaginated($paginated=false,$id=null)
    {
        $select = new Select($this->tableName);
        $select->order($this->primary.' desc');
        $select->where(['test_question_id'=>$id]);

        if($paginated)
        {
            $paginatorAdapter = new DbSelect($select,$this->tableGateway->getAdapter());
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }

        $resultSet = $this->tableGateway->selectWith($select);
        return $resultSet;
    }



    public function clearIsCorrect($id){
        $this->tableGateway->update(['is_correct'=>0],['test_question_id'=>$id]);
    }

}
