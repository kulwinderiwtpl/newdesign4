<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rsvpSetting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rsvpSetting->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rsvp Settings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rsvpSettings form large-9 medium-8 columns content">
    <?= $this->Form->create($rsvpSetting) ?>
    <fieldset>
        <legend><?= __('Edit Rsvp Setting') ?></legend>
        <?php
            echo $this->Form->input('BACS_text');
            echo $this->Form->input('cheque_text');
            echo $this->Form->input('fee');
            echo $this->Form->input('return_text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
