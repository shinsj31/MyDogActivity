<?php

try{
 $option = array(
     PDO::MYSQL_ATTR_FOUND_ROWS => true,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION    //에러출력 옵션 : 에러출력
 );

 $dbh = new PDO('mysql:host=localhost;dbname=mydogactivity', 'root', '10qpalzm' , $option);
}
catch(Exception $e) {
 echo$e->getMessage();
}


switch($_GET['mode']){
/*
    활동 정보 저장 불러오기

*/
    case 'all': // 날짜로 불러오기 JSON으로 반환
        //$stmt = $dbh->prepare('SELECT * FROM user AS u JOIN dog AS d ON u.u_id = d.u_id AND u.u_id = :u_id');
        $stmt = $dbh->prepare('SELECT * FROM activity_info WHERE d_id = :d_id');
        $stmt->bindParam(':d_id',$d_id);
        $d_id = $_POST['d_id'];

        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
		}

          $count = $stmt->rowCount();

        if($count>0){
          $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($list ,  JSON_UNESCAPED_UNICODE);
        }
        else echo 'false';

        break;
    case 'date': // 날짜로 불러오기 JSON으로 반환
        //$stmt = $dbh->prepare('SELECT * FROM user AS u JOIN dog AS d ON u.u_id = d.u_id AND u.u_id = :u_id');
        $stmt = $dbh->prepare('SELECT * FROM activity_info WHERE d_id = :d_id AND ac_date = :ac_date');
        $stmt->bindParam(':d_id',$d_id);
        $d_id = $_POST['d_id'];
        $stmt->bindParam(':ac_date',$ac_date);
        $ac_date = $_POST['ac_date'];

        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
		        }

        $count = $stmt->rowCount();

        if($count>0){
          $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($list ,  JSON_UNESCAPED_UNICODE);
        }
        else echo 'false';

        break;
    case 'fromto': // 시작 날짜에서 끝 날짜까지 불러오기 JSON으로 반환

        break;
    case 'today': // 오늘 총 정보 불러오기 JSON으로 반환
        $stmt = $dbh->prepare('SELECT * FROM activity_info WHERE d_id = :d_id AND ac_date = :ac_date');
        $stmt->bindParam(':d_id',$d_id);
        $d_id = $_POST['d_id'];

        $stmt->bindParam(':ac_date',$ac_date);
        $times = time();
        date_default_timezone_set("Asia/Seoul"); // 한국 시간으로 변경
        $ac_date =  date( 'Y-m-d', $times); //$_POST['ac_date'];

        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
		}

        $count = $stmt->rowCount();

        if($count>0){
          $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($list ,  JSON_UNESCAPED_UNICODE);
        }
        else echo 'false';

        break;
    case 'curr': // 현재 정보 불러오기 JSON으로 반환
        $stmt = $dbh->prepare('SELECT * FROM activity_info WHERE d_id = :d_id ORDER BY ac_id DESC limit 1');
        $stmt->bindParam(':d_id',$d_id);
        $d_id = $_POST['d_id'];

        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
		}

        $count = $stmt->rowCount();

        if($count>0){
          $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($list ,  JSON_UNESCAPED_UNICODE);
        }
        else echo 'false';

        break;
    case 'add': // 활동 정보 추가
        $stmt = $dbh->prepare('INSERT INTO activity_info
        (d_id , ac_date , ac_hour, ac_minute , ac_walk, ac_run , ac_distance , ac_heart_rate, ac_location ,ac_device_id ,ac_posture )
        VALUES (:d_id , :ac_date , :ac_hour, :ac_minute , :ac_walk, :ac_run , :ac_distance , :ac_heart_rate, :ac_location ,:ac_device_id , :ac_posture)');

        $stmt->bindParam(':d_id',$d_id);
        $stmt->bindParam(':ac_date',$ac_date);
        $stmt->bindParam(':ac_hour',$ac_hour);
        $stmt->bindParam(':ac_minute',$ac_minute);
        $stmt->bindParam(':ac_walk',$ac_walk);
        $stmt->bindParam(':ac_run',$ac_run);
        $stmt->bindParam(':ac_distance',$ac_distance);
        $stmt->bindParam(':ac_location',$ac_location);
        $stmt->bindParam(':ac_heart_rate',$ac_heart_rate);
        $stmt->bindParam(':ac_device_id',$ac_device_id);
        $stmt->bindParam(':ac_posture',$ac_posture);

        $d_id = $_POST['d_id'];
        $times = time();
        date_default_timezone_set("Asia/Seoul"); // 한국 시간으로 변경
        $ac_date =  date( 'Y-m-d', $times); //$_POST['ac_date'];
        $ac_hour =  date( 'H', $times); //$_POST['ac_hour'];
        $ac_minute =  date( 'i', $times); // $_POST['ac_minute'];
        $ac_walk = $_POST['ac_walk'];
        $ac_run = $_POST['ac_run'];
        $ac_distance = $_POST['ac_distance'];
        $ac_location = $_POST['ac_location'];
        $ac_heart_rate = $_POST['ac_heart_rate'];
        $ac_device_id = $_POST['ac_device_id'];
        $ac_posture = $_POST['ac_posture'];

        try {
          $stmt->execute();
        }
        catch (PDOException $e){
          echo $e->getMessage();
        }

        $count = $stmt->rowCount();

        echo $count > 0 ?  "success" : "false";


        break;
    case 'random': // 활동 정보 추가
    case 'random_day': // 활동 정보 추가
        for($i=0; $i<1440; $i=$i+1)
	     {
         $stmt = $dbh->prepare('INSERT INTO activity_info
      (d_id , ac_date , ac_hour, ac_minute , ac_walk, ac_run , ac_distance , ac_heart_rate, ac_location ,ac_device_id ,ac_posture )
      VALUES (:d_id , :ac_date , :ac_hour, :ac_minute , :ac_walk, :ac_run , :ac_distance , :ac_heart_rate, :ac_location ,:ac_device_id , :ac_posture)');

      $stmt->bindParam(':d_id',$d_id);
      $stmt->bindParam(':ac_date',$ac_date);
      $stmt->bindParam(':ac_hour',$ac_hour);
      $stmt->bindParam(':ac_minute',$ac_minute);
      $stmt->bindParam(':ac_walk',$ac_walk);
      $stmt->bindParam(':ac_run',$ac_run);
      $stmt->bindParam(':ac_distance',$ac_distance);
      $stmt->bindParam(':ac_location',$ac_location);
      $stmt->bindParam(':ac_heart_rate',$ac_heart_rate);
      $stmt->bindParam(':ac_device_id',$ac_device_id);
      $stmt->bindParam(':ac_posture',$ac_posture);


      $d_id = $_POST['d_id'];
      $times = time();
      date_default_timezone_set("Asia/Seoul"); // 한국 시간으로 변경
      if($_GET['mode'] == 'random')
        $ac_date =  date( 'Y-m-d', $times); //$_POST['ac_date'];
      else {
        $ac_date = $_POST['ac_date'];
      }
      $ac_hour =  $i/60;  //$_POST['ac_hour'];

      $ac_minute =  $i%60; // $_POST['ac_minute'];

      $posture = array('move' , 'stand' ,'stop', ' sitdown', 'lieside', 'lieupsdown', );

        if($ac_hour == 9 || $ac_hour == 19 ) {
          $ac_walk = rand(5,10);
          $ac_run = rand(3,17);
          $ac_distance = 0;
          $ac_location = 0;
          $ac_device_id =1;
          $ac_posture = $posture[0];
          $ac_heart_rate = rand(65,80);
        }
        else if($ac_hour >= 7 && $ac_hour < 22 ){
          $ac_walk = rand(0,10);
          $ac_run = rand(0,7);
          $ac_distance = 0;
          $ac_location = 0;
          $ac_device_id =1;

          // "stop", "move", " sitdown", "lieside", "lieupsdown", "stand"
          if( $ac_walk + $ac_run > 5 ){
              $ac_posture = $posture[0];
              $ac_heart_rate = rand(65,80);
          }
          else if( $ac_walk +   $ac_run > 2 ){
              $ac_posture = $posture[1];
              $ac_heart_rate = rand(60,75);
          }
          else{
              $ac_posture = $posture[rand(2,5)];
              $ac_heart_rate = rand(55,70);
          }
        }
        else{
          if($ac_minute % 3 == 0)
            $ac_walk = rand(0,1);
            else
              $ac_walk = 0;
          $ac_run = 0;
          $ac_distance = rand(0,10);
          $ac_location = rand(0,10);
          $ac_heart_rate = rand(55,70);

          $ac_posture = $posture[rand(2,5)];

              $ac_device_id =1;
        }




      try {
        $stmt->execute();
      }
      catch (PDOException $e){
        echo $e->getMessage();
      }

      $count = $stmt->rowCount();

      echo $count > 0 ?  "success" : "false";
	      }



        break;


}

?>
