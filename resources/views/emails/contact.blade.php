<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
</head>

<body style="
    margin:0;
    padding:0;
    background:#f5f3ef;
    font-family:Arial, Helvetica, sans-serif;
    color:#222;
">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f5f3ef; padding:40px 15px;">

    <tr>
        <td align="center">

            <!-- Main Container -->
            <table
                width="650"
                cellpadding="0"
                cellspacing="0"
                border="0"
                style="
                    max-width:650px;
                    width:100%;
                    background:#ffffff;
                    border-radius:12px;
                    overflow:hidden;
                    box-shadow:0 5px 25px rgba(0,0,0,0.08);
                "
            >

                <!-- Header -->
                <tr>
                    <td style="
                        background:#111111;
                        padding:35px 30px;
                        text-align:center;
                    ">

                        <div style="
                            font-family:Georgia, 'Times New Roman', serif;
                            font-size:32px;
                            letter-spacing:3px;
                            color:#ffffff;
                            font-weight:normal;
                        ">
                            Beautyana
                        </div>

          

                    </td>
                </tr>


                <!-- Title -->
                <tr>
                    <td style="padding:35px 35px 20px 35px;">

                        <div style="
                            font-family:Georgia, 'Times New Roman', serif;
                            font-size:28px;
                            color:#222;
                            margin-bottom:10px;
                        ">
                            New Contact Message
                        </div>

                        <p style="
                            margin:0;
                            color:#777;
                            font-size:14px;
                            line-height:24px;
                        ">
                            You have received a new message through the Beautyana website.
                        </p>

                    </td>
                </tr>


                <!-- Contact Details -->
                <tr>
                    <td style="padding:10px 35px 25px 35px;">

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                border:1px solid #e8e4dc;
                                border-radius:8px;
                                overflow:hidden;
                            "
                        >

                            <!-- Name -->
                            <tr>
                                <td style="
                                    width:35%;
                                    padding:15px;
                                    background:#faf9f6;
                                    border-bottom:1px solid #e8e4dc;
                                    color:#777;
                                    font-size:13px;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                ">
                                    Name
                                </td>

                                <td style="
                                    padding:15px;
                                    border-bottom:1px solid #e8e4dc;
                                    font-size:15px;
                                    color:#222;
                                ">
                                    {{ $emailData['name'] }}
                                </td>
                            </tr>


                            <!-- Email -->
                            <tr>
                                <td style="
                                    padding:15px;
                                    background:#faf9f6;
                                    border-bottom:1px solid #e8e4dc;
                                    color:#777;
                                    font-size:13px;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                ">
                                    Email
                                </td>

                                <td style="
                                    padding:15px;
                                    border-bottom:1px solid #e8e4dc;
                                    font-size:15px;
                                    color:#222;
                                ">
                                    {{ $emailData['email'] }}
                                </td>
                            </tr>


                            <!-- Phone -->
                            <tr>
                                <td style="
                                    padding:15px;
                                    background:#faf9f6;
                                    border-bottom:1px solid #e8e4dc;
                                    color:#777;
                                    font-size:13px;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                ">
                                    Phone
                                </td>

                                <td style="
                                    padding:15px;
                                    border-bottom:1px solid #e8e4dc;
                                    font-size:15px;
                                    color:#222;
                                ">
                                    {{ $emailData['phone'] }}
                                </td>
                            </tr>


                            <!-- Subject -->
                            <tr>
                                <td style="
                                    padding:15px;
                                    background:#faf9f6;
                                    color:#777;
                                    font-size:13px;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                ">
                                    Subject
                                </td>

                                <td style="
                                    padding:15px;
                                    font-size:15px;
                                    color:#222;
                                ">
                                    {{ $emailData['subject'] }}
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>


                <!-- Message -->
                <tr>
                    <td style="padding:0 35px 35px 35px;">

                        <div style="
                            font-family:Georgia, 'Times New Roman', serif;
                            font-size:20px;
                            color:#222;
                            margin-bottom:12px;
                        ">
                            Message
                        </div>

                        <div style="
                            background:#faf9f6;
                            border-left:4px solid #d8c08b;
                            padding:20px;
                            border-radius:5px;
                            color:#555;
                            font-size:15px;
                            line-height:26px;
                            white-space:pre-line;
                        ">
                            {{ $emailData['message'] }}
                        </div>

                    </td>
                </tr>


                <!-- Footer -->
                <tr>
                    <td style="
                        background:#111111;
                        padding:22px;
                        text-align:center;
                    ">

                        <div style="
                            color:#ffffff;
                            font-family:Georgia, 'Times New Roman', serif;
                            font-size:18px;
                            letter-spacing:2px;
                        ">
                            Beautyana
                        </div>

         
                        <div style="
                            margin-top:12px;
                            color:#777777;
                            font-size:11px;
                        ">
                            © {{ date('Y') }} Beautyana. All Rights Reserved.
                        </div>

                    </td>
                </tr>

            </table>

        </td>
    </tr>

</table>

</body>
</html>