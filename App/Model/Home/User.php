<?php

namespace App\Model\Home;

use App\Model\PSQLTrait;

/**
 * Returns list of users.
 */
class User
{
    use PSQLTrait;

    /**
     * Returns list of users.
     *
     * @return resource
     */
    public function getUsers()
    {
        $this->connectPSQL();

        $query = 'SELECT * FROM "user"';

        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        return $result;
    }
}
