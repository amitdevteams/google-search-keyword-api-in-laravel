<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<style>
    #demo {
        color: red;
    }

    .news {
        font-family: 'Noto Serif Toto', serif;
        color: red;
        font-size: 45px;
        text-align: center;
        margin-top: 29px;

    }

    .bns {
        margin-left: 423px;
        margin-top: 27px;
        
    }

    .des {
        margin-left: 192px;
        color: green;
        font-size: 23px;
        font-family: 'Noto Serif Toto', serif;

    }

    .search-box {
        width: 750px;
        position: relative;
        display: flex;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        margin-top: 42px;
    }

    .search-input {
        width: 100%;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        padding: 15px 45px 15px 15px;
        background-color: #eaeaeb;
        color: #6c6c6c;
        border-radius: 56px;
        border: none;
        transition: all .4s;
    }

    .search-input:focus {
        border: none;
        outline: none;
        box-shadow: 0 1px 12px #b8c6db;
        -moz-box-shadow: 0 1px 12px #b8c6db;
        -webkit-box-shadow: 0 1px 12px #b8c6db;
    }

    .search-btn {
        background-color: transparent;
        font-size: 18px;
        padding: 6px 9px;
        margin-left: -45px;
        border: none;
        color: #6c6c6c;
        transition: all .4s;
        z-index: 10;
    }

    .search-btn:hover {
        transform: scale(1.2);
        cursor: pointer;
        color: black;
    }

    .search-btn:focus {
        outline: none;
        color: black;
    }

    p{
        color: blue !important;
        font-size: 183px;
        font-family: 'Montserrat', sans-serif;
    }
</style>
@extends('page-layouts.index')
@section('content')
    <div class="container">
        <div class="news">Search Keyword</div>
        <div class="row" style="margin-left: 110px;">
            <div class="col-lg-11">
                <form method="POST" enctype="multipart/form-data" id="google_keyword" action="javascript:void(0)">
                    @csrf
                    <div class="search-box">
                        <input type="text" name="keywords" class="search-input" type="text" placeholder="Search something..">
                        <div class="form-group">
                            <input type="hidden" value="jN4UWs7zNmIr0NbEkA1pNt4wLuVAMPZ2rCYyG688"
                                name="token" placeholder="put your token" id="token">
                        </div>
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    <button type="submit" name="" class="btn btn-primary bns" class="bns">Submit</button>

                </form>
            </div>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- amit test here  --}}
            <p id="demo" class="des"></p>
            {{-- amit test here  --}}
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
                        console.log('address me kyaa aa rha hai'+address);
                        var myJSON = JSON.stringify(address);
                        console.log('my json me kya aa rha hai' + myJSON);
                        var separatedArray = myJSON.split(', ');
                        var myStringArray = response.success;
                        const amits = myStringArray;
                        let fLen = amits.length;
                        console.log('length me kya aa rha hai' + fLen);
                        let text = "<ul>";
                        for (let i = 0; i < fLen; i++) {
                            text += "<li>" + amits[i] + "</li>";
                        }
                        text += "</ul>";
                        document.getElementById("demo").innerHTML = text;
                    },
                    error: function(data) {}
                });
            });
        });
    </script>
@endsection
