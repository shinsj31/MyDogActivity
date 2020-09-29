


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

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  // 에러 출력하지 않음

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Warning만 출력

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 에러 출력

*/
    case 'list': // 리스트 불러오기
    //select * from user as u join dog as d on u.u_id = d.u_id and u.u_id = 'input';
        $stmt = $dbh->prepare('SELECT * FROM user AS u JOIN dog AS d ON u.u_id = d.u_id AND u.u_id = :u_id');
        $stmt->bindParam(':u_id',$u_id);
        $u_id = $_POST['u_id'];

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
    case 'add': // 추가
        $stmt = $dbh->prepare('INSERT INTO dog (u_id, d_name, d_breed, d_height , d_length , d_weight , d_age, d_goal_activity, d_join_date ) VALUES (:u_id ,  :d_name, :d_breed, :d_height , :d_length , :d_weight , :d_age, :d_goal_activity , :d_join_date) ');

        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':d_name', $d_name);
        $stmt->bindParam(':d_breed', $d_breed);
        $stmt->bindParam(':d_height', $d_height);
        $stmt->bindParam(':d_length', $d_length);
        $stmt->bindParam(':d_weight', $d_weight);
        $stmt->bindParam(':d_age', $d_age);
        $stmt->bindParam(':d_goal_activity', $d_goal_activity);
        $stmt->bindParam(':d_join_date', $d_join_date);

        $u_id = $_POST['u_id'];
        $d_name = $_POST['d_name'];
        $d_breed = $_POST['d_breed'];
        $d_height = $_POST['d_height'];
        $d_length = $_POST['d_length'];
        $d_weight = $_POST['d_weight'];
        $d_age = $_POST['d_age'];
        $d_goal_activity = $_POST['d_goal_activity'];


        $times = time();
        date_default_timezone_set("Asia/Seoul"); // 한국 시간으로 변경
        $d_join_date =  date( 'Y-m-d', $times); //$_POST['ac_date'];
      

        try {
          $stmt->execute();
        }
        catch (PDOException $e){
          echo $e->getMessage();
        }

        $count = $stmt->rowCount();

        if($count == 0){
            echo  "false";
            break;
		}



        //ORDER BY ac_id DESC limit 1

        $stmt = $dbh->prepare('SELECT * FROM user AS u JOIN dog AS d ON u.u_id = d.u_id AND u.u_id = :u_id ORDER BY d_id DESC limit 1');
        $stmt->bindParam(':u_id',$u_id);
        $u_id = $_POST['u_id'];

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
    case 'delete': // 삭제
        $stmt = $dbh->prepare('DELETE FROM dog WHERE u_id = :u_id AND d_id = :d_id ');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':d_id',$d_id);

        $u_id = $_POST['u_id'];
        $d_id = $_POST['d_id'];


        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
		}

        $count = $stmt->rowCount();

        echo $count > 0 ?  "success" : "false";

        //header("Location: list.php");
        break;
    case 'update': // 정보 추가 또는 변경
        $stmt = $dbh->prepare('UPDATE dog SET d_name = :d_name , d_breed = :d_breed , d_height = :d_height,
          d_length = :d_length , d_weight = :d_weight , d_age = :d_age , d_goal_activity = :d_goal_activity WHERE u_id = :u_id AND d_id = :d_id');
        $stmt->bindParam(':u_id', $u_id);
        $stmt->bindParam(':d_id', $d_id);
        $stmt->bindParam(':d_name', $d_name);
        $stmt->bindParam(':d_breed', $d_breed);
        $stmt->bindParam(':d_height', $d_height);
        $stmt->bindParam(':d_length', $d_length);
        $stmt->bindParam(':d_weight', $d_weight);
        $stmt->bindParam(':d_age', $d_age);
        $stmt->bindParam(':d_goal_activity', $d_goal_activity);

        $u_id = $_POST['u_id'];
        $d_id = $_POST['d_id'];
        $d_name = $_POST['d_name'];
        $d_breed = $_POST['d_breed'];
        $d_height = $_POST['d_height'];
        $d_length = $_POST['d_length'];
        $d_weight = $_POST['d_weight'];
        $d_age = $_POST['d_age'];
        $d_goal_activity = $_POST['d_goal_activity'];

        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
		    }

        $count = $stmt->rowCount();

        if($count == 0){
            echo  "false";
            break;
		}


        $stmt = $dbh->prepare('SELECT * FROM dog WHERE u_id = :u_id AND d_id = :d_id ');
        $stmt->bindParam(':u_id', $u_id);
        $stmt->bindParam(':d_id', $d_id);
        $u_id = $_POST['u_id'];
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



        //header("Location: list.php?id={$_POST['id']}");
        break;
      case 'info': // 정보를 얻는다
        $stmt = $dbh->prepare('SELECT * FROM dog WHERE d_id = :d_id');
        $stmt->bindParam(':d_id', $d_id);

        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }

        $count = $stmt->rowCount();

        if($count>0){
            $list = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($list ,  JSON_UNESCAPED_UNICODE);
        }
        else echo 'false';

        break;


}

?>
