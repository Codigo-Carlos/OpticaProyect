<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Receta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>


    <nav>

        <div class="nav-wrapper grey darken-1">


            <img src="../img/logoOptica.png" alt="">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="crearCliente.php">Crear Cliente</a></li>
                <li class="active"><a href="ingresarReceta.php">Ingresar Receta</a></li>
                <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>

            </ul>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li class="active"><a href="crearCliente.php" class="white-text">Crear Cliente</a></li>
        <li><a href="cerrarSesion.php" class="white-text">Cerrar Sesión</a></li>
    </ul>






    <!-- Contenedor base-->
    <div class="container">



        <div class="card-panel letra-oscura">

            <div class="row" id="buscarcliente">

                <div class="col l4 m6 s12">

                    <form @submit.prevent="buscar">

                        <div class="card">

                            <div class="card-content back">


                                <h6 class="center">Buscar cliente</h6>



                                <div class="input-field">

                                    <input type="text" v-model="rutCliente" id="rut">
                                    <label for="rut">Rut</label>

                                </div>

                                <div class="input-field center-align">

                                    <button class="btn-large">Buscar Cliente</button>
                                </div>






                            </div>





                        </div>

                    </form>



                </div>



                <div class="col l8 m6 s12 center">

                    <div class="card">


                        <div class="card-content back">

                            <h6 class="center">Datos del cliente</h6>



                            <ul class="collection">
                                <ol>
                                    <li v-for="(datos, index) of cliente">
                                    {{ index }}: {{ datos }}
                                    </li>
                                </ol>
                                
                            </ul>

                        </div>



                    </div>

                </div>




            </div>



        </div>


        <div class="card-panel" id="listaTipos">

            <div class="row">
                <div class="col l3 m6 s15 border">
                    <p>tipo lente</p>
                    <label>
                        <input type="radio" id="lejos" value="lejos" v-model="tipo_lentes">
                        <span>lejos</span>
                    </label>
                    <label>
                        <input type="radio" id="cerca" value="cerca" v-model="tipo_lentes">
                        <span>cerca</span>
                    </label>
                </div>


                <div class="col l3 m6 s15 border">

                    <p>tipo cristal</p>
                    
                    <select v-model="tipo_sel" class="browser-default">
                        <option v-for="option in tipos" v-bind:value="option.id_tipo_cristal">
                            {{ option.tipo_cristal }}
                        </option>
                    </select>
                    <span>Selected: {{ tipo_sel }}</span>
                    
                    <p>material de cristal</p>

                    <select v-model="material_sel" class="browser-default">
                        <option v-for="option in materiales" v-bind:value="option.id_material_cristal">
                            {{ option.material_cristal }}
                        </option>
                    </select>
                    <span>Selected: {{ material_sel }}</span>





                </div>

                <div class="col l3 m6 s15 border">

                    <p>base</p>
                    <select v-model="base_sel" class="browser-default">
                        <option value="" disabled selected hidden></option>
                        <option value="1">superior</option>
                        <option value="2">inferior</option>
                        <option value="3">interna</option>
                        <option value="4">externa</option>
                    </select>
                    <span>Selected: {{ base_sel }}</span>

                    <p>armazon</p>

                    <select v-model="armazon_sel" class="browser-default">
                        <option v-for="option in armazones" v-bind:value="option.id_armazon">
                            {{ option.nombre_armazon }}
                        </option>
                    </select>
                    <span>Selected: {{ armazon_sel }}</span>

                </div>

                <div class="col l3 m6 s15 center border">

                    <p>Ojo izquierdo</p>
                        <p>esfera</p>
                        <input type="text" v-model ="i_esfera">
                        <p>cilindro</p>
                        <input type="text" v-model ="i_cilindro">
                        <p>eje</p>
                        <input type="text" v-model ="i_eje">
                </div>

                <div class="col l3 m6 s15 center border">

                    <p>Ojo derecho</p>
                        <p>esfera</p>
                        <input type="text" v-model ="d_esfera">
                        <p>cilindro</p>
                        <input type="text" v-model ="d_cilindro">
                        <p>eje</p>
                        <input type="text" v-model ="d_eje">
                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col l4 m6 s12 center border">
                    <p>Prisma</p>
                    <input type="text" v-model ="prisma">
                    <p>Distancia Pupilar</p>
                    <input type="text" v-model ="distancia_p">
                    <p>observacion</p>
                    <div class="input-field col s12">
                        <textarea v-model = "observacion" class="materialize-textarea"></textarea>
                        <label for="textarea1">Textarea</label>
                    </div>
                </div>
                <div class="col l4 m6 s12 center border">

                    <p>Fecha entrega</p>
                    <div class="input-field">
                        <input type="text" class="datepicker" name="fecha" v-model = "fecha_e">
                        <label for="fecha">Fecha</label>
                    </div>
                    <p>Valor Lente</p>
                    <input type="text" v-model ="valor">
                    <p>Distancia Pupilar</p>
                    <input type="text" v-model ="rut_med">
                    <p>Prisma</p>
                    <input type="text" v-model ="nom_med">
                </div>

                <div class="col l4 m12 s12 center border">
                    <p>Fecha Retiro</p>
                    <div class="input-field">
                        <input type="text" class="datepicker" name="fecha" v-model = "fecha_e">
                        <label for="fecha">Fecha</label>
                        <button v-on:click="crearReceta()" class="btn-large">Crear REceta</button>
                    </div>

                </div>







            </div>




        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="../js/buscarOpciones.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../js/buscarCliente.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {

                'format': 'yyyy/mm/dd',
                'i18n': {

                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    weekday: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']

                }

            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>



</body>

</html>