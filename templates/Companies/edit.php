<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Flash->render() ?>
  <?= $this->Form->create($company,['name'=>'edit_form','id'=>'edit_form','class'=>'form-horizontal','autocomplete'=>'off','novalidate'=>'novalidate','type' => 'file']) ?>
    <div class="form-body">
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
      <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your company was added. </div>
      <div class="form-group  margin-top-20">
        <label class="control-label col-md-3" title="Enter your company name.">Company Name
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('name',['class'=>'form-control','title'=>'Enter company name'])?>
            <!--<input type="text" class="form-control" name="name" title="Enter company name."> -->
            </div>
        </div>
      </div>

      <div class="form-group ">
        <label class="control-label col-md-3" title="Enter your billing entity.">Billing Entity
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('billing_entity',['class'=>'form-control','title'=>'Enter billing entity'])?>
            </div>
        </div>
      </div>

      <div class="form-group ">
        <label class="control-label col-md-3" title="Enter your company prefix.">Company Prefix
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->text('prefix',['class'=>'form-control','title'=>'Enter company prefix'])?>
            <!--<input type="text" class="form-control" name="name" title="Enter company prefix."> -->
            </div>
        </div>
      </div>


      <div class="form-group">
        <label class="col-md-3 control-label" title="Select member type.">Member Type</label>
        <div class="col-md-9">
          <div class="mt-radio-inline">
            <label class="mt-radio">
              <input type="radio" name="mem_type" value="Full" <?=($company->mem_type=='Full')?'checked=""':''?>> Full
              <span></span>
            </label>
            <label class="mt-radio">
              <input type="radio" name="mem_type" value="Associated" <?=($company->mem_type=='Associated')?'checked=""':''?>> Associate
              <span></span>
            </label>
            <label class="mt-radio">
              <input type="radio" name="mem_type" value="e-member" <?=($company->mem_type=='e-Member')?'checked=""':''?>> e-Member
              <span></span>
            </label>
          </div>
        </div>
      </div>

      <div class="form-group  ">
        <label class="control-label col-md-3" title="Enter company address.">Address
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-icon right">
            <i class="fa"></i>
            <?=$this->Form->textarea('address',['class'=>'form-control','rows'=>5,'title'=>'Enter company address'])?>
            <!--<textarea class="form-control" name="name" rows="5" title="Enter company address."></textarea>-->
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Company contact number.">Contact
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('contactno',['class'=>'form-control','title'=>'Enter company number'])?>
              <!--<input type="text" class="form-control" name="digits" title="Company contact number">-->
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3" title="Company email address">Email
          <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <div class="input-icon right">
              <i class="fa"></i>
              <?=$this->Form->text('email',['class'=>'form-control','title'=>'Enter company email address'])?>
              <!--<input type="text" class="form-control" name="email" title="Company email address">-->
            </div>
          </div>
        </div>
      </div>




    </div>


    <hr>

    <div class="table-scrollable">
      <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-="" describedby="sample_1_info">
        <thead>
          <tr role="row">
            <th style="width:70px;"> Rep Member </th>
            <th style="width:190px;"> Name </th>
            <th style="width:40px;"> Status </th>

          </tr>
        </thead>
        <tbody>
          <?php foreach($company->users as $key=>$val){ ?>
          <tr class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
            <td>
              <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" name="rep_members" class="checkboxes" value="<?=$val->id?>" <?=($val->rep_member=='y')?'checked=""':''?>>
                <span></span>
              </label>
            </td>
            <td> <?=$val->first_name.' '.$val->last_name;?> </td>
            <td> <?=($val->status=='A')?'<i class="fa fa-check font-green"></i>':'<i class="fa fa-times font-red"></i>'?> </td>

          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="form-actions">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 margin-top-20">
          <button type="submit" class="btn green" title="Click here to save changes.">Save Changes</button>
        </div>
      </div>
    </div>
  </form>


<script type="text/javascript">
    $(document).ready(function(){
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
            "name": {
                required: true
            },
            "prefix": {
                required: true
            },
            'billing_entity':{
                required: true
            },
            "mem_type": {
                required: true
            },
            "address": {
                required: true
            },
            "contactno": {
                required: true,
                number:true
            },
            "email": {
                required: true,
                email:true
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
                url: '<?=$this->Url->build(["action" => "edit/".$company->id], true);?>',
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
['action' => 'delete', $company->id],
['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]
)
?></li>
<li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="companies form large-9 medium-8 columns content">
<?= $this->Form->create($company) ?>
<fieldset>
<legend><?= __('Edit Company') ?></legend>
<?php
echo $this->Form->input('name');
echo $this->Form->input('repuser');
echo $this->Form->input('no_of_member');
echo $this->Form->input('country');
echo $this->Form->input('state');
echo $this->Form->input('city');
echo $this->Form->input('address');
echo $this->Form->input('website');
echo $this->Form->input('contactno');
echo $this->Form->input('status');
echo $this->Form->input('datalock');
echo $this->Form->input('mem_type');
echo $this->Form->input('fax');
echo $this->Form->input('email');
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->