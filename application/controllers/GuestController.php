<?php

class GuestController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('registration/RegistrationModel');
  }

  public function guest_registration()
  {


    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
    $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
    $this->form_validation->set_rules('school_id', 'School / Campus', 'trim|required');

    if (!$this->form_validation->run()) {

      /** School / Campus */
      $this->load->model('maintenance/school/SchoolModel');
      $school = $this->SchoolModel->fetch_school();
      $data['school'] = $school;

      $data['title'] = 'Guest Registration';
      $this->load->view('registration/guest_register', $data);

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
      ];

      $this->RegistrationModel->add_registration($values);
      $this->session->set_flashdata('message', 'Registration has been added.');
      redirect('/', 'refresh');
    }


  }
}