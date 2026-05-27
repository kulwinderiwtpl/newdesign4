<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Useful Information

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
        <span class="active">Useful Information</span>
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
                <li> Please <?= $this->Html->link('<button type="button" class="btn blue btn-sm"><i class="fa fa-envelope-o"></i> Contact Us</button>', ['controller' => 'Contacts', 'action' => 'add'], ['escape' => false]); ?> if you would like to share your helpful documents with other members. </li>

            </ul>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">

        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#portlet_tab1" data-toggle="tab" > Useful Information </a>
            </li>
            <li>
                <a href="#portlet_tab2" data-toggle="tab" > Archived </a>
            </li>
        </ul>
    </div>
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
                <h4> Useful Information </h4>
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead class="blue">
                            <tr>
                                <th> Title </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documents as $document): ?>
                                <tr>
                                    <td> <a href="<?= $this->request->webroot . 'uploads/documents/' . h($document->file); ?>"><i class="fa fa-file-text-o"></i> <?= h($document->title) ?> </a> </td>
                                    <!--<td><?= h($document->close_date) ?></td>-->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="tab-pane" id="portlet_tab2">
                <h4> Archived Files </h4>
                
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead class="blue">
                                <tr>
                                    <th> Title </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($archived as $document2): ?>
                                <tr>
                                    <td> <a href="<?= $this->request->webroot . 'uploads/documents/' . h($document2->file); ?>"><i class="fa fa-file-text-o"></i> <?= h($document2->title) ?> </a> </td>
                                    <!--<td><?= h($document2->close_date) ?></td>-->
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                
                
                    <?php if(empty($document2)): ?>
                    <p> No Documents found in Archive </p>
                    <?php endif; ?>
                    

            </div>
        </div>
        
    </div>
    
    <!-- END PAGE BASE CONTENT -->
</div>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Document'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documents index large-9 medium-8 columns content">
    <h3><?= __('Documents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('dId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_sent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doc_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('close_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($documents as $document): ?>
                    <tr>
                        <td><?= $this->Number->format($document->dId) ?></td>
                        <td><?= h($document->title) ?></td>
                        <td><?= h($document->date_sent) ?></td>
                        <td><?= h($document->file) ?></td>
                        <td><?= h($document->doc_type) ?></td>
                        <td><?= h($document->close_date) ?></td>
                        <td><?= h($document->status) ?></td>
                        <td class="actions">
    <?= $this->Html->link(__('View'), ['action' => 'view', $document->dId]) ?>
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $document->dId]) ?>
    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $document->dId], ['confirm' => __('Are you sure you want to delete # {0}?', $document->dId)]) ?>
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

