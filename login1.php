<?php
// login.php - Vulnerable Page (HTTP)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // محاكاة لعملية تسجيل الدخول
    $message = "تم إرسال البيانات! (اسم المستخدم: $user | كلمة المرور: $pass)";
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول - بوابة الموظفين</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify_content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
            border-top: 5px solid #d9534f; /* لون أحمر دلالة على الخطر/عدم الأمان */
        }
        h2 { color: #333; margin-bottom: 20px; }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; 
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover { background-color: #0056b3; }
        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #e2e3e5;
            border-radius: 5px;
            color: #383d41;
            font-size: 14px;
        }
        .warning-text { color: red; font-size: 12px; margin-top: -5px; margin-bottom: 10px; display: block;}
    </style>
</head>
<body>

<div class="login-container">
    <h2>تسجيل الدخول</h2>
    <p style="color: gray; font-size: 14px;">الرجاء إدخال بيانات الاعتماد</p>
    
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <span class="warning-text">⚠ الاتصال غير مشفر (HTTP)</span>

        <input type="submit" value="دخول">
    </form>

    <?php if(isset($message)) { echo "<div class='alert'>$message</div>"; } ?>
</div>

</body>
</html>