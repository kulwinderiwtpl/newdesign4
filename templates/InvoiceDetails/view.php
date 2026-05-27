<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice Detail'), ['action' => 'edit', $invoiceDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice Detail'), ['action' => 'delete', $invoiceDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoiceDetails view large-9 medium-8 columns content">
    <h3><?= h($invoiceDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Meeting') ?></th>
            <td><?= $invoiceDetail->has('meeting') ? $this->Html->link($invoiceDetail->meeting->title, ['controller' => 'Meetings', 'action' => 'view', $invoiceDetail->meeting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting Title') ?></th>
            <td><?= h($invoiceDetail->meeting_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendees Name') ?></th>
            <td><?= h($invoiceDetail->attendees_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($invoiceDetail->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Number') ?></th>
            <td><?= h($invoiceDetail->invoice_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Method') ?></th>
            <td><?= h($invoiceDetail->payment_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Status') ?></th>
            <td><?= h($invoiceDetail->payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendee') ?></th>
            <td><?= $invoiceDetail->has('attendee') ? $this->Html->link($invoiceDetail->attendee->id, ['controller' => 'Attendees', 'action' => 'view', $invoiceDetail->attendee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $invoiceDetail->has('user') ? $this->Html->link($invoiceDetail->user->id, ['controller' => 'Users', 'action' => 'view', $invoiceDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Merged') ?></th>
            <td><?= h($invoiceDetail->is_merged) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoiceDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee') ?></th>
            <td><?= $this->Number->format($invoiceDetail->fee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Added By') ?></th>
            <td><?= $this->Number->format($invoiceDetail->added_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($invoiceDetail->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting Date') ?></th>
            <td><?= h($invoiceDetail->meeting_date) ?></td>
        </tr>
    </table>
</div>
