<?php
/**
* @var \App\View\AppView $this
*/
?>



  <!-- BEGIN PAGE HEAD-->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Next Meeting

</h1>
    </div>
    <!-- END PAGE TITLE -->
  </div>
  <!-- END PAGE HEAD-->
  <!-- BEGIN PAGE BREADCRUMB -->
  <ul class="page-breadcrumb breadcrumb">

    <li>
      <?= $this->Html->link('Home', ['controller' => 'dashboard', 'action' => 'index']); ?>
        <i class="fa fa-circle"></i>
    </li>
    <li>
      <span class="active">Next Meeting</span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->

  <div class="portlet green-sharp box">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-info-circle"></i>
        <span class="caption-subject bold uppercase">Information</span>
      </div>
      <div class="tools">
        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
      </div>
    </div>
    <div class="portlet-body" style="display: none">

      <div class="note note-info">

        <ul>
          <li> Full Details of the next Health Claims Forum meeting can be found below. </li>
          <li> We will post any relevant presentations that accompany the meeting on the website after it has taken place. </li>
          <li> To view presentations from previous forums please go to
            <?= $this->Html->link('Past Meetings', ['action' => 'pastMeetings']); ?> page. </li>
          <li> If you are interested in attending the next forum or would like to reserve a place for a colleague, then please complete the reply slip below. </li>

        </ul>
      </div>
    </div>
  </div>

  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">

      <ul class="nav nav-tabs">
        <li class="<?=isset($_GET['tab']) && $_GET['tab']=='meeting' || !isset($_GET['tab'])?'active':''?>">
          <a href="#portlet_tab1" data-toggle="tab"> Meeting Details </a>
        </li>
        <li class="<?=isset($_GET['tab']) && $_GET['tab']=='replyslip'?'active':''?>">
          <a href="#portlet_tab2" data-toggle="tab"> Reply Slip </a>
        </li>
        <li class="<?=isset($_GET['tab']) && $_GET['tab']=='booking'?'active':''?>">
          <a href="#portlet_tab3" data-toggle="tab"> Booking Status </a>
        </li>
        <li class="<?=isset($_GET['tab']) && $_GET['tab']=='invoices'?'active':''?>">
          <a href="#portlet_tab4" data-toggle="tab"> Invoices </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <div class="tab-content">
        <?= $this->Flash->render() ?>
        <?php if($latest){ ?>
        <div class="tab-pane <?=isset($_GET['tab']) && $_GET['tab']=='meeting' || !isset($_GET['tab'])?'active':''?>" id="portlet_tab1">
          <h4 class="block"> <i class="fa fa-calendar-o"></i>  <?//=h($latest->date) ?> <?= date("d/m/y", strtotime($latest->date))?></h4>
          <h4 class="block bold"> <?=h($latest->title) ?> </h4>
          <h4 class="block bold font-purple-sharp"> <i class="fa fa-envelope-o"></i> Invite </h4>
          <?=$latest->invite?>
            <p class="font-purple-sharp bold"> <i class="fa fa-pencil-square-o"></i> Agenda </p>
            <p>
              <?=$latest->agenda?>
            </p>
            <p class="font-purple-sharp bold"> <i class="fa fa-map-o"></i> Location
              
                <?php echo strip_tags($latest->location); ?>
              
              <ul style="list-style-type:none">
                <li>
                  <a href="<?=$latest->location_map?>" target="_blank"> <i class="fa fa-globe"></i> Map Link </a>
                  <p>
                    <?=$latest->location_map?>
                  </p>
                </li>
                <li>
                  <a href="<?=$latest->location_info?>" target="_blank"> <i class="fa fa-globe"></i> Location Info </a>
                  <p>
                    <?=$latest->location_info?>
                  </p>
                </li>
              </ul>
            </p>
            <p class="font-purple-sharp bold"> <i class="fa fa-folder-o"></i> Presentation/Info Files </p>
            <?php //echo '<pre>';var_dump($latest);echo '</pre>'; ?>
            <?php if(!empty($latest['file'])): ?>
              <a href="<?= $this->request->webroot.'uploads/nextmeetings/'.h($latest['file']); ?>" title="Open Presentation" target="_blank"><i class="fa fa-file-pdf-o font-red-mint"></i> <?php echo $latest['file']; ?> </a>
                
                  <br>
                  <?php endif; ?>
        </div>

        <div class="tab-pane <?=isset($_GET['tab']) && $_GET['tab']=='replyslip'?'active':''?>" id="portlet_tab2">
          <div class="note note-info">
            <h4 class="block">Reply Slip</h4>
            <ul>
              <li> Please use the following form to book yourself as an attendee for the next meeting. </li>
              <li> If you are not attending the meeting yourself but wish to book a place for your colleague, please use
                <a href="#bookcolleague">
                  <button type="button" id="collegue_btn" class="btn blue btn-sm" title="Click here to add your colleague as an attendee.">Book a colleague as an attendee</button>
                </a>

                <li> You can book more than one colleague by using the same process. </li>
            </ul>
          </div>
          <?php //pr($user); ?>

            <?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'rsvp_booking','novalidate'=>'novalidate')) ?>
              <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
              <div class="form-body">
                  <?php if($rsvp_submitted) { ?>
                  <div class="alert alert-warning">If you'd like to RSVP for a colleague, please use the button above "Book a colleague as an attendee".</div>
                  <?php } ?>
                  <?php if(empty($attendees)) { ?>
                    <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                      <button class="close" data-close="alert"></button> Your form validation is successful!
                    </div>
                    <?= $this->Form->hidden('meeting_id', array('value'=>$latest->id)); ?>
                      <?= $this->Form->hidden('meeting_title', array('value'=>$latest->title)); ?>
                        <?= $this->Form->hidden('meeting_date', array('value'=>date('Y-m-d',strtotime($latest->date)))); ?>
						<div class="form-group">
								<div class="col-md-12" style='text-align: justify'>Please indicate your response by checking either the Yes or No box following the statement below.</br>
			I confirm that I am happy for my name to be included on the delegate list and for my name to be
shared with other attendees on the day or, I confirm that I have spoken with the delegate for whom I
am making this booking and they have confirmed to me that they are happy for their name to be
included on the delegate list and for this to be shared with other attendees on the day.</div>
						</div>
			 <div class="form-group margin-top-25">
                <label class="col-md-3 control-label">Your Response
                    <span class="required" aria-required="true"> * </span>
                </label>
             	<div class="md-radio-list col-md-4">
			                   <div class="md-radio">
			                      <input id="radio10" required name="booking_process" class="md-radiobtn"   value="1" type="radio">
			                      <label for="radio10">
			                         <span class="inc"></span>
			                         <span class="check"></span>
			                         <span class="box"></span> YES 
			                        
			                      </label>
			                    </div>
			                    <div class="md-radio">
			                      <input id="radio11" required name="booking_process" class="md-radiobtn"  value="0" type="radio">
			                         <label for="radio11">
			                          <span class="inc"></span>
			                          <span class="check"></span>
			                          <span class="box"></span> No 
			                          
			                         </label>
			                    </div>
			                  </div>
            </div>
                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your full name.">First Name
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('user_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your first name'),'value'=>$user->first_name)); ?>
                                  <!--<input type="text" class="form-control" name="name" title="Enter your full name."> -->
                              </div>
                            </div>
                          </div>
                  <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your full name.">Last Name
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('last_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your last name.'),'value'=>$user->last_name)); ?>
                                  <!--<input type="text" class="form-control" name="name" title="Enter your full name."> -->
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your job title.">Company
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('company_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your Company.'),'value'=> h($user->company->name))); ?>
                                  <!--<input type="text" class="form-control" name="name" title="Enter your Company."> -->
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your company email address. Personal email address will not be accepted.">Email
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">

                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?= $this->Form->text('email', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Corporate Email Only - No Personal Emails'),'value'=> h($user->email))); ?>
                                    <!--<input type="text" class="form-control" name="email" placeholder="Corporate Email Only - No Personal Emails" title="Enter your company email address. Personal email address will not be accepted."> -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your company telephone number. Personal telephone number will not be accepted.">Phone
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?= $this->Form->text('contactno', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Corporate Telephone Only - No Personal Telephones'),'value'=> h($user->tel))); ?>
                                    <!--<input type="text" class="form-control" name="digits" placeholder="Corporate Telephone Only - No Personal Telephones" title="Enter your company telephone number. Personal telephone number will not be accepted."> -->
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3">Purchase Order

                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('purchase_order', array('div' =>  false,'class' => 'form-control', 'label' => false,'title'=>__('If you require a purchase order for your invoice, please provide the details here. Otherwise, leave blank.'))); ?>
                                  <!--<input type="text" class="form-control" name="name" title="If you require a purchase order for your invoice, please provide the details here. Otherwise, leave blank.">-->
                              </div>
                            </div>
                            <div class="col-md-1">
                              <a href="javascript:;" class="tooltips" data-original-title="If you require a purchase order for your invoice, please provide the details here. Otherwise, leave blank.">
                                <i class="fa fa-info-circle font-blue"></i></a>
                            </div>

                          </div>


                          <div class="form-group form-md-radios">
                            <label class="control-label col-md-3">Payment Method</label>
                            <div class="md-radio-list col-md-6">
                              <div class="md-radio">
                                <!--<?=$this->Form->radio('payment_method', ['BACS'],['label' => false,'title'=>'Click to select BACS as payment method.']);?>-->
                                <input type="radio" id="radio1" name="pay_method" class="md-radiobtn" checked="" title="Click to select BACS as payment method." value="bacs">
                                <label for="radio1">
                                  <span class="inc"></span>
                                  <span class="check"></span>
                                  <span class="box"></span> BACS
                                  <div class="note note-info">
                                    <?=$rsvp_settings->bacs_text?>

                                      <!--<p> BACS will need to be credited to the HCF account details below. </p>
                <p> Account Name: Health Claims Forum </p>
                <p> Account Number: 90685593 ; Sort code: 20 32 00 </p>
                <p> (Barclays Bank) </p>-->


                                  </div>
                                </label>
                              </div>
                              <div class="md-radio">
                                <!--<?=$this->Form->radio('payment_method', ['Cheque'],['label' => false,'title'=>'Click to select Cheque as payment method.']);?>-->
                                <input type="radio" id="radio2" name="pay_method" class="md-radiobtn" title="Click to select Cheque as payment method." value="cheque">
                                <label for="radio2">
                                  <span class="inc"></span>
                                  <span class="check"></span>
                                  <span class="box"></span> Cheque
                                  <div class="note note-info">
                                    <?=$rsvp_settings->cheque_text?>

                                      <!--<p> Cheques will need to be payable to the Health Claims Forum. </p>
                <p> Stuart Lewis, HCF treasurer, MetLife, Invicta House, Trafalgar Place, Brighton, BN1 4FR </p>
                <p> Stuart.Lewis@metlife.uk.com </p>
                <p> Tel: 01273 872 429 ; Fax: 0845 196 0387 </p>
                <p> Please ensure payment is made prior to the event. </p>-->

                                  </div>
                                </label>

                              </div>


                            </div>

                            <div class="col-md-6 col-md-offset-3">
                              <p> You are confirming that you will be paying the attendance fee below. This is the fee for ONE person. </p>
                              <table class="table table-hover">
                                <tr>
                                  <th> Fee </th>
                                  <th> £
                                    <?=$rsvp_settings->fee?>
                                  </th>
                                </tr>
                              </table>
                            </div>

                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your address.">Comments/Special Dietary

                            </label>
                            <div class="col-md-6">
                              <?= $this->Form->textarea('comments', array('div' =>  false,'class' => 'form-control', 'label' => false,'title'=>__('Enter any comments you have.'),'placeholder'=>__('Enter any comments you have.'),'rows'=>3)); ?>
                                <!--<textarea class="form-control" name="name" rows="3" title="Enter any comments you have."></textarea>-->
                            </div>
                          </div>
						  
					 
					


                          <div class="form-actions">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9 margin-top-20">
                                <button type="submit" class="btn green" title="Click to add youself as an attendee.">Book yourself as an attendee</button>

                              </div>
                            </div>
                          </div>
                          <?php } ?>
              </div>
          <?= $this->Form->end(); ?>
        </div>
        <div class="tab-pane <?=isset($_GET['tab']) && $_GET['tab']=='booking'?'active':''?>" id="portlet_tab3">

          <h4> Booking Status for Next Meeting </h4>
          <p>
            <ul>
              <li> Your own RSVP: <i class="fa fa-clock-o"></i>
                <?=!empty($attendees)?$attendees->date:'Not Submitted' ?>
                <!--<?=date("d/m/y, h:ia", strtotime($attendees->date)) ?>-->
              </li>
              <li> Additional Bookings: <?=$additional_count?> </li>
              <li> Total fee including additional booking: £
                <?=$total_fees?>
              </li>
            </ul>
          </p>

        </div>

        <div class="tab-pane <?=isset($_GET['tab']) && $_GET['tab']=='invoices'?'active':''?>" id="portlet_tab4">
          <?= $this->Form->create(null, array('url' => ['action' => 'mergeInvoices'],'class' => 'form-horizontal', 'id' => 'merge_invoices','novalidate'=>'novalidate')) ?>
          <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
              <thead>
                <tr role="row">
                  <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 56px;">
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="group-checkable" data-name="merge_invoices[]">
                      <span></span>
                    </label>
                  </th>
                  <th> Invoice No. </th>
                  <th> Meeting Date </th>
                  <th> Company Name </th>
                  <th> Attendee's Name </th>
                  <th> Payment Method </th>
                  <th> Billing Entity </th>
                  <th> Purchase Order </th>
                  <th> RSVP'd </th>
                  <th> Fee </th>
                  <th> Invoice </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices as $key => $invoice): ?>
                  <tr class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                    <td>
                      <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" name="merge_invoices[]" class="checkboxes" value="<?=$invoice->id?>">
                        <span></span>
                      </label>
                    </td>
                    <td>
                      <?= h($invoice->invoice_number) ?>
                    </td>
                    <td>
                      <?= date("d/m/y", strtotime($invoice->meeting_date))?>
                    </td>
                    <td>
                      <?= h($invoice->company_name)?>
                    </td>
                    <td>
                      <?= h($invoice->attendees_name)?>
                    </td>
                    <td>
                      <?= h($invoice->payment_method)?>
                    </td>
                    <td>
                      <?= h('')?>
                    </td>
                    <td>
                      <?= h('')?>
                    </td>
                    <td>
                      <?//= h($invoice->date)?>
                      <?= date("d/m/y", strtotime($invoice->date))?>
                    </td>
                    <td> £
                      <?= h($invoice->fee)?>
                    </td>
                    <td align="center">
                      <h4><a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/pdf"], true);?>" title="Open printable PDF" target="_blank"><i class="fa fa-file-pdf-o"></i></a> 
                      <a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/html"], true);?>" title="Open printable HTML" target="_blank"><i class="fa fa-file-text-o"></i></a></h4>
                    </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>

            </table>
          </div>
          <div class="form-group hide" style="width: 150px;">
            <select id="single" class="form-control" tabindex="-1" aria-hidden="true">
              <option>Choose an action...</option>
              <option value="Merge">Merge selected invoices</option>


            </select>

          </div>

          <div class="form-actions">
          <button type="submit" class="btn default green" title="Click to add youself as an attendee.">Merge selected invoices
                <i class="m-icon-swapright m-icon-white"></i></button>
          </div>

          <div class="note note-warning margin-top-20">

            <p>Note: Invoices with different payment status or different payment methods can not be merged. </p>
          </div>
          <?=$this->Form->end(); ?>

        </div>
        <!-- end of tabs -->
        <?php } else { //if latest meeting present ?>
          <div class="alert alert-success">Details of the next meeting will be sent to you via email and posted on the website in due course.".</div>
        <?php } ?>
      </div>
    </div>


    <!-- begin modal -->
    <div id="bookcolleague" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Attendee - RSVP on Behalf of a Colleague</h4>
          </div>

          <div class="modal-body">
          </div>
          <div class="modal-footer margin-top-20">
            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END modal -->


    <!-- END PAGE BASE CONTENT -->
  </div>
  <!-- END CONTENT BODY -->
  </div>

  <script type="application/javascript">
    $(document).ready(function() {
      userID = 0;
      var modal = $('#bookcolleague'),
        modalBody = $('#bookcolleague .modal-body');
      modal.on('show.bs.modal', function() {
        modalBody.load();
        modalBody.load('<?=$this->Url->build(["controller" => "Meetings","action" => "bookColleague"], true);?>');
      });
      modal.on('hidden.bs.modal', function() {
        modalBody.html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
      });
      $('#collegue_btn').on('click', function(e) {
        modal.modal();
        e.preventDefault();
      });

      $('.group-checkable').on('click',function(){
        $('input.checkboxes').not(this).prop('checked', this.checked);
      });

      $('#merge_invoices').on('submit',function(){
        if($('input[name="merge_invoices[]"]:checked').length < 2){
          alert('Select at least 2 Invoices to Merge them!');
          return false;
        }
      });

      var allowSubmit = false;
        var form2 = $('#rsvp_booking');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        var handleValidation2 = function() {
          // for more info visit the official plugin documentation:
          // http://docs.jquery.com/Plugins/Validation
          form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
              "user_name": {
                required: true
              },
              "company_name": {
                required: true
              },
              "email": {
                required: true,
                validEmail: true
              },
              "contactno": {
                required: true,
                number: true
              }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
              success2.hide();
              error2.show();
              App.scrollTo(error2, -100);
            },
            errorPlacement: function(error, element) { // render error placement for each input type
              var icon = $(element).parents('.input-icon').children('i');
              icon.removeClass('fa-check').addClass("fa-warning");
              icon.attr("data-original-title", error.text()).tooltip({
                'container': 'body'
              });
            },
            highlight: function(element) { // hightlight error inputs
              $(element)
                .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
            },
            success: function(label, element) {
              var icon = $(element).parents('.input-icon').children('i');
              $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
              icon.removeClass("fa-warning").addClass("fa-check");
            },
            submitHandler: function(form) {
              //                    success2.show();
              //                    error2.hide();
              //call submit function
                                 form2[0].submit(); // submit the form
              //                    submitform();
            }
          });
        }
        handleValidation2();

    });
  </script>

  <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
            <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Meeting'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Presentation Files'), ['controller' => 'PresentationFiles', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Presentation File'), ['controller' => 'PresentationFiles', 'action' => 'add']) ?></li>
            </ul>
            </nav>
            <div class="meetings index large-9 medium-8 columns content">
            <h3><?= __('Meetings') ?></h3>
            <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('location_map') ?></th>
            <th scope="col"><?= $this->Paginator->sort('location_info') ?></th>
            <th scope="col"><?= $this->Paginator->sort('sendto') ?></th>
            <th scope="col"><?= $this->Paginator->sort('link') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('file') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($meetings as $meeting): ?>
            <tr>
            <td><?= $this->Number->format($meeting->id) ?></td>
            <td><?= h($meeting->title) ?></td>
            <td><?= h($meeting->date) ?></td>
            <td><?= h($meeting->location_map) ?></td>
            <td><?= h($meeting->location_info) ?></td>
            <td><?= h($meeting->sendto) ?></td>
            <td><?= h($meeting->link) ?></td>
            <td><?= h($meeting->status) ?></td>
            <td><?= h($meeting->file) ?></td>
            <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $meeting->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meeting->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?>
            </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            <div class="paginator">
            <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
            </div>-->
  
 