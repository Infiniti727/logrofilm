<?php

/**
 * LoggerConfigurationAdapterPHP.
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
 * @subpackage Configurators
 */

/**
 * Namespace.
 */
namespace Log4Php\Configurators;

/**
 * Import dependencies.
 */
use Log4Php\LoggerException;

/**
 * Converts PHP configuration files to a PHP array.
 *
 * The file should only hold the PHP config array preceded by "return".
 *
 * Example PHP config file:
 * <code>
 * <?php
 * return array(
 *   'rootLogger' => array(
 *     'level' => 'info',
 *     'appenders' => array('default')
 *   ),
 *   'appenders' => array(
 *     'default' => array(
 *       'class' => 'LoggerAppenderEcho',
 *       'layout' => array(
 *           'class' => 'LoggerLayoutSimple'
 *        )
 *     )
 *   )
 * )
 *
 * </code>
 */
class LoggerConfigurationAdapterPHP implements LoggerConfigurationAdapter
{
    /**
     * Convert.
     *
     * @param string $input Url.
     *
     * @return array
     *
     * @access public
     *
     * @throws LoggerException
     */
    public function convert($input): array
    {
        if (!file_exists($input)) {
            throw new LoggerException("File [$input] does not exist.");
        }//end if

        // Load the config file.
        $data = @file_get_contents($input);

        if (!$data) {
            $error = error_get_last();
            throw new LoggerException('Error loading config file: ' . $error['message']);
        }//end if

        $config = @eval('' . $data);

        if (!$config) {
            $error = error_get_last();
            throw new LoggerException('Error parsing configuration: ' . $error['message']);
        }//end if

        if (empty($config)) {
            throw new LoggerException('Invalid configuration: empty configuration array.');
        }//end if

        if (!is_array($config)) {
            throw new LoggerException('Invalid configuration: not an array.');
        }//end if

        return $config;
    }
}
