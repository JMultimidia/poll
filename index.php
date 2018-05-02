<?php
require_once 'Poll.php';
$pollObject = new Poll();
?>
<html>

<head>
<title>Object-Oriented Poll System using PHP</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <h2>Cource Poll System</h2>

    <p>
        <b>Select your favorite course </b>
    </p>
    <div class="poll-container"> 
            <?php
            if (empty($_POST["submit"])) {
                $result = $pollObject->getCource();
                ?>
                <form method="POST" action="">
            
                        <?php
                foreach ($result as $k => $v) {
                    ?>
                            <div class='option-row'>
                <input class='radio-input' type='radio' name='vote'
                    value='<?php echo $result[$k]["id"]; ?>' /><?php echo $result[$k]["name"]; ?>
                    </div>
                    <?php } ?>
                    <input id="btnSubmit" type="submit" name="submit"
                value="Submit" />
                </form>
        <div>
            
        </div>
        <?php
            } else {
                $pollObject->addVote($subjectId);
                $result = $pollObject->getCourcewithVote();
                foreach ($result as $k => $v) {
                ?>
        <div class='poll'><?php echo $result[$k]["name"]; ?> <b><?php echo $result[$k]["vote_count"]; ?></b>
            votes
        </div>
            
        <?php }
            } ?>
     </div>
</body>
</html>