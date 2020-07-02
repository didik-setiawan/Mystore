<?php 
/**
 * 
 */
class Login extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user')){
			redirect('home');
		}
	}
	
	public function index(){
		$data['title'] = 'Sign in | Mystore';
		$this->form_validation->set_rules('username','Email / No Telp','required|trim|min_length[5]');
		$this->form_validation->set_rules('pass','Password','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('templates-home/header',$data);
			$this->load->view('login/user');
			$this->load->view('templates-home/footer1');
		} else {
			$this->pv_login();
		}
	}

	private function pv_login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$this->db->like(['email' => $username]);
		$this->db->or_like(['no_telp' => $username]);
		$user = $this->db->get('tb_user')->row_array();

		if($user){
			if(password_verify($pass, $user['password'])){
				if($user['aktif'] == 1){
				$data = [
					'user' => $user['id']
				];
				$this->session->set_userdata($data);
				redirect('home');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akun anda sudah tidak aktif</div>');		
				redirect('login');
			}
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password salah</div>');		
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">User Tidak terdaftar</div>');		
				redirect('login');
		}
	}

	public function register(){
		$data['title'] = 'Register | Mystore';
		$this->form_validation->set_rules('nama','Nama Lengkap','required|trim|min_length[3]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('telp','No Telp','required|trim|min_length[10]|numeric|is_unique[tb_user.no_telp]');
		$this->form_validation->set_rules('pass','Password','required|trim|min_length[5]');
		$this->form_validation->set_rules('password','Konfirmasi Password','required|trim');
		if($this->form_validation->run() == false){

			$this->load->view('templates-home/header',$data);
			$this->load->view('login/register');
			$this->load->view('templates-home/footer1');
		} else {
			$this->input_data();
		}
	}

	public function input_data(){
		$pass = $this->input->post('pass');
		$config_pass = $this->input->post('password');

		if($pass == $config_pass){
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('telp'),
				'jk' => $this->input->post('jk'),
				'password' => password_hash($pass, PASSWORD_DEFAULT),
				'img' => 'images.png',
				'tgl_bergabung' => time(),
				'aktif' => 1
			];
			if($this->db->insert('tb_user',$data)){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Akun berhasil dibuat, silahkan login</div>');		
				redirect('login');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akun Gagal dibuat. Harap coba lagi</div>');		
				redirect('login/register');
			}
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password harus sama dengan konfirmasi password</div>');		
			redirect('login/register');
		}
	}
}