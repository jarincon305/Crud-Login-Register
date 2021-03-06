<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Registro People</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
  </head>

    <body> 
        <!-- <button class="prueba">prueba</button> -->
        <nav class="navbar navbar-light bg-light">
            <div class="form-inline">
                <a href='cerrarSesion.php'>
                    <button class="btn btn-light mr-2 my-2 my-sm-0" type="submit">LogOut</button>
                </a>
            </div>    
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">            
                <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
                </div>    
            </div>    
        </div>    
        <br>

        <div class="container caja">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                            <thead class="text-center">
                                <tr>
                                    <th>Doc_id</th>
                                    <th>Doc_nombre</th>
                                    <th>Doc_codigo</th>
                                    <th>Doc_contenido</th>                                
                                    <th>Pro_prefijo</th>  
                                    <th>Tip_nombre</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody></tbody>        
                        </table>               
                    </div>
                </div>
            </div>  
        </div>   

        <!--Modal para CRUD-->
        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="formUsuarios">    
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label">DOC_NOMBRE:</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label">DOC_CONTENIDO</label>
                                        <input type="text" class="form-control" id="contents">
                                    </div>               
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label">DOC_ID_TIPO</label>
                                        <input type="number" class="form-control" id="type" min="1" max="5">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">DOC_ID_PROCESO</label>
                                        <input type="number" class="form-control" id="process" min="1" max="5">
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>  
            
        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- datatables JS -->
        <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
        <script type="text/javascript" src="main.js"></script>  
        <!-- <script type="text/javascript" src="main2.js"></script>   -->
    </body>
</html>
