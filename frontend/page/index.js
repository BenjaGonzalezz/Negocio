window.onload = async ()=>{
    let productos = await obtenerProducto();
    await mostrarProducto(productos);
    console.log(productos);
}

async function obtenerProducto(){
    let url = "https://api.mercadolibre.com/sites/MLU/search?category=MLU1144";
    
    let consulta = await fetch(url);
    let datos = await consulta.json();
    console.log(datos);
    let productos = datos.results;
   return productos;
}

function mostrarProducto(productos){
    let tBodyProductos = document.querySelector("#cuerpoProductos");
    tBodyProductos.innerHTML = "";
    productos.forEach(producto => {
        let tr = document.createElement("tr")
        tr.innerHTML+= `
        
            <td>${producto.title}</td>
            <td><a class="link" href="${producto.permalink}">Link</a></td>
            <td><img class="imagenproducto" src="${producto.thumbnail}"></td>
            <td class="precio">$ ${producto.price}</td>
            
        `;


        let boton = document.createElement("button")
        boton.onclick = ()=>{guardarProducto(producto)};
        let td = document.createElement("td");
        td.appendChild(boton);
        tr.appendChild(td);
        tBodyProductos.appendChild(tr);
        boton.textContent = "Guardar BD";
    });
}

async function guardarProducto(){
}