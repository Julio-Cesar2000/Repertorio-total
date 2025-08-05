// Alterar Conteúdo:

document.getElementById("titulo").innerText = "Novo Título";
document.getElementById("paragrafo").innerHTML = "<b> Texto em negrito <b>";

// Alterar estilos:

document.getElementById("caixa").style.backgroundColor = "blue";
document.getElementById("caixa").style.fontSize = "20px";

// Criar elemento:

let novoParagrafo = document.createElement("p");
novoParagrafo.innerText = "Este é um novo parágrafo";
document.body.appendChild(novoParagrafo);

// Remover elemento:
let elemento = document.getElementById("texto");
elemento.remove;

// Modificar atributos:

document.getElementById("imagem").setAttribute("src", "nova-imagem", "png");
document.getElementById("link").setAttribute("href", "https://google.com");
