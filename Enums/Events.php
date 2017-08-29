<?php namespace Enums;

/**
 * Class Events
 *
 * @package Events
 */
abstract class Events {

    const USER_SEARCH_CREATE = 'events.users.search.' . General::CREATE;
    const USER_ENQUIRY_CREATE = 'events.users.enquiry.' . General::CREATE;
    const USER_BOOKING_CREATE = 'events.users.booking.' . General::CREATE;

    /**
     * Returns all the events.
     * @return array
     */
    static function getAll() {
        return [
            self::USER_SEARCH_CREATE,
            self::USER_ENQUIRY_CREATE,
            self::USER_BOOKING_CREATE,
        ];
    }

    /**
     * Validation rules per event.
     *
     * @see https://laravel.com/docs/5.4/validation#available-validation-rules
     *
     * @return array
     */
    static function requiredVariables() {
        return [
            self::USER_SEARCH_CREATE=> [
                'uid' => 'required|numeric',
                'bounds' => 'required|array',
                'bounds.northEast' => 'required',
                'bounds.southWest' => 'required',
                'center' => 'required',
                'city' => 'required',
            ],
            self::USER_ENQUIRY_CREATE=> [
                'uid' => 'required|numeric',
            ],
            self::USER_BOOKING_CREATE => [
                'uid' => 'required|numeric',
            ],
        ];
    }

    static function getRequiredVariables($event) {
        return self::requiredVariables()[$event];
    }

    static function isValid($event) {
        return in_array($event, self::getAll());
    }
}