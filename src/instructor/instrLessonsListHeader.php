
<form class="form" method="post" action="" >
    <label for="years">سال : </label>
    <select name="yearSelect">
        <?php
        $ID=$_SESSION['ID'];
        $sql = "SELECT distinct year FROM instructor natural join teaches WHERE ID='$ID' ";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $id = 1;
        if($query->rowCount() > 0){

            foreach ($results as $result){ ?>
                <option value=<?php echo $result->year;?>><?php echo $result->year;?></option>
                <?php $id++; }} ?>
    </select>
    <label for="semesters">ترم : </label>
    <select  name="semesterSelect">
        <?php
        $sql2 = "SELECT distinct semester FROM instructor natural join teaches WHERE ID='$ID' ";
        $query2 = $conn->prepare($sql2);
        $query2->execute();
        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
        $id2 = 1;
        if($query2->rowCount() > 0){

            foreach ($results2 as $result) {?>
                <option value=<?php echo $result->semester?>><?php echo $result->semester;?></option>
                <?php $id2++;}} ?>
    </select>

    <input type="submit" name="semester_confirm" value="تایید">
</form>
<hr/>