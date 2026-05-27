<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>AGM and Constitution
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
        <span class="active">AGM and Constitution</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
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
    <div class="portlet-body" style="display: block">
        <div class="note note-info">
            <!--            <h4 class="bold"> Diploma in Life and Disability Claims </h4>
            <p> The Assurance Medical Society's Diploma in Life and Disability Claims provides official recognition for people who have attained a reasonable standard of proficiency in this subject and is becoming an important asset for those applying for senior posts in this branch of insurance medicine. </p>
            <p> The award of the diploma is based upon the following criteria:
            <ul>
                <li> to have passed certain prescribed Chartered Insurance Institute (CII) examinations; </li>
                <li> to provide evidence of reasonable experience in various aspects of life and disability claims assessment; </li>
                <li> to satisfy the AMS that a satisfactory degree of expertise in this subject has been achieved.to satisfy the AMS that a satisfactory degree of expertise in this subject has been achieved. </li>
            </ul>
            </p>
            <p> The exact details of these requirements varies with the standing of the applicant in the Chartered Insurance Institute. </p>
            <p> Please <a href="<?= $this->request->webroot . 'uploads/misc-docs/Claims-Diploma-form-revised-criteria-March-2010.doc' ?>">click here</a> for further details of the Diploma in Life and Disability Claims or visit the <a href="http://www.cii.co.uk/" target="_blank">Chartered Insurance Institute (CII)</a> website. </p>
            <p> If you have completed the qualifying requirement and wish to apply for the Diploma in Life and Disability Claims please complete <a href="<?= $this->request->webroot . 'uploads/misc-docs/Application_Form_for_Claims_Diploma.doc' ?>">this form</a>. </p>
            -->
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#portlet_tab1" data-toggle="tab"> AGM and Constitution </a>
            </li>
            <li>
                <a href="#portlet_tab2" data-toggle="tab"> Archived </a>
            </li>
        </ul>
    </div>
    <div class="portlet-body">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
                <h3> AGM and Constitution </h3>
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead class="blue">
                            <tr>
                                <th width="50%"> Title </th>
                                <th width="30%"> Date Published </th>
                                <?php if ($userRole == "superadmin"): ?>
                                    <th width="20%"> Actions </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documents as $document): ?>
                                <tr>
                                    <td> <a href="<?= $this->request->webroot . 'uploads/documents/' . h($document->file); ?>"><i class="fa fa-file-text-o"></i> <?= h($document->title) ?> </a> </td>
                                    <td><?= h($document->close_date) ?></td>
                                    <?php if ($userRole == "superadmin"): ?>
                                        <td align="center">
                                            <a href="javascript:void(0);" class="edit-item" data-edit-url="documents/edit/" data-edit-id="<?= h($document->dId) ?>" title="Edit Document"><i class="fa fa-edit"></i></a>&nbsp;
                                            <a href="javascript:deleteItem('documents/delete/', <?= h($document->dId) ?>)" data-toggle="confirmation" data-original-title="Are you sure you want to delete this document?"><i class="fa fa-times" title="Delete Document"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-7">
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
                </div>
            </div>
            <div class="tab-pane" id="portlet_tab2">
                <h4> Archived Files </h4>
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead class="blue">
                            <tr>
                                <th> Title </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($archived as $document2): ?>
                                <tr>
                                    <td> <a href="<?= $this->request->webroot . 'uploads/documents/' . h($document2->file); ?>"><i class="fa fa-file-text-o"></i> <?= h($document2->title) ?> </a> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if(empty($document2)): ?>
                    <p> No Documents found in Archive </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->

<!-- begin modal -->
<div id="edit" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit Document</h4>
            </div>

            <div class="modal-body">
                <?= $this->Html->image('components/ajax-modal-loading.gif', array('class' => "align-center")) ?>
            </div>
            <div class="modal-footer margin-top-20">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END modal -->

<script type="text/javascript">
    var form2 = $('#add_form');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    var handleValidation2 = function () {
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
                "file": {
                    required: true
                },
                "close_date": {
                    required: false
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -100);
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parents('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({
                    'container': 'body'
                });
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
            },
            success: function (label, element) {
                var icon = $(element).parents('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },
            submitHandler: function (form) {
                form2[0].submit(); // submit the form
            }
        });
    }
    $(document).ready(function () {
        handleValidation2();
    });
</script>