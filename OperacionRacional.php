<?php

class OperacionRacional extends Operacion
{
    public function __construct($cadena)
    {
        parent::__construct($cadena);
        $this->op1=new Racional($this->op1);
        $this->op2=new Racional($this->op2);
    }

        // TODO: Implement calcula() method.
    public function calcula()
    {
    $resultado=null;
        // TODO: Implement calcula() method.
        switch ($this->operador) {
            case '+':
                $resultado = $this->op1->sumar($this->op2);
                break;
            case '-':
                $resultado = $this->op1->restar($this->op2) ;
                break;
            case '*':
                $resultado = $this->op1->multiplicar($this->op2) ;
                break;
            case '/':
                $resultado = $this->op1->dividir($this->op2) ;
                break;
        }
        return $resultado;
    }
}
?>