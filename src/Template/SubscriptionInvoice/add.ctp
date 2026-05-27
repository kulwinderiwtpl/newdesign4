<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Subscription Invoice'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptionInvoice form large-9 medium-8 columns content">
    <?= $this->Form->create($subscriptionInvoice) ?>
    <fieldset>
        <legend><?= __('Add Subscription Invoice') ?></legend>
        <?php
            echo $this->Form->input('userid');
            echo $this->Form->input('date');
            echo $this->Form->input('subscription_year');
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('company_name');
            echo $this->Form->input('company_address');
            echo $this->Form->input('rep_name');
            echo $this->Form->input('subscription_type');
            echo $this->Form->input('subscription_amount');
            echo $this->Form->input('payment_status');
            echo $this->Form->input('added_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
