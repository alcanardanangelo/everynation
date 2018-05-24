<?php

class AttendanceController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('attendance/AttendanceModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_attendance()
  {
    if ($this->input->post('search_attendance')) {
      if ($this->input->post('date_from')) {
        $date_from = strtotime($this->input->post('date_from'));

        $date_from = date('Y-m-d',$date_from);
      } else {
        $date_from = 'NULL';
      }

      if ($this->input->post('date_to')) {
        $date_to = strtotime($this->input->post('date_to'));

        $date_to = date('Y-m-d',$date_to);
      } else {
        $date_to = 'NULL';
      }

      $this->session->set_userdata('date_from', $date_from);
      $this->session->set_userdata('date_to', $date_to);


      $this->result = $this->AttendanceModel->fetch_attendance_filter($date_from, $date_to);

      $data['result'] = $this->result;

    }

    $data['title'] = 'Attendance';
    $data['main_view'] = 'attendance/index';

    $this->load->view('index', $data);

  }

  public function print_attendance()
  {

    $this->load->library('MyPdf');

    $this->result = $this->result = $this->AttendanceModel->fetch_attendance_filter($this->session->userdata('date_from'), $this->session->userdata('date_to'));

    $data['result'] = $this->result;

    $data['username'] = $this->session->userdata('user_info')['username'];
    $data['date'] = date('m/d/Y h:i:s a', time());
    $data['total'] = $this->result[0]['total'];


    $this->load->view('attendance/print', $data);


  }


  public function add_attendance()
  {

    $this->form_validation->set_rules('date_of_service', 'Date', 'trim|required');
    $this->form_validation->set_rules('time_of_service', 'Time of Service', 'trim|required');
    $this->form_validation->set_rules('monthly_topic_id', 'Monthly Topic', 'trim|required');
    $this->form_validation->set_rules('no_of_attendees', 'No. of Attendees', 'trim|required|numeric');

    if (!$this->form_validation->run()) {
      $this->load->model('maintenance/monthly_topic/MonthlyTopicModel');
      $this->result = $this->MonthlyTopicModel->fetch_monthly_topic();
      $data['monthly_topic'] = $this->result;

      $data['title'] = 'Add Attendance';
      $data['main_view'] = 'attendance/add';

      $this->load->view('index', $data);
    } else {

      $date_of_service = strtotime($this->input->post('date_of_service'));

      $date_of_service = date('Y-m-d',$date_of_service);
;
      $values = [
        'date_of_service' => $date_of_service,
        'time_of_service' => $this->input->post('time_of_service'),
        'monthly_topic_id' => $this->input->post('monthly_topic_id'),
        'no_of_attendees' => $this->input->post('no_of_attendees'),
      ];

      $this->AttendanceModel->add_attendance($values);
      $this->session->set_flashdata('message', 'Attendance has been added.');

      redirect('attendance', 'refresh');
    }

  }


}