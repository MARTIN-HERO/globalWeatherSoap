<?php
class GetWeather {
  public $CityName; // string
  public $CountryName; // string
}

class GetWeatherResponse {
  public $GetWeatherResult; // string
}

class GetCitiesByCountry {
  public $CountryName; // string
}

class GetCitiesByCountryResponse {
  public $GetCitiesByCountryResult; // string
}


/**
 * GlobalWeather class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class GlobalWeather extends SoapClient {

  private static $classmap = array(
                                    'GetWeather' => 'GetWeather',
                                    'GetWeatherResponse' => 'GetWeatherResponse',
                                    'GetCitiesByCountry' => 'GetCitiesByCountry',
                                    'GetCitiesByCountryResponse' => 'GetCitiesByCountryResponse',
                                   );

  public function GlobalWeather($wsdl = "http://www.webservicex.net/globalweather.asmx?WSDL", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   * Get weather report for all major cities around the world. 
   *
   * @param GetWeather $parameters
   * @return GetWeatherResponse
   */
  public function GetWeather(GetWeather $parameters) {
    return $this->__soapCall('GetWeather', array($parameters),       array(
            'uri' => 'http://www.webserviceX.NET',
            'soapaction' => ''
           )
      );
  }

  /**
   * Get all major cities by country name(full / part). 
   *
   * @param GetCitiesByCountry $parameters
   * @return GetCitiesByCountryResponse
   */
  public function GetCitiesByCountry(GetCitiesByCountry $parameters) {
    return $this->__soapCall('GetCitiesByCountry', array($parameters),       array(
            'uri' => 'http://www.webserviceX.NET',
            'soapaction' => ''
           )
      );
  }

}

?>
