<?php
/**
* @var \App\View\AppView $this
*/
?>
  <!-- BEGIN PAGE HEAD-->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Manage Claims Diplomas and Useful Information</h1>
    </div>
    <!-- END PAGE TITLE -->
  </div>
  <!-- END PAGE HEAD-->
  <!-- BEGIN PAGE BREADCRUMB -->
  <ul class="page-breadcrumb breadcrumb">

    <li>
      <?= $this->Html->link('Home', ['controller' => 'Users', 'action' => 'recent']); ?>
        <i class="fa fa-circle"></i>
    </li>
    <li>
      <span class="active">View/Manage Documents</span>
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
          <li> Claims Diplomas are auto-hidden (added to archive) on closing date. If you don't specify closing date for a claim diploma it will show on the member's section. </li>
          <li> Don't specify a closing date for Useful Info. </li>

        </ul>
      </div>
    </div>
  </div>

  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">

      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab"> Add Document </a>
        </li>
        <li>
          <a href="#portlet_tab2" data-toggle="tab"> Useful Information </a>
        </li>
        <li>
          <a href="#portlet_tab3" data-toggle="tab"> AGM and Constitution </a>
        </li>
        <li>
          <a href="#portlet_tab4" data-toggle="tab"> Archive </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <div class="tab-content">
        <?= $this->Flash->render() ?>
          <div class="tab-pane active" id="portlet_tab1">

            <?= $this->Form->create($document,['id'=>'add_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
              <div class="form-body">
                <div class="alert alert-danger display-hide">
                  <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <div class="alert alert-success display-hide">
                  <button class="close" data-close="alert"></button> Your document was successfully created. </div>


                <div class="form-group margin-top-20">
                  <label class="control-label col-md-3" title="Enter closing date.">Document Type
                    <span class="required" aria-required="true"> * </span>
                  </label>
                  <div class="col-md-4">
                    <?=$this->Form->select('doc_type', [''=>'Select document type...','AGM and Constitution'=>'AGM and Constitution','Useful Infomation'=>'Useful Infomation'],['class'=>'form-control'])?>
                  </div>

                </div>

                <div class="form-group ">
                  <label class="control-label col-md-3" title="Enter title of document.">Title
                    <span class="required" aria-required="true"> * </span>
                  </label>
                  <div class="col-md-4">
                    <div class="input-icon right">
                      <i class="fa"></i>
                      <?=$this->Form->text('title',['class'=>'form-control','title'=>'Enter title of document'])?>
                    </div>
                  </div>
                </div>


                <div class="form-group  ">
                  <label class="control-label col-md-3" title="Click to upload file.">Upload File
                    <span class="required" aria-required="true"> * </span>
                  </label>
                  <div class="col-md-4">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                        </div>
                        <span class="input-group-addon btn default btn-file">
                          <span class="fileinput-new"> Select file </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="hidden" value="" name="">
                        <?=$this->Form->file('file',[]) ?>
                          </span>
                          <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <a href="javascript:;" class="tooltips" data-original-title="Leave blank or add later."> <i class="fa fa-info-circle font-blue"></i> </a>

                  </div>

                </div>

                <div class="form-group ">
                  <label class="control-label col-md-3" title="Enter closing date.">Closing Date
                  </label>
                  <div class="col-md-4">
                    <div class="input-icon right">
                      <i class="fa"></i>
                      <?=$this->Form->text('close_date',['class'=>'form-control datepicker','title'=>'Enter closing date','placeholder'=>'YYYY-MM-DD'])?>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <a href="javascript:;" class="tooltips" data-original-title="Leave blank if does not apply."> <i class="fa fa-info-circle font-blue"></i> </a>

                  </div>
                </div>

              </div>



              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green" title="Click here to add document.">Add Document</button>
                  </div>
                </div>
              </div>
              <?=$this->Form->end();?>

          </div>

          <div class="tab-pane" id="portlet_tab2">
            <h4 class="block"> Useful Information </h4>
            <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action', 'class'=> 'bulk-action', 'novalidate'=>'novalidate')) ?>
              <?=$this->Form->hidden('tab',['value'=>'ui']);?>
                <div class="table-scrollable">
                  <table class="table table-striped table-bordered table-checkable table-hover order-column dataTable no-footer" id="ui_table" role="grid" aria-="" describedby="ui_table_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" value="ui" name="group_check" class="group-checkable-datatable" data-set="#ui_table .checkboxes">
                            <span></span>
                          </label>
                        </th>
                        <th style="width:500px;"> Title </th>
                        <th style="width:150px;"> Date Published </th>
                        <th style="width:50px;"> Actions </th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($useful_information as $key=>$doc): ?>
                        <tr id="row_<?=$doc->dId?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                          <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" class="checkboxes" name="selected_items[]" value="<?=$doc->dId?>">
                              <span></span>
                            </label>
                          </td>
                          <td>
                            <?= h($doc->title) ?>
                          </td>
                          <td>
                            <?= h($doc->date_sent) ?>
                          </td>
                          <td align="center">
                            <a href="javascript:void(0);" class="edit-item"  data-edit-url="documents/edit/" data-edit-id="<?=$doc->dId?>" title="edit Document"><i class="fa fa-edit"></i></a>&nbsp;
                            <a href="javascript:deleteItem('documents/delete/',<?= h($doc->dId) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete useful information?"><i title="delete document" class="fa fa-times">&nbsp;</i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="datatable-form-actions">
                  <div class="form-group col-md-2" style="width: 200px;">
                    <select id="single" name="group_action" class="form-control" tabindex="-1" aria- hidden="true">
                      <option value="">Choose an action...</option>
                      <option value="D">Delete</option>
                      <option value="AR">Archive</option>
                    </select>

                  </div>

                  <div class="form-actions col-md-6">
                    <button type="submit" class="btn default green" title="Bulk Action">Apply to selected <i class="m-icon-swapright m-icon-white"></i></button>
                  </div>
                </div>
                <div class="row">
                </div>
                <?=$this->Form->end() ?>
          </div>

          <div class="tab-pane" id="portlet_tab3">
            <h4 class="block"> AGM and Constitution </h4>
            <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action', 'class'=> 'bulk-action', 'ovalidate'=>'novalidate')) ?>
              <?=$this->Form->hidden('tab',['value'=>'cd']);?>
                <div class="table-scrollable">
                  <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="cd_table" role="grid" aria-="" describedby="cd_table_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" name="group_check" class="group-checkable-datatable" value="cd" data-set="#cd_table .checkboxes">
                            <span></span>
                          </label>
                        </th>
                        <th style="width:500px;"> Title </th>
                        <th style="width:150px;"> Date Published </th>
                        <th style="width:50px;"> Actions </th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($claims_diploma as $key=>$doc): ?>
                        <tr id="row_<?=$doc->dId?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                          <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" class="checkboxes" name="selected_items[]" value="<?=$doc->dId?>">
                              <span></span>
                            </label>
                          </td>
                          <td>
                            <?= h($doc->title) ?>
                          </td>
                          <td>
                            <?= h($doc->date_sent) ?>
                          </td>
                          <td align="center">
                            <a href="javascript:void(0);" class="edit-item"  data-edit-url="documents/edit/" data-edit-id="<?=$doc->dId?>" title="edit Document"><i class="fa fa-edit"></i></a>&nbsp;
                            <a href="javascript:deleteItem('documents/delete/',<?= h($doc->dId) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete claims diploma?"><i title="delete document" class="fa fa-times">&nbsp;</i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="datatable-form-actions">
                  <div class="form-group col-md-2" style="width: 200px;">
                    <select id="single" name="group_action" class="form-control select2" tabindex="-1" aria- hidden="true">
                      <option value="">Choose an action...</option>
                      <option value="D">Delete</option>
                      <option value="AR">Archive</option>
                    </select>

                  </div>

                  <div class="form-actions col-md-6">
                    <button type="submit" class="btn default green" title="Bulk Action">Apply to selected <i class="m-icon-swapright m-icon-white"></i></button>
                  </div>
                </div>
                <div class="row">
                  <p> </p>
                </div>
                <?=$this->Form->end()?>

          </div>

          <div class="tab-pane" id="portlet_tab4">
            <h4 class="block"> Archive </h4>
            
            <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action', 'class'=> 'bulk-action', 'novalidate'=>'novalidate')) ?>
              <?=$this->Form->hidden('tab',['value'=>'archive']);?>
                <div class="table-scrollable">
                  <table class="table table-striped searchable table-bordered table-hover table-checkable order-column dataTable no-footer" id="archive_table" role="grid" aria-="" describedby="archive_table_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" value="archive" name="group_check" class="group-checkable-datatable" data-set="#archive_table .checkboxes">
                            <span></span>
                          </label>
                        </th>
                        <th style="width:500px;"> Title </th>
                        <th style="width:150px;"> Document Type </th>
                        <th style="width:50px;"> Actions </th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($archived as $key=>$doc): ?>
                        <tr id="row_<?=$doc->dId?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                          <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" class="checkboxes" name="selected_items[]" value="<?=$doc->dId?>">
                              <span></span>
                            </label>
                          </td>
                          <td>
                            <?= h($doc->title) ?>
                          </td>
                          <td>
                            <?= h($doc->doc_type) ?>
                          </td>
                          <td align="center">
                            <a href="javascript:void(0);" class="edit-item" data-edit-url="documents/edit/" data-edit-id="<?=$doc->dId?>" title="edit Document"><i class="fa fa-edit"></i></a>&nbsp;
                            <a href="javascript:unarchiveItem('documents/edit/',<?= h($doc->dId) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to unarchive document?"><i title="unarchive document" class="fa fa-archive">&nbsp;</i></a>&nbsp;
                            <a href="javascript:deleteItem('documents/delete/',<?= h($doc->dId) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete archived document?"><i title="delete document" class="fa fa-times">&nbsp;</i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="datatable-form-actions">
                  <div class="form-group col-md-2" style="width: 200px;">
                    <select id="single" name="group_action" class="form-control select2" tabindex="-1" aria- hidden="true">
                      <option value="">Choose an action...</option>
                      <option value="D">Delete</option>
                      <option value="A">Unarchive</option>
                    </select>

                  </div>

                  <div class="form-actions col-md-6">
                    <button type="submit" class="btn default green" title="Bulk Action">Apply to selected <i class="m-icon-swapright m-icon-white"></i></button>
                  </div>
                </div>

                <div class="row">
                </div>

                <?=$this->Form->end()?>
          </div>



      </div>

    </div>


    <!-- begin modal -->
    <div id="edit" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Document</h4>
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




    <!-- END PAGE BASE CONTENT -->
  </div>
  <script type="text/javascript">
    var form2 = $('#add_form');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    var handleValidation2 = function() {
      // for more info visit the official plugin documentation:
      // http://docs.jquery.com/Plugins/Validation
      form2.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
          "doc_type": {
            required: true
          },
          "title": {
            required: true
          },
          "file": {
            required: true
          },
          "close_date": {
            required: false
          }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
          success2.hide();
          error2.show();
          App.scrollTo(error2, -100);
        },
        errorPlacement: function(error, element) { // render error placement for each input type
          var icon = $(element).parents('.input-icon').children('i');
          icon.removeClass('fa-check').addClass("fa-warning");
          icon.attr("data-original-title", error.text()).tooltip({
            'container': 'body'
          });
        },
        highlight: function(element) { // hightlight error inputs
          $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
        },
        unhighlight: function(element) { // revert the change done by hightlight
        },
        success: function(label, element) {
          var icon = $(element).parents('.input-icon').children('i');
          $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
          icon.removeClass("fa-warning").addClass("fa-check");
        },
        submitHandler: function(form) {
          //                    success2.show();
          //                    error2.hide();
          //call submit function
          form2[0].submit(); // submit the form
          //                    submitform();
        }
      });
    }
    $(document).ready(function() {
      handleValidation2();
    });
  </script>

  <!-- END PAGE BASE CONTENT -->

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