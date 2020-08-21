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
		}

		.show {
			display: block;
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
	<aside class="aside" id="aside"></aside>
	<main>
		<div class="product-container l-container" id="container"></div>
	</main>
	<script>
		const navbar = document.querySelector('.nav-menu');
		const aside = document.getElementById("aside")
		const container = document.getElementById("container")
		const juguetes = document.getElementById("juguetes")
		const libros = document.getElementById("libros")
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

		const makeHash = (docs,key)=>{
				return docs.reduce((map,doc)=>{
						map[doc[key]]=doc
						return map
				},{})
		}

		const products = {
			"libros": {},
			"juguetes": {}
		}

		const carrito = [

		]

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
		async function renderProduct(id_category,name) {
			if(!Object.keys(products[name]).length){
				const productsApi = await ajax({
					uri: "/Learning-php/shopping-cart/controller/ProductController.php?id_category=" + id_category,
					method: "GET"
				});
				products[name] = {...makeHash(productsApi,'id_product')}
			}
			container.dataset.category = name
			container.innerHTML = ""
			for(const id in products[name]){
				container.innerHTML += TEMPLATE_PRODUCT(products[name][id])
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
				await renderProduct(1,"juguetes");
				return;
			}
			if (target.id === "libros") {
				if (target.classList.contains("active"))
					return;
				removeClassActive(juguetes)
				addClassActive(target)
				await renderProduct(2,"libros");
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
				const response = await ajax({
					uri: "/Learning-php/shopping-cart/controller/ProductController.php?id_product=" + productId,
					method: "POST"
				});
				const category = container.dataset.category
				const quantity = --products[category][productId]["quantity"]
				target.parentNode.querySelector('.product__quantity').textContent =`n#${quantity}`

        if(!quantity){
					target.parentNode.remove()
				}
				
			}
		})

		window.addEventListener('load', async () => {
			aside.classList.remove("show")
			await renderProduct(1,"juguetes");
		});
	</script>
</body>

</html>