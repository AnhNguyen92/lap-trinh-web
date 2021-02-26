<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'name'	=>	$_POST['name'],
			'year'		=>	$_POST['year']
		);
		$api_url = "http://localhost/lab10/bai-2/api/test_api.php?action=insert";// đổi cho phù hợp với folder trong xampp
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/lab10/bai-2/test_api.php?action=fetch_single&id=".$id."";// đổi cho phù hợp với folder trong xampp
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'name'	=>	$_POST['name'],
			'year'		=>	$_POST['year'],
			'id'			=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/lab10/bai-2/api/test_api.php?action=update";// đổi cho phù hợp với folder trong xampp
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/lab10/bai-2/api/test_api.php?action=delete&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>