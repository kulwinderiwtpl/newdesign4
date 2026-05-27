<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Document'), ['action' => 'edit', $document->dId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Document'), ['action' => 'delete', $document->dId], ['confirm' => __('Are you sure you want to delete # {0}?', $document->dId)]) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documents view large-9 medium-8 columns content">
    <h3><?= h($document->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($document->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($document->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doc Type') ?></th>
            <td><?= h($document->doc_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($document->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DId') ?></th>
            <td><?= $this->Number->format($document->dId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Sent') ?></th>
            <td><?= h($document->date_sent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Close Date') ?></th>
            <td><?= h($document->close_date) ?></td>
        </tr>
    </table>
</div>
