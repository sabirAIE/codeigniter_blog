<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs_io extends CI_Model {
	
	//get latest blogs
	public function get_latest_blogs(){
		$query=$this->db->select('*')
						->from('blog_posts')
						->order_by('blog_time','DESC')
						->limit(3)
						->get();
		return $query->result();					
	}

    //get blogs by limit and offset
    public function get_blogs_by_limit($limit,$offset){
      $query = $this->db->select('*')
                              ->from('blog_posts')
                              ->order_by('blog_time','DESC')
                              ->limit($limit,$offset)
                              ->get();
      return $query->result();                       
    }
    //countnum rows of blog_post table
    public function blogs_num_rows(){
      $query = $this->db->select('id')
                              ->from('blog_posts')
                              ->get();
      return $query->num_rows();
    }
	//fetch articles by title
	public function fetch_articles_by($id){
		$query=$this->db->select('*')
						->from('blog_posts')
						->where('id',$id)
						->get();
		return $query->row();
	}

	//insert new article
	public function post_article_with_image($article_data){
		$query=$this->db->insert('blog_posts',$article_data);
		return true;
	}

	//get get_recent_three_hot_posts
	public function get_posts_by($trend){
		$query=$this->db->select('*')
						->from('blog_posts')
						->where('blog_trend',$trend)
						->order_by('blog_time','DESC')
						->limit(3)
						->get();
		return $query->result();				
	}

	//increment view by one
	public function update_blog_views($a_id){
      $query=$this->db->where('id',$a_id)
                      ->set('blog_views','blog_views + 1',FALSE)
                      ->update('blog_posts');
      return true; 
    }

    //fetch similar posts by category
    public function fetch_similar_posts($post_cat){
    	$query=$this->db->select('*')
    					->from('blog_posts')
    					->where('blog_category',$post_cat)
    					->order_by('blog_time','DESC')
    					->limit(3)
    					->get();
    	return $query->result();				
    }

    //fetch all posts by author id
    public function get_all_posts($author_id){
    	$query=$this->db->select('*')
    					->from('blog_posts')
    					->where('author_id',$author_id)
    					->order_by('blog_time','DESC')
    					->get();
    	return $query->result();					
    }

    //get blog body
    public function get_blog_content($id){
    	$query=$this->db->select(['id','blog_content'])
    					->from('blog_posts')
    					->where('id',$id)
    					->get();
    	return $query->row();				
    }
    //update Blog post (body)
    public function update_content($id,$new_content){
    	$data=array('blog_content'=>$new_content);
    	$query=$this->db->where('id',$id)
	                    ->update('blog_posts',$data);
      	return true;
    }

}