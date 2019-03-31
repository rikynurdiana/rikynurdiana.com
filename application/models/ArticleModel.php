<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog Model
 */
class ArticleModel extends CI_Model
{
    public function all()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('articles');
        return $query->result();
    }

    public function getArticle($limit,$offset,$ordercol = 'id',$orderby = 'DESC')
    {
        $this->db->select('*');
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('articles');
        return $query->result();
    }

    public function create($data)
    {
        try {
            $this->db->insert('articles', $data);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function find($id)
    {
        $query = $this->db->where('id',$id)->limit(1)->get('articles');
        return $query;
    }

    public function read($slug)
    {
        $query = $this->db->where('slug',$slug)->limit(1)->get('articles');
        return $query;
    }

    public function update($id, $data)
    {
        try {
            $this->db->where('id',$id)->limit(1)->update('articles', $data);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id)
    {
        try {
            $this->db->where('id',$id)->delete('articles');
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function frontpageArticle()
    {
        $this->db->select('*');
        $this->db->where('frontpage', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('articles', 10);
        return $query->result();
    }

    public function editorsPicksArticle()
    {
        $this->db->select('*');
        $this->db->where('editor_pick', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('articles', 3);
        return $query->result();
    }

    public function latestTutorial()
    {
        $this->db->select('*');
        $this->db->where('tutorial', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('articles', 3);
        return $query->result();
    }

    public function totalArticle()
    {
        $query = $this->db->count_all('articles');
        return $query;
    }
}
