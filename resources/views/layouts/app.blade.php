<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="eHxAmuF3GGbtFzHrIMSVqwVdHg56xh6oat7wF6oB">
<title>@yield('title')</title>
{{-- <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}"/> --}}
<link rel="stylesheet" href="{{asset('vendor/%40fortawesome/fontawesome-free/css/all.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
@stack("styles")
<link rel="stylesheet" href="{{asset('css/backend.css')}}"/>
<link rel="stylesheet" href="{{asset('css/myown.css')}}">
{{-- <link rel="stylesheet" href="{{asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css')}}"/> --}}
{{-- <link rel="stylesheet" href="{{asset('vendor/remixicon/fonts/remixicon.css')}}"/> --}}
</head>
<body >
{{-- <div id="loading">
       <div id="loading-center">
       </div>
      
     <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  ...
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
       </div>
</div> --}}
 @include('components.header')
 @include('components.model')
 @include("components.sidbar")
 @yield('content')
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
@stack('scripts')
</body>
</html>

