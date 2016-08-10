<?php

class ProbaseException extends Exception {

    public function __construct( $message, $code = 0 ) {
        // make sure everything is assigned properly
        parent::__construct( $message, $code );
    }
}
