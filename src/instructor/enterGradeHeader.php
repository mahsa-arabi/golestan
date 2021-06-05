<div>
    <form class="form" method="post">
        <div id="content">
            <?php
            require_once("../utility/findCurrentSemester.php");
            ?>
            <p> ترم : <span><?php  echo $semester ." " .date("Y"); ?></span></p>
        </div>
        <label for="classes">کلاس : </label>
        <select name="courseSelect">
            <?php
            $ID = $_SESSION['ID'];
            $sql = "SELECT course_id FROM course natural join teaches WHERE ID='$ID'";
            $query = $conn->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $id = 1;
            if($query->rowCount() > 0){

            foreach ($results as $result) {
            ?>
            <option value=<?php echo htmlentities($result->course_id) ?>><?php echo htmlentities($result->course_id) ?></option>
                <?php
                $id++;
            }}
            ?>
        </select>

        <input type="submit" name="course_confirm" value="تایید">
    </form>
    <hr/>
</div>
