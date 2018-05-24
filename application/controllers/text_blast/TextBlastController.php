<?php

class TextBlastController extends CI_Controller
{
  private $result;

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('user_info')) {
      redirect('/');
    }

  }

  public function send_bulk_message()
  {
    $this->form_validation->set_rules('contact_no[]', 'Contact Number', 'required');
    $this->form_validation->set_rules('text_message', 'Message', 'trim|required');

    if (!$this->form_validation->run()) {
      $this->load->model('registration/RegistrationModel');

      $this->result = $this->RegistrationModel->fetch_registration();

      $data['result'] = $this->result;

      $data['title'] = 'Text Blast';
      $data['main_view'] = 'text_blast/index';

      $this->load->view('index', $data);
    } else {


      $contact = $this->input->post('contact_no[]');

      $messages = [
        'sender' => 'EveryNation',
        'messages' => [],
      ];


      foreach ($contact as $value) {
        $messages['messages'][] = [
          'number' => $value,
          'text' => $this->input->post('text_message'),
        ];
      }


//    $messages = array(
//      // Put parameters here such as sender, force or test
//      'sender' => "SampleName",
//      'messages' => array(
//        array(
//          'number' => +639354172345,
//          'text' => rawurlencode('This is your message'),
//        ),
//        array(
//          'number' => +639262002396,
//          'text' => rawurlencode('This is another message'),
//        ),
//      ),
//    );

// Prepare data for POST request
      $data = array(
        'apikey' => '+WWQ6fppRXI-3tBkgYKDUjKZiJDuDBBhmpmhci0Jet',
        'data' => json_encode($messages),
      );

      //Send the POST request with cURL
      $ch = curl_init('https://api.txtlocal.com/bulk_json/');
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      $response = curl_exec($ch);
      curl_close($ch);

      $this->session->set_flashdata('message', 'Message has been sent.');
      redirect('text-blast', 'refresh');
    }


  }
}