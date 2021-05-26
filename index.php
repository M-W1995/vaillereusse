

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cobide-19</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>
<body>


<section class="hero is-info">
  <div class="hero-body has-text-centered">
    <p class="title is-2">Cobide-19</p>
    <p class="subtitle is-4">Statistiques</p>
  </div>
</section>

<section class="section">
  <div class="container has-text-centered">
    <div class="field select">
        <select id="pays" name="pays">

        </select>
    </div>
    <div class="field select">
        <select id="mois" name="mois">
           <option value="">Choisir un mois...</option>
           <option value="01">Janvier</option>
           <option value="02">Février</option>
           <option value="03">Mars</option>
           <option value="04">Avril</option>
           <option value="05">Mai</option>
           <option value="06">Juin</option>
           <option value="07">Juillet</option>
           <option value="08">Aout</option>
           <option value="09">Septembre</option>
           <option value="10">Octobre</option>
           <option value="11">Novembre</option>
           <option value="12">Decembre</option>
        </select>
    </div>
    <div class="field select">
          <select id="annee" name="annee">
          <option value="">Ensemble des données</option>
           <option value="2020">2020</option>
           <option value="2021">2021</option>
        </select>
    </div>

    <div id="graphique" style="margin-top:15px">
      <canvas id="myChart" style="max-height:400px"></canvas>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>


  
</html>