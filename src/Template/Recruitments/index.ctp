<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Recruitment
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
        <span class="active">Recruitment</span>
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
                <li> If you wish to advertise here or if you would like to obtain details of the cost of advertising on the site then please 
                    <?= $this->Html->link('<button type="button" class="btn blue btn-sm"><i class="fa fa-envelope-o"></i> Contact Us</button>', ['controller' => 'Contacts', 'action' => 'add'],['escape' => false]); ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#portlet_tab1" data-toggle="tab" > Current Recruitment Listing </a>
            </li>
        </ul>
    </div>
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
                <p> Recruitment items will be removed from the current list on passing the closing date. </p>
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead class="blue">
                            <tr>
                                <th width="30%"> Company </th>
                                <th width="50%"> File </th>
                                <th width="20%"> Closing Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recruitments as $key=>$recruitment): sort($recruitment->closeDate);
                            ?>
                            <tr class="gradeX <?= $key % 2 == 1 ? 'even' : 'odd' ?>" role="row">
                        <td>
                          <?= !empty($recruitment->Companies['name']) ? $recruitment->Companies['name']:$recruitment->othercompany ?>
                        </td>
                        
                        <td>
                          <?php if($recruitment->pdf): ?>
                            <a href="<?= $this->request->webroot.'uploads/recruitmentfile/'.h($recruitment->pdf); ?>" title="Open File" target="_blank"><i class="fa fa-file-pdf-o fa-lg font-red-mint"></i>
                              <?php $file=explode('_',$recruitment->pdf); echo $file[1]?$file[1]:$recruitment->pdf; ?>
                            </a>
                            <?php endif; ?>
                        </td>
                        <!--<td><?= h($recruitment->closeDate) ?></td>-->
                        <td><?= $recruitment= date("d F Y", strtotime($recruitment->closeDate)); ?>
                        </td>
                            </tr>
                            <?php sort($recruitment->closeDate); ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php  if(empty($recruitment)) : //check if $recruitment is empty from last foreach run ?>
                <p> There are currently no recruitment listings. </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
    <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Recruitment'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="recruitments index large-9 medium-8 columns content">
        <h3><?= __('Recruitments') ?></h3>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('text') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('pdf') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('addd') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('addm') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('addy') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('expd') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('expm') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('expy') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('datalock') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('mem_type') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('closeDate') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('othercompany') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($recruitments as $recruitment): ?>
                    <tr>
                        <td><?= $this->Number->format($recruitment->id) ?></td>
                        <td><?= $recruitment->has('company') ? $this->Html->link($recruitment->company->name, ['controller' => 'Companies', 'action' => 'view', $recruitment->company->id]) : '' ?></td>
                        <td><?= h($recruitment->text) ?></td>
                        <td><?= h($recruitment->pdf) ?></td>
                        <td><?= h($recruitment->addd) ?></td>
                        <td><?= h($recruitment->addm) ?></td>
                        <td><?= h($recruitment->addy) ?></td>
                        <td><?= h($recruitment->expd) ?></td>
                        <td><?= h($recruitment->expm) ?></td>
                        <td><?= h($recruitment->expy) ?></td>
                        <td><?= h($recruitment->status) ?></td>
                        <td><?= h($recruitment->datalock) ?></td>
                        <td><?= h($recruitment->mem_type) ?></td>
                        <td><?= h($recruitment->closeDate) ?></td>
                        <td><?= h($recruitment->othercompany) ?></td>
                        <td class="actions">
        <?= $this->Html->link(__('View'), ['action' => 'view', $recruitment->r_id]) ?>
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recruitment->r_id]) ?>
        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recruitment->r_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recruitment->r_id)]) ?>
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
