<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Snippet - GoSNippets</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
</head>
<body  class='snippet-body'>

    {{ $slot }}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if(Session::has('error'))
	  <script type="text/javascript">
	  	toastr.options = {
		  	"closeButton" : true,
		  	"progressBar" : true
		}
  		toastr.error("{{ session('error') }}");
	  </script>
  	@endif


</body>
</html>