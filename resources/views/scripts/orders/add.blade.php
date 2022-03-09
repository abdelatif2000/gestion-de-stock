<script>
    let  quantityAvaibale= $("#quantityAvaibale");
    let  quantity= $("#quantity");
   //change the quantity :   
      $('#product_selected').on('change', function() {
             let  product=@json($products).find((item )=>{
                      return  item.product_id==this.value;
              })  
              quantityAvaibale.text(product.total_product);
              quantity.attr({
                  min:1,
                  max:product.total_product
              })     
    });
  //increase :
    $("#increase").on('click',function(){
         let quantityAvaibaleOld=Number(quantityAvaibale.text());
        if(quantityAvaibaleOld !=0){
           let oldValue=Number(quantity.val());
            quantity.val(oldValue+=1);     
            quantityAvaibale.text(quantityAvaibaleOld-=1);      
        }
    } )
    ///decrease :
    $("#decrease").on('click',function(){
                let oldValue=Number(quantity.val());
                let quantityAvaibaleOld=Number(quantityAvaibale.text());
                if(oldValue!=1){
                   quantityAvaibale.text(quantityAvaibaleOld+=1);      
                    quantity.val(oldValue-=1);       
               }
    } )
jQuery(document).on('click', "#addCommand", function(e) {
  e.preventDefault();
  if (products.length <= 0) {
       data = {
          product_id: $("#product_selected") .find(":selected").val(),
          quantity: parseInt(quantity.value),
      };
      products=[...products ,data];
      console.log(products)
  }
  //clear the inputs :
  $("#client_error").text('');
  $("#products_error").text('');
  $("#quantety_error").text('');
  let client = $('#client_id');
  //post  the order to server :
  $.ajax({
      type: 'POST',
      url: " {{ route('Command.store') }} ",
      data: {
          _token: "{{ csrf_token() }} ",
          products: products,
          client:  client.find(":selected").val() ??  client.val(),
          ref:$("#ref").val()
      },
      success: function(data) {
          products = [];
          client.value = "";
          renderDom();
          $("#success").show();
          $("#success").text(data.success);
          $(window).scrollTop(0);
      },
      error: function(data) {
          console.log(data)
          if (data.responseJSON.errors) {
              $.each(data.responseJSON.errors, function(key, value) {
                  $("#" + key + "_error").text(value[0]);
              })
            
          }
      }
  });
});
</script>