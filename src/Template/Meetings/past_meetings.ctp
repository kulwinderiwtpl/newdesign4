<?php
/**
 * @var \App\View\AppView $this
 */
?>



<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Past Meetings

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
        <span class="active">Past Meetings</span>
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
                <li> We receive many requests for speaker's presentations which we are happy to provide. An archive of past presentations can be found below. </li>

            </ul>
        </div>
    </div>
</div>

<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">

        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#portlet_tab1" data-toggle="tab" > Past Meetings </a>
            </li>

        </ul>
    </div>
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">

                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead class="blue">
                            <tr>
                                <th width="45%"> Title </th>
                                <th width="40%"> Presentation Files </th>
                                <th width="15%"> Date </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                           // pr($meetings);
                            foreach ($meetings as $meeting): ?>
                            <tr>
                                <td> <?php echo $this->Html->link(h($meeting->title),array('controller' => 'Meetings', 'action' => 'pastMeeting',$meeting->id)) ?> </td>
                                <td> 
                                    <?php //foreach ($meeting['presentation_files'] as $presentation_file): ?>
                                    <?php if($meeting['file']): ?><a href="<?= $this->request->webroot.'uploads/nextmeetings/'.h($meeting['file']); ?>" title="Open Presentation" target="_blank"><i class="fa fa-file-pdf-o font-red-mint"></i> <?php $file=explode('_',$meeting['file']); echo $file[1]?$file[1]:$meeting['file']; ?> </a><?php endif; ?><br>
                                    <?php //endforeach; ?>
                                </td>
                                <td> <?= date("d/m/y", strtotime($meeting->date)) ?> </td>

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
        <li><?= $this->Html->link(__('New Meeting'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Presentation Files'), ['controller' => 'PresentationFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Presentation File'), ['controller' => 'PresentationFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="meetings index large-9 medium-8 columns content">
    <h3><?= __('Meetings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_map') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_info') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sendto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meetings as $meeting): ?>
                <tr>
                    <td><?= $this->Number->format($meeting->id) ?></td>
                    <td><?= h($meeting->title) ?></td>
                    <td><?= h($meeting->date) ?></td>
                    <td><?= h($meeting->location_map) ?></td>
                    <td><?= h($meeting->location_info) ?></td>
                    <td><?= h($meeting->sendto) ?></td>
                    <td><?= h($meeting->link) ?></td>
                    <td><?= h($meeting->status) ?></td>
                    <td><?= h($meeting->file) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $meeting->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meeting->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?>
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
