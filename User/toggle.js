var state = false;
                      function toggle() {
                        if (state) {
                          document.getElementById("password").setAttribute("type", "password");
                          document.getElementById("eye").style.color = '#7a797e';
                          state = false;
                        } else {
                          document.getElementById("password").setAttribute("type", "text");
                          document.getElementById("eye").style.color = '#5887ef';
                          state = true;
                        }
                      }
                      function toggle1() {
                        if (state) {
                          document.getElementById("confirmPassword").setAttribute("type", "password");
                          document.getElementById("eye1").style.color = '#7a797e';
                          state = false;
                        } else {
                          document.getElementById("confirmPassword").setAttribute("type", "text");
                          document.getElementById("eye1").style.color = '#5887ef';
                          state = true;
                        }
                      }