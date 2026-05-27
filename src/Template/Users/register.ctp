
<div class="note note-info">
    <h4 class="block">HCF Registration Form</h4>
    <p>Please register as an individual user to access the site. You will be sent a username and password via email. If your company is not registered with us you will not be able to complete the following registration form.</p>
    <p>To access the members area of our website your Company needs to be a registered member and to have paid the applicable annual subscription fee. If your Company is not registered, or you have any queries regarding registeration, please contact our Membership Officer ( ktarrant@scor.com).</p>
    <p>Please provide the following details:</p>
    <ol>
        <li>Your Company name</li>
        <li>Contact information for a Company representative (email, telephone number, address and job title)</li>
        <li>A brief outline of the services provided by your Company and how this relates to the management of life, health and disability claims.</li>
    </ol>
    <p>Please advise whether you are applying for Full membership (available for Insurers and Reinsurers) or Associate membership (available to individuals, firms and companies which work with our member firms). To be considered for associate membership a full member firm must support the application. Please provide the name of an appropriate refree / recommendations in support of your application where appropriate.</p>
    <p>
        If you're having difficulty registering your details, please <a href="http://healthclaimsforum.net/new/contact-us/" target="_blank" title="Contact HCF">contact us</a>.
        <!--Please <?//= $this->Html->link('Contact Us', ['controller' => 'Contacts', 'action' => 'add'], ['escape' => false, 'target'=>'_blank']); ?> if you're having difficulty registering your details.
        -->
    </p>
</div>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Actions</li>
        <li><a href="/hcf2/users">List Users</a></li>
        <li><a href="/hcf2/companies">List Companies</a></li>
        <li><a href="/hcf2/companies/add">New Company</a></li>
    </ul>
