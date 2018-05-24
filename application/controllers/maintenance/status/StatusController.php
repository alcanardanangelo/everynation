<?php

class StatusController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/status/StatusModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }

  }

  public function fetch_status()
  {
    $this->result = $this->StatusModel->fetch_status();

    $data['result'] = $this->result;

    $data['title'] = 'Status';
    $data['main_view'] = 'maintenance/status/index';
    $this->load->view('index', $data);
  }

  public function update_status($status_id)
  {
    $this->form_validation->set_rules('status_name', 'Status Name', 'trim|required');

    if (!$this->form_validation->run()) {
      $this->result = $this->StatusModel->fetch_status($status_id);

      $data['result'] = $this->result;

      $data['title'] = 'Update Status';
      $data['main_view'] = 'maintenance/status/update';

      $this->load->view('index', $data);
    } else {

      $values = [
        'status_name' => $this->input->post('status_name'),
      ];

      $this->StatusModel->update_status($status_id, $values);

      $this->session->set_flashdata('message', 'Status has been updated.');
      redirect('maintenance/status', 'refresh');
    }


  }

  public function add_status()
  {
    $this->form_validation->set_rules('status_name', 'Status Name', 'trim|required');

    if (!$this->form_validation->run()) {
      $data['title'] = 'Add Status';
      $data['main_view'] = 'maintenance/status/add';
      $this->load->view('index', $data);
    } else {

      $values = [
        'status_name' => $this->input->post('status_name'),
      ];

      $this->StatusModel->add_status($values);
      $this->session->set_flashdata('message', 'Status has been added.');
      redirect('maintenance/status', 'refresh');
    }

  }
}