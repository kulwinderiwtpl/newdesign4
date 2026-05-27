<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bulletin'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bulletins index large-9 medium-8 columns content">
    <h3><?= __('Bulletins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bulletins as $bulletin): ?>
            <tr>
                <td><?= $this->Number->format($bulletin->id) ?></td>
                <td><?= h($bulletin->status) ?></td>
                <td><?= h($bulletin->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bulletin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bulletin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bulletin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bulletin->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
