<?php
namespace app\modules\site\models;

use piko\IdentityInterface;
use piko\Piko;

/**
 * This is the User identity class.
 *
 */
class User implements IdentityInterface
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
     * @return User|NULL
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if ($user['username'] == $username) {
                $identity = new static();
                Piko::configureObject($identity, $user);

                return $identity;
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
     * @return User|null
     */
    public static function findIdentity($id)
    {
        if (isset(self::$users[$id])) {
            $identity = new static();
            Piko::configureObject($identity, self::$users[$id]);

            return $identity;
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }
}
