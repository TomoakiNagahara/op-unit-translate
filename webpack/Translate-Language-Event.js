
/** op-unit-translate:/Translate-Language-Event.js
 *
 * @created    2023-03-26
 * @moved      2024-01-24
 * @version    1.0
 * @package    op-unit-translate
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

//	...
if( typeof $OP === 'undefined' ){
	$OP = {};
};

//	...
if( typeof $OP.Translate === 'undefined' ){
	$OP.Translate = {};
};

//	...
if( typeof $OP.Translate.Language === 'undefined' ){
	$OP.Translate.Language = {};
};

//	...
if( typeof $OP.Translate.Language.Event === 'undefined' ){
	$OP.Translate.Language.Event = function(){
		//	...
		const local_strage_key_name = "<?php echo OP()->Config('translate')['language_code_selected'] ?? 'null'; ?>";
		const query_selector = "#<?= OP()->Config('translate')['language_area_id'] ?> li";

		//	...
		document.querySelectorAll(query_selector).forEach(function(node){
			//	...
			node.addEventListener('click', function(e){
				//	...
				let target = e.target;
				let lang   = target.dataset.lang;

				//	Save selected language code to local strage. 
				localStorage.setItem(local_strage_key_name, lang);

				//	...
				location.reload();
			});
		});
	};
};
