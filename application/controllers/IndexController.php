<?php

class IndexController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('IndexModel');
  }

  public function index()
  {

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    } else {
      $data['title'] = 'EveryNation';
      $data['main_view'] = 'home';

      $this->load->view('index', $data);
    }

  }

  public function user_login()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if (!$this->form_validation->run()) {
      $data['title'] = 'EveryNation';
      $this->load->view('login');
    } else {
      $values = ['username' => $this->input->post('username')];

      $this->result = $this->IndexModel->user_login($values);

      if (password_verify($this->input->post('password'), $this->result['password'])) {
       $this->session->set_userdata('user_info', $this->result);

        redirect('home', 'refresh');
      } else {
        redirect('/', 'refresh');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/', 'refresh');
  }

  public function testing()
  {

  }

}