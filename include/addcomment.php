<div class="block" id="comment-add-form">
                                <h3>Добавить комментарий</h3>
                                <div class="block__content">
                                    <form class="form" method="POST" action="/article.php?id=<?php
                                     echo $art['id']; ?> #comment-add-form">
                                        <?php
                                            if(isset($_POST['do_post'])){
                                                $errors =array();
                                                if($_POST['name']==''){
                                                    $errors[] = 'Введите имя';
                                                }
                                                if($_POST['nickname']==''){
                                                    $errors[] = 'Введите Никнейм';
                                                }
                                                if($_POST['email']==''){
                                                    $errors[] = 'Введите Email';
                                                }
                                                if($_POST['text']==''){
                                                    $errors[] = 'Введите текст комментария';
                                                }

                                                if(empty($errors)){
                                            
                                                    mysqli_query($connection, "INSERT INTO `comments` (`author`, `Nick`, `Email`, `text`, `pubdate`, `articles_id`) 
                                                    VALUES ('" . $_POST['name'] . "','" . $_POST['nickname'] . "','" . $_POST['email'] . "','" . $_POST['text'] . "', NOW(),'" . $art['id'] . "')");
                                                                                                        

                                                    echo'<span style="color: green; font-weight: bold;margin-bottom:10px;display:block;">Комментарий успешно добавлен</span>';
                                                }else{
                                                    echo'<span style="color: red; font-weight: bold;margin-bottom:10px;display:block; ">' . $errors['0'] . '</span>';
                                                }
                                            }
                                        ?>
                                    <div class="form__group">
                                        <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form__control" name="name" placeholder="Имя" value="<?php echo $_POST['name'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form__control" name="nickname" placeholder="Никнейм" value="<?php echo $_POST['nickname'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form__control" name="email" placeholder="Email" value="<?php echo $_POST['email']?>">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form__group">
                                        <textarea name="text" class="form__control" placeholder="Текст комментария ..."><?php echo $_POST['text'] ?></textarea>
                                    </div>
                                    <div class="form__group">
                                        <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                                    </div>
                                    </form>
                                </div>
                            </div>