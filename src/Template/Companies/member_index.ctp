<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Members
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
        <span class="active">Members</span>
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
                <li> The Health Claims Forum is run by its members for the benefit of its members. There is no limit to the number of individuals that each Full Member company can register and multiple individuals are able to attend forum days subject to the venue capacity and demand for places. </li>
                <li> Each member company is required to provide an annual membership subscription fee. Where there are multi-site claims operations then a fee is due for each site at the discretion of the Committee. </li>
                <li> Service providers are welcome to join the Health Claims Forum as Associate Members subject to the rules set out in the <a href="<?=$this->request->webroot.'uploads/misc-docs/Health-Claims-Forum-Constitution-3july08-final.doc'?>">constitution</a>. There may be limits to the number of Associate Members who may attend each forum. </li>
            </ul>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#portlet_tab1" data-toggle="tab" > Current Listing of HCF Members </a>
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
                                <th width="60%"> Company Name </th>
                                <th width="40%"> Membership Type </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($companies as $company): ?>
                            <tr>
                                <td><?= h($company->name) ?></td>
                                <td><?=($company->mem_type=='Associated')?'Associate':$company->mem_type?></td>
                            </tr>
                            <?php endforeach;?>
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
<!--                        <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                            <ul class="pagination" style="visibility: visible;">
                                <li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
                                <li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companies index large-9 medium-8 columns content">
    <h3><?= __('Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repuser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_of_member') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contactno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datalock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mem_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($companies as $company): ?>
                <tr>
                    <td><?= $this->Number->format($company->id) ?></td>
                    <td><?= h($company->name) ?></td>
                    <td><?= h($company->repuser) ?></td>
                    <td><?= h($company->no_of_member) ?></td>
                    <td><?= h($company->country) ?></td>
                    <td><?= h($company->state) ?></td>
                    <td><?= h($company->city) ?></td>
                    <td><?= h($company->address) ?></td>
                    <td><?= h($company->website) ?></td>
                    <td><?= h($company->contactno) ?></td>
                    <td><?= h($company->created) ?></td>
                    <td><?= h($company->status) ?></td>
                    <td><?= h($company->datalock) ?></td>
                    <td><?= h($company->mem_type) ?></td>
                    <td><?= h($company->fax) ?></td>
                    <td class="actions">
    <?= $this->Html->link(__('View'), ['action' => 'view', $company->id]) ?>
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id]) ?>
    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
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
