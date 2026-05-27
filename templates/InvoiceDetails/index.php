<?php
/**
* @var \App\View\AppView $this
*/
?>
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1><?=$title?></h1>
    </div>
    <!-- END PAGE TITLE -->
  </div>
  <!-- END PAGE HEAD-->
  <!-- BEGIN PAGE BREADCRUMB -->
  <ul class="page-breadcrumb breadcrumb">

    <li>
      <?= $this->Html->link('Home', ['controller' => 'users', 'action' => 'recent']); ?>
        <i class="fa fa-circle"></i>
    </li>
    <li>
      <span class="active"><?=$title?></span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->


  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="icon-share font-dark"></i>
        <span class="caption-subject font-dark bold uppercase">Invoices</span>
      </div>
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab"> Last Meeting<?=($latest_meeting)?': '.$latest_meeting->date->format('d-m-Y'):''?></a>
        </li>
        <li>
          <a href="#portlet_tab2" data-toggle="tab"> Previous Meetings </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <?= $this->Flash->render() ?>
        <div class="tab-content">
          <div class="tab-pane active" id="portlet_tab1">
            <?php if($latest_meeting) {?>
              <?= $this->Form->create(null, array('url' => ['controller'=>'meetings','action' => 'mergeInvoices'],'class' => 'form-horizontal', 'id' => 'merge_invoices','novalidate'=>'novalidate')) ?>
                <div class="table-scrollable">
                  <table class="table table-striped table-bordered table-hover table-checkable order-column no-footer" id="list" role="grid" aria-describedby="sample_1_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 56px;">
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#list .checkboxes" data-name="merge_invoices[]">
                            <span></span>
                          </label>
                        </th>
                        <th> Invoice No. </th>
                        <th> Company </th>
                        <th> Attendee(s) </th>
                        <th> Payment </th>
                        <th> Payment Method </th>
                        <th width="60"> Fee </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($latest_invoices as $key => $invoice): ?>
                        <tr id="row_<?=$invoice->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                          <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" name="merge_invoices[]" class="checkboxes" value="<?=$invoice->id?>">
                              <span></span>
                            </label>
                          </td>
                          <td>
                            <?= h($invoice->invoice_number) ?>
                          </td>
                          <td>
                            <?= h($invoice->company_name)?>
                          </td>
                          <td>
                            <?= h($invoice->attendees_name)?>
                          </td>
                          <td>
                            <?=($invoice->payment_status)=='paid'?'<a href="javascript:void(0);" class="payment-status" data-id="'.$invoice->id.'" data-status="unpaid" title="Mark Unpaid"><i class="fa fa-check font-green"></i></a>':'<a href="javascript:void(0);" class="payment-status" data-id="'.$invoice->id.'" data-status="paid" title="Mark Paid"><i class="fa fa-clock-o"></i></a>'?>
                          </td>
                          <td>
                            <?=($invoice->payment_method)=='bacs'?'<a href="javascript:void(0);" class="payment-method" data-id="'.$invoice->id.'" data-method="cheque" title="Change payment method to cheque">BACS</a>':'<a href="javascript:void(0);" class="payment-method" data-id="'.$invoice->id.'" data-method="bacs" title="Change payment method to BACS">Cheque</a>'?>
                          </td>
                          </td>
                          <td> £
                            <?= h($invoice->fee)?>
                          </td>
                          <td align="center">
                            <h4><a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/pdf"], true);?>" title="Open printable PDF" target="_blank"><i class="fa fa-file-pdf-o"></i></a> 
                            <a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/html"], true);?>" title="Open printable HTML" target="_blank"><i class="fa fa-file-text-o"></i></a>
                            </h4>
                            <a href="javascript:deleteItem('invoice-details/delete/',<?= h($invoice->id) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete this Invoice?"><i title="delete invoice" class="fa fa-times">&nbsp;</i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                  </table>
                </div>
                <div class="row">

                  <div class="form-group" style="width: 150px;margin-left:20px!important;">
                    <select id="single" class="form-control" tabindex="-1" aria-hidden="true">
                      <option>Choose an action...</option>
                      <option value="Merge">Merge selected invoices</option>


                    </select>

                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn default green" title="Click to add youself as an attendee.">Merge selected invoices
                      <i class="m-icon-swapright m-icon-white"></i></button>
                  </div>
                </div>

                <div class="note note-warning margin-top-20">

                  <p>Note: Invoices with different payment status or different payment methods can not be merged. </p>
                </div>
                <?=$this->Form->end(); ?>
                  <?php } else {?>
                    <div class="alert alert-success">Next Meeting is not added yet.</div>
                    <?php } ?>
          </div>
          <div class="tab-pane" id="portlet_tab2">
            <div class="col-md-12">
              <label>Select Meeting:
                <select id="meeting-dropdown">
                    <?php foreach($history_meetings as $val) { ?>
                        <option value="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "index/".$val->id], true);?>" <?=($val->id==$history_meeting->id)?'selected':''?>>
                            <?php if($val->date) echo $val->date->format('d-m-Y').': '.$val->title?>
                        </option>
                    <?php } ?>
                </select>
              </label>
            </div>
            <h4 class="block"> Invoices - <?=$history_meeting->title?> - <?=$history_meeting->date->format('d-m-Y')?> </h4>
            <?= $this->Form->create(null, array('url' => ['controller'=>'meetings','action' => 'mergeInvoices'],'class' => 'form-horizontal', 'id' => 'merge_invoices','novalidate'=>'novalidate')) ?>
              <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column no-footer" id="list" role="grid" aria-describedby="sample_1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 56px;">
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                          <input type="checkbox" class="group-checkable" data-set="#list .checkboxes" data-name="merge_invoices[]">
                          <span></span>
                        </label>
                      </th>
                      <th> Invoice No. </th>
                      <th> Company </th>
                      <th> Attendee(s) </th>
                      <th> Payment </th>
                      <th> Payment Method </th>
                      <th width="60"> Fee </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($history_meeting_invoices as $key => $invoice): ?>
                      <tr id="row_<?=$invoice->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                        <td>
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" name="merge_invoices[]" class="checkboxes" value="<?=$invoice->id?>">
                            <span></span>
                          </label>
                        </td>
                        <td>
                          <?= h($invoice->invoice_number) ?>
                        </td>
                        <td>
                          <?= h($invoice->company_name)?>
                        </td>
                        <td>
                          <?= h($invoice->attendees_name)?>
                        </td>
                        <td>
                          <?=($invoice->payment_status)=='paid'?'<a href="javascript:void(0);" class="payment-status" data-id="'.$invoice->id.'" data-status="unpaid" title="Mark Unpaid"><i class="fa fa-check font-green"></i></a>':'<a href="javascript:void(0);" class="payment-status" data-id="'.$invoice->id.'" data-status="paid" title="Mark Unpaid"><i class="fa fa-clock-o"></i></a>'?>
                        </td>
                        <td>
                          <?=($invoice->payment_method)=='bacs'?'<a href="javascript:void(0);" class="payment-method" data-id="'.$invoice->id.'" data-method="cheque" title="Change payment method to cheque">BACS</a>':'<a href="javascript:void(0);" class="payment-method" data-id="'.$invoice->id.'" data-method="bacs" title="Change payment method to BACS">Cheque</a>'?>
                        </td>
                        <td> £
                          <?= h($invoice->fee)?>
                        </td>
                        <td align="center">
						 <h4><a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/pdf"], true);?>" title="Open printable PDF" target="_blank"><i class="fa fa-file-pdf-o"></i></a> 
                            <a href="<?=$this->Url->build(["controller" => "InvoiceDetails","action" => "printable/".$invoice->id."/html"], true);?>" title="Open printable HTML" target="_blank"><i class="fa fa-file-text-o"></i></a>
                            </h4>
                          <a href="javascript:deleteItem('invoice-details/delete/',<?= h($invoice->id) ?>)" title="" data-toggle="confirmation" data-original-title="Are you sure you want to delete this Invoice?"><i class="fa fa-times">&nbsp;</i></a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>

                </table>
              </div>
              <div class="row">

                <div class="form-group" style="width: 150px;">
                  <select id="single" class="form-control" tabindex="-1" aria-hidden="true">
                    <option>Choose an action...</option>
                    <option value="Merge">Merge selected invoices</option>


                  </select>

                </div>

                <div class="form-actions">
                  <button type="submit" class="btn default green" title="Click to add youself as an attendee.">Merge selected invoices
                    <i class="m-icon-swapright m-icon-white"></i></button>
                </div>
              </div>

              <div class="note note-warning margin-top-20">

                <p>Note: Invoices with different payment status or different payment methods can not be merged. </p>
              </div>
              <?=$this->Form->end(); ?>

          </div>

        </div>

    </div>
    <!-- END PAGE BASE CONTENT -->
  </div>

  <script type="application/javascript">
    $(document).ready(function() {

      $('#merge_invoices').on('submit', function() {
        if ($('input[name="merge_invoices[]"]:checked').length < 2) {
          alert('Select at least 2 Invoices to Merge them!');
          return false;
        }
      });

      $('#meeting-dropdown').on('change',function(){
        window.location = $(this).val()+'#portlet_tab2';
      });

      
      $(document).on('click', '.payment-status' ,function () {
        // alert($(this).data('uid') + '/' + $(this).data('status'));
        $_this = $(this);
        var payment_status = $(this).data('status');
        $.ajax({
            method: "GET",
            url: BASE_PATH + 'invoice-details/payment-status/' + $(this).data('id') + '/' + payment_status,
            dataType: "json"
        }).success(function (result) {
            if (result.status) {
              if(payment_status=='paid'){
                $_this.data('status','unpaid');
                $_this.html('<i class="fa fa-check font-green"></i>');
                $_this.attr('title','Mark Unpaid');
              }
              else {
                $_this.data('status','paid');
                $_this.html('<i class="fa fa-clock-o"></i>');
                $_this.attr('title','Mark Paid');
              }
            } else {
                alert(result.message);
            }
        });
    });

    $(document).on('click', '.payment-method' ,function () {
        // alert($(this).data('uid') + '/' + $(this).data('status'));
        $_this = $(this);
        var payment_method = $(this).data('method');
        $.ajax({
            method: "GET",
            url: BASE_PATH + 'invoice-details/payment-method/' + $(this).data('id') + '/' + payment_method,
            dataType: "json"
        }).success(function (result) {
            if (result.status) {
              if(payment_method=='bacs'){
                $_this.data('method','cheque');
                $_this.html('BACS');
                $_this.attr('title','Change payment method to cheque');
              }
              else {
                $_this.data('method','bacs');
                $_this.html('Cheque');
                $_this.attr('title','Change payment method to bacs');
              }
            } else {
                alert(result.message);
            }
        });
    });
  });
