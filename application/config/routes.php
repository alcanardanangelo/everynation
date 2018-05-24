<?php
defined('BASEPATH') OR exit('No direct script access allowed');




/** Member Type */
$route['maintenance/member-type'] = 'maintenance/member_type/MemberTypeController/fetch_member_type';
$route['maintenance/member-type/add'] = 'maintenance/member_type/MemberTypeController/add_member_type';
$route['maintenance/member-type/update/(:any)'] = 'maintenance/member_type/MemberTypeController/update_member_type/$1';

/** School / Campus */
$route['maintenance/school'] = 'maintenance/school/SchoolController/fetch_school';
$route['maintenance/school/add'] = 'maintenance/school/SchoolController/add_school';
$route['maintenance/school/update/(:any)'] = 'maintenance/school/SchoolController/update_school/$1';

/** Status */
$route['maintenance/status'] = 'maintenance/status/StatusController/fetch_status';
$route['maintenance/status/add'] = 'maintenance/status/StatusController/add_status';
$route['maintenance/status/update/(:any)'] = 'maintenance/status/StatusController/update_status/$1';


/** Victory Group Leader */
$route['maintenance/victory-group-leader'] = 'maintenance/victory_group_leader/VictoryGroupLeaderController/fetch_victory_group_leader';
$route['maintenance/victory-group-leader/add'] = 'maintenance/victory_group_leader/VictoryGroupLeaderController/add_victory_group_leader';
$route['maintenance/victory-group-leader/update/(:any)'] = 'maintenance/victory_group_leader/VictoryGroupLeaderController/update_victory_group_leader/$1';

/** Class */
$route['maintenance/class'] = 'maintenance/class/ClassController/fetch_class';
$route['maintenance/class/add'] = 'maintenance/class/ClassController/add_class';
$route['maintenance/class/update/(:any)'] = 'maintenance/class/ClassController/update_class/$1';

/** Registration */
$route['registration'] = 'registration/RegistrationController/fetch_registration';
$route['registration/add'] = 'registration/RegistrationController/add_registration';
$route['registration/update/(:any)'] = 'registration/RegistrationController/update_registration/$1';

$route['registration/print'] = 'registration/RegistrationController/print_registration';

/** Guest Registration */
$route['register/guest'] = 'GuestController/guest_registration';





/** Class Registration */
$route['class-registration'] = 'class_registration/ClassRegistrationController/fetch_class_registration';
$route['class-registration/add'] = 'class_registration/ClassRegistrationController/add_class_registration';
$route['class-registration/update/(:any)'] = 'class_registration/ClassRegistrationController/update_class_registration/$1';

$route['class-registration/print'] = 'class_registration/ClassRegistrationController/print_class_registration';

/** Journey  */
$route['maintenance/journey'] = 'maintenance/journey/JourneyController/fetch_journey';
$route['maintenance/journey/add'] = 'maintenance/journey/JourneyController/add_journey';
$route['maintenance/journey/update/(:any)'] = 'maintenance/journey/JourneyController/update_journey/$1';


/** Discipleship Journey */
$route['discipleship-journey'] = 'discipleship_journey/DiscipleshipJourneyController/fetch_discipleship_journey';
$route['discipleship-journey/add'] = 'discipleship_journey/DiscipleshipJourneyController/add_discipleship_journey';
$route['discipleship-journey/update'] = 'discipleship_journey/DiscipleshipJourneyController/update_discipleship_journey_status';

$route['discipleship-journey/print'] = 'discipleship_journey/DiscipleshipJourneyController/print_discipleship_journey';
/** Text Blast */
$route['text-blast'] = 'text_blast/TextBlastController/send_bulk_message';

/** User Management */
$route['users'] = 'users/UserController/fetch_users';
$route['users/add'] = 'users/UserController/add_users';
$route['users/update/(:any)'] = 'users/UserController/update_users/$1';

/** Attendance */
$route['attendance'] = 'attendance/AttendanceController/fetch_attendance';
$route['attendance/add'] = 'attendance/AttendanceController/add_attendance';
$route['attendance/update/(:any)'] = 'attendance/AttendanceController/update_attendance/$1';

$route['attendance/print'] = 'attendance/AttendanceController/print_attendance';

/** Monthly Topic */
$route['maintenance/monthly-topic'] = 'maintenance/monthly_topic/MonthlyTopicController/fetch_monthly_topic';
$route['maintenance/monthly-topic/add'] = 'maintenance/monthly_topic/MonthlyTopicController/add_monthly_topic';
$route['maintenance/monthly-topic/update/(:any)'] = 'maintenance/monthly_topic/MonthlyTopicController/update_monthly_topic/$1';

$route['home'] = 'IndexController';

$route['logout'] = 'IndexController/logout';

/** Test PDF */
$route['testing'] = 'IndexController/testing';

/** Attendance per Class */
$route['attendance-per-class'] = 'attendance_per_class/AttendanceClassController/fetch_attendance_per_class';
$route['attendance-per-class/add'] = 'attendance_per_class/AttendanceClassController/add_attendance_per_class';
$route['attendance-per-class/print'] = 'attendance_per_class/AttendanceClassController/print_attendance_per_class';

/** Login */
$route['default_controller'] = 'IndexController/user_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
