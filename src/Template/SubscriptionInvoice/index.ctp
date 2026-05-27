<?php
/**
* @var \App\View\AppView $this
*/
?>

  <!-- BEGIN PAGE HEAD-->
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
        <span class="caption-subject font-dark bold uppercase"><?=$title?></span>
      </div>
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab" aria-expanded="true"> Table </a>
        </li>
        <!--<li class="">
          <a href="#portlet_tab2" data-toggle="tab" aria-expanded="false"> Add Year </a>
        </li>-->
        <li>
          <a href="#portlet_tab3" data-toggle="tab"> Generate Invoice </a>
        </li>

      </ul>
    </div>
    <div class="portlet-body">
      <?= $this->Flash->render() ?>
        <div class="tab-content">
          <div class="tab-pane active" id="portlet_tab1">
            <!--<div class="col-md-5">
              <div id="sample_1_filter" class="dataTables-filter">
                <input type="search" class="form-control input-sm input-inline" placeholder="" aria-controls="sample_1">
              </div>
            </div>-->
            
            <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action','novalidate'=>'novalidate')) ?>
              <div class="col-md-5">
                <div id="sample_1_filter" class="dataTables-filter">
                  <label>Search:
                    <input type="search" class="form-control input-sm input-inline table-search loading" value="<?=$this->request->query('search')!==null?$this->request->query('search'):''?>">
                  </label>
                </div>
              </div>
              <div class="btn-right">
              <select id="yearDelete" class="form-control select2" tabindex="-1" aria-hidden="true">
                <option value="<?=date('Y')-1 ?>" <?=($filter_year==date('Y')-1)?'selected="selected"':''?>><?=date('Y')-1?></option>
                <option value="<?=date('Y')?>" <?=($filter_year==date('Y'))?'selected="selected"':''?>><?=date('Y')?></option>
                <option value="<?=date('Y')+1 ?>" <?=($filter_year==date('Y')+1)?'selected="selected"':''?>><?=date('Y')+1?></option>
              </select>
            </div>
            <div class="btn-right">
              <a href="javascript:deleteYearInv();" class="btn default green" data-toggle="confirmation" data-original-title="Are you sure you want to delete all the Invoices for the selected year?">Delete all invoices for the year selected</a>
            </div>

              <!--<div class="btn-group btn-right">
                <a href="javascript:void(0);" data-add-url="companies/add" class="add-item btn sbold green">
            Add New Company <i class="fa fa-plus"></i>
            </a>
              </div>-->
              <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column no-footer" id="list" role="grid" aria-="" describedby="sample_1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                          <input type="checkbox" class="group-checkable" data-set="#list .checkboxes">
                          <span></span>
                        </label>
                      </th>
                      <th> Company Name </th>
                      <th> Membership Type </th>
                      <th> Subscription Status </th>
                      <th> Invoice </th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($subscriptionInvoice as $key=>$item): ?>
                      <tr id="row_<?=$item->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                        <td>
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" name="selected_items[]" class="checkboxes" value="<?=$item->id?>">
                            <span></span>
                          </label>
                        </td>
                        <td>
                          <?= $item->company_name ?>
                        </td>
                        <td>
                          <?= $item->subscription_type ?>
                        </td>
                        <td>
                          <?= $item->payment_status ?>
                        </td>
                        <!--<td>
                          <?php if($item->status=='A') { ?>
                            <i class="fa fa-check font-green"></i>
                            <?php } else if($item->status=='I') { ?>
                              <i class="fa fa-times font-red"></i>
                              <?php } ?>
                        </td>-->
                        <td align="center">
                          <!--<a href="javascript:void(0);" class="edit-item" data-edit-id="<?=$item->id?>" data-edit-url="companies/edit/" title="edit newsletter"><i class="fa fa-eye"></i></a>&nbsp;-->
                          <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'pdf', $item->id],['target'=>'_blank','escape'=>false,'title'=>'View Invoice']) ?>&nbsp;
                          <a href="javascript:deleteItem('subscription-invoice/delete/',<?= h($item->id) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete the Invoice?"><i title="delete Invoice" class="fa fa-times">&nbsp;</i></a>

                        </td>


                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-md-2" style="width: 200px;">
                  <select id="single" name="group_action" class="form-control select2" tabindex="-1" aria- hidden="true">
                    <option value="">Choose an action...</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                    <option value="D">Delete</option>

                  </select>

                </div>

                <div class="form-actions col-md-6">
                  <button type="submit" class="btn default green" title="Bulk Action">Apply to selected <i class="m-icon-swapright m-icon-white"></i></button>
                </div>
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
                    <p>
                      <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                    </p>
                  </div>
                </div>
              </div>
              <?=$this->Form->end(); ?>
          </div>
          <div class="tab-pane" id="portlet_tab3">
            <p> Generate Subscription Invoice for All Companies. </p><p>
                <?= $this->Form->create(null, array('url' => ['action' => 'generateInvoices'],'class' => 'form-horizontal', 'id' => 'generateInvoices','novalidate'=>'novalidate')) ?>
                <div class="form-body">
                  <div class="form-group ">
                    <label class="control-label col-md-3" title="Enter Annual Subscription Amount.">Annual Subscription Amount
                        <span class="required" aria-required="true"> * </span>
                    </label>
                        <div class="col-md-2">
					                <div class="input-group">
					                   <span class="input-group-addon">
					                   <i class="fa fa-gbp"></i>
					                   </span>
					                   <div class="input-icon right">
					                     <i class="fa"></i>
                               <?=$this->Form->text('amount',['value'=>125,'class'=>'form-control','title'=>'Enter Subscription Amount.'])?>
					                   </div>
					                </div>
                        
                      </div>
                  </div>
                  <div class="form-group ">
                    <label class="control-label col-md-3" title="Select Year">Year
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-2">
                        <select id="year" name="year" class="form-control select2" tabindex="-1" aria- hidden="true">
                            <option value="<?=date('Y')?>"><?=date('Y')?></option>
                            <option value="<?=date('Y')+1 ?>"><?=date('Y')+1?></option>
                        </select>
                      </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-success generate-invoice">Generate Invoices</button>
                <?php //$this->Html->link('Generate Invoices', ['action' => 'generateInvoices'],['target'=>'_blank','escape'=>false,'title'=>'Generate Invoices','class'=>'btn btn-success generate-invoice']) ?>&nbsp;
                <?= $this->Form->end(); ?>
                
                </p><p class="show-loader" style="display:none;">
                  <i class="fa fa-circle-o-notch fa-spin"></i>
                  Generating Invoices
                </p>
          </div>
        </div>

    </div>

    <!-- END PAGE BASE CONTENT -->
  </div>

  <!-- END PAGE BASE CONTENT -->
<script type="text/javascript">
$(document).ready(function(){
  $('body').on('click','.generate-invoice', function(){
    $('.show-loader').show();
  });
  $('#yearDelete').on('change', function(){
    var year = $('#yearDelete').val();
    window.location = "<?=$this->Url->build(["action" => "index"], true);?>" + '?year='+year;
  });
});
function deleteYearInv(){
  var year = $('#yearDelete').val();
  if(year){
    window.location = "<?=$this->Url->build(["action" => "deleteInvByYear"], true);?>" + '/'+year;
  } else {
    alert('Please choose a year!');
  }
}
</script>
  <?php //$this->Html->script('custom.js', array('inline' => false)); ?>
    <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?></li>
</ul>
</nav>
<div class="companies index large-9 medium-8 columns content">
<h3><?= __('companies') ?></h3>
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
<?php foreach ($companies as $newsletter): ?>
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