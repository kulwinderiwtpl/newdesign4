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
$content = '
<style type="text/css">
td {font-size: 12px;padding:0px 15px 0px 0px;}
h3 {margin: 12px 0;}


</style>
<html><body style="text-align: center; font-family:helvetica">
<table border="0" width="90%" cellspacing="0" cellpadding="2" align="center">';
// echo $content;die;
foreach($attendees as $key=>$attendee){
    //pr($attendee);die;
    
  if($attendee->type==='nonmember'){
        $company=$attendee->companytext;
        
    }else{
        $company=$attendee->Companies['name'];
    }
    
    
      
      if($key%2==0)
        $content.='<tr style="">';
    $content .='<td style="width:50%;margin-top:5px"><table><tr><td style="font-size: 15px; font-weight:bold;display:block;overflow:auto">Health Claims Forum - '.$attendees_first->meeting->date->format('d/m/Y').'</td></tr><br/><br/>'.'<tr><td style="font-size: 25px; font-weight:bold;display:block;overflow:auto;hieght:30px">'.$attendee->user_name.' '.$attendee->last_name.'</td></tr><br/><br/><tr><td style="font-size: 15px; margin-bottom:4px;display:block;overflow:auto">'.$company.'</td></tr></table><br><br></td><td></td>';
    if($key%2==1)
        $content.='</tr><tr>
    <td>
        &nbsp;
        <!--you just need a space in a row-->
    </td>
</tr><br/><br/>';  
    
   
}
$content.= '</table></body></html>';
// echo $content;die;

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($content);
$mpdf->Output();
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