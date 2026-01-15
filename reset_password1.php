<?php
// reset_password.php - صفحة استعادة كلمة المرور (مصابة)
$token = "";
if (isset($_POST['reset_request'])) {
    // نقطة الضعف: استخدام دالة rand() وهي غير آمنة
    $token = rand(100000, 999999); 
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نظام استعادة الحسابات</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 400px; text-align: center; border-top: 6px solid #e74c3c; }
        h2 { color: #2c3e50; }
        .info { background: #fdf2f2; padding: 15px; border-radius: 8px; color: #c0392b; margin-bottom: 20px; font-size: 14px; border: 1px solid #f5c6cb; }
        input[type="email"] { width: 100%; padding: 12px; margin: 15px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .btn { background: #e74c3c; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; width: 100%; font-size: 16px; transition: 0.3s; }
        .btn:hover { background: #c0392b; }
        .token-box { margin-top: 25px; padding: 15px; background: #eee; border-radius: 10px; border: 2px dashed #999; }
        .token-value { font-size: 24px; font-weight: bold; color: #2c3e50; letter-spacing: 5px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>استعادة كلمة المرور</h2>
        <div class="info">تنبيه: هذا النظام يستخدم خوارزمية توليد ضعيفة (CWE-330)</div>
        <form method="POST">
            <input type="email" placeholder="أدخل بريدك الإلكتروني" required>
            <button type="submit" name="reset_request" class="btn">إرسال رمز التحقق</button>
        </form>
        
        <?php if ($token): ?>
        <div class="token-box">
            <p>رمز التحقق المرسل (ضعيف):</p>
            <div class="token-value"><?php echo $token; ?></div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>