
let products =[]

function add(e) {
    let exist = 0;
    let quantity = document.getElementById("quantity");
    let product = document.getElementById("product_selected");
    console.log(products)
    products.forEach(function (item) {
        if (item.product_id ==  product.value && quantity != 0) {
            item.quantity += parseInt(quantity.value);
               exist = 1;   
        }
    });
    console.log(exist);
    if (exist == 1) {
        renderDom();
        return;
    }
    let data = {
        product_id: product.value,
        quantity: parseInt(quantity.value),
        product_name: product.options[product.selectedIndex].text,
    };
    if (data.product_id != "" && data.quantity != "") {
        products = [...products, data];
    }
    renderDom();
     quantity.value="1";
     product.value='';
     console.log(products)
}
function renderDom() {
    let content = document.getElementById("product_in_array");
    content.innerHTML = "";
    products.forEach(function (product) {
        content.innerHTML += `
              <ol class='list-group list-group-numbered'>
                            <li class='list-group-item d-flex justify-content-between align-items-start'>
                                <div class='ms-2 me-auto'>
                                <div class='fw-bold'>${product.product_name==undefined ? product.product.name :   product.product_name }</div>
                                </div>
                                <span class='badge bg-primary rounded-pill'>${ product.quantity}</span>
                               <div >
                                <button class='btn btn-danger' type='button' onclick='delete_(${product.product_id})'><i class="ri-delete-bin-line mr-0"></i></button>
                                </div>
                            </li>
             </ol>
                    `;
    });
}
function delete_(id) {
    products = products.filter(function (product) {
        return product.product_id != id;
    });
    renderDom();
}
function update_(id) {

}   







