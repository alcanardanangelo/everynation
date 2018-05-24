<?php

class MonthlyTopicController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/monthly_topic/MonthlyTopicModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_monthly_topic()
  {
    $this->result = $this->MonthlyTopicModel->fetch_monthly_topic();
    $data['result'] = $this->result;

    $data['title'] = 'Monthly Topics';
    $data['main_view'] = 'maintenance/monthly_topic/index';

    $this->load->view('index', $data);
  }

  public function add_monthly_topic()
  {
    $this->form_validation->set_rules('monthly_topic_name', 'Topic Title', 'trim|required');
    $this->form_validation->set_rules('monthly_topic_description', 'Topic Description', 'trim|required');

    if (!$this->form_validation->run()) {
      $data['title'] = 'Add Monthly Topic';
      $data['main_view'] = 'maintenance/monthly_topic/add';

      $this->load->view('index', $data);
    } else {

      $values = [
        'monthly_topic_name' => $this->input->post('monthly_topic_name'),
        'monthly_topic_description' => $this->input->post('monthly_topic_description'),
      ];

      $this->MonthlyTopicModel->add_monthly_topic($values);

      $this->session->set_flashdata('message', 'Monthly Topic has been added.');
      redirect('maintenance/monthly-topic', 'refresh');
    }
  }

  public function update_monthly_topic($monthly_topic_id)
  {
    $this->form_validation->set_rules('monthly_topic_name', 'Topic Title', 'trim|required');
    $this->form_validation->set_rules('monthly_topic_description', 'Topic Description', 'trim|required');

    if (!$this->form_validation->run()) {

      $this->result = $this->MonthlyTopicModel->fetch_monthly_topic($monthly_topic_id);
      $data['result'] = $this->result;

      $data['title'] = 'Update Add Monthly Topic';
      $data['main_view'] = 'maintenance/monthly_topic/update';

      $this->load->view('index', $data);
    } else {

      $values = [
        'monthly_topic_name' => $this->input->post('monthly_topic_name'),
        'monthly_topic_description' => $this->input->post('monthly_topic_description'),
      ];

      $this->MonthlyTopicModel->update_monthly_topic($monthly_topic_id, $values);

      $this->session->set_flashdata('message', 'Monthly Topic has been updated.');
      redirect('maintenance/monthly-topic', 'refresh');
    }
  }
}