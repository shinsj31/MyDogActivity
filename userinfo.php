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

    회원 가입 용 /
    생성, 비밀번호 변경, 탈퇴
*/
    case 'login':
        $stmt = $dbh->prepare('SELECT * FROM user WHERE u_id = :u_id AND pw = :u_pw ');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':u_pw',$u_pw);

        $u_id = $_POST['u_id'];
        $u_pw = $_POST['u_pw'];

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		    }


        $count = $stmt->rowCount();
        $count > 0 ? echo "success"; : echo "false";

        break;
    case 'join': // 가입
        $stmt = $dbh->prepare('INSERT INTO user (u_id, u_pw) VALUES (:u_id, :u_pw)');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':u_pw',$u_pw);

        $u_id = $_POST['u_id'];
        $u_pw = $_POST['u_pw'];

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		    }

        $count = $stmt->rowCount();

        if($count>0){

            $stmt = $dbh->prepare('INSERT INTO member (u_id, m_name , m_phone , m_email ) VALUES (:u_id, :m_name , :m_phone , :m_email)');
            $stmt->bindParam(':u_id',$u_id);
            $stmt->bindParam(':m_name',$m_name);
            $stmt->bindParam(':m_phone',$m_phone);
            $stmt->bindParam(':m_email',$m_email);

            $u_id = $_POST['u_id'];
            $m_name = $_POST['m_name'];
            $m_phone = $_POST['m_phone'];
            $m_email = $_POST['m_email'];

            try {
                $stmt->execute();
            }
            catch (PDOException $e){
                echo $e->getMessage();
    		    }
            $count = $stmt->rowCount();

            $count > 0 ? echo "success"; : echo "false";

        }
        else echo "false";


        //header("Location: list.php");

        break;
    case 'delete': // 탈퇴
        $stmt = $dbh->prepare('DELETE FROM user WHERE u_id = :u_id AND u_pw = :u_pw ');
        $stmt->bindParam(':u_id',$u_id);
        $stmt->bindParam(':u_pw',$u_pw);

        $u_id = $_POST['u_id'];
        $u_pw = $_POST['u_pw'];


        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		}

        $count = $stmt->rowCount();

        $count > 0 ? echo "success"; : echo "false";

        //header("Location: list.php");
        break;
    case 'modify': // 비밀번호 변경
        $stmt = $dbh->prepare('UPDATE user SET pw = :new_pw WHERE u_id = :u_id AND pw = :u_pw');
        $stmt->bindParam(':u_id', $u_id);
        $stmt->bindParam(':u_pw', $u_pw);
        $stmt->bindParam(':new_pw', $new_pw);

        $u_id = $_POST['u_id'];
        $u_pw = $_POST['u_pw'];
        $new_pw = $_POST['new_pw'];

        try {
            $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
		     }

        $count = $stmt->rowCount();

        $count > 0 ? echo "success"; : echo "false";

        break;

      case 'test':
        $stmt = $dbh->prepare('SELECT * FROM user');
        try {
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }

        $count = $stmt->rowCount();

        if($count > 0){
          $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
          echo json_encode($list);
        }

        break;
}
?>
