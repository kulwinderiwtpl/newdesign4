<!-- body -->
<div class="note note-info">
    <p><i class="fa fa-info-circle"></i> Please enter your registered email to recieve password.</p>
</div>
<?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'forgotp_form')) ?>
<div class="form-body">
    <div class="form-group">
        <label class="control-label col-md-3">Password
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-icon right">
                <i class="fa"></i>
                <?= $this->Form->password('password', array('class' => 'form-control', 'label' => false, 'placeholder' => __('New Password'))); ?>
                <!--<input class="form-control" name="email" placeholder="example@email.com" type="email">-->
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Confirm Password
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
            <div class="input-icon right">
                <i class="fa"></i>
                <?= $this->Form->password('password2', array('class' => 'form-control', 'label' => false, 'placeholder' => __('Confirm New Password'))); ?>
                <!--<input class="form-control" name="email" placeholder="example@email.com" type="email">-->
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green">Submit</button>
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
    <?php if($this->request->is('Ajax')){ ?>
        
        $('#forgotp_form').on('submit',function(){
            $('#forgotpassword .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
            $.ajax({
                type: "POST",
                url: '<?=$this->Url->build(["controller" => "Users","action" => "forgotPassword"], true);?>',
                data: $('#forgotp_form').serialize()
            }).done(function(data){
                $('#forgotpassword .modal-body').html(data);
//                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
//                  $("body").animate({ scrollTop: 0 }, "slow");
                 setTimeout(function(){
//                     $('#long .modal-body').html('');
                     $('#forgotpassword').modal('hide');
                 },1500);
                 
            });
           return false; 
        });
        
    <?php } ?>
</script>