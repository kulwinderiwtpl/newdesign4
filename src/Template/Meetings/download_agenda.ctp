<?php
$this->layout = false;
$filename=$meeting->id.rand().'-meeting-agenda-'.date('Y-m-d-H-i-s').'.pdf';
        // $now = gmdate("D, d M Y H:i:s");
        // header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        // header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        // header("Last-Modified: {$now} GMT");

        // // force download  
        // header("Content-Type: application/force-download; charset=utf-8");
        // header("Content-Type: application/force-download");
        // header("Content-Type: application/octet-stream");
        // header("Content-Type: application/download");

        // // disposition / encoding on response body
        // header("Content-Disposition: attachment;filename=$filename");
        // header("Content-Transfer-Encoding: binary");

        
        // ob_start();
        // echo ROOT . DS . 'vendor' . DS  .'mpdf'. DS  . 'vendor'.DS. 'autoload.php';
        require_once(ROOT . DS . 'vendor' . DS  .'mpdf'. DS  . 'vendor'.DS. 'autoload.php');
        $content = '<table width="100%" border="0" cellpadding="6" cellspacing="0">
        <tr>
        <td align="center">'.
            $this->Html->image('hcffulllogo.jpg',array('class'=>"align-center")).
        '</td>

  <tr>

    <td  align="center" valign="middle"><b>'.$meeting->date->format('l jS \of F Y').'</b></td>

  </tr>

   <tr>

    <td  align="center" valign="middle"><font color=#000000><b>"'.$meeting->title.'"</b></font></td>

  </tr>

     <tr>

    <td  align="center" valign="middle" >&nbsp;<br />&nbsp;<br /></td>

  </tr>
  <tr>

    <td  align="left" valign="middle"><font color=#1584C6><b>Agenda</b></font></td>

  </tr>
  <tr>

		<td align="left" valign="middle">'.$meeting->agenda.'</td>

		</tr>

  </table>';
//   echo $content;die;
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($content);
        $mpdf->Output($filename,'D');
?>