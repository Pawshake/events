<?php namespace Enums;

/**
 * Class Drupal
 *
 * @package Enums
 */
abstract class Drupal {
  const EXECUTE = 'drupal.' . General::EXECUTE;
  const ERROR = 'drupal.' . General::ERROR;
  const VALIDATION_ERROR = 'drupal.validation.' . General::ERROR;
}