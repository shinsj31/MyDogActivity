<?php
funtion query_reuslt ( $count ){
  if($count>0){
      echo 'success';
  }
  else{
      echo 'false';
  }
  return $count;
}

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

    회원 가입 용 /
    생성, 비밀번호 변경, 탈퇴
*/
    case 'login':
        $stmt = $dbh->prepare('SELECT * FROM user WHERE u_id = :u_id AND pw = :pw ');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':pw',$pw);

        $u_id = $_POST['u_id'];
        $pw = $_POST['pw'];

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		}


        $count = $stmt->rowCount();

        if($count>0){

            echo 'success';

        }else{
            echo 'false';
        }

        break;
    case 'join': // 가입
        $stmt = $dbh->prepare('INSERT INTO user (u_id, pw) VALUES (:u_id, :pw)');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':pw',$pw);

        $u_id = $_POST['u_id'];
        $pw = $_POST['pw'];

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		}


        $count = $stmt->rowCount();

        if($count>0){
            echo 'success';

        }else{
            echo 'false';
        }



        //header("Location: list.php");

        break;
    case 'delete': // 탈퇴
        $stmt = $dbh->prepare('DELETE FROM user WHERE u_id = :u_id AND pw = :pw ');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':pw',$pw);

        $u_id = $_POST['u_id'];
        $pw = $_POST['pw'];


        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		}

        $count = $stmt->rowCount();

        if($count>0){
            echo 'success';

        }else{
            echo 'false';
        }

        //header("Location: list.php");
        break;
    case 'modify': // 비밀번호 변경
        $stmt = $dbh->prepare('UPDATE user SET pw = :new_pw WHERE u_id = :u_id AND pw = :pw');
        $stmt->bindParam(':u_id', $u_id);
        $stmt->bindParam(':pw', $pw);
        $stmt->bindParam(':new_pw', $new_pw);

        $u_id = $_POST['u_id'];
        $pw = $_POST['pw'];
        $new_pw = $_POST['new_pw'];

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		        }

        $count = $stmt->rowCount();

        if($count>0){
            echo 'success';

        }else{
            echo 'false';
        }

        //header("Location: list.php?id={$_POST['id']}");
        break;
        case 'test':
        $stmt = $dbh->prepare('SELECT * FROM user');

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
        }

        $count = query_reuslt($stmt->rowCount());

        if($count > 0){
          $list = $stmt->fetchAll();
          foreach($list as $row) {
              echo $row['u_id'];
              echo $row['pw'];
          }
        }

        break;
}
?>
