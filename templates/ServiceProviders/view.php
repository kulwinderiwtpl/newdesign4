<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service Provider'), ['action' => 'edit', $serviceProvider->AdId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service Provider'), ['action' => 'delete', $serviceProvider->AdId], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceProvider->AdId)]) ?> </li>
        <li><?= $this->Html->link(__('List Service Providers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service Provider'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serviceProviders view large-9 medium-8 columns content">
    <h3><?= h($serviceProvider->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($serviceProvider->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($serviceProvider->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad File') ?></th>
            <td><?= h($serviceProvider->ad_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AdId') ?></th>
            <td><?= $this->Number->format($serviceProvider->AdId) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Des') ?></h4>
        <?= $this->Text->autoParagraph(h($serviceProvider->des)); ?>
    </div>
</div>
