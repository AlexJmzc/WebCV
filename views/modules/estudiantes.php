<html>

<head>

    <meta charset="UTF-8">
    <title>Servicios</title>
    <link rel="stylesheet" type="text/css" href="..\..\jquery-easyui-1.9.11\themes\default\easyui.css">
    <link rel="stylesheet" type="text/css" href="..\..\jquery-easyui-1.9.11\themes\icon.css">
    <link rel="stylesheet" type="text/css" href="..\..\jquery-easyui-1.9.11\themes\color.css">
    <script type="text/javascript" src="..\..\jquery-easyui-1.9.11\jquery.min.js"></script>
    <script type="text/javascript" src="..\..\jquery-easyui-1.9.11\jquery.easyui.min.js"></script>

    <link rel=StyleSheet href="../../css/template.css" typr="text/css">
</head>

<body>
    <header>
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Escudo_de_la_Universidad_T%C3%A9cnica_de_Ambato.png">
    </header>

    <div>


    </div>
    <nav>
        <ul>
            <li> <a href="inicio.php"> Inicio</a> </li>
            <li> <a href="nosotros.php"> Nosotros</a> </li>
            <li> <a href="estudiantes.php"> Servicios</a> </li>
            <li> <a href="contactanos.php"> Contactenos</a> </li>
            <li> <a href="../..\models\logout.php"> Cerrar sesión</a> </li>


        </ul>
    </nav>
    <br>

    <?php
    session_start();
    echo "BIENVENIDO/A ";
    echo $_SESSION['nom'];
    ?>
    <br><br>

    <form method="post">
        <input class="easyui-textbox" type="text" name="buscarr">
        <input class="easyui-linkbutton" iconCls="icon-add" style="width:5%; padding:6px 10px;" type="submit" name="buscador" value="Buscar">
    </form>
    <br><br>

    <h2>Formulario Ingreso Estudiantes</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_uta";
    $conns = mysqli_connect($servername, $username, $password, $dbname);

    if (isset($_POST['buscador'])) {
        $buscar = $_POST["buscarr"];
        $sql = "select * from estudiantes e, cursos c
                 where 
                 e.ID_CURSO_PER = c.ID_CURSO
                 AND e.APE_EST LIKE '%" . $buscar . "%'
                 order by CED_EST";

        $resultado = mysqli_query($conns, $sql);
    } else {

        $sql = "select * from estudiantes e, cursos c
                 where 
                 e.ID_CURSO_PER = c.ID_CURSO
                 order by CED_EST";

        $resultado = mysqli_query($conns, $sql);
    }

    ?>

    <div style="text-align:center">

        <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:auto;height:350px;margin-left:auto;margin-right:auto;" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="CED_EST" width="50">Cédula</th>
                    <th field="ID_CURSO_PER" width="50">Curso</th>
                    <th field="NOM_EST" width="50">Nombre</th>
                    <th field="APE_EST" width="50">Apellido</th>
                    <th field="DIR_EST" width="50">Dirección</th>
                    <th field="SEXO_EST" width="50">Sexo</th>
                    <th field="ECIVIL_EST" width="50">ECivil</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $filas['CED_EST'] ?></td>
                        <td><?php echo $filas['ID_CURSO_PER'] ?></td>
                        <td><?php echo $filas['NOM_EST'] ?></td>
                        <td><?php echo $filas['APE_EST'] ?></td>
                        <td><?php echo $filas['DIR_EST'] ?></td>
                        <td><?php echo $filas['SEXO_EST'] ?></td>
                        <td><?php echo $filas['ECIVIL_EST'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>


    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteUser()">Eliminar Estudiante</a>
        <a href="../../phpjasperxml/index.php" class="easyui-linkbutton" iconCls="icon-search" plain="true">Reporte Jasper</a>
        <a href="../../reportes.php" class="easyui-linkbutton" iconCls="icon-search" plain="true">Reporte FPDF</a>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" action="../../models/acceso.php">
            <input type="hidden" id="op" name="op" value="insertarAlumno">
            <h3>Datos Estudiante</h3>
            <div style="margin-bottom:10px">
                <input id="CED" name="CED_EST" class="easyui-textbox" type="number" data-options="validType:'CedMaxLength[10]'" required="true" label="Cédula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="ID_CURSO_PER" class="easyui-textbox" type="number" required="true" label="Curso:" data-options="validType:'CharMaxLength[1]'" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input id="NOM" name="NOM_EST" class="easyui-textbox" required="true" data-options="validType:'CharMaxLength[12]'" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" label="Apellido:" data-options="validType:'CharMaxLength[12]'" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="DIR_EST" class="easyui-textbox" required="true" label="Direccion:" data-options="validType:'CharMaxLength[30]'" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input id="SEXO_EST" class="easyui-combobox" required="true" name="SEXO_EST" style="width:100%;" data-options="
                    valueField: 'id',
                    textField: 'sexo',
                    label: 'SEXO:',
                    labelPosition: 'left'
                    ">
            </div>
            <div style="margin-bottom:10px">
                <input id="ECIVIL_EST" class="easyui-combobox" required="true" name="ECIVIL_EST" style="width:100%;" data-options="
                    valueField: 'id',
                    textField: 'estado',
                    label: 'ESTADO CIVIL:',
                    labelPosition: 'left'
                    ">
            </div>
        </form>
    </div>

    <div id="dlg1" name="dlg1" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons1'">
        <form id="fm1" name="dlg1" method="post" novalidate style="margin:0;padding:20px 50px" action="../../models/acceso.php">
            <input type="hidden" id="op" name="op" value="editarAlumno">
            <h3>Datos Estudiante</h3>
            <div style="margin-bottom:10px">
                <input id="CED" name="CED_EST" class="easyui-textbox" editable="false" label="Cédula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="ID_CURSO_PER" class="easyui-textbox" type="number" data-options="validType:'CharMaxLength[1]'" required="true" label="Curso:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="NOM_EST" class="easyui-textbox" required="true" data-options="validType:'CharMaxLength[12]'" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" data-options="validType:'CharMaxLength[12]'" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="DIR_EST" class="easyui-textbox" required="true" data-options="validType:'CharMaxLength[30]'" label="Direccion:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input id="SEX_EST" class="easyui-combobox" name="SEXO_EST" required="true" style="width:100%;" data-options="
                    valueField: 'id',
                    textField: 'sexo',
                    label: 'SEXO:',
                    labelPosition: 'left'
                    ">
            </div>
            <div style="margin-bottom:10px">
                <input id="ESCIVIL_EST" class="easyui-combobox" required="true" name="ECIVIL_EST" style="width:100%;" data-options="
                    valueField: 'id',
                    textField: 'estado',
                    label: 'ESTADO CIVIL:',
                    labelPosition: 'left'
                    ">
            </div>
        </form>
    </div>

    <div id="dlg2" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons2'">
        <form id="fm2" method="post" novalidate style="margin:0;padding:20px 50px" action="../../models/acceso.php">
            <input type="hidden" id="op" name="op" value="eliminarAlumno">
            <h3>¿Desea eliminar al estudiante?</h3>
            <div style="margin-bottom:10px">
                <input name="CED_EST" class="easyui-textbox" editable="false" label="Cédula:" style="width:100%">
            </div>


        </form>
    </div>



    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitForm()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>


    <div id="dlg-buttons1">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitForm1()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg1').dialog('close')" style="width:90px">Cancel</a>
    </div>


    <div id="dlg-buttons2">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitForm2()" style="width:90px">Confirmar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg2').dialog('close')" style="width:90px">Cancelar</a>
    </div>

    <script type="text/javascript">
        var url;

        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Estudiante');
            $('#fm').form('load');
            url = 'save_user.php';
        }

        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg1').dialog('open').dialog('center').dialog('setTitle', 'Editar Estudiante');
                $('#fm1').form('load', row);
                url = 'update_user.php?id=' + row.id;
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(result) {
                    var result = eval('(' + result + ')');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close'); // close the dialog
                        $('#dg').datagrid('reload'); // reload the user data
                    }
                }
            });
        }

        function submitForm() {
            $('#fm').form("submit");
            $('#fm').form({
                success: function(data) {
                    console.log(data);
                    if (data.indexOf("ERROR") !== -1) {
                        $.messager.alert("ERROR", data, "ERROR");
                    } else {
                        $.messager.alert(data);
                    }
                }
            });
        }

        function submitForm1() {
            $('#fm1').form("submit");
            $('#fm1').form({
                success: function(data) {
                    console.log(data);
                    if (data.indexOf("ERROR") !== -1) {
                        $.messager.alert("ERROR", data, "ERROR");
                    } else {
                        $.messager.alert(data);
                    }
                }
            });
        }

        function submitForm2() {
            $('#fm2').form("submit");
            $('#fm2').form({
                success: function(data) {
                    console.log(data);
                    if (data.indexOf("ERROR") !== -1) {
                        $.messager.alert("ERROR", data, "ERROR");
                    } else {
                        $.messager.alert(data);
                    }
                }
            });
        }

        function deleteUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg2').dialog('open').dialog('center').dialog('setTitle', 'Eliminar Estudiante');
                $('#fm2').form('load', row);
                url = 'update_user.php?id=' + row.id;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#SEXO_EST").combobox("reload", "sexo.json");
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#ECIVIL_EST").combobox("reload", "ecivil.json");
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#SEX_EST").combobox("reload", "sexo.json");
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#ESCIVIL_EST").combobox("reload", "ecivil.json");
        });
    </script>

    <script>
        $.extend($.fn.validatebox.defaults.rules, {
            CedMaxLength: {
                validator: function(value, param) {
                    return value.length <= param[0];
                },
                message: 'No se permiten mas de {0} digitos.'
            }
        });
    </script>

<script>
        $.extend($.fn.validatebox.defaults.rules, {
            CharMaxLength: {
                validator: function(value, param) {
                    return value.length <= param[0];
                },
                message: 'No se permiten mas de {0} digitos.'
            }
        });
    </script>

<script>
        $.extend($.fn.validatebox.defaults.rules, {
            noDigit: {
                validator: function(value, param) {
                    return value.length <= param[0];
                },
                message: 'No se permiten mas de {0} digitos.'
            }
        });
    </script>

    


</body>

</html>