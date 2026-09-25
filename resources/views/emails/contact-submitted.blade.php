<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Consultation Request</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #1e3a8a; border-bottom: 2px solid #d62828; padding-bottom: 10px;">
        New Consultation Request
    </h2>
    <p>You have received a new consultation request through <strong>Shapiro The Hero</strong>:</p>
    <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; width: 30%;">Full Name:</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $submission->name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Phone Number:</td>
            <td style="padding: 8px; border: 1px solid #ddd;">
                <a href="tel:{{ $submission->phone }}">{{ $submission->phone }}</a>
            </td>
        </tr>
        @if($submission->email)
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Email:</td>
            <td style="padding: 8px; border: 1px solid #ddd;">
                <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a>
            </td>
        </tr>
        @endif
        @if($submission->case_type)
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Case Type:</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $submission->case_type }}</td>
        </tr>
        @endif
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold; vertical-align: top;">Message:</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{!! nl2br(e($submission->message)) !!}</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd; font-weight: bold;">Submitted At:</td>
            <td style="padding: 8px; border: 1px solid #ddd;">{{ $submission->created_at->format('F j, Y, g:i a') }}</td>
        </tr>
    </table>
</body>
</html>
