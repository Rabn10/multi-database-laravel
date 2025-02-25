<?php

namespace App\Traits;

trait DatabaseConnectionTrait
{
    private function getDatabaseConnection($userCode)
    {
        $prefix = strtoupper(substr($userCode, 0, 1));

        return match($prefix) {
            'A' => 'mysql',
            'B' => 'mysql2',
            'C' => 'mysql3',
        };
    }
}

?>