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
    const ENQUIRY_AUTO_EXPIRE = 'events.enquiry.status.expire.auto';
    const ENQUIRY_AUTO_DECLINE = 'events.enquiry.status.decline.auto';

    const BOOKING_CREATED = 'events.booking.status.created';
    const BOOKING_AUTO_EXPIRE = 'events.booking.status.expire.auto';
    const BOOKING_DECLINED = 'events.booking.status.declined';
    const BOOKING_CONFIRMED = 'events.booking.status.confirmed';

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
            self::ENQUIRY_AUTO_EXPIRE,
            self::ENQUIRY_AUTO_DECLINE,
            // Booking related
            self::BOOKING_CREATED,
            self::BOOKING_AUTO_EXPIRE,
            self::BOOKING_DECLINED,
            self::BOOKING_CONFIRMED,
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
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::ENQUIRY_PREAPPROVED => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
                'expireTimeout' => 'required',
            ],
            self::ENQUIRY_DECLINED => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::ENQUIRY_AUTO_EXPIRE => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::ENQUIRY_AUTO_DECLINE => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::BOOKING_CREATED => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::BOOKING_AUTO_EXPIRE => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::BOOKING_DECLINED => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
            ],
            self::BOOKING_CONFIRMED => [
                'thread' => 'required|numeric',
                'guest' => 'required|numeric',
                'host' => 'required|numeric',
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