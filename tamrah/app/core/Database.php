<?php

class Database {
    private $host = 'localhost';  // اسم السيرفر
    private $db_name = 'tamrah_db';  // اسم قاعدة البيانات، غيّره حسب ما ستستخدم
    private $username = 'root';    // اسم المستخدم في قاعدة البيانات
    private $password = '';        // كلمة السر (افتراضي في XAMPP تكون فارغة)
    private $conn;                 // المتغير الذي يحمل الاتصال
    
    // دالة لعمل اتصال جديد بقاعدة البيانات
    public function connect() {
        $this->conn = null;
        
        try {
            // إنشاء اتصال PDO مع خيارات تحسن الأداء والأمان
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, 
                                  $this->username, 
                                  $this->password);
            // ضبط وضع الخطأ ليكون استثناء (Exceptions)
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // تعيين الترميز إلى UTF8 لدعم العربية
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo 'فشل الاتصال بقاعدة البيانات: ' . $e->getMessage();
            exit;  // إنهاء التنفيذ عند الفشل في الاتصال
        }
        
        return $this->conn;
    }
}
