<?php
/**
* @var \App\View\AppView $this
*/
?>
  <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
</ul>
</nav>-->

  <!-- BEGIN PAGE HEAD-->
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1><?=$page=='recent'?'Welcome Admin':$title;?>

</h1>
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






  <!-- <div class="portlet light bordered">

<div class="portlet-title">
<div class="caption">
<i class="fa fa-info-circle font-dark"></i>
<span class="caption-subject font-dark bold uppercase">Help</span>
</div>

</div>
<div class="portlet-body">

<div class="note note-info">
<h4 class="block">To action registration follow the steps below<br></h4>
<ul>
<li>Click <i class="fa fa-edit"></i> to check members details and popup window appears.</li>
<li>If you're happy with the details, click on "Send account info" in the popup, and close the popup</li>
<li>Under "Status" click on <i class="fa fa-clock-o"></i> to activate member.</li>
<li>If you want to delete registratiion (e.g. if the registration is spam) use the delete button <i class="fa fa-user-times"></i></li>
    <li>Once a user is activated, they'll be listed in the Members tab.</li>
</ul>
</div>

</div>
</div> -->

  <?php if($page=='recent') { ?>
    <div class="portlet green-sharp box">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-info-circle"></i>
          <span class="caption-subject bold uppercase">Help</span>
        </div>
        <div class="tools">
          <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
          <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>
      </div>
      <div class="portlet-body" style="display: none;">

        <div class="note note-info">
          <h4 class="block">To action registration follow the steps below<br></h4>
          <ul>
            <li>Click <i class="fa fa-edit"></i> to check members details and popup window appears.</li>
            <li>If you're happy with the details, click on "Send account info" in the popup, and close the popup</li>
            <li>Under "Status" click on <i class="fa fa-clock-o"></i> to activate member.</li>
            <li>If you want to delete registration (e.g. if the registration is spam) use the delete button <i class="fa fa-user-times"></i></li>
            <li>Once a user is activated, they'll be listed in the Members tab.</li>
          </ul>
        </div>
      </div>


    </div>
    <?php } else if($page=='index') { ?>
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
        <div class="portlet-body">

          <div class="note note-info">
            <div class="row">
              <div class="col-md-2">
                <!--<a href="javascript:;" class="users icon-btn">-->
                  <?=$this->Html->link($this->Html->image('excel.svg').'<div class="caption-subject font-green bold uppercase"> Members - Excel </div>',['controller' => 'Users', 'action' => 'exportCsv',$page],array('escape' => false,'class'=>'users icon-btn')) ?>
                    
                <!--</a>-->
              </div>
              <div class="col-md-10">
                <ul>
                  <li> Search a member by typing the first two letters of their first in the search box below. </li>
                  <li> Click <i class="fa fa-edit"></i> for edit menu. </li>
                  <li> Click 'Members - Excel' button to see members details in excel format </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php } else if($page=='rep') { ?>
        <div class="portlet green-sharp box">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-info-circle"></i>
              <span class="caption-subject bold uppercase">Information</span>
            </div>
            <div class="tools">
              <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
              <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
            </div>
          </div>
          <div class="portlet-body" style="display: none;">

            <div class="note note-info">
              <div class="row">
                <div class="col-md-2">
                  <?=$this->Html->link($this->Html->image('excel.svg').'<div class="caption-subject font-green bold uppercase"> Reps - Excel </div>',['controller' => 'Users', 'action' => 'exportCsv',$page],array('escape' => false,'class'=>'users icon-btn')) ?>
                </div>
                <div class="col-md-10">
                  <ul>
                    <li> Search a rep member by typing the first two letters of their first in the search box below. </li>
                    <li> Click <i class="fa fa-edit"></i> for edit menu. </li>
                    <li> Click 'Reps - Excel' button to see rep members details in excel format </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

          <!--<div class="alert alert-success">
<button class="close" data-close="alert"></button><i class="fa fa-thumbs-o-up"></i> Member has been <b>ACTIVATED</b> and moved to the Members table.
</div>
<div class="alert alert-success">
<button class="close" data-close="alert"></button><i class="fa fa-thumbs-o-up"></i> Registered User has been <b>DELETED</b>.
</div>-->

          <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
              <div class="caption">
                <i class="icon-share font-dark"></i>
                <span class="caption-subject font-dark bold uppercase"><?=$title?></span>
              </div>
              <ul class="nav nav-tabs">
                <?php if($page=='recent'){ ?>
                  <li class="active"><a href="#portlet_tab1" data-toggle="tab">Members pending:
    <?php if($pending_member_count>0){ ?><span class="badge badge-info"> <?=$pending_member_count?> </span><?php } else echo '0'; ?></a></li>
                  <?php } else if($page=='index') { ?>
                    <li class="active"><a href="#portlet_tab1" data-toggle="tab">Active members:
    <?php if($active_member_count>0){ ?><span class="badge badge-info"> <?=$active_member_count?> </span><?php } else echo '0'; ?></a></li>
                  <?php } else if($page=='rep'){ ?>
                  <li class="active"><a href="#portlet_tab1" data-toggle="tab">Current Rep Members</a></li>
                  <?php } if($page=='index' || $page=='rep') { ?>
                    <li><a href="#portlet_tab2" data-toggle="tab">Mass Email</a></li>
                    <?php } ?>
              </ul>
            </div>



            <div class="portlet-body">
              <div class="tab-content">
                <?= $this->Flash->render() ?>
                  <div class="tab-pane active" id="portlet_tab1">
                    <!-- BEGIN TABLE -->

                    
                    <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'users_list','novalidate'=>'novalidate')) ?>
                      
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                          <div class="col-md-6 col-sm-6">
                            <?php if($page!='admin') { ?>
                            <div id="sample_1_filter" class="dataTables-filter">
                              <label>Search:
                                <input type="search" class="form-control input-sm input-inline table-search loading" placeholder="" value="<?=$this->request->query('search')!==null?$this->request->query('search'):''?>" aria-controls="sample_1">
                              </label>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                        <?php if($page=='index' || $page=='admin') { ?>
                        <div class="btn-group btn-right">
                          <a class="add-user" <?=($page=='admin')?'data-type="admin"':''?> >
                            <button id="sample_editable_1_new" class="btn sbold green"> Add New <?=($page=='admin')?'Admin':'Member'?>
                              <i class="fa fa-plus"></i>
                            </button>
                          </a>
                        </div>
                        <?php } ?>
                        <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column no-footer" id="tableID" role="grid" aria-describedby="sample_1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="      " style="width: 75px;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                  <input class="group-checkable" data-set="#sample_1.checkboxes" type="checkbox">
                                  <span></span>
                                </label>
                              </th>
                              <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Name : activate to sort column descending" style="width:172px;"> Name </th>
                              <?php if($page=='admin'){ ?>
                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Level : activate to sort column ascending" style="width:360px;"> Level </th>
                              <?php } else { ?>
                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Company : activate to sort column ascending" style="width:360px;"> Company </th>
                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Registered: activate to sort column ascending" style="width:139px;"> Registered </th>
                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Status: activate to sort column ascending" style="width:29px;"> Status </th>
                              <?php } ?>
                              <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Actions: activate to sort column ascending" style="width:139px;"> Actions </th>
                            </tr>
                          </thead>

                          <tbody>

                            <?php foreach ($users as $key => $user): ?>
                              <tr class="gradeX <?= $key % 2 == 0 ? 'odd' : 'even' ?>" role="row">
                                <td>
                                  <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input class="checkboxes" name="uids[]" value="<?=$user->id?>" type="checkbox">
                                    <span></span>
                                  </label>
                                </td>
                                <!--<td><?= $this->Number->format($user->id) ?></td>-->
                                <td>
                                  <?= h($user->first_name) ?>
                                    <?= h($user->last_name) ?>
                                </td>
                                <?php if($page=='admin'){ ?>
                                <td>
                                  <?= ($user->type=='superadmin')?'Super':'Normal' ?>
                                </td>
                                <?php } else { ?>
                                <td>
                                  <?= $user->has('company') ? $user->company->name: '' ?>
                                </td>
                                <td>
                                  <?= h($user->created) ?>
                                </td>
                                <td>
                                  <?php if ($user->status=='I') { ?>
                                    <a href="javascript:void(0);" class="user-status" data-uid="<?= h($user->id) ?>" data-status="A" title="activate user"><i class="fa fa-clock-o"></i>&nbsp;Deactivated</a>
                                    <?php } else if ($user->status=='P') { ?>
                                    <a href="javascript:void(0);" class="user-status" data-uid="<?= h($user->id) ?>" data-status="A" title="activate user"><i class="fa fa-clock-o"></i>&nbsp;Pending</a>
                                    <?php } else if($user->status=='P') { ?>
                                      <!--<a href="javascript:void(0);" class="user-status" data-uid="<?= h($user->id) ?>" data-status="I" title="Deactivate user">-->
                                      <i class="fa fa-check font-green"></i>
                                      <!--</a>-->
                                      <?php } ?>

                                </td>
                                <?php } ?>
                                <td>
                                  <center>
                                    <a class="edit-user" href="javascript:void(0);" <?=($page=='admin')?'data-type="admin"':''?> title="edit <?=($page=='admin')?'admin':'user'?>" data-user-id="<?= $user->id; ?>"><i class="fa fa-edit"></i></a>&nbsp;
                                    <a href="javascript:deleteUser(<?= h($user->id) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete <?=($page=='admin')?'admin':'user'?>?" data-placement="left" data-uid="<?= h($user->id) ?>" class="user-delete"><i title="delete <?=($page=='admin')?'admin':'user'?>" class="fa fa-user-times">&nbsp;</i></a>
                                    
                                    <?php if($page!='recent') { ?>
                                    <?php if($user->status=='A'){ ?>
                                    <a href="javascript:void(0);"  class="user-status" data-uid="<?= h($user->id) ?>" data-status="I" title="Deactivate user"><i class="fa fa-unlock"></i>&nbsp;</a>
                                    <?php } else if($user->status == 'I') { ?>
                                    <a href="javascript:void(0);"  class="user-status" data-uid="<?= h($user->id) ?>" data-status="A" title="Activate user"><i class="fa fa-lock"></i>&nbsp;</a>
                                    <?php } ?>
                                    <?php } ?>
                                    <a class="send-message" href="javascript:void(0);" title="message user" data-user-id="<?= $user->id; ?>"><i class="fa fa-envelope-o"></i></a></center>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                              <?php if(empty($user)) { ?>
                              <tr><td colspan="6">No Users found!</td></tr>
                              <?php } ?>
                          </tbody>
                        </table>
                        </div>
                        <div class="datatable-form-actions clearfix">
                          <div class="form-group col-md-2" style="width: 200px; margin-right:15px;">
                            <select id="group_action" name="group_action" class="form-control select2" tabindex="-1" aria-="" hidden="true">
                              <option>Choose an action...</option>
                              <option value="D">Delete</option>
                              <?php if($page=='recent') echo '<option value="A">Activate</option>'; else echo '<option value="I">Deactivate</option>'; ?>
                            </select>
                          </div>
                          <button type="submit" class="btn default green" title="Bulk Action">Apply to selected <i class="m-icon-swapright m-icon-white"></i></button>
                        </div>
                        <?php if($page!='admin') { ?>
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
                        <?php } ?>
                      

                      <!-- begin modal -->
                      <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                              <h4 class="modal-title">Edit User</h4>
                            </div>

                            <div class="modal-body">
                              <!-- form -->

                              <?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>

                                <!-- form -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END modal -->




                      <!-- begin modal -->
                      <div id="email" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                              <h4 class="modal-title">Email User</h4>
                            </div>

                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END modal -->

                      <div id="addnewmember" class="modal fade modal-scroll in" tabindex="-1" data-replace="true" style="display: none; padding-left: 0px;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                              <h4 class="modal-title">Add New <?=($page=='admin')?'Admin':'Member'?></h4>
                            </div>

                            <div class="modal-body">
                            </div>
                            <div class="modal-footer margin-top-20">
                              <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                  
                  <!-- END TABLE -->

                  <br>
                  
                  

                  
                  <?=$this->Form->end(); ?>


              </div>
              <div class="tab-pane" id="portlet_tab2">
                <?= $this->Form->create(null, array('url' => ['action' => 'bulkEmail',$page],'class' => 'form-horizontal', 'id' => 'bulk_email','novalidate'=>'novalidate')) ?>
                  <div class="form-body">
                    <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                      <button class="close" data-close="alert"></button> Your message was sent. </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" title="Select membership type.">Membership Type
                        <span class="required" aria-required="true"> * </span>
                      </label>
                      <div class="col-md-4">
                        <select class="form-control" name="mem_type" title="Select membership type.">
                          <option value="">Select a membership type</option>
                          <option value="All">ALL</option>
                          <option value="Associated">Associate</option>
                          <option value="Full">Full</option>
                          <option value="e-Member">e-Member</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" title="Select member type.">Recipients</label>
                      <div class="col-md-4">
                        <div class="mt-radio-inline">
                          <label class="mt-radio">
                            <input type="radio" name="recipients" id="recipients_me" value="me" checked=""> Just yourself (for testing)
                            <span></span>
                          </label>
                          <label class="mt-radio">
                            <input type="radio" name="recipients" id="recipients_members" value="members"> All members of selected membership type
                            <span></span>
                          </label>

                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" title="Enter subject.">Subject
                        <span class="required" aria-required="true"> * </span>
                      </label>
                      <div class="col-md-4">
                        <div class="input-icon right">
                          <i class="fa"></i>
                          <input type="text" class="form-control" name="subject" title="Enter subject."> </div>
                      </div>
                    </div>

                    <div class="form-group  ">
                      <label class="control-label col-md-3" title="Enter message.">Message
                        <span class="required" aria-required="true"> * </span>
                      </label>
                      <div class="col-md-6">
                        <div class="input-icon right">
                          <i class="fa"></i>
                          <textarea class="form-control" name="message" rows="15" title="Enter message."></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" title="Enter which email will be sending this message.">From Email

                      </label>
                      <div class="col-md-4">
                        <div class="input-icon right">
                          <i class="fa"></i>
                          <input type="text" class="form-control" name="from_email" value="devs@healthclaimsforum.net" title="Enter which email will be sending this message."> </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" title="Enter which email will be sending this message.">Cc to yourself

                      </label>
                      <div class="col-md-4">
                        <div class="mt-checkbox-list">
                          <label class="mt-checkbox">
                            <input type="checkbox" name="cc_yourself" value="yes">
                            <span></span>
                          </label>

                        </div>
                      </div>
                    </div>


                  </div>

                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-6 margin-top-20">
                        <button type="submit" class="btn green" title="Click here to save changes.">Send</button>
                      </div>
                    </div>
                  </div>
                <?=$this->Form->end() ?>
              </div>
            </div>

          </div>
          </div>







          <div class="row">

          </div>
          <?=$this->Html->script('users.js', array('inline' => false)); ?>
            <script type="text/javascript">
            $(document).ready(function(){
              var form2 = $('#bulk_email');
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
              "mem_type": {
                required: true
              },
              "subject": {
                required: true
              },
              "from_email": {
                required: true,
                validEmail: true
              },
              "message": {
                required: true,
                minlength: 20
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
            
              //    $('.modal-link').click(function(e) {
              //    var modal = $('#modal'), modalBody = $('#modal .modal-body');
              //
              //    modal
              //        .on('show.bs.modal', function () {
              //            modalBody.load(e.currentTarget.href)
              //        })
              //        .modal();
              //    e.preventDefault();
              //});
            </script>