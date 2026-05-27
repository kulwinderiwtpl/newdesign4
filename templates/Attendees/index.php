<?php
/**
* @var \App\View\AppView $this
*/
?>
  <?php
/**
* @var \App\View\AppView $this
*/
?>

    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1><?=$title?></h1>
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
      <div class="portlet-body" style="display: none">
        <!--<a href="javascript:;" class="icon-btn">
          <img class="blue-dark" src="images/badge-2.svg">
          <div class="caption-subject font-green bold uppercase"> Badges - Full </div>
        </a>-->
        <?=$this->Html->link($this->Html->image('badge.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Badges - Full </div>',['action' => 'getBadge',$latest_meeting->id,'full'],array('escape' => false,'class'=>'users icon-btn','target'=>'_blank')) ?>
        <!--<a href="javascript:;" class="icon-btn">
          <img src="images/badge-2.svg">
          <div class="caption-subject font-green bold uppercase"> Badges - Associate </div>
        </a>-->
        <?=$this->Html->link($this->Html->image('badge.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Badges - Associate </div>',['action' => 'getBadge',$latest_meeting->id,'associate'],array('escape' => false,'class'=>'users icon-btn','target'=>'_blank')) ?>
        <!--<a href="javascript:;" class="icon-btn">
          <img src="images/badge-2.svg">
          <div class="caption-subject font-green bold uppercase"> Badges - Speakers </div>
        </a>-->
        <?=$this->Html->link($this->Html->image('badge.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Badges - Speakers </div>',['action' => 'getBadgeCom',$latest_meeting->id,'Speaker'],array('escape' => false,'class'=>'users icon-btn', 'target'=>'_blank')) ?>

        <!--<a href="javascript:;" class="icon-btn">
          <img src="images/badge-2.svg">
          <div class="caption-subject font-green bold uppercase"> Badges - Committee </div>
        </a>-->
        <?=$this->Html->link($this->Html->image('badge.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Badges - Committee </div>',['action' => 'getBadgeCom',$latest_meeting->id,'Committee'],array('escape' => false,'class'=>'users icon-btn','target'=>'_blank')) ?>
        <!--<a href="javascript:;" class="icon-btn">
          <img src="images/excel.svg">
          <div class="caption-subject font-green bold uppercase"> Attendees - Excel </div>
        </a>-->
        <?=$this->Html->link($this->Html->image('excel.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Attendees - Excel </div>',['action' => 'exportAttendees',$latest_meeting->id,'excel'],array('escape' => false,'class'=>'users icon-btn','target'=>'_blank')) ?>
        <!--<a href="javascript:;" class="icon-btn">
          <img src="images/pdf.svg">
          <div class="caption-subject font-green bold uppercase"> Attendees - PDF </div>
        </a>-->
        <?=$this->Html->link($this->Html->image('pdf.svg',['class'=>['blue-dark']]).'<div class="caption-subject font-green bold uppercase"> Attendees - PDF </div>',['action' => 'exportAttendees',$latest_meeting->id,'pdf'],array('escape' => false,'class'=>'users icon-btn','target'=>'_blank')) ?>


      </div>
    </div>

    <div class="portlet light bordered">
      <div class="portlet-title tabbable-line">
        <div class="caption">
          <i class="icon-share font-dark"></i>
          <span class="caption-subject font-dark bold uppercase">ATTENDEES</span>
        </div>
        <ul class="nav nav-tabs">
          <li class="active">
            <!--<a href="#portlet_tab1" data-toggle="tab">News Archive </a>-->
            <?php //print_r($latest_attendees);
            $total_rsvps=0;
            foreach($latest_attendees as $attendees){
                
               $total_rsvps++;
            }
            $associated=0;
            $full=0;
            if(!empty($company_mem_status)){
            foreach($company_mem_status as $status){
              // print_r($status);
               foreach($status as $stat){
           if($stat['mem_type']=="Associated"){
               $associated++;
            
            }elseif($stat['mem_type']=="Full"){
                $full++;
                
            }
               }
            }
            }
            ?>
            <a href="#portlet_tab1" data-toggle="tab">
              <b>Next Meeting:  </b> Total RSVP's
              <span class="badge badge-info"> <?php echo $total_rsvps; ?> </span> Full Members
              <span class="badge badge-info"> <?php echo $full; ?> </span> Associate
              <span class="badge badge-info"> <?php echo $associated; ?>  </span>
            </a>
          </li>
          <li>
            <a href="#portlet_tab2" data-toggle="tab"> Previous Meetings</a>
          </li>
        </ul>
      </div>
      <div class="portlet-body">
        <?= $this->Flash->render() ?>
          <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">
              <h4 class="block"> <?=$latest_meeting->title?> - <?=$latest_meeting->date->format('d-m-Y')?> </h4>
              <p> Attendees with (*) next to their name are Additional's </p>
              <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action','novalidate'=>'novalidate')) ?>
                

                <div class="btn-group btn-right">
                  <a href="javascript:void(0);" data-add-url="attendees/add" class="add-item btn sbold green">
                  Add Attendee <i class="fa fa-plus"></i>
                  </a>
                </div>
                <div class="table-scrollable">
                  <table class="table table-striped searchable table-bordered table-hover dataTable order-column no-footer" id="list" role="grid" aria-="" describedby="sample_1_info">
                    <thead>
                      <tr role="row">
                        
                        <th width="20%">First Name </th>
                        <th width="20%">Last Name </th>
                        <th> Company </th>
                        <th> RSVP'd </th>
                        <th> Payment </th>
                        <th>Attended</th>
                        <th> Actions </th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($latest_attendees as $key=>$item): ?>
                        <tr id="row_<?=$item->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                          
                          <td>
                            <?= ($item->additionals!=0)?'* '.$item->user_name:$item->user_name ?>
                          </td>
                          <td>
                           <?= $item->last_name ?>
                          </td>
                          <td>
                            <?= ($item->type==='nonmember')?$item->companytext:$item->company['name']?>
                          </td>
                          <td>
                            <?= $item->date->format('d-m-Y') ?>
                          </td>
                          <td>
                            £
                            <?= $item->fee ?>
                          </td>

                          <td>
                            <?='<a href="javascript:void(0);" class="meeting-attended" data-id="'.$item->id.'" data-attended="'.(($item->attended)=='y'?'n':'y').'" title="'.(($item->attended)=='y'?'Mark as Not Attended':'Mark as Attended').'"><i class="fa '.(($item->attended)=='y'?'fa-check font-green':'fa-clock-o').'"></i></a>'?>
                          </td>
                          <td align="center">
                            <a href="javascript:void(0);" class="edit-item" data-edit-id="<?=$item->id?>" data-edit-url="attendees/edit/" title="Edit Attendee"><i class="fa fa-edit"></i></a>&nbsp;
                            <a href="javascript:deleteItem('attendees/delete/',<?= h($item->id) ?>)" title="" data-toggle="confirmation" data-original-title="Are you sure you want to delete the attendee?"><i class="fa fa-times">&nbsp;</i></a>

                          </td>


                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                
                <?=$this->Form->end(); ?>
            </div>
            <div class="tab-pane" id="portlet_tab2">
              
              <?= $this->Form->create(null, array('url' => ['action' => 'bulkAction'],'class' => 'form-horizontal', 'id' => 'bulk_action','novalidate'=>'novalidate')) ?>
                

                
                <div class="table-scrollable">
                  <table class="table table-striped searchable table-bordered table-hover dataTable order-column no-footer" id="list" role="grid" aria-="" describedby="sample_1_info">
                    <thead>
                      <tr role="row">
                        
                        <th width="20%"> Meeting </th>
                        <th> Date </th>
                        <th> Paid </th>
                        <th>Attended</th>
                        <th> Attendees </th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($history_meetings as $key=>$item): ?>
                        <tr id="row_<?=$item->id?>" class="gradeX <?=$key%2==0?'odd':'even'?>" role="row">
                          
                          <td>
                            <?=$item->title ?>
                          </td>
                          <td>
                          <?php echo $item->date?$item->date->format('d-m-Y'):'' ?>
                            
                          </td>
                          
                          
						 <?php 
							$counter = 0;
							$counter1 = 0;
							$count_paid = 0;
							$count_attended = 0;
							foreach($count as $row)
							{
								 $meeting_id = $row['meeting_id'];
								if($row['meeting_id'] == $item->id)
								{
								
										if($row['attended'] == 'y')
									{
										$count_attended++;
									}
									
									$counter++;
								}
							}
							if(!empty($payment_count))
							{
								foreach($payment_count as $row1)
								{
									if($row1['meeting_id'] == $item->id)
								{
								
										if($row1['payment_status'] == 'paid')
									{
										$count_paid++;
									}
									
									$counter1++;
								}
								}
								
							}
							//echo $counter;
							//echo $count_paid;
							//echo $count_attended;
						 ?>
						 <td>
						 <?=$count_paid ?>
                          </td>
                          <td>
                           <?=$count_attended?>
                          </td>

                          <td>
                            <?=$this->Html->link($this->Html->image('excel.svg',['class'=>[''],'style'=>'height:30%; width:30%;']),['action' => 'exportAttendees',$item->id,'excel'],array('escape' => false,'class'=>'')) ?>
                          </td>
                          <!--<td align="center">
                            <a href="javascript:void(0);" class="edit-item" data-edit-id="<?=$item->id?>" data-edit-url="attendees/edit/" title="edit attendee"><i class="fa fa-edit"></i></a>&nbsp;
                            <a href="javascript:deleteItem('attendees/delete/',<?= h($item->id) ?>)" title="" data-toggle="confirmation" data-original-title="Are you sure you want to delete the company?"><i class="fa fa-times">&nbsp;</i></a>

                          </td>-->


                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                
                <?=$this->Form->end(); ?>
            </div>
          </div>

      </div>


      <!-- begin modal -->
      <div id="edit" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Edit Attendee</h4>
            </div>

            <div class="modal-body">

              <?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>

            </div>
            <div class="modal-footer margin-top-20">
              <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END modal -->

      <!--- ADD COMPANY MODAL -->
      <div id="add" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Add Attendee</h4>
            </div>

            <div class="modal-body">
              <?=$this->Html->image('components/ajax-modal-loading.gif',array('class'=>"align-center")) ?>


            </div>
            <div class="modal-footer margin-top-20">
              <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
            </div>
          </div>
        </div>
      </div>




      <!-- END PAGE BASE CONTENT -->
    </div>

    <!-- END PAGE BASE CONTENT -->

    <?php //$this->Html->script('custom.js', array('inline' => false)); ?>

      <script type="text/javascript">
        $(document).on('click', '.meeting-attended', function() {
          // alert($(this).data('uid') + '/' + $(this).data('status'));
          $_this = $(this);
          var meeting_attended = $(this).data('attended');
          $.ajax({
            method: "GET",
            url: BASE_PATH + 'attendees/meeting-attended/' + $(this).data('id') + '/' + meeting_attended,
            dataType: "json"
          }).success(function(result) {
            if (result.status) {
              if (meeting_attended == 'y') {
                $_this.data('attended', 'n');
                $_this.html('<i class="fa fa-check font-green"></i>');
                $_this.attr('title', 'Mark as not Attended');
              } else {
                $_this.data('attended', 'y');
                $_this.html('<i class="fa fa-clock-o"></i>');
                $_this.attr('title', 'Mark as Attended');
              }
            } else {
              alert(result.message);
            }
          });
        });
      </script>

      <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?></li>
</ul>
</nav>
<div class="companies index large-9 medium-8 columns content">
<h3><?= __('companies') ?></h3>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
<th scope="col"><?= $this->Paginator->sort('id') ?></th>
<th scope="col"><?= $this->Paginator->sort('title') ?></th>
<th scope="col"><?= $this->Paginator->sort('file') ?></th>
<th scope="col"><?= $this->Paginator->sort('sendto') ?></th>
<th scope="col"><?= $this->Paginator->sort('link') ?></th>
<th scope="col"><?= $this->Paginator->sort('date') ?></th>
<th scope="col"><?= $this->Paginator->sort('status') ?></th>
<th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($companies as $newsletter): ?>
<tr>
<td><?= $this->Number->format($newsletter->id) ?></td>
<td><?= h($newsletter->title) ?></td>
<td><?= h($newsletter->file) ?></td>
<td><?= h($newsletter->sendto) ?></td>
<td><?= h($newsletter->link) ?></td>
<td><?= h($newsletter->date) ?></td>
<td><?= h($newsletter->status) ?></td>
<td class="actions">
<?= $this->Html->link(__('View'), ['action' => 'view', $newsletter->id]) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsletter->id]) ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?>
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
</div>-->
      <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Attendee'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Invoce Details'), ['controller' => 'InvoceDetails', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Invoce Detail'), ['controller' => 'InvoceDetails', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="attendees index large-9 medium-8 columns content">
<h3><?= __('Attendees') ?></h3>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
<th scope="col"><?= $this->Paginator->sort('id') ?></th>
<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('user_name') ?></th>
<th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('meeting_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('email') ?></th>
<th scope="col"><?= $this->Paginator->sort('contactno') ?></th>
<th scope="col"><?= $this->Paginator->sort('pay_method') ?></th>
<th scope="col"><?= $this->Paginator->sort('status') ?></th>
<th scope="col"><?= $this->Paginator->sort('attended') ?></th>
<th scope="col"><?= $this->Paginator->sort('fee') ?></th>
<th scope="col"><?= $this->Paginator->sort('comments') ?></th>
<th scope="col"><?= $this->Paginator->sort('date') ?></th>
<th scope="col"><?= $this->Paginator->sort('meetId') ?></th>
<th scope="col"><?= $this->Paginator->sort('mtId') ?></th>
<th scope="col"><?= $this->Paginator->sort('additionals') ?></th>
<th scope="col"><?= $this->Paginator->sort('type') ?></th>
<th scope="col"><?= $this->Paginator->sort('companytext') ?></th>
<th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($attendees as $attendee): ?>
<tr>
<td><?= $this->Number->format($attendee->id) ?></td>
<td><?= $attendee->has('user') ? $this->Html->link($attendee->user->id, ['controller' => 'Users', 'action' => 'view', $attendee->user->id]) : '' ?></td>
<td><?= h($attendee->user_name) ?></td>
<td><?= $attendee->has('company') ? $this->Html->link($attendee->company->name, ['controller' => 'Companies', 'action' => 'view', $attendee->company->id]) : '' ?></td>
<td><?= $attendee->has('meeting') ? $this->Html->link($attendee->meeting->title, ['controller' => 'Meetings', 'action' => 'view', $attendee->meeting->id]) : '' ?></td>
<td><?= h($attendee->email) ?></td>
<td><?= h($attendee->contactno) ?></td>
<td><?= h($attendee->pay_method) ?></td>
<td><?= h($attendee->status) ?></td>
<td><?= h($attendee->attended) ?></td>
<td><?= h($attendee->fee) ?></td>
<td><?= h($attendee->comments) ?></td>
<td><?= h($attendee->date) ?></td>
<td><?= $this->Number->format($attendee->meetId) ?></td>
<td><?= $this->Number->format($attendee->mtId) ?></td>
<td><?= $this->Number->format($attendee->additionals) ?></td>
<td><?= h($attendee->type) ?></td>
<td><?= h($attendee->companytext) ?></td>
<td class="actions">
<?= $this->Html->link(__('View'), ['action' => 'view', $attendee->id]) ?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendee->id]) ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]) ?>
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
</div>-->