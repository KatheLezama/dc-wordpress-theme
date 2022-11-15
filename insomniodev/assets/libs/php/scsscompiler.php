<?php
//include libs, and create variables
include_once IDT_THEME_PATH . "/assets/libs/php/scssphp-0.6.3/scss.inc.php";
use Leafo\ScssPhp\Compiler;

$dir = IDT_THEME_PATH . "/assets/styles/scss/";
$child_THEME_PATH = WP_CONTENT_DIR . '/themes/insomniodev-child';
$child_dir = $child_THEME_PATH . '/assets/styles/scss/';

$scssList = scandir( $dir );

if( count( $scssList ) > 3 ) {

	foreach ($scssList as $scssFile)
	{
		//save .scss files name in array for compile it
		if($scssFile != "compiled.scss" && $scssFile != "." && $scssFile!="..")
		{
			$scssFile = explode(".",$scssFile);
			$import[] = '@import ' . '"' . $scssFile[0] . '"';
		}
	}

    $count = count( $import );
    if ( $count  == 1 ) {
        $import = $import[0] . ';';
    } else {
        $import = implode( ';', $import );
        $import = $import . ';';
    }

	$result = file_put_contents( IDT_THEME_PATH . '/assets/styles/scss/compiled.scss', $import );
	$scss = new Compiler();
	$scss->setImportPaths($dir);
	$scss->setFormatter('Leafo\ScssPhp\Formatter\Expanded');

	$cssOut = $scss->compile('@import "compiled.scss";');
	file_put_contents(IDT_THEME_PATH . '/assets/styles/css/master.css', $cssOut);
}

if ( file_exists( $child_THEME_PATH ) && is_dir( $child_THEME_PATH ) ) {

	$childScssList = scandir( $child_dir );

	if( count( $childScssList ) > 3 ){

		foreach ( $childScssList as $childScssFile ) {
			//save .scss files name in array for compile it
			if( $childScssFile != "compiled.scss" && $childScssFile != "." && $childScssFile != ".." )
			{
				$childScssFile = explode( ".", $childScssFile );
				$child_import[] = '@import ' . '"' . $childScssFile[0] . '"';
			}
		}

		$count = count( $child_import );
		if ( $count  == 1 ) {
			$child_import = $child_import[0] . ';';
		} else {
			$child_import = implode( ';', $child_import );
			$child_import = $child_import . ';';
		}

		$result = file_put_contents( $child_dir . 'compiled.scss', $child_import );
		$scss = new Compiler();
		$scss->setImportPaths($child_dir);
		$scss->setFormatter('Leafo\ScssPhp\Formatter\Expanded');

		$cssOut = $scss->compile('@import "compiled.scss";');
		file_put_contents($child_THEME_PATH . '/assets/styles/css/child-master.css', $cssOut);
	}
}
