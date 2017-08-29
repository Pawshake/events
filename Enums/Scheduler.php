<?php namespace Enums;

/**
 * Class Scheduler
 *
 * @package Enums
 */
abstract class Scheduler {
    const FOLLOW = 'scheduler.' . General::FOLLOW;
    const CANCEL = 'scheduler.' . General::CANCEL;
    const ERROR = 'scheduler.' . General::ERROR;
}