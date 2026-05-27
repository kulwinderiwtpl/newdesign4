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


  <div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
      <ul class="nav nav-tabs">
        <li class="active">
          <!--<a href="#portlet_tab1" data-toggle="tab">News Archive </a>-->
          <a href="#portlet_tab1" data-toggle="tab">RSVP</a>
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
            <?= $this->Form->create($rsvpSetting,['name'=>'edit_form','id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
					            <div class="form-body">
					              <div class="alert alert-danger display-hide">
					                  <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
					              <div class="alert alert-success display-hide">
					                   <button class="close" data-close="alert"></button> RSVP details validated. </div>
					              
					             <div class="form-group">
					               <label class="control-label col-md-3" title="Enter fee.">Fee (per person)
					                   <span class="required" aria-required="true"> * </span>
					               </label>
					               <div class="col-md-2">
					                <div class="input-group">
					                   <span class="input-group-addon">
					                   <i class="fa fa-gbp"></i>
					                   </span>
					                   <div class="input-icon right">
					                     <i class="fa"></i>
                               <?=$this->Form->text('fee',['class'=>'form-control','title'=>'Enter fee'])?>
					                   </div>
					                </div>
					               </div>
					            </div>               
						            
					              
					              <div class="form-group  margin-top-20">
					                <label class="control-label col-md-3" title="Enter cheque information.">Paying by Cheque
					                     <span class="required" aria-required="true"> * </span>
					                  </label>
					               	  <div class="col-md-9">
					                     <div class="input-icon right">
					                        <i class="fa"></i>
                                  <?php //$rsvpSetting->cheque_text = str_ireplace(["<br />","<br>","<br/>"], "\n", $rsvpSetting->cheque_text); ?>
                                  <?=$this->Form->textarea('cheque_text',['class'=>'editor form-control','rows'=>10,'title'=>'Enter cheque information.'])?>
					                        <!--<textarea class="form-control" name="name" rows="10" title="Enter cheque information.">Cheques will need to be payable to the Health Claims Forum.</textarea>-->
					                     </div>
					                   </div>
					                </div>
					                
					              <div class="form-group ">
					                 <label class="control-label col-md-3" title="Enter BACS information.">Paying by BACS
					                     <span class="required" aria-required="true"> * </span>
					                  </label>
					               	  <div class="col-md-9">
					                     <div class="input-icon right">
					                        <i class="fa"></i>
                                  <?php //$rsvpSetting->bacs_text = str_ireplace(["<br />","<br>","<br/>"], "\n", $rsvpSetting->bacs_text); ?>
					                        <?=$this->Form->textarea('bacs_text',['class'=>'editor form-control','rows'=>10,'title'=>'Enter BACS information.'])?>
					                     </div>
					                   </div>
					                </div>
					                
					              <div class="form-group ">
					                 <label class="control-label col-md-3" title="Enter return details.">Return Details
					                     <span class="required" aria-required="true"> * </span>
					                  </label>
					               	  <div class="col-md-9">
					                     <div class="input-icon right">
					                        <i class="fa"></i>
                                  <?php //$rsvpSetting->return_text = str_ireplace(["<br />","<br>","<br/>"], "\n", $rsvpSetting->return_text); ?>
					                      <?=$this->Form->textarea('return_text',['class'=>'editor form-control','rows'=>10,'title'=>'Enter return details.'])?>
					                     </div>
					                   </div>
					                </div>
					              
					                                
					       </div>
			                                        
			     
			      
			                                            
					     <div class="form-actions">
					       <div class="row">
					           <div class="col-md-offset-3 col-md-9">
					               <button type="submit" class="btn green" title="Click here to save changes.">Save Changes</button>
					           </div>
					       </div>
					     </div>
              </form>
          </div>
        </div>

    </div>
    <!-- END PAGE BASE CONTENT -->
  </div>

  <!-- END PAGE BASE CONTENT -->
  <script type="text/javascript">
    $(document).ready(function() {
      $("[data-toggle=confirmation]").confirmation({
        btnOkClass: "btn btn-sm btn-success",
        btnCancelClass: "btn btn-sm btn-danger"
      });
      $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
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
            bacs_text: {
              required: true
            },
            cheque_text: {
              required: true
            },
            fee: {
              required: true
            },
            return_text: {
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
            form2[0].submit(); // submit the form
            //  submitform();
          }
        });
      }
      handleValidation2();
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