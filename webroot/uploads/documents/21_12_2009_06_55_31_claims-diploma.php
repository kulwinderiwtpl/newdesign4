<?php $currentPage = 'claims-diploma.php'; ?>
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
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="resources/scripts/sorttable.js"></script>
 		<!-- datepicker -->
        <script type="text/javascript" src="resources/scripts/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker();
	});
	<!-- end date picker -->
	</script>		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
<!-- Sidebar Starts -->
<?php include('includes/design/side-bar.html'); ?>		
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
			<h2>Welcome John</h2>
			<p id="page-intro">&nbsp;</p>
 <!-- User Search Box -->

 <!-- End of User Search Box -->
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Claims Diploma</h3>
						<ul class="content-box-tabs">
						<!--<li><a href="#tab1" class="default-tab">Add Document</a></li>--> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Claims Diploma</a></li>
						<!--<li><a href="#tab3">Claims Diploma</a></li>-->
      
					</ul>				
			
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
           
				  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->          
  <h3>Useful Information</h3>	
						<table class="sortable">
							
							<thead>
								<tr class="header-row">

								   <th class="th-1">Title</th>
								   <th class="th-3">Date Published</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="7">

										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<tr>

									<td><a href="#"><img src="resources/images/icons/file_doc.png" alt="Document" width="22" height="22" class="icon-small" /> Views sought on the use of tracking devices by PIs</a></td>

								  <td>21/05/2009</td>

								</tr>
								
								<tr>

									<td><a href="#"><img src="resources/images/icons/file_doc.png" alt="Document" width="22" height="22" class="icon-small" /></a> Potential Fraud Alert</td>
									<td>23/12/2008</td>

								</tr>
								
								<tr>

									<td><a href="#"><img src="resources/images/icons/file_doc.png" alt="Document" width="22" height="22" class="icon-small" /></a> Critical Illness Training Course</td>

								  <td>01/02/2008</td>

								</tr>
								<tr>

								  <td> <a href="#"><img src="resources/images/icons/file_doc.png" alt="Document" width="22" height="22" class="icon-small" /></a> February Forum</td>

								  <td>01/02/2010</td>

							  </tr>
								<tr>

								  <td><a href="#"><img src="resources/images/icons/file_doc.png" alt="Document" width="22" height="22" class="icon-small" /></a> ANNUAL SUBSCRIPTION 2008 / 09</td>

								  <td>01/02/2010</td>

							  </tr>		

							</tbody>
							
						</table>
					</div> 
				  <!-- end of tab1 -->
 				
				  <div class="tab-content" id="tab3">           
  <h3>Claims Diploma</h3>	
						<table class="sortable">
							
							<thead>
								<tr class="header-row">

								   <th class="th-1">Title</th>
								   <th class="th-3">Date Published</th>

								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="7">

										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<tr>

									<td><a href="#">Views sought on the use of tracking devices by PIs</a></td>

								  <td>21/05/2009</td>

								</tr>
								
								<tr>

									<td>Potential Fraud Alert</td>
									<td>23/12/2008</td>
									
								</tr>
								
								<tr>

									<td>Critical Illness Training Course</td>

								  <td>01/02/2008</td>
									
								</tr>
								<tr>

								  <td>February Forum</td>

								  <td>01/02/2010</td>
							  </tr>
								<tr>

								  <td>ANNUAL SUBSCRIPTION 2008 / 09</td>

								  <td>01/02/2010</td>
							  </tr>		

							</tbody>
							
						</table>
					</div> 
 					<!-- End #tab3 -->					
    
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->



			
			<div id="footer">
				<small><a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
