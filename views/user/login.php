<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?= $thongbao ?? "" ?>
                <form method='post'>
                    <h1>Đăng nhập</h1>
                    <div>
                        <input type="text" class="form-control" name='user' placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name='pass' placeholder="Password" required="" />
                    </div>
                    <div>
                        <button name='submit' class="btn btn-default submit">Đăng nhập</button>
                    </div>

                    <div class="clearfix"></div>


                </form>
            </section>
        </div>


    </div>
</div>