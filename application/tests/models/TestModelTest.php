<?php

require_once(__DIR__.'/../CITestCase.php');
require_once(__DIR__.'/../CIUtilities.php');
/**
 * Created by PhpStorm.
 * Date: 2/22/16
 * Time: 1:18 PM
 */
class TestModelTest extends CITestCase
{

    protected $CI;
    protected $Utilities;
    protected $CIModel;
    private $table_name = 'test';

    public function setUp()
    {
        $this->CI = &get_instance();
        $this->Utilities = new CIUtilities();
        $this->Utilities->clean();
        $this->Utilities->populate();
        $this->CI->load->model('Tests');
        $this->CIModel = new Tests();


    }

    /**
     *   @group test_group
     **/
    public function testSelectAll()
    {
        $result_set = $this->CIModel->all();
        $this->assertCount(2,$result_set, 'Array should have 2 elements');
    }

    /**
     *   @group test_group
     **/
    public function testSelectOne()
    {
        $result_set = $this->CIModel->get(1);
        $this->assertEquals('1', $result_set['id'], 'Id should be 1');
        $this->assertEquals('test1', $result_set['name'], 'Name should be test1');
    }

    /**
     *   @group test_group
     **/
    public function testCreateOne()
    {
        $data['name'] = 'test3';
        $data['description'] = 'Creating';
        $inserted_id = $this->CIModel->create($data);


        $result_set = $this->CIModel->all();
        $this->assertCount(3,$result_set, 'Array should have 3 elements');

        $result_set = $this->CIModel->get($inserted_id);

        $this->assertEquals($inserted_id, $result_set['id'], 'Id should be ' . $inserted_id);
        $this->assertEquals($data['name'], $result_set['name'], 'Name should be ' . $data['name']);
        $this->assertEquals($data['description'], $result_set['description'], 'Desc should be ' . $data['description']);
    }

    /**
     *   @group test_group
     **/
    public function testUpdateOne()
    {

        $all = $this->CIModel->all();

        $data['name'] = 'test new';
        $data['description'] = 'Creating new';
        $this->CIModel->update($all[0]['id'], $data);


        $result_set = $this->CIModel->all();
        $this->assertCount(2,$result_set, 'Array should have 2 elements');

        $result_set = $this->CIModel->get($all[0]['id']);

        $this->assertEquals($all[0]['id'], $result_set['id'], 'Id should be ' . $all[0]['id']);
        $this->assertEquals($data['name'], $result_set['name'], 'Name should be test3');
        $this->assertEquals($data['description'], $result_set['description'], 'Desc should be Creating');
    }

}