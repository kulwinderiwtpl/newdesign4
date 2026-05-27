<?php
/**
* @var \App\View\AppView $this
*/
$this->layout = false;

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    error_reporting(0);
    require_once(ROOT . DS . 'vendor' . DS  .'mpdf'. DS  . 'vendor'.DS. 'autoload.php');
    // pr($attendees_first);die;
// pr($loggedUser);
// die($loggedUser['billing_entity']);
//$billing_entity = !empty($invoiceDetail->billing_entity)?'<h3>Billing Entity: '.$invoiceDetail->billing_entity.'</h3>':'';
if(!empty($attendees_first)){
$content = '
<style type="text/css">
td {font-size: 14px;}
h3 {margin: 12px 0;}
</style>
<html><body style="text-align: center;font-family:helvetica;">
<img src="'.$this->request->webroot.'img/logo-big.png'.'" alt="HCF" />
<h2 style="color:#1C84C6">Delegate List</h2>
<h3>'.$attendees_first->meeting->date->format('l jS').' of '.$attendees_first->meeting->date->format('F Y').' - '.$attendees_first->meeting->title.'</h3>
<table border="1" width="90%" cellspacing="0" cellpadding="2" align="center">';
// echo $content;die;
foreach($attendees as $attendee){
    // pr($attendee);
    if($attendee->type==='nonmember'){
        $company=$attendee->companytext;
        
    }else{
        $company=$attendee->Companies['name'];
    }
    $content .='<tr><td>'.$attendee->user_name.' '.$attendee->last_name.'</td><td>'. $company.'</td></tr>';
}
$content.= '</table></body></html>';
// echo $content;die;

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($content);
$mpdf->Output();
}
// $html2pdf = new HTML2PDF('P','A4','en');
// $html2pdf->WriteHTML($content);
// $html2pdf->Output('exemple00.pdf');
// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,$content);
// $pdf->Output();

//Set Your Options -- see documentation for all options
// $pdf_options = array(
//       "source_type" => 'html',
//       "source" => $content,
//       "action" => 'view'
// );

// //Code to generate PDF file from options above
// phptopdf($pdf_options);
exit;

?>