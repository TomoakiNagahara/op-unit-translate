<?php
/** op-unit-translate:/ci/Translate-Language.php
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

//	List
$result =  null;
$args   = 'html';
$ci->Set('List', $result, $args);

//	Template
$result = 'ci.txt';
$args   = 'ci.txt';
$ci->Set('Template', $result, $args);

//	...
return $ci->GenerateConfig();
