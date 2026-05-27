<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?= $this->Html->css('bootstrap-fileinput.css') ?>
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>User Profile | Account
<small>user account page</small>
</h1>
      </div>
      <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li>
        <?= $this->Html->link('Home', ['controller' => 'dashboard', 'action' => 'index']); ?>
          <i class="fa fa-circle"></i>
      </li>
      <li>
        <span class="active">My Account</span>
      </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
          <!-- PORTLET MAIN -->
          <div class="portlet light profile-sidebar-portlet bordered">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <?php if(empty($user->avatar)) { ?>
                <img src="<?= $this->request->webroot.'img/no-profile-img.png'; ?>" class="img-responsive" />

                <?php } else { ?>
                  <img src="<?= $this->request->webroot.'uploads/profile-img/'.h($user->avatar); ?>" class="img-responsive" alt="">
                  <?php } ?>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                <?=$fname.' '.$lname ?>
              </div>
              <div class="profile-usertitle-job"> <?php echo $user_type; ?> </div>
              <br>
              <h6> Last Login: <?= date('D d/m/y @ H:i',strtotime($user->last_login)) ?></h6>
			  <h6> Registered on: <?= date('D d/m/y @ H:i',strtotime($user->created)) ?></h6>
			    <h6> <?php if($user->tandc == "1"){ echo 'Accepted Terms and Conditions'; } else {echo 'Not Accepted Terms and Conditions';} ?> </h6>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR MENU -->
          </div>
          <!-- END PORTLET MAIN -->
          <!-- PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
          <div class="row">
            <div class="col-md-12">
              <div class="portlet light bordered">

                <div class="portlet-title tabbable-line">
                  <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                  </div>
                  <ul class="nav nav-tabs">
                    <li class="<?=!isset($_GET['page'])?'active':''?>">
                      <a href="#tab_1_1" data-toggle="tab" title="Click here to see my account details.">My Account Details</a>
                    </li>
                    <?php if($user_type!='admin') {?>
                    <li class="<?=isset($_GET['page'])?'active':''?>">
                      <a href="#tab_1_2" data-toggle="tab" title="Click here to see my colleagues.">My Colleagues</a>
                    </li>
                    <li>
                      <a href="#tab_1_3" data-toggle="tab" title="Click here to see my billing entity details.">Billing Entity</a>
                    </li>
                    <?php }?>
                  </ul>
                </div>
                <div class="portlet-body">
                  <div class="tab-content">
                    <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane <?=!isset($_GET['page'])?'active':''?>" id="tab_1_1">

                      <!-- -->
                      <?= $this->Form->create($user, ['id' => 'user_edit_form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'novalidate' => 'novalidate','type' => 'file']) ?>
                        <div class="form-body">
                          <?= $this->Flash->render() ?>

                            <div class="form-group  margin-top-20">
                              <label class="control-label col-md-3">Login ID

                              </label>
                              <div class="col-md-6">
                                <?=$this->Form->text('name',['class'=>'form-control','readonly'=>'readonly','disabled'=>'disabled'])?>
                                  <!--<input type="text" class="form-control" name="loginid" placeholder="John123"  disabled>-->

                              </div>
                              <div class="col-md-1">
                                <a href="javascript:;" class="tooltips" data-original-title="You are not authorised to change your Login ID. If you must change it, Please contact us." data-placement="bottom">
                                  <i class="fa fa-info-circle font-blue"></i></a>
                              </div>
                            </div>
                            <div class="form-group  margin-top-20">
                              <label class="control-label col-md-3" title="Enter your first name.">First Name
                                <span class="required" aria-required="true"> * </span>
                              </label>
                              <div class="col-md-6">
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?=$this->Form->text('first_name',['class'=>'form-control','placeholder'=>'Enter your first name.'])?>
                                </div>
                              </div>
                            </div>
                            <div class="form-group  margin-top-20">
                              <label class="control-label col-md-3" title="Enter your last name.">Last Name
                                <span class="required" aria-required="true"> * </span>
                              </label>
                              <div class="col-md-6">
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?=$this->Form->text('last_name',['class'=>'form-control','placeholder'=>'Enter your last name.'])?>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3" title="Enter your company email address. Personal email addresses will not be accepted">Email
                                <span class="required" aria-required="true"> * </span>
                              </label>
                              <div class="col-md-6">

                                <div class="input-group">
                                  <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                        </span>
                                  <div class="input-icon right">
                                    <i class="fa"></i>
                                    <?=$this->Form->text('email',['class'=>'form-control','placeholder'=>'Corporate Email Only - No Personal Emails'])?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3" title="Enter your company telephone number. Personal telephone numbers will not be accepted">Phone
                                <span class="required" aria-required="true"> * </span>
                              </label>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                                </span>
                                  <div class="input-icon right">
                                    <i class="fa"></i>
                                    <?=$this->Form->text('tel',['class'=>'form-control','placeholder'=>'Corporate Telephone Only - No Personal Telephones'])?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group  margin-top-20">
                              <label class="control-label col-md-3" title="Enter your address.">Address
                                <span class="required" aria-required="true"> * </span>
                              </label>
                              <div class="col-md-6">
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?=$this->Form->textarea('address',['class'=>'form-control','rows'=>3,'placeholder'=>'Enter your address.'])?>
                                </div>
                              </div>
                            </div>
                            <div class="form-group  margin-top-20">
                              <label class="control-label col-md-3">Company

                              </label>
                              <div class="col-md-6">
								<!--<input type="text" class="form-control" name="company" placeholder="Ineek" class="form-control" disabled>-->
                                <?php //pr($companies); pr('kkkkk',(array)$user->company_id) ?>
                                  <?php
                                  	if($user_type!='admin'){
										echo $this->Form->select('company_id', $companies,['class'=>'form-control','disabled'=>'disabled']);
									}else{
										echo $this->Form->select('company_id', $companies,['class'=>'form-control']);
									}
								  ?>
                              </div>
                              <?php	if($user_type!='admin'){?>
                              <div class="col-md-1">
                                <a href="javascript:;" class="tooltips" data-original-title="You are not authorised to change your Company. If you must change it, Please contact us." data-placement="bottom">
                                  <i class="fa fa-info-circle font-blue"></i></a>
                              </div>
                              <?php }?>
                            </div>
                            <div class="form-group  margin-top-20">
                              <label class="control-label col-md-3" title="Enter your job title.">Job Title
                                <span class="required" aria-required="true"> * </span>
                              </label>
                              <div class="col-md-6">
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <!--                                                        <input type="text" class="form-control" name="jobtitle" title="Enter your job title."> -->
                                  <?=$this->Form->text('job_title',['class'=>'form-control','title'=>'Enter your job title'])?>
                                </div>
                              </div>
                            </div>




                            <!-- -->



                            <hr>
                            <!-- update pic -->
                            <div class="form-group margin-top-20">

                              <label class="control-label col-md-3" title="You can update your avatar here.">Update Avatar</label>
                              <div class="fileinput fileinput-new col-md-6" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                                  <?php if(empty($user->avatar)) { ?>
                                    <img src="<?= $this->request->webroot.'img/no-profile-img.png'; ?>" />

                                    <?php } else { ?>
                                      <img src="<?= $this->request->webroot.'uploads/profile-img/'.h($user->avatar); ?>" />
                                      <?php } ?>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                  <span class="btn default btn-file margin-top-10">
                                <span class="fileinput-new" title="Click to select new avatar image"> Select image </span>
                                  <span class="fileinput-exists" title="Click to change avatar image"> Change </span>
                                  <!--<input type="file" name="avatar">-->
                                  <?=$this->Form->file('avatar',[]) ?>
                                    </span>
                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput" title="Click to remove new avatar image"> Remove </a>
                                </div>
                              </div>

                            </div>


                            <!-- update pic -->
                            <hr>



                            <div class="form-group margin-top-20 password-strength">
                              <label class="control-label col-md-3" title="Enter your new password">New Password
                                <span class="required" aria-required="true"> * </span></label>
                              <div class="col-md-6">
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?=$this->Form->text('password',['class'=>'form-control','type'=>'password','value'=>'','title'=>'Enter your new password','id'=>'password_strength'])?>
                                </div>
                              </div>
                            </div>

                            <div class="form-group margin-top-20">
                              <label class="control-label col-md-3" title="Re-type your new password">Re-type New Password
                                <span class="required" aria-required="true"> * </span></label>
                              <div class="col-md-6">
                                <div class="input-icon-right">
                                  <i class="fa"></i>
                                  <!--                                                        <input type="text" class="form-control" name="rpassword" title="Re-type your new password"/> -->
                                  <?=$this->Form->text('rpassword',['class'=>'form-control','type'=>'password','value'=>'','title'=>'Enter your new password'])?>
                                </div>
                              </div>
                            </div>

                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <!--                                                    <button type="submit" class="btn green" title="Click here to update your personal details.">Update My Details</button>-->
                              <?= $this->Form->button(__('Update My Details'), ['class' => 'btn green', 'type' => 'submit','title'=>'Click here to update']) ?>

                            </div>
                          </div>
                        </div>



                        <?= $this->Form->end() ?>

                    </div>
                    <!-- END PERSONAL INFO TAB -->
                    <!-- CHANGE AVATAR TAB -->
                    <div class="tab-pane <?=isset($_GET['page'])?'active':''?>" id="tab_1_2">
                      <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" title="Table listing My Colleagues.">
                          <thead>
                            <tr>
                              <th width="75%"> Name </th>
                              <th> Registered </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($colleagues as $colleague) : ?>
                              <tr>
                                <td>
                                  <?=h($colleague->first_name.' '.$colleague->last_name) ?>
                                </td>
                                <td>
                                  <?=h(date('Y-m-d',strtotime($colleague->created)))?>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
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
                    </div>
                    <!-- END CHANGE AVATAR TAB -->
                    <!-- BILLING ENTITY TAB -->
                    <div class="tab-pane" id="tab_1_3">
                      <div class="note note-info">
                        <h4 class="block">Billing Entity</h4>
                        <ul>
                          <li> This field is uneditable. </li>
                          <li> If you wish to change your information, please
                            <?= $this->Html->link('<button type="button" class="btn blue btn-sm"><i class="fa fa-envelope-o"></i> Contact Us</button>', ['controller' => 'Contacts', 'action' => 'add'],['escape' => false]); ?>
                          </li>
                        </ul>
                      </div>

                      <form>
                        <div class="form-body">

                          <div class="form-group  margin-top-40">

                            <div class="col-md-6 col-md-offset-3">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?=$this->Form->text('billing_entity',['class'=>'form-control','disabled'=>'disabled','value'=>$loggedUser->company->billing_entity])?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          </div>





                      </form>
                      </div>
                      <!-- END CHANGE PASSWORD TAB -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END PROFILE CONTENT -->
        </div>
      </div>
      <!-- END PAGE BASE CONTENT -->
    </div>





    <!--<script type="text/javascript" src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>-->
    <?=$this->Html->script('bootstrap-fileinput.js', array('inline' => false)); ?>
      <script type="text/javascript">
      $(document).ready(function(){
        $('#password_strength').pwstrength({
            ui: { showVerdictsInsideProgressBar: false }
        });
      });
        <?php if ($this->request->is('Ajax')) { ?>

        $('#user_edit_form').on('submit', function() {
          $('#long .modal-body').html('<?= $this->Html->image('
            components / ajax - modal - loading.gif ', array('
            class ' => "align-center")) ?>');
          $.ajax({
            type: "POST",
            url: '<?= $this->Url->build(["controller" => "Users", "action" => "edit/" . $user->id], true); ?>',
            data: $('#user_edit_form').serialize()
          }).done(function(data) {
            $('#long .modal-body').html(data);
            //                 $("#long .modal-body").animate({ scrollTop: 0 }, "slow");
            //                  $("body").animate({ scrollTop: 0 }, "slow");
            setTimeout(function() {
              //                     $('#long .modal-body').html('');
              $('#long').modal('hide');
            }, 1500);

          });
          return false;
        });

        <?php } ?>
      </script>

      <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?=
$this->Form->postLink(
__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
)
?></li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="users form large-9 medium-8 columns content">
<?= $this->Form->create($user) ?>
<fieldset>
<legend><?= __('Edit User') ?></legend>
<?php
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('password');
echo $this->Form->input('status');
echo $this->Form->input('job_title');
echo $this->Form->input('tel');
echo $this->Form->input('email');
echo $this->Form->input('address');
echo $this->Form->input('billing_first_name');
echo $this->Form->input('billing_last_name');
echo $this->Form->input('billing_job_title');
echo $this->Form->input('billing_tel');
echo $this->Form->input('billing_email');
echo $this->Form->input('billing_address');
echo $this->Form->input('company_id', ['options' => $companies]);
?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>-->