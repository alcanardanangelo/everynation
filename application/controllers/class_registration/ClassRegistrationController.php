<?php

class ClassRegistrationController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('class_registration/ClassRegistrationModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_class_registration()
  {

    if ($this->input->post('search_class_registration')) {

      if ($this->input->post('name')) {
        $name = $this->input->post('name');
      } else {
        $name = 'NULL';
      }

      if ($this->input->post('class_id')) {
        $class_id = $this->input->post('class_id');
      } else {
        $class_id = 'NULL';
      }

      if ($this->input->post('victory_group_leader_id')) {
        $victory_group_leader_id = $this->input->post('victory_group_leader_id');
      } else {
        $victory_group_leader_id = 'NULL';
      }

      if ($this->input->post('is_paid')) {
        $is_paid = $this->input->post('is_paid');
      } else {
        $is_paid = 'NULL';
      }

      $this->session->set_userdata('name', $name);
      $this->session->set_userdata('class_id', $class_id);
      $this->session->set_userdata('victory_group_leader_id', $victory_group_leader_id);
      $this->session->set_userdata('is_paid', $is_paid);

      $this->result = $this->ClassRegistrationModel->fetch_class_registration_filter($name, $class_id, $victory_group_leader_id, $is_paid);

      $data['result'] = $this->result;
    }
    /** School */
    $this->load->model('maintenance/class/ClassModel');
    $class = $this->ClassModel->fetch_class();
    $data['class'] = $class;

    /** School */
    $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');
    $victory_group_leader = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();
    $data['victory_group_leader'] = $victory_group_leader;


    $data['title'] = 'Class Registration';
    $data['main_view'] = 'class_registration/index';

    $this->load->view('index', $data);

  }

  public function print_class_registration()
  {
    $this->load->library('MyPdf');

    $this->result = $this->ClassRegistrationModel->fetch_class_registration_filter($this->session->userdata('name'), $this->session->userdata('class_id'), $this->session->userdata('victory_group_leader_id'), $this->session->userdata('is_paid'));

    $data['result'] = $this->result;

    $data['username'] = $this->session->userdata('user_info')['username'];
    $data['date'] = date('m/d/Y h:i:s a', time());

    $this->load->view('class_registration/print', $data);

  }

  public function add_class_registration()
  {
    $this->form_validation->set_rules('class_id', 'Class Title', 'trim|required|numeric');
    $this->form_validation->set_rules('registration_id', 'Name', 'trim|required|numeric');
    $this->form_validation->set_rules('victory_group_leader_id', 'Victory Group Leader', 'trim|required|numeric');
    $this->form_validation->set_rules('date_class', 'Date of Class', 'trim|required');
    $this->form_validation->set_rules('payment', 'Payment', 'trim|required|numeric');

    if (!$this->form_validation->run()) {
      /** Class */
      $this->load->model('maintenance/class/ClassModel');
      $class = $this->ClassModel->fetch_class();
      $data['class'] = $class;

      /** Registration */
      $this->load->model('registration/RegistrationModel');
      $registration = $this->RegistrationModel->fetch_registration();
      $data['registration'] = $registration;

      /** Victory Group Leader */
      $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');
      $victory_group_leader = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();
      $data['victory_group_leader'] = $victory_group_leader;

      $data['title'] = 'Add Class Registration';
      $data['main_view'] = 'class_registration/add';

      $this->load->view('index', $data);
    } else {
      $values = [
          'class_id' => $this->input->post('class_id'),
          'registration_id' => $this->input->post('registration_id'),
          'victory_group_leader_id' => $this->input->post('victory_group_leader_id'),
          'date_class' => $this->input->post('date_class'),
          'payment' => $this->input->post('payment'),
      ];

      $this->ClassRegistrationModel->add_class_registration($values);
      $this->session->set_flashdata('message', 'Class Registration has been added.');
      redirect('class-registration', 'refresh');
    }
  }

  public
  function update_class_registration($class_registration_id)
  {
    $this->form_validation->set_rules('class_id', 'Class Title', 'trim|required|numeric');
    $this->form_validation->set_rules('registration_id', 'Name', 'trim|required|numeric');
    $this->form_validation->set_rules('victory_group_leader_id', 'Victory Group Leader', 'trim|required|numeric');
    $this->form_validation->set_rules('date_class', 'Date of Class', 'trim|required');
    $this->form_validation->set_rules('payment', 'Payment', 'trim|required|numeric');

    if (!$this->form_validation->run()) {
      /** Class */
      $this->load->model('maintenance/class/ClassModel');
      $class = $this->ClassModel->fetch_class();
      $data['class'] = $class;

      /** Registration */
      $this->load->model('registration/RegistrationModel');
      $registration = $this->RegistrationModel->fetch_registration();
      $data['registration'] = $registration;

      /** Victory Group Leader */
      $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');
      $victory_group_leader = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();
      $data['victory_group_leader'] = $victory_group_leader;

      $this->result = $this->ClassRegistrationModel->fetch_class_registration($class_registration_id);
      $data['result'] = $this->result;

      $data['title'] = 'Update Class Registration';
      $data['main_view'] = 'class_registration/update';

      $this->load->view('index', $data);
    } else {
      $values = [
          'class_id' => $this->input->post('class_id'),
          'registration_id' => $this->input->post('registration_id'),
          'victory_group_leader_id' => $this->input->post('victory_group_leader_id'),
          'date_class' => $this->input->post('date_class'),
          'payment' => $this->input->post('payment'),
      ];

      $this->ClassRegistrationModel->update_class_registration($class_registration_id, $values);
      $this->session->set_flashdata('message', 'Class Registration has been updated.');
      redirect('class-registration', 'refresh');
    }
  }
}