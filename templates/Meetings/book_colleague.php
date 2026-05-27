<?php
/**
* @var \App\View\AppView $this
*/
?>

  <?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'book_colleague','novalidate'=>'novalidate')) ?>
    <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
    <?= $this->Form->hidden('meeting_id', array('value'=>$latest->id)); ?>
      <?= $this->Form->hidden('meeting_title', array('value'=>$latest->title)); ?>
        <?= $this->Form->hidden('meeting_date', array('value'=>date('Y-m-d',strtotime($latest->date)))); ?>
          <div class="form-body">
            <?= $this->Flash->render() ?>
              <?php if(empty($attendees)) { ?>
                <div class="alert alert-danger display-hide">
                  <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <div class="alert alert-success display-hide">
                  <button class="close" data-close="alert"></button> Your form validation is successful!
                </div>
				<div style='text-align: justify'>Please indicate your response by checking either the Yes or No box following the statement below.</br>
			I confirm that I am happy for my name to be included on the delegate list and for my name to be
shared with other attendees on the day or, I confirm that I have spoken with the delegate for whom I
am making this booking and they have confirmed to me that they are happy for their name to be
included on the delegate list and for this to be shared with other attendees on the day.</div>
			 <div class="form-group margin-top-20">
                <label class="col-md-3 control-label">Your Response
                    <span class="required" aria-required="true"> * </span>
                </label>
             	<div class="md-radio-list col-md-4">
			                   <div class="md-radio">
			                      <input id="radio_booking_yes" required name="booking_process" class="md-radiobtn"   value="1" type="radio">
			                      <label for="radio_booking_yes">
			                         <span class="inc"></span>
			                         <span class="check"></span>
			                         <span class="box"></span> YES 
			                        
			                      </label>
			                    </div>
			                    <div class="md-radio">
			                      <input id="radio_booking_no" required name="booking_process" class="md-radiobtn"  value="0" type="radio">
			                         <label for="radio_booking_no">
			                          <span class="inc"></span>
			                          <span class="check"></span>
			                          <span class="box"></span> No 
			                          
			                         </label>
			                    </div>
			                  </div>
            </div>
				
                      <div class="form-group">
                        <label class="control-label col-md-3" title="Enter your first name.">First Name
                          <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-6">
                          <div class="input-icon right">
                            <i class="fa"></i>
                            <?= $this->Form->text('user_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your first name.'))); ?>
                              <!--<input type="text" class="form-control" name="name" title="Enter your full name."> -->
                          </div>
                        </div>
                      </div>
              
              
              <div class="form-group  ">
                        <label class="control-label col-md-3" title="Enter your last name.">Last Name
                          <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-6">
                          <div class="input-icon right">
                            <i class="fa"></i>
                            <?= $this->Form->text('last_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your last name.'))); ?>
                              <!--<input type="text" class="form-control" name="name" title="Enter your full name."> -->
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
                              <?= $this->Form->text('email', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Corporate Email Only - No Personal Emails'))); ?>
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
                              <?= $this->Form->text('contactno', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Corporate Telephone Only - No Personal Telephones'))); ?>
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
			                      <input type="radio" id="radio4" name="c_pay_method" class="md-radiobtn" checked="" title="Click here to select BACS as payment method." value="bacs">
			                      <label for="radio4">
			                         <span class="inc"></span>
			                         <span class="check"></span>
			                         <span class="box"></span> BACS 
			                        
			                      </label>
			                    </div>
			                    <div class="md-radio">
			                      <input type="radio" id="radio5" name="c_pay_method" class="md-radiobtn" title="Click here to select Cheque as payment method." value="cheque">
			                         <label for="radio5">
			                          <span class="inc"></span>
			                          <span class="check"></span>
			                          <span class="box"></span> Cheque 
			                          
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
                            <button type="button" id="submit" class="btn green" title="Click to add youself as an attendee.">Book your colleague as an attendee</button>

                          </div>
                        </div>
                      </div>
                      <?php } ?>
          </div>
          </form>
       
          <script type="text/javascript">
            $(document).ready(function() {
              $('.tooltips').tooltip();
              var allowSubmit = false;
              var form2 = $('#book_colleague');
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
                    //                    form2[0].submit(); // submit the form
                    //                    submitform();
                  }
                });
              }
              handleValidation2();

              <?php if ($this->request->is('Ajax')) { ?>

              //$('#forgotp_form').on('submit',function (e) {
              //            function submitform(){
              $('#submit').on('click', function(e) {
                e.preventDefault();
                //            alert(1);
                //                alert($('#forgot_email').val()+'   '+allowSubmit);
                //                alert( "Valid: " + form2.valid() );
                handleValidation2();
                if (!form2.valid())
                  return false;
                //var email = $('#forgot_email').val();
                // console.log(form2.serialize());
                $('#bookcolleague .modal-body').html('<?= $this->Html->image('components/ajax-modal-loading.gif', array('class' => "align-center")) ?>');
                $.ajax({
                  type: "POST",
                  url: '<?= $this->Url->build(["controller" => "Meetings", "action" => "bookColleague"], true); ?>',
                  data: form2.serialize()
                }).done(function(data) {
                    //alert(data);
                  $('#bookcolleague .modal-body').html(data);
                  
                  //                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
                  //                  $("body").animate({ scrollTop: 0 }, "slow");
                  //                 setTimeout(function(){
                  ////                     $('#long .modal-body').html('');
                  //                     $('#forgotpassword').modal('hide');
                  //                 },1500);

                });
                //                alert(1);
                return false;
                //                alert(2);
                //            });
              });

              <?php } ?>
            });
          </script>