</nav>-->
<!--<div class="users form large-9 medium-8 columns content">-->
<div class="row"><!-- BEGIN REGISTRATION FORM ROW BLOCK-->
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Registration</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <h4 class="form-sub-title">Main user details</h4>
                <?= $this->Form->create($user, ['class' => 'form-horizontal', 'id' => 'registration_form', 'novalidate' => 'novalidate']) ?>
                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>                
                <div class="form-body">
                    <?= $this->Flash->render() ?>
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="form-group  margin-top-20">
                        <label class="control-label col-md-3">Company
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('company_id', ['options' => $companies, 'label' => false, 'class' => 'form-control','default'=>'','empty' => ' ']); ?>
                                <?php //$this->Form->input('company',array('type'=>'text','class'=>'form-control tt-input','label'=>false,'placeholder'=>'Look up your company')); ?>
                                <span class="help-block"> Enter the first two letters of your company name and then choose your company name </span>
                            </div>
                            <!--                                <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <span class="twitter-typeahead" style="position: relative; display: inline-block;">
                                                                    <input class="form-control tt-hint" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: rgb(255, 255, 255) none repeat scroll 0% 0%;" readonly="" autocomplete="off" spellcheck="false" tabindex="-1" dir="ltr" type="text">
                                                                    <input class="form-control tt-input" id="typeahead_example_1" name="company" placeholder="Look up your company" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;" type="text">
                                                                    <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre>
                                                                    <div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
                                                                        <div class="tt-dataset tt-dataset-0"></div>
                                                                    </div>
                                                                </span>
                                                                <span class="help-block"> Enter the first two letters of your company name and then choose your company name </span>
                                                            </div>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Firstname
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('first_name', array('type' => 'text', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Lastname
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('last_name', array('type' => 'text', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Job title
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('job_title', array('type' => 'text', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>                                           
                    <div class="form-group">
                        <label class="control-label col-md-3">Tel
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('tel', array('type' => 'text', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>                                                                                                                                   
                    <div class="form-group">
                        <label class="control-label col-md-3">Email
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('email', array('type' => 'email', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="control-label col-md-3">Password
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-md-3">Address
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->input('address', array('type' => 'textarea', 'class' => 'form-control', 'label' => false)); ?>
                                <!--<textarea class="form-control" rows="5" name="address"></textarea>-->
                            </div>
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="control-label col-md-3">I have read and accept the T&C
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input type="checkbox" value="1" name="tandc" required> <a target="_BLANK" href="http://healthclaimsforum.net/new/privacy_statement/">Terms & Conditions</>
                                <!--<textarea class="form-control" rows="5" name="address"></textarea>-->
                            </div>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-md-offset-3  col-md-4">
                            <div class="g-recaptcha" data-sitekey="6LcDIxYUAAAAAA_NRgtnjoIsvgZ8N99QDbgXmmJM"></div>
                            <!--<div class="help-block"><a href="http://www.google.com/recaptcha" target="_blank"> Learn more about Google reCaptcha</a>
                            </div>-->
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn green']) ?>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
                <?= $this->Form->end() ?>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div><!-- END col-md-12 -->
</div><!-- BEGIN REGISTRATION FORM ROW BLOCK-->
<!--</div>-->
<?php //$this->Html->script('login.min.js', array('inline' => false)); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    $(document).ready(function () {
        //$("#company-id").select2();
        function matchStart (term, text) {
            if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                return true;
            }
            return false;
        }
      $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
        $("#company-id").select2({
          matcher: oldMatcher(matchStart)
        })
      });
        var handleValidation2 = function () {
            // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var form2 = $('#registration_form');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);
            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    "company_id": {
                        required: true
                    },
                    "first_name": {
                        minlength: 2,
                        required: true
                    },
                    "last_name": {
                        minlength: 2,
                        required: true,
                    },
                    "job_title": {
                        required: true,
                    },
                    "tel": {
                        required: true,
                        number: true
                    },
                    "email": {
                        required: true,
                        validEmail: true
                    },
//                    "password": {
//                        required: true,
//                    },
                    "address": {
                        minlength: 10,
                        required: true,
                    },
                    "g-recaptcha-response":{
                        required: true
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
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
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
                    success2.show();
                    error2.hide();
                    form[0].submit(); // submit the form
                }
            });
        }
        handleValidation2();
        $('#company-id').on('change',function(){
            //alert($(this).val());
            if($(this).val()>0){
                var icon = $(this).parents('.input-icon').children('i');
                $(this).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
                icon.attr("data-original-title", '');
                $("#company-id option[value='']").remove();
            } else {
                var icon = $(this).parents('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");
                    $(this).closest('.form-group').removeClass("has-success").addClass('has-error');
                    icon.attr("data-original-title", 'This field is required').tooltip({'container': 'body'});
            }
        });
        // Typeahead
//  $('#company').typeahead({
//      hint: true,
//    order: "desc",
//    display: "name", // Typeahead will search through "name" object property
//    source: {
//      data: [{
//        id: 1,
//        name: "Afghanistan"
//        }, {
//        id: 2,
//        name: "Albania"
//        }
//      ]
//    },
//    callback: {
//      onInit: function(node) {
//        console.log('Typeahead Initiated on ' + node.selector);
//      },
//    onClick: function (node, a, obj, e) {               
//          $('#company-id').val(obj.display);
//          //$('#city_list-query').select();
//        }
//    }
//  });
//    });
//    $(document).ready(function(){
//        var substringMatcher = function (strs) {
//            return function findMatches(q, cb) {
//                var matches, substringRegex;
//
//                // an array that will be populated with substring matches
//                matches = [];
//
//                // regex used to determine if a string contains the substring `q`
//                substrRegex = new RegExp(q, 'i');
//
//                // iterate through the pool of strings and for any string that
//                // contains the substring `q`, add it to the `matches` array
//                $.each(strs, function (i, str) {
//                    if (substrRegex.test(str)) {
//                        matches.push(str);
//                    }
//                });
//
//                cb(matches);
//            };
//        };
//
//        var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
//            'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
//            'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
//            'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
//            'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
//            'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
//            'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
//            'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
//            'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
//        ];
//        $('#company').typeahead({
//            hint: true,
//            highlight: true,
//            minLength: 2
//        },
//                {
//                    name: 'states',
//                    source: substringMatcher(states)
//                });
    });
</script>
