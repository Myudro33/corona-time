<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="max-width: 600px; margin-top: 100px;">
        <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 40px 20px;">
                <img src="https://i.ibb.co/T8gsJmy/landing.png" alt="img"
                    style="max-width: 600px; margin-bottom: 20px;">
                <h1
                    style="font-size: 24px; font-weight: bold; color: black; margin-bottom: 10px; font-family: 'Inter', sans-serif;">
                    {{ __('email-password.password_email_body_title') }}</h1>
                <p
                    style="font-size: 16px; color: black; line-height: 1.5; margin-bottom: 20px; font-family: 'Inter', sans-serif;">
                    {{ __('email-password.password_email_body_paragraph') }}</p>
                <p align="center" style="margin: 0; font-family: 'Inter', sans-serif;">
                    <a style="display: inline-block; font-size: 16px; font-weight: bold; color: #ffffff; background-color: #0FBA68; padding: 10px 30px; border-radius: 5px; text-decoration: none;"
                        href="{{ env('MAIL_BODY_URL') }}/password-update/{{ $token }}">
                        {{ __('email-password.password_email_body_button') }}
                    </a>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
