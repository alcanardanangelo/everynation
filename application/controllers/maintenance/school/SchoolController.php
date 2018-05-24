<?php

class SchoolController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/school/SchoolModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_school()
  {
    $this->result = $this->SchoolModel->fetch_school();

    $data['result'] = $this->result;

    $data['title'] = 'School / Campus';
    $data['main_view'] = 'maintenance/school/index';
    $this->load->view('index', $data);
  }

  public function add_school()
  {
    $this->form_validation->set_rules('school_name', 'School Name', 'trim|required');

    if (!$this->form_validation->run()) {
      $data['title'] = 'Add School / Campus';
      $data['main_view'] = 'maintenance/school/add';
      $this->load->view('index', $data);
    } else {

      $values = [
        'school_name' => $this->input->post('school_name'),
      ];

      $this->SchoolModel->add_school($values);

      $this->session->set_flashdata('message', 'School has been added.');
      redirect('maintenance/school', 'refresh');
    }

  }

  public function update_school($school_id)
  {
    $this->form_validation->set_rules('school_name', 'School Name', 'trim|required');

    if (!$this->form_validation->run()) {
      $this->result = $this->SchoolModel->fetch_school($school_id);

      $data['result'] = $this->result;

      $data['title'] = 'Update School';
      $data['main_view'] = 'maintenance/school/update';

      $this->load->view('index', $data);
    } else {

      $values = [
        'school_name' => $this->input->post('school_name'),
      ];

      $this->SchoolModel->update_school($school_id, $values);

      $this->session->set_flashdata('message', 'School has been updated.');
      redirect('maintenance/school', 'refresh');
    }


  }
}
