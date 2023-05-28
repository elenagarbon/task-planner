<?php
    // Recuperar los datos de la solicitud
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    var_dump($json_data);
    var_dump($data);

    $task_id = $data['task_id'];
    $status = $data['status'];
    echo $task_id;
    echo $status;

    // Realizar la actualización en la base de datos
    try {
        $db = new PDO('mysql:host=localhost;dbname=bbdd_task_planner', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo  $task_id;
        $query = "UPDATE tasks SET status = :status WHERE id_task = :id_task";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id_task', $task_id);
        $stmt->execute();

        echo "Actualización exitosa";
    } catch (PDOException $e) {
        echo "Error al actualizar el estado de la tarea: " . $e->getMessage();
    }

?>