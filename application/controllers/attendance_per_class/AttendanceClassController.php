<?php

class AttendanceClassController extends CI_Controller
{

  private $result;

  public function __construct()
  {
    parent::__construct();

    $this->load->model('attendance_per_class/AttendanceClassModel');
  }

  public function fetch_attendance_per_class()
  {
    if ($this->input->post('search_attendance_per_class')) {
      if ($this->input->post('monthly_topic_id')) {
        $monthly_topic_id = $this->input->post('monthly_topic_id');
      } else {
        $monthly_topic_id = 'NULL';
      }

      $this->session->set_userdata('monthly_topic_id', $monthly_topic_id);

      $this->result = $this->AttendanceClassModel->fetch_attendance_per_class($monthly_topic_id);

      $data['result'] = $this->result;

    }

    $this->load->model('maintenance/monthly_topic/MonthlyTopicModel');
    $this->result = $this->MonthlyTopicModel->fetch_monthly_topic();
    $data['monthly_topic'] = $this->result;

    $data['title'] = 'Attendance Per Class';
    $data['main_view'] = 'attendance_per_class/index';

    $this->load->view('index', $data);
  }

  public function add_attendance_per_class()
  {


    $this->form_validation->set_rules('date_of_service', 'Date', 'trim|required');
    $this->form_validation->set_rules('monthly_topic_id', 'Monthly Topic', 'trim|required');
    $this->form_validation->set_rules('member[]', 'Member', 'trim|required|numeric');

    if (!$this->form_validation->run()) {
      $this->load->model('maintenance/monthly_topic/MonthlyTopicModel');
      $this->result = $this->MonthlyTopicModel->fetch_monthly_topic();
      $data['monthly_topic'] = $this->result;


      $this->load->model('registration/RegistrationModel');

      $data['registration'] = $this->RegistrationModel->fetch_registration();

      $data['title'] = 'Add Attendance Per Class';

      $data['main_view'] = 'attendance_per_class/add';

      $this->load->view('index', $data);

    } else {

      $date_of_service = strtotime($this->input->post('date_of_service'));
      $date_of_service = date('Y-m-d', $date_of_service);

      foreach ($this->input->post('m ember') as $registration) {
        $values = [
            'date' => $date_of_service,
            'monthly_topic_id' => $this->input->post('monthly_topic_id'),
            'registration_id' => $registration,
        ];

        $this->AttendanceClassModel->add_attendance_per_class($values);
        $this->session->set_flashdata('message', 'Attendance has been added.');
      }

      redirect('attendance-per-class/add', 'refresh');
    }
  }


  public function print_attendance_per_class()
  {

    $this->load->library('MyPdf');

    $this->result = $this->AttendanceClassModel->fetch_attendance_per_class($this->session->userdata('monthly_topic_id'));

    $data['result'] = $this->result;

    $data['username'] = $this->session->userdata('user_info')['username'];
    $data['date'] = date('m/d/Y h:i:s a', time());
    $data['total'] = $this->result[0]['total'];


    $this->load->view('attendance_per_class/print', $data);


  }
}
