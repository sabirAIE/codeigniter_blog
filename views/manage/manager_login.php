<!DOCTYPE html>
<html lang="en">
<head>
<title>Ai Next Blog</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- css files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style type="text/css">
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?=form_open('login/member_auth',['class'=>'form-signin'])?>
					<center>
						<a href="<?=base_url()?>">
					  <img class="mb-4" src="<?=base_url('assets/img/logo1.png')?>" alt="" ></a>
					</center>
					  <h1 class="h3 text-center mb-3 font-weight-normal">Sign In</h1>
					  <p class="text-center text-danger"><?=$this->session->flashdata('report');?></p>
					  <label for="inputEmail" class="sr-only">Email address</label>
					  <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
					  <label  class="sr-only">Password</label>
					  <input type="password" name="password" class="form-control" placeholder="Password" required>
					  <div class="checkbox text-center mb-3">
					    <label>
					      <a href="<?=base_url('#')?>"> Forgot Password?</a>
					    </label>
						|
						<label>
							<a href="<?=base_url('welcome/join_ainext')?>"> Become a Member</a>
						</label>
					  </div>
					  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					  <p class="mt-5 text-center mb-3 text-muted">&copy; 2020 | NCNS</p>
					<?=form_close()?>
			</div>
			<div class="col-md-2"></div>

		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>