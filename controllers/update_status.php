<?php
    require_once '../config/database.php';
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    $task_id = $data['task_id'];
    $status = $data['status'];

    // Realizar la actualización en la base de datos
    try {
        $database = new Database();
        $db = $database->getConnection();
        $query = "UPDATE tasks SET status = :status WHERE id_task = :id_task";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id_task', $task_id);
        $stmt->execute();

        echo "Actualizado estado";
    } catch (PDOException $e) {
        echo "Error al actualizar el estado de la tarea: " . $e->getMessage();
    }

?>