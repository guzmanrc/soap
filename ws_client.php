<?php

$xml='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:bbj="http://bbjgenerated/">
   <soapenv:Header/>
   <soapenv:Body>
      <bbj:consultapol>
         <arg0>734DCW</arg0>
         <arg1>96.126.100.200</arg1>
      </bbj:consultapol>
   </soapenv:Body>
</soapenv:Envelope>';

  $header = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"run\"",
    "Content-length: ".strlen($xml),
  );

	$soap_do = curl_init();
	curl_setopt($soap_do, CURLOPT_URL, "http://www.aceiba.com.gt:8888/webservice/CONSULTATIWService" );
	curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($soap_do, CURLOPT_POST,           true );
	curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $xml);
	curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);
	$result = curl_exec($soap_do);
	$data = explode("!", $result);
	echo "<hr />";
	print_r($data);
	echo "<hr />";
	
	foreach ($data as $key => $value)
	{
		echo 'Posicion '.$key.'= '.$value.'</br>';
		//print_r($value);
	}
	
?>