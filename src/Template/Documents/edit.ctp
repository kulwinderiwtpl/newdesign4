<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Form->create($document,['id'=>'edit_form', 'name'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
    <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
    <div class="form-body">
      <?= $this->Flash->render() ?>
        <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
        <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button> Your document was successfully saved. </div>


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
            <?php if($document->file): ?>
              <a href="<?= $this->request->webroot.'uploads/documents/'.h($document->file); ?>" title="Open Document" target="_blank">
                <?php $file=explode('_',$document->file); array_shift($file); echo implode('_',$file); ?>
              </a>
              <?php endif; ?>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="input-group input-large">
                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                      <i class="fa fa-file fileinput-exists"></i>&nbsp;
                      <span class="fileinput-filename"> </span>
                    </div>
                    <span class="input-group-addon btn default btn-file">
<span class="fileinput-new"> Select file </span>
                    <span class="fileinput-exists"> Change </span>
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
              <?=$this->Form->text('close_date',['class'=>'form-control datepicker','title'=>'Enter closing date','placeholder'=>'YYYY-MM-DD','value'=>($document->close_date)?date('Y-m-d',strtotime($document->close_date)):''])?>
            </div>
            <div class="col-md-1">
              <a href="javascript:;" class="tooltips" data-original-title="Leave blank if does not apply."> <i class="fa fa-info-circle font-blue"></i> </a>

            </div>
          </div>

        </div>



        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <?=$this->Form->button(__('Save Changes'),['class'=>'btn green','type'=>'submit']) ?>
                <!--<button type="submit" class="btn green" title="Click here to save changes.">Save Changes</button>-->
            </div>
          </div>
        </div>
        <?=$this->Form->end()?>

          <script type="text/javascript">
            var allowSubmit = false;
            $(document).ready(function() {

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
                    "doc_type": {
                      required: true
                    },
                    "title": {
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
                // alert(1);
                //   function submitForm() {
                e.preventDefault();
                //            alert(1);
                //                alert($('#forgot_email').val()+'   '+allowSubmit);
                //                alert( "Valid: " + form2.valid() );
                handleValidation2();
                if (!form2.valid()) {
                  // Scroll
                  $('.input-icon i').tooltip();
                  // $('#edit').animate({
                  //   scrollTop: $("#first_name").offset().top
                  // }, 'slow');
                  return false;
                }
                var form = $('form[name=edit_form]')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                $('#edit .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class '=>"align-center")) ?>');
                // var data = $(this).serialize();
                // alert(data);
                $.ajax({
                  type: "POST",
                  cache: false,
                  contentType: false,
                  processData: false,
                  url: '<?=$this->Url->build(["controller" => "Documents","action" => "edit/".$document->dId], true);?>',
                  data: formData
                }).done(function(data) {
                  $('#edit .modal-body').html(data);
                  //                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
                  //                  $("body").animate({ scrollTop: 0 }, "slow");
                  setTimeout(function() {
                    //                     $('#long .modal-body').html('');
                    $('#edit').modal('hide');
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
['action' => 'delete', $document->dId],
['confirm' => __('Are you sure you want to delete # {0}?', $document->dId)]
)
?></li>
<li><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?></li>
</ul>
</nav>
<div class="documents form large-9 medium-8 columns content">
<?= $this->Form->create($document) ?>
<fieldset>
<legend><?= __('Edit Document') ?></legend>
<?php
echo $this->Form->input('title');
echo $this->Form->input('date_sent');
echo $this->Form->input('file');
echo $this->Form->input('doc_type');
echo $this->Form->input('close_date');
echo $this->Form->input('status');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->