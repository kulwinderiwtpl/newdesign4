<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recruitment Entity
 *
 * @property int $id
 * @property string $company_id
 * @property string $text
 * @property string $pdf
 * @property string $addd
 * @property string $addm
 * @property string $addy
 * @property string $expd
 * @property string $expm
 * @property string $expy
 * @property string $status
 * @property string $datalock
 * @property string $mem_type
 * @property \Cake\I18n\Time $closeDate
 * @property string $othercompany
 *
 * @property \App\Model\Entity\Company $company
 */
class Recruitment extends Entity
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
