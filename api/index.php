<?php
// Content-Typeを明示
header('Content-Type: application/json; charset=UTF-8');

// POST以外は405
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// POSTパラメータ取得
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

if ($name === '' || $email === '' || $message === '') {
    echo json_encode(['success'=>false, 'message'=>'全ての項目を入力してください']);
    exit;
}

// --- 本来はここでメール送信やDB保存などを行う ---
// mail('youraddress@example.com', 'お問い合わせ', ...)

$response = [
    'success' => true,
    'message' => "お問い合わせを受け付けました。サンプルなので送信処理は行われません。",
    'your_post' => [
        'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
        'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
        'message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
    ]
];
echo json_encode($response);
exit;