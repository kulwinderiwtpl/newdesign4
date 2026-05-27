<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string $repuser
 * @property string $no_of_member
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $address
 * @property string $website
 * @property string $contactno
 * @property \Cake\I18n\Time $created
 * @property string $status
 * @property string $datalock
 * @property string $mem_type
 * @property string $fax
 * @property string $email
 *
 * @property \App\Model\Entity\User[] $users
 */
class Company extends Entity
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
