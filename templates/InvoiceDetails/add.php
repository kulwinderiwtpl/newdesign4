<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoiceDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($invoiceDetail) ?>
    <fieldset>
        <legend><?= __('Add Invoice Detail') ?></legend>
        <?php
            echo $this->Form->input('date');
            echo $this->Form->input('meeting_id', ['options' => $meetings]);
            echo $this->Form->input('meeting_title');
            echo $this->Form->input('meeting_date');
            echo $this->Form->input('attendees_name');
            echo $this->Form->input('company_name');
            echo $this->Form->input('fee');
            echo $this->Form->input('invoice_number');
            echo $this->Form->input('payment_method');
            echo $this->Form->input('payment_status');
            echo $this->Form->input('attendee_id', ['options' => $attendees]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('added_by');
            echo $this->Form->input('is_merged');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
