<?php

/**
 * Contact form endpoint. Posted to by assets/scripts/vlt-controllers.js via AJAX,
 * which treats any non-2xx response as a failure and shows the error message.
 */
declare(strict_types=1);

const MAIL_TO = 'info.tamilsoft@gmail.com';

/**
 * The From address must be on the domain this server is actually authorised to
 * send for, or SPF/DKIM will reject it or file it as spam. Derived from the live
 * host rather than hardcoded, so it stays correct on whatever domain you deploy
 * to. Falls back to the destination address when there's no real host (CLI/localhost).
 */
function mail_from(): string {
    $host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
    $host = preg_replace('/:\d+$/', '', $host);   // strip port
    $host = preg_replace('/^www\./', '', $host);  // strip www

    return ($host !== '' && strpos($host, '.') !== false) ? 'noreply@' . $host : MAIL_TO;
}

const MAX_LENGTHS = ['name' => 100, 'email' => 254, 'message' => 5000];

/**
 * Header values must not contain CR/LF, or an attacker can append their own
 * headers and use the form as an open relay.
 */
function header_safe(string $value): string {
    return trim(str_replace(["\r", "\n", "%0a", "%0d"], '', $value));
}

function fail(int $status, string $message): never {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode(['ok' => false, 'error' => $message]);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    fail(405, 'Method not allowed.');
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($name === '' || $email === '') {
    fail(422, 'Name and email are required.');
}

foreach (MAX_LENGTHS as $field => $limit) {
    if (mb_strlen($$field) > $limit) {
        fail(422, ucfirst($field) . ' is too long.');
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    fail(422, 'That email address is not valid.');
}

$safeName = header_safe($name);
$safeEmail = header_safe($email);

$subject = 'Portfolio enquiry from ' . $safeName;

$body = "You have a new message from the tamilsoft portfolio contact form.\n\n"
        . "Name:    {$safeName}\n"
        . "Email:   {$safeEmail}\n"
        . "Sent:    " . date('Y-m-d H:i:s') . "\n"
        . "IP:      " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n\n"
        . "Message:\n"
        . ($message !== '' ? $message : '(no message provided)') . "\n";

$from = mail_from();

$headers = [
    'From: TAMILSOFT Portfolio <' . $from . '>',
    'Reply-To: ' . $safeName . ' <' . $safeEmail . '>',
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion(),
];

// Warnings are suppressed so a mailer failure cannot corrupt the JSON body; the
// return value is what the response is built from. The 5th argument sets the
// envelope sender, which many hosts require for delivery.
$sent = @mail(MAIL_TO, $subject, $body, implode("\r\n", $headers), '-f' . $from);

if (!$sent) {
    // Logged so a real send failure on the live host is diagnosable. Locally this
    // always fails: XAMPP has no mail server, so mail() cannot deliver.
    error_log('handler.php: mail() failed (from=' . $from . ', host=' . ($_SERVER['HTTP_HOST'] ?? 'cli') . ') for ' . $safeEmail);
    fail(500, 'Message could not be sent.');
}

header('Content-Type: application/json');
echo json_encode(['ok' => true]);
