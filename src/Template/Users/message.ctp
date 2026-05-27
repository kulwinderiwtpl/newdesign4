<!-- body -->


<!--<div class="note note-info">
<p><i class="fa fa-info-circle"></i> Please enter your registered email to recieve password.</p>
</div>-->

<!-- form -->
<!--<form action="#" class="form-horizontal" id="form_sample_1" novalidate="novalidate">
<div class="form-body">
<div class="alert alert-danger">
<button class="close" data-close="alert"></button> You have some errors. Please check below. </div>
<div class="alert alert-success">
<button class="close" data-close="alert"></button> Your email has been sent! </div>
<div class="form-group form-md-line-input">
<label class="col-md-3 control-label" for="form_control_1">Subject

</label>
<div class="col-md-9">
<input class="form-control" placeholder="" name="subject" type="text">
<div class="form-control-focus"> </div>

</div>
</div>

<div class="form-group form-md-line-input">
<label class="col-md-3 control-label" for="form_control_1">Message Text</label>
<div class="col-md-9">
<textarea class="form-control" name="message" rows="3"></textarea>
<div class="form-control-focus"> </div>
</div>
</div>






</div>
<br>
<br>
<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9">
<button type="submit" class="btn green">Send</button>


</div>
</div>
</div>

</form>-->


<!-- form -->
<?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'send_message','novalidate'=>'novalidate')) ?>
  <div class="modal-body">
    <?= $this->Flash->render() ?>
      <div class="form-body">
        <div class="form-group  margin-top-20">
          <label class="control-label col-md-3" title="Enter a message subject.">Subject
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <?= $this->Form->input('subject', array('class' => 'form-control', 'id' => 'subject', 'label' => false, 'placeholder' => __('Enter the Suject of the email'))); ?>
            </div>
          </div>
        </div>

        <div class="form-group ">
          <label class="control-label col-md-3" title="Enter message.">Message
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-8">
            <div class="input-icon right">
              <i class="fa"></i>
              <?= $this->Form->textarea('message', array('class' => 'form-control', 'id' => 'message', 'label' => false, 'placeholder' => __('Enter the message'),'rows'=>'15')); ?>
            </div>
          </div>
        </div>



      </div>




      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <?= $this->Form->button(__('Send'), ['class' => 'btn green', 'type' => 'button','id' => 'messagesubmit']) ?>
          </div>
        </div>
      </div>

  </div>
  <?php 
  //pr($this->request->params);
   ?>
    <script type="text/javascript">
      $(document).ready(function() {
        var allowSubmit = false;
        var form2 = $('#send_message');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        var handleValidationMessage = function() {
          // for more info visit the official plugin documentation:
          // http://docs.jquery.com/Plugins/Validation
          form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
              "subject": {
                required: true
              },
              "message": {
                required: true,
                minlength: 20
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
        handleValidationMessage();

        <?php //if ($this->request->is('Ajax')) { ?>

        //$('#forgotp_form').on('submit',function (e) {
        //            function submitform(){
        $('#messagesubmit').on('click', function(e) {
            // alert(1);
          e.preventDefault();
          //            alert(1);
          //                alert($('#forgot_email').val()+'   '+allowSubmit);
          //                alert( "Valid: " + form2.valid() );
          handleValidationMessage();
          if (!form2.valid()){
            $('#email').animate({
                  scrollTop: $("#subject").offset().top},'slow');
            return false;
          }
          var subject = $('#subject').val();
          var message = $('#message').val();
          $('#email .modal-body').html('<?= $this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center"))?>');
          $.ajax({
            type: "POST",
            url: '<?= $this->Url->build(["controller" => "Users", "action" => "message/".$this->request->params['pass'][0]], true); ?>',
            data: 'message=' + message + '&subject=' + subject
          }).done(function(data) {
            $('#email .modal-body').html(data);
            
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

        <?php //} ?>
      });
    </script>