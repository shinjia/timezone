<?php

$msg = '';

// 取得目前設定
if (date_default_timezone_get())
{
    $msg .= 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}
else
{
	$msg .= '無 date_default_timezone_get() 函式可用';
}


if (ini_get('date.timezone'))
{
   $msg .= 'date.timezone: ' . ini_get('date.timezone');
}
else
{
	$msg .= '無 init_get() 函式可用';
}

// 設定時區

$now1 = date('Y-m-d H:i:s', time());

date_default_timezone_set('Asia/Taipei');
$now2 = date('Y-m-d H:i:s', time());


if (ini_set())
{
	ini_set('date.timezone', 'Asia/Taipei');
	$now3 = date('Y-m-d H:i:s', time());
}
else
{
	$now3 = '無 init_set() 函式可用';
}



$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Timezone</title>
</head>

<body>
<h1>目前設定狀況時間</h1>
<p>{$msg}</p>

<h1>現在時間</h1>
<p>未指定前：{$now1}</p>
<p>台北地區：{$now2}</p>
<p>ini_set：{$now3}</p>

<hr />
{$source}
</body>
</html>
HEREDOC;

echo $html;


$source = '<pre>';
$source .= htmlentities(highlight_string(file_get_contents(__FILE__)));
$source .= '</pre>';
?>