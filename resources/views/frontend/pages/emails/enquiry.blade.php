<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
</head>

<body>
    <table>
        <tr>
            <td>Dear, Admin</td>
        </tr>
        <tr>
            <td>Enquiry form property website as below:-</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Name : {{ $name }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                Subject {{ $subject }}
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                Message {{ $user_message }}
            </td>
        </tr>
        <tr>
            <td>Thanks and regards,</td>
        </tr>
        <tr>
            <td>{{ $name }}</td>
        </tr>
    </table>
</body>

</html>
