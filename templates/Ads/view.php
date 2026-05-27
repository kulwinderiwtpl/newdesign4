<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad'), ['action' => 'edit', $ad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Files'), ['controller' => 'AdFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad File'), ['controller' => 'AdFiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ads view large-9 medium-8 columns content">
    <h3><?= h($ad->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($ad->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($ad->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ad File') ?></th>
            <td><?= h($ad->ad_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($ad->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ad->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Des') ?></h4>
        <?= $this->Text->autoParagraph(h($ad->des)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ad Files') ?></h4>
        <?php if (!empty($ad->ad_files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Ad File') ?></th>
                <th scope="col"><?= __('Ad Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ad->ad_files as $adFiles): ?>
            <tr>
                <td><?= h($adFiles->id) ?></td>
                <td><?= h($adFiles->status) ?></td>
                <td><?= h($adFiles->ad_file) ?></td>
                <td><?= h($adFiles->ad_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdFiles', 'action' => 'view', $adFiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdFiles', 'action' => 'edit', $adFiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdFiles', 'action' => 'delete', $adFiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adFiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
