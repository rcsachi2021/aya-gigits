@extends('template.master')
@section('title', 'Signup')
@section('class','demo10')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    main{
        display: flex;
        justify-content: center;
    }
    #qrcode{
        display: flex;
        justify-content: center;
    }
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 5px 0;
  display: inline-block;
  border: none;
  background: #f3f4ff;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
input[type=checkbox] {
  margin-top: 16px;
}
input.largerCheckbox {
            width: 20px;
            height: 20px;
        }
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #02407c;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.form-group{
    margin: 0px 1px 13px 0px !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<main>
                <div id="qrcode" style="width:20px"></div>
            </main>
            <input type="text" placeholder="Enter Email" value="1Lbcfr7sAHTD9CgdQo3HTMTkV8LK4ZnX71." name="address" id="address" required style="text-align:center;">
<form action="{{Route('save.user')}}" method="post" id="register">
    @csrf
  <div class="container">
    
    <p>Please fill in this form to create an account.</p>
    <hr>
    <p>Your selected plan is : <strong>{{ucfirst($plan)}}</strong></p>
    <input type="hidden" name="plan" value="{{$plan}}">
    <div class="form-group">
    <label for="portfolioprice"><b>Portfolio Price</b></label>
    <input type="hidden" name="portfolio_amount" id="portfolio_amount" readonly value="{{$planDet->portfolio_amount}}">
    <input type="text" placeholder="Portfolio Price" name="portfolio_price" id="portfolio_price" readonly value="{{$planDet->portfolio_amount.' BTC'}}">
    @error('portfolio_price') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="amount"><b>Capital Amount Paying in BTC</b></label>
    
    <input type="text" placeholder="Amount" name="amount" id="amount" value="">
    @error('amount') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="amount"><b>Total Amount in BTC</b></label>
    
    <input type="text" placeholder="Total Amount" name="total_amount" id="total_amount" readonly value="">
    @error('total_amount') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="confirm"><b>Confirm if paid</b></label>
    <input type="checkbox" name="confirm" id="confirm" value="1" class="largerCheckbox">
    @error('confirm') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="name"><b>Name</b></label>
    <input type="text" name="name" id="name">
    @error('name') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email">
    @error('email') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password">
    @error('password') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_confirmation" id="confirmpassword">
    
    </div>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  </form>
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>


<script>
        var qrcode = new QRCode("qrcode",
        "1Lbcfr7sAHTD9CgdQo3HTMTkV8LK4ZnX71.");
</script>
<script>
  $(document).ready(function(){
    $("#amount").change(function(){
      portfolio_amount = $("#portfolio_amount").val();
      amount = $(this).val();
      total = parseFloat(portfolio_amount) + parseFloat(amount);
      $("#total_amount").val(total.toFixed(5));
    })
  })
</script>
@endsection