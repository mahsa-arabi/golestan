
<form class="form">
    <label for="years">سال : </label>
    <select name="year" id="year">
        <?php

        ?>
        <option value="year"><?php echo date("Y");?></option>
    </select>

    <label for="semesters">ترم : </label>
    <select name="semester" id="semester">
        <option value="Spring">بهار</option>
        <option value="Fall">پاییز</option>
        <option value="Summer">تابستان</option>
    </select>

    <input type="submit" value="تایید">
</form>
<hr/>