<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Contact Mail</title>
    <style>
      html, body {
          height: 100%;
          background: #d2d6de;
      }
      .detail__wrap {
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .user__detail {
          width: 500px;
          margin: auto;
          padding: 35px 35px;
          box-shadow: 0px 0px 5px #0000001f;
          border-radius: 5px;
          background-color: #fff;
      }
      .logo {
          text-align: center;
          margin: 0 0 25px;
      }
      .logo img {
          width: 180px;
      }
      .user__content ul {
          list-style: none;
          padding: 0px;
          margin: 0;
      }
      .user__content ul li {
            margin-bottom: 20px;
            background-color: #ec3944;
            padding: 5px 5px;
            border-radius: 0px;
        }
        .user__content ul li p {
            margin: 0px;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
        }
      .user__content ul li p span {
          width: 100px;
      }
    </style>
  </head>
  <body>

    <section class="detail__wrap">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="user__detail">
              <div class="logo">
                <img src="https://inclusionsoft.com/images/logo.png">
              </div>
              <div class="user__content">
                <p>This person contact you regarding black friday enquiry</p>
                <ul>
                  <li><p>{{ $data['email'] }}</p></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
{{-- {{dd()}} --}}
