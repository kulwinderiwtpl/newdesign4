<div class="row">
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
                <?= $this->Form->create(null,array('class' => 'form-horizontal')) ?>
                <div class="form-body">
                    <?= $this->Flash->render() ?>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('email', array('class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?= $this->Form->submit('Login', array('class' => 'btn green')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>