<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
    $errors = [];
    if (empty($_POST['name'])) {
        $errors['name']['required'] = 'Name is required';
    } else {
        // Trường 'username' có giá trị
        if (strlen(trim($_POST['name'])) < 5) {
            $errors['name']['min'] = 'name phải lớn hơn 5 kí tự';
        }
    }

    if (empty($_POST['price'])) {
        $errors['price']['required'] = 'price is required';
    } else {
        if (!filter_var(trim($_POST['price']), FILTER_VALIDATE_INT, [
            'option' => ['min_range' => 1]
        ])) {
            $errors['price']['invalid'] = 'price phai la so';
        }
    }

    if (empty($_POST['image'])) {
        $errors['image']['required'] = 'image is required';
    }

    if (empty($_POST['category'])) {
        $errors['category']['required'] = 'category is required';
    }

    if (empty($_POST['status'])) {
        $errors['status']['required'] = 'status is required';
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $file_name = '';
    $category = $_POST['category'];
    $status = $_POST['status'];

    if ($_FILES['image']['name']) {
        $file = $_FILES['image'];
        $tmp_name = $file['tmp_name'];
        $file_name = $file['name'];
        move_uploaded_file($tmp_name, './uploads/' . $file_name);
    }

    // print_r($_FILES);

    $sql = "INSERT INTO `product`(`name`, `price`, `image`, `category_id`, `status`) VALUES ('$name', '$price', '$file_name', '$category', '$status')";

    if(mysqli_query($conn, $sql)){
        header('location: index.php');
    }else{
        echo mysqli_error($conn);
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <title>add new product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center text-uppercase my-3 text-info">Add new Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="">
                <?php echo (!empty($errors['name']['required'])) ? '<span style="color: red">' . $errors['name']['required'] . '</span>' : false;
                echo (!empty($errors['name']['min'])) ? '<span style="color: red;">' . $errors['name']['min'] . '</span>' : false;
                ?>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" id="" class="form-control" placeholder="">
                <?php
                echo (!empty($errors['price']['required'])) ? '<span style="color: red">' . $errors['price']['required'] . '</span>' : false;
                echo (!empty($errors['price']['invalid'])) ? '<span style="color: red">' . $errors['price']['invalid'] . '</span>' : false;
                ?>
            </div>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" id="" class="form-control" placeholder="">
                <?php echo (!empty($errors['image']['required'])) ? '<span style="color: red">' . $errors['image']['required'] . '</span>' : false;
                ?>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category" id="">
                    <?php
                    $sql = "SELECT * FROM category";
                    $categories = mysqli_query($conn, $sql);
                    foreach ($categories as $value) : ?>
                        <option value="<?= $value['id'] ?>">
                            <?= $value['id'] ?> - <?= $value['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo (!empty($errors['category']['required'])) ? '<span style="color: red">' . $errors['category']['required'] . '</span>' : false;
                ?>
            </div>
            <div class="form-check my-3">
                <label class="form-check-label">
                    Status
                    <br>
                    <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
                    Hiển thị
                    <br>
                    <input type="radio" class="form-check-input" name="status" id="" value="0">
                    tạm ẩn
                </label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>