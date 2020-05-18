<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//member login page navigation
	public function index(){
		$this->load->view('manage/manager_login');
	}
	//member login auth
	public function member_auth(){
		$username=$this->input->post('email');
    	$password=$this->input->post('password');
    	$success=$this->user_io->get_member($username,$password);
    	if($success->email_id===$username && $success->password===$password){
    		$this->session->set_userdata('user_id',$success->id);

    		return redirect('blog_manager');
    	}else{
    		$this->session->set_flashdata('report',"Invalid username or password");
    		return redirect('login');
    	}
	}

	//constructor
	public function __construct(){
	    parent::__construct();	    
	    $this->load->model('user_io');
    }
}
