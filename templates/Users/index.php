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
        <h1>Welcome User

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
        <span class="active">User</span>
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
            <span class="caption-subject font-dark bold uppercase">Recently Registered Users</span>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#portlet tab1" data-toggle="tab">Members pending: 0</a></li>
        </ul>	
    </div>



    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
                <!-- BEGIN TABLE -->
                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="dataTables_length" id="sample_1_length">
                                <label>Show &nbsp; 
                                    <select name="sample_length_1" aria-controls="sample_1" class="form-control input-sm input-xsm input-inline">
                                        <option value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="-1">All</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div id="sample_1_filter" class="dataTables-filter">
                                <label>Search:
                                    <input class="form-control input-sm input-inline" placeholder="" aria-controls="sample_1" type="search">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="      " style="width: 75px;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input class="group-checkable" data-set="#sample_1.checkboxes" type="checkbox">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Name : activate to sort column descending" style="width:172px;"> Name </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Company : activate to sort column ascending" style="width:258px;"> Company </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Registered: activate to sort column ascending" style="width:139px;"> Registered </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Status: activate to sort column ascending" style="width:139px;"> Status </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Actions: activate to sort column ascending" style="width:139px;"> Actions </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($users as $key => $user): ?>
                                    <tr class="gradeX <?= $key % 2 == 0 ? 'odd' : 'even' ?>" role="row">
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input class="checkboxes" value="1" type="checkbox">
                                                <span></span>
                                            </label>
                                        </td> 
                                        <!--<td><?= $this->Number->format($user->id) ?></td>-->
                                        <td><?= h($user->first_name) ?> <?= h($user->last_name) ?></td>
                                        <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
                                        <td><?= h($user->created) ?></td>
                                        <td>
                                            <?php if (!$user->status) { ?>
                                                <a href="" title="activate user"><i class="fa fa-clock-o"></i>&nbsp;Pending</a>
                                            <?php } else { ?>
                                                <i class="fa fa-check font-green"></i
                                            <?php } ?>

                                        </td>
                                        <td>
                                <center>
                                    <a class="edit-user" href="javascript:void(0);" title="edit user" data-user-id="<?= $user->id; ?>"><i class="fa fa-edit"></i></a>&nbsp;
                                    <a href="" title="" data-toggle="confirmation" data-original-title="Are you sure you want to delete user?"><i class="fa fa-user-times">&nbsp;</i></a>
                                    <!-- <a href=""><i class="fa fa-lock">&nbsp;</i></a> -->
                                    <a data-toggle="modal" href="#email" title="message user"><i class="fa fa-envelope-o"></i></a></center>
                                <!--                            
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                -->
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
                    </div>

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
<!--                                    <form action="#" class="form-horizontal" id="form_sample_1" novalidate="novalidate">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">User ID

                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" placeholder="" name="name" type="text">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your userid</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Password

                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" placeholder="" name="password" type="text">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">if you do no want to change password then leave blank</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">First Name

                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" placeholder="" name="name" type="text">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your first name</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Last Name

                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" placeholder="" name="name" type="text">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your last name</span>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Phone

                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-icon">
                                                        <input class="form-control" placeholder="05555 555555" name="digits" type="text">
                                                        <div class="form-control-focus"> </div>
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Email</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        <input class="form-control" name="email2" placeholder="example@email.com" type="text">
                                                        <div class="form-control-focus"> </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Address</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address" rows="3"></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Company</label>
                                                <div class="col-md-9">
                                                    <select class="form-control">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-checkboxes">
                                                <label class="col-md-3 control-label" for="form_control_1">Rep Member</label>
                                                <div class="col-md-9">
                                                    <div class="md-checkbox-list">
                                                        <div class="md-checkbox">
                                                            <input name="checkboxes1[]" value="1" id="checkbox1_1" class="md-check" type="checkbox">
                                                            <label for="checkbox1_1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Job Title

                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" placeholder="" name="jobtitle" type="text">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your job title</span>
                                                </div>
                                            </div>



                                        </div>
                                        <br><br>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Send Account Info</button>
                                                    <br><p><i class="fa fa-info-circle"></i> <font size="1">Will generate a password and email user</font></p>
                                                    <button type="submit" class="btn green">Update User Info</button>
                                                    <button type="reset" class="btn default">Clear All</button>

                                                </div>
                                            </div>
                                        </div>

                                    </form>-->
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
                                    <!-- form -->
                                    <form action="#" class="form-horizontal" id="form_sample_1" novalidate="novalidate">
                                        <div class="form-body">
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button> You have some errors. Please check below. </div>
                                            <div class="alert alert-success">
                                                <button class="close" data-close="alert"></button> Your email has been sent! </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Subject

                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" placeholder="" name="subject" type="text">
                                                    <div class="form-control-focus"> </div>

                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Message Text</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="message" rows="3"></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>






                                        </div>
                                        <br><br>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Send</button>


                                                </div>
                                            </div>
                                        </div>

                                    </form>


                                    <!-- form -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END modal -->



                </div>
                <!-- END TABLE -->

                <br>

                <div class="form-group" style="width: 150px;">
                    <select id="single" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option>Choose an action...</option>
                        <option value="Delete">Delete Account</option>
                        <option value="Activate">Activate</option>

                    </select>

                </div>			


                <a href="javascript:;" class="btn default green-stripe">Apply
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>



            </div>
        </div>

    </div>
</div>







<div class="row">

</div>
<script type="text/javascript">
    
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
    
    
$(document).ready(function(){
    userID = 0;
    var modal = $('#long'), modalBody = $('#long .modal-body');
    modal.on('show.bs.modal', function () {
            modalBody.load();
//    alert('<?=$this->Url->build(["controller" => "Users","action" => "view/"], true);?>/'+userID);
            modalBody.load('<?=$this->Url->build(["controller" => "Users","action" => "edit"], true);?>/'+userID);
        });
        modal.on('hidden.bs.modal', function () {
            modalBody.html('<?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>');
        });
    $('.edit-user').on('click',function(e){
        userID = $(this).data('user-id');
        modal.modal();
        
    e.preventDefault();
    });
    
//    $('#long').on('loaded', function () {
//        alert(1);
//        alert($($this).data('user-id'));
////        $.ajax({
////            method: "GET",
////            url: "<?=$this->Url->build([
                        "controller" => "Users",
                        "action" => "view",
//                        "slug" => userID,
//                        "?" => ["foo" => "bar"],
//                        "#" => "first"
                            ], true);
//                    $this->Html->link(__('View'), ['action' => 'view', $user->id])
                    ?>////",
////            dataType: "json"
////        }).success(function (result) {
////            console.log(result);
////            alert('done');
//////                $.validator.unobtrusive.parse($(this));
////        });
//
//
////    alert( "Data Saved: " + msg );
//    });
});
    
    ;
</script>









<!-- took out profile sidebar here -->
<!-- took out profile content here -->








<!--<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>

                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>

                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($users as $user): ?>
                    <tr>
                        
                        <td><?= h($user->first_name) ?></td>
                        <td><?= h($user->last_name) ?></td>
        
                        <td><?= h($user->created) ?></td>
                        <td><?= h($user->job_title) ?></td>
                        <td><?= h($user->tel) ?></td>
                        <td><?= h($user->email) ?></td>
        
                        <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
                        <td class="actions">
    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    
</div>-->
