<?php


class ClassController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/class/ClassModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }

  }

  public function fetch_class()
  {
    $this->result = $this->ClassModel->fetch_class();
    $data['result'] = $this->result;

    $data['title'] = 'Class';
    $data['main_view'] = 'maintenance/class/index';

    $this->load->view('index', $data);
  }

  public function add_class()
  {
    $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
    $this->form_validation->set_rules('class_description', 'Class Description', 'trim|required');
    $this->form_validation->set_rules('price', 'Price', 'trim|required');

    if (!$this->form_validation->run()) {

      $data['title'] = 'Add Class';
      $data['main_view'] = 'maintenance/class/add';

      $this->load->view('index', $data);
    } else {

      $values = [
        'class_name' => $this->input->post('class_name'),
        'class_description' => $this->input->post('class_description'),
        'price' => $this->input->post('price'),
      ];

      $this->ClassModel->add_class($values);

      $this->session->set_flashdata('message', 'Class has been added.');
      redirect('maintenance/class', 'refresh');
    }

  }

  public function update_class($class_id)
  {
    $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
    $this->form_validation->set_rules('class_description', 'Class Description', 'trim|required');
    $this->form_validation->set_rules('price', 'Price', 'trim|required');

    if (!$this->form_validation->run()) {

      $this->result = $this->ClassModel->fetch_class($class_id);
      $data['result'] = $this->result;

      $data['title'] = 'Update Class';
      $data['main_view'] = 'maintenance/class/update';

      $this->load->view('index', $data);
    } else {

      $values = [
        'class_name' => $this->input->post('class_name'),
        'class_description' => $this->input->post('class_description'),
        'price' => $this->input->post('price'),
      ];

      $this->ClassModel->update_class($class_id, $values);

      $this->session->set_flashdata('message', 'Class has been updated.');
      redirect('maintenance/class', 'refresh');
    }

  }
}