<?php

namespace App\MyClasses;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Http\Request;

class DateHelpers {

    /**
     * Prepares Date time string from the request when date and time are separately provided in the request.
     * @param Request $request
     * @param $dateVarName
     * @param $timeVarName
     * @param string $dateFormat
     * @param string $timeFormat
     * @return string|null
     */
    public static function prepareDateTimeString_fromReq(Request $request, $dateVarName, $timeVarName = null,
                                                                 $dateFormat = 'm/d/Y', $timeFormat = 'H:i') {
        $dateTimeString = '';
        if($request->has($dateVarName) && !empty($request->input($dateVarName)) && !is_null($request->input($dateVarName))){
            $dateTimeString .= Carbon::createFromFormat($dateFormat, $request->input($dateVarName))->toDateString();
            if(!is_null($timeVarName) && $request->has($timeVarName) && !empty($request->input($timeVarName)) && !is_null($request->input($timeVarName))){
                $dateTimeString .= ' ' . Carbon::createFromFormat($timeFormat, $request->input($timeVarName))->toTimeString();
            }
        }

        return $dateTimeString == '' ? null : $dateTimeString;
    }

    /**
     * Counts Sundays between dates.
     * @param $start
     * @param $end
     * @return int
     */
    public static function countSundaysBetweenDates($start, $end) {
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        return $start->diffInDaysFiltered(function (Carbon $date) {
            return $date->isSunday();
        }, $end);
    }

    /**
     * Prepares HTML date, such that, displaying text is shorter text, while title is detailed text.
     * @param $date
     * @param string $format
     * @return string
     */
    public static function prepareHtmlDate($date, $format = 'Y-m-d H:i:s') {
        if(is_null($date))  return '';
        try {
            $date = Carbon::parse($date);
        }catch (InvalidFormatException $e){
            $date = Carbon::createFromFormat($format, $date);
        }
        return '<p class="mb-0" title="' . $date->toDayDateTimeString() . '">' . $date->format('F d, Y') . '</p>';
    }

}
