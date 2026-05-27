<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
    
    <?= $this->Form->create($user,['id'=>'user_edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate']) ?>
      <!--<form action="#" class="form-horizontal" id="form_sample_1" novalidate="novalidate">-->
      <div class="form-body">
        <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
        </div>
			   <div class="form-group">
          <label class="col-md-3 control-label" >Registered on
            <span >  </span>
          </label>
          <div class="col-md-6">
           <?= date('D d/m/y @ H:i',strtotime($user->created)) ?>

          </div>
        </div>
		
        <div class="form-group">
          <label class="col-md-3 control-label" title="Enter a User ID">User ID
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <?=$this->Form->text('name',['class'=>'form-control','readonly'=>true])?>
              <!-- <input type="text" class="form-control" placeholder="" name="name" title="Enter a User ID"> -->

          </div>
        </div>
        <div class="form-group ">
          <label class="col-md-3 control-label" title="Enter a strong password">Password

          </label>
          <div class="col-md-6">
            <?=$this->Form->text('password',['class'=>'form-control','type'=>'password','value'=>''])?>
              <i class="fa fa-info-circle"></i> <font size="1">If you don't want to change the password then let it be blank.</font>
          </div>
        </div>
        <div class="form-group ">
          <label class="col-md-3 control-label" title="Enter first name.">First Name
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('first_name',['class'=>'form-control','id'=>'first_name'])?>
            </div>
            

          </div>
        </div>
        <div class="form-group ">
          <label class="col-md-3 control-label" title="Enter last name.">Last Name
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('last_name',['class'=>'form-control'])?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" title="Enter company telephone number.">Contact
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon">
<i class="fa fa-phone"></i>
</span>
              <div class="input-icon right">
                <i class="fa"></i>
                <?=$this->Form->text('tel',['class'=>'form-control','placeholder'=>'05555 555555','title'=>"Enter company telephone number."])?>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" title="Enter  company email address.">Email
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon">
<i class="fa fa-envelope"></i>
</span>
              <div class="input-icon right">
                <i class="fa"></i>
                <?=$this->Form->text('email',['class'=>'form-control','placeholder'=>'example@email.com','title'=>"Enter company email address."])?>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group ">
          <label class="col-md-3 control-label" title="Enter address.">Address
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <?=$this->Form->textarea('address',['class'=>'form-control','rows'=>3])?>

          </div>
        </div>

        <div class="form-group ">
          <label class="col-md-3 control-label" title="Select company.">Company
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <?=$this->Form->select('company_id', $companies,['class'=>'form-control'])?>
          </div>
        </div>
        <?php if($type!='admin') { ?>
        <div class="form-group form-md-checkboxes">
          <label class="col-md-3 control-label font-black" title="Select rep member status.">Rep Member
            <!--<span class="required" aria-required="true"> * </span>-->
          </label>
          <div class="col-md-6">
            <div class="md-checkbox-list">
              <div class="md-checkbox">
                <?=$this->Form->checkbox('rep_member', ['id'=>'rep_member','class'=>'md-check','value'=>'y', 'hiddenField' => false]); ?>

                  <label for="rep_member">
                    <span></span>
                    <span class="check"></span>
                    <span class="box"></span></label>
              </div>

            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" title="Enter job title.">Job Title
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <?=$this->Form->text('job_title',['class'=>'form-control'])?>

          </div>
        </div>



      </div>
      <?php } else { ?>
      <div class="form-group ">
          <label class="col-md-3 control-label" title="Select company.">Access Level
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <?=$this->Form->select('type', ['admin'=>'Normal Admin','superadmin'=>'Super Admin'],['class'=>'form-control'])?>
          </div>
        </div>
      <?php } ?>

      <br>
      <br>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="button" id="send_info" class="btn green">Send Account Info</button>
            <br>
            <p><i class="fa fa-info-circle"></i> <font size="1">Will generate a password and email user</font></p>
            <!--<button type="submit" class="btn green">Update User Info</button>-->
            <?=$this->Form->button(__('Update User Info'),['class'=>'btn green','type'=>'submit']) ?>
             <!-- <button type="reset" class="btn default">Clear All</button>-->
          </div>
        </div>
      </div>
      <?= $this->Form->end() ?>
        <script type="text/javascript">
          var allowSubmit = false;
          var form2 = $('#user_edit_form');
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
                "password": {
                  required: false
                },
                "first_name": {
                  required: true
                },
                "last_name": {
                  required: true
                },
                "tel": {
                  required: true,
                  number: true
                },
                "email": {
                  required: true,
                  validEmail: true
                },
                "address": {
                  required: true
                },
                "company_id": {
                  required: true
                },
                "job_title": {
                  required: true
                },
                "contactno": {
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

          $('#user_edit_form').on('submit', function(e) {
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
              $('#long').animate({
                  scrollTop: $("#first_name").offset().top},'slow');
              return false;
            }
            $('#long .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
            var data = $(this).serialize();
            // alert(data);
            $.ajax({
              type: "POST",
              url: '<?=$this->Url->build(["controller" => "Users","action" => "edit/".$user->id], true);?>',
              data: data
            }).done(function(data) {
              $('#long .modal-body').html(data);
              //                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
              //                  $("body").animate({ scrollTop: 0 }, "slow");
              setTimeout(function() {
                //                     $('#long .modal-body').html('');
                $('#long').modal('hide');
                location.reload();
              }, 1500);

            });
            return false;
          });

          $('#send_info').on('click', function() {
            $.ajax({
              type: "POST",
              url: '<?=$this->Url->build(["controller" => "Users","action" => "sendInfo/".$user->id], true);?>'
            }).done(function(data) {
              $('#long .modal-body').html(data);
              $("#long .modal-body").animate({
                scrollTop: 0
              }, "slow");
              //                  $("body").animate({ scrollTop: 0 }, "slow");
              setTimeout(function() {
                //                     $('#long .modal-body').html('');
                $('#long').modal('hide');
                location.reload();
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
<li><?=
$this->Form->postLink(
__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
)
?></li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="users form large-9 medium-8 columns content">
<?= $this->Form->create($user) ?>
<fieldset>
<legend><?= __('Edit User') ?></legend>
<?php
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('password');
echo $this->Form->input('status');
echo $this->Form->input('job_title');
echo $this->Form->input('tel');
echo $this->Form->input('email');
echo $this->Form->input('address');
echo $this->Form->input('billing_first_name');
echo $this->Form->input('billing_last_name');
echo $this->Form->input('billing_job_title');
echo $this->Form->input('billing_tel');
echo $this->Form->input('billing_email');
echo $this->Form->input('billing_address');
echo $this->Form->input('company_id', ['options' => $companies]);
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->