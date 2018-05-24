<?php

class AttendanceClassModel extends CI_Model
{
  public function fetch_attendance_per_class($monthly_topic_id)
  {
    if ($monthly_topic_id == 'NULL') {
      $query = $this->db->query("select (select count(*) from attendance_per_class) as total, a.date, b.monthly_topic_name, c.firstname, c.lastname
                                from attendance_per_class as a
                                
                                inner join monthly_topic as b
                                on a.monthly_topic_id = b.monthly_topic_id
                                
                                inner join registration as c
                                on a.registration_id = c.registration_id
                                
                                group by a.attendance_per_class_id");
    } else {
      $query = $this->db->query("select (select count(*) from attendance_per_class) as total, a.date, b.monthly_topic_name, c.firstname, c.lastname
                                from attendance_per_class as a
                                
                                inner join monthly_topic as b
                                on a.monthly_topic_id = b.monthly_topic_id
                                
                                inner join registration as c
                                on a.registration_id = c.registration_id
                                
                                where b.monthly_topic_id = $monthly_topic_id
                                group by a.attendance_per_class_id");
    }

    return $query->result_array();
  }

  public function add_attendance_per_class($values)
  {
    $this->db->insert('attendance_per_class', $values);
  }
}