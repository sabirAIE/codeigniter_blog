<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_manager extends CI_Controller {

	//new post
	public function new_post(){
		
		$user_id=$this->session->userdata['user_id'];
		$user_data=$this->user_io->get_member_by($user_id);
		if (isset($user_data)){
			$this->session->set_flashdata('class',"success");
			$this->session->set_flashdata('feedback',"<strong>Welcome!</strong>"." $user_data->first_name"."<br>Have a nice day");
			$this->load->view('manage/new_post',compact('user_data'));
		}else{
			$this->load->view('errors/cli/error_php');
		}
		
	}

	///member profile
	public function profile(){

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			$post_data=$this->input->post();
			
			$new_name                   	= time()."-".date('d-m-Y');
	        $config['file_name']        	= $new_name;
	        $config['upload_path']          = './uploads/faces';
	        $config['allowed_types']        = 'jpg|jpeg|mp4|png';
	        $config['max_size']             = 60000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('avatar')){
		            $error = array('error' => $this->upload->display_errors());
		            $this->session->set_flashdata('class',"danger");
					$this->session->set_flashdata('feedback',$error);
					$this->profile();
		        }
		        else{
		        	$data =$this->upload->data();
		        	switch ($data['file_ext']) {
		        		case '.jpg':
		        			$name_n_ext=$new_name.$data['file_ext'];
		        			break;
	        			case '.jpeg':
	        				$name_n_ext=$new_name.$data['file_ext'];
	        				break;
	        			case '.mp4':
	        				$name_n_ext=$new_name.$data['file_ext'];
	        				break;
	        			case '.png':
	        				$name_n_ext=$new_name.$data['file_ext'];
	        				break;	        		
		        		default:
		        			$name_n_ext=$new_name.".jpg";
		        			break;
		        	}
		        	$a_id = $post_data['id'];
		        	array_push($post_data, $post_data['avatar']=$name_n_ext);
		        	unset($post_data['0']);
		        	unset($post_data['id']);
		        	
					if($this->user_io->update_profile($post_data,$a_id)){
						$this->session->set_flashdata('class',"success");
						$this->session->set_flashdata('feedback',"Profile Updated");
						return redirect('blog_manager/profile');
					}else{

						$this->session->set_flashdata('class',"danger");
						$this->session->set_flashdata('feedback',"Internal error occurred");
						$this->load->view('manage/mem_profile',compact('user_data'));
					}
					
				}

		}else{
			$user_id=$this->session->userdata['user_id'];
			$user_data=$this->user_io->get_member_by($user_id);
			$this->load->view('manage/mem_profile',compact('user_data'));
		}
	}

	//post a new article
	public function post_article(){
		$post_data=$this->input->post();
		$new_name                   	= time()."-".date('d-m-Y');
        $config['file_name']        	= $new_name;
        $config['upload_path']          = './uploads';
        $config['allowed_types']        = 'jpg|jpeg|mp4|png';
        $config['max_size']             = 60000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('blog_image')){
	            $error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('class',"danger");
				$this->session->set_flashdata('feedback',$error);
				$this->new_post();
	        }
	        else{
	        	$data =$this->upload->data();
	        	switch ($data['file_ext']) {
	        		case '.jpg':
	        			$name_n_ext=$new_name.$data['file_ext'];
	        			break;
        			case '.jpeg':
        				$name_n_ext=$new_name.$data['file_ext'];
        				break;
        			case '.mp4':
        				$name_n_ext=$new_name.$data['file_ext'];
        				break;
        			case '.png':
        				$name_n_ext=$new_name.$data['file_ext'];
        				break;	        		
	        		default:
	        			$name_n_ext=$new_name.".jpg";
	        			break;
	        	}
	        	array_push($post_data, $post_data['blog_image']=$name_n_ext);
	        	unset($post_data['0']);
				$this->blogs_io->post_article_with_image($post_data);
				$this->session->set_flashdata('class',"success");
				$this->session->set_flashdata('feedback',"New Article posted");
				$this->new_post();
			}
	}

	/////////////////////all Notes/////////////////
	public function all_posts(){
		$user_id=$this->session->userdata['user_id'];
		$blog_data=$this->blogs_io->get_all_posts($user_id);
		if (empty($blog_data)) {
			echo "No data Found!! Please Post a Blog";
		}else{
			$user_id=$this->session->userdata['user_id'];
			$user_data=$this->user_io->get_member_by($user_id);
			$this->load->view('manage/all_posts',compact('blog_data','user_data'));
		}
	}

	/////////////////////edit posts/////////////////
	public function edit_post($id){
		$user_id=$this->session->userdata['user_id'];
		$user_data=$this->user_io->get_member_by($user_id);

		$content=$this->blogs_io->get_blog_content($id);
		$this->load->view('manage/edit_post',compact('user_data','content'));
	}

	/////////////////////update post///////////////
	public function update_blog_content(){
		$id=$this->input->post('blog_id');
		$data=$this->input->post('blog_content');
		if($this->blogs_io->update_content($id,$data)){
			$this->session->set_flashdata('class',"success");
			$this->session->set_flashdata('feedback',"Content Saved!");
			$this->all_posts();
		}else{
			$this->session->set_flashdata('class',"danger");
			$this->session->set_flashdata('feedback',"Failed to update!");
			$this->all_posts();
		}
	}
	/////////////////////logout////////////////////
	public function logout(){
		$this->session->sess_destroy();
		return redirect('login');
  	}
	//constructor
	public function __construct(){
	    parent::__construct();	    
	    $this->load->model('blogs_io');
	    $this->load->model('user_io');
	    $this->load->helper(array('form', 'url'));
	    if(!isset($this->session->userdata['user_id'])){
	    	return redirect('login');
	    }
    }
}
