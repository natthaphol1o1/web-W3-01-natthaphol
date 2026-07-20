<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขเมนู</title>
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
        
        .form-container {
            max-width: 500px; margin: 0 auto; padding: 40px;
            border: 2px dashed rgba(241, 238, 226, 0.35); box-shadow: inset 0 0 70px rgba(0, 0, 0, 0.35);
        }
        .form-container label { display: block; margin-bottom: 8px; color: var(--chalk-yellow); font-size: 18px; }
        .form-container input, .form-container select {
            width: 100%; padding: 12px; margin-bottom: 24px;
            background-color: rgba(255,255,255,0.02); border: 1px dashed var(--board-line);
            color: var(--chalk); font-family: 'Mitr', sans-serif; font-size: 16px; box-sizing: border-box;
        }
        .form-container input:focus, .form-container select:focus {
            outline: none; border-color: var(--chalk-coral); background-color: rgba(255,255,255,0.05);
        }
        .form-container select option { background-color: var(--board); color: var(--chalk); }
        .form-container button {
            background-color: transparent; color: var(--chalk-coral); border: 2px dashed var(--chalk-coral);
            padding: 12px; font-family: 'Charmonman', cursive; font-size: 24px; width: 100%; cursor: pointer; transition: 0.2s;
        }
        .form-container button:hover { background-color: var(--chalk-coral); color: var(--board); }

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
        <h1 class="page-title" style="color: var(--chalk-coral);">แก้ไขข้อมูลเมนู</h1>
        
        <?php
            $id = $_GET['id'];
            include "action/connect.php";
            $sql = "SELECT * FROM menus WHERE menu_id = '$id' ";
            $result = mysqli_query($con, $sql);
            $menu = mysqli_fetch_assoc($result);
        ?>

        <div class="form-container">
            <form action="action/update_menu.php" method="post">
                <label for="">รหัสเมนู</label>
                <input type="text" name="menu_id" value="<?= $menu['menu_id'] ?>" readonly style="opacity:0.6; cursor:not-allowed;">

                <label for="">ชื่อเมนู</label>
                <input type="text" name="menu_name" value="<?= $menu['menu_name'] ?>" required>

                <label for="">ราคา</label>
                <input type="text" name="menu_price" value="<?= $menu['menu_price'] ?>" required>

                <label for="">URL ภาพ</label>
                <input type="text" name="menu_image" value="<?= $menu['menu_image'] ?>" required>

                <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    $sql_type = "SELECT * FROM menu_types";
                    $result_type = mysqli_query($con, $sql_type);
                ?>

                <label for="">ประเภทเมนู</label>
                <select name="type_id" required>
                    <?php foreach($result_type as $type){ ?>
                        <option value="<?= $type["type_id"] ?>" <?= $type["type_id"] == $menu["type_id"] ? "selected" : '' ?>>
                            <?= $type["type_name"] ?>
                        </option>
                    <?php } ?>
                </select>

                <button type="submit">อัปเดตข้อมูล</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        &copy; 2026 Restaurant Dashboard
    </footer>

</body>
</html>