<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFA Verification Code</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table width="600" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 5px; padding: 20px; box-shadow: 0px 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="left" style="padding-bottom: 20px;">
                            <img src="https://i.imgur.com/0RHCilY.png" alt="Company Logo" style="height: 40px;">
                            <h1 style="display: inline-block; font-size: 20px; font-weight: bold; margin-left: 10px;margin-top: 5px; vertical-align: middle; color: #333;">
                                Porto Romano
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h2>Dear {{ $user->name }},</h2>
                            <p><strong>Your MFA verification code is:</strong></p>
                            <p style="text-align: center; font-size: 24px; font-weight: bold; background-color: #f3f3f3; padding: 10px; border-radius: 5px; display: inline-block;">
                                {{ $otp }}
                            </p>
                            <p>This code will expire in 5 minutes.</p>
                            <p>If you did not request this, please contact us immediately at 
                                <a href="tel:0377100509" style="color: #007bff; font-weight: bold; font-size: 15px; text-decoration: none;">
                                    : 03 7710 0509
                                </a>.
                            </p>
                            <p>Thank you,<br>The Team</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px; font-size: 12px; color: #777;">
                            <p>&copy; Porto Romano, Mont' Kiara Banyan, 28, Jalan Kiara, Mont Kiara, 50480 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
                            <p>
                            | <a href="https://portoromano.my/" style="color: #007bff; text-decoration: none;">Official Website</a> | 
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
