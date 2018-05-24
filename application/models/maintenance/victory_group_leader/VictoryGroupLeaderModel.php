<?php

class VictoryGroupLeaderModel extends CI_Model
{
  public function fetch_victory_group_leader()
  {

    $query = $this->db->get_where('registration', ['status_id' => 2]);
    return $query->result_array();

  }

  public function add_victory_group_leader($values)
  {
    $this->db->insert('victory_group_leader', $values);
  }

  public function update_victory_group_leader($victory_group_leader_id, $values)
  {
    $this->db->where('victory_group_leader_id', $victory_group_leader_id);
    $this->db->update('victory_group_leader', $values);
  }
}