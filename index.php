<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Javo - Kanban</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
   </head>
   
   
   <body>
       <!-- Start your project here-->
       <div style="height: 100vh; background: linear-gradient(180deg, rgba(40,134,226,1) 0%, rgba(58,210,137,1) 100%);">

       <div class="d-flex align-items-center justify-content-center flex-column" style="height: 100vh;">

            <h2 class="h2 text-white">Iniciar Sesion</h2>

            <div class="card" style="width: 25rem;">
                <div class="card-body">
                        
                        <div class="md-form">
                           <input type="email" id="email" name="" class="form-control" required>
                           <label for="email">E-mail</label>
                        </div>

                        <div class="md-form">
                           <input type="password" id="password" name="" class="form-control" required>
                           <label for="password">Password</label>
                        </div>

                        <button type="button" class="btn btn-primary" id="ingresar" onclick="alerta()">Ingresar</button>
                </div>
            </div>

            <p class="text-white">Aun no tienes cuenta?<a class="btn btn-link text-white" href="createaccount.php">Crea una aqui</a></p>

       </div>

       </div>
       <!-- End your project here-->
       
       <!-- Modal pass incorrecto-->
       <div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-danger ">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Error</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      El password no es correcto!
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>
          </div>
       </div>

       <!-- Modal inactivo-->
       <div class="modal fade" id="3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-danger ">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Error</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      El usuario no esta activo!
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>
          </div>
       </div>
       
       <!-- Modal no registrado-->
       <div class="modal fade" id="4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-danger ">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Error</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      El usuario no esta registrado!
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>
          </div>
       </div>

       <!-- Modal no conexion-->
       <div class="modal fade" id="5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-danger ">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Error</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Debe llenar todos los campos!
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>
          </div>
       </div>

       <!-- Modal no conexion-->
       <div class="modal fade" id="6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-danger ">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Error</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Error al conectar a la base de datos!
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                  </div>
              </div>
          </div>
       </div>
       
       <!-- jQuery -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- Bootstrap tooltips -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
       <!-- Bootstrap core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <!-- MDB core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
       <!-- Your custom scripts (optional) -->
       <script type="text/javascript" src="">
            $(function(){
                $('#ingresar').click(function(){
                    var user = $('#email').val();
                    var pass = $('#password').val();

                    console.log(user + " " + pass);

                    /**/
                });
            });
       </script>

       <script type="text/javascript">
            function alerta(){
                var user = $('#email').val();
                var pass = $('#password').val();

                $.ajax({
                        type: "POST",
                        url: "php/login.php",
                        data: {
                            user: user,
                            password: pass 
                        },
                        success: function(data){
                            if (data == 1){
                                location.replace("php/kanban/dashboard.php");
                            }

                            if (data == 2){
                                modal2 = new bootstrap.Modal(document.getElementById("2"));
                                modal2.show();
                            }

                            if (data == 3){
                                modal3 = new bootstrap.Modal(document.getElementById("3"));
                                modal3.show();
                            }

                            if (data == 4){
                                modal4 = new bootstrap.Modal(document.getElementById("4"));
                                modal4.show();
                            }

                            if (data == 5){
                                modal5 = new bootstrap.Modal(document.getElementById("5"));
                                modal5.show();
                            }


                        },
                        error: function(){
                            modal6 = new bootstrap.Modal(document.getElementById("6"));
                            modal6.show();
                        }
                    });

            }
       </script>
   </body>


</html>