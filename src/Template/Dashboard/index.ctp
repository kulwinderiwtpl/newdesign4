<?php
/**
 * @var \App\View\AppView $this
 */
?>
<style>
.icon-btn {
    width: 15%;
    height: 120px;
    margin: 0 0 15px 15px;
    background-color: #ffffff;
    min-width: 200px;
}
.icon-btn img{width: 25%; height: 50%;}
</style>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>-->

<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Health Claims Forum | Members Area

        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->

<ul class="page-breadcrumb breadcrumb">
    <li>
        <?= $this->Html->link('Home', ['controller'=>'dashboard','action'=>'index']);?>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Dashboard</span>
    </li>
</ul>

<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->

<div class="portlet green-sharp box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-exclamation-circle"></i>
            <span class="caption-subject bold uppercase">Bulletin</span>
        </div>
        <div class="tools">

            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body">

        <div class="note note-info">
            <p><?=nl2br($bulletin->message)?></p>
        </div>
    </div>
</div> 

<!-- <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <div class="caption">
                    <i class="fa fa-exclamation-circle"></i>
                    <span class="caption-subject bold uppercase">Bulletin</span>
                    </div>
                    <br>
                    <p>Details of the next Health Claims Forum will be coming soon...</p>
</div> -->
<div class="row">
<?= $this->Flash->render() ?>
    <?php
   echo $this->Html->link(
           '<div class="caption-subject font-green bold uppercase">Meetings</div>' .
           $this->Html->image('meeting1.jpg'), ['controller'=>'Meetings','action'=>'nextMeeting'], array('escape' => false,'class' => "icon-btn")
   );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">Useful Info</div>' .
            $this->Html->image('useful-info1.jpg'), ['controller'=>'Documents','action'=>'usefulInformation'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">AGM & Constitution</div>' .
            $this->Html->image('claims-diploma1.jpg'), ['controller'=>'Documents','action'=>'agmAndConstitution'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
    <?php
   echo $this->Html->link(
           '<div class="caption-subject font-green bold uppercase">Newsletter</div>' .
           $this->Html->image('newsletter1.jpg'), ['controller'=>'Newsletters','action'=>'index'], array('escape' => false,'class' => "icon-btn")
   );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">Web Links</div>' .
            $this->Html->image('web-links1.jpg'), ['controller'=>'Weblinks','action'=>'index'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">Service Providers</div>' .
            $this->Html->image('service-providers1.jpg'), ['controller'=>'ServiceProviders','action'=>'index'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">Members</div>' .
            $this->Html->image('members1.jpg'), ['controller'=>'Companies','action'=>'index'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">Recruitment</div>' .
            $this->Html->image('recruitment1.jpg'), ['controller'=>'Recruitments','action'=>'index'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
    <?php
   echo $this->Html->link(
           '<div class="caption-subject font-green bold uppercase">My Account</div>' .
           $this->Html->image('my-account1.jpg'), ['controller'=>'Users','action'=>'profile'], array('escape' => false,'class' => "icon-btn")
   );
    ?>
    <?php
    echo $this->Html->link(
            '<div class="caption-subject font-green bold uppercase">Contact</div>' .
            $this->Html->image('contact1.jpg'), ['controller'=>'Contacts','action'=>'add'], array('escape' => false,'class' => "icon-btn")
    );
    ?>
</div>




