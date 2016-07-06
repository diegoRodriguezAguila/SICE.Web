<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $authentication_token
 * @property \Cake\I18n\Time $last_sign_in_at
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Session extends Entity
{
    protected $_hidden = ['id', 'last_sign_in_at', 'created', 'modified'];
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
        'id' => false,
    ];
}
