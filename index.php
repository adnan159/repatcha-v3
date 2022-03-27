<html>
   <script src="https://www.google.com/recaptcha/api.js?render=6LfrxhQfAAAAAEETQKgQ4dQWo--u2maaJGc55qe6
   "></script>
   <script>
       grecaptcha.ready(function() {
       // do request for recaptcha token
       // response is promise with passed token
           grecaptcha.execute('6LfrxhQfAAAAAEETQKgQ4dQWo--u2maaJGc55qe6', {action:'validate_captcha'})
                     .then(function(token) {
                        console.log(token);
                        document.getElementById("token").value = token;
           });
       });
   </script>

   <body>


         <?php
            if(isset($_POST['post'])){
               $secret_key = '6LfrxhQfAAAAAPJruqpkLo4DIk5XCy5yyZNmNGFN';
               $token = $_POST['token'];
               $ip_address = $_SERVER['REMOTE_ADDR'];
               $url = "https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$token}";
               $request = file_get_contents($url);
               $response = json_decode($request);
               var_dump($response);
            }    
         ?> 


      <form action = "index.php" method = "POST">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type="hidden" name="token" id="token" />
         <input type = "submit" name = "post" />
      </form>   
   </body>
</html>