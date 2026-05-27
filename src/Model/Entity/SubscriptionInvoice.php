<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubscriptionInvoice Entity
 *
 * @property int $id
 * @property string $userid
 * @property \Cake\I18n\Time $date
 * @property string $subscription_year
 * @property string $company_id
 * @property string $company_name
 * @property string $company_address
 * @property string $rep_name
 * @property string $subscription_type
 * @property string $subscription_amount
 * @property string $payment_status
 * @property int $added_by
 *
 * @property \App\Model\Entity\Company $company
 */
class SubscriptionInvoice extends Entity
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
