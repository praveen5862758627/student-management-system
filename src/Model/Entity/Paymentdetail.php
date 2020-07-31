<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paymentdetail Entity
 *
 * @property int $id
 * @property int $userid
 * @property string $productcode
 * @property string $productname
 * @property string $razorpay_payment_id
 * @property string $razorpay_order_id
 * @property string $merchant_order_id
 * @property string $type
 * @property string $price
 * @property string $datetime
 *
 * @property \App\Model\Entity\RazorpayPayment $razorpay_payment
 * @property \App\Model\Entity\RazorpayOrder $razorpay_order
 * @property \App\Model\Entity\MerchantOrder $merchant_order
 */
class Paymentdetail extends Entity
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
        'userid' => true,
        'productcode' => true,
        'productname' => true,
        'razorpay_payment_id' => true,
        'razorpay_order_id' => true,
        'merchant_order_id' => true,
        'type' => true,
        'price' => true,
        'datetime' => true,
        'razorpay_payment' => true,
        'razorpay_order' => true,
        'merchant_order' => true,
		 'durartion' => true
    ];
}
