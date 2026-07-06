<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* เพิ่ม CSS ตกแต่งอย่างเดียว โค้ด PHP/HTML เดิมด้านล่างไม่ถูกแตะแม้แต่ตัวเดียว */
        @import url('https://fonts.googleapis.com/css2?family=Charmonman:wght@700&family=Mitr:wght@300;400;500;600&display=swap');

        :root {
            --board: #1f2b24;
            --board-line: #3d4c41;
            --chalk: #f1eee2;
            --chalk-yellow: #e8c467;
            --chalk-coral: #e2a08f;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 64px 24px;
            font-family: 'Mitr', sans-serif;
            color: var(--chalk);
            background-color: var(--board);
            background-image:
                radial-gradient(ellipse at center, rgba(255,255,255,0.05) 0%, transparent 65%),
                radial-gradient(circle at 12% 18%, rgba(255,255,255,0.03) 0%, transparent 6%),
                radial-gradient(circle at 82% 12%, rgba(255,255,255,0.025) 0%, transparent 7%),
                radial-gradient(circle at 70% 78%, rgba(255,255,255,0.03) 0%, transparent 6%),
                radial-gradient(circle at 22% 70%, rgba(255,255,255,0.02) 0%, transparent 7%);
        }

        ::selection {
            background: var(--chalk-yellow);
            color: var(--board);
        }

        table {
            width: 100%;
            max-width: 920px;
            margin: 0 auto;
            border: 2px dashed rgba(241, 238, 226, 0.35);
            border-collapse: collapse;
            box-shadow: inset 0 0 70px rgba(0, 0, 0, 0.35);
        }

        thead th {
            font-family: 'Charmonman', cursive;
            font-weight: 700;
            font-size: 26px;
            color: var(--chalk-yellow);
            text-shadow: 0 0 6px rgba(232, 196, 103, 0.25);
            padding: 10px 14px 16px;
            border-bottom: 2px dashed rgba(241, 238, 226, 0.35);
            text-align: center;
        }

        thead th:nth-child(2) { text-align: left; padding-left: 28px; }
        thead th:nth-child(3) { text-align: right; padding-right: 28px; }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.04);
        }

        tbody tr:not(:last-child) td {
            border-bottom: 1px dashed var(--board-line);
        }

        td {
            padding: 18px 14px;
            text-align: center;
            font-size: 15px;
            font-weight: 300;
            text-shadow: 0 0 1px rgba(241, 238, 226, 0.2);
            vertical-align: middle;
        }

        td:nth-child(1) {
            color: var(--chalk);
            opacity: 0.7;
        }

        td:nth-child(2) {
            text-align: left;
            padding-left: 28px;
            font-size: 17px;
            font-weight: 500;
            letter-spacing: 0.2px;
        }

        td:nth-child(3) {
            text-align: right;
            padding-right: 28px;
            color: var(--chalk-yellow);
            font-weight: 600;
            font-size: 17px;
        }

        td:nth-child(5) {
            color: var(--chalk-coral);
            font-weight: 500;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        td img {
            padding: 6px 6px 22px;
            background: #fafafa;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.45);
            transform: rotate(-3deg);
            transition: transform 0.2s ease;
        }

        tbody tr:nth-child(even) td img {
            transform: rotate(2deg);
        }

        tbody tr:hover td img {
            transform: rotate(0deg) scale(1.04);
        }

        @media (max-width: 600px) {
            body { padding: 32px 12px; }
            thead th { font-size: 19px; padding: 8px 6px 12px; }
            thead th:nth-child(2) { padding-left: 12px; }
            thead th:nth-child(3) { padding-right: 12px; }
            td { padding: 12px 8px; font-size: 13px; }
            td:nth-child(2) { font-size: 14px; padding-left: 12px; }
            td:nth-child(3) { padding-right: 12px; }
        }

        @media (prefers-reduced-motion: reduce) {
            * { transition: none !important; }
        }
    </style>
</head>
<body>

    <?php
    //แสดง error

    // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

        include "action/connect.php";

        //     ดึง ทั้งหมด จาก ตาราง menus
        $sql = "SELECT * FROM menus";
        //                      ที่อยู่ฐาน, คิวรี่
        $result = mysqli_query($con, $sql);
        // ทดสอบ
        // var_dump($result);
    ?>

    <table border=1>
        <thead>
            <th>รหัสเมนู</th>
            <th>ชื่อเมนู</th>
            <th>ราคา</th>
            <th>ภาพ</th>
            <th>ประเภท</th>
        </thead>

        <?php
            foreach($result as $menu){
                ?>
                <tr>
                    <td><?= $menu["menu_id"] ?></td>
                    <td><?= $menu["menu_name"] ?></td>
                    <td><?= $menu["menu_price"] ?></td>
                    <td>
                        <img
                            src="<?= $menu["menu_image"] ?>"
                            alt=""
                            style="width:200px"
                            >
                    </td>
                    <td><?= $menu["type_id"] ?></td>
                </tr>
                <?php
            }
        ?>

    </table>
    
</body>
</html>