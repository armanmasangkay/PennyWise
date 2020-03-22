<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PennyWise | Login</title>
</head>
<body>
    <div class="container">
        <!--This is the heading-->
        <h1 class="display-4 text-center mt-5">PennyWise</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 col-10">
                <blockquote class="blockquote text-center" style="font-size:14px;">
                        <p class="mb-0">“Do not save what is left after spending; instead spend what is left after saving.”</p>
                        <footer class="blockquote-footer">Warren Buffett <cite title="Source Title">Goodreads.com</cite></footer>
                </blockquote> 
            </div>       
        </div>
          <!--Login form row-->
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
               
                <div class="alert alert-danger text-center" role="alert" style="display:none" id="errorMessage">
                        Invalid username/password
                </div>


                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-2" id="login">Log in</button>
                    <div class="text-center">
                        <a href="#">New user?</a>
                    </div>
                   
                </form>
               
            </div>      
        </div>
         <!--End of login form-->
             
    </div>
   
    

    <!--Bootstrap required JS files-->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


    <script type="text/javascript">
        $(document).ready(function() {
        
            $('#login').click(function(e){
                e.preventDefault();
                var username = $("#username").val();
                var password = $("#password").val();
    
                $.ajax({
                    type: "POST",
                    url: "/phpfiles/login_check.php",
                    data: {'username':username,'password':password},
                    success : function(data){
                        var jsonData=JSON.parse(data);
                        
                        if (jsonData.success ==1){
                            window.location.replace('index.html');
                        } else {
                            $("#errorMessage").css("display",'');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                });
        
        
            });
            
        });
        </script>
</body>
</html>