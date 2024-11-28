<?php

namespace App\MyClasses;

class PhoneNumberHelpers {

    /**
     * Removes any country code from the string.
     * @param $string
     * @return array|string|string[]|null
     */
    public static function removeCountryCode($string, $countryCode = '1') {
        return substr( preg_replace("/^\+?$countryCode|\|$countryCode|\D/", '', $string), -10);
    }
}
