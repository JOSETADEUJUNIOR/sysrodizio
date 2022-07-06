<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {
        case '-9':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Venda Não iniciada!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

          </script>";
            break;
        case '-7':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Senha precisa ter no minimo 6 caracteres!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

          </script>";
            break;
        case '-6':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Email ja existe!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
        case '-5':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
                  Swal.fire({
          
                      icon: 'error',
                      title: 'Oopss..',
                      width: 'auto',
                      html: '<h3>E-mail ou senha invalidos</h3>',
                      showConfirmButton: false,
                      timer: 4000,
                  })
    
                  setTimeout(function(){
                     window.location='" . $pag_ret . "';
                  }, 2000);
              </script>";
            break;

        case '-4':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
                      Swal.fire({
              
                          icon: 'warning',
                          title: 'Alerta',
                          width: 'auto',
                          html: '<h3>Campo confirmar senha precisa ser igual ao campo senha!</h3>',
                          showConfirmButton: false,
                          timer: 4000,
                      })
        
                  </script>";
            break;
        case '-3':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Não há registros para a data selecionada!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
        case '-2':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'warning',
                  title: 'Alerta',
                  width: 'auto',
                  html: '<h3>Não foi possível excluir o registro, pois o mesmo esta em uso!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;

        case '-1':
            echo '<div class="alert alert-danger">
        Ocorreu um erro na ação. Tente Mais tarde;
        </div>';
            break;

        case '0':
            echo '<div class="alert alert-warning">
            Preencher (os) campos obrigatório(os);
            </div>';
            break;
        case '1':
            //echo '<div class="alert alert-success">
            //Ação realizada com sucesso!
            //  </div>';
            echo "<script>
              Swal.fire({
      
                  icon: 'success',
                  title: 'Sucesso',
                  width: 'auto',
                  html: '<h3>Dados Salvos com sucesso!</h3>',
                  showConfirmButton: false,
                  timer: 4000,
              })

              setTimeout(function(){
                 window.location='" . $pag_ret . "';
              }, 2000);
          </script>";
            break;
    }
}
