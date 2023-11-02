<?php
/**
 * datrabase structure
 CREATE TABLE `users` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`fname` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`lname` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`email` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=4
;

*/

class PDOConnection {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function selectUser($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $user = new User($row['fname'],$row['lname'], $row['email']);
            $user->setId($userId);
            return $user;
        }

        return null;
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        $users = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['fname'], $row['lname'], $row['email']);
            $user->setId($row['id']);
            $users[] = $user;
        }

        return $users;
    }

    public function insertUser(User $user) {
        $user = array($user->getFname(),$user->getLname(),$user->getEmail());
        $stmt = $this->pdo->prepare("INSERT INTO users (fname,lname,email) VALUES (:fname, :lname, :email)");
        $stmt->bindParam(':fname', $user[0], PDO::PARAM_STR);
        $stmt->bindParam(':lname', $user[1], PDO::PARAM_STR);
        $stmt->bindParam(':email', $user[2], PDO::PARAM_STR);
        $stmt->execute();
        $user['id'] = $this->pdo->lastInsertId();
        return $user;
    }
    
    public function updateUser(User $user) {
        $user = array($user->getFname(),$user->getLname(),$user->getEmail(),$user->getId());
        $stmt = $this->pdo->prepare("UPDATE users SET fname = :fname, lname = :lname, email = :email WHERE id = :id");
        $stmt->bindParam(':lname', $user[1], PDO::PARAM_STR);
        $stmt->bindParam(':fname', $user[0], PDO::PARAM_STR);
        $stmt->bindParam(':email', $user[2], PDO::PARAM_STR);
        $stmt->bindParam(':id',    $user[3], PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public function deleteUser(User $user) {
        $user = array($user->getId());
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $user[0], PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }
}