<?php

class RegistrationController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('registration/RegistrationModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }

  }

  public function fetch_registration()
  {


    if ($this->input->post('search_registration')) {

      if ($this->input->post('name')) {
        $name = $this->input->post('name');
      } else {
        $name = 'NULL';
      }

      if ($this->input->post('school_id')) {
        $school_id = $this->input->post('school_id');
      } else {
        $school_id = 'NULL';
      }

      if ($this->input->post('member_type_id')) {
        $member_type_id = $this->input->post('member_type_id');
      } else {
        $member_type_id = 'NULL';
      }

      if ($this->input->post('status_id')) {
        $status_id = $this->input->post('status_id');
      } else {
        $status_id = 'NULL';
      }

      $this->session->set_userdata('name', $name);
      $this->session->set_userdata('school_id', $school_id);
      $this->session->set_userdata('member_type_id', $member_type_id);
      $this->session->set_userdata('status_id', $status_id);

      $this->result = $this->RegistrationModel->fetch_registration_filter($name, $school_id, $member_type_id, $status_id);

      $data['result'] = $this->result;
    }

    /** School */
    $this->load->model('maintenance/school/SchoolModel');
    $school = $this->SchoolModel->fetch_school();
    $data['school'] = $school;

    /** School */
    $this->load->model('maintenance/member_type/MemberTypeModel');
    $member_type = $this->MemberTypeModel->fetch_member_type();
    $data['member_type'] = $member_type;

    /** Status */
    $this->load->model('maintenance/status/StatusModel');
    $status = $this->StatusModel->fetch_status();
    $data['status'] = $status;

    $data['title'] = 'Registration';
    $data['main_view'] = 'registration/index';
    $this->load->view('index', $data);
  }

  public function print_registration()
  {
    $this->load->library('MyPdf');
    $this->result = $this->RegistrationModel->fetch_registration_filter($this->session->userdata('name'), $this->session->userdata('school_id'), $this->session->userdata('member_type_id'), $this->session->userdata('status_id'));
    $data['result'] = $this->result;

    $data['username'] = $this->session->userdata('user_info')['username'];
    $data['date'] = date('m/d/Y h:i:s a', time());

    $this->load->view('registration/print', $data);
  }

  public function add_registration()
  {
    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
    $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
    $this->form_validation->set_rules('school_id', 'School / Campus', 'trim|required');
    $this->form_validation->set_rules('member_type_id', 'Member Type', 'trim|required');
    $this->form_validation->set_rules('status_id', 'Status', 'trim|required');

    if (!$this->form_validation->run()) {
      /** Member Type */
      $this->load->model('maintenance/member_type/MemberTypeModel');
      $member_type = $this->MemberTypeModel->fetch_member_type();
      $data['member_type'] = $member_type;

      /** School / Campus */
      $this->load->model('maintenance/school/SchoolModel');
      $school = $this->SchoolModel->fetch_school();
      $data['school'] = $school;

      /** Victory Group Leader */
      $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');
      $victory_group_leader = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();
      $data['victory_group_leader'] = $victory_group_leader;
      /** Status */
      $this->load->model('maintenance/status/StatusModel');
      $status = $this->StatusModel->fetch_status();
      $data['status'] = $status;

      $data['title'] = 'Add Registration';
      $data['main_view'] = 'registration/add';

      $this->load->view('index', $data);
    } else {
      if (preg_match('/^0/', $this->input->post('contact_no'))) {
        $str = ltrim($this->input->post('contact_no'), '0');
        $mobile = '+63' . $str;
      } else {
        $mobile = $this->input->post('contact_no');
      }

      $values = [
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'contact_no' => $mobile,
        'email' => $this->input->post('email'),
        'street' => $this->input->post('street'),
        'barangay' => $this->input->post('barangay'),
        'city' => $this->input->post('city'),
        'province' => $this->input->post('province'),
        'birthday' => $this->input->post('birthday'),
        'school_id' => $this->input->post('school_id'),
        'victory_group_leader_id' => $this->input->post('victory_group_leader_id'),
        'member_type_id' => $this->input->post('member_type_id'),
        'status_id' => $this->input->post('status_id'),
      ];

      $this->RegistrationModel->add_registration($values);
      $this->session->set_flashdata('message', 'Registration has been added.');
      redirect('registration', 'refresh');
    }


  }

  public function update_registration($registration_id)
  {
    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
    $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required');
    $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
    $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
    $this->form_validation->set_rules('school_id', 'School / Campus', 'trim|required');

    if (!$this->form_validation->run()) {
      /** Member Type */
      $this->load->model('maintenance/member_type/MemberTypeModel');
      $member_type = $this->MemberTypeModel->fetch_member_type();
      $data['member_type'] = $member_type;

      /** School / Campus */
      $this->load->model('maintenance/school/SchoolModel');
      $school = $this->SchoolModel->fetch_school();
      $data['school'] = $school;

      /** Victory Group Leader */
      $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');
      $victory_group_leader = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();
      $data['victory_group_leader'] = $victory_group_leader;

      /** Status */
      $this->load->model('maintenance/status/StatusModel');
      $status = $this->StatusModel->fetch_status();
      $data['status'] = $status;

      /** Class Registration */
      $class = $this->RegistrationModel->fetch_class_registration_by_member($registration_id);
      $data['class'] = $class;

      $this->result = $this->RegistrationModel->fetch_registration($registration_id);
      $data['result'] = $this->result;

      $data['title'] = 'Update Registration';
      $data['main_view'] = 'registration/update';

      $this->load->view('index', $data);
    } else {

      if (preg_match('/^0/', $this->input->post('contact_no'))) {
        $str = ltrim($this->input->post('contact_no'), '0');
        $mobile = '+63' . $str;
      } else {
        $mobile = $this->input->post('contact_no');
      }
      $values = [
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'contact_no' => $mobile,
        'email' => $this->input->post('email'),
        'street' => $this->input->post('street'),
        'barangay' => $this->input->post('barangay'),
        'city' => $this->input->post('city'),
        'province' => $this->input->post('province'),
        'birthday' => $this->input->post('birthday'),
        'school_id' => $this->input->post('school_id'),
        'victory_group_leader_id' => $this->input->post('victory_group_leader_id'),
        'member_type_id' => $this->input->post('member_type_id'),
        'status_id' => $this->input->post('status_id'),
      ];

      $this->RegistrationModel->update_registration($registration_id, $values);
      $this->session->set_flashdata('message', 'Registration has been updated.');
      redirect('registration', 'refresh');
    }
  }


}