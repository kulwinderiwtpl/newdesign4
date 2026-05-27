<?php
/**
* @var \App\View\AppView $this
*/
$this->layout = false;
if($type=='pdf'){
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    error_reporting(0);
    require_once(ROOT . DS . 'vendor' . DS  .'mpdf'. DS  . 'vendor'.DS. 'autoload.php');
    
}
?>
  <?php if($type=='html'){ ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>HCF - Invoice</title>
      <style type="text/css">
        body {
          padding: 20px;
          font-family: Arial, Helvetica, sans-serif;
          position:relative
        }
      </style>
    </head>

    <body>
      <div style="display:inline; float:right;"><a style="text-decoration:none;color:#CCCCCC; font-size:11px;" href="JavaScript:window.print();">&lt;&lt;&nbsp;Print Invoice&nbsp;&gt;&gt;</a></div>
      <?php } ?>
        <?php
        // pr($loggedUser);
        // die($loggedUser['billing_entity']);
      //  $billing_entity = !empty($invoiceDetail->company_name)?'<h3>Billing Entity: '.$invoiceDetail->company_name.'</h3>':'';
	  $billing_entity='';
	  if(!empty($invoiceDetail->billing_entity))
	  {
		  $billing_entity = $invoiceDetail->billing_entity;
	  }
	  else
	  {
		  $billing_entity = $invoiceDetail->company_name;
	  }
	  //$billing_entity = !empty($invoiceDetail->company_name)?'<h3>Billing Entity: '.$invoiceDetail->company_name.'</h3>':'';
	    $biling_entity='';
	  if(!empty($invoiceDetail->billing_entity))
	  {
		  $biling_entity = $invoiceDetail->billing_entity;
	  }
	  else
	  {
		  $biling_entity = $invoiceDetail->company_name;
	  }
	  $billing_entity = !empty($invoiceDetail->company_name)?'<h3>Billing Entity: '.$biling_entity.'</h3>':'';
//<h3>Due Date: '.$invoiceDetail->date->format('d-m-y').'</h3>
//<h3>Date of event: '.$invoiceDetail->meeting_date.'</h3> Oirginal US format
$content = '
<style type="text/css">
  p {margin: 12px 0;}
  h3 {margin: 12px 0;}
</style>

<p style=""><img src="'.$this->request->webroot.'img/logo-light.png'.'" alt="HCF" /></p>
<h3>Date: '.$invoiceDetail->date->format('d-m-Y').' </h3>
<h3>Due Date: '.$invoiceDetail->meeting_date->format('d-m-Y').'</h3>
<h3>Invoice No. '.$invoiceDetail->invoice_number.'</h3>'.
$billing_entity;
if($invoiceDetail->purchase_order)
  $content .='<h3>Purchase Order: '.$invoiceDetail->purchase_order.'</h3>';

$content .='<h3>Company Name: '.$invoiceDetail->company_name.'</h3>
<h3>Date of event: '.$invoiceDetail->meeting_date->format('d-m-Y').'</h3> 
<h3>Event title: '.$invoiceDetail->meeting_title.'</h3>
<h3>Attendee(s)</h3>
<hr /> '.$invoiceDetail->attendees_name.'
<hr />
<div style="text-align: right;">
<h3>Total: £ '.$invoiceDetail->fee.'</h3>
<p>Selected Payment Method: '.$invoiceDetail->payment_method.'</p>
</div>
<hr />
<p><em>No refund of attendance fees will be given if cancellation is made less than 1 week prior to the date of a Health Claims Forum day.</em></p>
    <p>The following methods of payment are available and payment should be made prior to the event:</p>
<h3>Paying by cheque</h3>
<p>
'.$rsvp_settings->cheque_text.'
<br /> '.$rsvp_settings->return_text.'
</p>
<h3>Paying by BACS</h3>
<p>
'.$rsvp_settings->bacs_text.'
</p>
<hr />
<p style="font-size: smaller; text-align: center;">The Health Claims Forum</p>';

if($type=='html'){
    echo $content; ?>
    </body>

    </html>
    <?php } ?>
    <?php if($type=='pdf') {
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
    }
  ?>