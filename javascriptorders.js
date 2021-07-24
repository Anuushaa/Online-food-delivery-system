function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;

  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }
  function calc(){
    var price=document.getElementById("total-price3").innerHTML;
    var number= document.getElementById("number").value;
    var total=parseFloat(price)*number;
    if(!isNaN(total))
      document.getElementById("total-price3").innerHTML=total;
  }