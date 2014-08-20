
        <div id="content">
                <h1>Update thành viên</h1>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label>Username</label></td>
                            <td><input type="text" name="usr_name" value="<?php echo $userInfo['user_name']; ?>" size="30" />
                            <?php echo form_error("usr_name") ?>
                            <br /></td>
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td><input type="text" name="user_password" value="" size="30" />
                            <?php echo form_error("user_password") ?>
                                <br /></td>
                        </tr>
                        <tr>
                            <td><label>Email</label></td>
                            <td><input type="text" name="usr_email" value="<?php echo $userInfo['user_email']; ?>" size="30" />
                            <?php echo form_error("usr_email") ?>
                                <br /></td>
                        </tr>
                        <tr>
                            <td><label>Address</label></td>
                            <td><input type="text" name="usr_address" value="<?php echo $userInfo['user_address']; ?>" size="30" />
                            <?php echo form_error("usr_address") ?>
                            <br /></td>
                        </tr>
                        <tr>
                            <td><label>Phone</label></td>
                            <td><input type="text" name="usr_phone" value="<?php echo $userInfo['user_phone']; ?>" size="30" />
                            <?php echo form_error("usr_phone") ?>
                            <br /></td>
                        </tr
                        
                        <tr>
                            <td><label>Level</label></td>
                            <td><input type="text" name="usr_level" value="<?php echo $userInfo['user_level']; ?>" size="30" />
                            <?php echo form_error("user_level") ?>
                            <br /></td>
                        </tr>
                        <tr>
                            <td><label>Gender</label></td>
                        
                            <td><select name="gender">
                            <option value="1">Nam</option>
                            <option value="2">Nu</option>
                            </select></td>
                            
                        </tr>
                        </table>
                            <label>&nbsp;</label> 
                            <input type="submit" name="ok" value="Update" />
                            <input type="reset" value="Reset" />                                  
                        </form>
                
        </div>


