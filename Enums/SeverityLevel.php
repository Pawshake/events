<?php namespace Enums;

/**
 * Class SeverityLevel
 *
 * @package Enums
 */
abstract class SeverityLevel {
  const DEBUG = 'debug';
  const NOTICE = 'notice';
  const WARNING = 'warning';
  const ERROR = 'error';
  const CRITICAL = 'critical';
}