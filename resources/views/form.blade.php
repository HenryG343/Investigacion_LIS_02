<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HTML5 Flat Login Page</title>
    <style>
      /*Initial setup*/

* {
    font-family: 'Roboto', sans-serif;;
    font-size: 16px;
  }
  
  body {
    background-color: #447df1;
  }
  
  /*Container*/
  
  main {
    /*border: 2px solid white;*/
    max-width: 60%;
    padding: 20px 0;
    margin: 0 auto;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  
  
  header h1 {
    color: white;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 40px;
    font-weight: 900;
    font-size: 24px;
  }
  
  header h1 span {
    font-weight: 100;
    font-size: 24px;
  }
  
  
  /*Form styles*/
  
  input {
    width: 90%;
    height: 50px;
    border: none;
    padding: 3% 5%;
    font-size: 15px;
    font-family: 'Open Sans', sans-serif;
  }
  
  input[type="text"] {
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
  }
  
  input[type="password"] {
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  
  button[type="submit"] {
    display: block;
    width: 100%;
    height: 70px;
    border: none;
    background-color: #f9d114;
    border-radius: 10px;
    font-size: 20px;
    margin-top: 20px;
    color: white;
  }
  
  
  /*Footer*/
  
  footer {
    margin-top: 50px;
    font-family: 'Open Sans', sans-serif;
  }
  
  footer p {
    color: white;
    text-align: center;
    font-size: .8rem;
  }
  
  footer a {
    text-decoration: none;
    font-size: .8rem;
  }
  
  /*Media query*/
  
  @media only screen and (max-width: 500px) {
    main {
      width: 80%;
      max-width: 100%;
  
    }
  }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,400,900" rel="stylesheet">
  </head>
  <body>
    <!-- Main container -->
    <main>
      <!-- Form title Login/Sign UP -->
      <header>
        <h1 class="form-title">Login MVC</h1>
      </header>

      <!-- Login form -->
      <form action="/login" method="post">
        @csrf
        <input type="text" name="email" value="" placeholder="Correo">
        
        <input type="password" name="password" value="" placeholder="Contrase??a">
        @isset($productos)
          @if($productos==1)
            <span>Ingrese el correo correctamente</span>
          @endif
          @if($productos==2)
            <span>Correo o contrase??a incorrectos</span>
          @endif
        @endisset
        <button type="submit" value="submit">Ingresar</button>
      </form>

    </main>

  </body>
</html>