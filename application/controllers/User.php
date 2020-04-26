<?php

class User extends CI_Controller{

	function __construct(){		
		parent::__construct();

	$this->load->model(array('Admin_model'));
    $this->load->library(array('form_validation','upload','image_lib','template','session'));
    $this->load->helper(array('form', 'url', 'html'));
	}

	//load form login
	function index(){
		if($this->session->userdata('id_user')){ // utk cek apakah session masih aktif / tidak
            $id_user      = $this->session->userdata('id_user'); // mengambil username dari session
			
			// $cek_pakan     = $this->User_model->cek_sesion($id_user,'pakan'); // cek status = siswa
            // $cek_toko     = $this->User_model->cek_sesion($id_user,'toko'); // cek status = guru
			// $cek_kantor     = $this->User_model->cek_sesion($id_user,'kantor'); // cek status = adminid_user
			// $cek_setoran     = $this->User_model->cek_sesion($id_user,'setoran'); // cek status = adminid_user

			if(isset($id_user)){
                //jika status = siswa >> lanjut ke beranda untuk siswa
				redirect('welcome');
            }else{
            	$this->logout();
            }
        }
        else{
            $this->load->view('user/login');
        }
	}

	public function login(){
		$this->load->library('form_validation'); // mengaktifkan form validation dari library
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus di isi');
            redirect('user');
        }else{
			
			$username  = $this->input->post('username');
			$password  = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => ($password),
				);
			$cek= $this->Admin_model->cek_login($where)->row();
			
            if(isset($cek)){
				$data_session = array(
					'id_user' => $cek->id_user,
					'logged_in' => true,
					'jabatan'	=>$cek->bagian,
					);
				$this->session->set_userdata($data_session);
				redirect(base_url("welcome"));
			}else{
				$this->session->set_flashdata('message', 'Login Gagal');
				redirect(site_url('user'));
			}
        }

	}

	//cek password dan username
	// function proses_login(){
	// 	$session_login=$this->session->userdata('logged_in');
	// 	if($session_login==true){
	// 		redirect('welcome');
	// 	}

	// 	//menangkap input
	// 	$username=$this->input->post('username','true');
	// 	$password=$this->input->post('password','true');

	// 	//pencarian data di databasr
	// 	$temp_account=$this->User_model->check_user_account($username,$password)->row();

	// 	//cek jumlah data dari hasil pencarian
	// 	$num_account=count($temp_account);

	// 	//validation
	// 	$this->form_validation->set_rules('username','Username','required');
	// 	$this->form_validation->set_rules('password','Password','required');

	// 	if($this->form_validation->run()==FALSE){
	// 		$this->load->view('user/login');
	// 	}
	// 	else{
	// 		if($num_account>0){

	// 			$session_nik=$this->session->userdata('id_user');

	// 			$array_items=array(
	// 				'id_user'		=> $temp_account->id_user,
	// 				'username'		=> $temp_account->username,
	// 				'nama_jabatan'	=> $temp_account->jabatan,
	// 				'nama_user'		=> $temp_account->nama_user,
	// 				'image'			=> $temp_account->image,
	// 				'logged_in'		=> true,
	// 			);
    //     			$this->session->set_userdata($array_items);
	// 				redirect(site_url('welcome'));
	// 		}
	// 		else{
	// 			$this->session->set_flashdata('notification','Username dan Password Salah');
	// 			redirect(site_url('user'));
	// 		}
	// 	}
	// }

	//logout
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('user'));
	}
}
?>
