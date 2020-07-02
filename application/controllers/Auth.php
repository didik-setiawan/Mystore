<?php 
/**
 * 
 */
class Auth extends CI_Controller
{
	
public function index(){
	$this->form_validation->set_rules('username','Username','required|trim');
	$this->form_validation->set_rules('password','Password','required|trim');

	if($this->form_validation->run() == false){

	$data['title'] = 'Sign in | Admin Mystore';
	$this->load->view('templates-home/header',$data);
	$this->load->view('login/admin');
	$this->load->view('templates-home/footer1');
} else {
	$this->pv_login();
}
}

private function pv_login(){
	$username = $this->input->post('username');
	$pass = $this->input->post('password');
	$admin = $this->db->get_where('tb_admin',['username' => $username])->row_array();

	if($admin){
		if(password_verify($pass, $admin['password'])){
			$data = [
				'admin' => $admin['id']
			];
			$this->session->set_userdata($data);
			redirect('dashboard/home');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password Salah</div>');
		redirect('auth');
		}
	} else {
		$this->session->set_flashdata('pesan','<div class="alert alert-danger">Username Tidak Ditemukan</div>');
		redirect('auth');
	}
}

public function logout(){
	$this->session->sess_destroy();
	redirect('auth');
}
}