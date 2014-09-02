<?
function get_data($url = '', $request = array()) {
	
	$ch = curl_init($url);
	$opts[CURLOPT_POST] = true;
	$opts[CURLOPT_POSTFIELDS] = http_build_query($request);
	$opts[CURLOPT_RETURNTRANSFER] = true;
	curl_setopt_array($ch,$opts);
	$response = curl_exec($ch);
	$response = json_decode($response,1);
	
	return $response;
}
?>
