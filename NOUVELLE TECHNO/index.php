<?php
require_once 'classes/Compte.php';

// on instancie le compte (création et instanciation)

$compte1 = new Compte('Sam', 500);
// on écrit dans la propriété titulaire et solde
  // $compte1->titulaire = 'Sam';
  // $compte1->solde = 500;

//on dépose 100€
$compte1->deposer(100);

echo $compte1->getTitulaire(); //getter pour récup le nom si propriété est privée

$compte1->setSolde(200);

?>


<p><?= $compte1->voirSolde() ?></p>
<!-- si on met echo ds fonction, mettre ici $compte1->voirSolde() -->
<?php
$compte1->retirer(100);

var_dump($compte1);

// :: opérateurs de résolutions de portées (nom:Paamayim Nekudotayim)
// sert à accéder dans une classe à tout ce qui est static ou const
// echo "Le taux d'intérêt du compte est : " . Compte::TAUX_INTERETS . "%.";


// $compte2 = new Compte('Pierre-Henri', 5500.25);
  // $compte2->titulaire = 'Pierre-Henri';
  // $compte2->solde = 5500.25;
// var_dump($compte);
