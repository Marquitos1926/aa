// Função para buscar e mostrar produtos no DOM
function fetchProducts() {
    fetch('list_products.php')
    .then(response => response.json()) // Converte a resposta para JSON
    .then(data => {
        const productList = documen.getElementById('productList');
        productList.innerHTML = ''; // Linpar a lista

        // loop por cada produto e adicionar ao DOM
        data.forEach(product => {
            const div = document.createElement('div');
            div.innerHTML = `
                <h3>${product.name}</h3>
                <p>Preço: ${product.price}</p>
                <button onclick="deleteProduct(${product.id})">Excluir</button>
                <button onclick="editProduct(${product.id}, '${product.name}',${product.price}, '${product.description}')">Editar</button>
             `;
            productList.appendChild(div);
        });
    });
}

// Função para excluir produto
function deleteProduct(id) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        fetch(`delete_product.php?id=${id}`, { method: 'GET' }) // Fazer requisição GET para deletar
        .then(() => fetchProducts()); // Atualizar a lista de produtos
    }
}

function editProduct (id, name, price, description) {
    document.getElementById('name').value = name;
    document.getElementById('price').value = price;
    document.getElementById('description').value = description;

    const form = documen.getElementById('productForm');
    form.action = `edit_product.php?id=${id}`; // mudar o destino do formulario

}

// chamar a função paraa mostrar produtos ao carregar a págima
window.onload = fetchProducts;