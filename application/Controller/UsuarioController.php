<?php 

namespace Mini\Controller;

use Mini\Model\Usuario;

class UsuarioController {
    public function index (){
        require APP.'view/Usuarios.php';
    }

    public function tabla(){
        $usuario = new Usuario();
        $salida="";

        if(isset($_POST['nombre'])){
            $usuario->__SET("nombres_usuario", $_POST["nombre"]);
            $lista = $usuario->listar();
        }else {
            $usuario->__SET("nombres_usuario", "");
            $lista = $usuario->listar();
        }

        if(empty($lista)){
        $salida.="No hay registros";
        }else {
        $salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tipo Documento</th>
                <th>Número Documento</th>
                <th>Tipo Usuario</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
        foreach($lista as $value):
        if($value->estado_usuario==1){
        $estados = "Inhabilitar";
        $texto = "Activo";
        $color = "red";
        } else {
        $estados = "Habilitar";
        $texto = "Inactivo";
        $color = "green";
        }
        $salida.="<tr>
                <td>
                    ".$value->nombres_usuario."
                </td>
                <td>
                    ".$value->apellidos_usuario."
                </td>
                <td>
                    ".$value->tipo_documento."
                </td>
                <td>
                    ".$value->numero_documento."
                </td>
                <td>
                    ".$value->rol_usuario."
                </td>
                <td>
                    ".$value->usuario."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                    <button id='cambiarPass' value=".$value->id_usuario." title='Cambiar contraseña' style = 'background-color: gray'><i class='fas fa-key'></i></button>
                </td>
                <td>
                    <button class='modificar' id='editar_usuario' value=".$value->id_usuario.">Modificar</button>
                </td>
                <td>
                <button style='background-color: ".$color." ;' id='Estado_usuario' value=".$value->id_usuario.">".$estados."</button>
                </td>
    </tr>";
        endforeach;
            $salida.="</tbody></table>";
        }
            echo $salida;
    }

    public function guardar (){
        $usuario = new Usuario();
        $usuario->__SET("nombres_usuario", $_POST['txtnombres']);
        $usuario->__SET("apellidos_usuario", $_POST['txtapellidos']);
        $usuario->__SET("tipo_doc", $_POST['txttipo_doc']);
        $usuario->__SET("numero_doc", $_POST['txtnumero_doc']);
        $usuario->__SET("rol_usuario", $_POST['txttipo_usu']);
        $usuario->__SET("usuario", $_POST['txtuser']);
        $usuario->__SET("clave", $_POST['txtclave']);
        $usuario->__SET("fecha_expedicion", $_POST['txtfec_exp']);
        $consulta = $usuario->buscar_usuario();
        if(empty($consulta)){
        if($usuario->guardar()){
            $_SESSION['RESPUESTA']= "Usuario guardado correctamente";
        }else {
            $_SESSION["RESPUESTA"] = "Usuario No guardado";
        }
        }else{
            $_SESSION["RESPUESTA"] = "El usuario ya existe";
        }

        $_SESSION['LOCAL']= "1";
        header("location: ".URL."Login/menu");
    }

    public function editar(){
        $usuario = new Usuario();

        if(isset($_POST['id'])){
        $usuario->__SET("id", $_POST['id']);
        $p = $usuario->consultar_usuario();
        echo json_encode($p,JSON_FORCE_OBJECT);
        }
    }

    public function modificar (){
        $usuario = new Usuario();
        $usuario->__SET("id", $_POST['id']);
        $usuario->__SET("nombres_usuario", $_POST['txtnombres']);
        $usuario->__SET("apellidos_usuario", $_POST['txtapellidos']);
        $usuario->__SET("tipo_doc", $_POST['txttipo_doc']);
        $usuario->__SET("numero_doc", $_POST['txtnumero_doc']);
        $usuario->__SET("rol_usuario", $_POST['txttipo_usu']);
        $usuario->__SET("usuario", $_POST['txtuser']);
        $usuario->__SET("fecha_expedicion", $_POST['txtfec_exp']);

        if($usuario->modificar()){
            $_SESSION['RESPUESTA']= "Usuario modificado correctamente";
        }else {
            $_SESSION["RESPUESTA"] = "Usuario No modificado";
        }

        $_SESSION['LOCAL']= "1";
        header("location: ".URL."Login/menu");
    }

    public function estado_usuario(){
        $usuario = new Usuario();
        if(isset($_POST['id']) && isset($_POST['estado'])) {
        $usuario->__SET("id", $_POST["id"]);
        $usuario->__SET("estado", $_POST["estado"]);


        if($usuario->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
    }

    public function cambiar_clave(){
        $usuario = new Usuario();
        $usuario->__SET("clave", $_POST["clave"]);
        $usuario->__SET("id", $_POST["id"]);

        if($usuario->modificar_contrase()){
            echo "Si";
            unset($_SESSION['RECUPERACION']);
        }else {
            echo "No";
        }
    }
}
