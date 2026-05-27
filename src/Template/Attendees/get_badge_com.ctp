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
td {font-size: 12px;padding:5px 15px 5px 5px;margin-bottom:8px}
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
    if($attendee->attendee_status=="Speaker" ){
       // pr($attendee);die; 
       
      if($key%2==0)
        $content.='<tr style="">';
    $content .='<td style="width:50%;background-color:#459e71 ;white-space: nowrap;"><br/><br/><table style="font-size:15px;color:white;"><tr><td style="font-size: 15px; font-weight:bold;padding:10px;display:block;overflow:auto">Health Claims Forum - '.$attendees_first->meeting->date->format('d/m/Y').'</td></tr><br/><br/>'.'<tr><td style="font-size: 25px; font-weight:bold; padding:10px;display:block;overflow:auto">'.$attendee->user_name.' '.$attendee->last_name.'</td></tr><br/><br/><tr><td style="font-size: 15px; margin-bottom:4px;padding:10px;display:block;overflow:auto">'.$company.'</td></tr></table><br><br></td><td></td>';
    if($key%2==1)
        $content.='</tr><tr>
    <td>
        &nbsp;
        <!--you just need a space in a row-->
    </td>
</tr><br/><br/>';  
        
    }elseif($attendee->attendee_status=="Committee"){
          //pr($attendee);die;
      if($key%2==0)
        $content.='<tr style="">';
    $content .='<td style="width:50%;background-color:#ed1c24 ;white-space: nowrap;"><br/><br/><table style="font-size:15px;color:white;"><tr><td style="font-size: 15px; font-weight:bold;padding:10px;display:block;overflow:auto">Health Claims Forum - '.$attendees_first->meeting->date->format('d/m/Y').'</td></tr><br/><br/>'.'<tr><td style="font-size: 25px; font-weight:bold; padding:10px;display:block;overflow:auto">'.$attendee->user_name.' '.$attendee->last_name.'</td></tr><br/><br/><tr><td style="font-size: 15px; margin-bottom:4px;padding:10px;display:block;overflow:auto">'.$company.'</td></tr></table><br><br></td><td></td>';
    if($key%2==1)
        $content.='</tr><tr>
    <td>
        &nbsp;
        <!--you just need a space in a row-->
    </td>
</tr><br/><br/>';  
        
        
    }else{
    
    
    
    if($key%2==0)
        $content.='<tr>';
    $content .='<td style="width:50%;"><br/><br/><br/><br/><span style="font-size: 9px;">Health Claims Forum - '.$attendees_first->meeting->date->format('d/m/Y').'<br/><br/><br/></span>'.'<span style="font-size: 12px; font-weight:bold;">'.$attendee->user_name.'</span><span style="font-size: 10px;"><br/>'.$attendee->attendee_status.'<br/><br/><br/></span><span style="font-size: 11px;">'.$company.'</span></td>';
    if($key%2==1)
   $content.='</tr><br/><br/>'; 
    
    }
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