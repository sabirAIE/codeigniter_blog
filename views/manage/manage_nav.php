<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url()?>">Ai Next Engineering<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('blog_manager/new_post')?>">New Post</a>
      </li>
  	  <li class="nav-item">
        <a class="nav-link" href="<?=base_url('blog_manager/all_posts')?>">All Posts</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$user_data->first_name?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown08">
          <a class="dropdown-item" href="<?=base_url('blog_manager/profile')?>">Profile</a>
          <a class="dropdown-item" href="<?=base_url('blog_manager/logout')?>">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>