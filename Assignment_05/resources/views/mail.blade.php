<!DOCTYPE html>
<html>
<head>
    <title>Assignment 05 generating pdf attachment and send it to email</title>
</head>
<body>

<h3>{{ $title }}</h3>

<table border="1" style="text-align: left;">
        <!-- Table Body -->
        <tr class="table-header">
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Major</th>
        </tr>
    <tbody>
        <tr>
            <td>{{ $name }}</td>
            <td>{{ $email }}</td>
            <td>{{ $phone }}</td>
            <td>{{ $address }}</td>
            <td>{{ $major }}</td>
        </tr>
    </tbody>
</table>

<p>
Regards,<br/>
   Yair Htut Khaung
</p>
</body>
</html>