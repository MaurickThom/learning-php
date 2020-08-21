<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		*,
		*::before,
		*::after {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			font-family: sans-serif;
			min-height: 100vh;
			display: flex;
			flex-direction: column;
		}

		ul,
		li {
			list-style: none;
		}

		.l-container {
			max-width: 1200px;
			margin: auto;
		}

		.nav-container {
			position: fixed;
			z-index: 10;
			top: 0;
			width: 100%;
			height: 4em;
			background-color: #222;
		}

		img {
			display: block;
			max-width: 100%;
		}

		.nav-menu {
			width: 100%;
			height: 100%;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;

		}

		.nav-menu__ul {
			display: flex;
		}

		.nav-menu__ul:first-child {
			width: 15%;
		}

		.nav-menu__ul:first-child li:first-child {
			margin-right: 1.5em;
		}

		li {
			cursor: pointer;
		}

		li:hover {
			text-shadow: #FB900A 0 .05em .15em;

		}

		main {
			margin-top: 6em;
			margin-bottom: 1em;
		}

		.product-container {
			width: 800px;
			display: grid;
			gap: 50px;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		}

		.product {
			margin: auto;
			padding: 1em;
		}

		.product__img {
			margin: auto;
			height: 200px;
		}

		.product__title {
			margin-top: .5em;
			margin-bottom: .5em;
			text-align: center;
		}

		.add {
			display: block;
			padding: .5em 1.5em;
			margin: auto;
			margin-top: 1em;
			border: none;
			color: #fff;
			background: #FB900A;
			cursor: pointer;
		}

		.product__description {
			width: 70%;
			margin: auto;
			display: flex;
			justify-content: center;
			justify-content: space-around;
		}

		.active {
			color: #FB900A;
			text-shadow: #FB900A 0 .05em .15em;
		}

		.aside {
			display: none;
			width: 30%;
			top: 4em;
			bottom: 0;
			overflow-y: auto;
			position: fixed;
			border-left: 1px solid black;
			right: 0;
			background-color: #fff;
			z-index: 10;
			padding: 10px;
			padding-left: 30px;
		}

		.show {
			display: block;
		}
		.aside__title{
			text-align: center;
		}
		.store-object{
			width: 70%;
			margin-top: 1.7em;
			display: flex;
		}
		.store-object__content{
			flex: 1;
			margin: 0 auto;
			padding-left: 2em;
			margin-top: .5em;
		}
		.store-object__img{
			width: 100px;
		}
		.store-object__title{
			font-size: 16px;
			font-weight: bold;
		}
		.store-object__description{
			margin-top: .5em;
			font-size: 14px;
		}
		.store-object__action{
			margin-top: 1em;
			display: block;
			padding: .5em 1.5em;
			border: none;
			color: #fff;
			background: #FB900A;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<div class="nav-container">
		<nav class="nav-menu l-container">
			<ul class="nav-menu__ul">
				<li class="active" id="juguetes">Juguetes</li>
				<li id="libros">Libros</li>
			</ul>
			<ul class="nav-menu__ul">
				<li id="cart">
					(<span id="quanProd">0</span>) Carrito
				</li>
			</ul>
		</nav>
	</div>
	<aside class="aside" id="aside">
		<h3>Total $0</h3>
	</aside>
	<main>
		<div class="product-container l-container" id="container"></div>
	</main>
	<script>
		const navbar = document.querySelector('.nav-menu');
		const aside = document.getElementById("aside");
		const items = document.getElementById('quanProd')
		const container = document.getElementById("container");
		const juguetes = document.getElementById("juguetes");
		const libros = document.getElementById("libros");
		const TEMPLATE_PRODUCT = ({
			img,
			price,
			id_product,
			quantity,
			name_product
		}) => `
			<div class="product" data-id=${id_product}>
				<img src="/Learning-php/shopping-cart${img}" alt="" class="product__img">
				<h4 class="product__title">${name_product}</h4>
				<div class="product__description">
					<div class="product__price">${price}$</div>
					<div class="product__quantity">n#${quantity}</div>
				</div>
				<button id="add" class="add">Agregar al carrito</button>
			</div>
		`;

		const TEMPLATE_PRODUCT_CARRITO = ({
			name_product,
			img,
			price,
			item,
			id_product,
			category
		}) => `
			<div data-category=${category} data-id=${id_product} class="store-object">
				<img src="/Learning-php/shopping-cart${img}" alt="" class="store-object__img">
				<div class="store-object__content">
					<h5 class="store-object__title">${name_product}</h5>
					<div class="store-object__description">
						<p>${item} de $${price}</p>
						<p>Subtotal $${price*item}</p>
					</div>
					<button id="remove" class="store-object__action">Quitar 1 item</button>
				</div class="store-object__content">
			</div>
		`;

		const makeHash = (docs, key) => {
			return docs.reduce((map, doc) => {
				map[doc[key]] = doc
				return map
			}, {});
		};
		let carrito = {
			"products": {
				"libros": {},
				"juguetes": {},
			},
			"count": 0,
			"total": 0
		};
		const products = {
			"libros": {},
			"juguetes": {}
		};

		function saveDB() {
			localStorage.setItem('carrito', JSON.stringify(carrito))
		}

		function readDB() {
			let local = JSON.parse(localStorage.getItem('carrito'))
			if (local != undefined) {
				carrito = JSON.parse(localStorage.getItem('carrito'))
			}
		}


		async function ajax({
			uri,
			method,
			body
		}) {
			const headers = new Headers();
			headers.append('Content-Type', 'application/json');
			const response = await fetch(uri, {
				method,
				body
			});
			const data = await response.json();
			return data;
		}
		async function renderProduct(id_category, name) {
			if (!Object.keys(products[name]).length) {
				const productsApi = await ajax({
					uri: "/Learning-php/shopping-cart/controller/ProductController.php?id_category=" + id_category,
					method: "GET"
				});
				products[name] = {
					...makeHash(productsApi, 'id_product')
				};
			}
			container.dataset.category = name;
			container.innerHTML = "";
			for (const id in products[name]) {
				if (!products[name][id]["quantity"]) continue
				container.innerHTML += TEMPLATE_PRODUCT(products[name][id]);
			}
		}

		function renderCarrito() {
			items.textContent = carrito["count"]
			aside.innerHTML = `<h3 class="aside__title">Total $${carrito["total"]}</h3>`
			for (const product in carrito["products"]) {
				for (const id in carrito["products"][product]) {
					if (carrito["products"][product][id]["item"] > 0)
						aside.innerHTML += TEMPLATE_PRODUCT_CARRITO({
							...carrito["products"][product][id],
							category: product
						});
				}
			}
		}

		function removeClassActive(element) {
			element.classList.remove("active")
		}

		function addClassActive(element) {
			element.classList.add("active")
		}
		navbar.addEventListener('click', async event => {
			const target = event.target
			if (!target?.id) return
			if (target.id === "juguetes") {
				if (target.classList.contains("active"))
					return;
				addClassActive(target)
				removeClassActive(libros)
				await renderProduct(1, "juguetes");
				return;
			}
			if (target.id === "libros") {
				if (target.classList.contains("active"))
					return;
				removeClassActive(juguetes);
				addClassActive(target);
				await renderProduct(2, "libros");
				return;
			}
			if (target.id === "cart") {
				aside.classList.toggle("show")
			}
		});
		container.addEventListener('click', async event => {
			const target = event.target
			if (target.id === "add") {
				const productId = target.parentNode.dataset.id
				const form = new FormData()
				form.append("toBuy", 1)
				const response = await ajax({
					uri: "/Learning-php/shopping-cart/controller/ProductController.php?id_product=" + productId,
					method: "POST",
					body: form
				});
				const category = container.dataset.category
				if (!carrito["count"] || !Object.keys(carrito["products"][category]).length || carrito["products"][category][productId] == undefined) {
					carrito["products"][category] = {
						...carrito["products"][category],
						[`${productId}`]: {
							...products[category][productId],
							item: 1
						}
					}
				} else {
					carrito["products"][category][productId]["item"]++
				}
				carrito["count"]++
				carrito["total"] = (+carrito["total"]) + (+products[category][productId]["price"])
				renderCarrito()
				saveDB()
				const quantity = --products[category][productId]["quantity"]
				target.parentNode.querySelector('.product__quantity').textContent = `n#${quantity}`

				if (!quantity) {
					target.parentNode.remove();
				}

			}
		});

		window.addEventListener('load', async () => {
			readDB()
			aside.classList.remove("show")
			renderCarrito()
			await renderProduct(1, "juguetes");
		});
		aside.addEventListener('click', async event => {
			const target = event.target;
			if (target.nodeName !== 'BUTTON') return
			const parent = target.parentNode.parentNode
			const category = parent.dataset.category
			const idProduct = parent.dataset.id
			if(products[category][idProduct]!=undefined){
				products[category][idProduct]["quantity"]++
			}
			carrito["total"] = (+carrito["total"]) - (+carrito["products"][category][idProduct]["price"])
			carrito["count"]--
			if (--carrito["products"][category][idProduct]["item"] == 0) {
				delete carrito["products"][category][idProduct];
			}

			const form = new FormData()
			form.append("toBuy", 0)
			const response = await ajax({
				uri: "/Learning-php/shopping-cart/controller/ProductController.php?id_product=" + idProduct,
				method: "POST",
				body: form
			});
			renderCarrito()
			saveDB()
			if (navbar.querySelector('.active').id === category) {
				await renderProduct(products[category][idProduct]["id_category"], category)
			}
		});
	</script>
</body>

</html>