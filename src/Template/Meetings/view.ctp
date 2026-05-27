<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Meeting'), ['action' => 'edit', $meeting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meeting'), ['action' => 'delete', $meeting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meeting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Meetings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meeting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attendees'), ['controller' => 'Attendees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendee'), ['controller' => 'Attendees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Presentation Files'), ['controller' => 'PresentationFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Presentation File'), ['controller' => 'PresentationFiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="meetings view large-9 medium-8 columns content">
    <h3><?= h($meeting->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($meeting->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Map') ?></th>
            <td><?= h($meeting->location_map) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Info') ?></th>
            <td><?= h($meeting->location_info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sendto') ?></th>
            <td><?= h($meeting->sendto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($meeting->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($meeting->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($meeting->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($meeting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($meeting->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Invite') ?></h4>
        <?= $this->Text->autoParagraph(h($meeting->invite)); ?>
    </div>
    <div class="row">
        <h4><?= __('Agenda') ?></h4>
        <?= $this->Text->autoParagraph(h($meeting->agenda)); ?>
    </div>
    <div class="row">
        <h4><?= __('Location') ?></h4>
        <?= $this->Text->autoParagraph(h($meeting->location)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attendees') ?></h4>
        <?php if (!empty($meeting->attendees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Meeting Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Contactno') ?></th>
                <th scope="col"><?= __('Pay Method') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Attended') ?></th>
                <th scope="col"><?= __('Fee') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('MeetId') ?></th>
                <th scope="col"><?= __('MtId') ?></th>
                <th scope="col"><?= __('Additionals') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Companytext') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($meeting->attendees as $attendees): ?>
            <tr>
                <td><?= h($attendees->id) ?></td>
                <td><?= h($attendees->user_id) ?></td>
                <td><?= h($attendees->user_name) ?></td>
                <td><?= h($attendees->company_id) ?></td>
                <td><?= h($attendees->meeting_id) ?></td>
                <td><?= h($attendees->email) ?></td>
                <td><?= h($attendees->contactno) ?></td>
                <td><?= h($attendees->pay_method) ?></td>
                <td><?= h($attendees->status) ?></td>
                <td><?= h($attendees->attended) ?></td>
                <td><?= h($attendees->fee) ?></td>
                <td><?= h($attendees->comments) ?></td>
                <td><?= h($attendees->date) ?></td>
                <td><?= h($attendees->meetId) ?></td>
                <td><?= h($attendees->mtId) ?></td>
                <td><?= h($attendees->additionals) ?></td>
                <td><?= h($attendees->type) ?></td>
                <td><?= h($attendees->companytext) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attendees', 'action' => 'view', $attendees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attendees', 'action' => 'edit', $attendees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attendees', 'action' => 'delete', $attendees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Invoice Details') ?></h4>
        <?php if (!empty($meeting->invoice_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Meeting Id') ?></th>
                <th scope="col"><?= __('Meeting Title') ?></th>
                <th scope="col"><?= __('Meeting Date') ?></th>
                <th scope="col"><?= __('Attendees Name') ?></th>
                <th scope="col"><?= __('Company Name') ?></th>
                <th scope="col"><?= __('Fee') ?></th>
                <th scope="col"><?= __('Invoice Number') ?></th>
                <th scope="col"><?= __('Payment Method') ?></th>
                <th scope="col"><?= __('Payment Status') ?></th>
                <th scope="col"><?= __('Attendee Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Added By') ?></th>
                <th scope="col"><?= __('Is Merged') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($meeting->invoice_details as $invoiceDetails): ?>
            <tr>
                <td><?= h($invoiceDetails->id) ?></td>
                <td><?= h($invoiceDetails->date) ?></td>
                <td><?= h($invoiceDetails->meeting_id) ?></td>
                <td><?= h($invoiceDetails->meeting_title) ?></td>
                <td><?= h($invoiceDetails->meeting_date) ?></td>
                <td><?= h($invoiceDetails->attendees_name) ?></td>
                <td><?= h($invoiceDetails->company_name) ?></td>
                <td><?= h($invoiceDetails->fee) ?></td>
                <td><?= h($invoiceDetails->invoice_number) ?></td>
                <td><?= h($invoiceDetails->payment_method) ?></td>
                <td><?= h($invoiceDetails->payment_status) ?></td>
                <td><?= h($invoiceDetails->attendee_id) ?></td>
                <td><?= h($invoiceDetails->user_id) ?></td>
                <td><?= h($invoiceDetails->added_by) ?></td>
                <td><?= h($invoiceDetails->is_merged) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceDetails', 'action' => 'view', $invoiceDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceDetails', 'action' => 'edit', $invoiceDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceDetails', 'action' => 'delete', $invoiceDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Presentation Files') ?></h4>
        <?php if (!empty($meeting->presentation_files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Meeting Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($meeting->presentation_files as $presentationFiles): ?>
            <tr>
                <td><?= h($presentationFiles->id) ?></td>
                <td><?= h($presentationFiles->status) ?></td>
                <td><?= h($presentationFiles->file) ?></td>
                <td><?= h($presentationFiles->meeting_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PresentationFiles', 'action' => 'view', $presentationFiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PresentationFiles', 'action' => 'edit', $presentationFiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PresentationFiles', 'action' => 'delete', $presentationFiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $presentationFiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
