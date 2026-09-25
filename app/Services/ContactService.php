<?php

namespace App\Services;

use App\Mail\ContactSubmittedMail;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function handleSubmission(array $data, Request $request): ContactSubmission
    {
        // 1. Create DB record
        $submission = ContactSubmission::create([
            'name' => strip_tags(trim($data['name'])),
            'phone' => strip_tags(trim($data['phone'])),
            'email' => isset($data['email']) ? filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL) : null,
            'message' => strip_tags(trim($data['message'])),
            'case_type' => isset($data['case_type']) ? strip_tags(trim($data['case_type'])) : null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // 2. Dispatch notification email if configured
        try {
            $adminEmail = config('mail.from.address', 'contact@shapirothehero.com');
            if ($adminEmail && config('mail.default') !== 'log') {
                Mail::to($adminEmail)->send(new ContactSubmittedMail($submission));
            } else {
                Log::info('New Contact Submission Received:', $submission->toArray());
            }
        } catch (\Throwable $e) {
            Log::warning('Could not send contact form email: '.$e->getMessage());
        }

        return $submission;
    }
}
