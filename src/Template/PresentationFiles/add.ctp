<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Presentation Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="presentationFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($presentationFile) ?>
    <fieldset>
        <legend><?= __('Add Presentation File') ?></legend>
        <?php
            echo $this->Form->input('status');
            echo $this->Form->input('file');
            echo $this->Form->input('meeting_id', ['options' => $meetings]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
