<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <form action="./userinfo.php?mode=test" method="POST">
            <p>테스트</p>
            <!--<p>아이디 : <input type="varchar" name="u_id"></p>
            <p>현재 비밀번호 : <input type="varchar" name="u_pw"></p>
            <p>변경 비밀번호 : <input type="varchar" name="new_pw"></p>-->
            <!-- <p>비밀번호 : <textarea name="description" id="" cols="30" rows="10"></textarea></p> -->
            <p><input type="submit" /></p>
        </form>
        <form action="./userinfo.php?mode=join" method="POST">
            <p>회원가입</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>비밀번호 : <input type="varchar" name="u_pw"></p>

            <p>이름 : <input type="varchar" name="m_name"></p>
            <p>전화번호 : <input type="varchar" name="m_phone"></p>
            <p>e-mail : <input type="varchar" name="m_email"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./userinfo.php?mode=delete" method="POST">
            <p>탈퇴</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>비밀번호 : <input type="varchar" name="u_pw"></p>
            <p><input type="submit" /></p>
        </form>

        <form action="./doginfo.php?mode=add" method="POST">
            <p>반려견 추가</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>개이름 : <input type="varchar" name="d_name"></p>

            <p><input type="submit" /></p>
        </form>
        <form action="./doginfo.php?mode=update" method="POST">
            <p>반려견 정보 변경</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>개 아이디 : <input type="varchar" name="d_id"></p>

            <p>이름 : <input type="varchar" name="d_name"></p>
            <p>견종 : <input type="varchar" name="d_breed"></p>
            <p>키 : <input type="varchar" name="d_height"></p>
            <p>길이 : <input type="varchar" name="d_length"></p>
            <p>몸무게 : <input type="varchar" name="d_weight"></p>
            <p>나이 : <input type="varchar" name="d_age"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./doginfo.php?mode=list" method="POST">
            <p>반려견 리스트</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
