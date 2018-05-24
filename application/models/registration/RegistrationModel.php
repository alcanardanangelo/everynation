<?php


class RegistrationModel extends CI_Model
{
  public function fetch_registration_filter($name, $school_id, $member_type_id, $status_id)
  {

    if ($name == 'NULL' && $school_id == 'NULL' && $member_type_id == 'NULL' && $status_id == 'NULL')
    {
      $query = $this->db->query("select	a.firstname as reg_firstname, 
                                        a.lastname as reg_lastname, 
                                        x.firstname as vgl_firstname, 
                                        x.lastname as vgl_lastname,
                                        a.email as email_add, 
                                        a.contact_no as mobile,
                                        b.school_name,
                                        c.member_type_name,
                                        e.status_name,
                                        a.registration_id
                                from	registration as a
                                
                                inner join registration as x
                                on a.victory_group_leader_id = x.registration_id
                                
                                inner join school as b
                                on a.school_id = b.school_id
                                        
                                inner join member_type as c
                                on a.member_type_id = c.member_type_id
                                
                                inner join status as e
                                on a.status_id = e.status_id");
    } else {
      $query = $this->db->query("select	a.firstname as reg_firstname, 
                                        a.lastname as reg_lastname, 
                                        x.firstname as vgl_firstname, 
                                        x.lastname as vgl_lastname,
                                        a.email as email_add, 
                                        a.contact_no as mobile,
                                        b.school_name,
                                        c.member_type_name,
                                        e.status_name,
                                        a.registration_id
                                from	registration as a
                                
                                inner join registration as x
                                on a.victory_group_leader_id = x.registration_id
                                
                                inner join school as b
                                on a.school_id = b.school_id
                                        
                                inner join member_type as c
                                on a.member_type_id = c.member_type_id
                                
                                inner join status as e
                                on a.status_id = e.status_id
                                        
                                where	(lower(a.firstname) LIKE '%$name%' or lower(a.lastname) LIKE '%$name%' or a.lastname is null or a.firstname is null)
                                
                                or		(a.school_id = $school_id)
                                or		(a.member_type_id = $member_type_id)
                                or	  (a.status_id = $status_id)");
    }

    return $query->result_array();
  }

  public function fetch_registration($registration_id = FALSE)
  {
    if (!$registration_id) {
      $this->db->select('*');
      $this->db->from('registration');
      $this->db->join('school', 'school.school_id = registration.school_id');
      $this->db->join('member_type', 'member_type.member_type_id = registration.member_type_id');
      $this->db->join('status', 'status.status_id = registration.status_id');
      $this->db->order_by('lastname', 'asc');
      $query = $this->db->get();
      return $query->result_array();

    }

    $query = $this->db->get_where('registration', ['registration_id' => $registration_id]);
    return $query->row_array();
  }

  public function add_registration($values)
  {
    $this->db->insert('registration', $values);
  }

  public function update_registration($registration_id, $values)
  {
    $this->db->where('registration_id', $registration_id);
    $this->db->update('registration', $values);
  }

  public function fetch_class_registration_by_member($registration_id)
  {
    $this->db->select('*, c.firstname as victory_group_leader_firstname, c.lastname as victory_group_leader_lastname');
    $this->db->from('class_registration');
    $this->db->join('class', 'class.class_id = class_registration.class_id');
    $this->db->join('registration', 'registration.registration_id = class_registration.registration_id');
    $this->db->join('registration as c', 'c.registration_id = class_registration.victory_group_leader_id');
    $this->db->where('class_registration.registration_id', $registration_id);
    $query = $this->db->get();
    return $query->result_array();

  }
}