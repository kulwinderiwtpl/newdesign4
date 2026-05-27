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
        <div class="row">
          <div class="col-md-2">
            <!--<a href="javascript:;" class="icon-btn">
              <img src="images/excel.svg">
              <div class="caption-subject font-green bold uppercase"> Companies - Excel </div>
            </a>-->
            <?=$this->Html->link($this->Html->image('excel.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Companies - Excel </div>',['action' => 'exportCompanies','excel'],array('escape' => false,'class'=>'users icon-btn')) ?>
          </div>
          <div class="col-md-10">
            <ul>
              <li> Search a company by typing the first two letters of the company name in the search box below. </li>
              <li> Click <i class="fa fa-edit"></i> for edit menu. </li>
              <li> Click 'Company - Excel' button to see company details in excel format </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="icon-share font-dark"></i>
        <span class="caption-subject font-dark bold uppercase">companies</span>
      </div>
      <ul class="nav nav-tabs">
        <li class="active">
          <!--<a href="#portlet_tab1" data-toggle="tab">News Archive </a>-->
          <a href="#portlet_tab1" data-toggle="tab">
Total
<span class="badge badge-info"> <?=$total_count?> </span>
Associate
<span class="badge badge-info"> <?=$associate_count?> </span>
Full
<span class="badge badge-info"> <?=$full_count?> </span>
e-Member
<span class="badge badge-info"> <?=$e_member_count?> </span>
</a>
        </li>
        <!--<li>
<a href="#portlet_tab2" data-toggle="tab"> Write Newsletter </a>
</li>-->
      </ul>
    </div>
    <div class="portlet-body">
      <?= $this->Flash->render() ?>
        <div class="tab-content">
          <div class="tab-pane active" id="portlet_tab1">

            <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action','novalidate'=>'novalidate')) ?>
              <div class="col-md-6">
                <div id="sample_1_filter" class="dataTables-filter">
                  <label>Search:
                    <input type="search" class="form-control input-sm input-inline table-search loading" value="<?=$this->request->query('search')!==null?$this->request->query('search'):''?>">
                  </label>
                </div>
              </div>

              <div class="btn-group btn-right">
                <a href="javascript:void(0);" data-add-url="companies/add" class="add-item btn sbold green">
Add New Company <i class="fa fa-plus"></i>
</a>
              </div>
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
                      <th> Company Prefix </th>
                      <th> Membership Type </th>
                      <th> Status </th>
                      <th> Actions </th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($companies as $key=>$item): ?>
                      <tr id="row_<?=$item->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                        <td>
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" name="selected_items[]" class="checkboxes" value="<?=$item->id?>">
                            <span></span>
                          </label>
                        </td>
                        <td>
                          <?= $item->name ?>
                        </td>
                        <td>
                          <?= $item->prefix ?>
                        </td>
                        <td>
                          <?= $item->mem_type ?>
                        </td>
                        <td>
                          <?=($item->status)=='A'?'<a href="javascript:void(0);" class="status" data-id="'.$item->id.'" data-status="I" title="Deactivate"><i class="fa fa-check font-green"></i></a>':'<a href="javascript:void(0);" class="status" data-id="'.$item->id.'" data-status="A" title="Activate"><i class="fa fa-times font-red"></i></a>'?>
                        </td>
                        <td align="center">
                          <a href="javascript:void(0);" class="edit-item" data-edit-id="<?=$item->id?>" data-edit-url="companies/edit/" title="Edit Company"><i class="fa fa-edit"></i></a>&nbsp;
                          <a href="javascript:deleteItem('companies/delete/',<?= h($item->id) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete the company?"><i title="Delete Company" class="fa fa-times">&nbsp;</i></a>

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
        </div>

    </div>


    <!-- begin modal -->
    <div id="edit" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Company</h4>
          </div>

          <div class="modal-body">

            <?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>

          </div>
          <div class="modal-footer margin-top-20">
            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END modal -->

    <!--- ADD COMPANY MODAL -->
    <div id="add" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Company</h4>
          </div>

          <div class="modal-body">
            <?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>


          </div>
          <div class="modal-footer margin-top-20">
            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
          </div>
        </div>
      </div>
    </div>




    <!-- END PAGE BASE CONTENT -->
  </div>

  <!-- END PAGE BASE CONTENT -->
<script type="text/javascript">
$(document).on('click', '.status' ,function () {
    // alert($(this).data('uid') + '/' + $(this).data('status'));
    $_this = $(this);
    var status = $(this).data('status');
    $.ajax({
        method: "GET",
        url: BASE_PATH + 'companies/status/' + $(this).data('id') + '/' + status,
        dataType: "json"
    }).success(function (result) {
        if (result.status) {
          if(status=='A'){
            $_this.data('status','I');
            $_this.html('<i class="fa fa-check font-green"></i>');
            $_this.attr('title','Deactivate');
          }
          else {
            $_this.data('status','A');
            $_this.html('<i class="fa fa-times font-red"></i>');
            $_this.attr('title','Activate');
          }
        } else {
            alert(result.message);
        }
    });
});
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