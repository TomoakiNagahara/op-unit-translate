<?php
/** op-unit-translate:/Translate.class.php
 *
 * @created    2023-03-26
 * @version    1.0
 * @package    op-unit-translate
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

 /** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP\UNIT;

/** use
 *
 */
use OP\IF_UNIT;
use OP\OP_CORE;
use OP\OP_CI;

/** Translate
 *
 * @created    2023-03-26
 * @version    1.0
 * @package    op-unit-translate
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
class Translate implements IF_UNIT
{
    /** use
     *
     */
    use OP_CORE, OP_CI;

    /** Return single instantiated Language object.
     *
     * @return \OP\UNIT\Translate\Language
     */
    static function Language()
    {
        //  ...
        static $_TranslateLanguage;

        //  ...
        if( $_TranslateLanguage === null ){
            //  ...
            require_once(__DIR__.'/Translate-Language.class.php');
            //  ...
            $_TranslateLanguage = new \OP\UNIT\Translate\Language();
        }

        //  ...
        return $_TranslateLanguage;
    }
}
