<?

include_once('includes/links.php');

include_once('includes/admininit.php');   

$pageno=@$_REQUEST['pageno']; 

if($pageno=='')

{

 $pageno=0;

}

?>

<?php $currentPage = 'documents.php'; ?>

<?php $currentTab = 'info-docs'; ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

 

	<head>

		

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		

		<title>HCF - Members Managemnet System</title>

<?php include('includes/design/css.inc'); ?>

		

		<!--                       Javascripts                       -->

  

		<!-- jQuery -->

		<script type="text/javascript" src="js/helpvalidation.js"></script>

		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>

		

		<!-- jQuery Configuration -->

		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>

		

		<!-- Facebox jQuery Plugin -->

		<script type="text/javascript" src="resources/scripts/facebox.js"></script>

		

		<!-- jQuery WYSIWYG Plugin -->

		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>

		<!--<script type="text/javascript" src="resources/scripts/sorttable.js"></script>-->

 		<!-- datepicker -->

        <script type="text/javascript" src="resources/scripts/jquery-ui-1.7.2.custom.min.js"></script>

        <script type="text/javascript">

	$(function() {

		$("#datepicker").datepicker();

	});

	<!-- end date picker -->

	</script>		

	

	<script type="text/javascript" language="javascript">

	function validation12()

		{

		  //alert(document.frm11.dropdown11.value);

		  if(document.frm11.dropdown11.value=='')

		   {

		 alert('Please choose one action');

		 return false;

		   }

		  if(document.frm11.dropdown11.value=='delete')

		 {

		flag = 0;

        for (i=0; i<document.frm33.checkvalue.length; i++){

		if (document.frm33.checkvalue[i].checked==true){

		flag++;

		if(flag == 1){

		if(confirm('Do you want to delete this record')==true){

		var id= document.frm33.checkvalue[i].value;

		var doc= document.frm33.doc.value;

		var act='del';

		var pageno=document.frm33.pageno.value;

        window.location.href='documents_process.php?act='+act+'&id='+id+'&pageno='+pageno+'&doc='+doc;

        //window.location.href='<%=request.getContextPath()%>/module.do?task='+methodName+'&id='+id;

		

		}

		else{

		return false;

		}

		}

		else{

		var id= document.frm33.checkvalue[i].value;

		var doc= document.frm33.doc.value;

		var act='del';

		

		var pageno=document.frm33.pageno.value;

		window.location.href='documents_process.php?act='+act+'&id='+id+'&pageno='+pageno+'&doc='+doc;

		

		//window.location.href='<%=request.getContextPath()%>/module.do?task='+methodName+'&id='+id;

		}

		}

		}

		if(flag == 0){

		alert('No record selected');

		return false;

		}

		 }

 

		}

		function validation123()

		{

		  //alert(document.frm11.dropdown11.value);

		  if(document.frm22.dropdown22.value=='')

		   {

		 alert('Please choose one action');

		 return false;

		   }

		  if(document.frm22.dropdown22.value=='delete')

		 {

		flag = 0;

        for (i=0; i<document.frm44.checkvalue.length; i++){

		if (document.frm44.checkvalue[i].checked==true){

		flag++;

		if(flag == 1){

		if(confirm('Do you want to delete this record')==true){

		var id= document.frm44.checkvalue[i].value;

		var doc= document.frm44.doc.value;

		var act='del';

		var pageno=document.frm44.pageno.value;

        window.location.href='documents_process.php?act='+act+'&id='+id+'&pageno='+pageno+'&doc='+doc;

        //window.location.href='<%=request.getContextPath()%>/module.do?task='+methodName+'&id='+id;

		

		}

		else{

		return false;

		}

		}

		else{

		var id= document.frm44.checkvalue[i].value;

		var doc= document.frm44.doc.value;

		var act='del';

		

		var pageno=document.frm44.pageno.value;

		window.location.href='documents_process.php?act='+act+'&id='+id+'&pageno='+pageno+'&doc='+doc;

		

		//window.location.href='<%=request.getContextPath()%>/module.do?task='+methodName+'&id='+id;

		}

		}

		}

		if(flag == 0){

		alert('No record selected');

		return false;

		}

		 }

		 

		

		 

		}

	</script>	

<!--uploadify -->

