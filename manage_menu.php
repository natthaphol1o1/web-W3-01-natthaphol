<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการเมนู</title>
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
        .page-title { text-align: center; font-family: 'Charmonman', cursive; font-size: 36px; margin-bottom: 20px; color: var(--chalk); }
        
        .btn-add {
            display: block; width: fit-content; margin: 0 auto 30px;
            background-color: transparent; color: var(--chalk-yellow);
            border: 2px dashed var(--chalk-yellow); padding: 10px 30px;
            font-family: 'Charmonman', cursive; font-size: 22px; text-decoration: none; transition: 0.2s;
        }
        .btn-add:hover { background-color: var(--chalk-yellow); color: var(--board); }

        table {
            width: 100%; max-width: 1000px; margin: 0 auto;
            border: 2px dashed rgba(241, 238, 226, 0.35); border-collapse: collapse; box-shadow: inset 0 0 70px rgba(0, 0, 0, 0.35);
        }
        thead th { font-family: 'Charmonman', cursive; font-size: 22px; color: var(--chalk-yellow); padding: 14px; border-bottom: 2px dashed rgba(241, 238, 226, 0.35); text-align: center; }
        tbody tr:hover { background-color: rgba(255, 255, 255, 0.04); }
        tbody tr:not(:last-child) td { border-bottom: 1px dashed var(--board-line); }
        td { padding: 18px 10px; text-align: center; vertical-align: middle; }
        td img { background: #fafafa; padding: 6px 6px 22px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.45); transform: rotate(-2deg); }
        
        .action-link { color: var(--chalk-coral); text-decoration: none; margin: 0 8px; font-weight: 500; font-size: 16px; border-bottom: 1px dashed var(--chalk-coral); padding-bottom: 2px; }
        .action-link:hover { color: var(--chalk); border-color: var(--chalk); }

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
        <h1 class="page-title">จัดการข้อมูลเมนู</h1>
        
        <!-- ลิงก์ปุ่มไปหน้าเพิ่มข้อมูลเมนู -->
        <a href="add_menu.php" class="btn-add">+ เพิ่มเมนูใหม่</a>

        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);

            include "action/connect.php";
            $sql = "SELECT * FROM menus";
            $result = mysqli_query($con, $sql);
        ?>
        <table>
            <thead>
                <tr>
                    <th>รหัสเมนู</th>
                    <th>ชื่อเมนู</th>
                    <th>ราคา</th>
                    <th>ภาพ</th>
                    <th>ประเภท</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $menu){ ?>
                <tr>
                    <td><?= $menu["menu_id"] ?></td>
                    <td style="text-align: left; padding-left: 20px; font-size: 18px;"><?= $menu["menu_name"] ?></td>
                    <td style="color: var(--chalk-yellow); font-weight: 600;"><?= $menu["menu_price"] ?> ฿</td>
                    <td><img src="<?= $menu["menu_image"] ?>" alt="" style="width:120px"></td>
                    <td style="color: var(--chalk-coral);"><?= $menu["type_id"] ?></td>
                    <td>
                        <a href="edit_menu.php?id=<?= $menu["menu_id"] ?>" class="action-link">แก้ไข</a>
                        <a href="action/delete_menu.php?id=<?= $menu["menu_id"] ?>" class="action-link" style="color: #d9534f; border-color: #d9534f;">ลบ</a>
                    </td>
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