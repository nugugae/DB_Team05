<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>데이터베이스 보고서3</title>
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
        $result=[];
        for ($i=9; $i<20; $i++){
            $query="SELECT hour(request_time) as h, menu_id, count(request_id) AS cnt FROM request_info
            GROUP BY menu_id, h HAVING h = $i and menu_id BETWEEN 15 AND 19 ORDER BY menu_id;";
            $result[$i-9]=mysqli_query($conn, $query);
        }
        
        mysqli_close($conn);

        ?>
    <div id="wrapper">
    <header id="main_header">
        <a href="index.php"><h1>DATABASE REPORT</h1></a>
    </header>  
    <nav id="main_menu">  
        <ul>
            <a href="report_01.php"><li> 보고서 1 </li></a>
            <a href="report_02.php"><li> 보고서 2 </li></a>
            <a href="report_03.php"><li> 보고서 3 </li></a>
        </ul>
    </nav>
    
    <section id="main_section"> 

    <article>  
    <header>
        <hgroup>
            <h1>문제점</h1><br>
            <h2>특정 시간 특정 메뉴에 주문이 몰리는 문제</h2><br>
        </hgroup>
        
            <p>
            처음 메뉴를 선정하고 푸드코드 운영을 시작했을 때는 음식의 주문이 고를 것이라 가정하였다. 
            그러나, 운영을 하면서 데이터가 쌓이다보니 특정 시간대에, 특정 메뉴로 주문이 몰림을 알게 되었다.
            <br><br>
            <figure>
                <image src="./assets/report01.jpg" style="width:400px; height: 300px;"></image>
                <figcaption>시간대에 따른 주문 여부 그래프</figcaption>
            </figure>
            <br><br>
            위의 그래프는 시간대에 따라 주문 여부를 확인할 수 있는 그래프이다. 주문의 양은 나타내지 않으며
            단순히 어느 시간대에 어느 메뉴의 주문이 있었는가를 알 수 있다.
            <br><br>
            <figure>
                <image src="./assets/report02.jpg" style="width:400px; height: 300px;"></image>
                <figcaption>시간대에 따른 주문량 그래프</figcaption>
            </figure>
            <br><br>
            위의 그래프는 시간대에 따른 주문량을 나타내는 그래프이다.
            <br>위의 두 그래프를 통해, 약 12시 경에 15번 메뉴에 주문이 몰려있음을 알 수 있다. 
            15번 메뉴에는 11시와 12시에 주문 내역이 확인되지만, 그 외의 메뉴들은 11시부터 12시에 메뉴주문이 없기 때문이다.
            <br><br>
            15번 메뉴는 3500원짜리 햄치즈 샌드위치로, 점심시간에 직장인들이 간단하게 점심을 먹기 위해 시간이 짧게 걸리고, 
            다른 메뉴에 비해 가격이 낮은 햄치즈 샌드위치 주문을 많이 하는 것으로 추측된다.

            <br><br>
            </p>
            <form id="time" name="time">
            </form>
            <br>
            <?php
                for ($i=9; $i<20; $i++){?>

                <table id="time-table" hidden width="30%">
                    <tr>
                        <th>메뉴</th>
                        <th>주문건수</th>
                    </tr>
                    <?php
                    while ($row=mysqli_fetch_array($result[$i-9])){
                        ?>
                        <tr>
                            <td><?=$row['menu_id']?></td>
                            <td><?=$row['cnt']?></td>
                        </tr>
                    <?php }?>
                </table>
            <?php }?>

    </header>
    </article>

    <article>  
        <hgroup>
            <h1>해결방안</h1><br>
            <h2>조리 시간 단축/메뉴 미리 준비</h2><br>
            <p>
            위의 문제를 해결하고, 푸드코트의 매출을 올리기 위하여 조리 시간 단축이라는 방안을 생각해 보았다.
            12시경에 주문이 몰린다면, 조리시간을 단축하여 그 시간에 더 많은 샌드위츠를 팔면 매출이 이전보다 증대할 것이라 예상하였다.
            이에, 어떻게 조리시간을 단축시킬지 고민하다가, 주문이 몰리기 약 1시간 전에 샌드위치를 미리 만들어두는 방안을 생각해냈다.
            <br><br>
            그러나, 이러한 경우 재고가 남을 수 있다는 문제점이 발생한다.
            이러한 문제점 없이 조리 시간을 단축하기 위해서 기존 주문량의 50%만 만들어 두는 방안을 선택했다.
            좀 더 구체적으로 설명을 하자면, 햄치즈 샌드위치의 주문량이 가장 높은 11시부터 12시 사이의 매출을 A라고 했을때, 
            그 한시간 전인 10시경부터 햄치즈 샌드위치를 A의 50%만 만들기 시작하는것이다.
            <br>
            이렇게 할 경우 재고가 남을 수 있다는 문제점은 가능성이 낮아지게 된다.
            
            </p>
        </hgroup>
                  

    </article>
    
    </section>

    
     <footer id="main_footer">
        Copyright &copy; 데베5조_2022_All Rights Reserved.
    </footer>
    </div>    
    </body>
    <script>
        let prev = null;
        function onChange(e){
            e.preventDefault();
            let value = parseInt(e.target.value) - 9;
            if (prev !== null){
                tableList[prev].toggleAttribute("hidden");
            }
            tableList[value].toggleAttribute("hidden");
            prev = value;
        }
        const form = document.querySelector("form#time");
        form.addEventListener("change", onChange);
        const tableList = document.querySelectorAll("table#time-table");
        for (i=9; i<20; i++){
            const input = document.createElement("input");
            input.type = "radio";
            input.id = i;
            input.value = i;
            input.name="time"
            const label = document.createElement("label");
            label.appendChild(input);
            label.for = i;
            label.innerHTML+=`${i}시`;

            form.appendChild(label);
        }
    </script>
</html>

 
