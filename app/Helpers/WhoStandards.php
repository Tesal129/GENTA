<?php

namespace App\Helpers;

class WhoStandards
{
    /**
     * Interpolates data between key milestones to generate 0-60 months array
     */
    private static function interpolate($milestones, $values)
    {
        $result = [];
        for ($i = 0; $i <= 60; $i++) {
            $m1 = 0;
            $m2 = 60;
            $v1 = $values[0];
            $v2 = $values[count($values) - 1];

            foreach ($milestones as $idx => $m) {
                if ($i == $m) {
                    $m1 = $m2 = $m;
                    $v1 = $v2 = $values[$idx];
                    break;
                } elseif ($m > $i) {
                    $m1 = $milestones[$idx - 1];
                    $m2 = $m;
                    $v1 = $values[$idx - 1];
                    $v2 = $values[$idx];
                    break;
                }
            }

            if ($m1 == $m2) {
                $result[] = $v1;
            } else {
                $fraction = ($i - $m1) / ($m2 - $m1);
                $interpolated = $v1 + $fraction * ($v2 - $v1);
                $result[] = round($interpolated, 2);
            }
        }
        return $result;
    }

    public static function getWeightStandards($gender)
    {
        $milestones = [0, 2, 4, 6, 9, 12, 18, 24, 36, 48, 60];
        if ($gender === 'L') {
            return [
                'median' => self::interpolate($milestones, [3.3, 5.6, 7.0, 7.9, 8.9, 9.6, 10.9, 12.2, 14.3, 16.3, 18.3]),
                'sd2_neg' => self::interpolate($milestones, [2.5, 4.3, 5.6, 6.4, 7.1, 7.7, 8.8, 9.7, 11.3, 12.7, 14.1]),
                'sd3_neg' => self::interpolate($milestones, [2.1, 3.8, 4.9, 5.7, 6.3, 6.9, 7.9, 8.8, 10.1, 11.2, 12.4]),
            ];
        } else {
            return [
                'median' => self::interpolate($milestones, [3.2, 5.1, 6.4, 7.3, 8.2, 8.9, 10.2, 11.5, 13.9, 16.1, 18.2]),
                'sd2_neg' => self::interpolate($milestones, [2.4, 3.9, 5.0, 5.7, 6.5, 7.0, 8.1, 9.0, 10.8, 12.3, 13.7]),
                'sd3_neg' => self::interpolate($milestones, [2.0, 3.4, 4.4, 5.0, 5.8, 6.3, 7.3, 8.1, 9.6, 10.9, 12.1]),
            ];
        }
    }

    public static function getHeightStandards($gender)
    {
        $milestones = [0, 2, 4, 6, 9, 12, 18, 24, 36, 48, 60];
        if ($gender === 'L') {
            return [
                'median' => self::interpolate($milestones, [49.9, 58.4, 63.9, 67.6, 72.0, 75.7, 82.3, 87.8, 96.1, 103.3, 110.0]),
                'sd2_neg' => self::interpolate($milestones, [46.1, 54.4, 59.7, 63.3, 67.5, 71.0, 76.9, 81.7, 89.4, 95.9, 101.9]),
                'sd3_neg' => self::interpolate($milestones, [44.2, 52.4, 57.6, 61.2, 65.2, 68.6, 74.2, 78.7, 86.0, 92.2, 98.0]),
            ];
        } else {
            return [
                'median' => self::interpolate($milestones, [49.1, 57.1, 62.1, 65.7, 70.1, 74.0, 80.7, 86.4, 95.1, 102.7, 109.4]),
                'sd2_neg' => self::interpolate($milestones, [45.4, 53.0, 57.8, 61.2, 65.3, 68.9, 74.9, 80.0, 88.1, 95.2, 101.4]),
                'sd3_neg' => self::interpolate($milestones, [43.6, 51.0, 55.6, 58.9, 62.9, 66.3, 72.0, 76.8, 84.6, 91.5, 97.5]),
            ];
        }
    }
}
