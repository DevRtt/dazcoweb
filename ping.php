<?php
$ip = $_GET['ip']; // استلام عنوان IP من الطلب

// إجراء Ping إلى العنوان IP
exec("ping -c 4 $ip", $output, $result);

if ($result == 0) {
    // استخراج وقت الاستجابة من الناتج
    preg_match('/time=([0-9.]+) ms/', implode("\n", $output), $matches);
    $latency = isset($matches[1]) ? $matches[1] : null;
    echo json_encode(['latency' => $latency]);
} else {
    echo json_encode(['error' => 'Unable to ping the server']);
}
?>
