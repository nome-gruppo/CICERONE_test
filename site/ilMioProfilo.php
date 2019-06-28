<?php
namespace classi\users;
use classi\utilities\Functions;
require_once '../classi/users/Turista.php';
require_once '../classi/users/Cicerone.php';
require_once '../classi/utilities/Functions.php';
define('COSTO_PREMIUM', 9.99);
session_start();
$utente = $_SESSION['utente'];
$_SESSION['costo_premium'] = COSTO_PREMIUM;
$functions = new Functions();
?>

<html lang="it">

<head>
  <meta charset="UTF-8">
  <title>Area riservata</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <!--Fogli di stile datepicker-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />

  <!--Fine fogli di stile datepicker-->

  <!--Script datepicker-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js"></script>
  <!--Fine script datepicker-->

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--ottimizza la visione su mobile dello slider-->
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <h2> Il mio profilo </h2>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $utente->getName(); ?></a>
            <ul class="dropdown-menu">
              <li><a href="ilMioProfilo.php">Il mio profilo</a></li>
              <?php
              if ($utente instanceof Cicerone) {
                echo '<li><a href="gestioneAttivita.php">Le mie attività</a></li>';
                echo '<li><a href="recensioniCicerone.php">Recensioni utenti</a></li>';
              } else {
                echo '  <li><a href="#">Attività in programma</a></li>
                    <li><a href="#">Attività svolte</a></li>';
              }
              ?>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <br />
=======
<?php if($utente instanceof Turista){
  $functions->stampaNavbarTurista($utente->getName());
}else{
  $functions->stampaNavbarCicerone($utente->getName());
} ?>
>>>>>>> d9f0816b664ec844abee174b4c6d89215218885d

