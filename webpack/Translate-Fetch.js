
/** op-unit-translate:/Translate-Fetch.js
 *
 * @created    2023-01-22
 * @moved      2024-01-30
 * @version    1.0
 * @package    op-unit-translate
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

//	...
if( typeof $OP === 'undefined' ){
	$OP = {};
}

//	...
if( typeof $OP.Translate === 'undefined' ){
	$OP.Translate = {};
}

//	...
$OP.Translate.Fetch = async function(html){
	//	Get selected language code from language list.
	let language_code_selected = "<?= OP()->Config('translate')['language_code_selected'] ?>";
	var lang = '';
	if( language_code_selected ){
		lang = localStorage.getItem(language_code_selected);
	}
	if(!lang ){
		console.log('No language code selected.', language_code_selected, lang);
		return;
	}

	//	...
	let URL      = "<?= OP()->Config('translate')['url_translate'] ?>";
	let method  = "POST";
	let data    = {
		to     : lang,
		string : html,
	};
	let body    = Object.keys(data).map((key)=>key+"="+encodeURIComponent(data[key])).join("&");
	let headers = {
		'Accept'       : 'application/json',
		'Content-Type' : 'application/x-www-form-urlencoded; charset=utf-8',
	};

	//	...
	const response = await fetch(URL, {method, headers, body});
	const json     = await response.json();

	//	...
	if(!json['status'] ){
		console.error('status is not true', json);
		return html;
	}
	//	...
	if( json['errors'] ){
		console.error('Have errors', json['errors']);
		return html;
	}
	//	...
	if(!json['result'][0] ){
		console.error('result is empty', json);
		return html;
	}

	//	...
	return json['result'][0];
};
