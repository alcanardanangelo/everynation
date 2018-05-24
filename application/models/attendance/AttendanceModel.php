<?php

class AttendanceModel extends CI_Model
{
  public function fetch_attendance_filter($date_from, $date_to)
  {
    if ($date_from == 'NULL' && $date_to == 'NULL') {
      $query = $this->db->query("select *, (select sum(no_of_attendees) from attendance) as total
                                 from attendance as a
                                 
                                 inner join monthly_topic as b
                                 on a.monthly_topic_id = b.monthly_topic_id");
    } else {
      $query = $this->db->query("select *, (select sum(no_of_attendees) from attendance where date_of_service between '$date_from' and '$date_to') as total
                                 from attendance as a
                                 
                                 inner join monthly_topic as b
                                 on a.monthly_topic_id = b.monthly_topic_id
                                 
                                 where a.date_of_service between '$date_from' and '$date_to'");
    }

    return $query->result_array();
  }

  public function fetch_attendance($attendance_id = FALSE)
  {
    if (!$attendance_id) {
      $this->db->select('*');
      $this->db->from('attendance');
      $this->db->join('monthly_topic', 'monthly_topic.monthly_topic_id = attendance.monthly_topic_id');
      $query = $this->db->get();
      return $query->result_array();
    }

    $query = $this->db->get_where('attendance', ['attendance_id' => $attendance_id]);
    return $query->row_array();
  }

  public function add_attendance($values)
  {
    $this->db->insert('attendance', $values);
  }
}
