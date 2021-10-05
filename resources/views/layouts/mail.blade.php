<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<h1>Feed Back from Website</h1>
<table>
	<tr><th>Name</th><td>{{ $name }}</td></tr>
	<tr><th>Email</th><td>{{ $email }}</td></tr>
    <tr><th>Phone</th><td>{{ $phone ?? ''}}</td></tr>
	<tr><th>Message</th><td>{!! $user_message !!}</td></tr> 
</table>

</body>
</html>
