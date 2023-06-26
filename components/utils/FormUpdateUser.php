<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/form-update-user.css">

<?php
    function FormUpdateUser($cell_size, $relative_directory, $db, $user) {
        ob_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["form_id"] === "FormUpdateUserInfo") {
            $user_id = $_SESSION["user"]["id"];
            $username = $_POST["username"];
            $email = $_POST["email"];

            $updateResult = $user->updateUserInfo($user_id, $username, $email);

            if ($updateResult === "SUCCESS_UPDATE_USER") {
                $form_message_user = "FORM_SUCCESS";
            } else {
                $form_message_user = "FORM_ERROR";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["form_id"] === "FormUpdateUserImage") {
            $profileImage = $_FILES["profile_image"];
            $user_id = $_SESSION["user"]["id"];
    
            $updateResult = $user->updateUserImage($user_id, $profileImage);
    
            if ($updateResult === "SUCCESS_PROFILE_IMAGE_UPDATE") {
                $form_message_user_image = "FORM_SUCCESS";
            } else {
                $form_message_user_image = "FORM_ERROR";
            }
        }
    ?>
        <div class="cell small-12 large-<?php echo $cell_size; ?> component-update-user-image">
            <div class="boxed-section">
                <div class="title">
                    <h4>Update your user info</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, sed. </p>
                    <hr>
                </div>

                <div class="form-content">
                    <form action="" id="FormUpdateUserInfo" method="POST">
                        <div class="grid-container-fluid component-update-user">
                            <div class="grid-x grid-margin-x grid-x-component">

                                <input type="hidden" name="form_id" value="FormUpdateUserInfo">

                                <div class="cell small-12 large-12">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" required value="<?php echo $_SESSION["user"]["username"]; ?>">
                                </div>

                                <div class="cell small-12 large-12">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" required value="<?php echo $_SESSION["user"]["email"]; ?>">
                                </div>

                                <div class="cell small-12">
                                    <div class="buttons">
                                        <button class="btn btn-primary btn-update-user-info" type="submit">Update User</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <?php if (isset($form_message_user)) : ?>
                        <div class="form-message">
                            <?php if($form_message_user === "FORM_SUCCESS") : ?>
                                <div class="form-success-custom"><section><p>Your user has been updated successfully</p></section></div>
                            <?php elseif ($form_message_user === "FORM_SUCCESS") : ?>
                                <div class="form-error-custom"><section><p>There was an error updating your user - please try again</p></section></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="boxed-section">
                <div class="title">
                    <h4>Update your user image</h4>
                    <p>Allowed file formats: "jpg", "jpeg", "png", "gif"</p>
                    <hr>
                </div>

                <div class="form-content">
                    <form action="" id="FormUpdateUserImage" method="POST" enctype="multipart/form-data">
                        <div class="grid-container-fluid component-update-user">
                            <div class="grid-x grid-margin-x grid-x-component">

                                <input type="hidden" name="form_id" value="FormUpdateUserImage">

                                <div class="cell small-12 large-12">
                                    <label for="profile_image">Profile Image</label>
                                    <input type="file" name="profile_image" required>
                                </div>

                                <div class="cell small-12">
                                    <div class="buttons">
                                        <button class="btn btn-primary btn-update-user-image" type="submit">Update Image</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <?php if (isset($form_message_user_image)) : ?>
                        <div class="form-message">
                            <?php if($form_message_user_image === "FORM_SUCCESS") : ?>
                                <div class="form-success-custom"><section><p>Your image has been updated successfully</p></section></div>
                            <?php elseif ($form_message_user_image === "FORM_SUCCESS") : ?>
                                <div class="form-error-custom"><section><p>There was an error updating your user - please try again</p></section></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    <?php

        $FormUpdateUser = ob_get_contents();
        ob_end_clean();

        return $FormUpdateUser;
    }
?>