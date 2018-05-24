<?php

class UserModel extends CI_Model
{
  public function fetch_users($user_id = FALSE)
  {
    if (!$user_id) {
      $query = $this->db->get('users');
      return $query->result_array();
    }

    $query = $this->db->get_where('users', ['user_id' => $user_id]);
    return $query->row_array();
  }


  public function add_users($values)
  {
    $this->db->insert('users', $values);
  }

  public function update_users($user_id, $values)
  {
    $this->db->where('user_id', $user_id);
    $this->db->update('users', $values);
  }
}