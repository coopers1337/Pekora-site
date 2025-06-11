<?php
header('Content-Type: application/json');

// Load environment variables (for .ROBLOSECURITY cookie)
$roblosecurity = getenv('ROBLOSECURITY') ?: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzZXNzaW9uSWQiOiJhMmEyNzI1Ni1mZjg2LTQ2YmItODk0MC0yYzg3OTEzMzUzODYiLCJjcmVhdGVkQXQiOjE3NDc0NjgxNjZ9.4ii56b27JbjzpVf23vMrBOGUaCXysf4ZruT27E_WAhGxSlUS78Dag36UGjLnrYXqfLdHnZZRzyKyH4ROjrIlvQ';

function fetchUser($userId, $roblosecurity) {
    $url = "https://www.pekora.zip/apisite/users/v1/users/$userId";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        "Cookie: .ROBLOSECURITY=$roblosecurity"
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

function fetchAvatar($userId, $roblosecurity) {
    $url = "https://www.pekora.zip/apisite/thumbnails/v1/users/avatar-headshot?userIds=$userId&size=420x420&format=png";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        "Cookie: .ROBLOSECURITY=$roblosecurity"
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return isset($data['data'][0]) ? $data['data'][0] : null;
}

$latestUserId = 10900;
$nextUserId = 10901;

// Fetch latest user (10900)
$latestUserResponse = fetchUser($latestUserId, $roblosecurity);
$latestAvatarResponse = fetchAvatar($latestUserId, $roblosecurity);

// Fetch next user (10901)
$nextUserResponse = fetchUser($nextUserId, $roblosecurity);
$nextAvatarResponse = fetchAvatar($nextUserId, $roblosecurity);

// Prepare response
$response = [
    'latestUser' => $latestUserResponse['errors'] ? null : $latestUserResponse,
    'latestAvatar' => $latestAvatarResponse,
    'nextUser' => $nextUserResponse['errors'] && $nextUserResponse['errors'][0]['message'] === 'NotFound' ? ['error' => 'NotFound'] : $nextUserResponse,
    'nextAvatar' => $nextAvatarResponse
];

echo json_encode($response);
?>
