<?php namespace Enums;

/**
 * Class Logs
 *
 * @package Enums
 */
abstract class Logs {
  const ALL = '*.logs.*';
  const DEBUG = 'logs.' . SeverityLevel::DEBUG;
  const NOTICE = 'logs.' . SeverityLevel::NOTICE;
  const WARNING = 'logs.' . SeverityLevel::WARNING;
  const ERROR = 'logs.' . SeverityLevel::ERROR;
  const CRITICAL = 'logs.' . SeverityLevel::CRITICAL;
}