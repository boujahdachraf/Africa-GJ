<?php 
require './connection.php';
$data = 'SELECT * FROM pays';
$resultat = mysqli_query($connectdata,$data);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afrique Geo</title>
    <link rel="stylesheet" href="./src/input.css">
    <link rel="stylesheet" href="./src/output.css">
</head>
<body class="bg-gray-100 font-sans"> 
    <!-- Header -->
    <header class="bg-amber-700 text-white p-4 shadow-md flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="Img\Africa-Map-PNG-Photo.png" alt="Logo Africa Geo" class="h-10">
            <h1 class="text-2xl font-bold">AFRICA GEO</h1>
        </div>
        <nav class="flex space-x-6">
            <a href="#" class="text-white hover:text-yellow-200">Recherche</a>
            <a href="#" class="text-white hover:text-yellow-200">Contact</a>
            <a href="#" class="text-white hover:text-yellow-200">Connexion</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto py-8">
        <!-- Section: Ajouter un pays -->
        <section class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold text-green-700 mb-4">Ajouter un Pays</h2>
            <form method="post" action="src/inc/add_client.php" id="add-country-form" class="space-y-4">
                <div>
                    <label for="country-name" class="block font-medium">Nom du Pays</label>
                    <input type="text" name="country" id="country-name" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Ex : Maroc" required>
                </div>
                <div>
                    <label for="population" class="block font-medium">Population</label>
                    <input type="number" name="population" id="population" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Ex : 36 millions" required>
                </div>
                <div>
                    <label for="languages" class="block font-medium">Langues</label>
                    <input type="text" name="langue" id="languages" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Ex : Arabe, Français" required>
                </div>
                <div>
                    <label for="key-cities" class="block font-medium">Villes</label>
                    <div id="cities-container" class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <input type="text" class="flex-1 border-gray-300 rounded-lg shadow-sm" placeholder="Nom de la ville" required>
                            <select name="select" class="border-gray-300 rounded-lg shadow-sm">
                                <option value="capitale">Capitale</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" id="add-city" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-400">Ajouter une Ville</button>
                </div>
                <button type="submit" class="bg-amber-700 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600">Ajouter</button>
            </form>
        </section>

        <!-- Section: Liste des pays -->
        <section class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-green-700 mb-4">Liste des Pays</h2>
            <ul id="countries-list" class="space-y-4">
                <?php 
                    /*$show_data = "SELECT 
    c.id_continent, 
    c.nom AS continent_name, 
    p.id_pays, 
    p.nom AS country_name, 
    p.population, 
    p.langues, 
    v.id_ville, 
    v.nom AS city_name, 
    v.type AS city_type
FROM 
    continent c
JOIN 
    pays p ON c.id_continent = p.id_continent
JOIN 
    ville v ON p.id_pays = v.id_pays;
";*/
                    //$result = $connectdata->query($show_data);
                    
                ?>
                <?php while($row = $resultat->fetch_assoc()):
                    
                    ?>
                <li class="border border-gray-300 rounded-lg p-4">
                    <h3 class="text-lg font-b   ld"><?php echo $row['nom'] ?></h3>
                    <p><span class="font-medium">Population :</span> <?php echo $row['population'] ?></p>
                    <p><span class="font-medium">Langues :</span> <?php echo $row['langues'] ?></p>
                    <p><span class="font-medium">Ville :</span><?php //echo $row['city_name'] ?> (<?php //echo $row['city_type'] ?>)</p>
                    <div class="mt-4">
                        <a class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-400">Modifier</a>
                        <a href="src/inc/delete.php?id=<?php echo $row['id_pays'] ?>" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-400">Supprimer</a>
                    </div>
                </li>
                <?php endwhile ?>
                <!-- D'autres pays peuvent être ajoutés ici dynamiquement -->
            </ul>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-amber-700 text-white text-center py-4">
        <p>&copy; 2024  - Africa Géo-Junior. Tous droits réservés.</p>
    </footer>

    <script>
        document.getElementById('add-city').addEventListener('click', () => {
            const citiesContainer = document.getElementById('cities-container');
            const cityTemplate = document.createElement('div');
            cityTemplate.className = 'flex items-center space-x-2';
            cityTemplate.innerHTML = `
                <input type="text" class="flex-1 border-gray-300 rounded-lg shadow-sm" placeholder="Nom de la ville" required>
                <select class="border-gray-300 rounded-lg shadow-sm">
                    <option value="capitale">Capitale</option>
                    <option value="autre">Autre</option>
                </select>
            `;
            citiesContainer.appendChild(cityTemplate);
        });
    </script>
</body>
</html>
