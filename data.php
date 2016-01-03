<?php
error_reporting(E_ALL);
$data = $_POST['data'];   //Receive the json string
$dbname = "cloudia";
$user = "www";
$password = "Pampa%Burger";      // # sécurité poussée

//$data = '{"stationmessage":{"datetime":"hh:mm:ss:DD:MM:2012","stationid":"sta001","eventtype":"regularreading","event":[{"sensorunit":"su0001","data":[{"id":"01","datetime":"57","valuetype":"asis","value":"8.65"}]}]}}';
if ($data != '')
{
	//Connection to the database using PDO
	try  
        {
                $DB = new PDO(
			'mysql:host=localhost;dbname='.$dbname,
				$user,
				$password
                );
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
                echo 'Error :' . $e->getMessage(); 
		die();
        }

        $data = json_decode($data);

	$stationid = $data->stationmessage->stationid;
        $eventtype = $data->stationmessage->eventtype;
        
	//Check if the station already exists
        $req = $DB->query('SELECT COUNT(*) FROM station WHERE id=\'' .$stationid. '\'');
        
        //If the station doesn't exists, it is created
        if ($req->fetchColumn() == 0)
        {
                $req = $DB->prepare("INSERT INTO station(id, station_group_id) VALUES(:stationid, 1)");
                $req->bindParam(':stationid', $stationid);
                $req->execute();
        }
        
        //Depending on the eventtype, the reading is different. As of now, there is only regularreading
        switch ($eventtype)
        {
                case 'regularreading':
                //event[0] represent the sensor unit. event[x] is for the sensors, where x >= 1
                $sensorunitid = $data->stationmessage->event[0]->sensorunit;
                
                //Check if the sensor unit exists in the database
                $req = $DB->query('SELECT COUNT(*) FROM sensor_unit WHERE id=\'' .$sensorunitid. '\'');
                
                //If the sensor unit is not in the database already, it is created
                if ($req->fetchColumn() == 0)
                {
                        $req = $DB->prepare("INSERT INTO sensor_unit(id, station_id) VALUES(:sensorunitid, :stationid)");
                        $req->bindParam(':sensorunitid', $sensorunitid);
                        $req->bindParam(':stationid', $stationid);
                        $req->execute();
                }
                
                //For each sensor
                for($i = 0; $i < sizeof($data->stationmessage->event); $i++)
                {
                        //Each sensor contain multiple data
                        for($j = 0; $j < sizeof($data->stationmessage->event[$i]->data); $j++)
                        {
				$sensorid = $data->stationmessage->event[$i]->sensorunit . "_" . $data->stationmessage->event[$i]->data[$j]->id;
				//Check if the sensor unit exists in the database                            
				$req = $DB->prepare('SELECT COUNT(*) FROM sensor WHERE id=:sensorid');
				$req->bindValue(':sensorid', $sensorid);
				$req->execute();
				
				//If the sensor is not in the database already, it is created
				if ($req->fetchColumn() == 0)
				{
					$req = $DB->prepare("INSERT INTO sensor(id, sensor_unit_id, measure_type_id, sensor_type_id) VALUES(:sensorid, :sensorunitid, 4, 1)");
					$req->bindParam(':sensorid', $sensorid);
					$req->bindParam(':sensorunitid', $sensorunitid);
					$req->execute();
				}
				
				$valuetype = $data->stationmessage->event[$i]->data[$j]->valuetype;
				
				
				//These values are not the real ones. They must be change for the value in the value_type table of the database
				switch ($valuetype)
                                {
					case 'asis':
					$valuetype = 1;
					break;
					
					case 'average':
					$valuetype = 2;
					break;
					
					case 'max':
					$valuetype = 3;
					break;
					
					case 'min':
					$valuetype = 4;
					break;
					
					default:
					$valuetype = NULL;
					echo 'Le type de valeur n\'est pas reconnu dans le sensor ' . $sensorid . '';
					break;
				}
				
				$value = $data->stationmessage->event[$i]->data[$j]->value;
				$datetime = $data->stationmessage->event[$i]->data[$j]->datetime.".000000";
				try{
					//If the valuetype is not present int the value_type table, it will fail
					$req = $DB->prepare("INSERT INTO sensor_measure(id, date_time, measure_value, sensor_id, measure_type, checked) VALUES('', :datetime, :value, :sensorid, :valuetype, 0)");
					$req->bindParam(':value', $value);
					$req->bindParam(':datetime', $datetime);
					$req->bindParam(':sensorid', $sensorid);
					$req->bindParam(':valuetype', $valuetype);
					$req->execute();
				} catch (PDOException $e){
					echo $e->getMessage();
				}
                        }
                }
                
                echo "Successfully parsed JSON\n";
                break;
        }
}
else{
        echo "Error: No JSON string";
}
