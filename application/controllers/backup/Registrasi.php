<?php  
defined("BASEPATH") or exit ("Error cannot handle your request");

/**
* 
*/
class Registrasi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelUser');
		$this->load->model('modelAnggota');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$model['title'] = 'Registrasi Akun';
		return $this->load->view('registrasi/form', $model);
	}

	public function cekdata()
	{
		$username = $this->input->post('username');
		$model = $this->modelAnggota->getOne($username);
		$datauser = $this->modelUser->getOne($username);
		$password = $this->input->post('password');
		$ulangpassword = $this->input->post('ulangpassword');

		if($datauser != NULL) {
			redirect('registrasi');
		}elseif($model != NULL AND $username == $model->username AND $password == $model->password AND $password == $ulangpassword) {
			$userbaru = array('username' => $username, 'password' => $password, 'bagian' => 'user');
			$this->modelUser->regis($userbaru);
			redirect('Toko/index');
		}elseif($model == NULL){
			redirect('registrasi');
		}else{
			redirect('registrasi');
		}
	}
}
?>