<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('fetch_journey_name')) {
  function fetch_journey_name($prerequisite)
  {
    $ci = &get_instance();

    $ci->load->model('maintenance/journey/JourneyModel');

    $values = ['journey_id' => $prerequisite];

    $result = $ci->JourneyModel->fetch_journey_name($values);

    return $result['journey_name'];
  }
}