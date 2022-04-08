<?php
//clase
class Racional  {
    //atributos
    private $num;
    private $den;
    //métodos
    public function __construct($numerador=1, $denominador=1)
    {
        //Si  le pasamos un numero entre camillas
        $numerador=is_numeric($numerador)? (int)$numerador:$numerador;
        //si le pasamos un parámetro null que lo sustituya por 1
        $numerador=($numerador===null or $numerador==="")?1:$numerador;
        $denominador=empty($denominador)?1:$denominador;
        //si le pasamos un parámetro "" de cadena vacía
        $denominador = $denominador==0? 1 : $denominador;
        if(is_string($numerador)){
            $operacion= explode("/", $numerador);
            $numerador=$operacion[0];
            $denominador=$operacion[1];
        }
        $this->num=$numerador;
        $this->den=$denominador;
    }
    public function __toString(){
        return "$this->num/$this->den";
    }
    public function sumar(Racional $operador2):Racional{
        $den =$this->den * $operador2->den;
        $num =$this->num*$operador2->den
            +
        $this->den*$operador2->num;
        $rtdo = new Racional($num, $den);
        return $rtdo;
    }
    public function restar (Racional $operador2):Racional{
        $den =$this->den
            *
        $operador2->den;
        $num =$this->num*$operador2->den
            -
        $this->den*$operador2->num;
        $rtdo = new Racional($num, $den);
        return $rtdo;
    }
    public function multiplicar(Racional $operador2):Racional{
        $den=$this->den
            *
        $operador2->den;
        $num=$this->num
            *
        $operador2->num;
        $rtdo = new Racional($num, $den);
        return $rtdo;
    }
    public function dividir(Racional $operador2):Racional{
        $num=$this->num * $operador2->den;
        $den=$this->den * $operador2->num;
        $rtdo=new racional($num, $den);
        return $rtdo;
    }

}


