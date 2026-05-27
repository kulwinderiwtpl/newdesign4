<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meeting Entity
 *
 * @property int $id
 * @property string $title
 * @property string $invite
 * @property \Cake\I18n\Time $date
 * @property string $agenda
 * @property string $location
 * @property string $location_map
 * @property string $location_info
 * @property string $sendto
 * @property string $link
 * @property string $status
 * @property string $file
 * @property string $send_email
 *
 * @property \App\Model\Entity\Attendee[] $attendees
 * @property \App\Model\Entity\InvoiceDetail[] $invoice_details
 * @property \App\Model\Entity\PresentationFile[] $presentation_files
 */
class Meeting extends Entity
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
