<?php

class DiscipleshipJourneyModel extends CI_Model
{

  public function fetch_discipleship_journey($discipleship_journey_id = FALSE)
  {
    if (!$discipleship_journey_id) {
      $this->db->select('*, c.firstname as victory_group_leader_firstname, c.lastname as victory_group_leader_lastname');
      $this->db->from('discipleship_journey');
      $this->db->join('registration', 'registration.registration_id = discipleship_journey.registration_id');
      $this->db->join('md_journey', 'md_journey.journey_id = discipleship_journey.journey_id');
      $this->db->join('registration as c', 'c.registration_id = discipleship_journey.victory_group_leader_id');

      $query = $this->db->get();
      return $query->result_array();
    }

    $query = $this->db->get_where('discipleship_journey', ['discipleship_journey_id' => $discipleship_journey_id]);
    return $query->row_array();
  }

  public function fetch_discipleship_journey_by_member($registration_id)
  {
    $query = $this->db->query("select *, d.firstname as victory_group_leader_firstname, d.lastname as victory_group_leader_lastname
                               from discipleship_journey as a
                               
                               inner join registration as b
                               on a.registration_id = b.registration_id
                               
                               inner join md_journey as c
                               on a.journey_id = c.journey_id
                               
                               inner join registration as d
                               on a.victory_group_leader_id = d.registration_id
                                    
                               where a.registration_id = $registration_id");
    return $query->result_array();
  }

  public function fetch_available_journey($registration_id)
  {
    $query = $this->db->query("select a.journey_id as journey_id,
                                      a.journey_name as journey_name,
                                      a.prerequisite as prerequisite,
                                      b.journey_id as discipleship_journey_id,
                                      b.victory_group_leader_id,
                                      b.status
                              FROM md_journey as a
                              
                              inner join discipleship_journey as b
                              on a.prerequisite = b.journey_id
                              
                            where (a.journey_id = 1)
                                    or (a.journey_id not in(select journey_id from discipleship_journey where status = 1 and registration_id = $registration_id)
                                    and a.prerequisite in(select journey_id from discipleship_journey where status = 1 and registration_id = $registration_id))
                                    
                                    and b.registration_id = $registration_id
                                    order by a.weight");
    return $query->result_array();
  }

  public function add_discipleship_journey($values)
  {
    $this->db->insert('discipleship_journey', $values);
  }

  public function update_discipleship_journey_status($registration_id, $values)
  {

    $this->db->where('registration_id', $registration_id);
    $this->db->update('discipleship_journey', $values);
  }


}