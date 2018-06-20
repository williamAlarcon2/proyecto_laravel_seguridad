/*
|--------------------------------------------------------------------------
|JS Login
|--------------------------------------------------------------------------
*/
$(function() {
    $('.page-center').matchHeight({
        target: $('html')
    });

    $(window).resize(function(){
        setTimeout(function(){
            $('.page-center').matchHeight({ remove: true });
            $('.page-center').matchHeight({
                target: $('html')
            });
        },100);
    });
});
/*
|--------------------------------------------------------------------------
|JS Desactivar Botón De Atras Login
|--------------------------------------------------------------------------
*/
function nobackbutton(){
    
   
   window.location.hash="";
  
   window.location.hash="Again-No-back-button" //chrome
   
   window.onhashchange=function(){window.location.hash="";}
  
}

/*
|--------------------------------------------------------------------------
|JS la primera letra en mayuscula y el resto en minuscula
|--------------------------------------------------------------------------
*/
function primera(solicitar){
    var index;
    var tmpStr;
    var tmpChar;
    var preString;
    var postString;
    var strlen;
    tmpStr = solicitar.value.toLowerCase();
    strLen = tmpStr.length;
        if (strLen > 0)
        {
                for (index = 0; index < strLen; index++)
            {
                if (index == 0)
                {
                    tmpChar = tmpStr.substring(0,1).toUpperCase();
                    postString = tmpStr.substring(1,strLen);
                    tmpStr = tmpChar + postString;
                }
                else
                {
                    tmpChar = tmpStr.substring(index, index+1);
                }
            }
        }
    solicitar.value = tmpStr;
}
/*
|--------------------------------------------------------------------------
|JS cada palabra en mayuscula y el resto en minuscula
|--------------------------------------------------------------------------
*/
function cadaprimera(solicitar){
    var index;
    var tmpStr;
    var tmpChar;
    var preString;
    var postString;
    var strlen;
    tmpStr = solicitar.value.toLowerCase();
    strLen = tmpStr.length;
    if (strLen > 0)
    {
        for (index = 0; index < strLen; index++)
        {
            if (index == 0)
            {
                tmpChar = tmpStr.substring(0,1).toUpperCase();
                postString = tmpStr.substring(1,strLen);
                tmpStr = tmpChar + postString;
            }
            else
            {
                tmpChar = tmpStr.substring(index, index+1);
            if (tmpChar == " " && index < (strLen-1))
            {
                tmpChar = tmpStr.substring(index+1, index+2).toUpperCase();
                preString = tmpStr.substring(0, index+1);
                postString = tmpStr.substring(index+2,strLen);
                tmpStr = preString + tmpChar + postString;
            }
            }
        }
    }
    solicitar.value = tmpStr;
}

/*
|--------------------------------------------------------------------------
|AGREGAR SUBLOTE
|--------------------------------------------------------------------------
*/

var contador = 0;
  $("#boton_sublote").click(function() {


      contador += 1
      var nombresublote = $("<input placeholder=\"Nombre SubLote\" type=\"text\" name=\"sublote[" + contador + "][nombreSub]\" id=\"nombreSub\" class=\"col-sm-3 inputs_sublotes\" required=\"true\"/>")
      var pollitassublote = $("<input placeholder=\"Pollitas del SubLote\" type=\"text\" name=\"sublote[" + contador + "][pollitasSub]\" id=\"pollitasSub\" class=\"col-sm-3 col-sm-offset-1 inputs_sublotes\" onkeypress=\"return SoloNumerosEnteros(event)\"/>");
      var sistemassublote = $("<select name=\"sublote[" + contador + "][idSistema]\" id=\"idSistema\" class=\"select2 col-sm-3 col-sm-offset-1 inputs_sublotes\">");
      cargarSistemas(sistemassublote);
      var removeButton = $("<div><button  class=\"btn btn-danger remove\" ><span class=\"glyphicon glyphicon-remove-circle\"></span></button></div>");
      removeButton.click(function() {
          $(this).parent().remove();
          contadorAdd -= 1;
      });

function cargarSistemas(selectSistemas) {
    var token = $("#token").val();

    $.ajax({
        url: '/consultasistemas',
        headers: {'X-CSRF-TOKEN': token},
        type: 'post',
        data: {
            idSistema: 0
        },
        success: function (data) {
        data= $.parseJSON(data);
                $(selectSistemas).append("<option value>Seleccione</option>");
                $.each(data, function (key, value) {
                        selectSistemas.append("<option value='" + value['id'] + "'>" + value['nombreSis'] + "</option>");
                });
              }
          });
        }

      var fieldWrapper = $("<div class=\" input_sublote separacion\">");
      fieldWrapper.append(nombresublote);
      fieldWrapper.append(pollitassublote);
      fieldWrapper.append(sistemassublote);
      fieldWrapper.append(removeButton);

      $("#row_separacion").append(fieldWrapper);
  });


