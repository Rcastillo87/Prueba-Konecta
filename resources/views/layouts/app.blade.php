<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>

</head>
  <body>

  <header class="bg-dark text-white">
        <div class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-end">
            <div class="row align-self-end col-2"> </div>
        </div>
  </header>


  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="welcome" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">


                    
                    <li class="nav-item">
                        <a  href="CRUD_Productos" class="nav-link align-middle px-0">
                        <span class="bi bi-cart-check"></span><span class="ms-1 d-none d-sm-inline">Inventario Productos</span>
                        </a>
                    </li>   

                    <li class="nav-item">
                        <a  href="CRUD_Ventas" class="nav-link align-middle px-0">
                        <span class="bi bi-shop"></span><span class="ms-1 d-none d-sm-inline">Ventas</span>
                        </a>
                    </li>   
                    
                    
                </ul>
            </div>
        </div>
        
        <div class="container-fluid col-10">
            <div class="row flex-nowrap">
                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript">

    function update(id) {
        var www = "{{ url('/Lista_Productos?id=') }}" + id;
        $.ajax({
            type: "get",
            url: www,
            async: false,
            success: function(data) {
                $('#nombre_producto').val(data.nombre_producto);
                $('#referencia').val(data.referencia);
                $('#precio').val(data.precio);
                $('#categoria').val(data.categoria);
                $('#stock').val(data.stock);
                $('#peso').val(data.peso);
                $('#id').val(data.id);
            }
        });
    }

    $("#my_form").submit(function(event) {
          event.preventDefault(); //prevent default action 
          let post_url = $(this).attr("action"); //get form action url
          let form_data = $(this).serialize(); //Encode form elements for submission   
          $.post(post_url, form_data, function(response) {
            if( response.errors != null){
                alert(response.errors);                
            }else{
                var table = document.getElementById("tbody");
                var row = table.insertRow(0);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);

                cell1.innerHTML = response.id;
                cell2.innerHTML = response.id_producto;
                cell3.innerHTML = response.nombre_producto;
                cell4.innerHTML =  response.cantidad; 
                cell5.innerHTML = response.created_at;
                cell6.innerHTML = response.updated_at;
            }

          });
    });

</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>
  </body>
</html>
