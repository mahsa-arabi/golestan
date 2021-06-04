
<form class="form" method="post" action="">
    <label for="years">سال : </label>
    <select name="year" id="year">
        <?php
                $ID=$_SESSION['ID'];
                $sql = "SELECT year FROM student natural join takes WHERE ID='$ID' ";
                $query = $conn->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $id = 1;
                if($query->rowCount() > 0){

                    foreach ($results as $result) ?>
        <option value="year"><?php echo $result->year;?></option>
        <?php } ?>
    </select>

    <label for="semesters">ترم : </label>
    <select name="semester" id="semester">
        <?php
        $sql2 = "SELECT semester FROM student natural join takes WHERE ID='$ID' ";
        $query2 = $conn->prepare($sql2);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        $id2 = 1;
        if($query2->rowCount() > 0){

        foreach ($results2 as $result) ?>
        <option value=<?php echo $result->semester?>><?php echo $result->semester;?></option>
        <?php } ?>
    </select>

    <input type="submit" name="semester_confirm" value="تایید">
</form>
<hr/>