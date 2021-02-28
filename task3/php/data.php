<?php
require_once 'pdoconfig.php';
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    $db->exec("set names utf8");
    $sql = "SELECT * FROM `mytable` ORDER BY `date`;";
    if (isset($_POST['sort']) && isset($_POST['domain']) && ($_POST['domain'] == 'all')) {
        $order = $_POST['sort'];
        $sql = "SELECT * FROM `mytable` ORDER BY $order;";
    } else if (isset($_POST['sort']) && isset($_POST['domain'])) {
        $order = $_POST['sort'];
        $domain = $_POST['domain'];
        $sql = "SELECT * FROM `mytable` WHERE SUBSTRING_INDEX(email,'@',-1)='$domain' ORDER BY $order;";
    } 
    $query = $db->prepare($sql);
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db_base :" . $e->getMessage());
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data page</title>
    <style>
        div{
            background:linear-gradient(180deg, #ffffff 0%, #f2f5fa 100%);
            margin:0 auto;
            width:100%;
            height:100%;
            display:flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
        }
        tr,td{
            border-right:1px solid black;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Date</th>
            </tr>
            <?php
            $domains = [];
            $sqli = "";
            for ($i=0;$i<count($array);$i++){
                echo "<tr>";
                echo "<form method = \"post\" >";
                echo "<label for =" .  $array[$i]['id'] .">" .$array[$i]['id'] . "</label>";
                echo "<input type = \"checkbox\" id =" . $array[$i]['id'] ." name =" . $array[$i]['id'] .">";
                echo "<td>".$array[$i]['id']."</td>";
                echo "<td>".$array[$i]['email']."</td>";
                echo "<td>".$array[$i]['date']."</td>";
                echo "</tr>";
                $domains[] = substr($array[$i]['email'], strpos($array[$i]['email'], "@")+1);
                $domains = array_unique($domains);
                if (isset($_POST[$array[$i]['id']])) {
                    $sqli = "DELETE FROM mytable WHERE id=" . $array[$i]['id'];
                    $db->exec($sqli);
                }
            }
            echo "<input type = \"submit\" value = \"delete\">";
            echo "</form>";
            ?>
        </table>
        <form method="post">
            Sort by: 
            <select name  = 'sort'>
                <option value="date">Date</option>
                <option value = 'email'>E-mail</option>
            </select>
            Domain:
            <select name = 'domain'>
                <option value="all">All</option>
                <?php foreach ($domains as $domain) {
                    echo "<option value = \"$domain\">$domain</option>";
                }
                ?>
            </select>
            <input type="submit">
        </form>
    </div>
</body>
</html>

