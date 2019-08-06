<?php

echo 'This is test<br/>';

foreach($users as $user) 
{
	echo $user->id .' => ';
	echo $user->analysis_title.'<br/>';
}
?>