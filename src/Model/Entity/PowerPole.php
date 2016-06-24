<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PowerPole Entity.
 *
 * @property int $id
 * @property string $pole_code
 * @property string $material
 * @property string $condition
 * @property string $owner
 * @property string $tension_type
 * @property string $pole_type
 * @property float $latitude
 * @property float $longitude
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PowerPole extends Entity
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
        'id' => false,
    ];
}
