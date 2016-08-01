<?php
/**
 * Class TwigsonExtension
 *
 * @author    Hidayat Sagita
 * @see       https://github.com/hdytsgt
 */

namespace hdytsgt\TwigsonBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class TwigsonExtension extends \Twig_Extension
{

	/**
	 * Extension Name
	 * 
	 * @return String
	 */
	public function getName()
	{
		return 'Twigson';
	}

	/**
	 * Filter
	 * 
	 * @return Array
	 */
	public function getFilters()
	{
		return [
			new \Twig_SimpleFilter( 'twigson', array( $this, 'twigsonFilter' ) )
		];
	}

	/**
	 * Add Twigson functionality into filter
	 *
	 * @param  Array  $context
	 * @param  String $path
	 * 
	 * @return Mixed
	 */
	public function twigsonFilter( $path ) 
	{
		if( $path ) 
		{
			$check = parse_url( $path );
			$json  = @file_get_contents( $path );

			if( $json === FALSE )
			{
				if( is_callable( 'curl_init' ) && array_key_exists( 'host', $check ) )
				{
					$curl = curl_init();

					curl_setopt( $curl, CURLOPT_AUTOREFERER, TRUE );
					curl_setopt( $curl, CURLOPT_HEADER, 0 );
					curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
					curl_setopt( $curl, CURLOPT_URL, $path );
					curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, TRUE );       

					$json = curl_exec( $curl );
				    
				    curl_close( $curl );
			    }

			    if( !array_key_exists( 'host', $check ) )
			    {
			    	$open = fopen( $path, 'r' );
			    	$json = fread( $open, filesize( $path ) );

			    	fclose( $open );
			    }
			}

			return ( $json ) ? json_decode( $json, true ) : [];
		}
	}
}