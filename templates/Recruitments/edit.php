<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
    <?= $this->Form->create($recruitment,['name'=>'edit_form','id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
      <div class="form-body">
        <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
        <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button> Your newsletter was successfully created. </div>
        <div class="form-group  margin-top-20">
          <label class="control-label col-md-3" title="Select company or write the name below">Company
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-4">
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->select('company_id', $companies,['class'=>'form-control','id'=>'edit_company_id'])?>
            </div>
          </div>
        </div>

        <div class="form-group  ">
          <label class="control-label col-md-3" title="Enter message.">Other/Unlisted Company
            <!--<span class="required" aria-required="true"> * </span>-->
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('othercompany',['class'=>'form-control','title'=>'Enter other/unlisted company name.','id'=>'edit_othercompany'])?>
                <!--<?=$this->Form->textarea('text',['class'=>'form-control','title'=>'Enter company address','rows'=>10])?>-->
            </div>

          </div>
        </div>

        <div class="form-group  ">
          <label class="control-label col-md-3" title="Enter message.">Company Prefix
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('prefix',['class'=>'form-control','title'=>'Enter company prefix.'])?>
                <!--<?=$this->Form->textarea('text',['class'=>'form-control','title'=>'Enter company address','rows'=>10])?>-->
            </div>

          </div>
        </div>

        <div class="form-group  ">
          <label class="control-label col-md-3" title="Enter message.">Opportunity Heading
            <span class="required" aria-required="true"> * </span>
          </label>
          <div class="col-md-6">
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('text',['class'=>'form-control','title'=>'Enter opportunity heading.'])?>
                <!--<?=$this->Form->textarea('text',['class'=>'form-control','title'=>'Enter company address','rows'=>10])?>-->
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
                <?=$this->Form->file('pdf',['id'=>'pdf']) ?>
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

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter message.">Closing Date
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-4">
          <?php $recruitment->closeDate = date('d-m-Y',strtotime($recruitment->closeDate));?>
          <div class="input-group date">
            <i class="fa"></i>
            <?=$this->Form->text('closeDate',['class'=>'form-control datepicker','title'=>'Enter closing date.'])?>
              <!--<input type="text" class="form-control" readonly="" name="datepicker">-->
              <span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span>
          </div>
        </div>
      </div>




      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green" title="Click here to save recruitment.">Save Recruitment</button>

          </div>

        </div>
      </div>
      </form>


      <script type="text/javascript">
        $(document).ready(function() {
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
                company_id: {
                    required: function(element) {
                        return ($("#edit_othercompany").val()=='');
                    }
                },
                othercompany: {
                    required: function(element) {
                        return $("#edit_company_id").is(':empty');
                    }
                },
                "prefix": {
                  required: true
                },
                "text": {
                  required: true
                },
                "pdf": {
                  required: false
                },
                "closeDate": {
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
              $('#edit').animate({
                scrollTop: $("#edit_form").offset().top
              }, 'fast');
              return false;
            }

            // var data = $(this).serialize();
            // var data = new FormData();
            // var data = new FormData(jQuery('#edit_form')[0]);
            // console.log(data);
            var form = $('form[name=edit_form]')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            $('#edit .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
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
              url: '<?=$this->Url->build(["action" => "edit/".$recruitment->id], true);?>',
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
['action' => 'delete', $newsletter->id],
['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]
)
?></li>
<li><?= $this->Html->link(__('List Newsletters'), ['action' => 'index']) ?></li>
</ul>
</nav>
<div class="newsletters form large-9 medium-8 columns content">
<?= $this->Form->create($newsletter) ?>
<fieldset>
<legend><?= __('Edit Newsletter') ?></legend>
<?php
echo $this->Form->input('title');
echo $this->Form->input('text');
echo $this->Form->input('file');
echo $this->Form->input('sendto');
echo $this->Form->input('link');
echo $this->Form->input('date');
echo $this->Form->input('status');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->