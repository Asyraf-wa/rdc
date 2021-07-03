<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $fullname
 * @property string $age
 * @property string $gender
 * @property string $highest_qualification
 * @property string $current_working_post
 * @property string $dev_experience
 * @property string $dev_sector
 * @property string $primary_language
 * @property int $status
 * @property string $slug
 * @property int $hits
 * @property \Cake\I18n\FrozenDate $rm_retention
 * @property \Cake\I18n\FrozenDate $rm_act_on
 * @property string $rm_act_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Question[] $questions
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
        'username' => 1,
        'password' => 1,
        'email' => 1,
        'fullname' => 1,
        'age' => 1,
        'gender' => 1,
        'highest_qualification' => 1,
        'current_working_post' => 1,
        'dev_experience' => 1,
        'dev_sector' => 1,
        'primary_language' => 1,
        'status' => 1,
        'slug' => 1,
        'hits' => 1,
        'pin' => 1,
        'role' => 1,
        'rm_retention' => 1,
        'rm_act_on' => 1,
        'rm_act_by' => 1,
        'created' => 1,
        'modified' => 1,
        'questions' => 1,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
	
	protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
