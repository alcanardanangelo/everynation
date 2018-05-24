<?php

class VictoryGroupLeaderController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }

  }

  public function fetch_victory_group_leader()
  {
    $this->result = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();

    $data['result'] = $this->result;

    $data['title'] = 'Victory Group Leader';
    $data['main_view'] = 'maintenance/victory_group_leader/index';
    $this->load->view('index', $data);
  }

  public function add_victory_group_leader()
  {
    $this->form_validation->set_rules('victory_group_leader_firstname', 'Firstname', 'trim|required');
    $this->form_validation->set_rules('victory_group_leader_lastname', 'Lastname', 'trim|required');

    if (!$this->form_validation->run()) {
      $data['title'] = 'Add Victory Group Leader';
      $data['main_view'] = 'maintenance/victory_group_leader/add';
      $this->load->view('index', $data);
    } else {

      $values = [
        'victory_group_leader_firstname' => $this->input->post('victory_group_leader_firstname'),
        'victory_group_leader_lastname' => $this->input->post('victory_group_leader_lastname'),
      ];

      $this->VictoryGroupLeaderModel->add_victory_group_leader($values);
      $this->session->set_flashdata('message', 'Victory Group Leader has been added.');
      redirect('maintenance/victory-group-leader', 'refresh');
    }

  }

  public function update_victory_group_leader($victory_group_leader_id)
  {
    $this->form_validation->set_rules('victory_group_leader_firstname', 'Firstname', 'trim|required');
    $this->form_validation->set_rules('victory_group_leader_lastname', 'Lastname', 'trim|required');

    if (!$this->form_validation->run()) {
      $this->result = $this->VictoryGroupLeaderModel->fetch_victory_group_leader($victory_group_leader_id);

      $data['result'] = $this->result;

      $data['title'] = 'Update Victory Group Leader';
      $data['main_view'] = 'maintenance/victory_group_leader/update';

      $this->load->view('index', $data);
    } else {

      $values = [
        'victory_group_leader_firstname' => $this->input->post('victory_group_leader_firstname'),
        'victory_group_leader_lastname' => $this->input->post('victory_group_leader_lastname'),
      ];

      $this->VictoryGroupLeaderModel->update_victory_group_leader($victory_group_leader_id, $values);

      $this->session->set_flashdata('message', 'Victory Group Leader has been updated.');
      redirect('maintenance/victory-group-leader', 'refresh');
    }


  }
}