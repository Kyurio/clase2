<?php
require_once RUTA_APP . '/vistas/inc/header.php';
?>
<div id="intranet">


  <!--  componente cabecera intranet -->
  <?php require_once RUTA_APP . '/helpers/components/cabecera.php' ?>
  <!-- end cabecera intranet -->

  <!-- tabs contendio intranet -->
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

      <!-- contenido de dashboard -->
      <div class="mt-2 py-2">
        <div class="card">
          <div class="card-body">
            <h6 class="font-weight-bold">dashboard</h6>
          </div>
        </div>
      </div>
      <!-- contenido de dashboard -->

    </div>
    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">

      <!-- contenido de productos -->
      <div class="mt-2 py-2">
        <div class="card">
          <div class="card-body">
            <h6 class="font-weight-bold">productos</h6>

            <div class="mt-1 mb-1 py-1">
              <button type="button" class="btn btn-sm btn-info" title="editar" name="button"><i class="fas fa-plus"></i></button>
            </div>

            <br>
            <table class="table table-sm table-hover text-center">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Accion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>zapatos</td>
                  <td>activo</td>
                  <td>500</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary" title="editar" name="button"><i class="fas fa-pen"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" title="eliminar" name="button"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-info" title="descativar" name="button"><i class="fas fa-ban"></i></button>
                    <button type="button" class="btn btn-sm btn-success" title="activar" name="button"><i class="fas fa-check"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <!-- contenido de productos -->

    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

      <!-- contenido de correo -->
      <div class="mt-2 py-2">
        <div class="card">
          <div class="card-body">
            <h6 class="font-weight-bold">correo</h6>

            <?php foreach ($datos['correos_recibidos'] as $item): ?>
              <p>
                <a data-toggle="collapse" href="#Mensjae<?php echo $item->Id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <small>Correo de:</small> <?php echo $item->nombre ?>
                </a>
              </p>
              <hr>
              <div class="collapse" id="Mensjae<?php echo $item->Id ?>">
                <p>
                  <?php echo $item->correo ?> - <?php echo $item->fono ?>
                </p>
                <p>
                  <?php echo $item->mensaje ?>
                </p>

              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </div>
      <!-- contenido de correo -->
    </div>
    <div class="tab-pane fade" id="estats" role="tabpanel" aria-labelledby="stats-tab">

      <!-- contenido de estadisticas -->
      <div class="mt-2 py-2">
        <div class="card">
          <div class="card-body">
            <h6 class="font-weight-bold">estadisticas</h6>

            <div class="row">
              <div class="col-md-4">
                <ul class="list-group mt-4">
                  <li class="list-group-item">Visitas</li>
                  <li class="list-group-item">Mensajes</li>
                  <li class="list-group-item">Productos</li>
                  <li class="list-group-item">Clientes</li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- contenido de estadisticas -->


    </div>
    <div class="tab-pane fade" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">

      <!-- contenido de configuracion -->
      <div class="mt-2 py-2">
        <div class="card">
          <div class="card-body">
            <h6 class="font-weight-bold">clientes</h6>
            <hr>

          </div>
        </div>
        <!-- contenido de configuracion -->

      </div>

    </div>
    <div class="tab-pane fade" id="config" role="tabpanel" aria-labelledby="config-tab">

      <!-- contenido de configuracion -->
      <div class="mt-2 py-2">
        <div class="card">
          <div class="card-body">
            <h6 class="font-weight-bold">configuracion</h6>
            <hr>

            <!-- tabs de configuraciones -->
            <div class="row">
              <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                  <a class="nav-link active" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social" role="tab" aria-controls="v-pills-social" aria-selected="true">Redes sociales</a>
                  <a class="nav-link" id="v-pills-profile-tab"  data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Nosotros</a>
                  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Ubicacion</a>

                </div>
              </div>
              <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">

                  <!-- configuracion de redes sociales y contacto -->
                  <div class="tab-pane fade show active" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">

                    <!-- formulario de configuracion de redes sociales -->
                    <div class="row">
                      <div class="col-md-6">
                        <form class="" action="index.html" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input class="form-control form-control-sm" type="text" placeholder="www.facebook.com/doublecode">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input class="form-control form-control-sm" type="text" placeholder="@doublecode01">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Instagram</label>
                            <input class="form-control form-control-sm" type="text" placeholder="@doublecode01">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Linkedin</label>
                            <input class="form-control form-control-sm" type="text" placeholder="/doublecode">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Pinterest</label>
                            <input class="form-control form-control-sm" type="text" placeholder="@doublecode">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Google plus</label>
                            <input class="form-control form-control-sm" type="text" placeholder="@doublecode">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Whatsapp</label>
                            <input class="form-control form-control-sm" type="text" placeholder="+569 65063392">
                            <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                          </div>
                          <button type="button" class="btn btn-dark btn-sm" name="button">Grabar</button>
                        </form>
                      </div>
                    </div>
                    <!-- formulario de configuracion de redes sociales -->


                  </div>
                  <!-- end configuracion de redes sociales y contacto -->

                  <!-- configuracion de informacion general de la web -->
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                    <!-- configuracion textos de la web - informacion quienes somos etc -->
                    <form class="" action="index.html" method="post">
                      <div class="container">
                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>Titulo</small></label>
                          <input class="form-control form-control-sm" type="text" placeholder="titulo">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>cuadro cuatro</small></label>
                          <textarea class="form-control form-control-sm" type="text" placeholder=""></textarea>
                          <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>Titulo</small></label>
                          <input class="form-control form-control-sm" type="text" placeholder="titulo">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>cuadro cuatro</small></label>
                          <textarea class="form-control form-control-sm" type="text" placeholder=""></textarea>
                          <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>Titulo</small></label>
                          <input class="form-control form-control-sm" type="text" placeholder="titulo">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>cuadro cuatro</small></label>
                          <textarea class="form-control form-control-sm" type="text" placeholder=""></textarea>
                          <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>Titulo</small></label>
                          <input class="form-control form-control-sm" type="text" placeholder="titulo">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><small>cuadro cuatro</small></label>
                          <textarea class="form-control form-control-sm" type="text" placeholder=""></textarea>
                          <small id="emailHelp" class="form-text text-muted">se utilizara en el link en toda la web como acceso directo</small>
                        </div>
                        <!-- end informacion web -->

                        <button type="button" name="button">Grabar</button>

                      </div>
                    </form>


                  </div>
                  <!-- end configuracion de informacion general de la web -->

                  <!-- geo map ubicacion -->
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                    <div class="container">
                      <div class="form-group">
                        <label for="exampleInputEmail1"><small>mapa</small></label>
                        <input class="form-control form-control-sm" type="text" placeholder="titulo">
                      </div>
                      <div class="form-group">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13738.4902480071!2d-71.20425024999999!3d-30.58819865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1598726460856!5m2!1ses-419!2scl" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                      </div>

                    </div>
                    <!-- end geo map ubicacion -->

                  </div>
                  <!-- end geo map-->

                </div>
              </div>
              <!-- end tabs configuraciones -->

            </div>
          </div>
        </div>
        <!-- contenido de configuracion -->

      </div>

    </div>

  </div>

  <!-- end contenido -->

  <?php
  require_once RUTA_APP . '/vistas/inc/footer.php';
  ?>
