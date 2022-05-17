function count(type)  {
    // 결과를 표시할 element
    const resultElement = document.getElementById('result');
    
    // 현재 화면에 표시된 값
    let number = resultElement.innerText;
    
    // 더하기/빼기
    if(type === 'plus') {
      number = parseInt(number) + 1;
    }else if(type === 'minus')  {
      number = parseInt(number) - 1;
    }
    
    // 결과 출력
    resultElement.innerText = number;
  }

  function hideBtn(){
    button_start.style.display = "none";
    button_nextWord.style.display = "block";
    scoreNow.style.display = "inline-block";
    result.style.display = "inline-block";
    btn_group.style.display = "block";
    nextWord.style.display = "block";
}

function showBtn(){
    button_start.style.display = "none";
    button_nextWord.style.display = "block";
    scoreNow.style.display = "inline-block";
    result.style.display = "inline-block";
    btn_group.style.display = "block";
    nextWord.style.display = "block";
}