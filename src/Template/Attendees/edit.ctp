<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
  <?= $this->Form->create($attendee, array('class' => 'form-horizontal', 'id' => 'edit_form','name'=>'edit_form', 'novalidate'=>'novalidate')) ?>
    <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
    <div class="form-body">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
      <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your attendee information was saved. </div>
<div>Please indicate your response by checking either the Yes or No box following the statement below.</br>
			I confirm that I am happy for my name to be included on the delegate list and for my name to be
shared with other attendees on the day or, I confirm that I have spoken with the delegate for whom I
am making this booking and they have confirmed to me that they are happy for their name to be
included on the delegate list and for this to be shared with other attendees on the day.</div>
			 <div class="form-group">
                <label class="col-md-3 control-label">Your Response
                    <span class="required" aria-required="true"> * </span>
                </label>
             	<div class="md-radio-list col-md-4">
			                   <div class="md-radio">
			                      <input id="radio10" <?=($attendee->booking_process=='1')?'checked=""':''?>  required name="booking_process" class="md-radiobtn"   value="1" type="radio">
			                      <label for="radio10">
			                         <span class="inc"></span>
			                         <span class="check"></span>
			                         <span class="box"></span> YES 
			                        
			                      </label>
			                    </div>
			                    <div class="md-radio">
			                      <input id="radio11" <?=($attendee->booking_process=='0')?'checked=""':''?> required name="booking_process" class="md-radiobtn"  value="0" type="radio">
			                         <label for="radio11">
			                          <span class="inc"></span>
			                          <span class="check"></span>
			                          <span class="box"></span> No 
			                          
			                         </label>
			                    </div>
			                  </div>
            </div>


      <div class="form-group margin-top-20">
        <label class="col-md-3 control-label">Attendee Type</label>
        <div class="col-md-9">
          <div class="mt-radio-list">
            <label class="mt-radio">
              <input type="radio" class="attendee-type" name="type" id="type1" value="member" <?=($attendee->type=='member')?'checked=""':''?>> Member
              <span></span>
            </label>
            <label class="mt-radio">
              <input type="radio" class="attendee-type" name="type" id="type2" value="nonmember" <?=($attendee->type=='nonmember')?'checked=""':''?>> Non-Member
              <span></span>
            </label>

          </div>
        </div>
      </div>

      <div class="form-group ">
        <label class="control-label col-md-3" title="Enter name of attendee.">First Name
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('user_name',['class'=>'form-control','title'=>'Enter name of attendee.'])?>
            <!--<input type="text" class="form-control" name="user_name" title="Enter name of attendee."> -->
            </div>
        </div>
      </div>
        
         <div class="form-group ">
        <label class="control-label col-md-3" title="Enter name of attendee."> Last Name
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('last_name',['class'=>'form-control','title'=>'Enter name of attendee.'])?>
            <!--<input type="text" class="form-control" name="user_name" title="Enter name of attendee."> -->
            </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Company contact number.">Contact
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('contactno',['class'=>'form-control','title'=>'Company contact number'])?>
              <!--<input type="text" class="form-control" name="contactno" title="Company contact number">-->
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Company email address">Email
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('email',['class'=>'form-control','title'=>'Company email address'])?>
              <!--<input type="text" class="form-control" name="email" title="Company email address">-->
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Select Attendee Status.">Attendee Status
        </label>
        <div class="col-md-6">
          <?=$this->Form->select('attendee_status', [''=>'N/A','Committee'=>'Committee','Speaker'=>'Speaker'],['class'=>'form-control']);?>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Enter fee.">Fee
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-gbp"></i></span>
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('fee',['class'=>'form-control','title'=>'Enter fee'])?>
              <!--<input type="text" class="form-control" name="fee" title="Enter fee">-->
            </div>
          </div>
        </div>
      </div>

      <div class="form-group margin-top-20">
        <label class="col-md-3 control-label" title="Select payment method.">Payment Method</label>
        <div class="col-md-9">
          <div class="mt-radio-list">
            <label class="mt-radio">
              <input type="radio" name="pay_method" id="pay_method1" value="cheque" title="Select payment method." <?=($attendee->pay_method=='cheque')?'checked=""':''?>> Cheque
              <span></span>
            </label>
            <label class="mt-radio">
              <input type="radio" name="pay_method" id="pay_method2" value="bacs" title="Select payment method." <?=($attendee->pay_method=='bacs')?'checked=""':''?>> BACS
              <span></span>
            </label>

          </div>
        </div>
      </div>
        <div class="form-group">
        <label class="control-label col-md-3" title="purchase order">Purchase Order
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-group">
            
            <div class="input-icon right">
              <i class="fa"></i>
              
              <?php 
              $pro="";
              foreach($invoice as $inv){
      $pro=$inv['purchase_order'];
      }?>
              <?=$this->Form->text('purchase_order',['class'=>'form-control','title'=>'purchase order','value'=>$pro]);?>
              <!--<input type="text" class="form-control" name="email" title="Company email address">-->
            </div>
          </div>
        </div>
      </div>
        

      <div class="form-group attendee-type-option" id="member" <?=($attendee->type=='nonmember')?'style="display:none;"':''?>>
        <label class="control-label col-md-3" title="Select your company name.">Company
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <?=$this->Form->select('company_id', $companies,['class'=>'form-control']);?>
        </div>
      </div>

      <div class="form-group attendee-type-option" id="nonmember" <?=($attendee->type=='member')?'style="display:none;"':''?>>
        <label class="control-label col-md-3" title="Enter fee.">Company
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('companytext',['class'=>'form-control','title'=>'Enter Company Name.'])?>
            <!--<input type="text" class="form-control" name="companytext" title="Enter Company Name."> -->
            </div>
        </div>
      </div>


      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter any comments.">Comments
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->textarea('comments',['class'=>'form-control','rows'=>10,'title'=>'Enter any comments.'])?>
            <!--<textarea class="form-control" name="comments" rows="10" title="Enter any comments."></textarea>-->
          </div>
        </div>
      </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 margin-top-20">
                <button type="submit" class="btn green" title="Click here to save attendee.">Save Attendee</button>
            </div>
        </div>
    </div>
    <?= $this->Form->end(); ?>
