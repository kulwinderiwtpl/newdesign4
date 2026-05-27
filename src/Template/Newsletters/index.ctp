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
        <span class="active">Newsletters</span>
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
    <div class="portlet-title tabbable-line">
        <?php echo $this->request->query('tab'); ?>
        <ul class="nav nav-tabs">
            <li class="<?=!$this->request->query('tab')?'active':''; ?>">
                <a href="#portlet_tab1" data-toggle="tab" > Latest Newsletter </a>
            </li>
            <li class="<?=$this->request->query('tab')?'active':''; ?>">
                <a href="#portlet_tab2" data-toggle="tab" > Archive </a>
            </li>
        </ul>
    </div>
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane <?=!$this->request->query('tab')?'active':''; ?>" id="portlet_tab1">
                <h4 class="block bold"> <?=$latest->title; ?> </h4>
                <p> <i class="fa fa-calendar-o"></i> <?= date('d-m-Y',strtotime($latest->date)); ?> </p>
                <?= $latest->text; ?>
                <p> <?php if($latest->file): ?><b>Newsletters files:</b> <a href="<?= $this->request->webroot.'uploads/newsletters/'.h($latest->file); ?>" title="Open File" target="_blank"><i class="fa fa-file-pdf-o font-red-mint"></i> <?php $file=explode('_',$latest->file); echo $file[1]?$file[1]:$latest->file; ?> </a><?php endif; ?> </p>
            </div>
            <div class="tab-pane <?=$this->request->query('tab')?'active':''; ?>" id="portlet_tab2">
                <h4> Newsletter Archive </h4>
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr role="row">

                                <th width="40%"> Title </th>
                                <th width="30%"> Newsletter File </th>

                                <th width="30%"> Date Published </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newsletters as $key => $newsletter): ?>
                                <tr class="gradeX <?= $key % 2 == 1 ? 'even' : 'odd' ?>" role="row">
                                    <td> <?= $this->Html->link(__($newsletter->title), ['action' => 'view', $newsletter->id,'?'=>['tab'=>'archive','page'=>$this->request->query('page')]]) ?> </td>
                                    <td> <?php if($newsletter->file): ?> <a href="<?= $this->request->webroot.'uploads/newsletters/'.h($newsletter->file); ?>" title="Open File" target="_blank"> <?php $file=explode('_',$newsletter->file); echo $file[1]?$file[1]:$newsletter->file; ?> </a><?php endif; ?> </td>
                                    <td> <?= h(date('d-m-Y',strtotime($newsletter->date))) ?> </td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <div class="row">

                    <div class="col-md-7 col-sm-7">
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>





    <!-- END PAGE BASE CONTENT -->
</div>


<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsletters index large-9 medium-8 columns content">
    <h3><?= __('Newsletters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sendto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($newsletters as $newsletter): ?>
                    <tr>
                        <td><?= $this->Number->format($newsletter->id) ?></td>
                        <td><?= h($newsletter->title) ?></td>
                        <td><?= h($newsletter->file) ?></td>
                        <td><?= h($newsletter->sendto) ?></td>
                        <td><?= h($newsletter->link) ?></td>
                        <td><?= h($newsletter->date) ?></td>
                        <td><?= h($newsletter->status) ?></td>
                        <td class="actions">
    <?= $this->Html->link(__('View'), ['action' => 'view', $newsletter->id]) ?>
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsletter->id]) ?>
    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?>
                        </td>
                    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
<?= $this->Paginator->first('<< ' . __('first')) ?>
<?= $this->Paginator->prev('< ' . __('previous')) ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(__('next') . ' >') ?>
<?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>-->
