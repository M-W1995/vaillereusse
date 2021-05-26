$(document).ready(function()
{


var lien = window.location.search.substr(1);

if (!lien)
{
    getDonnees(['france','','']); //par défaut: ensemble des données pour la france
} 
else 
{
    var urlParams = new URLSearchParams(window.location.search);
    pays = urlParams.get('pays');
    mois = urlParams.get('mois');
    annee = urlParams.get('annee');
    getDonnees([pays,mois,annee]);
    $("#pays option[value='"+pays+"']").prop('selected',true);
    $("#mois option[value='"+mois+"']").prop('selected',true);
    $("#annee option[value='"+annee+"']").prop('selected',true);
}

$('select').on('change',function()
{
    pays = $("#pays").val();
    mois = $("#mois").val();
    annee = $("#annee").val();
    data = [pays,mois,annee];
    history.pushState({}, null, 'index.php?pays='+pays+'&mois='+mois+'&annee='+annee);
    getDonnees(data);
});


function getDonnees(data)
{
    $.ajax(
    {
        method: "get",
        url: 'stats.php',
        dataType: "JSON",
        data: {pays: data[0], mois: data[1], annee: data[2]},
        success: function(data)
        {
            nombreJours = data['nombreJours'];
            ripParJour = data['ripParJour'];
            nombreCas = data['casParJour'];
            listePays = data['listePays'];

            if (!listePaysAffichee)
            {
                listePays.forEach(function(currentValue){
                    $('#pays').append('<option value="'+currentValue+'">'+currentValue+'</option>');
                });
                var listePaysAffichee = 1;
            }

            $('#myChart').remove();
            $('#graphique').append('<canvas id="myChart" style="max-height:400px"></canvas>');

            afficherGraph(nombreJours,ripParJour,nombreCas);
        },
        error: function(data)
        {
            console.log(data);
        }
    });
}



var myChart;
function afficherGraph(nombreJours,ripParJour,nombreCas)
{
    var ctx = document.getElementById('myChart').getContext('2d');
    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: nombreJours,
            datasets: [
            {
                label: 'Nombre de morts',
                data: ripParJour,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Nombre de cas',
                data: nombreCas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(0, 0, 0, 1)',
                ],
                borderWidth: 1
            }
            ]
        },
        options: {
          elements:{
            line:{
              tension:1
            },
            point:{
                radius:0
            }
          },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


});