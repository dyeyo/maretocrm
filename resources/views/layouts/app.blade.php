<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Lector AMI CRM</title>
    <script src="https://kit.fontawesome.com/7e8f963e2a.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="skin-default-dark fixed-layout">
@routes

   <div class="preloader">
      <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Lector AMI</p>
      </div>
    </div>
    <div id="main-wrapper">
    <div id="app">
    @guest
    @else
    @include('layouts.nav')
    @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.fotter')

  <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <!-- Bootstrap popper Core JavaScript -->
  <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('dist/js/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
  <!--Custom JavaScript -->
  <script src="{{ asset('dist/js/custom.min.js') }}"></script>
  <script src="{{ asset('assets/js/raphael/raphael-min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assets/js/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ asset('assets/js/peity/jquery.peity.init.js') }}"></script>
  <script src="{{ asset('assets/js/functions.js')}}"></script>
  <script src="{{ asset('assets/js/validations.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2({
      allowClear: true,
      placeholder: "Seleccione una opcion.."
    });
    $('#tabla').DataTable({ language:
      {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo:
          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      }
    });
    let alerta = $(".close").length;
    if (alerta == 1) {
      setTimeout(function () {
        $(".alert-success").fadeOut(1500);
      }, 3000);
    }

  });
  </script>


</body>
</html>
