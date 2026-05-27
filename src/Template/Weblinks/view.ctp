<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Weblink'), ['action' => 'edit', $weblink->wId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weblink'), ['action' => 'delete', $weblink->wId], ['confirm' => __('Are you sure you want to delete # {0}?', $weblink->wId)]) ?> </li>
        <li><?= $this->Html->link(__('List Weblinks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weblink'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="weblinks view large-9 medium-8 columns content">
    <h3><?= h($weblink->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($weblink->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($weblink->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($weblink->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WId') ?></th>
            <td><?= $this->Number->format($weblink->wId) ?></td>
        </tr>
    </table>
</div>
