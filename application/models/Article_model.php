<?php
class Article_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Getting volumes
    public function get_volumes() {
        $query = $this->db->get('volumes');
        return $query->result_array();
    }

    //Getting Users
    public function get_users_by_role($role_id) {
        $this->db->where('role', $role_id);
        $query = $this->db->get('users');
        return $query->result_array();
    }
    

    //Getting Volumes for Landing Page
    // public function get_volumes_landing() {
    //     return $this->db->select('volumeid, vol_name')->get('volumes')->result_array();
    // }
    // //Getting Articles for Landing Page
    // public function get_articles_landing() {
    //     return $this->db->select('title, abstract, doi, date_published, volumeid')->get('articles')->result_array();
    // }


    // Viewing Article
    public function get_articles($articleid = null) {
        if ($articleid !== null) {
            $query = $this->db->get_where('articles', array('articleid' => $articleid));
            return $query->row_array();
        } else {
            $query = $this->db->get('articles');
            return $query->result_array();
        }
    }

    // Listing Article
    public function get_article(){    
        $this->db->select('articles.articleid, articles.abstract AS articles_abstract, articles.doi AS articles_doi, articles.date_published AS articles_date_published, articles.title AS articles_title, articles.keywords AS articles_keywords, volumes.*, users.userid AS authorid, users.complete_name AS author_name, articles.published AS articles_published, articles.filename AS articles_filename');
        $this->db->from('articles');
        $this->db->join('volumes', 'articles.volumeid = volumes.volumeid', 'inner');
        $this->db->join('users', 'articles.authorid = users.userid', 'inner'); 
        
        $query = $this->db->get();
        return $query->result_array();
    }


    // Article for Filtering
    public function filter_articles_by_published($published) {
        $publishedIds = [
            'Published' => 1,
            'Unpublished' => 2
        ];
    
        $publishedId = isset($publishedIds[$published]) ? $publishedIds[$published] : null;
    
        if ($publishedId) {
            $this->db->where('articles.published', $publishedId);
        }
    
        $this->db->select('articles.articleid, articles.title as articles_title, volumes.vol_name, users.complete_name as author_name, articles.published AS articles_published');
        $this->db->from('articles');
        $this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
        $this->db->join('users', 'articles.authorid = users.userid');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    //Searching Article
    public function search_articles_by_title($searchQuery) {
        $this->db->select('articles.articleid, articles.title as articles_title, volumes.vol_name, users.complete_name as author_name, articles.published AS articles_published');
        $this->db->from('articles');
        $this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
        $this->db->join('users', 'articles.authorid = users.userid');
        $this->db->like('articles.title', $searchQuery);
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    

    // Adding Article
    public function add_article($data) {
        $inserted = $this->db->insert('articles', $data);
        return $inserted;
    }

    // Updating Article
    public function update_article($article_id, $data) {
        $this->db->where('articleid', $article_id);
        return $this->db->update('articles', $data);
    }
    

    // Filtering Article Per volume

    public function get_articles_by_volume($volume_id) {
        $this->db->select('articles.articleid, articles.title as articles_title, volumes.vol_name, users.complete_name as author_name, articles.published AS articles_published');
        $this->db->from('articles');
        $this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
        $this->db->join('users', 'articles.authorid = users.userid');
        $this->db->where('articles.volumeid', $volume_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    
    //Deleting Article
    public function delete_article($articleid) {
        $this->db->where('articleid', $articleid);
        $this->db->delete('articles');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>
