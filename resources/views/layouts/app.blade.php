<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
   <!-- sweetaler2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2/sweetalert2.min.css')}}">
   @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  {{$slot}}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

<script>

    window.addEventListener('showconfirmdelete',event=>{
   
    
   
    Swal.fire({      
  title: 'Warning !',
  text: event.detail.message,
   icon: 'warning',
  confirmButtonText: 'Yes',
  cancelButtonText: 'No',
  confirmButtonColor: '#d33',
  showCancelButton: true,
  showCloseButton: true,
   
}).then((result) => {
  if (result.isConfirmed) {
  Livewire.emit('confirmdelete');
   
                Swal.fire({      
  title:  '<Strong style="color:#FF0000">User Deleted</Strong>',
  textcolor: '#d33',
   icon: 'success',
  timer: 900,
   showConfirmButton: false,
   
})
  }
})
})


window.addEventListener('hide-form',event=>{
    $('#form').modal('hide');
    
   
    Swal.fire({      
  title: 'Success!',
  text: event.detail.message,
  icon: 'success',
  showConfirmButton: false,
  timer: 1500,
   
})
})

</script>

<script>
window.addEventListener('show-form',event=>{
    $('#form').modal('show');
})


</script>

 @livewireScripts
</body>
</html>
