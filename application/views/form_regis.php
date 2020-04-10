<!DOCTYPE html>
<html lang="en">
	<head>
		<title>T-ShirtStore</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<style>
			.register{
			margin-left: 17%;
			}
		</style>
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		<div><?=validation_errors()?></div>
		<div><?=$this->session->flashdata('error')?></div>
		<?=form_open('regis', ['class'=>'form-horizontal'])?>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="username" placeholder="Username">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="email" placeholder="Email">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" name="password" placeholder="Password">
			</div>
		  </div>
		  <div class="form-group">
		  	<label class="col-sm-2 control-label">Group</label>
		  	<div class="col-sm-10">
			  <select name="group">
                <option>--Pilih--
                <option value="2">Member
              </select>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Submit</button>
			</div>
		  </div>
		</form>
		<div class="register">
			<a href="<?php echo base_url();?>index.php/login"><button class="btn btn-warning">Back to Login</button></a>
		</div>
	</body>
</html>
