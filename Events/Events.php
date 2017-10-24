<?php namespace Events;

/**
 * Class Events
 *
 * @package Events
 */
abstract class Events {

    const USER_SEARCH_CREATE = 'events.search.new';

    const ENQUIRY_CREATED = 'events.enquiry.status.created';
    const ENQUIRY_PREAPPROVED = 'events.enquiry.status.preapproved';
    const ENQUIRY_DECLINED = 'events.enquiry.status.declined';

    const BOOKING_CREATED = 'events.booking.status.created';

    /**
     * Returns all the events.
     * @return array
     */
    static function getAll() {
        return [
            // Search
            self::USER_SEARCH_CREATE,
            // Enquiry
            self::ENQUIRY_CREATED,
            self::ENQUIRY_PREAPPROVED,
            self::ENQUIRY_DECLINED,
            // Booking related
            self::BOOKING_CREATED,
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
            self::ENQUIRY_CREATED => [
                'thread_id' => 'required|numeric',
                'guest_id' => 'required|numeric',
                'host_id' => 'required|numeric',
            ],
            self::ENQUIRY_PREAPPROVED => [
                'thread_id' => 'required|numeric',
                'guest_id' => 'required|numeric',
                'host_id' => 'required|numeric',
            ],
            self::ENQUIRY_DECLINED => [
                'thread_id' => 'required|numeric',
                'guest_id' => 'required|numeric',
                'host_id' => 'required|numeric',
            ],
            self::BOOKING_CREATED => [
                'thread_id' => 'required|numeric',
                'guest_id' => 'required|numeric',
                'host_id' => 'required|numeric',
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