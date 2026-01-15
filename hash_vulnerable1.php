<?php
// hash_vulnerable.php - كود مصاب (بدون Salt)
$hash_output = "";
$pass_input = "";

if (isset($_POST['password'])) {
    $pass_input = $_POST['password'];
    
    // نقطة الضعف: استخدام خوارزمية MD5 مباشرة بدون Salt
    // المشكلة: نفس المدخلات تعطي دائماً نفس المخرجات
    $hash_output = md5($pass_input); 
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تخزين كلمات المرور (غير آمن)</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); width: 400px; text-align: center; border-top: 5px solid #ff4757; }
        h2 { color: #2f3542; margin-bottom: 10px; }
        .warning { color: #ff4757; font-size: 13px; margin-bottom: 20px; background: #ffeaa7; padding: 10px; border-radius: 5px; }
        input[type="text"] { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ced6e0; border-radius: 6px; outline: none; }
        button { width: 100%; padding: 12px; background: #ff4757; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; }
        button:hover { background: #e04050; }
        .result-box { margin-top: 20px; text-align: left; background: #2f3542; color: #7bed9f; padding: 15px; border-radius: 8px; font-family: 'Courier New', monospace; font-size: 14px; word-break: break-all; }
        .label { color: #a4b0be; font-size: 12px; display: block; margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>نظام تشفير ضعيف</h2>
        <div class="warning">CWE-759: Hashing without Salt</div>
        
        <form method="POST">
            <input type="text" name="password" placeholder="أدخل كلمة المرور للتجربة" required value="<?php echo $pass_input; ?>">
            <button type="submit">تشفير (Hash)</button>
        </form>

        <?php if ($hash_output): ?>
        <div class="result-box">
            <span class="label">القيمة المخزنة في قاعدة البيانات:</span>
            <?php echo $hash_output; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>