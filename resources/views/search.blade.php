<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" enctype="multipart/form-data" id="google_keyword" action="javascript:void(0)">
                    @csrf
                    <label for="exampleInputEmail1">Search Keyword</label>
                    <input type="text" name="keywords" class="form-control" id="">
                    <br>
                    <button type="submit" name="" class="btn btn-primary">Submit</button>
                    <br>
                </form>
            </div>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <p id="demo"></p>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#google_keyword').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('google_keyword') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log('repsonse me kya aa rha hai' + response.success);
                        var address = response.success;
                        var myJSON = JSON.stringify(address);
                        console.log('my json me kya aa rha hai' + myJSON);
                        var separatedArray = myJSON.split(', ');
                        var myStringArray = response.success;
                        const fruits = myStringArray;
                        let fLen = fruits.length;
                        console.log('fleng me kya aa rha hai' + fLen);
                        let text = "<ul>";
                        for (let i = 0; i < fLen; i++) {
                            text += "<p>" + fruits[i] + "</p>";
                        }
                        text += "</p>";
                        document.getElementById("demo").innerHTML = text;
                        var getting_data = response.success;
                        $("#coming_data").html(response.success);
                    },
                    error: function(data) {}
                });
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </body>
</html>