<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $presentationFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $presentationFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Presentation Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="presentationFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($presentationFile) ?>
    <fieldset>
        <legend><?= __('Edit Presentation File') ?></legend>
        <?php
            echo $this->Form->input('status');
            echo $this->Form->input('file');
            echo $this->Form->input('meeting_id', ['options' => $meetings]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
