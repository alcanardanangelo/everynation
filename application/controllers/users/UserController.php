<?php

class UserController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users/UserModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }

  }

  public function fetch_users()
  {
    $this->result = $this->UserModel->fetch_users();
    $data['result'] = $this->result;
    $data['title'] = 'User Management';
    $data['main_view'] = 'users/index';

    $this->load->view('index', $data);
  }

  public function add_users()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('is_active', 'is active', 'required|numeric');

    if (!$this->form_validation->run()) {
      $data['title'] = 'Add User';
      $data['main_view'] = 'users/add';

      $this->load->view('index', $data);
    } else {
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

      $values = [
        'username' => $this->input->post('username'),
        'password' => $password,
        'is_active' => $this->input->post('is_active'),
      ];

      $this->UserModel->add_users($values);
      $this->session->set_flashdata('message', 'User has been updated.');
      redirect('users', 'refresh');
    }

  }

  public function update_users($user_id)
  {
    $this->form_validation->set_rules('is_active', 'is active', 'required|numeric');

    if (!$this->form_validation->run()) {

      $this->result = $this->UserModel->fetch_users($user_id);

      $data['result'] = $this->result;

      $data['title'] = 'Update User';
      $data['main_view'] = 'users/update';

      $this->load->view('index', $data);
    } else {

      if ($this->input->post('password')) {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $values = [
          'password' => $password,
          'is_active' => $this->input->post('is_active'),
        ];
        $this->UserModel->update_users($user_id, $values);
      }


      $this->session->set_flashdata('message', 'User has been updated.');
      redirect('users', 'refresh');
    }

  }
}