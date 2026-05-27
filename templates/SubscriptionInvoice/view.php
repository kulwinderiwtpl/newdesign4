<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subscription Invoice'), ['action' => 'edit', $subscriptionInvoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subscription Invoice'), ['action' => 'delete', $subscriptionInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptionInvoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subscription Invoice'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subscriptionInvoice view large-9 medium-8 columns content">
    <h3><?= h($subscriptionInvoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= h($subscriptionInvoice->userid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subscription Year') ?></th>
            <td><?= h($subscriptionInvoice->subscription_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $subscriptionInvoice->has('company') ? $this->Html->link($subscriptionInvoice->company->name, ['controller' => 'Companies', 'action' => 'view', $subscriptionInvoice->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($subscriptionInvoice->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Address') ?></th>
            <td><?= h($subscriptionInvoice->company_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rep Name') ?></th>
            <td><?= h($subscriptionInvoice->rep_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subscription Type') ?></th>
            <td><?= h($subscriptionInvoice->subscription_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subscription Amount') ?></th>
            <td><?= h($subscriptionInvoice->subscription_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Status') ?></th>
            <td><?= h($subscriptionInvoice->payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subscriptionInvoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Added By') ?></th>
            <td><?= $this->Number->format($subscriptionInvoice->added_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($subscriptionInvoice->date) ?></td>
        </tr>
    </table>
</div>
