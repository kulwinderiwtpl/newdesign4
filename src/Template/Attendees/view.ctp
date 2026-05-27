<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attendee'), ['action' => 'edit', $attendee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attendee'), ['action' => 'delete', $attendee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attendees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoce Details'), ['controller' => 'InvoceDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoce Detail'), ['controller' => 'InvoceDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attendees view large-9 medium-8 columns content">
    <h3><?= h($attendee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $attendee->has('user') ? $this->Html->link($attendee->user->id, ['controller' => 'Users', 'action' => 'view', $attendee->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= h($attendee->user_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $attendee->has('company') ? $this->Html->link($attendee->company->name, ['controller' => 'Companies', 'action' => 'view', $attendee->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting') ?></th>
            <td><?= $attendee->has('meeting') ? $this->Html->link($attendee->meeting->title, ['controller' => 'Meetings', 'action' => 'view', $attendee->meeting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($attendee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contactno') ?></th>
            <td><?= h($attendee->contactno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pay Method') ?></th>
            <td><?= h($attendee->pay_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($attendee->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attended') ?></th>
            <td><?= h($attendee->attended) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee') ?></th>
            <td><?= h($attendee->fee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comments') ?></th>
            <td><?= h($attendee->comments) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($attendee->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Companytext') ?></th>
            <td><?= h($attendee->companytext) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MeetId') ?></th>
            <td><?= $this->Number->format($attendee->meetId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MtId') ?></th>
            <td><?= $this->Number->format($attendee->mtId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Additionals') ?></th>
            <td><?= $this->Number->format($attendee->additionals) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($attendee->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Invoce Details') ?></h4>
        <?php if (!empty($attendee->invoce_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Meeting Id') ?></th>
                <th scope="col"><?= __('Meeting Title') ?></th>
                <th scope="col"><?= __('Meeting Date') ?></th>
                <th scope="col"><?= __('Attendees Name') ?></th>
                <th scope="col"><?= __('Company Name') ?></th>
                <th scope="col"><?= __('Fee') ?></th>
                <th scope="col"><?= __('Invoice Number') ?></th>
                <th scope="col"><?= __('Payment Method') ?></th>
                <th scope="col"><?= __('Payment Status') ?></th>
                <th scope="col"><?= __('Attendee Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Added By') ?></th>
                <th scope="col"><?= __('Is Merged') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attendee->invoce_details as $invoceDetails): ?>
            <tr>
                <td><?= h($invoceDetails->id) ?></td>
                <td><?= h($invoceDetails->date) ?></td>
                <td><?= h($invoceDetails->meeting_id) ?></td>
                <td><?= h($invoceDetails->meeting_title) ?></td>
                <td><?= h($invoceDetails->meeting_date) ?></td>
                <td><?= h($invoceDetails->attendees_name) ?></td>
                <td><?= h($invoceDetails->company_name) ?></td>
                <td><?= h($invoceDetails->fee) ?></td>
                <td><?= h($invoceDetails->invoice_number) ?></td>
                <td><?= h($invoceDetails->payment_method) ?></td>
                <td><?= h($invoceDetails->payment_status) ?></td>
                <td><?= h($invoceDetails->attendee_id) ?></td>
                <td><?= h($invoceDetails->user_id) ?></td>
                <td><?= h($invoceDetails->added_by) ?></td>
                <td><?= h($invoceDetails->is_merged) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoceDetails', 'action' => 'view', $invoceDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoceDetails', 'action' => 'edit', $invoceDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoceDetails', 'action' => 'delete', $invoceDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoceDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
