<?php

class JourneyModel extends CI_Model
{
  public function fetch_journey($journey_id = FALSE)
  {
    if (!$journey_id) {
      $this->db->order_by('weight', 'ASC');
      $query = $this->db->get('md_journey');
      return $query->result_array();
    }


    $query = $this->db->get_where('md_journey', ['journey_id' => $journey_id]);
    return $query->row_array();
  }

  public function add_journey($values)
  {
    $this->db->insert('md_journey', $values);
  }

  public function update_journey($journey_id, $values)
  {
    $this->db->where('journey_id', $journey_id);
    $this->db->update('md_journey', $values);
  }

  /** Journey Helper */
  public function fetch_journey_name($values)
  {
    $query = $this->db->get_where('md_journey', $values);
    return $query->row_array();
  }
}
