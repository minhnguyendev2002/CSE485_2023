<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<?php
    require './student.php';
    require './StudentDAO.php';
    $file_path='./public/student.csv';
    $studentDAO = new StudentDAO($file_path);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $student = new Student($id, $name, $age);
        $studentDAO->add($student);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $student = new Student($id, $name, $age);
        $studentDAO->update($student);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $studentDAO->delete($id);
    }
}
$students = $studentDAO->getAll();

?>
<body>
    <h1 class="text-center text-red-500 text-center text-xl font-bold">Bài Tập Thực Hành 1</h1>
    
    <form class=" max-w-[300px] m-auto flex flex-col gap-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="flex flex-col">
    <label for="id">ID</label>
    <input class="outline-none p-2 border border-red-500 rounded mb-2" type="text" id="id" name="id" required>
    </div>
    <div class="flex flex-col">
    <label for="name">Name</label>
    <input class="outline-none p-2 border border-red-500 rounded mb-2" type="text" id="name" name="name" >
    </div>
    
    <div class="flex flex-col">
    <label for="age">Age</label>
    <input class="outline-none p-2 border border-red-500 rounded mb-2" type="text" id="age" name="age" >
    </div>
    
    <button class="px-4 py-2 border  border-red-500 rounded-md w-fit inline-block m-auto" type="submit" name="add">Add Student</button>
    <button class="px-4 py-2 border  border-red-500 rounded-md w-fit inline-block m-auto" type="submit" name="edit">Update Student</button>
    <button class="px-4 py-2 border  border-red-500 rounded-md w-fit inline-block m-auto" type="submit" name="delete">Delete Student</button>
    <table>
    <?php foreach ($students as $student) { ?>
            <tr>
                <td><?php echo $student->getId(); ?></td>
                <td><?php echo $student->getName(); ?></td>
                <td><?php echo $student->getAge(); ?></td>
            </tr>
        <?php } ?>
        
    </table>
</form>
    
</body>
</html>