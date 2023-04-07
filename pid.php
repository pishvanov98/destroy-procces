<?
exec("tasklist", $task_list);

if(!empty($argv[1])){
$proces=$argv[1];	
}else{
$proces= "Процесс";
}
	
$i=0;
$pid_kill_proc_mass=array();
$coun_proces=0;
foreach($task_list as $key=>$item){
	if($i < 4){
		$i++;
		continue;
	}
$i++;

$massiv= explode(' ',$item);
$massiv= array_filter($massiv);

if($massiv[0]==$proces){
	$name_proces = array_shift($massiv);
	$pid_proces = array_shift($massiv);
	if($coun_proces >= 3){
		$pid_kill_proc_mass[]= $pid_proces;
	}
	$coun_proces++;
}

}

if(!empty($pid_kill_proc_mass)){
	
	var_dump($pid_kill_proc_mass);
	
	foreach($pid_kill_proc_mass as $item_del){
		
		exec("taskkill /PID ".$item_del. " /f");
		
	}
	
}

?>