<script type="text/javascript" src="resources/scripts/uploadify/swfobject.js"></script>
<script type="text/javascript" src="resources/scripts/uploadify/jquery.uploadify.v2.1.0.min.js"></script>

<script type="text/javascript">// <![CDATA[
$(document).ready(function() {
$('#datafile').uploadify({
'uploader'  : 'resources/scripts/uploadify/uploadify.swf',
//'script'	: 'documents_process.php',
'script'    : 'resources/scripts/uploadify/uploadify.php',
'cancelImg' : 'resources/scripts/uploadify/cancel.png',
'auto'      : true,
'buttonText' : 'Choose File',
'folder'    : 'documentfile/'

});
});
// ]]></script>

<link rel="stylesheet" type="text/css" href="resources/scripts/uploadify/css/uploadify.css" />
<!-- upoadify ends -->




		

	</head>

  

	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

<!-- Sidebar Starts -->

<?php include('includes/design/side-bar.php'); ?>		

<!-- End #sidebar -->



<!--Modal Box -->

<?php include_once('includes/snippets/newsletter-modal.html'); ?>

<?php include_once('includes/snippets/company-edit-modal.html'); ?>

<!-- End Modal Box -->



		

		<div id="main-content"> <!-- Main Content Section with everything -->

			

			<noscript> <!-- Show a notification if the user has disabled javascript -->

				<div class="notification error png_bg">

					<div>

						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.

					</div>

				</div>

			</noscript>

			

			<!-- Page Head -->

			<h2>Welcome <?=$_SESSION['admin_user_name']?></h2>

			<p id="page-intro">&nbsp;</p>

 <!-- User Search Box -->



 <!-- End of User Search Box -->

<div class="content-box"><!-- Start Content Box -->

				

				<div class="content-box-header">

					

					<h3>Documents</h3>

						<ul class="content-box-tabs">

						<li><a href="#tab1" <?=($_REQUEST['d']=='')?'class="default-tab"':''?>>Add Document</a></li> <!-- href must be unique and match the id of target div -->

						<li><a href="#tab2" <?=($_REQUEST['d']==1)?'class="default-tab"':''?>>Useful Information</a></li>

						<li><a href="#tab3" <?=($_REQUEST['d']==2)?'class="default-tab"':''?>>Claims Diploma</a></li>

      

					</ul>				

			

					<div class="clear"></div>

					

				</div> <!-- End .content-box-header -->

				

				<div class="content-box-content">

					

					<div  <?=($_REQUEST['d']=='')?'class="tab-content default-tab"':'class="tab-content"'?> id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

				<? if($_REQUEST['m']==1) { ?>		

			<div class="notification success png_bg">

				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>

				<div>

					Document  addition is successfully completed.

				</div>

			</div>

			   <? }?>

			  

			    

            

<!-- Documents form starts -->				

						<form  name="frm2" id="frm2" action="documents_process.php" method="post"  enctype="multipart/form-data" onsubmit="return helpval()">  

						<input type="hidden" name="act" value="insert" />

						<input type="hidden"  name="pageno" id="pageno" value="<?=$pageno?>" />	

							

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Document Type</label>

							      <select name="doc_type" id="doc_type" class="small-input" onfocus="return focusField('doc_type');" onblur="return blurField('doc_type');" >

								      <option value="">Select document type</option>

								      <option value="Useful Infomation">Useful Infomation</option>

								      <option value="Claims Diploma">Claims Diploma</option>

                                  </select>

								  <span id="para1" > </span>	

 

								

								<p>

									<label>Title</label>      

									<input class="text-input small-input" type="text" id="title" name="title" onfocus="return focusField('title');" onblur="return blurField('title');"/>

									 <span id="para2" > </span>	

								</p>  

								   

								<p>     

									<label> File</label>
									<input type="file" name="datafile" id="datafile" size="30" />
									<span class="input-notification information png_bg">Leave blank or add later</span> <!-- Classes for input-notification: success, error, information, attention -->



								</p>  

								<p>     

							    <label>Closing Date</label>   

									<input class="text-input small-input" type="text" id="datepicker" name="datepicker" /> <span class="input-notification information png_bg">Leave blank if does not apply</span> <!-- Classes for input-notification: success, error, information, attention -->

								</p>



								<p>    

									<input class="button" type="submit" value="Do it" />

								</p>    								



							</fieldset>   

							<div class="clear"></div><!-- End .clear -->

							

						</form>   

