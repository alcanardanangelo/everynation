<?php

class JourneyController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/journey/JourneyModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_journey()
  {
    $this->result = $this->JourneyModel->fetch_journey();
    $data['result'] = $this->result;

    $data['title'] = 'Journey';
    $data['main_view'] = 'maintenance/journey/index';

    $this->load->view('index', $data);
  }

  public function add_journey()
  {
    $this->form_validation->set_rules('journey_name', 'Journey Name', 'trim|required');
    $this->form_validation->set_rules('journey_description', 'Journey Description', 'trim');
    $this->form_validation->set_rules('prerequisite', 'Prerequisite', 'trim');
    $this->form_validation->set_rules('weight', 'Weight', 'trim');

    if (!$this->form_validation->run()) {
      $prerequisite = $this->JourneyModel->fetch_journey();
      $data['prerequisite'] = $prerequisite;

      $data['title'] = 'Add Journey';
      $data['main_view'] = 'maintenance/journey/add';

      $this->load->view('index', $data);
    } else {
      $values = [
        'journey_name' => $this->input->post('journey_name'),
        'journey_description' => $this->input->post('journey_description'),
        'prerequisite' => $this->input->post('prerequisite'),
        'weight' => $this->input->post('weight'),
      ];
      $this->JourneyModel->add_journey($values);

      $this->session->set_flashdata('message', 'Journey has been created.');
      redirect('maintenance/journey', 'refresh');
    }

  }

  public function update_journey($journey_id)
  {
    $this->form_validation->set_rules('journey_name', 'Journey Name', 'trim|required');
    $this->form_validation->set_rules('journey_description', 'Journey Description', 'trim');
    $this->form_validation->set_rules('prerequisite', 'Prerequisite', 'trim');
    $this->form_validation->set_rules('weight', 'Weight', 'trim');

    if (!$this->form_validation->run()) {
      $prerequisite = $this->JourneyModel->fetch_journey();
      $data['prerequisite'] = $prerequisite;

      $this->result = $this->JourneyModel->fetch_journey($journey_id);

      $data['result'] = $this->result;

      $data['title'] = 'Update Journey';
      $data['main_view'] = 'maintenance/journey/update';

      $this->load->view('index', $data);
    } else {
      $values = [
        'journey_name' => $this->input->post('journey_name'),
        'journey_description' => $this->input->post('journey_description'),
        'prerequisite' => $this->input->post('prerequisite'),
        'weight' => $this->input->post('weight'),
      ];
      $this->JourneyModel->update_journey($journey_id, $values);

      $this->session->set_flashdata('message', 'Journey has been updated.');
      redirect('maintenance/journey', 'refresh');
    }
  }
}