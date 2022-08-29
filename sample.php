<?php       
include('')

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Document</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family:"Poppins", sans-serif;
      }

      body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(
            80deg,
            rgba(0, 0, 0, 0.3),
            rgba(0, 0, 0, 0.4)
          ),
          url("https://images.unsplash.com/photo-1661183977745-e71963f46e02?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=926&q=80");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      .form-container {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 40px 20px;
        border-radius: 4px;
        color: #fff;
        max-width: 350px;
        width: 100%;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
      }

      .form-container h2 {
        margin-bottom: 30px;
        font-size: 45px;
      }

      .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 30px;
        width: 100%;
        height: 35px;
      }

      .form-group input {
        width: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        border: none;
        outline: none;
        font-size: 18px;
        padding: 2px 10px;
        color: #fff;
        font-weight: 600;
        margin-bottom: 10px;
        border-radius: 3px;
      }

      .form-group label {
        font-weight: 700;
      }

      .submit-btn {
        padding: 7px 14px;
        width: 100%;
        margin-top: 20px;
        background-color: #00b5fd;
        border: none;
        border-radius: 4px;
        color: #fff;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="form-container">
        <h2>Sign Up</h2>
        <form action="#" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" />
          </div>
          <div class="form-group">
            <label for="username">Email</label>
            <input type="text" name="email" />
          </div>
          <div class="form-group">
            <label for="username">Password</label>
            <input type="text" name="password" />
          </div>
          <button type="submit" class="submit-btn">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
