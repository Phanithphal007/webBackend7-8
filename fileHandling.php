<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="control" style="width: 100%; height: 100vh;">
        <div class="form-input d-flex justify-content-center p-3" style="width: 100%; height: 80%;">
            <form method="post" action="fileHandling.php" class=" shadow p-3 rounded-1" style="width: 300px; height: 500px;" enctype="multipart/form-data">
                <h3>Add Student</h3>
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                <label for="">Phone Number</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
                <label for="">Select Gender</label>
                <select class="form-select" name="gender" id="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label for="">Profile</label>
                <input type="file" name="profile" class="form-control">
                <button name="submitdata" class="btn btn-success w-100 mt-3">Save Student</button>
            </form>

        </div>
        <?php
        if (isset($_POST['submitdata'])) {
            echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Data Submit hx Bro!!!!',
            icon: 'success',
            draggable: true
        });
    </script>";
        }
        ?>
        <?php
        if (isset($_POST['submitdata'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $profile_name = $_FILES['profile']['name'];
            $profile_tmp = $_FILES['profile']['tmp_name'];
            $uploadfile = "image/" . $profile_name;
            move_uploaded_file($profile_tmp, $uploadfile);


        ?>

            <div class="table-data d-flex justify-content-center" style="width: 100%; ">
                <table class="table table-bordered " style="width: 1000px;">
                    <tr class="table-dark">

                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Profile Image</th>
                    </tr>
                    <tr>
                        <td><?= $username ?></td>
                        <td><?= $email ?></td>
                        <td><?= $password ?></td>
                        <td><?= $phone ?></td>
                        <td><?= $gender ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <div class="image " style="width: 30px; height: 30px; ">
                                <img class="w-100 object-fit-cover h-100 rounded-circle" src="image/<?= $profile_name ?>" alt="">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
        }
        ?>
    </div>

</body>

</html>