<?php

/**
 * LoggerPatternConverterLiteral.
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
 * @package    Log4Php
 * @subpackage Pattern
 */

/**
 * Namespace.
 */
namespace Log4Php\Pattern;

/**
 * Import dependencies.
 */
use Log4Php\LoggerLoggingEvent;

/**
 * Returns the literal value passed in the constructor, without modifications.
 */
class LoggerPatternConverterLiteral extends LoggerPatternConverter
{
    /**
     * Literal.
     *
     * @var string
     *
     * @access private
     */
    private $literalValue;

    /**
     * Constructor.
     *
     * @param string $literalValue Literal.
     *
     * @access public
     */
    public function __construct($literalValue)
    {
        $this->literalValue = $literalValue;
    }

    /**
     * Convert.
     *
     * @param LoggerLoggingEvent $event Event.
     *
     * @return string
     *
     * @access public
     */
    public function convert(LoggerLoggingEvent $event): string
    {
        return $this->literalValue;
    }
}
