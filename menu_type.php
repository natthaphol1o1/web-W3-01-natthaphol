<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประเภทเมนู</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Charmonman:wght@700&family=Mitr:wght@300;400;500;600&display=swap');

        :root {
            --board: #1f2b24; --board-line: #3d4c41; --chalk: #f1eee2;
            --chalk-yellow: #e8c467; --chalk-coral: #e2a08f;
        }
        body {
            margin: 0; min-height: 100vh; padding: 40px 24px;
            font-family: 'Mitr', sans-serif; color: var(--chalk);
            background-color: var(--board);
            background-image: radial-gradient(ellipse at center, rgba(255,255,255,0.05) 0%, transparent 65%);
            display: flex; flex-direction: column;
        }
        .navbar {
            display: flex; justify-content: center; gap: 40px; padding-bottom: 20px;
            border-bottom: 2px dashed var(--board-line); margin-bottom: 40px;
        }
        .navbar a { color: var(--chalk-yellow); text-decoration: none; font-family: 'Charmonman', cursive; font-size: 24px; transition: 0.2s; }
        .navbar a:hover { color: var(--chalk); }
        .content { flex: 1; }
        .page-title { text-align: center; font-family: 'Charmonman', cursive; font-size: 36px; margin-bottom: 30px; color: var(--chalk); }
        
        table {
            width: 100%; max-width: 600px; margin: 0 auto;
            border: 2px dashed rgba(241, 238, 226, 0.35);
            border-collapse: collapse; box-shadow: inset 0 0 70px rgba(0, 0, 0, 0.35);
        }
        thead th { font-family: 'Charmonman', cursive; font-size: 24px; color: var(--chalk-yellow); padding: 14px; border-bottom: 2px dashed rgba(241, 238, 226, 0.35); }
        tbody tr:hover { background-color: rgba(255, 255, 255, 0.04); }
        tbody tr:not(:last-child) td { border-bottom: 1px dashed var(--board-line); }
        td { padding: 18px 14px; text-align: center; font-size: 18px; }
        
        .footer { text-align: center; padding-top: 20px; border-top: 2px dashed var(--board-line); margin-top: 50px; font-size: 14px; opacity: 0.6; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php">หน้าแรก (เมนูทั้งหมด)</a>
        <a href="menu_type.php">ประเภทเมนู</a>
        <a href="manage_menu.php">จัดการเมนู</a>
    </nav>

    <div class="content">
        <h1 class="page-title">ประเภทเมนู</h1>
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);

            include "action/connect.php";
            $sql = "SELECT * FROM menu_types";
            $result = mysqli_query($con, $sql);
        ?>
        <table>
            <thead>
                <tr>
                    <th>ลำดับเมนู</th>
                    <th>ชื่อประเภท</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $menu){ ?>
                <tr>
                    <td style="color: var(--chalk); opacity: 0.8;"><?= $menu["type_id"] ?></td>
                    <td style="color: var(--chalk-yellow);"><?= $menu["type_name"] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <footer class="footer">
        &copy; 2026 DOG EATER FOOD
    </footer>

</body>
</html>