<?php
$items = '[' . implode(',', $_POST['item']) . ']';
$customer = '{ "email": "' . $_POST['email'] . '" }'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Checkout</title>
	<script type="module" src="https://ui.payfunc.com/checkout/payfunc-checkout/payfunc-checkout.esm.js"></script>
	<script nomodule="" src="https://ui.payfunc.com/checkout/payfunc-checkout/payfunc-checkout.js"></script>
	<link href="https://theme.payfunc.com/light/index.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="https://brand.payfunc.com/icon/apple-icon.png">
	<link rel="icon" type="image/x-icon" href="https://brand.payfunc.com/icon/favicon.ico">
</head>
<body style="width: 100%; max-width: 20em; margin-left: auto; margin-right: auto;">
	<header><h1>Checkout</h1></header>
	<main>
		<form action="../done/" method="post">
			<payfunc-checkout
				currency="SEK"
				items='<?php echo $items ?>'
				api-key="<?php echo getenv('PAYFUNC_PUBLIC_KEY') ?>"
				customer='<?php echo $customer ?>'></payfunc-checkout>
		</form>
	</main>
</body>
</html>
