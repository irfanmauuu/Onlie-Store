<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	/*public function __construct() berfungsi untuk mendefinisikan
	 session pengguna dan memanggil model_products.php*/
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}

		//load model -> model_products
		$this->load->model('model_products');
	}
/*public function index() berfungsi menampilkan list produk
 yang akan dijual dengan mengambil data di dalam model_products.php*/
	public function index()
	{
		$data['products'] = $this->model_products->all();
		$this->load->view('backend/view_all_products', $data);
	}
/*public function create() berfungsi untuk membuat form validation sebelum mengeksekusi query insert
untuk menambahkan data. Serta melakukan konfigurasi dalam meng-upload dan menyimpan gambar
dengan kapasitas maksimal gambar 3000 kb.*/
	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		$this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');
		//$this->form_validation->set_rules('userfile', 'Product Image', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/form_tambah_product');
		} else {
			//load uploading file library
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '3000'; //KB
			$config['max_width']  = '2000'; //pixels
			$config['max_height']  = '2000'; //pixels

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				//file gagal diupload -> kembali ke form tambah
				$this->load->view('backend/form_tambah_product');
			} else {
				//file berhasil diupload -> lanjutkan ke query INSERT
				// eksekusi query INSERT
				$gambar = $this->upload->data();
				$data_product =	array(
					'name'			=> set_value('name'),
					'description'	=> set_value('description'),
					'price'			=> set_value('price'),
					'stock'			=> set_value('stock'),
					'image'			=> $gambar['file_name']
				);
				$this->model_products->create($data_product);
				redirect('admin/products');
			}

		}
	}
/*public function update() berfungsi untuk mengambil nilai primary key dari table products yaitu id,
lalu dijadikan objek untuk membuat form validation dalam mengubah data. Serta mengkoneksikan dengan model_products
untuk memanggil perintah query update table.*/
	public function update($id){
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		$this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');

		if ($this->form_validation->run() == FALSE)
		{
			$data['product'] = $this->model_products->find($id);
			$this->load->view('backend/form_edit_product', $data);
		} else {
			if($_FILES['userfile']['name'] != ''){
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '3000'; //KB
				$config['max_width']  = '2000'; //pixels
				$config['max_height']  = '2000'; //pixels

				$this->load->library('upload', $config);


				if ( ! $this->upload->do_upload())
				{
					$data['product'] = $this->model_products->find($id);
					$this->load->view('backend/form_edit_product', $data);
				} else {
					$gambar = $this->upload->data();
					$data_product =	array(
						'name'			=> set_value('name'),
						'description'	=> set_value('description'),
						'price'			=> set_value('price'),
						'stock'			=> set_value('stock'),
						'image'			=> $gambar['file_name']
					);
					$this->model_products->update($id, $data_product);
					redirect('admin/products');
				}
			} else {
				//form submit dengan gambar dikosongkan
				$data_product =	array(
					'name'			=> set_value('name'),
					'description'	=> set_value('description'),
					'price'			=> set_value('price'),
					'stock'			=> set_value('stock')
				);
				$this->model_products->update($id, $data_product);
				redirect('admin/products');
			}
		}
	}

	public function delete($id){
		$this->model_products->delete($id);
		redirect('admin/products');
	}
}
