<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog Model
 */
class ImageModel extends CI_Model
{
    public function getImages($limit,$offset,$ordercol = 'id',$orderby = 'DESC')
    {
        $this->db->select('*');
        $this->db->where('imagecloud', 1);
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('images');
        return $query->result();
    }

    public function totalImage()
    {
        $this->db->where('imagecloud', 1);
        $this->db->from('images');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function all()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('images');
        return $query->result();
    }

    public function create($data)
    {
        try {
            $this->db->insert('images', $data);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function find($id)
    {
        $query = $this->db->where('id',$id)->limit(1)->get('images');
        return $query;
    }

    public function read($slug)
    {
        $query = $this->db->where('slug',$slug)->limit(1)->get('images');
        return $query;
    }

    public function update($id, $data)
    {
        try {
            $this->db->where('id',$id)->limit(1)->update('images', $data);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id)
    {
        try {
            $this->db->where('id',$id)->delete('images');
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
