<?php

class ClassRegistrationModel extends CI_Model
{

  public function fetch_class_registration_filter($name, $class_id, $victory_group_leader_id, $is_paid)
  {
    if ($name == 'NULL' && $class_id == 'NULL' && $victory_group_leader_id == 'NULL' && $is_paid == 'NULL') {
      $query = $this->db->query("SELECT
                                    *, (b.price - a.payment) as balance,  c.firstname as victory_group_leader_firstname, c.lastname as victory_group_leader_lastname 
                                FROM
                                    class_registration AS a
                                INNER JOIN class AS b
                                ON
                                    a.class_id = b.class_id
                                    
                                    
                                INNER JOIN registration AS c
                                ON
                                    c.registration_id = a.victory_group_leader_id
                                INNER JOIN registration AS d
                                ON
                                    a.registration_id = d.registration_id");
    } else {
      $query = $this->db->query("SELECT
                                   *, (b.price - a.payment) as balance, c.firstname as victory_group_leader_firstname, c.lastname as victory_group_leader_lastname 
                                FROM
                                    class_registration AS a
                                INNER JOIN class AS b
                                ON
                                    a.class_id = b.class_id
                                INNER JOIN registration AS c
                                ON
                                    c.registration_id = a.victory_group_leader_id
                                INNER JOIN registration AS d
                                ON
                                    a.registration_id = d.registration_id
                                WHERE
                                    (
                                        LOWER(d.firstname) LIKE '%$name%' OR LOWER(d.lastname) LIKE '%$name%' OR d.lastname IS NULL OR d.firstname IS NULL
                                    ) OR(a.class_id = $class_id or a.class_id is null)
                                    or (a.victory_group_leader_id = $victory_group_leader_id or a.victory_group_leader_id is null)");
    }
    return $query->result_array();
  }

  public function fetch_class_registration($class_registration_id = FALSE)
  {
    if (!$class_registration_id) {
      $this->db->select('*');
      $this->db->from('class_registration');
      $this->db->join('class', 'class.class_id = class_registration.class_id');
      $this->db->join('registration', 'registration.registration_id = class_registration.registration_id');
      $query = $this->db->get();
      return $query->result_array();

    }

    $query = $this->db->get_where('class_registration', ['class_registration_id' => $class_registration_id]);
    return $query->row_array();

  }

  public function add_class_registration($values)
  {
    $this->db->insert('class_registration', $values);
  }

  public function update_class_registration($class_registration_id, $values)
  {
    $this->db->where('class_registration_id', $class_registration_id);
    $this->db->update('class_registration', $values);
  }
}
