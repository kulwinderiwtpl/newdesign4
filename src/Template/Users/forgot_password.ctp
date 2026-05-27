<!-- body -->
<div class="note note-info">
    <p><i class="fa fa-info-circle"></i> Please enter your registered email to recieve password.</p>
</div>
<?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'forgotp_form','novalidate'=>'novalidate')) ?>
<div class="form-body">
    <?= $this->Flash->render() ?>
    <div class="form-group">
        <label class="control-label col-md-3">Email
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-icon right">
                <i class="fa"></i>
                <?= $this->Form->email('forgot_email', array('class' => 'form-control', 'id' => 'forgot_email', 'label' => false, 'placeholder' => __('example@email.com'))); ?>
                <!--<input class="form-control" name="email" placeholder="example@email.com" type="email">-->
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn green', 'type' => 'button','id' => 'submit']) ?>
                <!--<button type="submit" class="btn green">Submit</button>-->
            </div>
        </div>
    </div>
    <!-- END FORM-->
    <?= $this->Form->end(); ?>
    <br><br> 
    <!--    <div class="alert alert-danger">
            <button class="close" data-close="alert"></button><i class="fa fa-exclamation-triangle"></i> Your account is not found in our system. Please check to make sure your email is correct. If you have any concerns, please <a href="">contact us.</a></div>
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button><i class="fa fa-check-circle"></i> The details of your account have been sent to your email. </div>
        <div class="alert alert-warning">
            <button class="close" data-close="alert"></button><i class="fa fa-exclamation-circle"></i> Your account is in the system. However, it is currently <b>INACTIVE</b>. If you have any concerns, please <a href="">contact us.</a> 
        </div>                                    						 -->
    <!-- body -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var allowSubmit = false;
        var form2 = $('#forgotp_form');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        var handleValidation2 = function () {
            // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
                        form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    "forgot_email": {
                        required: true,
                        validEmail: true
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
                $('#submit').on('click',function(e){
                e.preventDefault();
    //            alert(1);
//                alert($('#forgot_email').val()+'   '+allowSubmit);
//                alert( "Valid: " + form2.valid() );
                handleValidation2();
                if (!form2.valid())
                    return false;
                var email = $('#forgot_email').val();
                $('#forgotpassword .modal-body').html('<?= $this->Html->image('components/ajax-modal-loading.gif', array('class' => "align-center")) ?>');
                $.ajax({
                    type: "POST",
                    url: '<?= $this->Url->build(["controller" => "Users", "action" => "forgotPassword"], true); ?>',
                    data: 'forgot_email=' + email
                }).done(function (data) {
                    $('#forgotpassword .modal-body').html(data);
                     $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
                      $("body").animate({ scrollTop: 0 }, "slow");
                     setTimeout(function(){
                        $('#long .modal-body').html('');
                         $('#forgotpassword').modal('hide');
                     },1500);

                });
//                alert(1);
                return false;
//                alert(2);
//            });
            });

        <?php } ?>
    });
</script>