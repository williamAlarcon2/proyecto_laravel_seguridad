  $(function() {
     //Array para dar formato en español
      $.datepicker.regional['es'] =
      {


      monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
      'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
      'Jul','Ago','Sep','Oct','Nov','Dic'],
      monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
      dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
      dateFormat: 'yy/mm/dd', firstDay: 0,
      initStatus: 'Selecciona la fecha', isRTL: false};
      $.datepicker.setDefaults($.datepicker.regional['es']);

      //miDate: fecha de comienzo D=días | M=mes | Y=año
      //maxDate: fecha tope D=días | M=mes | Y=año
      $( "#datepicker" ).datepicker({ maxDate: "0D" }); //No se puede seleccionar un dia mayor al de hoy
      $( "#datepicker1" ).datepicker({ maxDate: "0D" }); //No se puede seleccionar un dia mayor al de hoy
      $( "#datepicker2" ).datepicker({ maxDate: "0D" }); //No se puede seleccionar un dia mayor al de hoy
      $( "#datepicker3" ).datepicker({ maxDate: "0D" }); //No se puede seleccionar un dia mayor al de hoy
      $( "#datepicker4" ).datepicker({ maxDate: "0D" }); //No se puede seleccionar un dia mayor al de hoy
      $( "#datepicker5" ).datepicker({ maxDate: "0D" }); //No se puede seleccionar un dia mayor al de hoy
  });
