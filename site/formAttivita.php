<html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Creazione attivitá</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1"/> <!--ottimizza la visione su mobile dello slider-->

  </head>
  <body>



    <h1>Crea la tua attività</h1>
    <form action="creazioneAttivita.php" method="post">





      <div class="form-group col-md-6">
      <label for="inputAddress">Cittá</label>
      <input type="text" class="form-control" id="citta"  placeholder="Inserisci citta" name="citta">
      </div>

      <div class="form-group col-md-6">
        <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="costo"  placeholder="Inserisci il prezzo per l'attività" name="costo">
        <span class="input-group-addon">.00</span>
      </div>
      </div>


          <div class="form-group col-md-6">
          <label for="lingua">Lingua</label>
          <select class="form-control" id="lingua" name="lingua">
            <option>null</option>
            <option>italiano</option>
            <option>inglese</option>
            <option>francese</option>
            <option>spagnolo</option>
            <option>tedesco</option>
            <option>cinese</option>
          </select>
          </div>
        </br>



    <div class="form-group col-md-12">
    <label for="inputDescrizione">Descrizione</label>
    <input type="text" class="form-control" id="descrizione" placeholder="Ciao ti porto a scoprire Roma con occhi diversi di chi la vive ogni giorno come me. Il tour prevede visita Colosseo, fori Imperiali e Vaticano." name="descrizione">
  </div>

    <div class="form-group">
      <div class="text-center">
  <button type="submit" class="btn btn-primary" name="inviaDatiAttivita">CREA</button>
</div>
</div>
  </form>

    </body>
    </html>
