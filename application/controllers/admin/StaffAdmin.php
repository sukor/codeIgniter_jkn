<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffAdmin extends CI_Controller {


public function __construct(){

		parent::__construct();

		$this->load->model(['M_staff']);
		

	
	}

		public function index(){



      $d['stafflist']=$this->M_staff->get_list_staff();
          
            $d['title']='list staff';

      $d['content_main']=$this->load->view('staffadmin/liststaff',$d,true);
      $this->load->view('template_main',$d);


		}



		public function add_staff(){

			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			// die();

			$this->form_validation->set_rules('emailuser', 'Email staff', 'required|valid_email');
			$this->form_validation->set_rules('username', 'Usernama', 'required|is_unique[staff.username]|callback_checkusername');


			$this->form_validation->set_message('required', 'Sila isi %s');


			if ($this->form_validation->run() == FALSE)
                {

            $d['title']='add staff';

			$d['content_main']=$this->load->view('staffadmin/add',$d,true);
			$this->load->view('template_main',$d);




                }else{

    //             	[first_name] => sukor
    // [last_name] => muhammad
    // [emailuser] => sukor@gmail.com
    // [username] => sukor
    // [password] => 123

      $first_name=	$this->input->post('first_name', TRUE);
      $last_name=	$this->input->post('last_name', TRUE);
      $username=	$this->input->post('username', TRUE);
      $password=	$this->input->post('password', TRUE);
      $emailuser=	$this->input->post('emailuser', TRUE);

      $data=[
      		'first_name'=>$first_name,
      		'last_name'=>$last_name,
      		'username'=>$username,
      		'password'=>password_hash($password,PASSWORD_DEFAULT),
      		'email'=>$emailuser

      ];

    

      

      if($this->db->insert('staff',$data)){

      	$idstaff=$this->db->insert_id();

      	$this->session->set_flashdata('statusadd','telah berjaya');

        $datasend=[[
          'from'=>'sukor.muhammad@gmail.com',
          'from_name'=>"sukor",
          'to'=>$emailuser,
          'cc'=>'test@g.com',
          'subject'=>'new user',
          'message'=>'berjaya di tambah'

                  ]];

        $this->myemail->sendemailjpn($datasend);

      	redirect('admin/staffAdmin/detailstaff/'.$idstaff);

      }else{


      }



      

                }


			

	

		}


		 public function checkusername($str)
        {
                if ($str == 'admin')
                {
                        $this->form_validation->set_message('checkusername', 'perkataan admin {field} k boleh digunakan ');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }

        }


        public function detailstaff($id){



        	

        	 $d['staffdetail']=$this->M_staff->get_detail_staff($id);
        	
            $d['title']='detail staff';

			$d['content_main']=$this->load->view('staffadmin/detailstaff',$d,true);
			$this->load->view('template_main',$d);

        }


public function update($id){

  

    $d['staffdetail']=$this->M_staff->get_detail_staff($id);
          
            $d['title']='detail staff';


  $this->form_validation->set_rules('emailuser', 'Email staff', 'required|valid_email');
      $this->form_validation->set_rules('username', 'Usernama', 'required|callback_checkusername');


      $this->form_validation->set_message('required', 'Sila isi %s');


      if ($this->form_validation->run() == FALSE)
                {

      $d['content_main']=$this->load->view('staffadmin/update',$d,true);
      $this->load->view('template_main',$d);

                }else{


                  dprint($_POST);



                }





     

}




}
