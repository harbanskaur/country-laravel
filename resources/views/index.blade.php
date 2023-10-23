<html>
    <head>
        <title>Document</title>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
    </head>
    <body>
        <h1> COUNTRY - STATE - CITY  </h1>
        SELECT COUNTRY : <select id="country">
            <option value="">Select by Country-name </option>   
            @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->country}}</option>
            @endforeach 
        </select>
        <br><br>
        SELECT STATE : <select id="state">
            <option value="">Select by State-name</option>    
        </select>
        <br><br>

        SELECT CITY : <select id="city">
            <option value="">Select by City-name</option>    
        </select>
        <br><br>

        <script>
            $(document).ready(function(){
                $('#country').change(function(){
                    var cid=$(this).val();
                    $('#city').html('<option value="">Select City</option>')
                    $.ajax({
                        url:'{{url("/getState")}}',
                        type:'post',
                        data:'cid='+cid+'&_token={{csrf_token()}}',
                        success:function(result){
                            $('#state').html(result)
                        }
                    });
                });

                $('#state').change(function(){
                    var sid=$(this).val();
                    $.ajax({
                        url:'{{url("/getCity")}}',
                        type:'post',
                        data:'sid='+sid+'&_token={{csrf_token()}}',
                        success:function(result){
                            $('#city').html(result)
                        }
                    });
                });
            });
        </script>
    </body>
</html>