<?php
namespace app\modules\site\models;

use piko\IdentityInterface;
use piko\Model;

/**
 * This is the model class for table "user".
 *
 */
class User extends Model implements IdentityInterface
{
    public $id;
    public $username;
    public $password;

    private static $users = [
        '1' => [
            'id' => '1',
            'username' => 'admin',
            'password' => 'admin'
        ],
        '2' => [
            'id' => '2',
            'username' => 'demo',
            'password' => 'demo'
        ],
    ];

    /**
     * @param string $username
     * @return \app\modules\site\models\User|NULL
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    public function validatePassword($password)
    {
        return $this->password == $password;
    }

    /**
     * @param int $id
     * @return \app\modules\site\models\User|NULL
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    public function getId()
    {
        return $this->id;
    }

}