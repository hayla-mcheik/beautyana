<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<style>

body{
    margin:0;
    padding:40px;
    background:#f7f4ef;
    font-family:Arial, Helvetica, sans-serif;
}

.wrapper{

    max-width:700px;

    margin:auto;

    background:#fff;

    border:1px solid #e5d7bc;

    border-radius:10px;

    overflow:hidden;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

.header{

    background:#B39256;

    color:#fff;

    text-align:center;

    padding:30px;

}

.header h1{

    margin:0;

    font-size:28px;

    letter-spacing:2px;

}

.header p{

    margin-top:8px;

    opacity:.9;

}

.content{

    padding:35px;

}

table{

    width:100%;

    border-collapse:collapse;

}

td{

    padding:14px;

    border-bottom:1px solid #eee;

}

td:first-child{

    width:220px;

    font-weight:bold;

    color:#B39256;

}

.footer{

    background:#faf7f1;

    text-align:center;

    padding:20px;

    color:#777;

    font-size:13px;

}

</style>

</head>

<body>

<div class="wrapper">

<div class="header">

<h1>DEMANTO</h1>

<p>New Appointment Request</p>

</div>

<div class="content">

<table>

<tr>
<td>Name</td>
<td>{{ $data['name'] }}</td>
</tr>

<tr>
<td>Email</td>
<td>{{ $data['email'] }}</td>
</tr>

<tr>
<td>Phone</td>
<td>{{ $data['phone'] }}</td>
</tr>

<tr>
<td>Appointment Date</td>
<td>{{ $data['appointment_date'] }}</td>
</tr>

<tr>
<td>Appointment Time</td>
<td>{{ $data['appointment_time'] }}</td>
</tr>

<tr>
<td>Subject</td>
<td>{{ $data['subject'] }}</td>
</tr>

<tr>
<td>Message</td>
<td>{{ $data['message'] }}</td>
</tr>

</table>

</div>

<div class="footer">

This appointment request was submitted through the DEMANTO website.

</div>

</div>

</body>

</html>