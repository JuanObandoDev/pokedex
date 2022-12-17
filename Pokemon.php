<?php
    if(!empty($_GET) && isset($_GET["id_pokemon"])){
        $id_pokemon = $_GET["id_pokemon"];
    }else{
        header("Location: Pokedex.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/PokemonStyles.css">
    <title>Pokemon</title>
</head>
<body>
    
    <div class="container">
        <div class="container__info">
            <a href="Pokedex.php">← Go Back</a>
            <div id="abilities" class="container__abilities">
                <h3>Abilities</h3>
            </div>
            <div id="moves" class="container__moves">
                <h3>Moves</h3>
            </div>
        </div>
        <div id="img" class="container__img">

        </div>
    </div>

    <script>
        window.onload = function(){
            const abilities = document.getElementById("abilities");
            const moves = document.getElementById("moves");
            const img = document.getElementById("img");
            const id_pokemon = "<?php echo $id_pokemon; ?>";
            const url_api = "https://pokeapi.co/api/v2/pokemon/"+id_pokemon+"/";
            fetch(url_api)
            .then(response => response.json())
            .then(data =>{
                for(i=0; i<data.abilities.length; i++){
                    let ability_name = data.abilities[i].ability.name;
                    abilities.innerHTML += `<p>${ability_name}</p>`;
                }
                for(i=0; i<data.moves.length; i++){
                    let move_name = data.moves[i].move.name;
                    moves.innerHTML += `<p>${move_name}</p>`;
                }
                img.innerHTML = `
                <h1> ${data.name} </h1>
                <img src="${data.sprites.other.dream_world.front_default}" alt="${data.name}_image">`
            } )
        }
    </script>
</body>
</html>