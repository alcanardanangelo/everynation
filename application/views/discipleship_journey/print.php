<?php

$pdf = new MyPdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);
$pdf->SetTitle('Discipleship Journey');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(TRUE);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('times', '', 10);

$pdf->AddPage();


$option = '';

foreach ($result as $key => $value) {
  if ($value['status'] == 1) {
    $status = 'Completed';
  } else {
    $status = 'Ongoing';
  }
  $option .= '<tr><td>' . $value['journey_name'] . '</td>
              <td>' . $status . '</td>
              <td>' . $value['date_journey_start'] . '</td>
              <td>' . $value['date_journey_end'] . '</td>
              <td>' . $value['victory_group_leader_firstname'] .  ', ' . $value['victory_group_leader_lastname'] .'</td>
              </tr>';
}


$tbl = <<<EOD
<h1>Discipleship Journey ($member)</h1>
<p>Printed by: $username</p>
<p>Printed Date: $date</p>
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td>Journey Name</td>
        <td>Status</td>
        <td>Date Started</td>
        <td>Date Completed</td>
        <td>Victory Group Leader</td>
    </tr>
    $option

</table>
EOD;
$pdf->writeHTML($tbl, TRUE, FALSE, FALSE, FALSE, '');

ob_clean();
$pdf->Output('example_006.pdf', 'I');
