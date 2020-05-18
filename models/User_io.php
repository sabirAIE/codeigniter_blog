<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_io extends CI_Model {

	//verify member data
	public function get_member_by($user_id){
		$query=$this->db->select('*')
						->from('members')
						->where('id',$user_id)
						->get();
		return $query->row();				
	}

	//insert new ainext member

	public function ainext_member($mem_data){
		$query=$this->db->insert('members',$mem_data);
		return true;
	}
	
	//verify member data by email and password
	public function get_member($email,$pass){
		$where=array(
			'email_id'=>$email,
			'password'=>$pass
		);
		$query=$this->db->select('*')
						->from('members')
						->where($where)
						->get();
		return $query->row();				
	}

	//insert new user
	public function new_user_reg($user_data){
		$query=$this->db->insert('users',$user_data);
		return true;
	}

	//get users by user id
	public function get_user_by($id){
		$query = $this->db->select('*')
							->from('users')
							->where('id',$id)
							->get();
		return $query->row();
	}

	//update profile
	public function update_profile($update,$a_id){
		$q=$this->db->update('members', $update, array('id' => $a_id));						
		return TRUE;
	}

	//verify user data by email and password
	public function verify_user_by($user_data){
		$query=$this->db->select('*')
						->from('users')
						->where($user_data)
						->get();
		return $query->row();				
	}
}