<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Weblinks'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="weblinks form large-9 medium-8 columns content">
    <?= $this->Form->create($weblink) ?>
    <fieldset>
        <legend><?= __('Add Weblink') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('url');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
