<?php

class StatusModel extends CI_Model
{
  public function fetch_status($status_id = FALSE)
  {
    if (!$status_id) {
      $query = $this->db->get('status');
      return $query->result_array();
    }

    $query = $this->db->get_where('status', ['status_id' => $status_id]);
    return $query->row_array();


  }

  public function add_status($values)
  {
    $this->db->insert('status', $values);
  }

  public function update_status($status_id, $values)
  {

    $this->db->where('status_id', $status_id);
    $this->db->update('status', $values);
  }
}