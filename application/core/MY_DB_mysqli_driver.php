<?php

class MY_DB_mysqli_driver extends CI_DB_mysqli_driver
{

    const INSERT = 'insert';
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_au =& get_instance();
        //echo
        log_message('debug', 'Extended DB driver class do not work');
        $this->_au->load->library('audit');

    }

    public function _insert($table, $keys, $values)
    {
        $sql = parent::_insert($table, $keys, $values);

        // Push variables
        $qb_set = $this->qb_set;
        $this->ar_set = array();

        $this->_create_audit($table, $sql, self::INSERT);

        //echo $sql;
        // Pop variables to execute insert
        $this->qb_set = $qb_set;

        return $sql;
    }

    function _insert_batch($table, $keys, $values)
    {
        $sql = parent::_insert_batch($table, $keys, $values);
        // Push variables
        $qb_set = $this->qb_set;
        $this->qb_set = array();

        $this->_create_audit($table, $sql, self::INSERT);

        // Pop variables to execute insert
        $this->qb_set = $qb_set;

        return $sql;
        //return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES ".implode(', ', $values);
    }

    public function _update($table, $values, $where = array(), $orderby = array(), $limit = FALSE, $like = array())
    {

        $sql = parent::_update($table, $values, $where, $orderby, $limit, $like);
        $sta = parent::affected_rows();

        // Push variables
        $qb_set = $this->qb_set;
        $this->qb_set = array();

        $this->_create_audit($table, $sql, self::UPDATE);


        // Pop variables
        $this->qb_set = $qb_set;

        return $sql;
    }

    public function _delete($table, $where = array(), $like = array(), $limit = FALSE)
    {

        $sql = parent::_delete($table, $where, $like, $limit);

        // Push variables
        //$qb_where = $this->qb_where;
        //$qb_like = $this->qb_like;

        $this->_create_audit($table, $sql, self::DELETE);
        //$this->query($sql);
        // Pop variables
        // $this->qb_where = $qb_where;
        // $this->qb_like = $qb_like;

        return $sql;
    }

    public function _create_audit($table, $sql, $type)
    {
        // Send this to the library (AUDIT)
        //to record in table audit
        // echo "masuk func";
        $this->_au->audit->record($table, $sql, $type);

    }


    public function insert_audit($table = '', $record = NULL)
    {

        $this->_reset_write();

        if (!is_null($record)) {
            $this->set($record);
        }


        if ($table == '') {
            if (!isset($this->qb_from[0])) {
                if ($this->db_debug) {
                    return $this->display_error('db_must_set_table');
                }

                return FALSE;
            }

            $table = $this->qb_from[0];
        }

        $sql = parent::_insert($table, array_keys($this->qb_set), array_values($this->qb_set));

        //$this->query($sql);
        $this->_reset_write();

        return $this->query($sql);
    }


}
