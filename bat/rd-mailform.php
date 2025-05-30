<?php
// 设定响应头为 JSON 格式
header('Content-Type: application/json');

// 初始化响应数组
$response = array(
    'success' => false,
    'message' => ''
);

// 检查是否通过 POST 方法提交了表单
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 检查是否存在 'email' 字段
    if (isset($_POST['email'])) {
        // 获取并过滤电子邮件地址
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        // 验证电子邮件地址的格式
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // 这里可以添加将电子邮件地址保存到数据库的代码
            // 示例：将电子邮件地址写入文件
            $file = 'subscribers.txt';
            file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);

            // 设置响应信息为成功
            $response['success'] = true;
            $response['message'] = '感谢您的订阅！';
        } else {
            // 设置响应信息为电子邮件格式无效
            $response['message'] = '请输入有效的电子邮件地址。';
        }
    } else {
        // 设置响应信息为未提供电子邮件地址
        $response['message'] = '请提供电子邮件地址。';
    }
} else {
    // 设置响应信息为无效的请求方法
    $response['message'] = '无效的请求方法。';
}

// 输出 JSON 格式的响应
echo json_encode($response);
// // 引入 PHPMailer 库
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];
//     $last_name = $_POST['last-name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $message = $_POST['message'];

//     $mail = new PHPMailer(true);

//     try {
//         // 服务器配置
//         $mail->SMTPDebug = 1; // 调试模式
//         $mail->isSMTP(); // 使用 SMTP
//         $mail->Host = 'smtp.sina.cn'; // 你的 SMTP 服务器地址
//         $mail->SMTPAuth = true; // 开启 SMTP 认证
//         $mail->Username = 'jstzcy@sina.cn'; // 你的 SMTP 用户名
//         $mail->Password = 'a13401237743A'; // 你的 SMTP 密码
//         $mail->SMTPSecure = 'tls'; // 启用 TLS 加密
//         $mail->Port = 587; // 端口号

//         // 发件人信息
//         $mail->setFrom($email, $name . 'jstzcy@sina.cn' . $last_name);

//         // 收件人信息
//         $mail->addAddress('jstzcy@sina.cn');

//         // 邮件内容
//         $mail->isHTML(false); // 邮件内容不是 HTML 格式
//         $mail->Subject = '表单提交信息';
//         $mail->Body = "名字: $name\n姓氏: $last_name\n电子邮件: $email\n电话: $phone\n消息: $message";

//         // 发送邮件
//         $mail->send();
//         echo '邮件发送成功';
//     } catch (Exception $e) {
//         echo "邮件发送失败: {$mail->ErrorInfo}";
//     }
// }
?>    