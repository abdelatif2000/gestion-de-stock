@if(Session::has('success'))
<div onLoad="fideOut()" class="alert bg-success" role="alert">
    <div class="iq-alert-text text-white"><i class="fas fa-check-circle"></i> {{Session::get("success")}} </div>
</div>
{{ Session::forget('success')}}
<script> setTimeout(function(){
    $("div.alert").fadeOut('easy');
    },6000);
</script>
@endif