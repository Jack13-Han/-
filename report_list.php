<?php

require_once 'conn.php';

function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$result = $conn->query('SELECT emp_no, name, deployment, data, created_at FROM report ORDER BY created_at DESC LIMIT 5');
$recentReports = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $recentReports[] = $row;
    }
    $result->free();
} else {
    die('データの取得に失敗しました。');
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報告一覧</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h4 mb-0">安否報告一覧</h1>
                    <div class="d-flex gap-2">
                        <a href="report.php" class="btn btn-outline-primary btn-sm">報告入力へ</a>
                        <a href="index.php" class="btn btn-outline-secondary btn-sm">ダッシュボードへ戻る</a>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h5 mb-0">最新の報告</h2>
                            <span class="badge text-bg-light"><?php echo h(count($recentReports)); ?>件</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>日時</th>
                                        <th>社員番号</th>
                                        <th>名前</th>
                                        <th>部署</th>
                                        <th>状況</th>
                                        <th>詳しく</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($recentReports)): ?>
                                        <?php foreach ($recentReports as $report): ?>
                                            <tr>
                                                <td><?php echo h($report['created_at']); ?></td>
                                                <td><?php echo h($report['emp_no']); ?></td>
                                                <td><?php echo h($report['name']); ?></td>
                                                <td><?php echo h($report['deployment']); ?></td>
                                                <td>
                                                    <?php if ($report['data'] === '安全'): ?>
                                                        <span class="badge text-bg-success">安全</span>
                                                    <?php else: ?>
                                                        <span class="badge text-bg-warning">安全じゃない</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="report_detail.php?emp_no=<?php echo urlencode($report['emp_no']); ?>" class="btn btn-sm btn-outline-info">詳細</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-3">報告データがありません。</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>