<script type="text/javascript">
var form2 = $('#edit_form');
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
            'companytext': {
              required: function(element) {
                if ($('input[name="type"]:checked').val() == 'nonmember') {
                    return true;
                } else {
                    return false;
                }
              }
            },
            "user_name": {
                required: true
            },
            "fee": {
                required: true
            },
            'comments':{
                required: true
            },
            "type": {
                required: true
            },
            "contactno": {
                required: true,
                number:true
            },
            "email": {
                required: true,
                email:true
            },
            
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
        //   form2[0].submit(); // submit the form
          //                    submitform();
        }
      });
    }
    $(document).ready(function() {
      handleValidation2();
      $('#edit_form').on('submit', function(e) {
                //   alert(1);
                e.preventDefault();
                handleValidation2();
                if (!form2.valid()) {
                  // Scroll
                  $('.input-icon i').tooltip();
                  $('#edit').animate({
                    scrollTop: $("#edit_form").offset().top
                  }, 'fast');
                  return false;
                }
                
                // var data = $(this).serialize();
                // var data = new FormData();
                // var data = new FormData(jQuery('#edit_form')[0]);
                // console.log(data);
                var form = $('form[name=edit_form]')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                $('#edit .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class '=>"align-center")) ?>');
                // formData.append('image', $('input[name=file]')[0].files[0]);
                // jQuery.each(jQuery('#files').files, function(i, file) {
                //     data.append('file', file);
                // });
                //console.log(formData);
                // console.log($('#files'));
                // $.each($('#files')[0].files, function(i, file) {
                //     data.append('file-'+i, file);
                // });
                // alert(data);
                $.ajax({
                  type: "POST",
                  cache: false,
                //   contentType: false,
                  processData: false,
                  contentType: false,
                  url: '<?=$this->Url->build(["action" => "edit/".$attendee->id], true);?>',
                  data: formData
                }).done(function(data) {
                  $('#edit .modal-body').html(data);
                                   $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
                                    $("body").animate({ scrollTop: 0 }, "slow");
//                  setTimeout(function() {
//                                         $('#long .modal-body').html('');
//                     $('#edit').modal('hide');
//                     location.reload();
//                  }, 200);

                });
                return false;
              });
        $('.attendee-type').on('change',function(){
            $('.attendee-type-option').hide();
            $('#'+$(this).val()).fadeIn('fast');

        });
    });
</script>
      <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attendee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attendees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoce Details'), ['controller' => 'InvoceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoce Detail'), ['controller' => 'InvoceDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendees form large-9 medium-8 columns content">
    <?= $this->Form->create($attendee) ?>
    <fieldset>
        <legend><?= __('Edit Attendee') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('user_name');
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('meeting_id', ['options' => $meetings]);
            echo $this->Form->input('email');
            echo $this->Form->input('contactno');
            echo $this->Form->input('pay_method');
            echo $this->Form->input('status');
            echo $this->Form->input('attended');
            echo $this->Form->input('fee');
            echo $this->Form->input('purchase_order');
            echo $this->Form->input('comments');
            echo $this->Form->input('date');
            echo $this->Form->input('meetId');
            echo $this->Form->input('mtId');
            echo $this->Form->input('additionals');
            echo $this->Form->input('type');
            echo $this->Form->input('companytext');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->