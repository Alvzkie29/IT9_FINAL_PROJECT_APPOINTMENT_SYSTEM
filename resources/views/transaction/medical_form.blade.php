<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="border shadow-sm p-3 mb-5 bg-body rounded">
            <h3 class="text-center"><b>Medical Form</b></h3>
            <div class="border mt-3"></div>
            <div class="row mt-4     justify-content-center">
                <div class="col-md-4">
                    <label for="">Fist Name</label>
                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Fist Name">
                </div>
                <div class="col-md-4">
                    <label for="">Last name</label>
                    <input type="text" class="form-control form-control-lg" id="dob" placeholder="Last Name">
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="col-md-4">
                    <label for="">Age</label>
                    <input type="number" class="form-control form-control-lg" id="dob" placeholder="Age">
                </div>
                <div class="col-md-4">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control form-control-lg">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</body>
</html>