<?php
//if (!defined('BASEPATH')) exit('No direct script access allowed');

/** Returns a given burundi french date format in SQL date Y-m-d or NULL if it fails
 *
 */
if (!function_exists('date_sql')) {
    function date_sql($given_date, $original_format = "d/m/Y", $date_time = FALSE)
    {
        $date = '';

        if (
            empty($given_date)
            or ($given_date == "__/__/____")
            or ($given_date == "__/__/____ __:__:__")
        ) {

            if ($given_date == '__/__/____ __:__:__') {

                return null;
            }

            if ($given_date == '__/__/____') {

                null;
            }
            null;
        }

        //au cas ou la date etait au format mysql
        $regex_sql_format="#^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])(?:( [0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$#";
        if(preg_match($regex_sql_format,$given_date))
        {
            return $given_date;
        }

        if ($original_format == "d/m/Y") {

            $tabDate = explode('/', $given_date);
            $date  = $tabDate[2] . '-' . $tabDate[1] . '-' . $tabDate[0];
        }

        if ($original_format == "d/m/Y H:i:s") {
            // au cas ou une date est donnee au lieu dy datetime mais en parametre ayant eu
            if (preg_match("#(\d{2})\/(\d{2})\/(\d{4})$#", $given_date)) {
                $date = DateTime::createFromFormat('d/m/Y', $given_date)->format('Y-m-d H:i:s');
                return $date;
            }

            $date = DateTime::createFromFormat('d/m/Y H:i:s', $given_date)->format('Y-m-d H:i:s');
            return $date;
        }
        if (!strtotime($date)) {
           // return $given_date;
           return NULL;
        }

        $date = date('Y-m-d', strtotime($date));
        //var_dump($date);
        return $date;
    }
}

if (!function_exists('is_valid_fr_datetime')) {

    function  is_valid_fr_datetime($given_date)
    {
        return preg_match("#^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))
        (?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|
        (?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$#", $given_date);
    }
}


if (!function_exists('add_brs')) {

    function add_brs($nbr = 10)
    {
        for ($i = 0; $i < $nbr; $i++) {
            echo "<br/>";
        }
    }
}

if(!function_exists("kp_query")){
	function kp_query($adresse,$comparaison="or"){
	//--costruit le critere pour les key Pop en fonction des mots clés fourni et de la logique de combinaison
		$q_adresse="";
		if(!empty($adresse)){
					$mot_adresse=$adresse;
					$t_mot_adresse=explode(" ",$mot_adresse);
					$i=0;
					$j=count($t_mot_adresse);
				   while($i < $j){
					  If (!empty($t_mot_adresse[$i])){
						 if($comparaison!="and"){
						 $q_adresse = $q_adresse . " or adresse like '%" . $t_mot_adresse[$i] . "%'";
						 }
						 else{
							 $q_adresse = $q_adresse . " and adresse like '%" . $t_mot_adresse[$i] . "%'";
						 }

					  }
					  $i++;
					}
		}
		if($q_adresse==""){
				$q_adresse="1=1";
		}
		else{
			if($comparaison!="and"){
				$q_adresse="(1>1". $q_adresse.")";
			}
			else{
				$q_adresse="(1=1". $q_adresse.")";
			}
		}
		return $q_adresse;

	}
}

if (!function_exists('mysqldate')){
    function mysqldate($xdate){

        $mdate=$xdate;
        /**/
        if ($mdate==""){return "1900-01-01";}
        if ($mdate=="__/__/____"){return "1900-01-01";}

            if (!(strlen($mdate)==10)){return "1900-01-01";}

            $mdate=substr($mdate,-4)."-".substr($mdate,3,2)."-".substr($mdate,0,2);

            return $mdate;

        }

}


if(!function_exists("SetStatus")){
 function SetStatus($message)
        {
            echo '<h3 class="sresponse"> Réponse du système: '.$message.'</h3>';
			$uid="";
			$longueur=strlen($message);
			for($i=$longueur;$i>0;$i--){
				if(substr($message,$i,1)==":"){
					$uid=substr($message,$i+1,$longueur-$i);
					echo " UID:",$uid;
					return;
				}
			}
        }
}
if(!function_exists("SetStatus_Identify")){
 function SetStatus_Identify($message)
        {
            //echo '<h3 class="sresponse"> Réponse du système: '.$message.'</h3>';
			echo '<div id="bio_response_div" class="sresponse"> Réponse du système: '.$message.'</div>';
			$uid="";
			$longueur=strlen($message);
			for($i=$longueur;$i>0;$i--){
				if(substr($message,$i,1)==":"){
					$uid=substr($message,$i+1,$longueur-$i);
					$uid=str_replace(" ","",$uid);
					//echo " UID:",$uid;
					return $uid;
				}
			}
			return false;
        }
}
if(!function_exists("can_connect_to")){
function can_connect_to($url)
{
  $connected = @fopen($url,'r');

  if($connected)
  {
     return true;
  } else {
   return false;
  }

}
}

if(!function_exists('is_apikey_valid')){

    function is_apikey_valid($key)
    {
        return $key==config('sidainfo.CENTRAL_SERVER_API_KEY');
    }
}

/*
 *
 *
I have extended the regex given by @Ofir Luzon for the formats dd-mmm-YYYY, dd/mmm/YYYY, dd.mmm.YYYY as per my requirement. Anyone else with same requirement can refer this

^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|
(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|
(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|
1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))
(?:(?:1[6-9]|[2-9]\d)?\d{2})$|
^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|
[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|
(?:(?:16|[2468][048]|[3579][26])00))))$|
^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|
(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$
 */
