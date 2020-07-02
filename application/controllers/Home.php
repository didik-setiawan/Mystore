<?php 
/**
 * 
 */
class Home extends CI_Controller
{

	public function index(){
		$data['title'] = 'Home | Mystore';
		$this->db->order_by('id','RANDOM');
		$data['barang'] = $this->db->get('tb_barang')->result_array();
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('barang',$cari);
			$data['barang'] = $this->db->get('tb_barang')->result_array();
		}
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();

		$this->db->order_by('id','RANDOM');
		$this->db->limit(5);
		$data['produk'] = $this->db->get('tb_produk')->result_array();

		$this->load->view('templates-home/head1',$data);
		$this->load->view('home/index',$data);
		$this->load->view('templates-home/footer');
	}

	public function detail_barang($id){
		$data['title'] = 'Detail Barang | Mystore';
		$data['barang'] = $this->db->get_where('tb_barang',['id' => $id])->row_array();
		$this->db->limit(5);
		$this->db->order_by('id','RANDOM');
		$data['b'] = $this->db->get('tb_barang')->result_array();
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();
		$this->form_validation->set_rules('qty','Pesan','required|trim|min_length[1]');
		if($this->form_validation->run() == false){
			$this->load->view('templates-home/head1',$data);
			$this->load->view('home/detail',$data);
			$this->load->view('templates-home/footer');
		} else {
			$this->add_cart($id);
		}
	}

	public function add_cart($id){
		$barang = $this->db->get_where('tb_barang',['id' => $id])->row_array();
		if($barang['diskon'] == 0){
			$price = $barang['harga'];
		} else {
			$price = $barang['harga_diskon'];
		}
		$data = [
			'id' => $barang['id'],
			'qty' => $this->input->post('qty'),
			'price' => $price,
			'name' => $barang['barang']
		];
		$this->cart->insert($data);
		redirect('home/cart');
	}

	public function cart(){
		$data['title'] = 'Keranjang | Mystore';
		$data['cart'] = $this->cart->contents();
		$this->db->limit(5);
		$this->db->order_by('id','RANDOM');
		$data['b'] = $this->db->get('tb_barang')->result_array();
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();
		$this->load->view('templates-home/head1',$data);
		$this->load->view('home/cart',$data);
		$this->load->view('templates-home/footer');
	}

	public function trash($rowid){
		$this->cart->remove($rowid);
		redirect('home/cart');
	}

	public function kosong_keranjang(){
		$this->cart->destroy();
		redirect('home/cart');
	}

	public function check(){
		if(!$this->session->userdata('user')){
			redirect('login');
		} else {
			$data = [
				'akses' => 'akses'
			];
			$this->session->set_userdata($data);
			redirect('home/checkout');
		}
	}

	public function kembali(){
		$this->session->unset_userdata('akses');
		redirect('home/cart');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	public function checkout(){
		if(!$this->session->userdata('akses')){
			redirect('home/cart');
		}

		if (!$this->cart->contents()) {
			redirect('home/cart');
		}
		$data['title'] = 'Checkout | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();

		$this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]');
		$this->form_validation->set_rules('alamat','Alamat','required|trim|min_length[6]');
		$this->form_validation->set_rules('pos','Kodepos','required|trim|min_length[5]');

		if($this->form_validation->run() == false){

			$this->load->view('templates-home/head1',$data);
			$this->load->view('home/checkout',$data);
			$this->load->view('templates-home/footer');
		} else {
			$id = time();

			$order = [
				'id' => $id,
				'id_user' => $data['user']['id'],
				'alamat' => $this->input->post('alamat'),
				'kodepos' => $this->input->post('pos'),
				'jumlah' => $this->cart->total_items(),
				'total' => $this->cart->total(),
				'tgl_pesan' => date('Y-m-d'),
				'status' =>'pending',
				'batas_bayar' => date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y"))),
				'bayar' => 'belum'
			];

			if($this->db->insert('tb_order',$order)){
				foreach ($this->cart->contents() as $key) {
					$detail = [
						'id' => $id,
						'id_user' => $data['user']['id'],
						'id_brg' => $key['id'],
						'jumlah' => $key['qty'],
						'subtotal' => $key['subtotal']
					];
					$this->db->insert('tb_detail_order',$detail);


					$barang = $this->db->get_where('tb_barang',['id' => $key['id']])->row_array();
					$stok = $barang['stok'] - $key['qty'];
					$this->db->set('stok',$stok);
					$this->db->where(['id' => $barang['id']]);
					$this->db->update('tb_barang');
					$this->cart->destroy();

				}
				
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Checkout Berhasil</div>');
				redirect('home/pesanan');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Checkout Gagal</div>');
				redirect('home/checkout');
			}
		}
	}

	public function pesanan(){

		if(!$this->session->userdata('user')){
			redirect('home');
		}

		$data['title'] = 'Pesanan | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();
		$id = $data['user']['id'];
		$d = $this->input->get('id');

		$query = "SELECT * FROM tb_user INNER JOIN tb_order ON tb_user.id = tb_order.id_user WHERE tb_user.id = $id ORDER BY tb_order.id DESC";
		$data['pesan'] = $this->db->query($query)->result_array();

		$q = "SELECT * FROM tb_barang INNER JOIN tb_detail_order ON tb_barang.id = tb_detail_order.id_brg WHERE tb_detail_order.id_user = $id";
		$data['barang'] = $this->db->query($q)->result_array();
		
		$this->load->view('templates-home/head1',$data);
		$this->load->view('home/pesanan',$data);
		$this->load->view('templates-home/footer');
	}

	public function detail_pesan($id){
		if(!$this->session->userdata('user')){
			redirect('home');
		}

		$data['title'] = 'Detail Pesanan | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();
		$ids = $data['user']['id'];

		$query = "SELECT * FROM tb_user INNER JOIN tb_order ON tb_user.id = tb_order.id_user WHERE tb_user.id = $ids AND tb_order.id = $id";
		$data['pesan'] = $this->db->query($query)->row_array();

		$q = "SELECT * FROM tb_barang INNER JOIN tb_detail_order ON tb_barang.id = tb_detail_order.id_brg WHERE tb_detail_order.id = $id";
		$data['barang'] = $this->db->query($q)->result_array();

		if(!$data['pesan']){
			redirect('home/pesanan');
		}

		$this->load->view('templates-home/head1',$data);
		$this->load->view('home/detail_pesan',$data);
		$this->load->view('templates-home/footer');
	}

	public function profile(){
		if(!$this->session->userdata('user')){
			redirect('home');
		}
		$data['title'] = 'Profile | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();

		$this->load->view('templates-home/head1',$data);
		$this->load->view('home/profile',$data);
		$this->load->view('templates-home/footer');
	}

	public function change_pass(){
		if(!$this->session->userdata('user')){
			redirect('home');
		}
		$data['title'] = 'Ubah Password | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();

		$this->form_validation->set_rules('pl','Password Lama','trim|required');
		$this->form_validation->set_rules('pb','Password Baru','trim|required|min_length[5]');
		$this->form_validation->set_rules('kp','Konfirmasi Password Baru','trim|required');

		if($this->form_validation->run() == false){

			$this->load->view('templates-home/head1',$data);
			$this->load->view('home/change_pass');
			$this->load->view('templates-home/footer');
		} else {
			$old_pass = $this->input->post('pl');
			$new_pass = $this->input->post('pb');
			$cofrm_pass = $this->input->post('kp');

			if(password_verify($old_pass, $data['user']['password'])){
				if($new_pass == $cofrm_pass){
					if($new_pass != $old_pass){
						$password = password_hash($new_pass, PASSWORD_DEFAULT);
						$this->db->set('password',$password);
						$this->db->where(['id' => $this->session->userdata('user')]);
						if($this->db->update('tb_user')){
							$this->session->set_flashdata('pesan','<div class="alert alert-success">Password Berhasil Di Ubah</div>');
							redirect('home/profile');
						} else {
							$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password Gagal Di Ubah</div>');
							redirect('home/change_pass');
						}
					} else {
						$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password Baru Tidak Boleh Sama Dengan Password Lama</div>');
						redirect('home/change_pass');
					}

				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password Baru Harus Sama Dengan Konfirmasi Password</div>');
					redirect('home/change_pass');
				}
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password Lama Salah</div>');
				redirect('home/change_pass');
			}
		}
	}

	public function edit_profile(){
		if(!$this->session->userdata('user')){
			redirect('home');
		}
		$data['title'] = 'Edit Profile | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();

		$this->form_validation->set_rules('nama','Nama Lengkap','trim|required|min_length[3]');
		$this->form_validation->set_rules('telp','No Telp','trim|required|min_length[9]|numeric');

		if($this->form_validation->run() == false){

			$this->load->view('templates-home/head1',$data);
			$this->load->view('home/edit_profile',$data);
			$this->load->view('templates-home/footer');
		} else {
			$img = $_FILES['img'];
			if($img){
				$config['upload_path']          = './assets/img/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2000;

				$this->load->library('upload',$config);

				if($this->upload->do_upload('img')){
					$old_img = $data['user']['img'];
					if($old_img != 'images.png'){
						unlink(FCPATH .'assets/img/'. $old_img);
					}
					$gambar = $this->upload->data('file_name');
				} else {
					$gambar = $data['user']['img'];
				}
			}

			$nama = $this->input->post('nama');
			$no_telp = $this->input->post('telp');
			

			$this->db->set('nama',$nama);
			$this->db->set('no_telp',$no_telp);
			$this->db->set('img',$gambar);

			$this->db->where(['id' => $data['user']['id']]);
			if($this->db->update('tb_user')){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Profile Berhasil Di Edit</div>');
				redirect('home/profile');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Profile Gagal Di Edit</div>');
				redirect('home/edit_profile');
			}

		}
	}

	public function produk($id){
		$data['barang'] = $this->db->get_where('tb_barang',['id_produk' => $id])->result_array();
		$data['title'] = 'Produk | Mystore';
		$data['user'] = $this->db->get_where('tb_user',['id' => $this->session->userdata('user')])->row_array();
		$this->load->view('templates-home/head1',$data);
		$this->load->view('home/produk',$data);
		$this->load->view('templates-home/footer');
	}

}