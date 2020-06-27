function addToCart(num){
    let ary =JSON.parse(localStorage.getItem("items"));
    if(ary == null){
        let itemAry = [num];
        localStorage.setItem("items",JSON.stringify(itemAry));
    }else{
        $con = ary.indexOf(num);
        if($con == -1){ // if have no
            ary.push(num);
            localStorage.setItem("items",JSON.stringify(ary));
        }
    }
    alert("Item Already Added to Cart!");
    showCartItem();// want to see auto increase
}// add to cart item
function showCartItem(){
    var ary = JSON.parse(localStorage.getItem("items"));
    // $("#cart-count").html(ary.length);
    if(ary != null){// show cart counting when click check out
        $("#cart-count").html(ary.length);
    }else{
        $("#cart-count").html(0);
    }
}
function getCartItem(){
    let ary = JSON.parse(localStorage.getItem("items"));
    return ary;
}
function deleteCartItem(id){// this is for delete
    let ary = JSON.parse(localStorage.getItem("items"));
    if(ary != null){
        ary.forEach((item)=>{
            if(item == id){
               let ind = ary.indexOf(item);
               ary.splice(ind,1);
            }
        })
    }
    localStorage.setItem("items",JSON.stringify(ary));
    showCartItem();
}
function clearCartItem(){
  localStorage.removeItem("items");
}
showCartItem();// want to show count in every page;