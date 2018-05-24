<?php

class ClassModel extends CI_Model
{
  public function fetch_class($class_id = FALSE)
  {
    if (!$class_id) {
      $query = $this->db->get('class');
      return $query->result_array();
    }

    $query = $this->db->get_where('class', ['class_id' => $class_id]);
    return $query->row_array();
  }

  public function add_class($values)
  {
    $this->db->insert('class', $values);
  }

  public function update_class($class_id, $values)
  {
    $this->db->where('class_id', $class_id);
    $this->db->update('class', $values);
  }
}