<?php
$this->layout = false;
// header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
// header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
// header("Last-Modified:  GMT");

// force download  
// header("Content-Type: application/pdf; charset=utf-8");
// header("Content-Type: application/force-download");
// header("Content-Type: application/octet-stream");
// header("Content-Type: application/download");

// disposition / encoding on response body
// header("Content-Disposition: attachment;filename=badges.pdf");
// header("Content-Transfer-Encoding: binary");
define('FPDF_FONTPATH',ROOT . DS . 'vendor' . DS  .'fpdf'. DS  .'font/');
// require_once(ROOT . DS . 'vendor' . DS  .'fpdf'. DS  . 'fpdf.php');
// require_once('fpdf.php');
require_once(ROOT . DS . 'vendor' . DS  .'fpdf'. DS  . 'PDF_Label.php');
// require_once('PDF_Label.php');
// require_once('conn.php');
$pdf = new PDF_Label('L7163');
// pr($pdf);die;
$pdf->AddPage();

foreach ($attendees as $key=>$attendee) {

		// if($row[0]=='')$text = 'Oooooooooooops this RSVC is empty';
		//2010-02-28
		//month day year
		// $date = explode("-", $attendee);
		//$date = date("D d F Y", mktime(0, 0, 0, $date[2], $date[1], $date[0])-(31556926*2));
		// $date = $date[2].'/'.$date[1].'/'.$date[0];
		// $text = sprintf('Health Claims Forum - '."%s\n%s \n%s\n",'1','[,]'.'2'.'[,]','3'.'[,]');
		// $text = sprintf('Health Claims Forum - '."%s\n%s \n%s\n",$attendee->date->format('d-m-Y'),'[,]'.$attendee->user_name.'[,]', 'asjgfjasgfasjkf'.'[,]');
		$text = sprintf("%s\n%s\n%s\n%s %s, %s", "Laurent $key", 'Immeuble Toto', 'av. Fragonard', '06000', 'NICE', 'FRANCE');
		$pdf->Add_Label($text);

    }

$pdf->Output();
?>
