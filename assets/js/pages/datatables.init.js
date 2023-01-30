
document.addEventListener("DOMContentLoaded",function(){new DataTable("#scroll-horizontal",{scrollX:!0})}),
document.addEventListener("DOMContentLoaded",function(){new DataTable("#alternative-pagination",{pagingType:"full_numbers"})}),

document.addEventListener("DOMContentLoaded",function(){new DataTable("#button-datatables",{
    dom:"Bfrtip",paging: false,"pageLength": 15, info: false, search: false  })}),
document.addEventListener("DOMContentLoaded",function(){new DataTable("#buttons-datatables",{dom:"Bfrtip",buttons:["copy","csv","excel","print","pdf"] })});