/*
|--------------------------------------------------------------------------
|AGREGAR MUNICIPIO
|--------------------------------------------------------------------------
*/

  var contadormun = 0;
  $("#boton_municipio").click(function() {

      contadormun += 1
      
      var municipioszona = $("<select name=\"municipio[" + contadormun + "][idMunicipio]\" id=\"idMunicipio\" required=\"true\" class=\"select2 col-sm-3 col-sm-offset-1 inputs_sublotes\">");
      cargarMunicipios(municipioszona);
      var removeButton = $("<div><button  class=\"btn btn-danger remove\" ><span class=\"glyphicon glyphicon-remove-circle\"></span></button></div>");
      removeButton.click(function() {
          $(this).parent().remove();
          contadormunAdd -= 1;
      });

function cargarMunicipios(selectMunicipios) {
    var token = $("#token").val();

    $.ajax({
        url: '/consultamunicipios',
        headers: {'X-CSRF-TOKEN': token},
        type: 'post',
        data: {
            idMunicipio: 0
        },
        success: function (data) {
        data= $.parseJSON(data);
                $(selectMunicipios).append("<option value>Seleccione</option>");
                $.each(data, function (key, value) {
                        selectMunicipios.append("<option value='" + value['id'] + "'>" + value['nombreMun'] + "</option>");
                });
              }
          });
        }

      var fieldWrapper = $("<div class=\" input_sublote separacion\">");
      fieldWrapper.append(municipioszona);
      fieldWrapper.append(removeButton);

      $("#row_separacion").append(fieldWrapper);
  });

/*
|--------------------------------------------------------------------------
|SOLO NUMEROS ENTEROS onkeypress ="return SoloNumerosEnteros(event)"
|--------------------------------------------------------------------------
*/
 function SoloNumerosEnteros(evt){
   if(window.event){//asignamos el valor de la tecla a keynum
      keynum = evt.keyCode; //IE
   }
   else{
      keynum = evt.which; //FF
   }
  //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
   if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
      return true;
   }
   else{
      return false;
   }
}

/*
|--------------------------------------------------------------------------
|SOLO NUMEROS ENTEROS CON UN DECIMAL onkeypress="return undecimal(event,this);"
|--------------------------------------------------------------------------
*/

function undecimal(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,1})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}

/*
|--------------------------------------------------------------------------
|SOLO NUMEROS ENTEROS CON DOS DECIMALES onkeypress="return dosdecimal(event,this);" 
|--------------------------------------------------------------------------
*/

