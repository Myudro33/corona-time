<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="div"
        style="padding: 20px; display: flex; flex-direction: column; align-items: center;justify-content: center">
        <img src="https://i.ibb.co/T8gsJmy/landing.png" alt="img">
        <h1 style="font-size: 25px;font-weight: 900; margin: 16px 0px; font-family: 'Inter', sans-serif;">{{__('email-password.password_email_body_title')}}</h1>
        <p style="font-size: 16px;font-weight: 400; margin:16px 0px;font-family: 'Inter', sans-serif;">{{__('email-password.password_email_body_paragraph')}}</p>
        <a style="background-color: #0FBA68;color: white; border-radius: 8px; display:flex;justify-content: center;align-items:center; font-weight: 900; margin-top: 40px;text-decoration:none;font-family: 'Inter', sans-serif;"
            href="{{env('MAIL_BODY_URL')}}/password-update/{{ $token }}">
            {{__('email-password.password_email_body_button')}}
        </a>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;800;900&display=swap');

    body {
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center
    }

    a {
        width: 392px;
        height: 56px;
    }

    .div {
        width: 520px;
    }

    img {
        width: 100%;
    }

    @media only screen and (max-width: 600px) {
        .div {
            width: 90%;
            padding: 10px;
        }

        img {
            width: 100%
        }

        a {
            width: 100%;
            height: 48px;
        }
    }
</style>

</html>
