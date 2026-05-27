<?php
$cakeDescription = 'HCF';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?> | <?= $title ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>-->
        
        <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
        <?= $this->Html->css('simple-line-icons/simple-line-icons.min.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <?= $this->Html->css('bootstrap-fileinput.css') ?>
        <?= $this->Html->css('components.min.css') ?>
        <?= $this->Html->css('plugins.min.css') ?>
        <?= $this->Html->css('profile.min.css') ?>
        <?= $this->Html->css('typeahead.css') ?>
        <?= $this->Html->css('layout.min.css') ?>
        <?= $this->Html->css('default.min.css') ?>
        <?= $this->Html->css('custom.min.css') ?>
        <?= $this->Html->css('login.min.css') ?>
        <?= $this->Html->css('select2.min.css') ?>
        <?= $this->Html->css('select2-bootstrap.min.css') ?>
        <?= $this->Html->css('summernote/summernote.css') ?>
        <?= $this->Html->css('custom.css') ?>
        
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        
        <?php echo $this->Html->script('jquery.min.js', array('inline' => false)); ?>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!--<link href="../assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />-->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
<!--        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />        -->
        <!-- STYLE OVERRIDES -->
        <style type="text/css">
            .note p {margin: 10px;}
            .form-sub-title {margin-left:30px;font-weight:600;}
        </style>
        <!-- END STYLE OVERRIDES -->
        <!-- END PAGE LEVEL PLUGINS -->


    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <?php echo $this->element('header'); ?>

        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php echo $this->element('sidebar-left'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
                    <?= $this->fetch('content') ?>
                </div><!-- END CONTENT -->
            </div><!-- CONTENT-WRAPPER-->
        </div><!-- END PAGE CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $this->element('footer'); ?>
        <!-- END FOOTER -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
            var BASE_PATH = '<?=$this->Url->build("/", true);?>';
        </script>
        
        <?=$this->Html->script('bootstrap.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('bootstrap-fileinput.js', array('inline' => false)); ?>
        <?=$this->Html->script('bootstrap-confirmation.min.js', array('inline' => false)); ?>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
        <?=$this->Html->script('jquery.slimscroll.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('app.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('typeahead.bundle.js', array('inline' => false)); ?>
        
        <?=$this->Html->script('jquery.validate.min.js', array('inline' => false)); ?> 
        <?=$this->Html->script('additional-methods.min.js', array('inline' => false)); ?> 
        <?=$this->Html->script('select2.full.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('quick-sidebar.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('quick-nav.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('layout.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('pwstrength-bootstrap.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('purl.js', array('inline' => false)); ?>
        <?=$this->Html->script('URI.min.js', array('inline' => false)); ?>
        <?=$this->Html->script('summernote/summernote.min.js', array('inline' => false)); ?>
        <?php if($custom_js) echo $this->Html->script('custom.js', array('inline' => false));  ?>
        <?= $this->fetch('script') ?>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>