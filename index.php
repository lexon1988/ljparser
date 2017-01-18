<?php
set_time_limit(0);


$blog=file("blogs.txt");


for($j=0;$j<9999999999;$j++){

$counter=file_get_contents("counter.txt");
$counter2=file_get_contents("counter2.txt");

	if($counter<$counter2){
		
		$counter=$counter2;
		
	}

		$content=file_get_contents("http://www.livejournal.com/tools/friendlist.bml?user=".trim($blog[$counter])."&nopics=1");
		preg_match_all("/\<strike\>(.*)\<\/strike\>\</Uis", $content, $piece);
	


		$pars_count=count($piece[1]);

		for($i=0;$i<=$pars_count;$i++){
			
			if($piece[1][$i]<>""){
				$fp = fopen("pars.txt", "a"); // Открываем файл в режиме записи 
				$mytext = $piece[1][$i]."\r\n"; // Исходная строка
				$test = fwrite($fp, $mytext); // Запись в файл
				fclose($fp); //Закрытие файла
			}
		
		}

				$counter++;
				file_put_contents("counter.txt",$counter);
				$rand=rand(1,10);

					if($rand==10){
						
						file_put_contents("counter2.txt",$counter);
						
					}

sleep(1);
	
}


?>