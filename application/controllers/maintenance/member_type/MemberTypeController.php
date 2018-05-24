<?php

class MemberTypeController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('maintenance/member_type/MemberTypeModel');

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }
  }

  public function fetch_member_type()
  {
    $this->result = $this->MemberTypeModel->fetch_member_type();

    $data['result'] = $this->result;

    $data['title'] = 'Member Type';
    $data['main_view'] = 'maintenance/member_type/index';
    $this->load->view('index', $data);
  }

  public function add_member_type()
  {
    $this->form_validation->set_rules('member_type_name', 'Member Type Name', 'trim|required');

    if (!$this->form_validation->run()) {
      $data['title'] = 'Add Member Type';
      $data['main_view'] = 'maintenance/member_type/add';
      $this->load->view('index', $data);
    } else {

      $values = [
        'member_type_name' => $this->input->post('member_type_name'),
      ];

      $this->MemberTypeModel->add_member_type($values);
      $this->session->set_flashdata('message', 'Member Type has been added.');
      redirect('maintenance/member-type', 'refresh');
    }


  }

  public function update_member_type($member_type_id)
  {
    $this->form_validation->set_rules('member_type_name', 'Member type Name', 'trim|required');

    if (!$this->form_validation->run()) {
      $this->result = $this->MemberTypeModel->fetch_member_type($member_type_id);

      $data['result'] = $this->result;

      $data['title'] = 'Update Member Type';
      $data['main_view'] = 'maintenance/member_type/update';

      $this->load->view('index', $data);
    } else {

      $values = [
        'member_type_name' => $this->input->post('member_type_name'),
      ];

      $this->MemberTypeModel->update_member_type($member_type_id, $values);

      $this->session->set_flashdata('message', 'Member type has been updated.');
      redirect('maintenance/member-type', 'refresh');
    }


  }
}