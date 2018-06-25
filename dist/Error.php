<?php
/**
 * Hope - PHP 5.6 framework
 *
 * @author      Shvorak Alexey <dr.emerido@gmail.com>
 * @copyright   2011 Shvorak Alexey
 * @version     0.1.0
 * @package     Hope.Fail
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Hope\Fail
{

    use Exception;
    use Throwable;

    abstract class Error extends Exception
    {

        /**
         * Error constructor.
         *
         * @param string|array $message Message string or array with template and arguments
         * @param Throwable    $previous [optional] Previous exception instance
         * @param int          $code [optional] Error code. Default -1
         */
        public function __construct($message = "", Throwable $previous = null, $code = -1)
        {
            if (is_array($message)) {
                $message = $this->format($message);
            }

            parent::__construct($message, $code, $previous);
        }

        /**
         * Formatting error message
         *
         * @param array $params
         *
         * @return string
         */
        private function format(array $params)
        {
            if (false === isset($params[0]))
                return "Can't format message";

            return sprintf($params[0], ...array_slice($params, 1));
        }

    }

}

