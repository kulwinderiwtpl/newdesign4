<?php
/**
* @var \App\View\AppView $this
*/
$this->layout = false;
if($type=='pdf'){
    require_once(ROOT . DS . 'vendor' . DS  . 'mpdf' . DS . 'mpdf.php');
    
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
        }
      </style>
    </head>

    <body>
      <div style="display:inline; float:right;"><a style="text-decoration:none;color:#CCCCCC; font-size:11px;" href="JavaScript:window.print();">&lt;&lt;&nbsp;Print Invoice&nbsp;&gt;&gt;</a></div>
      <?php } ?>
        <?php
$content = '<p>
<img src="'.$this->request->webroot.'img/logo-light.png'.'" alt="HCF" />
</p>
<h3>Date: '.$invoiceDetail->date.' </h3>
<h3>Invoice No. '.$invoiceDetail->invoice_number.'</h3>
<h3>Due Date: '.$invoiceDetail->meeting_date.'</h3>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h2>Company Name: '.$invoiceDetail->company_name.'</h2>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h3>Date of event: '.$invoiceDetail->meeting_date.'</h3>
<h3>Event title: '.$invoiceDetail->meeting_title.'</h3>
<p>&nbsp;</p>
<h3>Attendee(s)</h3>
<hr /> '.$invoiceDetail->attendees_name.'
</p>
<hr />
<div style="text-align: right;">
<h3>Total: £ '.$invoiceDetail->fee.'</h3>
<!--<h3>VAT: £0</h3>-->
<p>Selected Payment Method :'.$invoiceDetail->payment_method.'</p>
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
    $mpdf=new mPDF();
    
    $mpdf->WriteHTML($content);
    $mpdf->Output();
    exit;
}
?>