<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    // protected $table = 'book_list';

    //-------------------------------------------
    //pagination

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_qry($save_data, $table)
    {
        $this->db->insert("$table", $save_data);
        $id = $this->db->insert_id();
        return $id;
    }
    public function get_where_qry($table, $where_condition)
    {
        $this->db->where($where_condition);
        $query = $this->db->get($table);
        $res   = $query->result();
        return $res;
    }
    public function update_qry($table, $details, $update_id)
    {
        $this->db->where('id', $update_id);
        $query = $this->db->update($table, $details);
        return $query;
    }
    public function delete_qry($table, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete($table);
        return $query;
    }
    public function passwordHash($password)
    {
        $options = [
            'cost' => 10,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
    public function getCount($table, $where_condition)
    {
        $this->db->where($where_condition);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    public function listCreatePo()
    {
        $this->db->select('c.id as cart_id,c.product_id,c.quantity,c.status,p.id,p.product_name,p.sku,p.mrp,p.sp');
        $this->db->from('cart c');
        $this->db->join('product_upload p', 'c.product_id=p.id','inner');
        $this->db->where("c.status='pending'");
        $this->db->order_by('c.id desc');
        $this->db->group_by('c.id');
        return $query = $this->db->get()->result(); 
    }
    public function createPOlist()
    {
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->order_by('id desc');
        $this->db->group_by('id');
        return $query = $this->db->get()->result(); 
    }
    public function toBeApproveList()
    {
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where("status='To_Be_Approve'");
        $this->db->order_by('id desc');
        $this->db->group_by('id');
        return $query = $this->db->get()->result(); 
    }
}
