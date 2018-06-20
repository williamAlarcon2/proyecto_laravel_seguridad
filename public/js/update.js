var valortras = document.getElementById('trasladoPle').value;
  if(valortras == '10' || valortras == '11' || valortras == '12' || valortras == '13' || valortras == '14' || valortras == '15' || valortras == '16' || valortras == '17' || valortras == '18' || valortras == '19')
  {  
    $('#trasladoPle').removeClass('dato_invalido');
  }
  else
  {
    $('#trasladoPle').addClass('dato_invalido');
  }

var valordes = document.getElementById('despiquePle').value;
  if(valordes == '1' || valordes == '2' || valordes == '3' || valordes == '4' || valordes == '5')
  {  
    $('#despiquePle').removeClass('dato_invalido');
  }
  else
  {
    $('#despiquePle').addClass('dato_invalido');
  }

var valorfoto = document.getElementById('fotoPle').value;
  if(valorfoto == '8' || valorfoto == '9' || valorfoto == '10' || valorfoto == '11' || valorfoto == '12')
  {  
    $('#fotoPle').removeClass('dato_invalido');
  }
  else
  {
    $('#fotoPle').addClass('dato_invalido');
  }
