<?php 

class Controller_Example extends Controller
{

    public function action_index()
    {
        $data['css'] = Asset::css(array('reset.css','960.css','main.css'));
        return Response::forge(View::forge('welcome/index'));
    }
	
	public function action_name_to_upper($name_1, $name_2)
{
    $data['name_1'] = strtoupper($name_1);
    $data['name_2'] = strtoupper($name_2);
}
    return View::forge('test/name_to_upper', $data);
}
?>