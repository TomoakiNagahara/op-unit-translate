<?php
/** op-unit-translate:/testcase/Language_List.php
 *
 * @created    2024-01-30
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

?>
<hr/>

	<p>Have "Translate-UNIT" display it.</p>
	<?php OP()->Unit('Translate')->Language()->List('html') ?>

<hr/>

	<!-- Display area -->
	<ul class="translate language list" id="<?= OP()->Config('translate')['language_area_id'] ?>"></ul>

	<!-- Template tag -->
	<template><li class="" data-lang=""></li></template>

	<!-- JavaScript -->
	<script>
	document.addEventListener('DOMContentLoaded', async function(){
		//	Get Language List.
		const json = await $OP.Translate.Language.Fetch();
		//	Display Language List from JSON.
		$OP.Translate.Language.Display(json);
		//	Set click event.
		$OP.Translate.Language.Event();
	});
	</script>

<hr/>
