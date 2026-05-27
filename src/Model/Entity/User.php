<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property bool $status
 * @property \Cake\I18n\Time $created
 * @property string $job_title
 * @property string $tel
 * @property string $email
 * @property string $address
 * @property string $billing_first_name
 * @property string $billing_last_name
 * @property string $billing_job_title
 * @property string $billing_tel
 * @property string $billing_email
 * @property string $billing_address
 * @property int $company_id
 * @property string $tandc
 *
 * @property \App\Model\Entity\Company $company
 */
class User extends Entity
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
    
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
