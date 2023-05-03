function ricerca() {
    var temp = document.getElementById("query").innerHTML;
    document.getElementById("query").innerHTML = "";

    var file = JSON.parse(temp);
    var testo = '<div class="container-fluid table-responsive"><h1 class="display-5 fw-bold">Storico non conformità</h1><br><table class="table table-striped table-hover"><tr><th>ID</th><th>User Riscontro</th><th>Origine</th><th>Causa</th><th>User Correzione</th><th>Azione Correttiva</th><th>Data Scadenza</th><th>isCorretta</th><th>User Verifica</th><th>isVerificata</th><th>isChiusa</th></tr>';

    for (var i = 0; i < file.length; i++) {
      var nc = file[i];
      testo += '<tr><td>'+nc['ID_NC']+'</td><td>'+nc['UserRiscontro']+'</td>';
      if (nc['isInterna']==1) testo += '<td>'+nc['Nome_Reparto']+'</td>';
      else testo += '<td>'+nc['Nominativo']+'</td>';
      testo += '<td>'+nc['Causa']+'</td><td>'+nc['UserCorrezione']+'</td><td>'+nc['Azione_Correttiva']+'</td><td>'+nc['DataScadenza']+'</td><td>'+nc['isCorretta']+'</td><td>'+nc['UserVerifica']+'</td><td>'+nc['isVerificata']+'</td><td>'+nc['isChiusa']+'</td></tr>';
    }
    testo += '</table></div>';
    document.getElementById("testo").innerHTML = testo;
}
window.onload = function(){ricerca()};
