<?php
trait LoggingTrait {
    public function log($msg) {
        file_put_contents("log.txt", date("Y-m-d H:i:s")." - ".$msg.PHP_EOL, FILE_APPEND);
    }
}

trait SearchableTrait {
    public function search($pdo, $table, $column, $keyword) {
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE $column LIKE :kw");
        $stmt->execute([':kw' => "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
