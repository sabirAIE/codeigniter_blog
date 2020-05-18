<!DOCTYPE html>
<html lang="en">
<head>
<title>Ai Next</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- css files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!-- //css files -->
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
</head>
<body>
	<?php include_once('manage_nav.php')?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?=form_open_multipart('blog_manager/post_article')?>	
					<div class="form-group">
						<input type="text" name="blog_date" class="form-control-sm form-control" value="<?=date('d-m-Y')?>" placeholder="<?=date('d-m-Y')?>" readonly>
						<input type="hidden" name="blog_time" value="<?=time()?>">
					</div>
					<div class="form-group">
						<input type="text" name="blog_title" class="form-control-sm form-control" placeholder="Title" required>
					</div>
					<div class="form-group">
						<select name="blog_category" class="form-control-sm form-control">
							<option selected disabled>Select Category</option>
							<option value="Arduino">Arduino</option>
							<option value="Raspberry Pi">Raspberry Pi</option>
							<option value="Artificial Intelligence">Artificial Intelligence</option>
							<option value="Internet Of Things">Internet Of Things</option>
							<option value="Ethics">Ethics</option>
							<option value="JavaScript">JavaScript</option>
						</select>
					</div>
					<div class="form-group">
						<select name="blog_trend" class="form-control-sm form-control">
							<option selected disabled>Select Trend</option>
							<option value="Hot">Hot</option>
							<option value="Popular">Popular</option>
							<option value="DIY">DIY</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="">Blog Thumbnail Image</label><br>
						<input class="btn btn-primary btn-sm" type="file" name="blog_image" required>
					</div>
					<div class="form-group">
						<label for="">Content</label>
						<textarea name="blog_content" class="form-control" rows="5" required></textarea>
					</div>
					<input type="hidden" name="blog_author" value="<?=$user_data->first_name?>">
					<input type="hidden" name="author_id" value="<?=$user_data->id?>">

					<button type="submit" class="btn btn-primary">Submit</button>
				<?=form_close()?>			  	
			</div>

			<div class="col-md-4">
				<div class="alert alert-<?=$this->session->flashdata('class')?> alert-dismissible fade show" role="alert">
				  <?=$this->session->flashdata('feedback')?>
				</div>
			</div>

		</div>
	</div>
</body>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="mt-5 text-center mb-3 text-muted">&copy; 2020 | NCNS</p>
			</div>
		</div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
        CKEDITOR.replace( 'blog_content' );
</script>
</html>