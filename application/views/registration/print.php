<?php

$pdf = new MyPdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);
$pdf->SetTitle('Registration');
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
  $option .= '<tr><td>' . $value['reg_lastname'] . ', ' .  $value['reg_firstname'] . '</td>
              <td>' . $value['mobile'] . '</td>
              <td>' . $value['email_add'] . '</td>
              <td>' . $value['vgl_lastname'] .  ', ' . $value['vgl_firstname'] .'</td>
              <td>' . $value['member_type_name'] . '</td>
              <td>' . $value['status_name'] . '</td>
              </tr>';
}

$tbl = <<<EOD
<h1>Registration</h1>
<p>Printed by: $username</p>
<p>Printed Date: $date</p>
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td>Name</td>
        <td>Contact</td>
        <td>Email</td>
        <td>Leader</td>
        <td>Member Type</td>
        <td>Status</td>
        
    </tr>
    $option

</table>
EOD;
$pdf->writeHTML($tbl, TRUE, FALSE, FALSE, FALSE, '');

ob_clean();
$pdf->Output('example_006.pdf', 'I');
