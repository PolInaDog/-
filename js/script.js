// Функция удаления задач
function deleteTask(taskId) {
    if (confirm("Удалить задачу?")) {
        fetch(`delete_tast.php?id=${tastId}`, {
            method: `GET`
        })
            .then(() => {
                window.Location.reload();
            })
            .catch((error) => {
                console.log("Ошибка при удалении задачи");
            })
    }
}