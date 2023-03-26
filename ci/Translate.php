<?php
/** op-unit-translate:/ci/Translate.php
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
namespace OP;

//	...
$ci = OP::Unit('CI');

//	Language
$result = 'OP\UNIT\Translate\Language';
$args   = null;
$ci->Set('Language', $result, $args);

//	...
return $ci->GenerateConfig();
