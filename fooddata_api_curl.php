<?php
if(isset($_POST['query'])){
$api_key='aDa5rwfamCJXZjvLxFu4O3YaDgyEK0boloObyRY9';
$api_endpoint='https://api.nal.usda.gov/fdc/v1/foods/search';
$curl=curl_init();
$data=http_build_query(array("api_key" => $api_key,"query"=>$_POST['query'],"sortBy"=>"fdcId","pageSize"=>20));
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_URL ,$api_endpoint."?".$data);
$result=curl_exec($curl);
curl_close($curl);

echo $result;
}
?>