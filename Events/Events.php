<?php namespace Events;

/**
 * Class Events
 *
 * @package Events
 */
abstract class Events {

    const USER_SEARCH_CREATE = 'events.search.new';

    const ENQUIRY_CREATED_GUEST = 'events.enquiry.status.created.guest';
    const ENQUIRY_CREATED_HOST = 'events.enquiry.status.created.host';

    const ENQUIRY_PREAPPROVED_GUEST = 'events.enquiry.status.preapproved.guest';
    const ENQUIRY_PREAPPROVED_HOST = 'events.enquiry.status.preapproved.host';

    const BOOKING_CREATED_GUEST = 'events.booking.status.created.guest';
    const BOOKING_CREATED_HOST = 'events.booking.status.created.host';

    /**
     * Returns all the events.
     * @return array
     */
    static function getAll() {
        return [
            // Search
            self::USER_SEARCH_CREATE,
            // Enquiry
            self::ENQUIRY_CREATED_GUEST,
            self::ENQUIRY_CREATED_HOST,
            self::ENQUIRY_PREAPPROVED_GUEST,
            self::ENQUIRY_PREAPPROVED_HOST,
            // Booking related
            self::BOOKING_CREATED_GUEST,
            self::BOOKING_CREATED_HOST,
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
                'search_path' => 'required',
            ],
            self::ENQUIRY_CREATED_GUEST=> [
                'uid' => 'required|numeric',
            ],
            self::ENQUIRY_CREATED_HOST => [
                'uid' => 'required|numeric',
            ],
            self::ENQUIRY_PREAPPROVED_GUEST=> [
                'uid' => 'required|numeric',
            ],
            self::ENQUIRY_PREAPPROVED_HOST => [
                'uid' => 'required|numeric',
            ],
            self::BOOKING_CREATED_GUEST => [
                'uid' => 'required|numeric',
            ],
            self::BOOKING_CREATED_HOST => [
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