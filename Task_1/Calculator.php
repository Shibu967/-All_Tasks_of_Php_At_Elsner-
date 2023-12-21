<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style>
        .error {
            color: red;
        }

        input.error {
            border-color: red;
        }
    </style>
    <style>
        /* Updated CSS */
        .container{
            background-color:#6495ED; /* Your preferred background color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for depth */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Calculator</h1>
                <form action="" method="post" id="calculatorForm">
                    <div class="mb-3">
                        <label for="first" class="form-label">First Number</label>
                        <input type="text" class="form-control" name="first" id="first" placeholder="Enter number">
                    </div>
                    <div class="mb-3">
                        <label for="second" class="form-label">Second Number</label>
                        <input type="text" class="form-control" name="second" id="second" placeholder="Enter number">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary me-2" name="operator" value="+">+</button>
                        <button type="submit" class="btn btn-secondary me-2" name="operator" value="-">-</button>
                        <button type="submit" class="btn btn-secondary me-2" name="operator" value="*">*</button>
                        <button type="submit" class="btn btn-secondary" name="operator" value="/">/</button>
                    </div>
                </form>

                <script>
                    $(document).ready(function () {
                        $('#calculatorForm').validate({
                            rules: {
                                first: {
                                    required: true,
                                    number: true
                                },
                                second: {
                                    required: true,
                                    number: true
                                }
                            },
                            messages: {
                                first: {
                                    required: "Please enter a number",
                                    number: "Please enter a valid number"
                                },
                                second: {
                                    required: "Please enter a number",
                                    number: "Please enter a valid number"
                                }
                            },
                            errorElement: 'div',
                            errorPlacement: function (error, element) {
                                error.addClass('error');
                                error.insertAfter(element);
                            },
                            highlight: function (element, errorClass, validClass) {
                                $(element).addClass(errorClass).removeClass(validClass);
                            },
                            unhighlight: function (element, errorClass, validClass) {
                                $(element).removeClass(errorClass).addClass(validClass);
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    });
                </script>

                <?php
function is_valid_number($str)
{
    return is_numeric($str) && $str !== '';
}

if (isset($_POST["operator"])) {
    $n = $_POST['first'];
    $n2 = $_POST['second'];
    $operator = $_POST["operator"];

    if (!is_valid_number($n) || !is_valid_number($n2)) {
        echo "Please enter valid numbers.";
    } else {
        if ($operator === '/' && $n2 == 0) {
            echo '<div style="color: red;">Cannot divide by zero</div>';
        } else {
            function calculator($n, $n2, $operator)
            {
                switch ($operator) {
                    case '+':
                        return $n + $n2;
                        break;

                    case '-':
                        return $n - $n2;
                        break;

                    case '*':
                        return $n * $n2;
                        break;

                    case '/':
                        return $n / $n2;
                        break;

                    default:
                        return "Invalid operator";
                        break;
                }
            }

            echo "Result: " . calculator($n, $n2, $operator);
        }
    }
}
?>
            </div>
        </div>
    </div>
</body>

</html>
