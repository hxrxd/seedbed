<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url('www.hxrxd.net')); !!}
    <p>Scan me to return to the original page.</p>
</div>
</body>
</html>