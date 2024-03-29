<?php

/**
 * LoggerFormattingInfo.
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
 * @subpackage Helpers
 */

/**
 * Namespace.
 */
namespace Log4Php\Helpers;

/**
 * This class encapsulates the information obtained when parsing formatting modifiers in conversion modifiers.
 */
class LoggerFormattingInfo
{
    /**
     * Minimal output length. If output is shorter than this value, it will be padded with spaces.
     *
     * @var integer
     *
     * @access public
     */
    public $min = 0;

    /**
     * Maximum output length. If output is longer than this value, it will be trimmed.
     *
     * @var integer
     *
     * @access public
     */
    public $max = PHP_INT_MAX;

    /**
     * Whether to pad the string from the left. If set to false, the string will be padded from the right.
     *
     * @var boolean
     *
     * @access public
     */
    public $padLeft = true;

    /**
     * Whether to trim the string from the left. If set to false, the string will be trimmed from the right.
     *
     * @var boolean
     *
     * @access public
     */
    public $trimLeft = false;
}
