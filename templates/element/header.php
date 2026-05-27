<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <?php
            	if($loggedIn){
					$goLink	=	($user_type=='admin') ? '/users/recent' : '/dashboard';
				}else{
					$goLink	=	'/users/login';
				}
				
				echo $this->Html->link($this->Html->image('logo-light.png',array('class'=>"logo-default")), $goLink, array('escape' => false));
            ?>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <?php if($loggedIn){ ?>
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <!-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-success"> 0 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                    <i class="fa fa-plus"></i>
                                                </span> New user registered. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <!-- END NOTIFICATION DROPDOWN -->
                    <li class="separator hide"> </li>
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> <?= $fname; ?> </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <!--<img alt="" class="img-circle" src="../assets/layouts/layout4/img/avatar9.jpg" />-->
                            <?php if(empty($loggedUser->avatar)) { ?>
                            <img src="<?= $this->request->webroot.'img/no-profile-img.png'; ?>" class="img-circle" />

                            <?php } else { ?>
                            <img src="<?= $this->request->webroot.'uploads/profile-img/'.h($loggedUser->avatar); ?>" class="img-circle" alt="">
                            <?php } ?>
                            <?php //$this->Html->image('avatar9.jpg',array('class'=>"img-circle"))?>
                        </a>
                            
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <?= $this->Html->link('<i class="icon-user"></i> My Profile',['controller'=>'users','action'=>'profile'],['escape' => false]); ?>
                            </li>
                            <li>
                                <?= $this->Html->link('<i class="icon-key"></i> Log Out',['controller'=>'users','action'=>'logout'],['escape' => false]); ?>
<!--                                <a href="page_user_login_1.html">
                                    <i class="icon-key"></i> Log Out </a>-->
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <?php } ?>
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>