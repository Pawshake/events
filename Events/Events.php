<?php namespace Events;

/**
 * Class Events
 *
 * @package Events
 */
abstract class Events {

    public const USER_SEARCH_CREATE = 'events.search.new';

    public const ENQUIRY_CREATED_GUEST = 'events.enquiry.status.created.guest';
    public const ENQUIRY_CREATED_HOST = 'events.enquiry.status.created.host';

    public const ENQUIRY_PREAPPROVED_GUEST = 'events.enquiry.status.preapproved.guest';
    public const ENQUIRY_PREAPPROVED_HOST = 'events.enquiry.status.preapproved.host';

    public const BOOKING_CREATED_GUEST = 'events.booking.status.created.guest';
    public const BOOKING_CREATED_HOST = 'events.booking.status.created.host';

    /**
     * Returns all the events.
     *
     * @return array
     */
    public static function getAll(): array {
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
    public static function requiredVariables(): array {
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

    /**
     * Returns the validation rules for the given event that can be used in Laravel request objects.
     *
     * @param $event
     *
     * @return array
     */
    public static function getRequiredVariables($event): array {
        return self::requiredVariables()[$event];
    }

    /**
     * Checks if the current event is valid.
     *
     * @param $event
     *
     * @return bool
     */
    public static function isValid($event): bool {
        return \in_array($event, self::getAll());
    }
}