<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
  <?= $this->Form->create($weblink,['id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
    <div class="form-body">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
      <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your changes were successfully created. </div>


      <div class="form-group margin-top-20">
        <label class="control-label col-md-3" title="Enter title of weblink.">Title
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-8">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('title',['class'=>'form-control','title'=>'Enter title of weblink'])?>
            <!--<input type="text" class="form-control" name="name" title="Enter title of weblink." value="National Library of Medicine (USA)">-->
          </div>
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
            <!--<input type="text" class="form-control" name="url" value="http://www.nlm.nih.gov/nlmhome.html" title="Enter a URL."> -->
            </div>
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
                $('#edit .modal-body').html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class '=>"align-center")) ?>');
                var data = $(this).serialize();
                // alert(data);
                $.ajax({
                  type: "POST",
                  cache: false,
                //   contentType: false,
                  url: '<?=$this->Url->build(["controller" => "Weblinks","action" => "edit/".$weblink->wId], true);?>',
                  data: data
                }).done(function(data) {
                  $('#edit .modal-body').html(data);
                  //                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
                  //                  $("body").animate({ scrollTop: 0 }, "slow");
                  setTimeout(function() {
                    //                     $('#long .modal-body').html('');
                    $('#edit').modal('hide');
                    location.reload();
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
['action' => 'delete', $weblink->wId],
['confirm' => __('Are you sure you want to delete # {0}?', $weblink->wId)]
)
?></li>
<li><?= $this->Html->link(__('List Weblinks'), ['action' => 'index']) ?></li>
</ul>
</nav>
<div class="weblinks form large-9 medium-8 columns content">
<?= $this->Form->create($weblink) ?>
<fieldset>
<legend><?= __('Edit Weblink') ?></legend>
<?php
echo $this->Form->input('title');
echo $this->Form->input('url');
echo $this->Form->input('status');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->