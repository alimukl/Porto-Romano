<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MFA Verification Code</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body
    style="
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffffff;
      font-size: 14px;
    "
  >
    <div
      style="
        max-width: 680px;
        margin: 0 auto;
        padding: 45px 30px 60px;
        background-image: url('https://images.unsplash.com/photo-1644688389824-adbf547b229f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3Ds');
        background-repeat: no-repeat;
        background-size: 800px 452px;
        background-position: top center;
        font-size: 14px;
        color: #434343;
      "
    >
      <header>
        <table style="width: 100%;">
          <tbody>
            <tr style="height: 0;">
              <td>
                <img
                  alt="Company Logo"
                  src="https://i.imgur.com/0RHCilY.png"
                  height="55px"
                />
              </td>
              <td style="text-align: right;">
                <span style="font-size: 16px; line-height: 30px; color: #ffffff;">
                  {{ date('d M, Y') }}
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </header>

      <main>
        <div
          style="
            margin: 0;
            margin-top: 70px;
            padding: 92px 30px 100px;
            background:rgb(246, 249, 255);
            border-radius: 30px;
            text-align: center;
          "
        >
          <div style="width: 100%; max-width: 489px; margin: 0 auto;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 500; color: #1f1f1f;">
              Your OTP
            </h1>
            <p style="margin: 0; margin-top: 17px; font-size: 16px; font-weight: 500;">
            Your OTP for verification is shown below. It is only active for 5 minutes. For security reasons, do not share this code with anyone.
            </p>
            <p
              style="
                margin: 0;
                margin-top: 60px;
                font-size: 40px;
                font-weight: 600;
                letter-spacing: 25px;
                color: #ba3d4f;
              "
            >
              {{ $otp }}
            </p>
            <p style="margin: 0; margin-top: 17px; font-weight: 500;">
              This code will expire in
              <span style="font-weight: 600; color: #1f1f1f;">5 minutes</span>.
            </p>
          </div>
        </div>
      </main>

      <footer
        style="
          width: 100%;
          max-width: 490px;
          margin: 20px auto 0;
          text-align: center;
          border-top: 1px solid #e6ebf1;
        "
      >
        <p style="margin: 0; margin-top: 40px; font-size: 16px; font-weight: 600; color: #434343;">
          Your Company Name
        </p>
        <p style="margin: 0; margin-top: 8px; color: #434343;">Your Company Address</p>
        <p style="margin: 0; margin-top: 16px; color: #434343;">
          Copyright © {{ date('Y') }} Your Company. All rights reserved.
        </p>
      </footer>
    </div>
  </body>
</html>
