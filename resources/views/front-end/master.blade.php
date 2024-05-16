<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('front-end/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('front-end/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

             @include('front-end.body.topnab')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <div class="row">
                      <div class="col-2"></div>
                      <div class="col-2 ">
                          <div class="card text-center">
                            <div class="card-header">
                              Well come 
                            </div>
                              <img src="" alt="Not found">
                              <div class="card-body">
                                  <h5 class="card-title">Name: {{ $user->name }}</h5>
                                  <h5 class="card-title">Email: {{ $user->email }}</h5>
                              </div>
                          </div>
                          <br>
                          <div class="card">
                            <div class="card-header">
                              Navgation
                            </div>
                            <ul class="list-group list-group-flush">
                              <a href=""><li class="list-group-item">Books</li></a>
                             <a href=""> <li class="list-group-item">Review</li></a>
                             <a href="{{ route('user.profile') }}"> <li class="list-group-item">Profile</li></a>
                             <a href=""> <li class="list-group-item">Cras justo odio</li></a>
                            <a href="">  <li class="list-group-item">Dapibus ac facilisis in</li></a>
                              <a href=""><li class="list-group-item">Vestibulum at eros</li></a>
                            </ul>
                          </div>
                      </div>
                      @yield('content')
                  </div>
                  <!-- Content Row -->
              </div>
              
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('front-end/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('front-end/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('front-end/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('front-end/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('front-end/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('front-end/js/demo/chart-pie-demo.js') }}"></script>

    //profile clicked nav bar ajax
    <script>
      $(document).ready(function() {
          $('a#profile-link').on('click', function(e) {
              e.preventDefault();
              $.ajax({
                  url: "{{ route('user.profile') }}",
                  type: 'GET',
                  success: function(response) {
                      $('#profile-section').html(response.view);
                  },
                  error: function(xhr) {
                      console.log(xhr.responseText);
                  }
              });
          });
      });
  </script>
  

</body>

</html>