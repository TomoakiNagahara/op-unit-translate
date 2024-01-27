<?php
/** op-unit-translate:/TranslateLanguage.class.php
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
namespace OP\UNIT\Translate;

/** use
 *
 */
use OP\OP_CI;
use OP\OP_CORE;
use OP\OP_UNIT;
use OP\IF_UNIT;

/** Language
 *
 * @created    2023-03-26
 * @version    1.0
 * @package    op-unit-translate
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
class Language implements IF_UNIT
{
    /** use
     *
     */
    use OP_CORE, OP_CI, OP_UNIT;

    /** Display or Return Languages list.
     *
     * @created    2023-03-26
     * @param      string      $type
     * @return     boolean
     */
    static function List(string $type)
    {
        //  ...
        $ci = ( OP()->AppID() === 'CI' );

        //  ...
        $json = self::Fetch();

        //  ...
        switch($type){
            case 'html':
                $ci ? '': self::Template('ms-language.phtml',['json'=>$json]);
                break;

            case 'json':
                return $ci ? null: $json;

            default:
                OP()->Notice("Supported is html or json. ($type)");
                return false;
        }
    }

    /** Fetch the Languages list.
     *
     * @created    2023-03-26
     * @return     array
     */
    static function Fetch()
    {
        //  ...
        if( OP()->AppID() === 'CI' ){
            return null;
        }

        //  ...
        $key = md5(__FILE__.' #'.__LINE__);

        //  ...
        if(!$json = apcu_fetch($key) ){
            $json = `curl -sS "https://api.cognitive.microsofttranslator.com/languages?api-version=3.0&scope=translation"`;

            //  ...
            if( $json ){
                apcu_store($key, $json);
            }else{
                $json = ['translation'=>[]];
                $json = json_encode($json);
            }
        }

        //  ...
        return json_decode($json, true)['translation'];
    }
}
