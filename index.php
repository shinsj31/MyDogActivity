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
         <form action="./userinfo.php?mode=login" method="POST">
            <p>로그인</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>현재 비밀번호 : <input type="varchar" name="u_pw"></p>
            <!--<p>변경 비밀번호 : <input type="varchar" name="new_pw"></p>-->
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
            <p>이름 : <input type="varchar" name="d_name"></p>
            <p>견종 : <input type="varchar" name="d_breed"></p>
            <p>키 : <input type="varchar" name="d_height"></p>
            <p>길이 : <input type="varchar" name="d_length"></p>
            <p>몸무게 : <input type="varchar" name="d_weight"></p>
            <p>나이 : <input type="varchar" name="d_age"></p>
            <p>목표활동량 : <input type="varchar" name="d_goal_activity"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./doginfo.php?mode=delete" method="POST">
            <p>반려견 제거</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>반려견아이디 : <input type="varchar" name="d_id"></p>

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
            <p>목표활동량 : <input type="varchar" name="d_goal_activity"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./doginfo.php?mode=list" method="POST">
            <p>반려견 리스트</p>
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./activitydata.php?mode=add" method="POST">
            <p>반려견 활동 정보 추가</p>
            <p>반려견아이디 : <input type="varchar" name="d_id"></p>
            <!--
            <p>날짜 : <input type="varchar" name="ac_date"></p>
            <p>시간: <input type="varchar" name="ac_hour"></p>
            <p>분: <input type="varchar" name="ac_minute"></p>
            -->

            <p>걷기 수: <input type="varchar" name="ac_walk"></p>
            <p>뛰기 수: <input type="varchar" name="ac_run"></p>
            <p>움직인 거리: <input type="varchar" name="ac_distance"></p>
            <p>자세: <input type="varchar" name="ac_posture"></p>
            <p>위치: <input type="varchar" name="ac_location"></p>
            <p>심박수: <input type="varchar" name="ac_heart_rate"></p>
            <p>디바이스 정보: <input type="varchar" name="ac_device_id"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./activitydata.php?mode=all" method="POST">
            <p>반려견 활동 정보 리스트</p>
            <p>아이디 : <input type="varchar" name="d_id"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./activitydata.php?mode=curr" method="POST">
            <p>반려견 현재 활동 정보 보기 </p>
            <p>아이디 : <input type="varchar" name="d_id"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./activitydata.php?mode=date" method="POST">
           <p>반려견 해당 활동 정보 보기 </p>
           <p>아이디 : <input type="varchar" name="d_id"></p>
          <p>날짜 'Y-m-d': <input type="varchar" name="ac_date"></p>
           <p><input type="submit" /></p>
       </form>
         <form action="./activitydata.php?mode=today" method="POST">
            <p>반려견 오늘 활동 정보 보기 </p>
            <p>아이디 : <input type="varchar" name="d_id"></p>
            <p><input type="submit" /></p>
        </form>
         <form action="./activitydata.php?mode=random" method="POST">
            <p>반려견 랜점 활동 정보 삽입 </p>
            <p>아이디 : <input type="varchar" name="d_id"></p>
            <p><input type="submit" /></p>
        </form>
        <form action="./activitydata.php?mode=random_day" method="POST">
           <p>반려견 랜점 활동 정보 삽입 </p>
           <p>아이디 : <input type="varchar" name="d_id"></p>
           <p>날짜 'Y-m-d': <input type="varchar" name="ac_date"></p>
           <p><input type="submit" /></p>
       </form>

       <form action="./result_activity.php?mode=get" method="POST">
          <p>반려견 활동 전체 결과 보기 </p>
          <p>아이디 : <input type="varchar" name="d_id"></p>
          <p><input type="submit" /></p>
      </form>
     <form action="./result_activity.php?mode=random" method="POST">
        <p>반려견 활동 결과 추가하기 </p>
        <p>아이디 : <input type="varchar" name="d_id"></p>
        <p>날짜 'Y-m-d': <input type="varchar" name="ac_date"></p>
        <p><input type="submit" /></p>
    </form>

    </body>
</html>