<!-- Documents form ends -->  

           </div><!-- end of tab1 -->  

            

				  <div  <?=($_REQUEST['d']==1)?'class="tab-content default-tab"':'class="tab-content"'?> id="tab2">             

  

                   <? if(($_REQUEST['m']==2)&&($_REQUEST['d']==1)) { ?>		

			       <div class="notification success png_bg">

				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>

				   <div>

					Document  deletion is successfully completed.

				   </div>

			       </div>

			      <? }?>

				   <? if(($_REQUEST['m']==3)&&($_REQUEST['d']==1)) { ?>		

			       <div class="notification success png_bg">

				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>

				   <div>

					Document is successfully updated.

				   </div>

			       </div>

			      <? }?>

				  <? if(($_REQUEST['show']='edit1')&&($_REQUEST['id']!='')) {?>

				  <?  

				$sql_use1="SELECT * FROM ".$cfg['DB_DOCUMENT']." WHERE `dId`=".$_REQUEST['id']." ";

		        $res_use1=$mycms->sql_query($sql_use1);

				$row_use1=$mycms->sql_fetchrow($res_use1);

				?>

				  <form  name="frm5" id="frm5" action="documents_process.php" method="post"  enctype="multipart/form-data" onsubmit="return helpuseval()">  

						<input type="hidden" name="act" value="update" />

						<input type="hidden" name="doc" id="doc" value="1" />

						<input type="hidden" name="id" id="id" value="<?=$_REQUEST['id']?>" />

						<input type="hidden"  name="pageno" id="pageno" value="<?=$pageno?>" />	

						

							

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Document Type</label>

							      <select name="doc_type" id="doc_type" class="small-input" 

								  onfocus="return focusField('doc_type1');" onblur="return blurField('doc_type1');"  >

								      <option value="">Select document type</option>

								      <option value="Useful Infomation" <?=($row_use1['doc_type']=='Useful Infomation')?'selected="selected"':''?>>Useful Infomation</option>

								      <option value="Claims Diploma" <?=($row_use1['doc_type']=='Claims Diploma')?'selected="selected"':''?>>Claims Diploma</option>

                                  </select>

								  <span id="para3" > </span> 

 

								

								<p>

									<label>Title</label>      

							<input class="text-input small-input" type="text" id="title"  value="<?=$row_use1['title']?>" name="title" onfocus="return focusField('title1');" onblur="return blurField('title1');"  />

							 <span id="para4" > </span> 

								</p>  

								   

								<p>     

									<label> File</label>  

									<input type="file" name="datafile" id="datafile" size="30"> <span class="input-notification information png_bg">Leave blank if you're just editing text boxes</span> <!-- Classes for input-notification: success, error, information, attention -->



								</p>  

								<p>     

									<label>Closing Date</label>   

									<input class="text-input small-input" type="text" id="datepicker" name="datepicker"

									 value="<?=$row_use1['close_date']?>" /> <span class="input-notification information png_bg">Leave blank if does not apply</span> <!-- Classes for input-notification: success, error, information, attention -->

								</p>

                                <p>     

									<label><input  type="hidden" id="datepicker111" name="datepicker111"/> </label>   

									<span class="input-notification information png_bg">Date must be (dd/mm/yyyy) format</span>

								</p>

								<p>    

									<input class="button" type="submit" value="Do it" />

								</p>    								



							</fieldset>   

							<div class="clear"></div><!-- End .clear -->

							

						</form>   

				  

<hr />

<p>

				   <? } ?> 

				    

				 

				   <h3>Useful Information</h3>		 

						<table class="sortable">  

							

							<thead>

								<tr class="header-row">

								   <th><input class="check-all" type="checkbox" /></th>

								   <th class="th-1">Title</th>

								   <th class="th-3">Date Sent</th>

								   <th>Action</th>

								</tr>

								

							</thead>

						 

							<tfoot>

								<tr>

									<td colspan="7">

										<div id="selectdiv" class="bulk-actions align-left">

						                    <form name="frm11" id="frm11">

											<select name="dropdown11">

												<option value="">Choose an action...</option>

												<option value="delete">Delete </option>

											</select>

											<input value="Apply to selected" class="button" name="submit" 

											type="button"  onclick="return validation12();"/>											

											</form>

										</div>

		<?

		$sql_use="SELECT * FROM ".$cfg['DB_DOCUMENT']." WHERE `doc_type`='Useful Infomation' ORDER BY `date_sent` ";

		$res_use=$mycms->sql_query($sql_use);

		$maxrow_use=$mycms->sql_numrows($res_use);

	    $sql_use = $sql_use. " LIMIT $offset,$limit";

		$res_use = $mycms->sql_query($sql_use);

		?>			

										<div class="pagination">

											 <?=$mycms->paginate($maxrow_use, $limit, $pageno, "pageno", "link")?>	

										</div> <!-- End .pagination -->

										<div class="clear"></div>

									</td>

								</tr>

							</tfoot>

						 

							<tbody>

		<form name="frm33" id="frm33">	

		<input type="hidden" name="doc" id="doc" value="1" />	

		<input type="hidden"  name="pageno" id="pageno" value="<?=$pageno?>" />			

	    <?

		if($maxrow_use >0){

		while($row_use=$mycms->sql_fetchrow($res_use)){

							?>

								<tr>

									<td><input  name="checkvalue" value="<?=$row_use['dId']?>" type="checkbox" /></td>

									<td><a href="documentfile/<?=$row_use['file']?>" target="0"> 

									<?=substr($row_use['title'],0,80)?>  </a></td>



								  <td><?=$row_use['date_sent']?></td>

									<td><!-- Icons -->

									<a  href="documents.php?show=edit1&d=1&pageno=<?=$pageno?>&id=<?=$row_use['dId']?>"  title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit Documents" /></a>

									<a href="documents_process.php?act=del&id=<?=$row_use['dId']?>&pageno=<?=$pageno?>&doc=1" title="Delete" onClick="return confirm('Do you really want to delete this record');"><img src="resources/images/icons/cross.png" alt="Delete" /></a></td>

								</tr>

					                              <? } ?>

					    <? }?>

        </form>

							</tbody>

							

						</table>

					</div> 

 					<!-- End #tab2 -->

				  <div <?=($_REQUEST['d']==2)?'class="tab-content default-tab"':'class="tab-content"'?> id="tab3">           

 

                  <? if(($_REQUEST['m']==2)&&($_REQUEST['d']==2)) { ?>	 	

			       <div class="notification success png_bg">

				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>

				   <div>

					Document  deletion is successfully completed.

				   </div>

			       </div>

			      <? }?> 

				  <? if(($_REQUEST['m']==3)&&($_REQUEST['d']==2)) { ?>		

			       <div class="notification success png_bg">

				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>

				   <div>

					Document is successfully updated.

				   </div>

			       </div>

			      <? }?>

				  

				   <? if(($_REQUEST['show']='edit1')&&($_REQUEST['id']!='')) {?>

				  <?  

				$sql_use1="SELECT * FROM ".$cfg['DB_DOCUMENT']." WHERE `dId`=".$_REQUEST['id']." ";

		        $res_use1=$mycms->sql_query($sql_use1);

				$row_use1=$mycms->sql_fetchrow($res_use1);

				?>

				  <form  name="frm6" id="frm6" action="documents_process.php" method="post"  enctype="multipart/form-data" onsubmit="return helpclaimval()">  

						<input type="hidden" name="act" value="update" />

						<input type="hidden" name="doc" id="doc" value="2" />

						<input type="hidden" name="id" id="id" value="<?=$_REQUEST['id']?>" />

						<input type="hidden"  name="pageno" id="pageno" value="<?=$pageno?>" />	

						

							

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								

								<p>

									<label>Document Type</label>

							      <select name="doc_type" id="doc_type" class="small-input" onfocus="return focusField('doc_type2');" onblur="return blurField('doc_type2');"  >

								      <option value="">Select document type</option>

								      <option value="Useful Infomation" <?=($row_use1['doc_type']=='Useful Infomation')?'selected="selected"':''?>>Useful Infomation</option>

								      <option value="Claims Diploma" <?=($row_use1['doc_type']=='Claims Diploma')?'selected="selected"':''?>>Claims Diploma</option>

                                  </select>

                                   <span id="para5" > </span>	

								

								<p>

									<label>Title</label>      

							<input class="text-input small-input" type="text" id="title"  value="<?=$row_use1['title']?>" name="title" onfocus="return focusField('title2');" onblur="return blurField('title2');" />

							<span id="para6" > </span>	

								</p>  

								   

								<p>     

									<label> File</label>  

									<input type="file" name="datafile" id="datafile" size="30"> <span class="input-notification information png_bg">Leave blank if you're just editing text boxes</span> <!-- Classes for input-notification: success, error, information, attention -->



								</p>  

								<p>     

									<label>Closing Date</label>   

									<input class="text-input small-input" type="text" id="datepicker" name="datepicker"

									 value="<?=$row_use1['close_date']?>" /> <span class="input-notification information png_bg">Leave blank if does not apply</span> <!-- Classes for input-notification: success, error, information, attention -->

								</p>

                                <p>     

									<label><input  type="hidden" id="datepicker111" name="datepicker111"/> </label>   

									<span class="input-notification information png_bg">Date must be (dd/mm/yyyy) format</span>

								</p>

								<p>    

									<input class="button" type="submit" value="Do it" />

								</p>    								



							</fieldset>   

							<div class="clear"></div><!-- End .clear -->

							

						</form>   

				  <hr />

<p>

				   <? } ?> 

				  

				    

					 <h3>Claims Diploma</h3>	

				  	

						<table class="sortable">

							

							<thead>

								<tr class="header-row">

								   <th><input class="check-all" type="checkbox" /></th>

								   <th class="th-1">Title</th>

								   <th class="th-3">Date Sent</th>

								   <th>Action</th>

								</tr>

								

							</thead>

						 

							<tfoot>

								<tr>

									<td colspan="7">

										<div id="selectdiv" class="bulk-actions align-left">

						<form name="frm22" id="frm22">

											<select name="dropdown22">

												<option value="">Choose an action...</option>

												<option value="delete">Delete </option>

											</select>

											<input value="Apply to selected" class="button" name="submit" 

											type="button"  onclick="return validation123();"/>											

											</form>

										</div>

		<?

		$sql_claim="SELECT * FROM ".$cfg['DB_DOCUMENT']." WHERE `doc_type`='Claims Diploma' ORDER BY `date_sent` ";

		$res_claim=$mycms->sql_query($sql_claim);

		$maxrow_claim=$mycms->sql_numrows($res_claim);

	    $sql_claim = $sql_claim. " LIMIT $offset,$limit";

		$res_claim = $mycms->sql_query($sql_claim);

		?>								

										<div class="pagination">

											 <?=$mycms->paginate($maxrow_claim, $limit, $pageno, "pageno", "link")?>	

										</div> <!-- End .pagination -->

										<div class="clear"></div>

									</td>

								</tr>

							</tfoot>

						 

							<tbody>

		<form name="frm44" id="frm44">

		<input type="hidden" name="doc" id="doc" value="2" />	

		<input type="hidden"  name="pageno" id="pageno" value="<?=$pageno?>" />			

	    <?

		if($maxrow_claim >0){

		while($row_claim=$mycms->sql_fetchrow($res_claim)){

							?>

								<tr>

									<td><input  name="checkvalue" value="<?=$row_claim['dId']?>" type="checkbox" /></td>

									<td><a href="documentfile/<?=$row_claim['file']?>" target="0"><?=substr($row_claim['title'],0,80)?>  </a></td>



								  <td><?=$row_claim['date_sent']?></td>

									<td><!-- Icons -->

									<a  href="documents.php?show=edit1&d=2&pageno=<?=$pageno?>&id=<?=$row_claim['dId']?>"  title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit Documents" /></a>

									<a href="documents_process.php?act=del&id=<?=$row_claim['dId']?>&pageno=<?=$pageno?>&doc=2" title="Delete" onClick="return confirm('Do you really want to delete this record');"><img src="resources/images/icons/cross.png" alt="Delete" /></a></td>

								</tr>



                                                      <? } ?>

					    <? }?>

        </form>                           

							</tbody>

							

						</table>

					</div> 

 					<!-- End #tab3 -->					

    

					

				</div> <!-- End .content-box-content -->

				

			</div> <!-- End .content-box -->







			

			<div id="footer">

				<small><a href="<?=$currentPage?>">Top</a>

				</small>

			</div><!-- End #footer -->

			

		</div> <!-- End #main-content -->

		

	</div></body>

  

</html>

