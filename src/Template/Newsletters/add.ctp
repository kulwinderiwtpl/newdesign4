<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Newsletters'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="newsletters form large-9 medium-8 columns content">
    <?= $this->Form->create($newsletter) ?>
    <fieldset>
        <legend><?= __('Add Newsletter') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('text');
            echo $this->Form->input('file');
            echo $this->Form->input('sendto');
            echo $this->Form->input('link');
            echo $this->Form->input('date');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
