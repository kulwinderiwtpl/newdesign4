<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad File'), ['action' => 'edit', $adFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad File'), ['action' => 'delete', $adFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adFiles view large-9 medium-8 columns content">
    <h3><?= h($adFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($adFile->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad File') ?></th>
            <td><?= h($adFile->ad_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad') ?></th>
            <td><?= $adFile->has('ad') ? $this->Html->link($adFile->ad->title, ['controller' => 'Ads', 'action' => 'view', $adFile->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adFile->id) ?></td>
        </tr>
    </table>
</div>
