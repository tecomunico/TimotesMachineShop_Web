<?php
/*	
    Clase Conexion Mysqli
    Autor: Edgar Rafael García
    Fecha: Septiembre 2017
    PHP 7.1
*/
//
class BaseDeDatos 
{
    public $conexion;
    public $consulta;
    public $resultado;
    public $fila;
    public $arr_asoc;
    public $n_filas;
    public $ultimo_registro;

    public function conectar()
    {
        $this->conexion =  new mysqli(BDD_SERVIDOR,BDD_USUARIO,BDD_CLAVE,BDD_BASEDATO);
        $this->conexion->connect_errno ? die('<script type="text/javascript">;alert("Mysql Error: '.$this->connect_errno.'. Call WebMaster !");</script>'):'';
        mysqli_set_charset($this->conexion, "utf8");
    }

    public function ejecutar_consulta($consulta)
    {
       $this->resultado= mysqli_query($this-> conexion,$consulta);
       return ($this-> resultado );
    }

    public function valores_campo()
    {
        while ($this-> fila = mysqli_fetch_assoc($this->resultado))
        {
            $this-> arr_asoc = $this-> fila;
        }
        return ($this-> arr_asoc );
    }  

    public function total_registros()
    {
        $this-> n_filas = mysqli_num_rows($this-> resultado );
        return $this-> n_filas;
    }

    public function obtener_ultimo()
    {
        $this->ultimo_registro= mysqli_insert_id($this-> conexion);
        return ($this-> ultimo_registro );
    }

    public  function cerrar_conexion()
    {
        mysqli_close ($this-> conexion);
    }
}
?>