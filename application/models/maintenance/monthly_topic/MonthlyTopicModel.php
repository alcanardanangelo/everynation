<?php

class MonthlyTopicModel extends CI_Model
{
  public function fetch_monthly_topic($monthly_topic_id = FALSE)
  {
    if (!$monthly_topic_id) {
      $query = $this->db->get('monthly_topic');
      return $query->result_array();
    }

    $query = $this->db->get_where('monthly_topic', ['monthly_topic_id' => $monthly_topic_id]);
    return $query->row_array();
  }

  public function add_monthly_topic($values)
  {
    $this->db->insert('monthly_topic', $values);
  }

  public function update_monthly_topic($monthly_topic_id, $values)
  {
    $this->db->where('monthly_topic_id', $monthly_topic_id);
    $this->db->update('monthly_topic', $values);
  }
}
