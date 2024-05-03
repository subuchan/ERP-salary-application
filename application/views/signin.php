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
    <title>Admin Login</title>
    <!-- <script defer src="<?= base_url('./assets/js/main.js') ?>"></script> -->
</head>

<body>
    <div class="main-app">
        <div class="container">
            <div class="form_main">
            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
            </div>
            
            <?php } 
            else if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
             <?php echo $this->session->flashdata('success'); ?>
             </div>
             <?php 
             }?>
                <form id="formlogin" action="<?= base_url('maincont/login') ?>" method="post">
                    <div class="top">
                        <h3>Login</h3>
                    </div>
                    <div class="input-control">
                        <label for="username">Enter userid</label><br>
                        <input type="text" name="username" id="checkuser">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <label for="password">Enter password</label><br>
                        <input type="password" name="password" id="checkpass">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <button type="submit" name="submit" class="submit">Login</button>
                    </div>

                    <div class="link-log">Don't have an account ?<a href="<?= base_url('maincont/index/') ?>">Signup</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <script>
        const formlogin = document.getElementById('formlogin');
        const checkuser = document.getElementById('checkuser');
        const checkpass = document.getElementById('checkpass');

        formlogin.addEventListener('submit', e => {
            if (!validateInputs1()) {
                e.preventDefault();
            };
        });
        const setError1 = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');
        }
        const setSuccess1 = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        }
        const validateInputs1 = () => {
            const checkuserVal = checkuser.value.trim();
            const checkpassVal = checkpass.value.trim();
            let success1 = true;
            if (checkuserVal === '') {
                success1 = false;
                setError1(checkuser, 'Username is required');
            }
            else {
                setSuccess1(checkuser);
            }
            if (checkpassVal === '') {
                success1 = false;
                setError1(checkpass, 'Password is required');
            }
            else {
                setSuccess1(checkpass);
            }
            return success1;
        }
    </script>
</body>

</html>