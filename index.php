<?
require('./include/inc_global.php');
require('./lib/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Work Test</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<div id="container">
		<div class="content-body">
        	<h1 class="txt-header-blue" align="center">User Data</h1>
<?
$login_request['act'] = LOGIN_ACT ;
$login_request['email'] = LOGIN_EMAIL;
$login_request['password'] = LOGIN_PWD;

$url = SITE_NAME.'/api.php';
$login_data = get_data($url, $login_request);

if(!empty($login_data)){
	
	foreach($login_data['data'] as $login_key => $login_value){
		$data[$login_key] = $login_value;
	}
	$usercheck_request['act'] = USERCHECK_ACT;
	$usercheck_request['email'] = 'test@ipayoptions.com';
	$usercheck_request['loginid'] = $data['loginid'];
	$usercheck_data = get_data($url, $usercheck_request);
	
	if(!empty($usercheck_data)){
		foreach($usercheck_data['data'] as $usercheck_key => $usercheck_value){
			$usercheck[$usercheck_key] = $usercheck_value;
		}
	}
	
	if($usercheck_data['status'] == true){
	?>
    	
			<table width="50%" cellpadding="10" cellspacing="0" border="1" align="center" style="margin-top: 40px;">
				<tr>
                	<td align="center" width="20%"><strong>ID</strong></td>
                	<td align="center" width="50%"><strong>User</strong></td>
                	<td align="center" width="30%"><strong>Status</strong></td>
                </tr>
				<tr>
                	<td align="center"><?=$usercheck['userid']?></td>
                	<td align="left"><?=$usercheck_request['email']?></td>
                	<td align="center"><?=$usercheck['status']?></td>
                </tr>
			</table>
    <?
	}else{
	?>
			<table width="50%" cellpadding="10" cellspacing="1" border="0" align="center" style="margin-top: 40px;">
				<tr>
                	<td><?=$usercheck_request['email']?> does not exists in system.</td>
                </tr>
			</table>
    <?
	}
}else{
	echo '<script>alert("Login failed. Please check your data & try again.");</script>';
}
?>
    	</div>
    </div>
</body>
</html>
