<?php

class customException extends Exception {
    public function errorMessage() {
        // Mensaje de error
        $errorMsg = 'Error en la línea '
        .$this->getLine().' en el archivo '
        .$this->getFile() .': <b>'
        .$this->getMessage().'</b>';
        return $errorMsg;
    }
}
