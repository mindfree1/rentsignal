	<?php

	#$result = DB::select('id','lat','long')->from('rentsignals')->as_object()->execute();
	
	
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers");
	$parnode = $dom->appendChild($node);
	
	$result = DB::query('SELECT * FROM `markers`', DB::SELECT)->execute();
	$numrows = count($result);
	
	header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each

	while ($numrows){  
	// ADD TO XML DOCUMENT NODE  
		$node = $dom->createElement("marker");  
		$newnode = $parnode->appendChild($node);   
		$newnode->setAttribute("name",$rows['name']);
		$newnode->setAttribute("address", $rows['address']);  
		$newnode->setAttribute("lat", $rows['lat']);  
		$newnode->setAttribute("lng", $rows['lng']);  
		$newnode->setAttribute("type", $rows['type']);
	}

	echo $dom->saveXML();
	#$on_key = $result('id');
	/*foreach($result as $item)
	{
		$allcoords = array($item);
		echo $allcoords;
		
		#print_r($allcoords);

		// $id will contain the records id
		// do something with $item or its $id
	}*/
	
	?>