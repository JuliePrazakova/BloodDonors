

function btnBlood() {
  document.getElementById("hiddenInputBlood").value = "krev";
}
function btnPlasma() {
  document.getElementById("hiddenInputPlasma").value = "plasma";
}
function passtoPersonalinfo() {
                
                var x = document.getElementById("personalInfo");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    } 
            }
 
                    // funkce která znemožňuje výběr víkendů 
function nonWorkingDates(date){
                                var day = date.getDay(), Ne = 0, Po = 1, Út = 2, St = 3, Čt = 4, Pá = 5, So = 6;
                                var closedDays = [[So], [Ne]];
                                    for (var i = 0; i < closedDays.length; i++) {
                                        if (day == closedDays[i][0]) {
                                            return [false];
                                            }

                                        }
                                    return[true];
                                };