<h1 class="text-center">Contact</h1>
<section id="formulaire">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputName" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            <label for="inputFirstName" class="form-label">Nom</label>
            <input type="text" class="form-control" id="inputFirstName">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Rue jean valjean">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Adresse (Suite)</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="N° Appartement, Etage">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Ville</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Région</label>
            <?php 
            $state= ["01 	Ain",
            "02 	Aisne",
            "03 	Allier",
            "04 	Alpes-de-Haute-Provence",
            "05 	Hautes-Alpes",
            "06 	Alpes-Maritimes",
            "07 	Ardèche",
            "08 	Ardennes",
            "09 	Ariège",
            "10 	Aube",
            "11 	Aude",
            "12 	Aveyron",
            "13 	Bouches-du-Rhône",
            "14 	Calvados",
            "15 	Cantal",
            "16 	Charente",
            "17 	Charente-Maritime",
            "18 	Cher",
            "19 	Corrèze",
            "2A 	Corse-du-Sud",
            "2B 	Haute-Corse",
            "21 	Côte-d'Or",
            "22 	Côtes d'Armor",
            "23 	Creuse",
            "24 	Dordogne",
            "25 	Doubs",
            "26 	Drôme",
            "27 	Eure",
            "28 	Eure-et-Loir",
            "29 	Finistère",
            "30 	Gard",
            "31 	Haute-Garonne",
            "32 	Gers",
            "33 	Gironde",
            "34 	Hérault",
            "35 	Ille-et-Vilaine",
            "36 	Indre",
            "37 	Indre-et-Loire",
            "38 	Isère",
            "39 	Jura",
            "40 	Landes",
            "41 	Loir-et-Cher",
            "42 	Loire",
            "43 	Haute-Loire",
            "44 	Loire-Atlantique",
            "45 	Loiret",
            "92 	Hauts-de-Seine",
            "93 	Seine-St-Denis",
            "94 	Val-de-Marne",
            "95 	Val-d'Oise",
            "971 	Guadeloupe",
            "972 	Martinique",
            "973 	Guyane",
            "974 	La Réunion",
            "976 	Mayotte"];
            ?>
            <select id="inputState" class="form-select">
            <option selected>Choisissez...</option>
            <?php foreach($state as $value): ?>
                <option><?php echo $value ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Code Postal</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Vous acceptez les termes d'utilisations (nous allons vendre vos données)
            </label>
            </div>
        </div>
        <div class="col-12 mb-5">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</section>