<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'email' => 'cakephp@example.com',
                'password' => (new DefaultPasswordHasher())->hash('secret'),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('users');

        foreach ($data as $row) {
            $exists = $this->fetchRow('SELECT * FROM users WHERE id = ' . $row['id']);

            if (!$exists) {
                $table->insert($row)->save();
            }
        }
    }
}
