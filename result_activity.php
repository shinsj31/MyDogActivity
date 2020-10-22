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
    case 'get': // 날짜로 불러오기 JSON으로 반환
        //$stmt = $dbh->prepare('SELECT * FROM user AS u JOIN dog AS d ON u.u_id = d.u_id AND u.u_id = :u_id');
        $stmt = $dbh->prepare('SELECT * FROM result_activity WHERE d_id = :d_id ORDER BY ac_date');
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
        $stmt = $dbh->prepare('INSERT INTO result_activity
        (d_id , ac_date , res_walk_ph, res_run_ph, res_move_ph , res_avg_walk_ph, res_avg_run_ph , res_avg_move_ph , res_avg_heart_ph, res_all_wark ,res_avg_daily_walk ,res_avg_daily_run , res_avg_daily_move, res_avg_daily_heart,  res_move_time, res_rest_time, res_sleep_time)
        VALUES (:d_id , :ac_date , :res_walk_ph, :res_run_ph ,:res_move_ph  , :res_avg_walk_ph, :res_avg_run_ph , :res_avg_move_ph , :res_avg_heart_ph,
          :res_all_wark ,:res_avg_daily_walk ,:res_avg_daily_run , :res_avg_daily_move, :res_avg_daily_heart,
          :res_move_time, :res_rest_time, :res_sleep_time)');

        $stmt->bindParam(':d_id',$d_id);
        $stmt->bindParam(':ac_date',$ac_date);
        $stmt->bindParam(':res_walk_ph',$res_walk_ph);
        $stmt->bindParam(':res_run_ph',$res_run_ph);
        $stmt->bindParam(':res_move_ph',$res_move_ph);

        $stmt->bindParam(':res_avg_walk_ph',$res_avg_walk_ph);
        $stmt->bindParam(':res_avg_run_ph',$res_avg_run_ph);
        $stmt->bindParam(':res_avg_move_ph',$res_avg_move_ph);
        $stmt->bindParam(':res_avg_heart_ph',$res_avg_heart_ph);
        $stmt->bindParam(':res_all_wark',$res_all_wark);
        $stmt->bindParam(':res_avg_daily_walk',$res_avg_daily_walk);
        $stmt->bindParam(':res_avg_daily_run',$res_avg_daily_run);
        $stmt->bindParam(':res_avg_daily_move',$res_avg_daily_move);
        $stmt->bindParam(':res_avg_daily_heart',$res_avg_daily_heart);
        $stmt->bindParam(':res_move_time',$res_move_time);
        $stmt->bindParam(':res_rest_time',$res_rest_time);
        $stmt->bindParam(':res_sleep_time',$res_sleep_time);

        $d_id = $_POST['d_id'];
        $ac_date = $_POST['ac_date'];
        $res_walk_ph = $_POST['res_walk_ph'];
        $res_run_ph = $_POST['res_run_ph'];
        $res_move_ph = $_POST['res_move_ph'];

        $res_avg_walk_ph = $_POST['res_avg_walk_ph'];
        $res_avg_run_ph = $_POST['res_avg_run_ph'];
        $res_avg_move_ph = $_POST['res_avg_move_ph'];
        $res_avg_heart_ph = $_POST['res_avg_heart_ph'];
        $res_all_wark = $_POST['res_all_wark'];
        $res_avg_daily_walk = $_POST['res_avg_daily_walk'];
        $res_avg_daily_run = $_POST['res_avg_daily_run'];
        $res_avg_daily_move = $_POST['res_avg_daily_move'];
        $res_avg_daily_heart = $_POST['res_avg_daily_heart'];
        $res_move_time = $_POST['res_move_time'];
        $res_rest_time = $_POST['res_rest_time'];
        $res_sleep_time = $_POST['res_sleep_time'];


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


         $stmt = $dbh->prepare('INSERT INTO result_activity
           (d_id , ac_date , res_walk_ph, res_run_ph , res_move_ph, res_avg_walk_ph, res_avg_run_ph , res_avg_move_ph , res_avg_heart_ph, res_all_wark ,res_avg_daily_walk ,res_avg_daily_run , res_avg_daily_move, res_avg_daily_heart,  res_move_time, res_rest_time, res_sleep_time)
           VALUES (:d_id , :ac_date , :res_walk_ph, :res_run_ph ,:res_move_ph , :res_avg_walk_ph, :res_avg_run_ph , :res_avg_move_ph , :res_avg_heart_ph,
             :res_all_wark ,:res_avg_daily_walk ,:res_avg_daily_run , :res_avg_daily_move, :res_avg_daily_heart,
             :res_move_time, :res_rest_time, :res_sleep_time)');


             $stmt->bindParam(':d_id',$d_id);
             $stmt->bindParam(':ac_date',$ac_date);
             $stmt->bindParam(':res_walk_ph',$res_walk_ph);
             $stmt->bindParam(':res_run_ph',$res_run_ph);
             $stmt->bindParam(':res_move_ph',$res_move_ph);


             $stmt->bindParam(':res_avg_walk_ph',$res_avg_walk_ph);
             $stmt->bindParam(':res_avg_run_ph',$res_avg_run_ph);
             $stmt->bindParam(':res_avg_move_ph',$res_avg_move_ph);
             $stmt->bindParam(':res_avg_heart_ph',$res_avg_heart_ph);
             $stmt->bindParam(':res_all_wark',$res_all_wark);
             $stmt->bindParam(':res_avg_daily_walk',$res_avg_daily_walk);
             $stmt->bindParam(':res_avg_daily_run',$res_avg_daily_run);
             $stmt->bindParam(':res_avg_daily_move',$res_avg_daily_move);
             $stmt->bindParam(':res_avg_daily_heart',$res_avg_daily_heart);
             $stmt->bindParam(':res_move_time',$res_move_time);
             $stmt->bindParam(':res_rest_time',$res_rest_time);
             $stmt->bindParam(':res_sleep_time',$res_sleep_time);

             $d_id = $_POST['d_id'];
             $ac_date = $_POST['ac_date'];
             $res_walk_ph =
             ((String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20)
             .",".(String)rand(0,20).",".(String)rand(20,100).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
            .",".(String)rand(50,100).",".(String)rand(50,100).",".(String)rand(0,20).",".(String)rand(0,20));

             $res_run_ph =
             ((String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20)
             .",".(String)rand(0,20).",".(String)rand(20,100).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(50,100).",".(String)rand(50,100).",".(String)rand(0,20).",".(String)rand(0,20));

             $res_move_ph =
             ((String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20).",".(String)rand(0,20)
             .",".(String)rand(0,20).",".(String)rand(20,100).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200).",".(String)rand(100,200)
             .",".(String)rand(50,100).",".(String)rand(50,100).",".(String)rand(0,20).",".(String)rand(0,20));

             $res_avg_walk_ph =
             ((String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000));

             $res_avg_run_ph =
             ((String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000));

             $res_avg_move_ph =
             ((String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000)
             .",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000).",".(String)rand(1000,2000));

             $res_avg_heart_ph =
             ((String)rand(55,65).",".(String)rand(55,65).",".(String)rand(55,65).",".(String)rand(55,65).",".(String)rand(55,65)
             .",".(String)rand(60,65).",".(String)rand(60,65).",".(String)rand(60,65).",".(String)rand(62,65).",".(String)rand(65,67)
               .",".(String)rand(64,68).",".(String)rand(60,65).",".(String)rand(65,68).",".(String)rand(65,67).",".(String)rand(65,67)
                 .",".(String)rand(62,64).",".(String)rand(65,68).",".(String)rand(60,68).",".(String)rand(65,67).",".(String)rand(63,66)
             .",".(String)rand(57,65).",".(String)rand(55,65).",".(String)rand(55,65).",".(String)rand(55,65));


             $res_avg_daily_walk = rand(2500,3500);
             $res_avg_daily_run = rand(2500,3500);
             $res_avg_daily_move = $res_avg_daily_walk + $res_avg_daily_run;
                $res_all_wark = $res_avg_daily_move;
             $res_avg_daily_heart = rand(61,65);
             $res_move_time = rand(200,300);
             $res_rest_time = rand(200,300);
             $res_sleep_time = rand(200,300);


      try {
        $stmt->execute();
      }
      catch (PDOException $e){
        echo $e->getMessage();
      }

      $count = $stmt->rowCount();

      echo $count > 0 ?  "success" : "false";




        break;


}

?>
