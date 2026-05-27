<?php
/**
* @var \App\View\AppView $this
*/
?>
  <!-- BEGIN PAGE HEAD-->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Bulletin</h1>
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
      <span class="active">Bulletin</span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->


  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="fa fa-comment-o font-dark"></i>
        <span class="caption-subject font-dark bold uppercase">Bulletin</span>
      </div>
      <ul class="nav nav-tabs">


        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab"> Last Updated: <?=date('Y-m-d',strtotime($bulletin->created)) ?> </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <div class="tab-content">
        <div class="tab-pane active" id="portlet_tab1">
          <!--<form class="form-horizontal" role="form">-->
          <?= $this->Form->create($bulletin, ['id' => 'bulletin_form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'novalidate' => 'novalidate']) ?>
            <div class="form-body">
              <?= $this->Flash->render() ?>
              <div class="form-group">
                <!-- <label class="col-md-3 control-label">Bulletin</label> -->
                <div class="col-md-12">
                    <?=$this->Form->textarea('message',['class'=>'editor form-control','rows'=>10,'placeholder'=>'Enter message for users to see.'])?>
                  <!--<textarea class="form-control" rows="5" placeholder="Enter message for users to see."></textarea>-->
                </div>
              </div>

            </div>
            <div class="form-actions">
              <div class="row">
                <div class="col-md-9">
                  <!--<button type="submit" class="btn green">Publish</button>-->
                  <?= $this->Form->button(__('Publish'),['class'=>'btn green','title'=>'Click to update Bulletin Message.']) ?>
                  <button type="reset" class="btn default">Cancel</button>
                </div>
              </div>
            </div>
          <?= $this->Form->end() ?>
        </div>

      </div>


    </div>
  </div>




  <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
__('Delete'),
['action' => 'delete', $bulletin->id],
['confirm' => __('Are you sure you want to delete # {0}?', $bulletin->id)]
)
?></li>
<li><?= $this->Html->link(__('List Bulletins'), ['action' => 'index']) ?></li>
</ul>
</nav>
<div class="bulletins form large-9 medium-8 columns content">
<?= $this->Form->create($bulletin) ?>
<fieldset>
<legend><?= __('Edit Bulletin') ?></legend>
<?php
echo $this->Form->input('message');
echo $this->Form->input('status');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->