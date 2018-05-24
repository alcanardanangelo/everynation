<?php

$pdf = new MyPdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);
$pdf->SetTitle('Attendance Per Summary');
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
  $option .= '<tr><td>' . $value['monthly_topic_name'] . '</td>
              <td>' . $value['date_of_service'] . '</td>
              <td>' . $value['time_of_service'] . '</td>
              <td>' . $value['no_of_attendees'] . '</td>
              </tr>';
}

$tbl = <<<EOD
<h1>Attendance Summary</h1>
<p>Printed by: $username</p>
<p>Printed Date: $date</p>
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td>Monthly Topic</td>
        <td>Date</td>
        <td>Time of Service</td>
        <td>Attendees</td>
    </tr>
    $option

</table>
<h4>Total Attendees: $total</h4>
EOD;
$pdf->writeHTML($tbl, TRUE, FALSE, FALSE, FALSE, '');

ob_clean();
$pdf->Output('example_006.pdf', 'I');
