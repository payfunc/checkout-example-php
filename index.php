<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/x-icon" href="./icon/favicon.ico">
	<title>Demo Shop</title>
	<style>
		th:not(:nth-of-type(2)),
		td:not(:nth-of-type(2)):not(:nth-of-type(3)) {
			text-align: right;
		}
	</style>
	<script>
		function calculateTotal(item) {
			return item.quantity * (item.price + item.vat)
		}
		function onChange(target) {
			const itemElement = target.parentElement.querySelector('#item')
			const item = JSON.parse(itemElement.value)
			item.quantity = Number.parseInt(target.textContent) || 0
			itemElement.textContent = JSON.stringify(item)
			const totalElement = target.parentElement.querySelector("#total")
			totalElement.textContent = calculateTotal(item).toString()
		}
	</script>
</head>
<body>
	<header>
		<h1>Demo Shop</h1>
	</header>
	<main>
		<form action="checkout/" method="post">
			<label for="email">email:</label><input type="email" name="email">
			<table id="item-table">
				<tr>
					<th>quantity</th><th colspan="2">name</th><th>price</th><th>vat</th><th>total</th>
				</tr>
				<template id="item-row-template">
					<tr>
						<td id="quantity" contenteditable oninput="onChange(this)"></td>
						<td id="number">ts001-b</td>
						<td id="name">{name}</td>
						<td id="price">119.60</td>
						<td id="vat">29.90</td>
						<td id="total"></td>
						<input type="hidden" name="item[]" value="" id="item">
					</tr>
				</template>
			</table>
			<button type="submit">Checkout</button>
		</form>
	</main>
</body>
<script defer>
	const items = [
		{
			number: "ts001-b",
			name: "Basic T-shirt, black",
			price: 200.00,
			vat: 50.00,
			quantity: 5,
		},
		{
			number: "ts001-w",
			name: "Basic T-shirt, white",
			price: 200.00,
			vat: 50.00,
			quantity: 10,
		},
	]
	const template = document.getElementById("item-row-template")
	const table = document.getElementById("item-table")
	for (const item of items) {
		const row = document.importNode(template.content, true)
		setElement(row, "item", JSON.stringify(item))
		setElement(row, "total", item.quantity * (item.price + item.vat))
		for (const property in item)
			if (item.hasOwnProperty(property))
				setElement(row, property, item[property])
		table.appendChild(row)
	}
	function setElement(row, property, value) {
		const field = row.querySelector("#" + property)
		if (field)
			if (field.hasAttribute("value"))
				field.value = value
			else
				field.textContent = value
	}
</script>
</html>
