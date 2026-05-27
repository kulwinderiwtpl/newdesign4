<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ad Files'), ['controller' => 'AdFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad File'), ['controller' => 'AdFiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ads form large-9 medium-8 columns content">
    <?= $this->Form->create($ad) ?>
    <fieldset>
        <legend><?= __('Add Ad') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('des');
            echo $this->Form->input('url');
            echo $this->Form->input('ad_file');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
