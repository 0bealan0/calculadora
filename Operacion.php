<?php

abstract class Operacion
{
    protected $op1;
    protected $op2;
    protected $operador;
    const REAL=1; // TRUE
    const RACIONAL=2; // TRUE
    const ERROR = 0; // FALSE también podríamos pasarle un número negativo para captar las mismas situaciones
    public static function tipo_operacion($cadena)
    {
        //expresiones regulares de control
        $entero = "[1-9][0-9]*";
        $op_racional = "[\-|\*|\+|\:]{1}";
        $op_real = "[\+|\-|\*|\/]{1}";
        $racional = "$entero\/$entero";
        $real = "[0-9]+(\.[0-9]+)?";

        $operacion_racional_1 = "$racional$op_racional$racional";
        $operacion_racional_2 = "$racional$op_racional$entero";
        $operacion_racional_3 = "$entero$op_racional$racional";

        $operacion_real="$real$op_real$real";

        if (preg_match("#^$operacion_racional_1$#", $cadena)) {
            return self::RACIONAL;

        }
        if (preg_match("#^$operacion_racional_2$#", $cadena)) {
            return self::RACIONAL;
        }
        if (preg_match("#^$operacion_racional_3$#", $cadena)) {

            return self::RACIONAL;
        }
        if (preg_match("#^$operacion_real$#", $cadena)) {
            return self::REAL;
        }
        return self::ERROR;
    }

    public function __construct($cadena){
        $this->operador=$this->obtener_operador($cadena);
        $this->op1=$this->obtener_op1($cadena);
        $this->op2=$this->obtener_op2($cadena);
    }
    private function obtener_operador(string $cadena){
        $operador="";
        if(strpos($cadena,'+' )!==false) {
            $operador = '+';
        }
        else if(strpos($cadena, '-')!==false)
            $operador='-';
        else if(strpos($cadena, '*')!==false)
            $operador='*';
        else if(strpos($cadena, ':')!==false){
            $operador=':';
        }
        else
            $operador='/';

        return $operador;
    }
    private function obtener_op1(string $cadena){
        $n=strpos($cadena, $this->operador); //Dime la ubicación del signo e identifícala en $n
        $op1= substr($cadena,0,$n);
        return $op1;
    }
    private function obtener_op2(string $cadena){
        $n=strpos($cadena, $this->operador);
        $op2= substr($cadena,$n+1);
        return $op2;
    }
    public function __tostring(){

    $html="<table class='table'>
                <tr>
                    <th>OPERANDO 1</th>
                    <th>OPERADOR</th>
                    <th>OPERANDO 2</th> 
                </tr>
                <tr>
                    <td>$this->op1</td>
                    <td>$this->operador</td>
                    <td>$this->op2</td>
                </tr>
            </table>";
    return $html;
    }
    abstract public function calcula();
}