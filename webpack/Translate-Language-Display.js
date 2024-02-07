
/** op-unit-translate:/Translate-Language-Display.js
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
if( typeof $OP.Translate.Language.Display === 'undefined' ){
	//	...
	$OP.Translate.Language.Display = function(languages){
		//	...
		const target = document.querySelector("#<?= OP()->Config('translate')['language_area_id'] ?>");
		//	...
		for(const[lang_code, values] of Object.entries(languages)) {
			const dir         = values['dir'];  // Text direction. For example, Arabic.
			const lang_name   = values['name']; // English name.
			const native_name = values['nativeName'];
			//	...
			let element = document.createElement('li');
				element.dir               = dir;
				element.dataset.lang      = lang_code;
				element.dataset.lang_name = lang_name;
				element.innerText         = native_name;
			target.appendChild(element);
		}
	};
};
