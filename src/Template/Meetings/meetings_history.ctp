<?php
/**
* @var \App\View\AppView $this
*/
?>



  <!-- BEGIN PAGE HEAD-->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Your Meeting History

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
      <span class="active">Your Meeting History</span>
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
          <li> Details of your previous meeting attendance are shown below. </li>

        </ul>
      </div>
    </div>
  </div>

  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">

      <ul class="nav nav-tabs">
        <li class="<?=!isset($_GET['page'])?'active':''; ?>">
          <a href="#portlet_tab1" data-toggle="tab"> Previous Meetings </a>
        </li>
        <li class="<?=isset($_GET['page'])?'active':''; ?>">
          <a href="#portlet_tab2" data-toggle="tab"> Invoices </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <div class="tab-content">
        <div class="tab-pane <?=!isset($_GET['page'])?'active':''; ?>" id="portlet_tab1">
          <h4 class="block bold"> Your Meeting History</h4>
          <div class="table-scrollable">
            <table class="table table-striped table-hover">
              <thead class="blue">
                <tr>
                  <th width="60%"> Meeting </th>
                  <th width="10%"> Date </th>
                  <th width="30%"> Additional Bookings </th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($meetings_history as $meeting): ?>
                  <?php //print_r($attendee) ?>
                    <tr>
                      <td> <a href=""><?=h($meeting->meeting->title) ?></a> </td>
                      <td>
                        <?=h($meeting->meeting->date) ?>
                      </td>
                      <td> 0 </td>

                    </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane <?=isset($_GET['page'])?'active':''; ?>" id="portlet_tab2">
          <h4 class="block bold"> Invoices</h4>
          <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column no-footer" id="sample_1" role="grid" aria- describedby="sample_1_info">
              <thead>
                <tr role="row">
                  <!--<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes">
<span></span>
</label>
</th>-->
                  <th> Invoice No. </th>
                  <th> Meeting Date </th>
                  <th> Company Name </th>
                  <th> Attendee's Name </th>
                  <th> RSVP'd </th>
                  <th> Billing Entity </th>
                  <th> Purchase Order </th>
                  <th> Fee </th>
                  <th> Invoice </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($invoices as $key => $invoice): ?>
                  <tr class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                    <!--<td>
<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
<input type="checkbox" class="checkboxes" value="1">
<span></span>
</label>
</td>-->
                    <td>
                      <?= h($invoice->invoice_number) ?>
                    </td>
                    <td>
                      <?= h($invoice->meeting_date) ?>
                    </td>
                    <td>
                      <?= h($invoice->company_name)?>
                    </td>
                    <td>
                      <?= h($invoice->attendees_name)?>
                    </td>
                    <td>
                      <?= h($invoice->date)?>
                    </td>
                    <td>
                      <?= h($invoice->billing_entity)?>
                    </td>
                    <td>
                      <?= h($invoice->purchase_order)?>
                    </td>
                    <td> £
                      <?= h($invoice->fee)?>
                    </td>
                    <td align="center">
                      <h4>
<a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/pdf"], true);?>" title="Open printable PDF" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
<a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/html"], true);?>" title="Open printable HTML" target="_blank"><i class="fa fa-file-text-o"></i></a>
</h4>
                    </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="paginator">
            <ul class="pagination">
              <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                  <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                      <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p>
              <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
          </div>

        </div>



      </div>

    </div>





    <!-- END PAGE BASE CONTENT -->

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