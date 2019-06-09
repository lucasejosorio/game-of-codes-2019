<?php

namespace App\Traits;

trait FormatDistance
{
    public function formatDistanceToKm($location)
    {
        if ($location <= 1.0) {
            return 'até 1 km';
        }

        if ($location > 1.0 && $location < 10.0) {
            return number_format($location, 1) . ' km';
        }

        if ($location >= 10.0 && $location <= 500.0) {
            return number_format($location, 0) . ' km';
        }

        return '+ 500 km';
    }
}