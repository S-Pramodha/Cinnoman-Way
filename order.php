<head>
    <title>
        Order page
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>


    <style>
    body {
        background-image: url(../../assets/images/banner/ORDER2.jpg);
    
    }

    .container {
        margin-top: 60px;
        background-color: transparent;
       
    }

    .regform {
        margin-top: 60px;
        padding: 20px;
        background: #0b003b;
        border-radius: 13px;
       
    }

    .title {
        color: rgb(241, 241, 241);
    }

    .form-group {
        margin-top: 20px;
        color: rgb(255, 255, 255);
    }

    #submit {
        margin-top: 20px;
    }
    </style>


</head>

<body>


    <div class="container">
        <div class="row">
           <div class="col-lg-3"></div>
            <div class="col-lg-6">
          

                <div class="regform">
                    <center>
                        <h1 class="title">Enter your Detalis</h1>

                    </center>

                    <form class="form"
                        oninput=' password_confirmation.setCustomValidity(password.value != password_confirmation.value ? "Password Not Match" :"" )'>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Student Name</label>
                                    <input type="text" name="stu_name" id="stu_name" class="form-control input-sm"
                                        placeholder="Username">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Index Number</label>
                            <input type="text" name="stu_num" id="stu_num" class="form-control input-sm"
                                placeholder="Index Number">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="">Intake</label>
                                    <input type="text" name="intake" id="intake" class="form-control input-sm"
                                        placeholder="Intake">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                Department:
                                    <select name="province" class="province">
                                        <option value="none">Select Your Department</option>
                                        <option value="IT">Information Technology</option>
                                        <option value="QS">Quantity Surveying</option>
                                        <option value="SS">Servey Science</option>
                                        <option value="ARCHI">Architecture</option>
                                        <option value="Tech">Technology</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" class="form-control input-sm"
                                placeholder="Mobile Number">
                        </div>

                        <div class="row">
                            <div class="">
                                <div class="form-group">
                                <label for="">Write a brief description about your illness</label>
                            <input type="text" name="description" id="description" class="form-control input-sm"
                                placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="">
                                <div class="form-group">
                                    Please attached your medical prescriptions 
                                    <br><br>
                                    <form action="fileupload.php">
                                        <input type="file" id="myFile" name="filename">
                                    </form>
                                </div>
                            </div>

                        </div>                            

                    <center>
                        <input type="submit" id="submit" value="Submit" class="btn btn-info btn-warning">
                    </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>



<??>

</html>
?>