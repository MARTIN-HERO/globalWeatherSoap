<!DOCTYPE html>
<?php require 'vendor/autoload.php';
	$loader = new Twig_loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Weather app</title>
        
    </head>
    <body>
    
        <?php

	        if($_POST["CityName"] AND $_POST["CountryName"] ){
		 					 	
				require_once './GlobalWeather.php';
	
		        $GlobalWeather = new GlobalWeather();		           
		        $GetWeather = new GetWeather;
		        $GetWeather->CityName = htmlspecialchars($_POST["CityName"]);
		        $GetWeather->CountryName = htmlspecialchars($_POST["CountryName"]);
		        $GetWeatherResponse = $GlobalWeather->GetWeather($GetWeather);
		           
		        $PlaneXml = str_replace("utf-16", "utf-8", $GetWeatherResponse->GetWeatherResult);
		        $xml = new SimpleXMLElement($PlaneXml);
	           
				}    
        ?>   
        
    <h3>What is the weather in your city?</h3>
        <form style="margin-bottom:20px;" action="<?php $_PHP_SELF ?>" method="POST">                      
                        
        <table cellspacing="0" cellpadding="4" frame="box" bordercolor="#dcdcdc" rules="none" style="border-collapse: collapse;">
        <tbody>   
          <tr>
            <td style="color: #000000; font-weight: normal;">CityName:</td>
            <td><input type="text" size="50" name="CityName"></td>
          </tr>
        
          <tr>
            <td style="color: #000000; font-weight: normal;">CountryName:</td>
            <td><input type="text" size="50" name="CountryName"></td>
          </tr>
        
        <tr>
          <td></td>
          <td align="right"> <input type="submit" value="Invoke" class="button"></td>
        </tr>
        </tbody>
        </table>
        </form>
			
            <table>
            <tbody>
		 	<?php 
		 	if((!empty($_POST["CityName"])) || (!empty($_POST['CountryName']))){
		 	if( $_POST["CityName"] AND $_POST["CountryName"] ){
	            foreach($xml as $key => $value) {
	                echo "<tr><td>" . $key . ":</td>";
	                echo "<td>" . $value . "</td></tr>";
	            };}
	            else 
	        	{ 
	        		echo "Sorry please enter a valid city or country.";}
				} 
				?>
            </tbody>
			</table>

    </body>
</html>