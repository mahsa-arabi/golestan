<div>
    <form class="form">
        <div id="content">
            <?php
            require_once("findCurrentSemester.php");
            ?>
            <p> ترم : <span><?php  echo $semester ." " .date("Y"); ?></span></p>
        </div>
        <label for="classes">کلاس : </label>
        <select name="class" id="semester">
            <?php
            $sql = "SELECT course_id FROM course";
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

        <input type="submit" value="تایید">
    </form>
    <hr/>
</div>
