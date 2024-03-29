<?php

/**
 * LoggerRendererException.
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
 * Namespaces.
 */
namespace Log4Php\Renderers;

/**
 * Renderer used for Exceptions.
 */
class LoggerRendererException implements LoggerRenderer
{
    /**
     * Render.
     *
     * @param mixed $input Input.
     *
     * @return string
     *
     * @access public
     */
    public function render($input): string
    {
        // Exception class has a very decent __toString method so let's just use that instead of writing lots of code.
        return (string)$input;
    }
}
