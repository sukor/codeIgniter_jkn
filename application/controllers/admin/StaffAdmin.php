<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffAdmin extends My_Controller {


public function __construct(){

		parent::__construct();

		$this->load->model(['M_staff']);
   // $this->lang->load('message','bahasa');
	


	
	}

		public function index(){


        $total_records = $this->M_staff->get_total();


      $d['stafflist']=$this->M_staff->get_list_staff($limit_per_page, $start_index);





          
            $d['title']='list staff';

      $d['content_main']=$this->load->view('staffadmin/liststaff',$d,true);
      $this->load->view('template_main',$d);


		}



		public function add_staff(){
$this->load->helper('language');  

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

    
//PASSWORD_BCRYPT
      

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


public function update($id=''){

  if(empty($id)){

$id=$this->input->post('staff_id',true);

  }else{

      $id=decryptInUrl($id);
  }









   $datastaff= $d['staffdetail']=$this->M_staff->get_detail_staff($id);
          
            $d['title']='detail staff';


  $this->form_validation->set_rules('emailuser', 'Email staff', 'required|valid_email');
      $this->form_validation->set_rules('username', 'Usernama', 'required|callback_checkusername');


      $this->form_validation->set_message('required', 'Sila isi %s');


            $config['upload_path']= './upload/';
      $config['allowed_types'] = 'gif|jpg|png';
      // $config['max_size'] = 100;
      // $config['max_width'] = 1024;
      // $config['max_height'] = 768;
      

       $this->upload->initialize($config);


      if ($this->form_validation->run() == FALSE )
                {






      $d['content_main']=$this->load->view('staffadmin/update',$d,true);
      $this->load->view('template_main',$d);

                }else{



             if ( ! $this->upload->do_upload('picture')) {
        $error = array('error' => $this->upload->display_errors());
        // print_r($error);
        // die();
        $statusupload=FALSE;
      }else{

        $data = array('upload_data' => $this->upload->data());
      }
      
    


      $first_name=  $this->input->post('first_name', TRUE);
      $last_name= $this->input->post('last_name', TRUE);
      $username=  $this->input->post('username', TRUE);
      $password=  $this->input->post('password', TRUE);
      $emailuser= $this->input->post('emailuser', TRUE);

      $data=[
          'first_name'=>$first_name,
          'last_name'=>$last_name,
          'username'=>$username,
          'email'=>$emailuser,
          'picture'=>'upload/'.$data['upload_data']['file_name'],


      ];

      if($password!=$datastaff->password){


        $data['password']=password_hash($password,PASSWORD_DEFAULT);

      }





      $this->db->set($data);
       $this->db->where('staff_id',$id);
        $this->db->update('staff',$data);

redirect('admin/staffAdmin/detailstaff/'.$id);



// dprint($datastaff->password);
// dprint($this->input->post('password',true));

                // if($datastaff->password==$this->input->post('password',true)){

                //     echo 'sama';



                // }





                 }





     

}


public function delete($id){

  $id=decryptInUrl($id);

  $this->db->delete('staff',"staff_id=$id");

      $this->session->set_flashdata('statusadd','telah berjaya padam');

  redirect('admin/staffAdmin/index');



}



public function getstaff(){

  

    // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));
          $search = $this->input->get("search");
           $columns = $this->input->get("columns");
      // dprint($_GET);
         // $start=empty($start)?10:$start;
          
          $books = $this->M_staff->getstaff($start,$length,
            $search,$columns);

          $data = array();

          foreach($books as $r) {
            $editbtn=site_url('admin/staffAdmin/update/'.encryptInUrl($r->staff_id));
            $button='<a aria-pressed="true" type="button" href="'.$editbtn.'" class="btn btn-info" ></i> Edit</a>';

               $data[] = array(
                    $r->first_name.''.$r->last_name,
                    $r->email,
                    $r->username,
                     $button,
                  
               );
          }
$total_records = $this->M_staff->get_total();
          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $total_records,
                 "recordsFiltered" =>  $total_records,
                 "data" => $data
            );
          echo json_encode($output);
          exit();
}


}
