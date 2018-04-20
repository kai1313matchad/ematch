
          <?php

            $lat = $this->input->post('satu');//$_POST['lat']; 

            $lng= $this->input->post('dua'); //$_POST['lng']; //longitude

            function getaddress($lat,$lng)
            {
              if(!null == $lat && !null == $lng) {
                $url = '//maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
                $json = @file_get_contents($url);
                $data=json_decode($json);
                $status = $data->status;
                if($status=="OK") {
                  return $data->results[0]->formatted_address;
                } else {
                  return false;
                }
              }
            }

            $address = getaddress($lat, $lng);
            if($address) {
              echo $address;
            } else {
              echo "Not found".$lat.' '.$lng;
            }
          ?>
 