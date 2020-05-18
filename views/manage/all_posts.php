<!DOCTYPE html>
<html lang="en">
<head>
<title>Ai Next | All Posts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!-- //css files -->
</head>
<body>
	<?php include_once('manage_nav.php')?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h5>List of All Posts</h5>
				<br>
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Date</th>
					      <th scope="col">Subject</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
                <?php
                  if (!empty($blog_data)){
                      $c=0;
                      foreach ($blog_data as $notes) :?>
                        <th scope="row"><?=++$c?></th>
                        <td class="text-left"><?=$notes->blog_date?></td>
                        <td class="text-left"><?=$notes->blog_title?></td>
                        <td class="">
                        	<?=anchor("blog_manager/edit_post/{$notes->id}", 'Edit')?>
                        </td>
              </tr>
                  <?php endforeach;}
                   else{?>
                      <td colspan="8" class="text-center">No notification Found</td>
                   <?php }?>
					    </tr>
					  </tbody>
					</table>							  	
			</div>
			<div class="col-md-4">
				<div class="alert alert-<?=$this->session->flashdata('class')?> alert-dismissible fade show" role="alert">
				  <?=$this->session->flashdata('feedback')?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>