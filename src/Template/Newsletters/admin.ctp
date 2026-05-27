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
      <a href="dashboard-admins.php">Home</a>
      <i class="fa fa-circle"></i>
    </li>
    <li>
      <span class="active">View/Manage Newsletters</span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->


  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="icon-share font-dark"></i>
        <span class="caption-subject font-dark bold uppercase">Newsletters</span>
      </div>
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#portlet_tab1" data-toggle="tab">News Archive </a>
        </li>
        <li>
          <a href="#portlet_tab2" data-toggle="tab"> Write Newsletter </a>
        </li>
      </ul>
    </div>
    <div class="portlet-body">
      <?= $this->Flash->render() ?>
      <div class="tab-content">
        <div class="tab-pane active" id="portlet_tab1">

          <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action','novalidate'=>'novalidate')) ?>
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
                  <th> Title </th>
                  <th> Newsletter File </th>
                  <th> Date Sent </th>
                  <th> Actions </th>


                </tr>
              </thead>
              <tbody>
                <?php foreach ($newsletters as $key=>$item): ?>
                  <tr id="row_<?=$item->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                    <tr class="gradeX odd" role="row">
                      <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                          <input type="checkbox" name="selected_items[]" class="checkboxes" value="<?=$item->id?>">
                          <span></span>
                        </label>
                      </td>
                      <td>
                        <?= $this->Html->link(__($item->title), ['action' => 'view', $item->id,'?'=>['tab'=>'archive','page'=>$this->request->query('page')]]) ?>
                      </td>
                      <td>
                        <?php if($item->file): ?>
                          <a href="<?= $this->request->webroot.'uploads/newsletters/'.h($item->file); ?>" title="Open File" target="_blank">
                            <?php $file=explode('_',$item->file); echo $file[1]?$file[1]:$item->file; ?>
                          </a>
                          <?php endif; ?>
                      </td>
                      <td>
                        <?= h(date('d-m-Y',strtotime($item->date))) ?>
                      </td>
                      <td align="center">
                        <a href="javascript:void(0);" class="edit-item" data-edit-id="<?=$item->id?>" data-edit-url="newsletters/edit/" title="edit newsletter"><i class="fa fa-edit"></i></a>&nbsp;
                        <a href="javascript:deleteItem('newsletters/delete/',<?= h($item->id) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete newsletter?"><i title="delete newsletter" class="fa fa-times">&nbsp;</i></a>

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

        <div class="tab-pane" id="portlet_tab2">
          <?= $this->Form->create($newsletter,['url' => ['action' => 'add'],'name'=>'add_form','id'=>'add_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
            <div class="form-body">
              <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
              <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> Your newsletter was successfully created. </div>
              <div class="form-group  margin-top-20">
                <label class="control-label col-md-3" title="Enter title of newsletter.">Title
                  <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-4">
                  <div class="input-icon right">
                    <i class="fa"></i>
                    <?=$this->Form->text('title',['class'=>'form-control','title'=>'Enter title of newsletter'])?>
                    </div>
                </div>
              </div>

              <div class="form-group  ">
                <label class="control-label col-md-3" title="Enter message.">Message
                  <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-9">
                  <div class="input-icon right">
                    <i class="fa"></i>
                    <?=$this->Form->textarea('text',['class'=>'editor form-control','title'=>'Enter Message','rows'=>10])?>
                  </div>

                </div>
              </div>

              <div class="form-group  ">
                <label class="control-label col-md-3" title="Click to upload file.">Upload File
                  <!--<span class="required" aria-required="true"> * </span>-->
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
                      <?=$this->Form->file('file',['id'=>'file']) ?> </span>
                      <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <a href="javascript:;" class="tooltips" data-original-title="Leave blank or add later."> <i class="fa fa-info-circle font-blue"></i> </a>

                </div>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Send to</label>
              <div class="col-md-2">
                <?=$this->Form->select('sendto', ['none'=>'None','all member'=>'All Members','all reps'=>'Rep members','full member'=>'Full Members','associated member'=>'Associate','emember'=>'e-Member'],['class'=>'form-control'])?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Cc to yourself</label>
              <div class="col-md-2">
                <div class="mt-checkbox-list">
                  <label class="mt-checkbox mt-checkbox-outline mt-checkbox-cc">
                    <input type="checkbox" name="cc_to_yourself" value="1">
                    <span></span>
                  </label>

                </div>
              </div>
            </div>




            <div class="form-actions">
              <div class="row">
                <div class="col-md-offset-3 col-md-9">
                  <button type="submit" class="btn green" title="Click here to create newsletter.">Create Newsletter</button>

                </div>

              </div>
            </div>
          </form>

        </div>




      </div>

    </div>


    <!-- begin modal -->
    <div id="edit" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Newsletter</h4>
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
          "title": {
            required: true
          },
          "text": {
            required: true
          },
          "file": {
            required: false
          },
          "cc_to_yourself": {
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
<li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?></li>
</ul>
</nav>
<div class="newsletters index large-9 medium-8 columns content">
<h3><?= __('Newsletters') ?></h3>
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
<?php foreach ($newsletters as $newsletter): ?>
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