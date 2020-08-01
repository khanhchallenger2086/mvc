<?php
    class database {
        var $pdo;
        var $sql;
        var $stament;

        function __construct() {
            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=data','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                $this->pdo->query('set names utf8');
            } catch(PDOException $e) {
                exit('DB error :'. $e->getMessage()); // chỗ này để hiện ra lỗi lúc làm , còn lúc chạy thật thì phải trả true false để báo lỗi cho người dùng, cả ở dưới
            }
        }

        function setquery($sql) {
            $this->sql = $sql;
            return $this;
        }

        function loadrow($params = []) {
            try {
                $this->stament = $this->pdo->prepare($this->sql);
                $this->stament->execute($params);
                return $this->stament->fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                exit('SQL error :'. $e->getMessage());
            }
        }

        function loadrows($params = []) {
            try {
                $this->stament = $this->pdo->prepare($this->sql);
                $this->stament->execute($params);
                return $this->stament->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                exit('SQL error :'. $e->getMessage());
            }
        }

        function save($params = []) {
            try {
                $this->stament = $this->pdo->prepare($this->sql);
                return $this->stament->execute($params);
            } catch (PDOException $e) {
                exit('SQL error :'. $e->getMessage());
            }
        } // hàm chạy được param thì trả về true , ko được thì trả về false ,, gọi là lưu lại kết quả , nếu thất bại thì phải cho người dùng biết

        function disconnect() {
            $this->pdo = $this->stament = NULL;
            $this->sql = '';
        }
    }
?>