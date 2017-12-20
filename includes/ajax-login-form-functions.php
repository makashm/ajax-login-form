<?php 

if( ! function_exists( 'pri' ) ) :
function pri( $data ) {
    echo '<pre>';
    if( is_object( $data ) || is_array( $data ) ) {
        print_r( $data );
    }
    else {
        var_dump( $data );
    }
    echo '</pre>';
}
endif;

if( ! function_exists( 'im_get_template' ) ) :
function im_get_template( $file_name ) {
	ob_start();
	include_once dirname( IMFILE ) . "/templates/{$file_name}.php";
	$content = ob_get_contents();
	ob_clean();

	return $content;
}

endif;