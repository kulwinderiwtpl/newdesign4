<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
  <div class="scroll-box">

    <div class="note note-info">
      <p> <i class="fa fa-info-circle"></i> Scroll down to see more. </p>
    </div>

    <p> Email is sent in text mode. Available Tags in the email text: </p>
    <p> {first_name} - User's First Name </p>
    <p> {last_name} - User's Last Name </p>
    <p> {user_name} - Admin-user Login ID </p>
    <!--<p> {password} - user's Password </p>-->
    <p> {pwd} - User's New Password </p>
    <p> {tel} - Contact Number of User </p>
    <p> {email} - User's email-id </p>
    <p> {fax} - User's fax-number </p>
    <p> {address} - User's address </p>
    <p> {company_name} - User's Company Name </p>
    <p> {job_title} - User's Job-Title </p>
    <p> {meeting_title} - Title of current Newsletter or Next-Meeting </p>
    <p> {meeting_date} - Date of next-meeting </p>
    <p> {contactno} - Contact Number of the Meeting attandee </p>
    <!--<p> {invite} - Invitation of Next-Meeting </p>-->
    <!--<p> {agenda} - Agenda of Next-Meeting </p>-->
    <p> {meeting_location} - Location of Next-Meeting </p>
    <!--<p> {locationmap} - Location Map of Next-Meeting </p>-->
    <!--<p> {locationinfo} - Location Information of Next-Meeting </p>-->
  </div>
  <hr>

  <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
    <?= $this->Form->create($emailTemplate,['id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate']) ?>
    <div class="form-body">
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button> Your template was successfully saved. </div>
        <div class="form-group  margin-top-20">
            <label class="control-label col-md-3" title="Enter from address.">From address
            <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
            <div class="input-icon right">
                <i class="fa"></i>
                <?=$this->Form->text('from_address',['class'=>'form-control','title'=>"Enter from address."])?>
                <!--<input type="text" class="form-control" name="name" title="Enter from address."> </div>-->
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label col-md-3" title="Enter from name.">From name
            <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
            <div class="input-icon right">
                <i class="fa"></i>
                <?=$this->Form->text('from_name',['class'=>'form-control','title'=>"Enter from name."])?>
                <!--<input type="text" class="form-control" name="name" title="Enter from name."> </div>-->
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label col-md-3" title="Enter subject.">Subject
            <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-6">
            <div class="input-icon right">
                <i class="fa"></i>
                <?=$this->Form->text('subject',['class'=>'form-control','title'=>"Enter Email Subject."])?>
                <!--<input type="text" class="form-control" name="name" title="Enter subject.">-->
                </div>
            </div>
        </div>

        <div class="form-group  ">
            <label class="control-label col-md-3" title="Enter email text.">Email Text
            <span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-8">
            <div class="input-icon right">
                <i class="fa"></i>
                <?=$this->Form->textarea('email_text',['class'=>'form-control','title'=>"Enter Email Body.",'rows'=>10])?>
                <!--<textarea class="form-control" name="name" rows="10" title="Enter email text."></textarea>-->
            </div>

            </div>
        </div>


        <div class="form-actions">
            <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <?=$this->Form->button(__('Save Changes'),['class'=>'btn green','type'=>'submit','title'=>'Click here to save changes']) ?>
            </div>
            </div>
        </div>

    <?= $this->Form->end() ?>

<script type="text/javascript">
          var allowSubmit = false;
          var form2 = $('#edit_form');
          var error2 = $('.alert-danger', form2);
          var success2 = $('.alert-success', form2);
          $(document).ready(function(){
            var handleValidation2 = function() {
            // for more info visit the official plugin documentation:
            // http://docs.jquery.com/Plugins/Validation
            form2.validate({
              errorElement: 'span', //default input error message container
              errorClass: 'help-block help-block-error', // default input error message class
              focusInvalid: false, // do not focus the last invalid input
              ignore: "", // validate all fields including form hidden input
              rules: {
                "from_address": {
                  required: true,
                  validEmail: true
                },
                "from_name": {
                  required: true
                },
                "subject": {
                  required: true
                },
                "email_text": {
                  required: true
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
          
          
          <?php if($this->request->is('Ajax')){ ?>

          $('#edit_form').on('submit', function(e) {
            //   function submitForm() {
            e.preventDefault();
            //            alert(1);
            //                alert($('#forgot_email').val()+'   '+allowSubmit);
            //                alert( "Valid: " + form2.valid() );
            handleValidation2();
            if (!form2.valid()){
              
                // Remove "link" from the ID
              // id = id.replace("link", "");
                // Scroll
                $('.input-icon i').tooltip();
              $('#edit_modal').animate({
                  scrollTop: $("#first_name").offset().top},'slow');
              return false;
            }
            $('#edit_modal .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
            var data = $(this).serialize();
            // alert(data);
            $.ajax({
              type: "POST",
              url: '<?=$this->Url->build(["controller" => "EmailTemplates","action" => "edit/".$emailTemplate->id], true);?>',
              data: data
            }).done(function(data) {
              $('#edit_modal .modal-body').html(data);
              //                 $("#edit_modal .modal-body").animate({ scrollTop: 0 }, "slow");
              //                  $("body").animate({ scrollTop: 0 }, "slow");
              setTimeout(function() {
                //                     $('#edit_modal .modal-body').html('');
                $('#edit_modal').modal('hide');
              }, 1500);

            });
            return false;
          });

          <?php } ?>
          });
        </script>

  <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
__('Delete'),
['action' => 'delete', $emailTemplate->id],
['confirm' => __('Are you sure you want to delete # {0}?', $emailTemplate->id)]
)
?></li>
<li><?= $this->Html->link(__('List Email Templates'), ['action' => 'index']) ?></li>
</ul>
</nav>
<div class="emailTemplates form large-9 medium-8 columns content">
<?= $this->Form->create($emailTemplate) ?>
<fieldset>
<legend><?= __('Edit Email Template') ?></legend>
<?php
echo $this->Form->input('template_name');
echo $this->Form->input('from_address');
echo $this->Form->input('from_name');
echo $this->Form->input('subject');
echo $this->Form->input('email_text');
echo $this->Form->input('status');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->