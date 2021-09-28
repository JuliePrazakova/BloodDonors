<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet"type="text/css"  href="calendar.css" >
        <script src="javascript.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="jquery-ui-datepicker.min.js"></script>
       
        <title>DarujKrev.cz</title>
    </head>
    <body>
        <form action="confirmation.php" method="post">
            <div class="landingPart">
                <div>
                    <h1>Registrace dárců krve</h1>
 <?php
//check if there is no error msg in url - if so: display an error msg
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<div class="error">Vyplňte všechny údaje</div>';
         }
        else if ($_GET['error'] == "invalidinfo") {
            echo '<div class="error">Zadané jméno a příjmení jsou neplatné</div>';
         }
        else if ($_GET['error'] == "invalidemail") {
            echo '<div class="error">Zadaný email je neplatný</div>';
        }
        else if ($_GET['error'] == "invalidname") {
            echo '<div class="error">Zadané jméno je neplatné</div>';
        }
        else if ($_GET['error'] == "invalidsurname") {
            echo '<div class="error">Zadané příjmení je neplatné</div>';
        }
     }
?>
                       <h3>Chci darovat:</h3>         
                </div>
                <div id="buttons">
                    <a href="#personalInfo" onclick="btnBlood()" >
                        <div class="button" onclick="passtoPersonalinfo()" >Krev</div>
                    </a>
                    <script>function btnBlood() {
  document.getElementById("hiddenInputBlood").value = "krev";
}</script>
                    <input type="hidden" name="blood" id="hiddenInputBlood" >
                                          
                    <a href="#personalInfo" onclick="btnPlasma()">
                        <div class="button" onclick="passtoPersonalinfo()" >Plazmu</div>
                    </a>
                    <script>function btnPlasma() {
  document.getElementById("hiddenInputPlasma").value = "plazma";
}</script>
                     <input type="hidden" name="plasma" id="hiddenInputPlasma" >
                 </div>
            </div>
            <br><br>
            
 <!-- personal info part - displaying After click on krev / plasma -->
          <section id="personalInfo" style="display: none;">
            <hr>
            <br>
            <section>
                <div class="personalInfo-top"><p>Zadejte osobní údaje</p></div>
                <div>
                    <input type="text"  placeholder=" Jméno" class="form-box" name="name" required>
                </div>
                <div>
                    <input type="text" class="form-box" placeholder=" Příjmení" name="surname" required>
                </div>
                <div>
                    <input type="email" class="form-box" placeholder=" Email" name="email" required>
                </div> 
                <div> <?php include 'dOBirth.php';?></div>
                
                <div>
                    <select  name="bloodtype"  class="krskupina" required>
                        <option value="" selected disabled>Krevní skupina</option >
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="0+">0+</option>
                        <option value="0-">0-</option>
                    </select>
                </div>
                <br>
                <div class="GDPR-check">
                    <label> 
                        <input type="checkbox" class="checkboxSize" value="" required> Souhlasím se zpracováním osobních údajů
                    </label>
                </div>
                <br>        
              </section>
              <br>
              <div class="pickdateButton">
                <!-- the a href is essential, otherwise it wont slide down -->
                  <a href="#datepickerPart">
                    <div  onclick="document.getElementById('datepickerPart').style.display = 'block'">Vyberte datum odběru</div>
                  </a>
                            
              </div>
              <br><br>
            </section>
                    
                    
 <!-- Datepicker part -->               
            <section id="datepickerPart" style="display: none">
                <hr> 
                <div class="datepicker-box">
                    <p>Vyberte si datum odběru</p>
                    <p>Odběry jsou možné každý pracovní den</p>
                </div>
                <div id="calendar"> 
                    <p id="visibleDateSign" style="height: 30px;"></p>
                </div>
                <input type="hidden" id="visibleDate" name="visibleDate" required>              
                <input type="hidden" id="selectedDate" name="selectedDate" required>                
                        <script> 
                            
	                        $('#calendar').datepicker({
                                dateFormat: 'd-m-yy',
                    
                              beforeShowDay: nonWorkingDates,
		                      inline: true,
                                
                              selectWeek: true,
                              startDate: '01/02/2020',
                              minDate: "+1w", //past dates are prohibited
                              defaultDate: "+1w", //default date is +1week from today
		                      firstDay: 1, //= monday(1)
                              showOtherMonths: true,
                              monthNames: [ "Leden", "Únor", "Březen", "Duben", "Květen", "Červen", "Červenec", "Srpen", "Září", "Říjen", "Listopad", "Prosinec" ],
                              dayNamesMin: ['Ne', 'Po', 'Út', 'St', 'Čt', 'Pá', 'So'],
                              prevText: 'Předchozí',
                              nextText: 'Další', 
                              
                                //it has to be d-m-y, otherwise it wont insert into database (inn php is another setting)
                             onSelect: function(date) {
                              
                             document.getElementById("visibleDateSign").innerHTML = date;
                             document.getElementById("selectedDate").value = date;
                                  
                                    var stringDate = document.getElementById("visibleDateSign").innerHTML; 
                                    var replace = stringDate.replace(/-/g, ". ");
                                    document.getElementById("visibleDateSign").innerHTML = replace;
                                    document.getElementById("visibleDate").value = replace; 
                                //ensurence to always have selected date
                                    document.getElementById("buttonSubmit").style.display = "block";
                             },
                                });
                        // function to unable weekends = nonWorkingDates - in v .js
                        </script>
                <br>
                <input type="submit" class="buttonSubmit" id="buttonSubmit" style="display:none" value="Objednat" onclick="dateCheck()" name="btnSubmit" >
                <br><br>
            </section>
        </form>
    </body>
</html>

