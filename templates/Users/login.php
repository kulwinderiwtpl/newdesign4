
<div class="note note-info">
    <h3 class="block">HCF Login</h3>                                 
    <h5>You can log in with either your username or the email address you used when you first registered with HCF.<br> Please check your welcome email for your username and password.</h5> 
    <h5> Dont have an account yet ?&nbsp;
        <?php
            echo $this->Html->link('Register Here', ['controller'=>'users','action'=>'register'], array('escape' => false)
);
            ?>
        <!--<a href="http://app-hcf.co.uk/hide/hcf-v1/ui/template-out.php"> Register Here </a>-->
    </h5>
</div>
<div class="row"><!-- BEGIN REGISTRATION FORM ROW BLOCK-->
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Login</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <h3 class="form-sub-title">Login to your account</h3>
                <?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'login_form')) ?>
                <div class="form-body">
                    <?= $this->Flash->render() ?>
                    <div class="form-group margin-top-20">
                        <label class="control-label col-md-3">
                        </label>
                        <div class="col-md-4">
                            <label class="control-label visible-ie8 visible-ie9">Username</label>
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <?= $this->Form->text('email', array('div' =>  false,'class' => 'form-control placeholder-no-fix', 'label' => false,'placeholder'=>__('Username'))); ?>
                                <!--<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                        </label>
                        <div class="col-md-4">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <?= $this->Form->text('password', array('class' => 'form-control', 'type' => 'password', 'label' => false,'placeholder'=>__('Password'))); ?>
                                <!--<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />--> 
                            </div>
                            <br>
                            <?= $this->Form->submit('Login', array('class' => 'btn green btn-outline sbold pull-right')); ?>
                            <!--<button type="submit" class="btn green btn-outline sbold pull-right"> Login </button>-->
                        </div>
                    </div>
                    <label class="control-label col-md-3">
                    </label>
                    <div class="col-md-4">
                        <label class="mt-checkbox-outline">
                        </label>
                        <br>
                        <div class="form-actions">
                            <a class="btn green btn-outline sbold" id="forgotp_btn"> Forgot Password? </a>	
                        </div>
                    </div>
                </div>
                <!-- BELOW LINE AREA-->   
                <div class="form-actions">
                    <div class="row">
                    </div>
                </div>
                <!-- END BELOW LINE AREA-->
                <?= $this->Form->end(); ?>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div><!-- END col-md-12 -->
</div><!-- BEGIN REGISTRATION FORM ROW BLOCK-->
<!-- BEGIN forgot password modal -->	
<div id="forgotpassword" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">	
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Forgot Password?</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END forgot password modal -->
<script type="text/javascript">
$(document).ready(function(){
    userID = 0;
    var modal = $('#forgotpassword'), modalBody = $('#forgotpassword .modal-body');
    modal.on('show.bs.modal', function () {
            modalBody.load();
            modalBody.load('<?=$this->Url->build(["controller" => "Users","action" => "forgotPassword"], ['fullBase' => true]);?>');
        });
        modal.on('hidden.bs.modal', function () {
            modalBody.html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
        });
    $('#forgotp_btn').on('click',function(e){
        modal.modal();
        e.preventDefault();
    });
});
</script>