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
            <td>
                Property:-
                <a href="{{ route('propertyDetails', $data['slug']) }}">{{ $data['title'] }}</a>
            </td>
        </tr>
        <tr>
            <td>Name:- {{ $data['name'] }}</td>
        </tr>
        <tr>
            <td>Email:- {{ $data['email'] }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                Mobile:- {{ $data['mobile'] }}
            </td>
        </tr>
        <tr>
            <td>
                {{ $data['default_message'] }}
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Thanks and regards,</td>
        </tr>
        <tr>
            <td>{{ $data['name'] }}</td>
        </tr>
    </table>
</body>
</html>
