<!DOCTYPE html>
<html>
    <head>
      <script type="text/javascript">
        function FormSubmit(){
          var submitBtn = document.getElementById('submit');
            if(submitBtn){
              submitBtn.click();
            }
          }
      </script>
        <title>Usuario Inactivo</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">USUARIO INACTIVO</div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <body onload="FormSubmit()">
                      <button type="submit" id="submit"></button>
                    </body>
                </form>

            </div>
        </div>
    </body>
</html>
