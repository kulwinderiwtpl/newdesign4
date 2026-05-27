<?php

/**
  * @var \App\View\AppView $this
  */
?>
<div class="note note-info">
    <h4 class="block">HCF Registration Form</h4>
    <p>Please register as an individual user to access the site. You will be sent a username and password via email. If your company is not registered with us you will not be able to complete the following registration form.</p>
    <p>To access the members area of our website your Company needs to be a registered member and to have paid the applicable annual subscription fee. If your Company is not registered, or you have any queries regarding registeration, please contact our Membership Officer (stuart.lewis@metlife.uk.com).</p>
    <p>Please provide the following details:</p>
    <ol>
        <li>Your Company name</li>
        <li>Contact information for a Company representative (email, telephone number, address and job title)</li>
        <li>A brief outline of the services provided by your Company and how this relates to the management of life, health and disability claims.</li>
    </ol>
    <p>Please advise whether you are applying for Full membership (available for Insurers and Reinsurers) or Associate membership (available to individuals, firms and companies which work with our member firms). To be considered for associate membership a full member firm must support the application. Please provide the name of an appropriate refree / recommendations in support of your application where appropriate.</p>
    <p>Please contact us if you're having difficulty registering your details.</p>
    <p>Please <a href="http://healthclaimsforum.net/new/contact-us/" title="Contact us" target="_blank">contact us</a> if you're having difficulty registering your details.</p>

</div>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<!--<div class="users form large-9 medium-8 columns content">-->
<div class="row"><!-- BEGIN REGISTRATION FORM ROW BLOCK-->
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Registration</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <h4 class="form-sub-title">Main user details</h4>
    <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Add User') ?></legend>
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
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div><!-- END col-md-12 -->
</div><!-- BEGIN REGISTRATION FORM ROW BLOCK-->
<!--</div>-->
