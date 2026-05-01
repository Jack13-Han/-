<?php
session_start();
require_once "conn.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = trim($_POST["emp_no"]);
    $name = trim($_POST["name"]);


    if (empty($id) || empty($name)) {
        $error = "社員番号と名前を入力してください。";
    } else {

        $sql = "SELECT id, name, email, password FROM register WHERE id = ? AND name = ? LIMIT 1";


        $stmt = mysqli_prepare($conn, $sql);


        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $id, $name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);


            if ($user) {
                $_SESSION["id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                header("Location: report.php");
                exit();
            }

            $error = "社員番号または名前が正しくありません。";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f2f7ff 0%, #e8f2f0 100%);
        }

        .forgot-card {
            max-width: 480px;
            width: 100%;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .form-control {
            height: 48px;
            border-radius: 0.75rem;
        }

        .btn-check-user {
            height: 48px;
            border-radius: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <main class="container d-flex align-items-center justify-content-center py-5">
        <div class="card forgot-card bg-white">
            <div class="card-body p-4 p-md-5">
                <h1 class="h4 fw-bold text-center mb-2">パスワードを忘れた場合</h1>
                <p class="text-secondary text-center mb-4">社員番号と名前を入力してください。</p>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="forgot_password.php" novalidate>
                    <div class="mb-3">
                        <label for="emp_no" class="form-label fw-semibold">社員番号</label>
                        <input
                            type="text"
                            class="form-control"
                            id="emp_no"
                            name="emp_no"
                            placeholder="例: 001"
                            value="<?php echo isset($_POST['emp_no']) ? htmlspecialchars($_POST['emp_no'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">名前</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="例: 山田太郎"
                            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-check-user">Check</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>