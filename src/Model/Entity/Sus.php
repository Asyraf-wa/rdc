<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sus Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $q1
 * @property int $q2
 * @property int $q3
 * @property int $q4
 * @property int $q5
 * @property int $q6
 * @property int $q7
 * @property int $q8
 * @property int $q9
 * @property int $q10
 * @property int $status
 * @property int $hits
 * @property \Cake\I18n\FrozenDate $rm_retention
 * @property \Cake\I18n\FrozenDate $rm_act_on
 * @property string $rm_act_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Sus extends Entity
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
        'q1' => 1,
        'q2' => 1,
        'q3' => 1,
        'q4' => 1,
        'q5' => 1,
        'q6' => 1,
        'q7' => 1,
        'q8' => 1,
        'q9' => 1,
        'q10' => 1,
        'status' => 1,
        'hits' => 1,
        'rm_retention' => 1,
        'rm_act_on' => 1,
        'rm_act_by' => 1,
        'created' => 1,
        'modified' => 1,
        'user' => 1,
    ];
}
