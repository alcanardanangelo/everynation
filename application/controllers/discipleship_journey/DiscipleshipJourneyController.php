<?php


class DiscipleshipJourneyController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('discipleship_journey/DiscipleshipJourneyModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_discipleship_journey()
  {
    $this->form_validation->set_rules('registration_id', 'Member Name', 'trim|required|numeric');

    if (!$this->form_validation->run()) {


    } else {

      /** Available Journey */
      $available_journey = $this->DiscipleshipJourneyModel->fetch_available_journey($this->input->post('registration_id'));
      $data['available_journey'] = $available_journey;


      $data['registration_id'] = $this->input->post('registration_id');

      $this->load->model('registration/RegistrationModel');
      $reg = $this->RegistrationModel->fetch_registration($this->input->post('registration_id'));
      $data['member'] = $reg['lastname'] . ', ' . $reg['firstname'];
      $this->session->set_userdata('registration_id', $this->input->post('registration_id'));

      $this->result = $this->DiscipleshipJourneyModel->fetch_discipleship_journey_by_member($this->input->post('registration_id'));
      $data['result'] = $this->result;
    }
    /** Registration */
    $this->load->model('registration/RegistrationModel');
    $registration = $this->RegistrationModel->fetch_registration();
    $data['registration'] = $registration;


    /** Journey */
    $this->load->model('maintenance/journey/JourneyModel');
    $journey = $this->JourneyModel->fetch_journey();
    $data['journey'] = $journey;

    /** Victory Group Leader */
    $this->load->model('maintenance/victory_group_leader/VictoryGroupLeaderModel');
    $victory_group_leader = $this->VictoryGroupLeaderModel->fetch_victory_group_leader();
    $data['victory_group_leader'] = $victory_group_leader;

    $data['title'] = 'Discipleship Journey';
    $data['main_view'] = 'discipleship_journey/index';

    $this->load->view('index', $data);


  }

  public function print_discipleship_journey()
  {

    $this->load->library('MyPdf');

    $this->result = $this->DiscipleshipJourneyModel->fetch_discipleship_journey_by_member($this->session->userdata('registration_id'));

    $data['result'] = $this->result;

    $this->load->model('registration/RegistrationModel');
    $reg = $this->RegistrationModel->fetch_registration($this->session->userdata('registration_id'));
    $data['member'] = $reg['lastname'] . ', ' . $reg['firstname'];

    $data['username'] = $this->session->userdata('user_info')['username'];
    $data['date'] = date('m/d/Y h:i:s a', time());

    $this->load->view('discipleship_journey/print', $data);
  }

  public function add_discipleship_journey()
  {
    $values = [
        'journey_id' => $this->input->post('journey_id'),
        'registration_id' => $this->input->post('registration_id'),
        'victory_group_leader_id' => $this->input->post('victory_group_leader_id'),
    ];

    $this->DiscipleshipJourneyModel->add_discipleship_journey($values);
    $this->session->set_flashdata('message', 'Journey has been added.');

  }

  public function update_discipleship_journey_status()
  {
    $values = [
        'status' => $this->input->post('status'),
        'date_journey_end' => date('Y-m-d H:i:s'),
    ];

    $this->DiscipleshipJourneyModel->update_discipleship_journey_status($this->input->post('registration_id'), $values);
    $this->session->set_flashdata('message', 'Journey has been updated.');
  }


}