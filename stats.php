<?php

$file = file_get_contents("open_stats_coronavirus.json");
$stats = json_decode($file);

$paysDemande = strtolower($_GET['pays']);
$moisDemande = $_GET['mois'];
$anneeDemande = $_GET['annee'];


$i = 0;
$paysPrecedent='';
foreach ($stats as $stat)
{

  if ($stat->nom != $paysPrecedent)
  {
    $paysPrecedent = $stat->nom;
    $listePays[] = ucfirst($stat->nom);
  }

  if ($stat->nom == $paysDemande)
  {
    if ($moisDemande && $anneeDemande)
    {
      $date = explode('-',$stat->date);
      $annee = $date[0];
      $mois = $date[1];
      $jour = $date[2];
      if (($mois == $moisDemande) && ($annee == $anneeDemande)) {
        $statsPays[] = $stat;
      }
    } else {
      $statsPays[] = $stat;
    }
  }
}

$i = 0;
foreach ($statsPays as $stat)
{
  $i++;
  //$statsParJour[$stat->date] = [$stat->cas,$stat->deces,$i];
  $ripParJour[] = $stat->deces;
  $nombreJours[] = $i;
  $casParJour[] = $stat->cas;
}


$retour = array('ripParJour'=>$ripParJour,'nombreJours'=>$nombreJours,'casParJour'=>$casParJour,'listePays'=>$listePays);
$retour = json_encode($retour);

echo $retour;

?>