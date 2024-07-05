<?php
// /** puis entrée
/** 
 * Objet Compte bancaire
 */

class Compte
{
  // propriétés 
  // si public pas besoin de le mettre car par défaut
  /**
   * Titulaire du compte
   * @var string
  //possible de mettre private string titulaire : typage directement sur les propriétés */
  //si getter et setter après, pas besoin de typer sur les propriétés
    private $titulaire;
  /**
   * Solde du compte
   * @var float
   */
  private $solde;


  // Constantes (en maj et _ si plusieurs mots)
  // divent être initialisées au moment où sont créées.
  private const TAUX_INTERETS = 0.05;


  //constructeur de notre objet (__méthodemagique) - à chaque fois qu on construit un objet, il attendra un nom
  /**
   * constructeur du compte bancaire
   * @param string $nom Nom du titulaire
   * @param float $solde Montant du solde à l'ouverture (100 par défaut)
   */
  public function __construct(string $nom, float $montant = 100)
  {
    // on attribue le nom à la propriété 'titulaire' et 'solde' de l'instance créée
    $this->titulaire = $nom;
    $this->solde = $montant;

    // echo $this->decouvert();

    // on attribue le montant à la propriété solde (si on private la const, on change ici)
    $this->solde = $montant + ($montant * self::TAUX_INTERETS / 100);
  }

  /**
   * méthode magique pour la conversion en chaine de caractères
   * @return string
   */
  public function __toString()
  {
    return "Vous visualisez le compte de $this->titulaire, le solde est de $this->solde euros";
  }




  // accesseurs
  /**
   * getter de titulaire - retourne la valeur du titulaire du compte
   * @return string
   */
  public function getTitulaire(): string
  {
    return $this->titulaire;
  }

  /**
   * modifie le nom du titulaire et retourne l'objet
   * @param string $nom Nom du titulaire
   * @return Compte Compte bancaire
   */
  public function setTitulaire(string $nom): self
  {
    // self : mot-clé pr la classe elle-même
    // on vérifie si on a un titulaire, ne peut jamais être vide
    if ($nom != "") {
      $this->titulaire = $nom;
    }
    return $this;
  }

  /**
   * getter de solde - retourne le solde du compte
   * @return float solde du compte
   */
  public function getSolde(): float
  {
    return $this->solde;
  }

  /**
   * modifie le solde du compte et retourne l'objet
   * @param float $montant Montant du solde
   * @return Compte Compte bancaire
   */
  public function setSolde(float $montant): self
  {
    // self : mot-clé pr la classe elle-même
    // on vérifie si on a un montant positif, ne peut jamais être vide
    if ($montant >= 0) {
      $this->solde = $montant;
    }
    return $this;
  }






  /**
   * nouvelle méthode pour déposer de l'argent sur le compte
   * @param float $montant Montant déposé
   * @return void
   */
  public function deposer(float $montant)
  {
    // on vérifie si le montant est positif
    if ($montant > 0) {
      $this->solde += $montant;
    }
  }

  /**
   * retourne une chaine de caractères affichant le solde
   * @return string
   */
  public function voirSolde()
  {
    return "Le solde du compte est de $this->solde euros.";
    /* si on met des balises quand on affiche la fonction, 
mettre ici return à la place de echo */
  }

  /**
   * retirer un montant du solde du compte
   * @param float $montant Montant à retirer
   * @return void
   */
  public function retirer(float $montant)
  {
    // on vérifie le montant et le solde 
    if ($montant > 0 && $this->solde >= $montant) {
      $this->solde -= $montant;
    } else {
      echo "Impossible de retirer ce montant car invalide ou solde insuffisant.";
    }
    echo $this->decouvert();
  }

  /**
   * 
   */
  private function decouvert()
  {
    if ($this->solde < 0) {
      return "Vous êtes à découvert ";
    } else {
      return "Vous n'êtes pas à découvert ";
    }
  }
}
