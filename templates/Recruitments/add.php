<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Recruitments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recruitments form large-9 medium-8 columns content">
    <?= $this->Form->create($recruitment) ?>
    <fieldset>
        <legend><?= __('Add Recruitment') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('text');
            echo $this->Form->input('pdf');
            echo $this->Form->input('addd');
            echo $this->Form->input('addm');
            echo $this->Form->input('addy');
            echo $this->Form->input('expd');
            echo $this->Form->input('expm');
            echo $this->Form->input('expy');
            echo $this->Form->input('status');
            echo $this->Form->input('datalock');
            echo $this->Form->input('mem_type');
            echo $this->Form->input('closeDate');
            echo $this->Form->input('othercompany');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
