<?php

class Audit
{
    const INSERT = 'insert';
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function __construct()
    {
        $this->_cd =& get_instance();

    }

    public function record($table, $sql, $type)
    {
        $this->_cd->db->reset_query();

       // $user = $this->_cd->ion_auth->user()->row();

        $user ='';

        $audit_table = str_replace('`', '', $table);
        $staff_id = 0;
        $ip_address = 0;

     $statuslogin=$this->_cd->session->userdata('logged_in');       

        if ($statuslogin==1) {
            $staff_id = $this->_cd->session->userdata('staff_id');
           
            $staff_name = $this->_cd->session->userdata('username');
        }

         $ip_address = getUserIP();


        if ( $audit_table != 'sessions') {
            $class = $this->_cd->router->fetch_class();
            $method = $this->_cd->router->fetch_method();

            $log_data = array('trail_operation' => $type,
                'trail_date' => date("d-m-Y h:i A"),
                'trail_sql' => $sql,
                'trail_table' => $audit_table,
                'trail_address' => $ip_address,
                'trail_function' => $class."/".$method,
                'staff_id' => $staff_id,
                'staff_username'=> $staff_name);

            // dprint($log_data);
            // die();

            $tod = $this -> _cd -> db;
            $tod->insert_audit('audit_trail', $log_data);
        }
    }

    public function check_data($table = '', $values = array(), $where = array(), $orderby = array(), $limit = FALSE, $like = array())
    {
        foreach ($where as $key => $value) {
            print_r($key);
            print_r($value);
        }
        if (isset($table)) {
            $tod = $this->_cd->db;
            $tod->select('*');
            $tod->from($table);

            $query = $tod->get();

            if ($query->num_rows() > 0) {

                $row = $query->result();
            }

            print_r($row);


        }
    }
}

?>
