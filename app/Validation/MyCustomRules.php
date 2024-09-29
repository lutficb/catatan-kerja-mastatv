<?php

namespace App\Validation;

use CodeIgniter\I18n\Time;

class MyCustomRules
{
    public function dateValidation($date): bool
    {
        // Dapatkan waktu realtime saat fungsi ini dijalankan
        $now = Time::now('Asia/Jakarta');

        if ($date > $now) {
            return false;
        }

        return true;
    }
}
