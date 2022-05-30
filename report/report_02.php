

<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>데이터베이스 보고서2</title>
	<link rel="stylesheet" href="report.css">
    </head>

    <body>
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
            <h2>오픈 시간대에 주문량이 현저히 적은 문제</h2><br>
        </hgroup>
            <p>
            운영시간을 8시-19시로 설정하고 푸드코트를 운영하였다. 쌓인 데이터를 통해 오픈 시간대(8시)에 주문량이 현저히 적다는 문제점을 알게 되었다.
            <br><br>
            <figure>
                <image src="./assets/corner.JPG"  style="width:830px; height: 600px;"></image>
                <figcaption>코너별 시간대에 따른 주문량 그래프</figcaption>
            </figure>
            <br><br>
            위의 그래프는 코너별 시간대에 따른 주문량을 나타내는 그래프이다.<br>
	    코너별로 그래프에 차이가 있지만 공통되는 점은<br><br>
		    ▶모든 코너가 8시 오픈 시간대에는 주문량이 중국집-0건, 한식집-0건, 왕돈까스-0건, 샌드위치-0건, 커피 전문점-1건으로 매우 낮다.
		    <br>
		    ▶모든 코너가 오픈시간 8시에 비해 마감시간 19시에 주문량이 더 많다.
		    <br><br>
		    라는 점이다.<br>
		    특히 왕돈까스집과 한식집에서 마감 시간인 19시경에 주문량이 급격히 증가했다는 점을 알 수 있다.

            <br><br>
            </p>
        
   </header>
   

      
    </article>

    <article>  
        <hgroup>
            <h1>해결방안</h1><br>
            <h2>영업 시간 조정</h2><br>
            <p>
            위의 문제를 해결하고, 푸드코트의 매출을 올리기 위해서 운영 시간 조정이라는 방안을 생각해 보았다.<br>
	    푸드코트의 영업시간을 기존 8시-19시에서 9시-20시로 변경하는 방안이다. 주문량이 낮은 오픈 시간을 1시간 늦추고, 
            주문량이 상대적으로 높은 마감 시간을 1시간 늘려서 운영한다. 총 영업시간은 11시간으로 같지만 주문량이 높은 저녁시간에 집중함으로서
            푸드코트의 매출을 증대시킬 수 있다고 예상하였다.
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

 
