function count1(type)  {
    // 결과를 표시할 element
    const resultElement = document.getElementById('result1');
    // 현재 화면에 표시된 값
    let number = resultElement.innerText;
    // 더하기/빼기
    if(type === 'plus1') {
      number = parseInt(number) + 1;
    }else if(type === 'minus1')  {
      number = parseInt(number) - 1;
    }
    // 결과 출력
    resultElement.innerText = number;
  }

  function count2(type)  {
    const resultElement = document.getElementById('result2');
    let number = resultElement.innerText;
    if(type === 'plus2') {
      number = parseInt(number) + 1;
    }else if(type === 'minus2')  {
      number = parseInt(number) - 1;
    }
    resultElement.innerText = number;
  }
  function count3(type)  {
    const resultElement = document.getElementById('result3');
    let number = resultElement.innerText;
    if(type === 'plus3') {
      number = parseInt(number) + 1;
    }else if(type === 'minus3')  {
      number = parseInt(number) - 1;
    }
    resultElement.innerText = number;
  }
  function count4(type)  {
    const resultElement = document.getElementById('result4');
    let number = resultElement.innerText;
    if(type === 'plus4') {
      number = parseInt(number) + 1;
    }else if(type === 'minus4')  {
      number = parseInt(number) - 1;
    }
    resultElement.innerText = number;
  }
  function count5(type)  {
    const resultElement = document.getElementById('result5');
    let number = resultElement.innerText;
    if(type === 'plus5') {
      number = parseInt(number) + 1;
    }else if(type === 'minus5')  {
      number = parseInt(number) - 1;
    }
    resultElement.innerText = number;
  }



  function showBtn(x){
      menu_count1.style.display
      if(x == 1){
        menu_count1.style.display="inline-block";
        menu_name1.style.display="inline-block";
        result1.style.display="inline-block";
      }else if(x==2){
        menu_count2.style.display="inline-block";
        menu_name2.style.display="inline-block";
        result2.style.display="inline-block";
      }else if(x==3){
        menu_count3.style.display="inline-block";
        menu_name3.style.display="inline-block";
        result3.style.display="inline-block";
      }else if(x==4){
        menu_count4.style.display="inline-block";
        menu_name4.style.display="inline-block";
        result4.style.display="inline-block";
      }else if(x==5){
        menu_count5.style.display="inline-block";
        menu_name5.style.display="inline-block";
        result5.style.display="inline-block";
      }
    

}
