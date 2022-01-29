<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices</title>
</head>
<body>
    <h2>Première partie</h2>

    <h3>Exercice 1</h3>

    <p>Parmi les variables suivantes, lesquelles ont un nom valide : $a, $_a, $a_a,$AAA, $a!, $1a et $a1 ?</p>
    <p>Fausses : $a! et $1a n'ont pas la bonne synthaxe</p>

    <h3>Exercice 2</h3>

    <p>Modifier le code ci-dessous pour calculer la moyenne des notes.</p>

    <?php

    $note_maths = 15;
    $note_francais = 12;
    $note_histoire_geo = 9;
    $moyenne = 0;

    $moyenne = ($note_maths + $note_francais + $note_histoire_geo) / 3;

    echo $moyenne

    ?>

    <h3>Exercice 3</h3>

    <p>Calculer le prix TTC du produit.</p>

    <?php
    $prix_ht = 50;
    $tva = 20;
    $prix_ttc = 0;
    
    $prix_ttc = $prix_ht + ($prix_ht * (1 + $tva / 100));

    echo $prix_ttc;

    ?>

    <h2>Deuxième partie</h2>

    <h3>Exercice 1</h3>

    <p>Déclarer une variable $sexe qui contient une chaîne de caractères. Créer une
    condition qui affiche un message différent en fonction de la valeur de la
    variable.</p>

    <?php

    $sexe ="female";

    $msg = ($sexe == 'male') ? $msg = '<p>Bienvenue monsieur</p>' : $msg = '<p>Bienvenue madame</p>';
    echo $msg;

    ?>

    <h3>Exercice 2</h3>

    <p>Déclarer une variable $budget qui contient la somme de 1 234,56 €. Déclarer
    une variable $achats qui contient la somme de 1 357,99 €. Afficher si le
    budget permet de payer les achats.</p>

    <?php

    $budget = 1234.56;
    $achats = 1357.99;

    $msg = ($budget >= $achats) ? $msg = '<p>Le budget est suffisant</p>' : $msg = '<p>Le budget n\'est pas suffisant</p>';
    echo $msg;

    ?>

    <h3>Exercice 3</h3>

    <p>Déclarer une variable $heure qui contient la valeur de type integer de votre
    choix comprise entre 0 et 24. Créer une condition qui affiche un message si
    l'heure est le matin, l'après-midi ou la nuit.</p>

    <?php

    $heure = date(G, time()); // heure actuelle
    if($heure < 12){
        $msg = '<p>C\'est le matin</p>';
    }elseif(12 < $heure && $heure < 20){
        $msg = '<p>C\'est l\'après midi</p>';
    }else{
        $msg = '<p>C\'est le soir</p>';
    }

    echo $msg;
    ?>

    <h2>Troisième partie</h2>

    <h3>Exercice 1</h3>

    <p>En utilisant deux boucles for, écrire un script qui produit le résultat ci-dessous :</p>
    <p>1</p>
    <p>22</p>
    <p>333</p>
    <p>4444</p>
    <p>55555</p>

    <?php

    $html = "";
    for($i = 0; $i < 10; $i ++){
        for($z = 0; $z < $i; $z++){
            $html .= $i;
        }
        $html .= '<br>';
    }
    echo $html;

    ?>

    <h3>Exercice 2</h3>

    <p>En utilisant la boucle for, afficher la table de multiplication du chiffre 5.</p>

    <?php

    $html = "";
    for($i = 0; $i <= 10; $i++){
        $x = $i * 5;
        $html .= "5 x $i = $x<br>";
    }
    echo $html;

    ?>

    <h3>Exercice 3</h3>

    <p>En utilisant la boucle while, afficher tous les codes postaux possibles pour le
    département 77.</p>

    <table border="1">
        <tr>
        <?php

        $dep = 77000;
        while($dep < 77100){
            if($dep%25 == 0){
                echo "<tr><td>$dep</td>";
            }else{
            echo "<td>$dep</td>";
            }
            $dep++;
        }

        ?>
        </tr>
    </table>

    <h3>Exercice 4</h3>

    <p>Déclarer une variable avec le nom de votre
    choix et avec la valeur 0. Tant que cette
    variable n'atteint pas 20, il faut : l'afficher puis incrémenter sa valeur de 2</p>

    <p>Si la valeur de la variable est égale à 10, la
    mettre en valeur avec la balise HTML
    appropriée.</p>

    
    <?php

    $var = 0;
    $html = "";
    while($var <= 20){
        if($var == 10){
            $html .= "<p><b>$var</b></p>";
        }else{$html .= "<p>$var</p>";}
        $var += 2;
    }
    echo $html;


    ?>

    <h2>Quatrième partie</h2>

    <h3>Exercice 1</h3>

    <p>Quelle syntaxe permet d'afficher l'âge de Lulu ?</p>

    <?php

    $personnes = array(
        'Ryan' => 16,
        'Lulu' => 19,
        'Sacha' => 66
    );

    var_dump($personnes["Lulu"]);

    ?>

    <h2>Exercice 2</h2>

    <p>Quelle syntaxe permet d'afficher le deuxième élément du tableau $cocktails ?</p>

    <?php

    $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');

    var_dump($cocktails[1]);

    ?>

    <h2>Exercice 3</h2>

    <p>En utilisant le tableau ci-dessous, compter le nombre d'éléments du tableau.</p>

    <?php

    $pays_population = array(
        'France' => 67595000,
        'Suede' => 9998000,
        'Suisse' => 8417000,
        'Kosovo' => 1820631,
        'Malte' => 434403,
        'Mexique' => 122273500,
        'Allemagne' => 82800000
        );

    var_dump(count($pays_population));

    ?>

    <h2>Cinquième partie</h2>

    <h3>Exercice 1</h3>

    <p>Déclarer une variable de type array qui stocke les informations suivantes : France : Paris, Allemagne : Berlin, Italie : Rome</p>
    <p>Afficher les valeurs de tous les éléments du tableau en utilisant la boucle foreach.</p>

    <?php

    $html = "<ul>";
    $capitale = [
        "France"=>"Paris", 
        "Allemagne"=>"Berlin", 
        "Italie"=>"Rome"];
    foreach($capitale as $pays => $capital){
        $html .= "<li>La capitale de $pays est $capital</li>";
    }
    $html .= "</ul>";
    echo $html;

    ?>

    <h3>Exercice 2</h3>

    <p>En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires
    compris entre 0 et 50. Puis, tester si le chiffre 25 est dans le tableau et afficher
    un message en conséquence. Enfin, afficher le contenu de votre tableau avec
    var_dump.</p>

    <?php

    $table = [];
    for($i = 0; $i < 10; $i++){
        array_push($table, rand(0,50));
    /*    echo ($table[$i] == 25) ? <p>25 est présent dans le tableau</p>' : '<p>25 n\'est pas présent dans le tableau</p>';
        } */
    }
    /*if(in_array(25, $table)){
        echo '<p>25 est présent dans le tableau</p>';
    } */
    echo (in_array(25, $table))? '<p>25 est présent dans le tableau</p>' : '<p>25 n\'est pas présent dans le tableau</p>';
    var_dump($table);

    ?>

    <h3>Exercice 3</h3>

    <p>En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires
    compris entre 0 et 100. Répartir ensuite les valeurs dans deux tableaux distincts. Le
    premier contiendra les valeurs inférieures à 50 et le second contiendra les valeurs
    supérieures ou égales à 50. Enfin, afficher le contenu des deux tableaux.</p>

    <?php

    $table = [];
    $table2 = [];
    $table3 = [];
    for($i = 0; $i < 10; $i++){
        array_push($table, rand(0,100));
        if($table[$i] < 50){
            array_push($table2, $table[$i]);
        }else{
            array_push($table3, $table[$i]);
        }
    }

    /* for($i = 0; $i < count($table); $i++){
        if($table[$i] < 50){
            array_push($table2, $table[$i]);
        }else{
            array_push($table3, $table[$i]);
        }
    } */

    sort($table2); 
    sort($table3);
    echo '<p>Tableau de base</p>';
    var_dump($table);
    echo '<p>Tableau avec valeurs en dessous de 50</p>';
    var_dump($table2);
    echo '<p>Tableau avec valeurs au dessus de 50</p>';
    var_dump($table3);


    ?>

    <h3>Exercice 4</h3>

    <p>En utilisant le tableau ci-dessous, afficher seulement les pays qui ont une population
    supérieure ou égale à 20 millions d'habitants.</p>

    <?php

    $pays_population = array(
        'France' => 67595000,
        'Suede' => 9998000,
        'Suisse' => 8417000,
        'Kosovo' => 1820631,
        'Malte' => 434403,
        'Mexique' => 122273500,
        'Allemagne' => 82800000,
    );

    $html = "";
    foreach($pays_population AS $pays => $pop){
        if($pop > 20000000){
            $html .= $pays." ";
        }
    }
    echo "<p>$html</p>";

    // version avec boucle for()
    // for($i = 0; $i < count($pays_population); $i++){
    //     echo (current($pays_population)>20000000)? key($pays_population) : "";
    //     next($pays_population);
    // }
    ?>

    <h2>TD : tableau mutlidimentionnel</h2>

    <?php

    $pays = array(
        'France' => array(67595000, 'Paris', 'Europe'),
        'Suede' => array(9998000, 'Stockholm', 'Europe', 'SEK'),
        'Suisse' => array(8417000, 'Berne', 'Europe', 'CHF'),
        'Kosovo' => array(1820631, 'Pristina', 'Europe'),
        'Malte' => array(434403, 'La Valette', 'Europe'),
        'Mexique' => array(122273500, 'Mexico City', 'Amerique', 'MXN'),
        'Allemagne' => array(82800000, 'Berlin', 'Europe')
    );

    $html = "";
    foreach($pays AS $key => $val){
            if(!in_array('Europe', $val) || $key == 'France'){
                $html .= "<p><B>Pays</B> : $key, <B>Population</B> : $val[0], <B>Capitale</B> : $val[1], <B>Continent</B> : $val[2]";
                if(array_key_exists(3, $val)){
                    $html .= ", <B>Monnaie</B> : $val[3]</p>";
                }
            }
    }
    echo $html;
    ?>

</body>
</html>