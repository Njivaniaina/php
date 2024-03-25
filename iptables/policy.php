<?php
    require_once("./get_table.php");

    do_table_csv();
    $rules = get_table_csv();

    $chain = $rules["chain"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://www.iptables.mg/policy.css">
    <title>Tables des règles</title>
</head>
<body>
    <header>
        <a href="" class="title">FIRE WALL</a>
        <div class="navigator">
            <div class="navigator-items">
                <a href="http://www.iptables.mg/index.html">Home</a>
                <a href="http://www.iptables.mg/list.php">List</a>
                <a href="http://www.iptables.mg/formulaire_add.php">Add</a>
                <a href="http://www.iptables.mg/policy.php">Policy</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="content-item">
            <div class="policy">
                <h2>The Policy</h2>
                <form action="http://www.iptables.mg/modify_policy.php" method="post">
                    <label for="input">INPUT </label>
                    <select name="input" id="input">
                        <option value="ACCEPT" <?php if($chain[0][1]==="ACCEPT") echo "selected";?>>ACCEPT</option>
                        <option value="DROP" <?php if($chain[0][1]==="DROP") echo "selected";?>>DROP</option>
                        <option value="REJECT" <?php if($chain[0][1]==="REJECT") echo "selected";?>>REJECT</option>
                    </select><br>
                    <label for="forward">FORWARD </label>
                    <select name="forward" id="forward">
                        <option value="ACCEPT" <?php if($chain[1][1]==="ACCEPT") echo "selected";?>>ACCEPT</option>
                        <option value="DROP" <?php if($chain[1][1]==="DROP") echo "selected";?>>DROP</option>
                        <option value="REJECT" <?php if($chain[1][1]==="REJECT") echo "selected";?>>REJECT</option>
                    </select><br>
                    <label for="output">OUTPUT </label>
                    <select name="output" id="output" value=<?php echo trim($chain[2][1]);?>>
                        <option value="ACCEPT" <?php if($chain[2][1]==="ACCEPT") echo "selected";?>>ACCEPT</option>
                        <option value="DROP" <?php if($chain[2][1]==="DROP") echo "selected";?>>DROP</option>
                        <option value="REJECT" <?php if($chain[2][1]==="REJECT") echo "selected";?>>REJECT</option>
                    </select><br>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        </div>
    </div>

</body>
</html>