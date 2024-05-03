<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('./assets/css/style.css');?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Attendance</title>
</head>
<body>
    <div class="main-app">
        <div class="container">
            <div class="table-form">
            <div class="form">
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
                <form id="empattandance" action="<?=base_url('maincont/attendance')?>" method="post" enctype="multipart/form-data">
                  <div class="top">
                    <h3>attendance update</h3>
                  </div>  
                   <div class="input-control">
                        <label for="empid">Enter empid</label><br>
                        <input type="text" id="empid" name="empid">
                        <div class="error"></div>
                    </div>
                    <br>
                    <div class="input-control">
                        <label for="daypresent">No of day present</label><br>
                        <input type="text" id="daypresent" name="daypresent">
                        <div class="error"></div>
                    </div>
                    
                    <br>
                    <div class="input-control" id="butcontrol">
                        <button type="submit" class="submit" name="submit">Upload</button>
                    </div>
                </form>
            </div>
            <div class="logout"><a href="<?= base_url('maincont/dashboard') ?>">Go To Dashboard</a></div>
            </div>
            
        </div>
        
    </div>
    <script>
        const empattandance = document.getElementById('empattandance');
        const empid = document.getElementById('empid');
        const daypresent = document.getElementById('daypresent');

        empattandance.addEventListener('submit', e => {
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
            const empidValue = empid.value.trim();
            const daypresentValue = daypresent.value.trim();
            
            let success1 = true;
            if (empidValue === '') {
                success1 = false;
                setError1(empid, 'EmployeeId is required');
            }
            else {
                setSuccess1(empid);
            }
            if (daypresentValue === '') {
                success1 = false;
                setError1(daypresent, 'Enter  present days');
            }
            else if (daypresentValue > 30 ) {
                success1 = false;
                setError1(daypresent, 'Not exceed number 30 days');
            }
            
            else {
                setSuccess1(daypresent);
            }
            return success1;
        }
    </script>
</body>
</html>