</script>
  <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Invoice Detail'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="invoiceDetails index large-9 medium-8 columns content">
<h3><?= __('Invoice Details') ?></h3>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
<th scope="col"><?= $this->Paginator->sort('id') ?></th>
<th scope="col"><?= $this->Paginator->sort('date') ?></th>
<th scope="col"><?= $this->Paginator->sort('meeting_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('meeting_title') ?></th>
<th scope="col"><?= $this->Paginator->sort('meeting_date') ?></th>
<th scope="col"><?= $this->Paginator->sort('attendees_name') ?></th>
<th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
<th scope="col"><?= $this->Paginator->sort('fee') ?></th>
<th scope="col"><?= $this->Paginator->sort('invoice_number') ?></th>
<th scope="col"><?= $this->Paginator->sort('payment_method') ?></th>
<th scope="col"><?= $this->Paginator->sort('payment_status') ?></th>
<th scope="col"><?= $this->Paginator->sort('attendee_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('added_by') ?></th>
<th scope="col"><?= $this->Paginator->sort('is_merged') ?></th>
<th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($invoiceDetails as $invoiceDetail): ?>
<tr>
<td><?= $this->Number->format($invoiceDetail->id) ?></td>
<td><?= h($invoiceDetail->date) ?></td>
<td><?= $invoiceDetail->has('meeting') ? $this->Html->link($invoiceDetail->meeting->title, ['controller' => 'Meetings', 'action' => 'view', $invoiceDetail->meeting->id]) : '' ?></td>
<td><?= h($invoiceDetail->meeting_title) ?></td>
<td><?= h($invoiceDetail->meeting_date) ?></td>
<td><?= h($invoiceDetail->attendees_name) ?></td>
<td><?= h($invoiceDetail->company_name) ?></td>
<td><?= $this->Number->format($invoiceDetail->fee) ?></td>
<td><?= h($invoiceDetail->invoice_number) ?></td>
<td><?= h($invoiceDetail->payment_method) ?></td>
<td><?= h($invoiceDetail->payment_status) ?></td>
<td><?= $invoiceDetail->has('attendee') ? $this->Html->link($invoiceDetail->attendee->id, ['controller' => 'Attendees', 'action' => 'view', $invoiceDetail->attendee->id]) : '' ?></td>
<td><?= $invoiceDetail->has('user') ? $this->Html->link($invoiceDetail->user->id, ['controller' => 'Users', 'action' => 'view', $invoiceDetail->user->id]) : '' ?></td>
<td><?= $this->Number->format($invoiceDetail->added_by) ?></td>
<td><?= h($invoiceDetail->is_merged) ?></td>
<td class="actions">
<?= $this->Html->link(__('View'), ['action' => 'view', $invoiceDetail->id]) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceDetail->id]) ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoiceDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceDetail->id)]) ?>
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