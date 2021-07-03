<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $sf1_s
 * @property string $sf1_l
 * @property string $sf2_s
 * @property string $sf2_l
 * @property string $sf3_s
 * @property string $sf3_l
 * @property string $sf4_s
 * @property string $sf4_l
 * @property string $sf5_s
 * @property string $sf5_l
 * @property string $sf6_s
 * @property string $sf6_l
 * @property string $sf7_s
 * @property string $sf7_l
 * @property string $sf8_s
 * @property string $sf8_l
 * @property string $sf9_s
 * @property string $sf9_l
 * @property string $sf10_s
 * @property string $sf10_l
 * @property string $sf11_s
 * @property string $sf11_l
 * @property string $sf12_s
 * @property string $sf12_l
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Question extends Entity
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
        'user_id' => 1,
        'sf1_s' => 1,
        'sf1_l' => 1,
        'sf2_s' => 1,
        'sf2_l' => 1,
        'sf3_s' => 1,
        'sf3_l' => 1,
        'sf4_s' => 1,
        'sf4_l' => 1,
        'sf5_s' => 1,
        'sf5_l' => 1,
        'sf6_s' => 1,
        'sf6_l' => 1,
        'sf7_s' => 1,
        'sf7_l' => 1,
        'sf8_s' => 1,
        'sf8_l' => 1,
        'sf9_s' => 1,
        'sf9_l' => 1,
        'sf10_s' => 1,
        'sf10_l' => 1,
        'sf11_s' => 1,
        'sf11_l' => 1,
        'sf12_s' => 1,
        'sf12_l' => 1,
        'status' => 1,
        'created' => 1,
        'modified' => 1,
        'user' => 1,
    ];
}
