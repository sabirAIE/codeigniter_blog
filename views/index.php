<!DOCTYPE html>
<html>
<head>
	<title>Blog Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<?php
    function Slug($string)
      {
          return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
      }

  ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">My Blog</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('login')?>">Login</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

	<div class="container">
		<div class="row">
          <?php 
              foreach ($all_blogs as $key => $blog):?>
          <div class="col-md-4 pt-4">
            <div class="card card-plain card-blog">
              <div class="card-header card-header-image">
                <a href="#pablo">
                  <img class="img-fluid" src="<?=base_url()."uploads/$blog->blog_image"?>">
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-category text-info"><?=$blog->blog_category?></h6>
                <h4 class="card-title">
                  <a href="#pablo"><?=$blog->blog_title?></a>
                </h4>
                <p class="card-description">
                  <?=strip_tags(substr($blog->blog_content,0,100)).'...'?>
                </p>
                <a class="btn btn-sm btn-round btn-info" href="<?=base_url().'blog/articles/'.Slug($blog->blog_title).'/'.$blog->id;?>"> Read More </a>
                <p class="author">
                  by
                  <a href="#pablo">
                    <b><?=$blog->blog_author?></b>
                  </a>
                  <span style="font-size: 12px">on <?=$blog->blog_date?></span>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
	</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>