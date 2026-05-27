<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceDetail Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $date
 * @property int $meeting_id
 * @property string $meeting_title
 * @property \Cake\I18n\Time $meeting_date
 * @property string $attendees_name
 * @property string $company_name
 * @property int $fee
 * @property string $invoice_number
 * @property string $payment_method
 * @property string $payment_status
 * @property string $attendee_id
 * @property int $user_id
 * @property int $added_by
 * @property string $is_merged
 *
 * @property \App\Model\Entity\Meeting $meeting
 * @property \App\Model\Entity\Attendee $attendee
 * @property \App\Model\Entity\User $user
 */
class InvoiceDetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
