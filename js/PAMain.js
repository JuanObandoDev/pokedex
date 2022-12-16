const pokemonName = document.getElementById("htmlHead");

window.onload = function(){
    cargarMas(null);
}

const cargarMas = (buton) =>{
    let Api;
    const contenido = document.getElementById("contenidoPokemon");
    if(buton!=null){
        Api = buton.getAttribute("data-url");
    }else{
        Api = "https://pokeapi.co/api/v2/pokemon/"
    }
    fetch(Api)
	.then(response => response.json())
	.then(data => {
		contenido.lastElementChild.remove();
		for (i=0; i<data.results.length; i++) {
            let name = data.results[i].name.charAt(0).toUpperCase() + data.results[i].name.slice(1);
			let id_pokemon = data.results[i].url.replace("https://pokeapi.co/api/v2/pokemon/", "").replace("/", "");
            let pokemon = `<a class="pokemon" href="Pokemon.php?id_pokemon=${id_pokemon}" data-url="${data.results[i].url}" onclick="crearDatos(this);">${name}</a>`;
			contenido.innerHTML += pokemon;
		}
        let buton = `<button class="botonVM" data-url="${data.next}" onclick="cargarMas(this)" > View More ↓</button>`;
		contenido.innerHTML += buton;
    });
}