<?php if($utente instanceof Turista){
  $functions->stampaNavbarTurista($utente->getName());
}else{
  $functions->stampaNavbarCicerone($utente->getName());
} ?>


  <div class="container-fluid">
    <form action="modificaDati.php" method="post">

      <div class=" col-sm-2 col-xs-1">
      </div>

      <div class="col-sm-8 col-xs-10">
        <table class="table table-striped">

          <tbody>
            <tr>
              <th>Nome</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='nome'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getName(); ?>" name="nome">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Cognome</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='cognome'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getSurname(); ?>" name="cognome">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Data di nascita</th>
              <td>
                <div class='input-group date col-sm-9 col-xs-10' id='data_nascita'>
                  <input type='text' class="form-control" placeholder="<?= $functions->DateDb_to_Date($utente->getBirthDate()); ?>" name="data_nascita">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Email</th>
              <td><?= $utente->getContact()->getMail() ?></td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='vecchia_password'>
                  <input type='password' class="form-control" placeholder="Vecchia password" name="vecchia_password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
                <br />
                <div class='input-group col-sm-9 col-xs-10' id='nuova_password'>
                  <input type='password' class="form-control" placeholder="Nuova password" name="nuova_password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
                <br />
                <div class='input-group col-sm-9 col-xs-10' id='ripeti_password'>
                  <input type='password' class="form-control" placeholder="Ripeti password" name="ripeti_password">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Telefono</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='telefono'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getContact()->getPhone_num(); ?>" name="telefono">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Paese</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='nazione'>
                  <select class="form-control" id="nazione" name="nazione">
                    <option value=""><?= $utente->getAddress()->getNation(); ?></option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp;
                      Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian
                      Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African
                      Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of
                      Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre &amp; Miquelon">St Pierre &amp;
                      Miquelon</option>
                    <option value="St Vincent &amp; Grenadines">St Vincent
                      &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome &amp; Principe">Sao Tome &amp;
                      Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States of America">United States of
                      America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana
                      Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select> <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Provincia</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='provincia'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getCounty(); ?>" name="provincia">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Città</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='citta'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getCity(); ?>" name="citta">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>Indirizzo</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='indirizzo'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getStreet(); ?>" name="indirizzo">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <tr>
              <th>CAP</th>
              <td>
                <div class='input-group col-sm-9 col-xs-10' id='CAP'>
                  <input type='text' class="form-control" placeholder="<?= $utente->getAddress()->getCAP(); ?>" name="CAP">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
                </div>
              </td>
            </tr>
            <?php
            if ($utente instanceof Cicerone) {
              echo '<tr>';
              echo    '<th>Valutazione utenti</th>';
              echo    '<td>' . $utente->getValutazione() . '</td>';
              echo '</tr>';
              echo '<tr>';
              echo    '<th>Info premium</th>';
              echo    '<td>';
              echo '<div class="row">';
              echo '<div class="col-sm-7 col-xs-7">';

              if ($utente->getPremiumDate() == '0000-00-00') {

                echo 'Non sei ancora premium';
                echo '</div>';
                echo '<div class="col-sm-3 col-xs-3">';
                echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#premium">Diventa premium</button></div></td>';
              } else {

                echo $utente->getPremiumDate();
                echo '</div>';
                echo '<div class="col-sm-3 col-xs-3">';
                echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#premium">Disdici premium</button></div></td>';
              }
            }
            ?>
          </tbody>
        </table>

        <!-- Tasti -->
        <div class="row">
          <div class="col-sm-2 col-xs-2">
          </div>
          <div class="col-sm-3 col-xs-3">
            <button type="submit" class="btn btn-primary" name="modifica_dati">Modifica dati</button>
          </div>

          <div class="col-sm-3 col-xs-3">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#eliminaAccount">Elimina account</button>
          </div>

          <div class="col-sm-2 col-xs-2">
          </div>
        </div>
        <!-- Fine tasti -->

      </div>
      <div class="col-sm-2 col-xs-1">
      </div>

      <!-- Modal premium -->
      <div class="modal fade" id="premium" tabindex="-1" role="dialog" aria-labelledby="premiumLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <!--header modal-->
            <div class="modal-header">
              <?php

              if ($utente->getPremiumDate() == '0000-00-00') {
                echo '<h3 class="modal-title" id="premiumLabel">Vuoi diventare premium?</h3>';
                echo '</div>';  //fine header modal
                echo '<div class="modal-body">';
                echo "Il costo dell'abbonamento premium è di €" . COSTO_PREMIUM . " al mese.<br>";
                echo "L'abbonamento ti consentirà di inserire un numero illimitato di attività.";
                echo "L'abbonamento premium ha un costo mensile di €" . COSTO_PREMIUM . ".<br>";
                echo "Ti consentirà di inserire un numero illimitato di attività e potrai disdirlo in qualsiasi momento.";
                echo '</div>';
              } else {
                echo '<h3 class="modal-title" id="premiumLabel">Sicuro di voler disdire il tuo abbonamento premium?</h3>';
                echo '</div>';  //fine header modal
                echo '<div class="modal-body">';
                echo 'Ci dispiace che tu voglia disdire il tuo abbonamento premium.<br>';
                echo 'Ti ricordiamo che verranno conservate solo le 3 attività future create per prime.';
                echo '</div>';
              }
              ?>

              <br />
              <!--Tasti modal-->
              <div class="modal-footer">
                <div class="row">
                  <div class="col-sm-2 col-xs-2">
                  </div>

                  <div class="col-sm-3 col-xs-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                  </div>
                  <div class="col-sm-3 col-xs-3">
                    <?php
                    if ($utente->getPremiumDate() == '0000-00-00') {
                      echo '<button type="submit" class="btn btn-primary" name="diventa_premium">Diventa premium</button>';
                    } else {
                      echo '<button type="submit" class="btn btn-primary" name="disdici_premium">Disdici premium</button>';
                    }
                    ?>
                  </div>

                  <div class="col-sm-2 col-xs-2">
                  </div>

                  <div class="col-sm-2 col-xs-1">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Fine Modal premium-->
        <!--i div sono corretti anche per se il compilatore no (a causa dei div degli echo)-->


        <!-- Modal elimina account -->
        <div class="modal fade" id="eliminaAccount" tabindex="-1" role="dialog" aria-labelledby="eliminaAccountLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!--header modal-->
              <div class="modal-header">
                <h3 class="modal-title" id="eliminaAccountLabel">Sicuro di voler eliminare l'account?</h3>
              </div>
              <!-- fine header modal-->
              <div class="modal-body">
                Una volta eliminato l'account sarà impossibile recuperare i tuoi dati
              </div>
              <br />
              <div class="modal-footer">
                <div class="row">
                  <div class="col-sm-2 col-xs-2">
                  </div>

                  <div class="col-sm-3 col-xs-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                  </div>
                  <div class="col-sm-3 col-xs-3">
                    <button type="submit" class="btn btn-danger" name="elimina_account">Elimina account</button>
                  </div>

                  <div class="col-sm-2 col-xs-2">
                  </div>
                  <div class="col-sm-2 col-xs-1">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Fine Modal elimina account-->


    </form>
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!--Script Datepicker-->
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    jQuery(function() {
      jQuery('#data_nascita').datepicker({
        format: 'dd/mm/yyyy',
        endDate: '+0d',
        orientation: "bottom auto",
        autoclose: true
      });

    });
  </script>
  <!--Fine script Datepicker-->

</body>

</html>
