<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Formule 1</title>
    </head>
    <body>
        <label for="party">Choisir l'instant :</label>
        <input id="date" type="datetime-local" name="partydate"  type=datetime-local value="2023-09-03T13:00:00" step="1">
        <input id="boutton" type="button" value="Valider" onclick="recupererValeurDatetime()"/>
        
        <div>
            <label for="party">Choisir l'instant :</label>
            <input id="date1" type="datetime-local" name="partydate"  type=datetime-local value="2023-09-03T13:00:00" step="1">
            <input id="date2" type="datetime-local" name="partydate"  type=datetime-local value="2023-09-03T13:00:00" step="1">
            <input id="boutton" type="button" value="Valider" onclick="recupererLesValeurDatetime()"/>
        </div>

        
        <section>
            <h3>Vitesse et régime moteur</h3>
            <p>
                Données: <span id="reponse"></span>
            </p>
        </section>
        <script>
            function recupererValeurDatetime() {
                var inputDatetime = document.getElementById("date").value;
                var reqHttp= new XMLHttpRequest();
                var url="http://127.0.0.1/exotest/rest.php";
                var contenuHTML = "";
                reqHttp.onreadystatechange=function()
                {   
                    if(this.status == 200 && this.readyState == 4)
                {   var texteRecu = this.responseText;
                    var donnees=JSON.parse(texteRecu);
                    var count = (Object.keys(donnees).length);
                    for (let i = 0; i < count; i++){
                        contenuHTML += donnees[i]['VitesseBDD']+"km/h  "+donnees[i]['InstantMesureBDD']+" "
                        +donnees[i]['RegimeBDD'] + "<br>";
                    }

                    document.getElementById("reponse").innerHTML = contenuHTML;
                }
            }
            reqHttp.open("GET",url +"?date_heure="+ inputDatetime, true);
            reqHttp.setRequestHeader("Content-Type","application/json");
            reqHttp.send();
            }
            function recupererLesValeurDatetime() {
                var DateDebut = document.getElementById("date1").value;
                var DateFin = document.getElementById("date2").value;
                var reqHttp= new XMLHttpRequest();
                var url="http://127.0.0.1/exotest/rest.php";
                var contenuHTML = "";
                reqHttp.onreadystatechange=function()
                {   
                    if(this.status == 200 && this.readyState == 4)
                {   var texteRecu = this.responseText;
                    console.log(texteRecu);
                    var donnees=JSON.parse(texteRecu);
                    var count = (Object.keys(donnees).length);
                    for (let i = 0; i < count; i++){
                        contenuHTML += donnees[i]['VitesseBDD']+"km/h  "+donnees[i]['InstantMesureBDD']+" "
                        +donnees[i]['RegimeBDD'] + "<br>";
                    }

                    document.getElementById("reponse").innerHTML = contenuHTML;
                }
            }
            reqHttp.open("GET",url +"?date_heure_debut="+ DateDebut+"&date_heure_fin="+DateFin, true);
            reqHttp.setRequestHeader("Content-Type","application/json");
            reqHttp.send();
            }
        </script>
    </body>
</html>

