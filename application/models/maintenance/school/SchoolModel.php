<?php

class SchoolModel extends CI_Model
{
  public function fetch_school($school_id = FALSE)
  {
    if (!$school_id) {
      $query = $this->db->get('school');
      return $query->result_array();
    }

    $query = $this->db->get_where('school', ['school_id' => $school_id]);
    return $query->row_array();

  }

  public function add_school($values)
  {
    $this->db->insert('school', $values);
  }

  public function update_school($school_id, $values)
  {
    $this->db->where('school_id', $school_id);
    $this->db->update('school', $values);
  }
}