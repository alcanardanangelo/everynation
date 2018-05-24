<?php

$pdf = new MyPdf('P', 'mm', 'A4', TRUE, 'UTF-8', FALSE);
$pdf->SetTitle('My Title');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(TRUE);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('helvetica', '', 10);

$pdf->AddPage();


$option = '';

foreach ($class as $key => $value) {
  $option .= '<tr><td>' . $value['class_id'] . '</td><td>' . $value['class_name'] . '</td></tr>';
}


$tbl = <<<EOD
<h1>hhehe</h1>
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td></td>
        <td>COL 2 - ROW 1</td>
    </tr>
    $option

</table>
EOD;
$pdf->writeHTML($tbl, TRUE, FALSE, FALSE, FALSE, '');


$pdf->Output('example_006.pdf', 'I');
