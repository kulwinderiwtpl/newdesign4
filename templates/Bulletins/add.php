<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bulletins'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bulletins form large-9 medium-8 columns content">
    <?= $this->Form->create($bulletin) ?>
    <fieldset>
        <legend><?= __('Add Bulletin') ?></legend>
        <?php
            echo $this->Form->input('message');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
