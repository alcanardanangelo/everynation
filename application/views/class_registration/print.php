<?php

$pdf = new MyPdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);
$pdf->SetTitle('Class Registration');
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
  $option .= '<tr><td>' . $value['lastname'] . ', ' .  $value['firstname'] . '</td>
              <td>' . $value['class_name'] . '</td>
              <td>' . $value['date_class'] . '</td>
              <td>' . $value['victory_group_leader_firstname'] .  ', ' . $value['victory_group_leader_lastname'] .'</td>
              <td>' . $value['payment'] . '</td>
              <td>' . $value['balance'] . '</td>
              </tr>';
}

$tbl = <<<EOD
<h1>Class Registration</h1>
<p>Printed by: $username</p>
<p>Printed Date: $date</p>
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td>Name</td>
        <td>Class</td>
        <td>Date of Class</td>
        <td>Victory Group Leader</td>
        <td>Payment</td>
        <td>Balance</td>
    </tr>
    $option

</table>
EOD;
$pdf->writeHTML($tbl, TRUE, FALSE, FALSE, FALSE, '');

ob_clean();
$pdf->Output('example_006.pdf', 'I');
