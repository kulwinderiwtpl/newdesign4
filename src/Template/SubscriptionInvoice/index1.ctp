<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subscription Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptionInvoice index large-9 medium-8 columns content">
    <h3><?= __('Subscription Invoice') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subscription_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rep_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subscription_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subscription_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('added_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subscriptionInvoice as $subscriptionInvoice): ?>
            <tr>
                <td><?= $this->Number->format($subscriptionInvoice->id) ?></td>
                <td><?= h($subscriptionInvoice->userid) ?></td>
                <td><?= h($subscriptionInvoice->date) ?></td>
                <td><?= h($subscriptionInvoice->subscription_year) ?></td>
                <td><?= $subscriptionInvoice->has('company') ? $this->Html->link($subscriptionInvoice->company->name, ['controller' => 'Companies', 'action' => 'view', $subscriptionInvoice->company->id]) : '' ?></td>
                <td><?= h($subscriptionInvoice->company_name) ?></td>
                <td><?= h($subscriptionInvoice->company_address) ?></td>
                <td><?= h($subscriptionInvoice->rep_name) ?></td>
                <td><?= h($subscriptionInvoice->subscription_type) ?></td>
                <td><?= h($subscriptionInvoice->subscription_amount) ?></td>
                <td><?= h($subscriptionInvoice->payment_status) ?></td>
                <td><?= $this->Number->format($subscriptionInvoice->added_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subscriptionInvoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subscriptionInvoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subscriptionInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptionInvoice->id)]) ?>
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
