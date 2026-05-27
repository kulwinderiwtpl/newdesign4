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
      <?php if($user_type=='member') { ?>
        <?= $this->Html->link('Home', ['controller' => 'dashboard', 'action' => 'index']); ?>
          <?php } else { ?>
            <?= $this->Html->link('Home', ['controller' => 'users', 'action' => 'recent']); ?>
              <?php } ?>
                <i class="fa fa-circle"></i>
    </li>
    <li>
      <span class="active"><?=$title?></span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->
  <?php if($user_type=='member') { ?>
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
            <li> Below are links to websites which the Committee feels may be useful in helping you with your claims assessments. </li>
            <li> If you would like to share a web link with other members please
              <?= $this->Html->link('<button type="button" class="btn blue btn-sm"><i class="fa fa-envelope-o"></i> Contact Us</button>', ['controller' => 'Contacts', 'action' => 'add'],['escape' => false]); ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php } ?>
      <div class="portlet light bordered">
        <div class="portlet-title tabbable-line">
          <div class="caption">
            <i class="icon-share font-dark"></i>
            <span class="caption-subject font-dark bold uppercase">Weblinks</span>
          </div>
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#portlet_tab1" data-toggle="tab"> Web Links </a>
            </li>
            <?php if($user_type!='member') { ?>
              <li class="">
                <a href="#portlet_tab2" data-toggle="tab" aria-expanded="false"> Add Weblink </a>
              </li>
              <?php } ?>
          </ul>
        </div>
        <div class="portlet-body">
          <?= $this->Flash->render() ?>
          <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
            <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action','novalidate'=>'novalidate')) ?>
              <div class="table-scrollable">
                <table id="table_list" class="table table-striped table-hover">
                  <thead class="blue">
                    <tr>
                      <?php if($user_type!='member') { ?>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
                          <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#table_list .checkboxes">
                            <span></span>
                          </label>
                        </th>
                        <?php } ?>
                          <th width="60%"> Site Name </th>
                          <th width="40%"> URL </th>
                          <?php if($user_type!='member') { ?>
                            <th> Actions </th>
                            <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($weblinks as $key=>$weblink): ?>
                      <tr id="row_<?=$weblink->wId?>" class="<?php if($user_type!='member')  echo ($key % 2 == 0) ? 'gradeX odd' : 'gradeX even'  ?>">
                        <?php if($user_type!='member') { ?>
                          <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" name="selected_items[]" class="checkboxes" value="<?=$weblink->wId?>">
                              <span></span>
                            </label>
                          </td>
                          <?php } ?>
                            <td> <a href="<?= h($weblink->url) ?>" target="_blank"><?= h($weblink->title) ?></a> </td>
                            <td> <a href="<?= h($weblink->url) ?>" target="_blank"><?= h($weblink->url) ?></a> </td>
                            <?php if($user_type!='member') { ?>
                              <td align="center">
                                <a href="javascript:void(0);" class="edit-item" data-edit-id="<?=$weblink->wId?>"  title="edit weblink"><i class="fa fa-edit"></i></a>&nbsp;
                                <a href="javascript:deleteItem('weblinks/delete/',<?= h($weblink->wId) ?>)" class="delete-item" data-delete-id="<?=$weblink->wId?>" data-toggle="confirmation" data-original-title="Are you sure you want todelete weblink?"><i title="delete weblink" class="fa fa-times">&nbsp;</i></a>

                              </td>
                              <?php } ?>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="form-actions clearfix">
                <div class="form-group col-md-2" style="width: 200px;">
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
            <?php if($user_type!='member') { ?>
              <div class="tab-pane" id="portlet_tab2">
                <?= $this->Form->create($weblink,['id'=>'add_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate']) ?>
                  <div class="form-body">
                    <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                      <button class="close" data-close="alert"></button> Your weblink was successfully created. </div>


                    <div class="form-group margin-top-20">
                      <label class="control-label col-md-3" title="Enter title of weblink.">Title
                        <span class="required" aria-required="true"> * </span>
                      </label>
                      <div class="col-md-4">
                        <div class="input-icon right">
                          <i class="fa"></i>
                          <?=$this->Form->text('title',['class'=>'form-control','title'=>'Enter title of weblink','value'=>''])?>
                          <!--<input type="text" class="form-control" name="name" title="Enter title of weblink.">-->
                          </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label class="control-label col-md-3" title="Enter a URL.">URL
                        <span class="required" aria-required="true"> * </span>
                      </label>
                      <div class="col-md-4">
                        <div class="input-icon right">
                          <i class="fa"></i>
                          <?=$this->Form->text('url',['class'=>'form-control','title'=>'Enter a URL','value'=>''])?>
                          <!--<input type="text" class="form-control" name="url" title="Enter a URL."> -->
                          </div>
                      </div>
                    </div>




                  </div>



                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <?=$this->Form->button(__('Add Weblink'),['class'=>'btn green','type'=>'submit','title'=>"Click here to add weblink."]) ?>
                        <!--<button type="submit" class="btn green" title="Click here to add weblink.">Add Weblink</button>-->
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <?php } ?>
          </div>
        </div>
        <!-- begin modal -->
        <div id="edit" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Weblink</h4>
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
    $(document).ready(function() {
      editID = 0;
      var edit = $('#edit'),
        editBody = $('#edit .modal-body');
      edit.on('show.bs.modal', function() {
        editBody.load();
        editBody.load(BASE_PATH + 'weblinks/edit/' + editID);
      });
      edit.on('hidden.bs.modal', function() {
        editBody.html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
      });
      $('.edit-item').on('click', function(e) {
        editID = $(this).data('edit-id');
        edit.modal();
        e.preventDefault();
      });

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
          "title": {
            required: true
          },
          "url": {
            required: true
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
    handleValidation2();
  });

</script>
      <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Weblink'), ['action' => 'add']) ?></li>
</ul>
</nav>
<div class="weblinks index large-9 medium-8 columns content">
<h3><?= __('Weblinks') ?></h3>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
<th scope="col"><?= $this->Paginator->sort('wId') ?></th>
<th scope="col"><?= $this->Paginator->sort('title') ?></th>
<th scope="col"><?= $this->Paginator->sort('url') ?></th>
<th scope="col"><?= $this->Paginator->sort('status') ?></th>
<th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($weblinks as $weblink): ?>
<tr>
<td><?= $this->Number->format($weblink->wId) ?></td>
<td><?= h($weblink->title) ?></td>
<td><?= h($weblink->url) ?></td>
<td><?= h($weblink->status) ?></td>
<td class="actions">
<?= $this->Html->link(__('View'), ['action' => 'view', $weblink->wId]) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $weblink->wId]) ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weblink->wId], ['confirm' => __('Are you sure you want to delete # {0}?', $weblink->wId)]) ?>
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