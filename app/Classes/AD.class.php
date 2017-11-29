<?php
/**
 * Esta classe ? a respons?vel pela autentica??o com o AD
 * @access public
 * @package config\classes
 *
 */

namespace App\Classes;

/**
 *
 * @package config\classes
 *         
 */
class AD {
	
	/**
	 * M?todo respons?vel pela autentica??o no AD
	 *
	 * @access public
	 * @return string[]
	 * @param String $username        	
	 * @param String $password        	
	 */
	public function autenticarAD($username, $password) {
		$vRetorno = array (
				"estado" => false,
				"matricula" => "",
				"nome" => "" 
		);
		
		$adServer = "ldap://200.17.56.128";
		if (empty ( $username ) || empty ( $password ))
			return $vRetorno;
		
		$ldap = ldap_connect ( $adServer );
		
		$ldaprdn = $username . "@ifg.br";
		
		ldap_set_option ( $ldap, LDAP_OPT_PROTOCOL_VERSION, 3 );
		ldap_set_option ( $ldap, LDAP_OPT_REFERRALS, 0 );
		
		$bind = @ldap_bind ( $ldap, $ldaprdn, $password );
		if ($bind) {
			$filter = "(sAMAccountName=$username)";
			$result = ldap_search ( $ldap, "dc=ifg,dc=br", $filter );
			@ldap_sort ( $ldap, $result, "sn" );
			$info = ldap_get_entries ( $ldap, $result );
			
			if ($info ["count"] == 1) {
				$vRetorno ["estado"] = true;
				$vRetorno ["matricula"] = $info [0] ["cn"] [0];
				$vRetorno ["nome"] = $info [0] ["description"] [0];
				$vRetorno ["email"] = $info [0] ["proxyaddresses"] [0];

				
				if (! empty ( $info [0] ["thumbnailphoto"] [0] ))
					$vRetorno ["foto"] = "data:image/jpeg;base64," . base64_encode ( $info [0] ["thumbnailphoto"] [0] );
				else
					$vRetorno ["foto"] = "";

			}
		}
		
		return $vRetorno;
	}
}