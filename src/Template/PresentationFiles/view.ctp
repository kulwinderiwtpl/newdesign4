<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Presentation File'), ['action' => 'edit', $presentationFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Presentation File'), ['action' => 'delete', $presentationFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $presentationFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Presentation Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Presentation File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['controller' => 'Meetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['controller' => 'Meetings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="presentationFiles view large-9 medium-8 columns content">
    <h3><?= h($presentationFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($presentationFile->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($presentationFile->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting') ?></th>
            <td><?= $presentationFile->has('meeting') ? $this->Html->link($presentationFile->meeting->title, ['controller' => 'Meetings', 'action' => 'view', $presentationFile->meeting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($presentationFile->id) ?></td>
        </tr>
    </table>
</div>
