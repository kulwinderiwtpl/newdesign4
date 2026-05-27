<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bulletin'), ['action' => 'edit', $bulletin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bulletin'), ['action' => 'delete', $bulletin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bulletin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bulletins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bulletin'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bulletins view large-9 medium-8 columns content">
    <h3><?= h($bulletin->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($bulletin->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bulletin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bulletin->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($bulletin->message)); ?>
    </div>
</div>
