<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendee Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property int $company_id
 * @property string $meeting_id
 * @property string $email
 * @property string $contactno
 * @property string $pay_method
 * @property string $status
 * @property string $attended
 * @property string $fee
 * @property string $comments
 * @property \Cake\I18n\Time $date
 * @property int $meetId
 * @property int $mtId
 * @property int $additionals
 * @property string $type
 * @property string $companytext
 * @property string $send_email
 * @property string $booking_process
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Meeting $meeting
 * @property \App\Model\Entity\InvoceDetail[] $invoce_details
 */
class Attendee extends Entity
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
