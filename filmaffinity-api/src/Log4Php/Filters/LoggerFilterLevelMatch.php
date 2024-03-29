<?php

/**
 * LoggerFilterLevelMatch.
 *
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements. See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP Version 8
 *
 * @package Log4Php
 */

/**
 * Namespace.
 */
namespace Log4Php\Filters;

/**
 * Import dependencies.
 */
use Log4Php\LoggerFilter;
use Log4Php\LoggerLoggingEvent;
use Log4Php\LoggerLevel;

/**
 * This is a very simple filter based on level matching.
 */
class LoggerFilterLevelMatch extends LoggerFilter
{
    /**
     * Indicates if this event should be accepted or denied on match.
     *
     * @var boolean
     *
     * @access protected
     */
    protected $acceptOnMatch = true;

    /**
     * The level, when to match.
     *
     * @var LoggerLevel|null
     *
     * @access protected
     */
    protected $levelToMatch = null;

    /**
     * Set accept on match.
     *
     * @param boolean $acceptOnMatch Accept on match.
     *
     * @return void
     *
     * @access public
     */
    public function setAcceptOnMatch($acceptOnMatch): void
    {
        $this->setBoolean('acceptOnMatch', $acceptOnMatch);
    }

    /**
     * Set level to match.
     *
     * @param string $level The level to match.
     *
     * @return void
     *
     * @access public
     */
    public function setLevelToMatch($level): void
    {
        $this->setLevel('levelToMatch', $level);
    }

    /**
     * Return the decision of this filter.
     *
     * @param LoggerLoggingEvent $event Event.
     *
     * @return integer
     *
     * @access public
     */
    public function decide(LoggerLoggingEvent $event): int
    {
        if ($this->levelToMatch === null) {
            return LoggerFilter::NEUTRAL;
        }//end if

        if ($this->levelToMatch->equals($event->getLevel())) {
            if ($this->acceptOnMatch) {
                return LoggerFilter::ACCEPT;
            }//end if
            return LoggerFilter::DENY;
        }//end if
        return LoggerFilter::NEUTRAL;
    }
}
