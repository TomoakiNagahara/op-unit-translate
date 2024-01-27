
/** op-unit-translate:/Translate-Language-Fetch.js
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
if( typeof $OP.Translate.Language.Fetch === 'undefined' ){
	//	...
	$OP.Translate.Language.Fetch = async function(url){
		//	...
		console.log(`Fetch: ${url}`);

		//	...
		const response = await fetch(url);
		console.log(response);
		//	...
		const json     = await response.json();
		console.log(json);
		//	...
		if(!json['status'] ){
			console.error('status is not true', json);
			return;
		}
		//	...
		if( json['errors'] ){
			console.error('has errors', json);
			return;
		}
		//	...
		if(!json['result'] ){
			console.error('result is empty', json);
			return;
		}
		//	...
		return json['result'];
	};
};
