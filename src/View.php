<?php

namespace CMS;

class View {

    public array $data = [];

    public function get_footer_template() : void {
        $this->get_template_part( 'document/footer' );
    }

    public function get_header_template() : void {
        $this->get_template_part( 'document/header' );
    }

    public function get_template_part( string $template ) : void {
        /** @var string $template_file */
        $template_file = CMS_TEMPALTE_DIR . DIRECTORY_SEPARATOR . "{$template}.php";

        if ( file_exists( $template_file ) ) {
            include_once $template_file;
        } 
        else {
            trigger_error( "Template File ({$template_file}) doesn't exist", E_WARNING );
        }
    }

}