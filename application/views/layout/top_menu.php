<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <?=anchor(base_url(), 'T-ShirtStore', ['class'=>'navbar-brand'])?>
    </div>
<!--untuk tampilan website tokobaju ini, karena menampilkan menu-menu yang tersedia. Seperti Home, Shopping Cart dan Login.
potongan program ini adalah kepala yang berperan penting untuk mengaktifkan fitur menu website.-->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
		<li><?php echo anchor(base_url(), 'Home');?></li>
        <li>
			<?php
				$text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
				$text_cart_url .= ' Shopping Cart: '. $this->cart->total_items() .' items';
			?>
			<?=anchor('welcome/cart', $text_cart_url)?>
		</li>
    <!-- berfungsi sebagai front-end atau tampilan pengguna untuk memilih menu logout. Sehingga, ketika pengguna merasa sudah cukup
    dalam memilih produk dan berbelanja maka pengguna atau member bisa keluar dari website tokobaju ini. -->
		<?php if($this->session->userdata('username')) { ?>
			<li><div style="line-height:50px;">You Are : <?=$this->session->userdata('username')?></div></li>
			<li><?php echo anchor('logout', 'Logout');?></li>
		<?php } else { ?>
			<li><?php echo anchor('login', 'Login');?></li>
		<?php } ?>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
