<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * Date: 2/18/16
 * Time: 2:14 PM
 */
abstract class ActiveRecordBase extends CI_Model
{

    protected $db;
    protected $table_name;
    protected $code_field;
    const ACTIVE_NAME = 'active';
    const DELETED_NAME = 'inactive';
    const STATUS_TABLE = 'statuses';

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database(  'default',
                                            TRUE);
    }

    /**
     * This function was created to enable getById and getByName, or any field that the table has.
     * @param $name Name of the function
     * @param $arguments Value
     * @return null
     *
     */
    public function __call($name, $arguments)
    {

        $method_name_array = explode('By',$name);
        $field_name = strtolower($method_name_array[1]);
        $field_value = $arguments[0];

        $active_id = $this->getActiveStatusId();
        $result = $this->db->where($field_name, $field_value)
            ->get($this->table_name);

        if( $result->num_rows() )
        {
            $data = $result->result_array();
            return $data;

        }

        return NULL;

    }

    /**
     * Select record details
     * @param $id
     * @return mixed or null
     */
    public function get($id)
    {

        $result = $this->db ->where( 'id', $id )
                            ->get($this->table_name);


        if( $result->num_rows() )
        {
            $data = $result->result_array();
            return $data[0];

        }

        return NULL;
    }

    /**
     * Select all records from the selected table
     * @return mixed or null
     */
    public function all()
    {

        //$active_id = $this->getActiveStatusId();
        $result = $this->db
                            //->where('status_id', $active_id)
                            ->get($this->table_name);

        if( $result && $result->num_rows() )
        {
            $data = $result->result_array();
            return $data;

        }

        return NULL;

    }

    public function update($id, $new_values)
    {

        $result = $this->db   ->where('id', $id)
                    ->update(   $this->table_name,
                        $new_values
                    );
        return $result;
    }

    public function create($create_values)
    {

        $result = $this->db   ->insert(   $this->table_name,
                                          $create_values
        );
        //echo $this->db->last_query();
        if($result)
        {
            //$insert_id = $this->db->insert_id();
            return $this->db->insert_id();
        }
        return $result;
    }

    /**
     * Logical delete. It only changes its status_id to a deleted state.
     * @param $id
     */
    public function delete($id)
    {

        $deleted_id = $this->getDeletedStatusId();
        $data['status_id'] = $deleted_id;
        $this->db   ->where('id', $id)
                    ->update(   $this->table_name,
                                $data
        );

    }

    /**
     * Physical delete. It Deletes the record from the DB.
     * @param $id
     */
    public function destroy($id)
    {
        $this->db   ->where(    'id',
                                $id)
                    ->delete($this->table_name);
    }

    /**
     * Returns the id of the delete status
     * @return null or active_id
     */
    public function getDeletedStatusId()
    {

        $result = $this->db ->where(    'name',
                                        SELF::DELETED_NAME )
                            ->get(SELF::STATUS_TABLE);


        $this->db->reset_query();

        if( $result->num_rows() )
        {
            $data = $result->result_array();
            return $data[0]['id'];

        }

        return NULL;
    }

    /**
     * Returns the id of the active status
     * @return null or active_id
     */
    public function getActiveStatusId()
    {

        $this->db->reset_query();

        $result = $this->db ->where(    'name',
                                        SELF::ACTIVE_NAME )
                            ->get(SELF::STATUS_TABLE);
        //echo $this->db->last_query();

        //$this->db->reset_query();

        if( $result && $result->num_rows() )
        {
            $data = $result->result_array();
            return $data[0]['id'];

        }

        return NULL;
    }

}