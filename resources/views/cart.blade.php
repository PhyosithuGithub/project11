@extends("layout/master")
@section("title","Triple P")
@section("content")
<input type="hidden" id="token" value="{{\App\Classes\CSRFToken::_token()}}">
<div class="container my-3">
    <table class="table table-bordered">
        <thead>
           <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
            <th>Total</th>
           </tr>
        </thead>
        <tbody id="show_result">
            {{-- Product Goes Here! --}}
        </tbody>
        @if(\App\Classes\Auth::check())
            <tr>
                <td colspan='7' style="text-align:right;" id="checkOutBtn">
                    <button class='btn btn-primary btn-sm float-right' onclick='payOut()'>Check Out</button>
                </td>
            </tr>
            {{-- Stripe Start --}}
            <tr style="visibility: hidden;" id="stripeTR">
                <td colspan="6" class="text-right">
                    <span id="paypal-button"></span>
                </td>
                <td colspan="7" class="text-right">
                    <form action="/payment/stripe" method="post" style="display:none" id="stripeForm">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{\App\Classes\SessionManager::get("publishable_key")}}"
                                data-name="Giger Shop"
                                data-description="Access for a year"
                                data-amount="500000"
                                data-image="https://files.stripe.com/files/f_test_RQEfhKuRtMqOIMBJukstlKBL"
                                data-zip-code="true"
                                data-email="{{\App\Classes\Auth::user()->email}}"
                                data-locale="auto"></script>
                    </form>
                </td>
            </tr>
        {{-- Stripe End --}}
        @else
            <tr>
                <td colspan='7' style="text-align:right;">
                    <a class='btn btn-primary btn-sm float-right' href="/user/login">Login to Checkout</a>
                </td>
            </tr>
        @endif
    </table>
</div>
@endsection
@section("script")
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
      // Configure environment
      env: 'sandbox',
      client: {
        sandbox: 'AQVrlDD55I5-KO0dHDnZXxoQBbal9uXuAuacZoxiIqDyDr4TRniqIBuAPFFBh_87Uw4KpGvlgGce_b4l',
        production: 'demo_production_client_id'
      },
      // Customize button (optional)
      locale: 'en_US',
      style: {
        size: 'small',
        color: 'gold',
        shape: 'pill',
      },
  
      // Enable Pay Now checkout flow (optional)
      commit: true,
  
      // Set up a payment
      payment: function(data, actions) {
        return actions.payment.create({
          transactions: [{
            amount: {
              total: '10.0',
              currency: 'USD'
            }
          }]
        });
      },
      // Execute the payment
      onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
          // Show a confirmation message to the buyer
          window.alert('Thank you for your purchase!');
        });
      }
    }, '#paypal-button');
  
  </script>
<script>
function loadProduct(){
    $.ajax({
        type:"POST",
        url:"/cart",
        data:{
            "cart":getCartItem(),
            "token":$("#token").val()
        },
        success:function(result){
            saveProducts(result);
        },
        errors:function(response){
            console.log(response.responseText);
        }
    });
}
function saveProducts(results){
    localStorage.setItem("products",results);
    let items = JSON.parse(localStorage.getItem("products"));
    showProducts(items);
}
function showProducts(items){
    let tb_result = "";
    let total = 0;
    items.forEach((item)=>{
        total += item.qty * item.price;
        tb_result += "<tr>";
        tb_result +=`
            <td>${item.id}</td>
            <td><img src='${item.image}' alt='img' width='80px' height='100px'/></td>
            <td>${item.name}</td>
            <td>${item.price}</td>
            <td>${item.qty} </td>
            <td>
                <i class='fa fa-plus text-primary' style='cursor:pointer;' onclick='addProductQty(${item.id})'></i>
                <i class='fa fa-minus ml-2 text-danger' style='cursor:pointer' onclick='deduceProductQty(${item.id})'></i>
                <i class='fa fa-trash text-danger ml-2' style='cursor:pointer' onclick="deleteProduct(${item.id})"></i>
            </td>
            <td>${(item.qty * item.price).toFixed(2)}</td>
        `;
        tb_result +="</tr>";
    });
        tb_result +=`
            <tr>
                <td colspan='6' style='text-align:right;'>Grand Total:</td>
                <td>${total.toFixed(2)}</td>
            </tr>
        `;
    $("#show_result").html(tb_result);
}
function addProductQty(id){
    let results =JSON.parse(localStorage.getItem("products"));
    results.forEach((result)=>{
        if(result.id === id){
            result.qty = result.qty + 1;
        }
    });
    saveProducts(JSON.stringify(results));
}
function deduceProductQty(id){
    let results = JSON.parse(localStorage.getItem("products"));
    results.forEach((result)=>{
        if(result.id === id){
            if(result.qty > 1){
                result.qty = result.qty - 1;
            }
        }
    });
    saveProducts(JSON.stringify(results));
}
function deleteProduct(id){
    // clearCartItem();
    let results = JSON.parse(localStorage.getItem("products"));
    results.forEach((result)=>{
        if(result.id === id){
            let ind = results.indexOf(result);
            results.splice(ind,1);
        }
    })
    deleteCartItem(id);
    saveProducts(JSON.stringify(results));    
}
function payOut(){
    // alert($("#token").val());
    let results = JSON.parse(localStorage.getItem("products"));
    $.ajax({
        type:"POST",
        url:"/payout",
        data:{
            "items": results,
            "token":$("#token").val()
        },
        success:function(results){
            $("#checkOutBtn").css("display","none");
            $("#stripeTR").css("visibility","visible");
            $("#stripeForm").css("display","block");
            // clearCartItem();
            // showCartItem();
            // showProducts([]);
        },
        errors:function(response){
            console.log(response.responseText);
        }
    });
}
loadProduct();
</script>
@endsection