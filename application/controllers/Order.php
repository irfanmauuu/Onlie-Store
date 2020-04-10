<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
/*public function __construct() merupakan fungsi yang selalu dijalankan ketika file tersebut dijalankan,
dengan mendefinisikan username dan juga model_orders.*/
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
		$this->load->model('model_orders');
	}
	/*public function index() berfungsi untuk memanggil secara default dari file Order.php
	untuk memproses data cart yang masuk. */
	public function index()
	{
		$is_processed = $this->model_orders->process();
		if($is_processed){
			$this->cart->destroy();
			redirect('order/success');
		} else {
			$this->session->set_flashdata('error','Failed to processed your order, please try again!');
			redirect('welcome/cart');
		}
	}
/*public function success() berfungsi untuk menampilkan file order_success yang terdapat di folder view*/
	public function success()
	{
		$this->load->view('order_success');
	}
}
