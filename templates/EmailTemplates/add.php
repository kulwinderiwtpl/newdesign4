<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Email Templates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="emailTemplates form large-9 medium-8 columns content">
    <?= $this->Form->create($emailTemplate) ?>
    <fieldset>
        <legend><?= __('Add Email Template') ?></legend>
        <?php
            echo $this->Form->input('template_name');
            echo $this->Form->input('from_address');
            echo $this->Form->input('from_name');
            echo $this->Form->input('subject');
            echo $this->Form->input('email_text');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
