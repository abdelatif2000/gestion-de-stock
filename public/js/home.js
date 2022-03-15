//line chart :
   earningsWeek = Object.values(earningsWeek);
   clientsWeek = Object.values(clientsWeek);
   chart("chartEarnings",earningsWeek,);
   chart("chartClients",clientsWeek);
function chart(chart,data) {
  var dom = document.getElementById(chart);
var myChart = echarts.init(dom);
var app = {};
var option;
option = {
  xAxis: {
    type: "category",
    data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
  },
  yAxis: {
    type: "value",
  },
  series: [
    {
      data,
      type: "line",
    },
  ],
};
if (option && typeof option === "object") {
  myChart.setOption(option);
}
}
//date picker :
let date= $( function() {
  var dateFormat = "yy-mm-dd";
    from = $( "#startDate" )
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        changeYear:true,
        dateFormat
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate(this));
      }),
    to = $( "#endDate" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      changeYear:true,
      dateFormat
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });
  function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }
    return date;
  }
} );
//filter by datejqu :
const filterDate=(data)=>{
  console.log(data);
  $("#startDate").val("");
  $("#endDate").val("");
  $("#total-Clients").text(data.clients);
  $("#total-earnings").text("$" + data.earnings);
  $("#total-orders").text(data.orders);
  $("#content-top-product").html("");
  $("#top-clinets").html("");
  data.topProduct.forEach(element => {
      $("#content-top-product").append(`
<li class="col-lg-3 ">
<div class="card card-block card-stretch mb-0">
    <a href="${"/product/"+element.product_id}">
        <div class="card-body">
            <div class="bg-warning-light rounded " width="100%" height="60px">
                <img src="${element.product.photos[0].path}"
                    class="style-img img-fluid m-auto rounded" height="100%"
                    width="100%" alt="image">
            </div>
            <div class="style-text text-left mt-3">
                <h5 class="mb-1 nameTopProduct">${element.product.name}
                </h5>
                <p class="mb-0">${element.productSold}  Sold
                </p>
            </div>
        </div>
    </a>
</div>
</li>
  `)
  });
  $("#top-clinets").append(`
  <div class="card-transparent card-block card-stretch mb-4">
          <div class="card-header d-flex align-items-center justify-content-between p-0">
              <div class="header-title">
                  <h4 class="card-title mb-0">Best Client</h4>
              </div>
          </div>
      </div>
  `
  );
  let topClients= Object.values( data.topClients);
  topClients.forEach((element)=>{
     $("#top-clinets").append(`
        <div class="card card-block card-stretch card-height-helf">
              <div class="card-body card-item-right">
                  <a href="/client/${element.id}">
                      <div class="d-flex align-items-top">
                          <img src="images/user/1.png" class="style-img img-fluid m-auto rounded " alt="image" width="115px">
                          <div class="style-text text-left">
                              <h5 class="mb-2 ">
                                  ${element.firstName+"  "+element.lastName}
                              </h5>
                              <p style="color:black" class="mb-2 text-black">Total Order :
                                  ${element.commands_count} </p>
                              <p style="color:black" class="mb-0 text-black">Total Paid :$
                                  ${element.total_cost} </p>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
     `)    
  })
  $(".loading-data").css("display","none");
}










