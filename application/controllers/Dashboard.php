<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');	
		if(!$this->session->userdata('admin')){
			redirect('auth');
		}	
	}
	
	public function home(){
		$data['title'] = 'Dashboard | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['user'] = $this->db->get('tb_user')->num_rows();
		$data['barang'] = $this->db->get('tb_barang')->num_rows();
		$m = date('m');
		$y = date('Y');
		$sql = "SELECT * FROM tb_order WHERE year(tgl_pesan) = $y AND month(tgl_pesan) = $m";
		$data['order'] = $this->db->query($sql)->num_rows();

		$data['jumlah'] = $this->db->query("SELECT SUM(total) AS jumlah FROM tb_order WHERE year(tgl_pesan) = $y AND month(tgl_pesan) = $m")->row()->jumlah;

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/index',$data);
		$this->load->view('templates/footer');
	}

	public function merk(){
		$data['title'] = 'Merk | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['merk'] = $this->db->get('tb_merk')->result_array();
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('merk',$cari);
			$data['merk'] = $this->db->get('tb_merk')->result_array();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/merk',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_merk(){
		$this->form_validation->set_rules('merk','Merk','required|trim|min_length[3]');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Kesalahan penulisan, harap coba lagi</div>');
			redirect('dashboard/merk');
		} else {
			$data = [
				'merk' => $this->input->post('merk',true)
			];
			if($this->db->insert('tb_merk',$data)){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data merk berhasil ditambahkan</div>');
				redirect('dashboard/merk');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data merk gagal ditambahkan</div>');
				redirect('dashboard/merk');
			}
		}
	}

	public function hapus_merk($id){
		if($this->db->delete('tb_merk',['id' => $id])){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data merk berhasil dihapus</div>');
			redirect('dashboard/merk');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data merk gagal dihapus</div>');
			redirect('dashboard/merk');
		}
	}

	public function edit_merk($id){
		$data['title'] = 'Edit Merk | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['mark'] = $this->db->get_where('tb_merk',['id' => $id])->row_array();

		$this->form_validation->set_rules('merk','Merk','required|trim|min_length[3]');
		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/edit_merk',$data);
			$this->load->view('templates/footer');
		} else {
			$merk = $this->input->post('merk',true);
			$this->db->set('merk',$merk);
			$this->db->where(['id' => $id]);
			if($this->db->update('tb_merk')){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data merk berhasil diubah</div>');
				redirect('dashboard/merk');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data merk gagal diubah</div>');
				redirect('dashboard/merk');
			}
		}
	}

	public function produk(){
		$data['title'] = 'Produk | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['produk'] = $this->db->get('tb_produk')->result_array();
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('produk',$cari);
			$data['produk'] = $this->db->get('tb_produk')->result_array();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/produk',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_produk(){
		$this->form_validation->set_rules('produk','produk','trim|required|min_length[3]');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Kesalahan penulisan, harap coba lagi</div>');
			redirect('dashboard/produk');
		} else {
			$data = [
				'produk' => $this->input->post('produk',true)
			];
			if($this->db->insert('tb_produk',$data)){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil di tambahkan</div>');
				redirect('dashboard/produk');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data produk gagal ditambahkan</div>');
				redirect('dashboard/produk');
			}
		}
	}

	public function hapus_produk($id){
		if($this->db->delete('tb_produk',['id' => $id])){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil dihapus</div>');
			redirect('dashboard/produk');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data produk gagal dihapus</div>');
			redirect('dashboard/produk');
		}
	}

	public function edit_produk($id){
		$data['title'] = 'Edit Produk | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['produk'] = $this->db->get_where('tb_produk',['id' => $id])->row_array();

		$this->form_validation->set_rules('produk','Produk','required|trim|min_length[3]');
		if($this->form_validation->run() == false){

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/edit_produk',$data);
			$this->load->view('templates/footer');
		} else {
			$produk = $this->input->post('produk',true);
			$this->db->set('produk',$produk);
			$this->db->where(['id' => $id]);
			if($this->db->update('tb_produk')){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil diedit</div>');
				redirect('dashboard/produk');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data produk gagal diedit</div>');
				redirect('dashboard/produk');
			}
		}
	}

	public function barang(){
		$data['title'] = 'Barang | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['barang'] = $this->db->get('tb_barang')->result_array();
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('barang',$cari);
			$data['barang'] = $this->db->get('tb_barang')->result_array();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/barang',$data);
		$this->load->view('templates/footer');
	}

	public function add_barang(){
		$data['title'] = 'Tambah Barang | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$this->db->order_by('merk','ASC');
		$data['merk'] = $this->db->get('tb_merk')->result_array();
		$this->db->order_by('produk','ASC');
		$data['produk'] = $this->db->get('tb_produk')->result_array();

		$this->form_validation->set_rules('barang','Nama Barang','trim|required|min_length[3]');
		$this->form_validation->set_rules('harga','Harga','trim|required|min_length[3]|numeric');
		$this->form_validation->set_rules('stok','Stok','trim|required|min_length[1]|numeric');
		$this->form_validation->set_rules('deskripsi','Deskripsi','trim|required|min_length[10]');

		if($this->form_validation->run() == false){

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/tambah_barang',$data);
			$this->load->view('templates/footer');
		} else { 
			$this->tambah_barang();
		}
	}

	public function tambah_barang(){
		$img = $_FILES['img'];

		if($img){
			$config['upload_path']          = './assets/upload/img/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2000;

			$this->load->library('upload',$config);

			if($this->upload->do_upload('img')){
				$gambar = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Kesalahan upload gambar, harap coba lagi</div>');
				redirect('dashboard/add_barang');
			}
		} else {
			$gambar = 'default.png';
		}

		$data = [
			'id_merk' => $this->input->post('merk'),
			'id_produk' => $this->input->post('produk'),
			'barang' => $this->input->post('barang'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
			'img' => $gambar,
			'tgl_upload' => time(),
			'date_update' => time(),
			'deskripsi' => $this->input->post('deskripsi'),
			'diskon' => 0,
			'harga_diskon' => 0
		];

		if($this->db->insert('tb_barang',$data)){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diupload</div>');
			redirect('dashboard/barang');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data barang gagal diupload</div>');
			redirect('dashboard/add_barang');
		}

	}

	public function hapus_barang($id){
		$b = $this->db->get_where('tb_barang',['id' => $id])->row_array();
		$img = $b['img'];
		unlink(FCPATH .'assets/upload/img/'. $img);
		if($this->db->delete('tb_barang',['id' => $id])){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil dihapus</div>');
			redirect('dashboard/barang');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal dihapus</div>');
			redirect('dashboard/barang');
		}
	}

	public function detail_barang($id){
		$data['title'] = 'Detail Barang | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$b = "SELECT * FROM tb_barang RIGHT JOIN tb_merk ON tb_barang.id_merk = tb_merk.id WHERE tb_barang.id = $id";
		$data['barang'] = $this->db->query($b)->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/detail_barang',$data);
		$this->load->view('templates/footer');
	}

	public function edit_barang($id){
		$data['title'] = 'Edit Barang | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$this->db->order_by('produk','ASC');
		$data['produk'] = $this->db->get('tb_produk')->result_array();
		$data['barang'] = $this->db->get_where('tb_barang',['id' => $id])->row_array();
		$this->db->order_by('merk','ASC');
		$data['merk'] = $this->db->get('tb_merk')->result_array();

		$this->form_validation->set_rules('barang','Nama Barang','trim|required|min_length[3]');
		$this->form_validation->set_rules('harga','Harga','trim|required|min_length[3]|numeric');
		$this->form_validation->set_rules('diskon','Diskon','trim|required|min_length[1]|numeric');
		$this->form_validation->set_rules('stok','Stok','trim|required|min_length[1]|numeric');
		$this->form_validation->set_rules('deskripsi','Deskripsi','trim|required|min_length[10]');

		if($this->form_validation->run() == false){

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/edit_barang',$data);
			$this->load->view('templates/footer');
		} else {

			$img = $_FILES['img'];
			if($img){
				$config['upload_path']          = './assets/upload/img/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2000;

				$this->load->library('upload',$config);
				if($this->upload->do_upload('img')){
					$oldimg = $data['barang']['img'];
					if($oldimg != 'default.png'){
						unlink(FCPATH .'assets/upload/img/'. $oldimg);
					}
					$gmb = $this->upload->data('file_name');
				} else {
					$gmb = $data['barang']['img'];
				}

			}

			$harga = $this->input->post('harga');
			$diskon = $this->input->post('diskon');
			$d = $diskon / 100 * $harga;
			if($diskon == 0){
				$harga_diskon = 0;
			} else {
				$harga_diskon = $harga - $d;
			}

			$data = [
				'id_merk' => $this->input->post('merk'),
				'id_produk' => $this->input->post('produk'),
				'barang' => $this->input->post('barang'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'img' => $gmb,
				'date_update' => time(),
				'deskripsi' => $this->input->post('deskripsi'),
				'diskon' => $diskon,
				'harga_diskon' => $harga_diskon
			];

			$this->db->where(['id' => $id]);
			if($this->db->update('tb_barang',$data)){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil di ubah</div>');
				redirect('dashboard/barang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal di ubah, harap coba lagi</div>');
				redirect('dashboard/barang');
			}
		}
	}

	public function user(){
		$data['title'] = 'User | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['user'] = $this->db->get('tb_user')->result_array();
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('nama',$cari);
			$this->db->or_like('email',$cari);
			$this->db->or_like('no_telp',$cari);
			$data['user'] = $this->db->get('tb_user')->result_array();
		}

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/user',$data);
		$this->load->view('templates/footer');
	}

	public function nonaktifkan_user($id){
		$this->db->set('aktif',0);
		$this->db->where(['id' => $id]);
		if($this->db->update('tb_user')){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Akun user berhasil dinonaktifkan</div>');
			redirect('dashboard/user');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akun user gagal dinonaktifkan</div>');
			redirect('dashboard/user');
		}
	}

	public function aktifkan_user($id){
		$this->db->set('aktif',1);
		$this->db->where(['id' => $id]);
		if($this->db->update('tb_user')){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Akun user berhasil diaktifkan</div>');
			redirect('dashboard/user');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akun user gagal diaktifkan</div>');
			redirect('dashboard/user');
		}
	}

	public function detail_user($id){
		$data['title'] = 'Detail User | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['user'] = $this->db->get_where('tb_user',['id' => $id])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/detail_user',$data);
		$this->load->view('templates/footer');
	}

	public function hapus_user($id){
		if($this->db->delete('tb_user',['id' => $id])){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Akun User berhasil dihapus</div>');
			redirect('dashboard/user');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akun user gagal dihapus</div>');
			redirect('dashboard/user');
		}
	}

	public function pesanan(){
		$data['title'] = 'Pesanan | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();

		$query = "SELECT * FROM tb_user INNER JOIN tb_order ON tb_user.id = tb_order.id_user ORDER BY tb_order.id DESC";
		$data['pesan'] = $this->db->query($query)->result_array();

		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$data['pesan'] = $this->db->query("SELECT * FROM tb_user INNER JOIN tb_order ON tb_user.id = tb_order.id_user WHERE tb_order.id LIKE $cari")->result_array();
		}

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/pesanan',$data);
		$this->load->view('templates/footer');
	}	

	public function detail_pesan($id){
		$data['title'] = 'Detail Pesanan | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();

		$query = "SELECT * FROM tb_user INNER JOIN tb_order ON tb_user.id = tb_order.id_user WHERE tb_order.id = $id";
		$data['pesan'] = $this->db->query($query)->row_array();

		$i = $this->db->get_where('tb_user',['id' => $data['pesan']['id_user']])->row_array();
		$id_user = $i['id'];

		$q = "SELECT * FROM tb_barang INNER JOIN tb_detail_order ON tb_barang.id = tb_detail_order.id_brg WHERE tb_detail_order.id = $id";
		$data['barang'] = $this->db->query($q)->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/detail_pesan',$data);
		$this->load->view('templates/footer');
	}

	public function edit_pesan($id){
		$data['title'] = 'Edit Pesanan | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();
		$data['status'] = ['pending','packing','perjalanan','sampai','batal'];
		$data['bayar'] = ['sudah','belum'];
		$data['pesan'] = $this->db->get_where('tb_order',['id' => $id])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/edit_pesan',$data);
		$this->load->view('templates/footer');
	}

	public function editing($id){

		$status = $this->input->post('status');
		$bayar = $this->input->post('bayar');

		$this->db->set('status',$status);
		$this->db->set('bayar',$bayar);

		$this->db->where(['id' => $id]);
		if($this->db->update('tb_order')){
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data Berhasil Di Edit</div>');
			redirect('dashboard/pesanan');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data Gagal Di Edit</div>');
			redirect('dashboard/pesanan');
		}
	}

	public function hapus_pesanan($id){
		if($this->db->delete('tb_order',['id' => $id])){
			$this->db->delete('tb_detail_order',['id' => $id]);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data Berhasil Di Hapus</div>');
			redirect('dashboard/pesanan');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data Gagal Di Hapus</div>');
			redirect('dashboard/pesanan');
		}
	}

	public function profile(){
		$data['title'] = 'Edit Profile | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();

		$this->form_validation->set_rules('nama','Nama','trim|required|min_length[3]');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[5]');

		if($this->form_validation->run() == false){

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/profile',$data);
			$this->load->view('templates/footer');
		} else {
			$img = $_FILES['img'];
			if($img){
				$config['upload_path']          = './assets/img/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2000;

				$this->load->library('upload',$config);
				if($this->upload->do_upload('img')){
					$old_img = $data['admin']['img'];
					if($old_img != 'images.png'){
						unlink(FCPATH .'assets/img/'. $old_img);
					}
					$gambar = $this->upload->data('file_name');
				} else {
					$gambar = $data['admin']['img'];
				}
			}

			$nama = $this->input->post('nama');
			$username = $this->input->post('username');

			$this->db->set('nama',$nama);
			$this->db->set('username',$username);
			$this->db->set('img',$gambar);
			$this->db->where(['id' => $this->session->userdata('admin')]);

			if($this->db->update('tb_admin')){
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Profile berhasil di edit</div>');
				redirect('dashboard/home');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Profile gagal di edit</div>');
				redirect('dashboard/home');
			}
		}
	}

	public function change_pass(){
		$data['title'] = 'Edit Password | Mystore';
		$data['admin'] = $this->db->get_where('tb_admin',['id' => $this->session->userdata('admin')])->row_array();

		$this->form_validation->set_rules('pl','Password Lama','trim|required|min_length[5]');
		$this->form_validation->set_rules('pb','Password Baru','trim|required|min_length[5]');
		$this->form_validation->set_rules('kp','Konfirmasi Password Baru','trim|required|min_length[5]');

		if($this->form_validation->run() == false){

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard/change_pass');
			$this->load->view('templates/footer');
		} else {
			$pl = $this->input->post('pl');
			$pb = $this->input->post('pb');
			$kp = $this->input->post('kp');

			if(password_verify($pl, $data['admin']['password'])){
				if($pb == $kp){
					if($pl != $pb){
						$pass = password_hash($pb, PASSWORD_DEFAULT);
						$this->db->set('password',$pass);
						$this->db->where(['id' => $this->session->userdata('admin')]);
						if($this->db->update('tb_admin')){
							$this->session->set_flashdata('pesan','<div class="alert alert-success">Password berhasil di edit</div>');
							redirect('dashboard/home');
						} else {
							$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password gagal di edit</div>');
							redirect('dashboard/change_pass');
						}
					} else {
						$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password baru tidak boleh sama dengan password lama</div>');
						redirect('dashboard/change_pass');
					}
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password baru harus sama dengan konfirmasi password</div>');
					redirect('dashboard/change_pass');
				}
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password Lama Salah</div>');
				redirect('dashboard/change_pass');
			}
		}
	}
}