<?php
/**
* @var \App\View\AppView $this
*/
?>

  <?= $this->Form->create(null, array('class' => 'form-horizontal', 'id' => 'book_collegue','novalidate'=>'novalidate')) ?>
    <!--<form action="#" id="form_sample_2" class="form-horizontal" novalidate="novalidate">-->
      <?= $this->Form->hidden('meeting_id', array('value'=>$latest->id)); ?>
        <?= $this->Form->hidden('meeting_title', array('value'=>$latest->title)); ?>
          <?= $this->Form->hidden('meeting_date', array('value'=>date('Y-m-d',strtotime($latest->date)))); ?>
            <div class="form-body">
                <?= $this->Flash->render() ?>
                  <?php if(empty($attendees)) { ?>
                    <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                      <button class="close" data-close="alert"></button> Your form validation is successful!
                    </div>
                    <?= $this->Form->hidden('meeting_id', array('value'=>$latest->id)); ?>
                      <?= $this->Form->hidden('meeting_title', array('value'=>$latest->title)); ?>
                        <?= $this->Form->hidden('meeting_date', array('value'=>date('Y-m-d',strtotime($latest->date)))); ?>
                          <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3" title="Enter your full name.">Name
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('user_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your full name.'))); ?>
                                  <!--<input type="text" class="form-control" name="name" title="Enter your full name."> -->
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your job title.">Company
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('company_name', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Enter your Company.'))); ?>
                                  <!--<input type="text" class="form-control" name="name" title="Enter your Company."> -->
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your company email address. Personal email address will not be accepted.">Email
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">

                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?= $this->Form->text('email', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Corporate Email Only - No Personal Emails'))); ?>
                                    <!--<input type="text" class="form-control" name="email" placeholder="Corporate Email Only - No Personal Emails" title="Enter your company email address. Personal email address will not be accepted."> -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your company telephone number. Personal telephone number will not be accepted.">Phone
                              <span class="required" aria-required="true"> * </span>
                            </label>
                            <div class="col-md-6">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <div class="input-icon right">
                                  <i class="fa"></i>
                                  <?= $this->Form->text('contactno', array('div' =>  false,'class' => 'form-control', 'label' => false,'placeholder'=>__('Corporate Telephone Only - No Personal Telephones'))); ?>
                                    <!--<input type="text" class="form-control" name="digits" placeholder="Corporate Telephone Only - No Personal Telephones" title="Enter your company telephone number. Personal telephone number will not be accepted."> -->
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3">Purchase Order

                            </label>
                            <div class="col-md-6">
                              <div class="input-icon right">
                                <i class="fa"></i>
                                <?= $this->Form->text('purchase_order', array('div' =>  false,'class' => 'form-control', 'label' => false,'title'=>__('If you require a purchase order for your invoice, please provide the details here. Otherwise, leave blank.'))); ?>
                                  <!--<input type="text" class="form-control" name="name" title="If you require a purchase order for your invoice, please provide the details here. Otherwise, leave blank.">-->
                              </div>
                            </div>
                            <div class="col-md-1">
                              <a href="javascript:;" class="tooltips" data-original-title="If you require a purchase order for your invoice, please provide the details here. Otherwise, leave blank.">
                                <i class="fa fa-info-circle font-blue"></i></a>
                            </div>

                          </div>


                          <div class="form-group form-md-radios">
                            <label class="control-label col-md-3">Payment Method</label>
                            <div class="md-radio-list col-md-6">
                              <div class="md-radio">
                                <!--<?=$this->Form->radio('payment_method', ['BACS'],['label' => false,'title'=>'Click to select BACS as payment method.']);?>-->
                                <input type="radio" id="radio1" name="pay_method" class="md-radiobtn" checked="" title="Click to select BACS as payment method." value="bacs">
                                <label for="radio1">
                                  <span class="inc"></span>
                                  <span class="check"></span>
                                  <span class="box"></span> BACS
                                  
                                </label>
                              </div>
                              <div class="md-radio">
                                <!--<?=$this->Form->radio('payment_method', ['Cheque'],['label' => false,'title'=>'Click to select Cheque as payment method.']);?>-->
                                <input type="radio" id="radio2" name="payment_method" class="md-radiobtn" title="Click to select Cheque as payment method." value="cheque">
                                <label for="radio2">
                                  <span class="inc"></span>
                                  <span class="check"></span>
                                  <span class="box"></span> Cheque
                                  
                                </label>

                              </div>


                            </div>

                            <div class="col-md-6 col-md-offset-3">
                              <p> You are confirming that you will be paying the attendance fee below. This is the fee for ONE person. </p>
                              <table class="table table-hover">
                                <tr>
                                  <th> Fee </th>
                                  <th> £
                                    <?=$rsvp_settings->fee?>
                                  </th>
                                </tr>
                              </table>
                            </div>

                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3" title="Enter your address.">Comments/Special Dietary

                            </label>
                            <div class="col-md-6">
                              <?= $this->Form->textarea('comments', array('div' =>  false,'class' => 'form-control', 'label' => false,'title'=>__('Enter any comments you have.'),'placeholder'=>__('Enter any comments you have.'),'rows'=>3)); ?>
                                <!--<textarea class="form-control" name="name" rows="3" title="Enter any comments you have."></textarea>-->
                            </div>
                          </div>


                          <div class="form-actions">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9 margin-top-20">
                                <button type="submit" class="btn green" title="Click to add youself as an attendee.">Add yourself as an attendee</button>

                              </div>
                            </div>
                          </div>
                          <?php } ?>
              </div>
            </form>