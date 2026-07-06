<?php 
function calculerSousTotal($prix, $quantite){
    return $prix * $quantite;
}
function appliquerRemise($montant , $remise){
    return $montant - ($montant * $remise/100);
}
function categoriserDevis($total){
    if($total >100000){
        return "Devis important";
    }else if ($total >=30000){
        return"Devis standard";
    }else{
        return "petit devis";
    }
}

function genererLigneDevis($nom , $prix,$quantite){
    $prixTotal = calculerSousTotal( $prix, $quantite);
    $categorie = categoriserDevis($prixTotal);
    return "$nom : $quantite x $prix = $prixTotal FCFA - $categorie <br>";
 }

echo genererLigneDevis("Nettoyage canape", 50000, 5);
echo genererLigneDevis("Nettoyage fin de chantier", 30000, 1);
echo genererLigneDevis("Nettoyage airbnb", 150000, 1);

 ?>
