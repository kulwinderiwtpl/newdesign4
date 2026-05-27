<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recruitment'), ['action' => 'edit', $recruitment->r_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recruitment'), ['action' => 'delete', $recruitment->r_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recruitment->r_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recruitments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recruitment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recruitments view large-9 medium-8 columns content">
    <h3><?= h($recruitment->r_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $recruitment->has('company') ? $this->Html->link($recruitment->company->name, ['controller' => 'Companies', 'action' => 'view', $recruitment->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><?= h($recruitment->text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pdf') ?></th>
            <td><?= h($recruitment->pdf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addd') ?></th>
            <td><?= h($recruitment->addd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addm') ?></th>
            <td><?= h($recruitment->addm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addy') ?></th>
            <td><?= h($recruitment->addy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expd') ?></th>
            <td><?= h($recruitment->expd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expm') ?></th>
            <td><?= h($recruitment->expm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expy') ?></th>
            <td><?= h($recruitment->expy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($recruitment->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datalock') ?></th>
            <td><?= h($recruitment->datalock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mem Type') ?></th>
            <td><?= h($recruitment->mem_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Othercompany') ?></th>
            <td><?= h($recruitment->othercompany) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recruitment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CloseDate') ?></th>
           <td><?= h($recruitment->closeDate) ?></td>
            <!--<td><?= h($recruitement->date('d-m-Y',strtotime($item->closeDate))) ?></td>-->
        </tr>
    </table>
</div>
