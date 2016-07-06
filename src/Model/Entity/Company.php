<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $registration_token
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Company extends Entity
{
    protected $_hidden = ['registration_token', 'created', 'modified'];

    private $plain_reg_token;

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

    protected function _setPlainRegistrationToken($reg_token)
    {
        $this->plain_reg_token = $reg_token;
        return $reg_token;
    }

    protected function _getPlainRegistrationToken()
    {
        return $this->plain_reg_token;
    }
}
