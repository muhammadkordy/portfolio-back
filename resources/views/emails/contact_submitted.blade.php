<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>New Portfolio Enquiry</title>
</head>
<body style="font-family: 'Segoe UI', Arial, sans-serif; background:#f7f7f5; padding:24px; color:#111;">
    <div style="max-width:640px; margin:0 auto; background:#ffffff; padding:32px; border:1px solid #ececec;">
        <div style="border-bottom:2px solid #1B2F5B; padding-bottom:12px; margin-bottom:24px;">
            <h1 style="margin:0; color:#1B2F5B; font-size:20px; letter-spacing:0.5px;">New Enquiry — Muhammad Kordy Portfolio</h1>
            <p style="margin:6px 0 0; color:#666; font-size:13px;">Received {{ $contact->created_at->format('d M Y, H:i') }}</p>
        </div>

        <table style="width:100%; border-collapse:collapse;">
            <tr>
                <td style="padding:8px 0; color:#666; width:160px; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Name</td>
                <td style="padding:8px 0; font-size:15px;">{{ $contact->name }}</td>
            </tr>
            @if($contact->organization)
            <tr>
                <td style="padding:8px 0; color:#666; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Organization</td>
                <td style="padding:8px 0; font-size:15px;">{{ $contact->organization }}</td>
            </tr>
            @endif
            @if($contact->email)
            <tr>
                <td style="padding:8px 0; color:#666; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Email</td>
                <td style="padding:8px 0; font-size:15px;"><a href="mailto:{{ $contact->email }}" style="color:#1B2F5B;">{{ $contact->email }}</a></td>
            </tr>
            @endif
            @if($contact->service)
            <tr>
                <td style="padding:8px 0; color:#666; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Service of Interest</td>
                <td style="padding:8px 0; font-size:15px;">{{ $contact->service }}</td>
            </tr>
            @endif
        </table>

        <div style="margin-top:20px; padding-top:20px; border-top:1px solid #ececec;">
            <p style="color:#666; font-size:13px; text-transform:uppercase; letter-spacing:1px; margin:0 0 12px;">Message</p>
            <p style="font-size:15px; line-height:1.6; white-space:pre-wrap; margin:0;">{{ $contact->message }}</p>
        </div>

        <div style="margin-top:32px; padding-top:16px; border-top:1px solid #ececec; color:#999; font-size:12px;">
            Muhammad Kordy Moustafa — Business Intelligence, Market Insights & Corporate Event Planning.
        </div>
    </div>
</body>
</html>
