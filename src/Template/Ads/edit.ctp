<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
  <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
  <?= $this->Form->create($ad,['name'=>'edit_form','id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
    <div class="form-body">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
      <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your changes were successfully created. </div>


      <div class="form-group margin-top-20">
        <label class="control-label col-md-3" title="Enter title of ad.">Title
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('title',['class'=>'form-control','title'=>'Enter title of ad'])?>
              <!--<input type="text" class="form-control" name="name" title="Enter title of ad." value="Health Claims Bureau Ltd"> -->
          </div>
        </div>
      </div>

      <div class="form-group ">
        <label class="control-label col-md-3" title="Enter description.">Description
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-8">
          <?=$this->Form->textarea('des',['class'=>'form-control','title'=>'Enter description','rows'=>10])?>
            <!--<textarea class="form-control" name="name" rows="10" title="Enter description.">Visiting services for disability insurers. Temporary assessors, training, claim assessment services & annuity verification services.</textarea>-->
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

      <div class="form-group ">
        <label class="control-label col-md-3" title="Enter a URL.">URL
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-8">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('url',['class'=>'form-control','title'=>'Enter a URL'])?>
              <!--<input type="text" class="form-control" name="url" value="http://www.hcbgroup.co.uk/" title="Enter a URL.">-->
          </div>
        </div>
      </div>




    </div>



    <div class="form-actions">
      <div class="row">
        <div class="col-md-offset-3 col-md-9">
          <?=$this->Form->button(__('Save Changes'),['class'=>'btn green','type'=>'submit','title'=>'Click here to save changes']) ?>
            <!--<button type="submit" class="btn green" title="Click here to save changes.">Save Changes</button>-->
        </div>
      </div>
    </div>
    </form>
    <hr>

    <h4 class="block"> Ad Files </h4>
    <div class="table-scrollable">
      <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-="" describedby="sample_1_info">
        <thead>
          <tr role="row">
            <!--<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 71px;">
              <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes">
                <span></span>
              </label>
            </th>-->
            <th> Title </th>
            <th width="40px;"> Action </th>


          </tr>
        </thead>
        <tbody>
          <?php foreach ($ad->ad_files as $key=>$ad_file): ?>
          <tr id="row_<?=$ad_file->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
          <!--<tr class="gradeX odd" role="row">-->
            <!--<td>
              <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" class="checkboxes" value="1">
                <span></span>
              </label>
            </td>-->
            <td> <?= h($ad_file->ad_file) ?> </td>
            <td align="center">

              <a href="javascript:deleteItem('ads/adfile-delete/',<?= h($ad_file->id) ?>)" title="" data-toggle="confirmation" data-original-title="Are you sure you want to delete ad file?"><i class="fa fa-times">&nbsp;</i></a>

            </td>


          </tr>
          <?php endforeach; ?>
          <?php if(empty($ad_file)){ ?>
          <tr><td colspan="2">No Files present</td></tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

    <!--<div class="form-group col-md-2" style="width: 200px;">
      <select id="single" class="form-control select2" tabindex="-1" aria- hidden="true">
        <option value="">Choose an action...</option>
        <option value="D">Delete</option>

      </select>

    </div>

    <div class="form-actions col-md-6">
      <a href="javascript:;" class="btn default green">Apply to selected<i class="m-icon-swapright m-icon-white"></i></a>
    </div>-->

    <div class="row">
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $("[data-toggle=confirmation]").confirmation({
            btnOkClass: "btn btn-sm btn-success", 
            btnCancelClass: "btn btn-sm btn-danger" 
        });

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
                    "des": {
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
                    //  success2.show();
                    //  error2.hide();
                    //  call submit function
                    //  form2[0].submit(); // submit the form
                    //  submitform();
                  }
                });
              }
              handleValidation2();

              $('#edit_form').on('submit', function(e) {
                //   alert(1);
                e.preventDefault();
                handleValidation2();
                if (!form2.valid()) {
                  // Scroll
                  $('.input-icon i').tooltip();
                  // $('#edit').animate({
                  //   scrollTop: $("#first_name").offset().top
                  // }, 'slow');
                  return false;
                }
                
                // var data = $(this).serialize();
                // var data = new FormData();
                // var data = new FormData(jQuery('#edit_form')[0]);
                // console.log(data);
                var form = $('form[name=edit_form]')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                $('#edit .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class '=>"align-center")) ?>');
                // formData.append('image', $('input[name=file]')[0].files[0]);
                // jQuery.each(jQuery('#files').files, function(i, file) {
                //     data.append('file', file);
                // });
                //console.log(formData);
                // console.log($('#files'));
                // $.each($('#files')[0].files, function(i, file) {
                //     data.append('file-'+i, file);
                // });
                // alert(data);
                $.ajax({
                  type: "POST",
                  cache: false,
                //   contentType: false,
                  processData: false,
                  contentType: false,
                  url: '<?=$this->Url->build(["controller" => "Ads","action" => "edit/".$ad->id], true);?>',
                  data: formData
                }).done(function(data) {
                  $('#edit .modal-body').html(data);
                  //                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
                  //                  $("body").animate({ scrollTop: 0 }, "slow");
                  setTimeout(function() {
                    //                     $('#long .modal-body').html('');
                    // $('#edit').modal('hide');
                    // location.reload();
                  }, 1500);

                });
                return false;
              });


    });
    </script>
    <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $ad->id],
['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]
)
?></li>
<li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Ad Files'), ['controller' => 'AdFiles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Ad File'), ['controller' => 'AdFiles', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="ads form large-9 medium-8 columns content">
<?= $this->Form->create($ad) ?>
<fieldset>
<legend><?= __('Edit Ad') ?></legend>
<?php
echo $this->Form->input('title');
echo $this->Form->input('des');
echo $this->Form->input('url');
echo $this->Form->input('ad_file');
echo $this->Form->input('status');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->