<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php if (!$loggedIn) { ?>
                <li class="nav-item start open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Members</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu" style="display: block;">

                        <li class="nav-item start ">
                            <?=
                            $this->Html->link('<i class="icon-note"></i><span class="title">Login</span>', ['controller' => 'users', 'action' => 'login'], array('class' => 'nav-link', 'escape' => false)
                            );
                            ?>
                            <!--                        <a href="index.html" class="nav-link ">
                                                        <i class="icon-note"></i>
                                                        <span class="title">Login</span>
                                                    </a>-->
                        </li>
                        <li class="nav-item start ">
                            <?=
                            $this->Html->link('<i class="icon-user-following"></i><span class="title">Register</span>', ['controller' => 'users', 'action' => 'register'], array('class' => 'nav-link', 'escape' => false)
                            );
                            ?>
                            <!--                        <a href="dashboard_2.html" class="nav-link ">
                                                        <i class="icon-user-following"></i>
                                                        <span class="title">Register</span>
                                                    </a>-->
                        </li>
                    </ul>
                </li>
            <?php } 
            else if($user_type=='admin' || $user_type=='superadmin') { ?>
                
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                     <?=
                                        $this->Html->link('<span class="title">Bulletin</span>', 
                                        ['controller' => 'Bulletins', 'action' => 'update'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                    <!--<a href="bulletin.php" class="nav-link ">
                                        <i class="icon-note"></i>
                                        <span class="title">Bulletin</span>
                                    </a>-->
                                </li>
                                <li class="nav-item start ">
                                <?php if($pending_member_count>0){ $pm_count = '<span class="badge badge-info">'.$pending_member_count.'</span>'; } else $pm_count = ''; ?>
                                    <?=
                                        $this->Html->link('<span class="title">New Registrations</span>'.$pm_count, 
                                        ['controller' => 'Users', 'action' => 'recent'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                    <!--<a href="dashboard-admins.php" class="nav-link ">
                                        <i class="icon-user-following"></i>
                                        <span class="title">New Registrations</span>
                                        <span class="badge badge-success">1</span>
                                    </a>-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Admins</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <?php if($user_type=='superadmin') {
										echo $this->Html->link('<span class="title">View/Manage Admins</span>',
										['controller'=>'users','action'=>'admin'],
										array('class' => 'nav-link', 'escape' => false));
                                    }
									?>
                                </li>
                                <li class="nav-item  ">
									<?= 
										$this->Html->link('<span class="title">My Details</span>',
										['controller'=>'users','action'=>'profile'],
										array('class' => 'nav-link', 'escape' => false));
									?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Companies</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <?= 
										$this->Html->link('<span class="title">View/Manage Companies</span>',
										['controller'=>'companies','action'=>'admin'],
										array('class' => 'nav-link', 'escape' => false));
									?>
                                    <!--<a href="companies-viewmanage.php" class="nav-link ">
                                        <span class="title">View/Manage Companies</span>
                                    </a>-->
                                </li>
                                <li class="nav-item  ">
                                    <?= 
										$this->Html->link('<span class="title">Recruitment</span>',
										['controller'=>'recruitments','action'=>'admin'],
										array('class' => 'nav-link', 'escape' => false));
									?>
                                </li>
                                <li class="nav-item  ">
                                    <?= 
										$this->Html->link('<span class="title">Subscriptions</span>',
										['controller'=>'SubscriptionInvoice','action'=>'index'],
										array('class' => 'nav-link', 'escape' => false));
									?>
                                    <!--<a href="companies-subscriptions.php" class="nav-link ">
                                        <span class="title">Subscriptions</span>
                                    </a>-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Members</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">View/Manage Members</span>', 
                                        ['controller' => 'Users', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                    <!--<a href="members-viewmanage.php" class="nav-link ">
                                        <span class="title">View/Manage Members</span>
                                    </a>-->
                                </li>
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">Rep Members</span>', 
                                        ['controller' => 'Users', 'action' => 'rep'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                    <!--<a href="members-reps.php" class="nav-link ">
                                        <span class="title">Rep Members</span>
                                    </a>-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <?=
                                $this->Html->link('<i class="fa fa-newspaper-o"></i> <span class="title">&nbsp;Newsletters</span>', 
                                ['controller' => 'Newsletters', 'action' => 'admin'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                            
                        </li>
                        <li class="nav-item  " id='meeting'>
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Meetings</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" id='meet'>
                        	
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">View/Manage Meetings</span>', 
                                        ['controller' => 'Meetings', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>

                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">Attendees</span>', 
                                        ['controller' => 'Attendees', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">RSVP</span>', 
                                        ['controller' => 'RsvpSettings', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">Meeting Invoices</span>', 
                                        ['controller' => 'InvoiceDetails', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                    <!--<a href="meetings-invoices.php" class="nav-link ">
                                        <span class="title">Meeting Invoices</span>
                                    </a>-->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Helpful information</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <!--<a href="helpfulinfo-documents.php" class="nav-link ">
                                        <span class="title">Documents</span>
                                    </a>-->
                                    <?=
                                        $this->Html->link('<span class="title">Documents</span>', 
                                        ['controller' => 'Documents', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">Web Links</span>', 
                                        ['controller' => 'Weblinks', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>
                                <li class="nav-item  ">
                                    <?=
                                        $this->Html->link('<span class="title">Ads</span>', 
                                        ['controller' => 'Ads', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Email Templates</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <!--<a href="emailtemplates-manage.php" class="nav-link ">
                                        <span class="title">Manage</span>
                                    </a>-->
                                    <?=
                                        $this->Html->link('<span class="title">Manage</span>', 
                                        ['controller' => 'EmailTemplates', 'action' => 'index'], 
                                        array('class' => 'nav-link', 'escape' => false));
                                    ?>
                                </li>
                                <!--<li class="nav-item  ">
                                    <a href="emailtemplates-help.php" class="nav-link ">
                                        <span class="title">Help</span>
                                    </a>
                                </li>-->
                            </ul>
                        </li>
                    
            <?php
            }
            else { ?>
                <li class="nav-item start ">
                    <?=
                    $this->Html->link('<i class="icon-home"></i><span class="title">Home</span>', ['controller' => 'dashboard', 'action' => 'index'], array('class' => 'nav-link', 'escape' => false)
                    );
                    ?>
                </li>
                <li class="nav-item" id="meetings">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-bulb"></i>
                        <span class="title">Meetings</span>
                        <span class="arrow" id="meetings-arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item " id="nextmeeting">
                            <?=
                                $this->Html->link('<span class="title">Next Meeting</span>', 
                                ['controller' => 'Meetings', 'action' => 'nextMeeting'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item " id="pastmeeting">
                            <?=
                                $this->Html->link('<span class="title">Past Meetings</span>', 
                                ['controller' => 'Meetings', 'action' => 'pastMeetings'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
<li class="nav-item " id="pastmeetingssep">
                            <?=
                                $this->Html->link('<span class="title">Past Meetings Before sep 2017</span>', 
                                ['controller' => 'Meetings', 'action' => 'pastMeetingsSep'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item  " id="yourmeetinghistory">
                            <?=
                                $this->Html->link('<span class="title">Your Meeting History</span>', 
                                ['controller' => 'Meetings', 'action' => 'meetingsHistory'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>


                    </ul>
                </li>
                <li class="nav-item  " id="helpfulinfo">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">Helpful information</span>
                        <span class="arrow" id="helpfulinfo-arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  " id="usefulinfo">
                            <?=
                                $this->Html->link('<span class="title">Useful Information</span>', 
                                ['controller' => 'Documents', 'action' => 'usefulInformation'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item  " id="claimsdiploma">
                            <?=
                                $this->Html->link('<span class="title">AGM and Constitution</span>', 
                                ['controller' => 'Documents', 'action' => 'agmAndConstitution'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item  " id="newsletters">
                            <?=
                                $this->Html->link('<span class="title">Newsletters</span>', 
                                ['controller' => 'Newsletters', 'action' => 'index'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item  " id="weblinks">
                            <?=
                                $this->Html->link('<span class="title">Web Links</span>', 
                                ['controller' => 'Weblinks', 'action' => 'index'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item  " id="serviceproviders">
                            <?=
                                $this->Html->link('<span class="title">Service Providers</span>', 
                                ['controller' => 'ServiceProviders', 'action' => 'index'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                        <li class="nav-item  " id="members">
                            <?=
                                $this->Html->link('<span class="title">Members</span>', 
                                ['controller' => 'Companies', 'action' => 'index'], 
                                array('class' => 'nav-link', 'escape' => false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  " id="recruitment">
                    <?=
                        $this->Html->link('<i class="icon-users"></i><span class="title">Recruitment</span>', 
                        ['controller' => 'Recruitments', 'action' => 'index'], 
                        array('class' => 'nav-link', 'escape' => false));
                    ?>
                </li> 
                <li class="nav-item  " id="contactus">
                    <?=
                        $this->Html->link('<i class="fa fa-envelope-o"></i><span class="title">&nbsp; Contact Us</span>', 
                        ['controller' => 'Contacts', 'action' => 'add'], 
                        array('class' => 'nav-link', 'escape' => false));
                    ?>
                </li>
                <li class="nav-item  " id="myaccount">
                    <?=
                        $this->Html->link('<i class="icon-wallet"></i><span class="title">My Account</span>', 
                        ['controller' => 'Users', 'action' => 'profile'], 
                        array('class' => 'nav-link', 'escape' => false));
                    ?>
                </li>
            <?php } ?>
        </ul>


        <!-- END SIDEBAR MENU -->
    </div><!-- END SIDEBAR WARAPPER -->
    <!-- END SIDEBAR -->
</div>