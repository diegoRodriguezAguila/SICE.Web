<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ScheduledOutage Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $zones
 * @property string $industries
 * @property string $buildings
 * @property string $hospitals
 * @property string $radio_antennas
 * @property string $farms
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ScheduledOutage extends Entity
{
    protected $_hidden = ['created', 'modified'];

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
