

<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>데이터베이스 보고서1</title>
	<link rel="stylesheet" href="report.css">
    </head>

    <body>
    <?php
        $conn=mysqli_connect("localhost", "db_05", "database05", "food_court");
        if (!$conn){
            echo "Database Connection Error!";
            echo "Could not connect: ".mysqli_connect_error();
            exit();
        }

        $query1="SELECT hour(R.request_time) as h, count(R.request_id) as cnt from request_info R
        JOIN menu M on R.menu_id = M.menu_id
        GROUP BY hour(R.request_time), M.category_id HAVING M.category_id=4;";
        $result1=mysqli_query($conn, $query1);

        $query2="SELECT user_id, if(MAX(category_id)=4, 'TRUE', 'FALSE') as visited FROM request_info R
        JOIN menu M ON M.menu_id = R.menu_id
        GROUP BY user_id HAVING not (count(distinct category_id)=1 and MAX(category_id)=4);";
        $result2=mysqli_query($conn, $query2);

        $query3="SELECT count(*) as total, sum(s.visited) visit, sum(1-s.visited) unvisit
        FROM (
            SELECT user_id, if(MAX(category_id)=4, TRUE, FALSE) as visited FROM request_info R
        JOIN menu M ON M.menu_id = R.menu_id
        GROUP BY user_id HAVING not (count(distinct category_id)=1 and MAX(category_id)=4)) s;";
        $result3=mysqli_query($conn, $query3);
        mysqli_close($conn);
        ?>
    <div id="wrapper">
    <header id="main_header">
        <a href="report_DB.html"><h1>DATABASE REPORT</h1></a>
    </header>  
    <nav id="main_menu">  
        <ul>
            <a href="report_01.html"><li> 보고서 1 </li></a>
            <a href="report_02.html"><li> 보고서 2 </li></a>
            <a href="report_03.html"><li> 보고서 3 </li></a>
        </ul>
    </nav>
    
    <section id="main_section"> 

    <article>  
    <header>
        <hgroup>
            <h1>문제점</h1><br>
            <h2>식사 후 푸드코트 내 카페의 낮은 이용률</h2><br>
        </hgroup>
            <p>
            푸드 코트 내 음식점을 이용한 사람이 푸드코트 내 카페를 이용하지 않는 경우가 많다. 
            <br><br>
            <table width="50%">
                    <tr>
                        <th>시간</th>
                        <th>이용객</th>
                    </tr>
                <?php
                    while ($row=mysqli_fetch_array($result1)){
                        ?>
                        <tr>
                            <td><?=$row['h']?></td>
                            <td><?=$row['cnt']?></td>
                        </tr>
                <?php }?>
            </table>
	    <figure>
                <image src="./assets/report1-2.jpg" style="width:400px; height: 300px;"></image>
                <figcaption>카페 이용시간</figcaption>
            </figure>
	    <br><br>
            위의 그래프는 카페 이용자의 이용시간에 대한 정보를 나타낸 그래프이다. </br>
	    많은 사람들이 카페를 10시-13시, 16시-19시에 이용하며 이 시간대에 카페 이용률이 높음을 그래프를 통해 확인할 수 있다. 
            특히 12-13시, 18-19시는 점심, 저녁시간으로 식사시간과 겹친다. 많은 사람들이 식사 후, 카페를 이용하고 있음을 추측할 수 있다.
            <br><br>

        <table width="50%">
                <tr>
                    <th>고객 id</th>
                    <th>카페 방문 여부</th>
                </tr>
            <?php
                while ($row=mysqli_fetch_array($result2)){
                    ?>
                    <tr>
                        <td><?=$row['user_id']?></td>
                        <td><?=$row['visited']?></td>

                    </tr>
            <?php }?>
        </table>

        <table width="70%">
                <tr>
                    <th>푸드코드에서 식사한 고객 수</th>
                    <th>카페 방문 고객 수</th>
                    <th>카페 미방문 고객 수</th>
                </tr>
            <?php
                while ($row=mysqli_fetch_array($result3)){
                    ?>
                    <tr>
                        <td><?=$row['total']?></td>
                        <td><?=$row['visit']?></td>
                        <td><?=$row['unvisit']?></td>
                    </tr>
            <?php }?>
        </table>
	    <figure>
                <image src="./assets/report1-5.png" style="width:400px; height: 300px;"></image>
                <figcaption>푸드코트 내 다른 음식점을 이용한 사람들과의 관계성</figcaption>
            </figure>
	    <br><br>
            위의 그래프는 푸드코트 내 음식점을 이용하는 사람 중에 카페를 이용한 사람이 얼마나 되는지 나타낸 그래프이다. </br>
	    푸드코트 내 음식점 이용한 85명 중에 7명만 카페 이용하였다. 
            7명이라는 숫자는 푸드코트 내 음식점 이용자인 85명의 1/10도 안 되는 사람들이 식사 후 푸드코트 내 카페를 이용했음을 알 수 있다. 
	    푸드코트 내 음식점 이용 후, 카페를 이용하는 사람이 매우 적음을 확인하였다.
		    
            <br><br>
            </p>
        
   </header>
   

      
    </article>

    <article>  
        <hgroup>
            <h1>해결방안</h1><br>
            <h2>카페 할인</h2><br>
            <p>
	    푸드코트 내 음식점을 이용한 사람들에 한해서 그날 당일 테이크아웃용 카페 할인권을 지급하는 방식으로 매출을 증대시키고자 한다. </br>
            새로운 타겟을 정하여 방안을 수립한다면 매출이 오를 수 있을거라 생각했다. 푸드코트 내 음식점을 이용한 대부분이 카페를 이용하지 않은 사람들이었기 때문에 푸드코트를 이용하는 사람들 중에서 카페를 이용하는 사람들이 증가한다면, 카페 매출이 오를 수 있다. 
	    게다가 연쇄적으로 푸드코트에서 식사를 하면 카페 할인권을 준다고 하면, 카페를 좀 더 저렴하게 이용하기 위해서 푸드코트에서 식사를 하는 사람들도 증가할 수 있다.
	    
            </p>
        </hgroup>
                  

    </article>
    
    </section>

    
     <footer id="main_footer">
        Copyright &copy; 데베5조_2022_All Rights Reserved.
    </footer>
    </div>    
    </body>
</html>

 
