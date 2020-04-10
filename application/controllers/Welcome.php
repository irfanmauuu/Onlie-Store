<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_products');
	}
/*public function index untuk menampikan file welcome_message.php yang terdapat di dalam folder view. 
Sehingga costumer dapat melihat produk apa saja yang dijual oleh tokobaju ini*/
	public function index()
	{
		$data['products'] = $this->model_products->all();
		$this->load->view('welcome_message', $data);
	}
/*public function add_to_cart untuk membuat array untuk menambahkan data.
Pada kasus ini data yang diolah berupa produk dari tokobaju*/
	public function add_to_cart($product_id)
	{
		$product = $this->model_products->find($product_id);
		$data = array(
					   'id'      => $product->id,
					   'qty'     => 1,
					   'price'   => $product->price,
					   'name'    => $product->name
					);

		$this->cart->insert($data);
		redirect(base_url());
	}
/*public function cart berfungsi untuk menampilan file show_cart.php yang terdapat di folder view.
 Tampilan dari file ini  berupa table hasil dari produk yang akan dibeli oleh custumer.*/
	public function cart(){
		$this->load->view('show_cart');
	}
/*public clear_cart berfungsi untuk menghapus list produk yang tidak jadi dibeli customer.*/
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}
}

/* Kelompok 6 */
/* TshirtStore*/
