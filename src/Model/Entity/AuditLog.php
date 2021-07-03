<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuditLog Entity
 *
 * @property int $id
 * @property string $transaction
 * @property string $type
 * @property int|null $primary_key
 * @property string $source
 * @property string|null $parent_source
 * @property string|null $original
 * @property string|null $changed
 * @property string|null $meta
 * @property \Cake\I18n\FrozenTime|null $created
 */
class AuditLog extends Entity
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
        'transaction' => 1,
        'type' => 1,
        'primary_key' => 1,
        'source' => 1,
        'parent_source' => 1,
        'original' => 1,
        'changed' => 1,
        'meta' => 1,
        'created' => 1,
    ];
}
