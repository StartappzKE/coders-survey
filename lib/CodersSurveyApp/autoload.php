<?php
/**
 * Coder's Survey
 *
 * @author      Ulrich Kautz <uk@fortrabbit.de>
 * @copyright   2012 Ulrich Kautz
 * @link        http://coderssurvey.com
 * @version     1.0.0
 * @package     CodersSurvey
 *
 * Playing around with 5.4..
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

namespace CodersSurveyApp;

function default_class_loader( $class ) {
    if ( strpos( $class, 'CodersSurveyApp' ) !== 0 ) return;
    $class_file = __DIR__. DIRECTORY_SEPARATOR. str_replace( '\\', DIRECTORY_SEPARATOR,
        substr( $class, strlen( 'CodersSurveyApp/' ) ) );
    foreach ( [ "$class_file.php" ] as $fn ) {
        try {
            @include_once( $fn );
        }
        catch( Exception $e ) {}
        if ( class_exists( $class ) ) return;
    }
    return ;
}

spl_autoload_register( '\CodersSurveyApp\default_class_loader' );