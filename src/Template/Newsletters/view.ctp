<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Newsletters

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
        <?= $this->Html->link('Newsletters', ['controller' => 'Newsletters', 'action' => 'index']); ?>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active"><?=$newsletter->title?></span>
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
            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body" style="display: none">

        <div class="note note-info">

            <ul>
                <li> Please find below details of newsletters which highlight information that the committee feels may be of interest to members.
                </li>
                <li> Please click on the title to see the full text of articles which are stored under the archive page. </li>
            </ul>
        </div>
    </div>
</div>

<div class="portlet light bordered">
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active">
                <h4 class="block bold"> <?=$newsletter->title; ?> </h4>
                <p> <i class="fa fa-calendar-o"></i> <?= $newsletter->date; ?> </p>
                <?= $newsletter->text; ?>
                <p> <?php if($newsletter->file): ?><b>Newsletters files:</b> <a href="<?= $this->request->webroot.'uploads/newsletters/'.h($newsletter->file); ?>" title="Open File" target="_blank"><i class="fa fa-file-pdf-o font-red-mint"></i> <?php $file=explode('_',$newsletter->file); echo $file[1]?$file[1]:$newsletter->file; ?> </a><?php endif; ?> </p>
                <?= $this->Html->link('<button type="button" class="btn blue btn-sm"><i class="fa fa-arrow-left"></i> Back to Archive</button>', ['action' => 'index','?'=>['tab'=>'archive','page'=>$this->request->query('page')]], ['escape' => false]); ?>
            </div>
        </div>
    </div>
</div>


<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Newsletter'), ['action' => 'edit', $newsletter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Newsletter'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Newsletters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsletters view large-9 medium-8 columns content">
    <h3><?= h($newsletter->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($newsletter->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($newsletter->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sendto') ?></th>
            <td><?= h($newsletter->sendto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($newsletter->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($newsletter->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsletter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($newsletter->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($newsletter->text)); ?>
    </div>
</div>-->
