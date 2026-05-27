<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Service Providers
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
        <span class="active">Service Providers</span>
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
                <a href="#portlet_tab1" data-toggle="tab" > Providers Listing </a>
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
                                <th width="55%"> Services </th>
                                <th width="5%"> Website </th>
                                <th width="40%"> Info Sheet </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                          
                            
                            
                            foreach ($ads as $serviceProvider): ?>
                            <tr>
                                <td> <p class="bold"><?= h($serviceProvider->title) ?></p>
                                    <p><?= $serviceProvider->des ?></p>
                                </td>
                                <td align="center"> <a href="<?= h($serviceProvider->url) ?>" title="Open URL" target="_blank"><div class="weblink"><i class="icon-globe"></i></div></a> </td>
                                <td> <?php if($serviceProvider->ad_file): ?> <a href="<?= $this->request->webroot.'uploads/advertisement/'.h($serviceProvider->ad_file); ?>" title="Open PDF" target="_blank"><i class="fa fa-file-pdf-o font-red-mint"></i> <?php $file=explode('_',$serviceProvider->ad_file); echo $file[1]?$file[1]:$serviceProvider->ad_file; ?> </a><?php endif; ?> </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Service Provider'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serviceProviders index large-9 medium-8 columns content">
    <h3><?= __('Service Providers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('AdId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_file') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($serviceProviders as $serviceProvider): ?>
                <tr>
                    <td><?= $this->Number->format($serviceProvider->AdId) ?></td>
                    <td><?= h($serviceProvider->title) ?></td>
                    <td><?= h($serviceProvider->url) ?></td>
                    <td><?= h($serviceProvider->ad_file) ?></td>
                    <td class="actions">
    <?= $this->Html->link(__('View'), ['action' => 'view', $serviceProvider->AdId]) ?>
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceProvider->AdId]) ?>
    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceProvider->AdId], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceProvider->AdId)]) ?>
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
