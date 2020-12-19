<?php

require_once 'config/Config.php';
$user_function = new Config;

$field_name['p_status'] = 'Active';
$product = $user_function->select_with_order("products", $field_name, "p_id");
date_default_timezone_set('Asia/Jakarta');
include 'function.php';

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styless.css">
    <title>Add To Cart In PHP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="css/custome-style.css" type="text/css" rel="stylesheet">
</head>
<style>
textarea{
	width: 400px;
	height: 80px;
	background-color: #fff;
	resize: none;
}

.comment-box {
	width: 815px;
	padding: 20px;
	margin-bottom: 10px;
	border:1px solid #000;
	background-color: #fff;
	border-radius: 4px;
	position: relative;
}
 
.delete-btn {
	position: absolute;
	top: 0px;
	right: 0px;
}

</style>
<body>
    <div id="header123">
        <?php include_once('header.php'); ?>
    </div>

    <div class="container-fluid">
        <div class="row flex-box-set">
            <?php foreach($product as $product_data){ ?>        
                <div class="card text-center box-card-set">
                    <img src="images/<?php echo $product_data['p_image']; ?>" class="card-img-top box-image-set img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php if(strlen($product_data['p_name']) > 50){ echo substr($product_data['p_name'],0,50).'....'; }else{ echo $product_data['p_name']; } ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6">Price : </div>
                                <div class="col-6"><?php echo $product_data['p_amount']; ?></div>
                            </div>
                        </li>
                        <form method="post" class="submitpro">
                        <li class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label for="staticEmail" class="col-6 col-form-label">Quantity : </label>
                                    <div class="col-6">
                                        <input type="number" class="form-control pro-qty" min="1" max="100" value="1" required>
                                    </div>
                                </div>
                            
                        </li>
                        <li class="list-group-item">
                            <button type="submit" class="btn btn-sm bg-danger text-light pc_data" data-dataid="<?php echo $product_data['p_number']; ?>">Add To Cart</button>
                        </li>
                        </form>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
    <section class="contact" id="contact">
        <div class="max-width">
                <div class="column left">
				<h1 style="color:black">Comment Section</h1><br>
                <?php
				echo "<form method='POST' action'".setComments($conn).">
						<input name='uid' placeholder='Nama Anda'> <br><br>
						<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
						<textarea rows='5' col='30' 
						name ='message' 
						placeholder='Apa yang anda pikirkan...'></textarea><br>
						<button style='margin-bottom: 60px' 
						class='btn btn-sm bg-danger text-light pc_data' 
						type='submit' name='commentSubmit'>Comment</button><br>
					</form>";
				
				getComments($conn);
	
					
				?>
                    
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    
        $(document).ready(function (){
            $('.submitpro').on('submit', function(e){
                e.preventDefault();
                var product_num = $(this).find('.pc_data').data('dataid');
                var product_qty = $(this).find('.pro-qty').val();
                //alert("product Num = "+product_num+" Product Qty "+product_qty);
                if(product_num == '' || product_qty == ''){
                    alert("Data Key Not Found");
                    console.log("Data Key Not Found");
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "ajax/cart-process.php",
                        data: { 'product_num' : product_num, 'product_qty' : product_qty },
                        success: function (response) {
                            var get_val = JSON.parse(response);
                            if(get_val.status == 100){
                                alert(get_val.msg);
                                console.log(get_val.msg);
                                location.reload();
                            }
                            else if(get_val.status == 103){
                                alert(get_val.msg);
                                console.log(get_val.msg);
                            }
                            else{
                                console.log(get_val.msg);
                            }
                        }
                    });
                }
            });
        });
    
    </script>
	<footer>
        <span>Created By <a href="https://www.unsrat.ac.id/">Unsrat </a> <span class="far fa-copyright"></span> 2020 Teknik Informatika </span>
    </footer>

</body>

</html>