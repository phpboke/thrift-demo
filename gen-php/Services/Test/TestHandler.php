<?php
namespace Services\Test;
 
class TestHandler implements TestIf {
  public function sayHello($name)
  {
      return "Hello $name";
  }
  
  public function getMd5($username, $password){
  
  	$md5 = md5($username . $password);
  
  	$array = array(
  			'username'=>$username,
  			'password'=>$password,
  			'md5'=>$md5
  	);
  	$data = json_encode($array);
  	return $data;
  }
  
}