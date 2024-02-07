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

	/** Translate strings.
	 *
	 * <pre>
	 * list($html1, $html2) = OP()->Translate(['<p>Hello, world!</p>','<p>This is test.</p>'], 'ja', 'en');
	 * </pre>
	 *
	 * @created    2024-02-01
	 * @param      array      $strings
	 * @param      string     $to_lang
	 * @param      string     $from_lang
	 * @return     array
	 */
	static function Strings(array $strings, string $to_lang, string $from_lang) : array
	{
		//	...
		foreach( $strings as & $string ){
			$string = html_entity_decode($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401);
		}

		/* @var $microsoft_translate \OP\UNIT\Microsoft_Translate */
		$microsoft_translate = OP()->Unit('microsoft_translate');
		$json = $microsoft_translate->Fetch($strings, $to_lang, $from_lang);
		$json = json_decode($json, true);
		$results = [];
		foreach( $json as $result ){
			$results[] = $result['translations'][0]['text'];
		}
		return $results;
	}
}
