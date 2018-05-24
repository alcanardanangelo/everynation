<?php

class IndexModel extends CI_Model
{
  public function user_login($values)
  {
    $this->db->where($values);
    $this->db->where('is_active', 1);
    $query = $this->db->get('users', $values);
    return $query->row_array();
  }
}
