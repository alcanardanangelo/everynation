<?php

class MemberTypeModel extends CI_Model
{
  public function fetch_member_type($member_type_id = FALSE)
  {
    if (!$member_type_id) {
      $query = $this->db->get('member_type');
      return $query->result_array();
    }

    $query = $this->db->get_where('member_type', ['member_type_id' => $member_type_id]);
    return $query->row_array();


  }

  public function add_member_type($values)
  {
    $this->db->insert('member_type', $values);
  }

  public function update_member_type($member_type_id, $values)
  {

    $this->db->where('member_type_id', $member_type_id);
    $this->db->update('member_type', $values);
  }
}