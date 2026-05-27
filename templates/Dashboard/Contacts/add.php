<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Contact Us
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
        <span class="active">Contact Us</span>
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
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body" style="display: block">
        <div class="note note-info">
            <ul>
                <li> If you need to contact us please use the following form. </li>
            </ul>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#portlet_tab1" data-toggle="tab" > Enquiry Form </a>
            </li>
        </ul>
    </div>
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
                <h3><i class="fa fa-envelope-o"></i> Contact Us</h3>
                <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
                    <?= $this->Form->create($contact, ['id' => 'contact_form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'novalidate' => 'novalidate']) ?>
                    <div class="form-body">
                         <?= $this->Flash->render() ?>
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                        <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3" title="Enter your full name.">Name
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <?=$this->Form->text('name',['class'=>'form-control','placeholder'=>'Enter your full name'])?>
                                    <!--<input type="text" class="form-control" name="name" title="Enter your full name.">--> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your company email address. Personal email address will not be accepted.">Email
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <?=$this->Form->text('email',['class'=>'form-control','placeholder'=>'Corporate Email Only - No Personal Emails'])?>
                                        <!--<input type="text" class="form-control" name="email" placeholder="Corporate Email Only - No Personal Emails" title="Enter your company email address. Personal email address will not be accepted.">-->
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your company telephone number. Personal telephone number will not be accepted.">Phone
                                <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <?=$this->Form->text('phone',['class'=>'form-control','placeholder'=>'Enter your company telephone number. Personal telephone number will not be accepted.'])?>
<!--                                        <input type="text" class="form-control" name="digits" placeholder="Corporate Telephone Only - No Personal Telephones" title="Enter your company telephone number. Personal telephone number will not be accepted."> -->
                                    </div></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" title="Select subject of enquiry.">Subject</label>
                            <div class="col-md-4">
                                <?=$this->Form->select('subject',['General Questions about HCF'=>'General Questions about HCF','Change of Details e.g. your company'=>'Change of Details e.g. your company','Report a problem with our website'=>'Report a problem with our website'],['class'=>'form-control'])?>
<!--                                <select class="form-control" title="Select subject of enquiry.">
                                    <option>General Questions about HCF</option>
                                    <option>Change of Details e.g. your company</option>
                                    <option>Report a problem with our website</option>
                                </select>-->
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 50px;">
                            <label class="control-label col-md-3" title="Enter your comments.">Comments
                            </label>
                            <div class="col-md-6">
                                <?=$this->Form->textarea('comments',['class'=>'form-control','placeholder'=>'Enter any comments you have.'])?>
                                <!--<textarea class="form-control" name="comments" rows="8" title="Enter any comments you have."></textarea>-->
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9 margin-top-20">
                                    <?= $this->Form->button(__('Submit'),['class'=>'btn green','title'=>'Click to submit enquiry.']) ?>
                                    <!--<button type="submit" class="btn green" title="Click to submit enquiry.">Submit</button>-->
                                </div>
                            </div>
                        </div>
                <?= $this->Form->end() ?>   
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
    var handleValidation2 = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form2 = $('#contact_form');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                "name": {
                    required: true
                },
                "email": {
                    required: true,
                    validEmail: true
                },
                "phone": {
                    required: true,
                    number: true
                },
                "subject": {
                    required: true,
                },
                "comments": {
                    required: true,
                    minlength: 20
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success2.hide();
                error2.show();
                App.scrollTo(error2, -100);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parents('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight

            },

            success: function (label, element) {
                var icon = $(element).parents('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                success2.show();
                error2.hide();
                form[0].submit(); // submit the form
            }
        });


    }
    handleValidation2();
    });
</script>


<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contacts form large-9 medium-8 columns content">
<?= $this->Form->create($contact) ?>
    <fieldset>
        <legend><?= __('Add Contact') ?></legend>
<?php
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('phone');
echo $this->Form->input('subject');
echo $this->Form->input('comments');
echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->
