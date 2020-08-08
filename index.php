<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>   
    <body>
        <form action="./userinfo.php?mode=modify" method="POST">
            <p>아이디 : <input type="varchar" name="u_id"></p>
            <p>현재 비밀번호 : <input type="varchar" name="pw"></p>
            <p>변경 비밀번호 : <input type="varchar" name="new_pw"></p> 
            <!-- <p>비밀번호 : <textarea name="description" id="" cols="30" rows="10"></textarea></p> -->
            <p><input type="submit" /></p>            
        </form>
    </body>
</html>