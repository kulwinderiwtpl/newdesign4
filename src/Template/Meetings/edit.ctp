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
      <span class="active"><?=$title?></span>
    </li>
  </ul>
  <!-- END PAGE BREADCRUMB -->
  <!-- BEGIN PAGE BASE CONTENT -->
<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
      <div class="caption">
        <i class="icon-share font-dark"></i>
        <span class="caption-subject font-dark bold uppercase">EDIT MEETING</span>
      </div>
      
    </div>

  <div class="portlet light bordered">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create($meeting,['url' => ['action' => "edit/$meeting->id"],'name'=>'edit_form','id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
    <div class="form-body">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
      <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your form was successfully validated. </div>
      <div class="form-group  margin-top-20">
        <label class="control-label col-md-3" title="Enter title of meeting.">Title
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-4">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('title',['class'=>'form-control','title'=>'Enter title of meeting.','id'=>'title'])?>
              <?php //$this->Form->select('company_id', $companies,['class'=>'form-control','id'=>'company_id','value'=>''])?>
          </div>
        </div>
      </div>

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter date of meeting.">Date
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-4">
          <div class="input-group">
            <i class="fa"></i>
            <?=$this->Form->text('date',['class'=>'form-control datepicker','title'=>'Enter date of meeting.','value'=>$meeting->date->format('Y-m-d')])?>
              <!--<input type="text" class="form-control" readonly="" name="datepicker">-->
              <span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span>
          </div>
        </div>

      </div>

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter invite information.">Invite
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-9">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->textarea('invite',['class'=>'editor form-control','title'=>'Enter invite information.','id'=>'invite'])?>
          </div>

        </div>
      </div>

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter agenda information.">Agenda
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-9">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->textarea('agenda',['class'=>'editor form-control','title'=>'Enter agenda information.','id'=>'agenda'])?>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Enter location information.">Location
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-9">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->textarea('location',['class'=>'editor form-control','title'=>'Enter location information.','id'=>'invite'])?>
          </div>
        </div>
      </div>

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter location map.">Location Map
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('location_map',['class'=>'form-control','title'=>'Enter location map.','id'=>'location_map'])?>
          </div>
        </div>
      </div>

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter location info.">Location Info
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('location_info',['class'=>'form-control','title'=>'Enter location info.','id'=>'location_info'])?>
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
              <span class="input-group-addon btn default btn-file"><span class="fileinput-new"> Select file </span>
              <span class="fileinput-exists"> Change </span>
              <?=$this->Form->file('file',['id'=>'file']) ?>
                </span>
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
        <?php //echo $this->Form->select('sendto', ['none'=>'None','all member'=>'All Members','all reps'=>'Rep members','full member'=>'Full Members','associated member'=>'Associate','emember'=>'e-Member'],['default'=>'None'],['class'=>'form-control']) ?>
    <select name="sendto">
        <option value="none" selected="selected">None</option>
  <option value="all member">All Members</option>
  <option value="all reps">Rep members</option>
  <option value="associated member">Associate</option>
  <option value="full member">Full Member</option>
   <option value="e-Member">e-Member</option>
</select>
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
          <button type="submit" onclick="document.getElementById('edit_form').submit();" class="btn green" title="Click here to save meeting.">Save Meeting</button>
<?php 
?>
        </div>

      </div>
    </div>
<?php echo $this->Form->end();?>
<hr>
  <h4> Meeting Files </h4>
  <div class="table-scrollable">
    
    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-="" describedby="sample_1_info">
      <thead>
        <tr role="row">

          <th width="80%"> Title </th>
          <th width="40"> Action </th>



        </tr>
      </thead>
      
      <tbody>
        <?php if(!empty($meeting->file)) { ?>
        <tr>
            <td>
                <a href="<?= $this->request->webroot.'uploads/nextmeetings/'.h($meeting->file); ?>" title="Open File" target="_blank">
                <?php $file=explode('_',$meeting->file); echo isset($file[1])?$file[1]:$meeting->file; ?>
                </a>
            </td>
            <td>
                <a href="javascript:deleteItem('meetings/delete-file/',<?= h($meeting->id) ?>)" title="" data-toggle="confirmation" data-original-title="Are you sure you want to delete the file?"><i class="fa fa-times">&nbsp;</i></a>
            </td>
        </tr>
        <?php } else { ?>
        <tr><td clospan="2"> No files found. </td></tr>
        <?php } ?>
      </tbody>
    </table>
    
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.editor').summernote({
            minHeight: 130,
        });
        $("[data-toggle=confirmation]").confirmation({
            btnOkClass: "btn btn-sm btn-success", 
            btnCancelClass: "btn btn-sm btn-danger" 
        });
        $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});

        var form2 = $('#edit_form');
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
                    //  success2.show();
                    //  error2.hide();
                    //  call submit function
                    //  form2[0].submit(); // submit the form
                    //  submitform();
                  }
                });
              }
              handleValidation2();
$('#meet').find("li:first").focus().addClass("active");
$('#meeting').addClass("active");
      $('#meet').css('display','block');        
                return false;
              });


   
    </script>
    <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
__('Delete'),
['action' => 'delete', $meeting->id],
['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]
)
?></li>
<li><?= $this->Html->link(__('List Meetings'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Presentation Files'), ['controller' => 'PresentationFiles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Presentation File'), ['controller' => 'PresentationFiles', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="meetings form large-9 medium-8 columns content">
<?= $this->Form->create($meeting) ?>
<fieldset>
<legend><?= __('Edit Meeting') ?></legend>
<?php
echo $this->Form->input('title');
echo $this->Form->input('invite');
echo $this->Form->input('date');
echo $this->Form->input('agenda');
echo $this->Form->input('location');
echo $this->Form->input('location_map');
echo $this->Form->input('location_info');
echo $this->Form->input('sendto');
echo $this->Form->input('link');
echo $this->Form->input('status');
echo $this->Form->input('file');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->