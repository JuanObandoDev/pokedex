<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/PAStyles.css">
    <title>Pokedex</title>
</head>
<body>
    
    <div class="container">
        <div class="container__title">
            <h1 class="title">Pokedex</h1>
        </div>
        <div class="container__RegAndLog">
            <a href="logout.php">logout</a>
        </div>
        <div id="contenidoPokemon" class="container__contents">
            <button class="botonVM" data-url="https://pokeapi.co/api/v2/pokemon/?offset=0&limit=20" onclick="cargarMas(this)" >View More ↓</button>
        </div>
    </div>
    <script src="./assets/js/PAMain.js"></script>
</body>
</html>