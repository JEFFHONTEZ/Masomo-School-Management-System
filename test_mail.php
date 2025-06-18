use Illuminate\Support\Facades\Mail;

Route::get('/send-test-mail', function () {
    Mail::raw('This is a test email from Laravel using Gmail SMTP.', function ($message) {
        $message->to('receiver@example.com')
                ->subject('Test Mail');
    });
    return 'Email sent!';
});
