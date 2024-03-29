<?php

/**
 * LoggerAppenderConsole.
 *
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements. See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP Version 8
 *
 * @package    Log4Php
 * @subpackage Appenders
 */

/**
 * Namespace.
 */
namespace Log4Php\Appenders;

/**
 * Import dependencies.
 */
use Log4Php\LoggerAppender;
use Log4Php\LoggerLoggingEvent;

/**
 * LoggerAppenderConsole appends log events either to the standard output stream or the standard error stream.
 *
 * Note: Use this Appender with command-line php scripts. On web scripts this appender has no effects.
 *
 * This appender uses a layout.
 *
 * Configurable parameters:
 *
 * - Target - the target stream: "stdout" or "stderr".
 */
class LoggerAppenderConsole extends LoggerAppender
{
    /**
     * The standard otuput stream.
     *
     * @var string
     *
     * @access public
     */
    public const STDOUT = 'php://stdout';

    /**
     * The standard error stream.
     *
     * @var string
     *
     * @access public
     */
    public const STDERR = 'php://stderr';

    /**
     * The target parameter.
     *
     * @var string
     *
     * @access protected
     */
    protected $target = self::STDOUT;

    /**
     * Stream resource for the target stream.
     *
     * @var resource|null
     *
     * @access protected
     */
    protected $fp = null;

    /**
     * Acivate options.
     *
     * @return void
     *
     * @access public
     * @see    LoggerAppender::activateOptions()
     */
    public function activateOptions(): void
    {
        $this->fp = fopen($this->target, 'w');

        if (is_resource($this->fp) && ($this->layout !== null)) {
            fwrite($this->fp, $this->layout->getHeader() ?? '');
        }//end if

        if (!is_resource($this->fp)) {
            $this->closed = true;
        } else {
            $this->closed = false;
        }//end if
    }

    /**
     * Close.
     *
     * @return void
     *
     * @access public
     * @see    LoggerAppender::close()
     */
    public function close(): void
    {
        if ($this->closed !== true) {
            if (!is_null($this->fp) && ($this->layout !== null)) {
                fwrite($this->fp, $this->layout->getFooter() ?? '');
                fclose($this->fp);
            }//end if

            $this->closed = true;
        }//end if
    }

    /**
     * Append.
     *
     * @param LoggerLoggingEvent $event Event.
     *
     * @return void
     *
     * @access public
     * @see    LoggerAppender::append()
     */
    public function append(LoggerLoggingEvent $event): void
    {
        if (is_resource($this->fp) && ($this->layout !== null)) {
            fwrite($this->fp, $this->layout->format($event));
        }//end if
    }

    /**
     * Sets the 'target' parameter.
     *
     * @param string $target Target.
     *
     * @return void
     *
     * @access public
     */
    public function setTarget(string $target): void
    {
        $value = trim($target);

        if (($value === static::STDOUT) || (strtoupper($value) === 'STDOUT')) {
            $this->target = static::STDOUT;
            return;
        }//end if

        if (($value === static::STDERR) || (strtoupper($value) === 'STDERR')) {
            $this->target = static::STDERR;
            return;
        }//end if

        $this->warn("Invalid value given for 'target' property: [$value]. Property not set.");
    }

    /**
     * Returns the value of the 'target' parameter.
     *
     * @return string
     *
     * @access public
     */
    public function getTarget(): string
    {
        return $this->target;
    }
}
