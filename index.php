<!doctype html>
<html lang="en">

<head>
    <title>index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="text-center text-uppercase">danh sách sản phẩm</h1>
        <a name="" id="" class="btn btn-primary" href="add.php">Add new +</a>
        <table class="table my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>image</th>
                    <th>category</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'connect.php';
                $sql = "SELECT c.id as cateId, c.name as cateName, p.* FROM product p JOIN category c ON c.id = p.category_id ORDER BY id desc";
                $result =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[price].000 VND</td>
                    <td><img src='./uploads/$row[image]' width='50' alt=''></td>
                    <td>$row[cateName]</td>
                    <td>$row[status]</td>
                    <td>
                        <a name='' id='' class='btn btn-primary' href='update.php?id=$row[id]' >edit</a>
                        <a name='' id='' onclick='return confirm(\"Are you sure ???\")' class='btn btn-danger' href='delete.php?id=$row[id]' >delete</a>
                    </td>
                    ";
                }
                ?>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>