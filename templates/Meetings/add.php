<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Meetings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Presentation Files'), ['controller' => 'PresentationFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Presentation File'), ['controller' => 'PresentationFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="meetings form large-9 medium-8 columns content">
    <?= $this->Form->create($meeting) ?>
    <fieldset>
        <legend><?= __('Add Meeting') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('invite');
            echo $this->Form->input('date');
            echo $this->Form->input('agenda');
            echo $this->Form->input('location');
            echo $this->Form->input('location_map');
            echo $this->Form->input('location_info');
            echo $this->Form->input('sendto');
            echo $this->Form->input('link');
            echo $this->Form->input('status');
            echo $this->Form->input('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
