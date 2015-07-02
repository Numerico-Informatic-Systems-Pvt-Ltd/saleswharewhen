<form action="" method="post" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>First Name</td>
            <td><input type="text" name="first_name"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="last_name"></td>
        </tr>
        <tr>
            <td>email_id</td>
            <td><input type="text" name="email_id"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>address</td>
            <td><textarea name="address"></textarea></td>
        </tr>
        <tr>
            <td>City</td>
            <td><select name="city">
                    <option value="0">---select---</option>
                    <?php foreach($city_list as $city){ ?>
                    <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Zone</td>
            <td><select name="zone">
                    <option value="">---select---</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>contact_no</td>
            <td><input type="text" name="contact_no"></td>
        </tr>
        <tr>
            <td>profile_image</td>
            <td><input type="file" name="profile_image"></td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td><input type="text" name="dob"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="male">Male</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="submit"></td>
        </tr>

    </table>

</form>