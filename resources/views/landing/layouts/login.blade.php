<!doctype html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://kit.fontawesome.com/5fde2fdc76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap">
  <style>
    html, body {
    height: 100%;
    margin: 0;
  }
  
  body {
    display: flex;
  }
  
  h2 {
    font-family: 'Poppins', sans-serif;
  }
  
  .left-section {
    width: calc(100% * 5 / 12);
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .right-section {
    width: calc(100% * 7 / 12);
    background-color: #fff;
  }
  
  @media (max-width: 992px) {
      .left-section {
          width: 50%;
          padding-left: 30px;
          padding-right: 30px;
      }
      .right-section {
          width: 50%;
      }
  }
  @media (max-width: 768px) {
      .left-section {
          width: 100%;
      }
      .right-section {
          display: none;
      }
  }
  @media (max-width: 576px) {
      .left-section {
          padding-left: 15px;
          padding-right: 15px;
          padding-top: 70px;
      }
  }
  
  
  .card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 90%;
    max-width: 600px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
  }
  
  .card form {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
  }
  
  .card form .form-group {
    width: 100%;
    max-width: 420px;
    margin-bottom: 20px;
  }
  
  .card img {
    width: 100%;
    max-width: 400px;
    height: auto;
    margin-bottom: 20px;
  }
  
  .card h2 {
    width: 100%;
    font-size: 24px;
    margin-bottom: 10px;
  }
  
  .card p {
    width: 100%;
    font-size: 18px;
    line-height: 1.5;
  }
  
  .form-group {
    width: 100%;
    margin-bottom: 10px;
    width: 100%;
  }
  
  .form-group label {
    display: flex;
    align-items: center;
  }
  
  .form-group label .icon {
    margin-right: 10px;
    font-size: 20px;
    color: #999;
  }
  
  .form-group input {
    display: block;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
  }
  
  .continue-with {
    display: block;
    margin-top: 20px;
  }
  
  .google,
  .facebook {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 50px;
    text-decoration: none;
    box-sizing: border-box;
    height: 50px;
    color: #999;
  }
  
  .circle-buttons {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 10px;
  }
  
  .circle-buttons a {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin: 0 10px;
  }
  
  .circle-buttons a:hover {
    color: #000;
  }
  
  input[type="email"],
  input[type="password"],
  input[type="text"] {
          width: 100%;
          padding: 12px 12px;
          margin: 4px 0;
          box-sizing: border-box;
          border: none;
          border-bottom: 2px solid #ccc;
        }
  
  button[type="submit"] {
    width: 100%;
    max-width: 400px;
    height: 50px; /* adjust as needed */
    font-family: 'Roboto', sans-serif;
    background-color: #1C913C;
    color: #fff;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    font-size: 18px;
    cursor: pointer;
  }
  
  .login-btn:hover {
    width: 100%;
    max-width: 400px;
    background-color: #115022;
  }

  .signup-btn:hover {
    width: 100%;
    max-width: 400px;
    background-color: #115022;
  }
  
  .hyperlnk {
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    color: #1C913C;
    display: block;
    margin-top: 20px;
  }
  
  .background-image {
    background-image: url("./assets/img/bgcover.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
    z-index: -1;
  }
  
  .shade {
    background-color: #5F5F5F;
    opacity: 0.65;
  }
  
  </style>

</head>
<body>
    
    @yield('content')    
       
    @stack('before-script')
   
    @stack('after-script')
</body>

</html>
