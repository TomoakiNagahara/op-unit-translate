
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
	$OP.Translate.Language.Fetch = async function(){
		//	...
		const local_strage_key_name = '<?= substr( md5(__FILE__.__LINE__), 0, 10) ?>';

		//	...
		const save_item = localStorage.getItem(local_strage_key_name);
		if( save_item ){
			return JSON.parse(save_item)['result'];
		}

		//	...
		const url      = "<?= OP()->Config('translate')['url_language_list'] ?>";
		console.log(`Fetch: ${url}`);

		//	...
		const response = await fetch(url);
		const json     = await response.json();
		console.log(json);

		//	...
		if(!json['status'] ){
			console.error('"status" is not true', json);
			return;
		}
		//	...
		if( json['errors'] ){
			console.error('Have errors', json['errors']);
			return;
		}
		//	...
		if(!json['result'] ){
			console.error('"result" is empty', json);
			return;
		}

		//	...
		localStorage.setItem(local_strage_key_name, JSON.stringify(json));

		//	...
		return json['result'];
	};
};
