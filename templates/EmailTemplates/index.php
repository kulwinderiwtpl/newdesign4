<?php
/**
* @var \App\View\AppView $this
*/
?>

  <!-- BEGIN PAGE HEAD-->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>View/Manage Email Templates</h1>
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
      <span class="active">View/Manage Email Templates</span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->




  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">

      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab"> Email Templates </a>
        </li>

      </ul>
    </div>
    <div class="portlet-body">
      <div class="tab-content">
        <div class="tab-pane active" id="portlet_tab1">


          <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover" id="sample_1" role="grid" aria-="" describedby="sample_1_info">
              <thead>
                <tr role="row">
                  <th width="90%"> Template Name </th>
                  <th> Action </th>


                </tr>
              </thead>
              <tbody>
                <?php foreach ($emailTemplates as $key=>$emailTemplate): ?>
                  <tr class="gradeX <?= $key % 2 == 0 ? 'odd' : 'even' ?>" role="row">
                    <td><?= h($emailTemplate->template_name) ?> </td>
                    <td>
                      <a href="javascript:void(0);" data-edit-id="<?= $emailTemplate->id; ?>" class="edit-item" title="Edit Template"><i class="fa fa-edit"></i></a>&nbsp;
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
              <p>
                <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
              </p>
            </div>
          </div>



        </div>

      </div>

    </div>


    <!-- begin modal -->
    <div id="edit_modal" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Email Content</h4>
          </div>

          <div class="modal-body">
            <?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>
              <div class="modal-footer margin-top-20">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
              </div>
          </div>
        </div>
      </div>
      <!-- END modal -->




      <!-- END PAGE BASE CONTENT -->
    </div>


    <!-- END PAGE BASE CONTENT -->

    <!-- END CONTENT BODY -->
  </div>
  <!-- END CONTENT -->
  <script type="text/javascript">
    $(document).ready(function() {
      editID = 0;
      var modal = $('#edit_modal'),
        modalBody = $('#edit_modal .modal-body');
      modal.on('show.bs.modal', function() {
        modalBody.load();
        modalBody.load('<?=$this->Url->build(["controller" => "EmailTemplates","action" => "edit"], true);?>/' + editID);
      });
      modal.on('hidden.bs.modal', function() {
        modalBody.html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
      });
      $('.edit-item').on('click', function(e) {
        editID = $(this).data('edit-id');
        modal.modal();

        e.preventDefault();
      });
    });
  </script>

  <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Email Template'), ['action' => 'add']) ?></li>
</ul>
</nav>
<div class="emailTemplates index large-9 medium-8 columns content">
<h3><?= __('Email Templates') ?></h3>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
<th scope="col"><?= $this->Paginator->sort('id') ?></th>
<th scope="col"><?= $this->Paginator->sort('template_name') ?></th>
<th scope="col"><?= $this->Paginator->sort('from_address') ?></th>
<th scope="col"><?= $this->Paginator->sort('from_name') ?></th>
<th scope="col"><?= $this->Paginator->sort('subject') ?></th>
<th scope="col"><?= $this->Paginator->sort('status') ?></th>
<th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($emailTemplates as $emailTemplate): ?>
<tr>
<td><?= $this->Number->format($emailTemplate->id) ?></td>
<td><?= h($emailTemplate->template_name) ?></td>
<td><?= h($emailTemplate->from_address) ?></td>
<td><?= h($emailTemplate->from_name) ?></td>
<td><?= h($emailTemplate->subject) ?></td>
<td><?= h($emailTemplate->status) ?></td>
<td class="actions">
<?= $this->Html->link(__('View'), ['action' => 'view', $emailTemplate->id]) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailTemplate->id]) ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emailTemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailTemplate->id)]) ?>
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