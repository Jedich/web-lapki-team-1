<?php
			$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db");


            $cities_from = array();
            $cities_to = array();

            $query1 = "SELECT DISTINCT t.city_from FROM timetables t;";
            $city_from = $mysqli->query($query1);
            foreach ($city_from as $city){
                array_push($cities_from, $city['city_from']);
            }


            $query2 = "SELECT DISTINCT t.city_to FROM timetables t;";
            $city_to = $mysqli->query($query2);
            foreach ($city_to as $city){
                array_push($cities_to, $city['city_to']);
            }


            echo json_encode(array('cities_from' => $cities_from,'cities_to' => $cities_to, 'code' => 200));
?>