<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>User signup</title>
    <script defer src="<?= base_url('./assets/js/main.js'); ?>"></script>
</head>

<body>
    <div class="main-app">
        <div class="container">
            <div class="form_main">
            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php 
             }
             else if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
             <?php echo $this->session->flashdata('success'); ?>
             </div>
             <?php 
              }?>
                <form id="signupform" action="<?= base_url('maincont/formdata') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="top">
                        <h3>Sigup</h3>
                    </div>
                    <div class="input-control">
                        <label for="userid">Create Userid</label><br>
                        <input type="text" id="userid" name="userid">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <label for="userpass">Create Password</label><br>
                        <input type="password" id="userpass" name="password">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <label for="usernumber">Enter phone number</label><br>
                        <input type="text" id="usernumber" name="number">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <label for="useremail">Enter Email</label><br>
                        <input type="email" id="useremail" name="email">
                        <div class="error"></div>
                    </div>

                    <br>
                    <div class="input-control" id="butcontrol">
                        <button type="submit" class="submit" name="submit">Signup</button>
                    </div>

                    <div class="link-log">Already have an account ?<a
                            href="<?= base_url('maincont/logpage/') ?>">login</a></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>