function dosdecimal(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter2(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter2(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter2(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}

/*
|--------------------------------------------------------------------------
|SOLO NUMEROS ENTEROS CON TRES DECIMALES onkeypress="return tresdecimal(event,this);" 
|--------------------------------------------------------------------------
*/

function tresdecimal(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter2(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter2(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter2(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,3})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}


/*
|--------------------------------------------------------------------------
|VALIDACION FOTOPERIODO
|--------------------------------------------------------------------------
*/

$( "#fotoPle" ).keyup(function() {
  var valorfoto = document.getElementById('fotoPle').value;
  if(valorfoto == '8' || valorfoto == '9' || valorfoto == '10' || valorfoto == '11' || valorfoto == '12')
  {  
    $('#fotoPle').removeClass('dato_invalido');
  }
  else
  {
    $('#fotoPle').addClass('dato_invalido');
  }
});

/*
|--------------------------------------------------------------------------
|VALIDACION DESPIQUE
|--------------------------------------------------------------------------
*/

$( "#despiquePle" ).keyup(function() {
  var valordes = document.getElementById('despiquePle').value;
  if(valordes == '1' || valordes == '2' || valordes == '3' || valordes == '4' || valordes == '5')
  {  
    $('#despiquePle').removeClass('dato_invalido');
  }
  else
  {
    $('#despiquePle').addClass('dato_invalido');
  }
});


/*
|--------------------------------------------------------------------------
|VALIDACION TRASLADO PX
|--------------------------------------------------------------------------
*/

$( "#trasladoPle" ).keyup(function() {
  var valortras = document.getElementById('trasladoPle').value;
  if(valortras == '10' || valortras == '11' || valortras == '12' || valortras == '13' || valortras == '14' || valortras == '15' || valortras == '16' || valortras == '17' || valortras == '18' || valortras == '19')
  {  
    $('#trasladoPle').removeClass('dato_invalido');
  }
  else
  {
    $('#trasladoPle').addClass('dato_invalido');
  }
});

/*
|--------------------------------------------------------------------------
|VALIDACION FOTO ESTIMULO
|--------------------------------------------------------------------------
*/

$( "#fotoestimuloPpr" ).keyup(function() {
  var valorfotoes = document.getElementById('fotoestimuloPpr').value;
  if(valorfotoes == '15' || valorfotoes == '16' || valorfotoes == '17' || valorfotoes == '18' || valorfotoes == '19')
  {  
    $('#fotoestimuloPpr').removeClass('dato_invalido');
  }
  else
  {
    $('#fotoestimuloPpr').addClass('dato_invalido');
  }
});

/*
|--------------------------------------------------------------------------
|VALIDACION FOTO PERIODO
|--------------------------------------------------------------------------
*/

$( "#fotoperiodoPpr" ).keyup(function() {
  var valorfotoes = document.getElementById('fotoperiodoPpr').value;
  if(valorfotoes == '12' || valorfotoes == '13' || valorfotoes == '14' || valorfotoes == '15' || valorfotoes == '16')
  {  
    $('#fotoperiodoPpr').removeClass('dato_invalido');
  }
  else
  {
    $('#fotoperiodoPpr').addClass('dato_invalido');
  }
});

/*
|--------------------------------------------------------------------------
|VALIDACION FOTO PERIODO LIST
|--------------------------------------------------------------------------


 var valorfotol = document.getElementById('fotoPleL').value;
  if(valorfotol == '8' || valorfotol == '9' || valorfotol == '10' || valorfotol == '11' || valorfotol == '12')
  {  
    $('#list_foto').removeClass('dato_invalido_list');
  }
  else
  {
    $('#list_foto').addClass('dato_invalido_list');
  }
*/
/*
|--------------------------------------------------------------------------
|VALIDACION DESPIQUE LIST
|--------------------------------------------------------------------------


  var valordesl = document.getElementById('despiquePleL').value;

  if(valordesl == '1' || valordesl == '2' || valordesl == '3' || valordesl == '4' || valordesl == '5')
  {  
    $('#list_despique').removeClass('dato_invalido_list');
  }
  else
  {
    $('#list_despique').addClass('dato_invalido_list');
  }
  */

/*
|--------------------------------------------------------------------------
|VALIDACION TRASLADO LIST
|--------------------------------------------------------------------------


  var valortrasl = document.getElementById('trasladoPleL').value;

  if(valortrasl == '10' || valortrasl == '11' || valortrasl == '12' || valortrasl == '13' || valortrasl == '14' || valortrasl == '15' || valortrasl == '16' || valortrasl == '17' || valortrasl == '18')
  {  
    $('#list_tras').removeClass('dato_invalido_list');
  }
  else
  {
    $('#list_tras').addClass('dato_invalido_list');
  }


var sem1 = document.getElementById('idpes').value;

console.log(sem1);
*/