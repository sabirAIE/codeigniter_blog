<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{


		$this->load->library('pagination');
	      $config=[
	        'base_url'        =>base_url('blog/index'),
	        'total_rows'      =>$this->blogs_io->blogs_num_rows(),
	        'per_page'        =>6,
	        'full_tag_open'   =>"<ul class='pagination pagination-info'>",
	        'full_tag_close'  =>"</ul>",
	        'first_tag_open'  =>"<li class='page-item'>",
	        'first_tag_close' =>'</li>',
	        'last_tag_open'   =>"<li class='page-item'>",
	        'last_tag_close'  =>'</li>',
	        'next_tag_open'   =>"<li class='page-item'>",
	        'next_tag_close'  =>'</li>',
	        'prev_tag_open'   =>"<li class='page-item'>",
	        'prev_tag_close'  =>'</a></li>',
	        'num_tag_open'    =>"<li class='page-item'>",
	        'num_tag_close'   =>'</li>',
	        'cur_tag_open'    =>"<li class='page-item active'><a class='page-link'>",
	        'cur_tag_close'   =>'</a></li>'
	      ];
	      $config ['attributes'] = array('class' => 'page-link');
	      $all_blogs=$this->blogs_io->get_blogs_by_limit($config ['per_page'],$this->uri->segment(3));
	      $this->pagination->initialize($config);

		$this->load->view('index',compact('all_blogs'));
	}

	//////////////find articles by id //////////////
	public function articles(){
		$a_id = $this->uri->segment('4');
		$this->blogs_io->update_blog_views($a_id);
		$article_data=$this->blogs_io->fetch_articles_by($a_id);

		$author_data=$this->user_io->get_member_by($article_data->author_id);
		$similar_posts = $this->blogs_io->fetch_similar_posts($article_data->blog_category);

		shuffle($similar_posts);
		$this->load->view('blog_description',compact('article_data','similar_posts','author_data'));
	}

	//Join Ai next as a member
	public function join_ainext(){
		$this->load->library('form_validation');
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$userdata = $this->input->post();
		   	if ($userdata['password'] === $userdata['vpassword']){
				$this->load->model('user_io');
				$this->form_validation->set_rules('email_id', 'Email', 'is_unique[members.email_id]');  
				if($this->form_validation->run() == TRUE){
					unset($userdata['vpassword']);
					if($this->user_io->ainext_member($userdata)){
						$this->session->set_flashdata('report',"Well done! registration successful");
    					return redirect('login');
					}else{
						$this->load->view('errors/html/error_general');
					}		
				}else{
					$this->session->set_flashdata('report',"This email id is already exist");
					$this->load->view('manage/mem_registration');
				}
			}else{
				$this->session->set_flashdata('report',"Password did not match, Please try again.");
				$this->load->view('manage/mem_registration');
			}
	   }else{   
			$this->load->view('manage/mem_registration');
	   }

	}

	//constructor
	public function __construct(){
	    parent::__construct();	    
	    $this->load->model('blogs_io');
	    $this->load->model('user_io');
	    $this->load->helper(array('form', 'url'));
    }
}
