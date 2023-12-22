
var dataStatus = true;
var imgFolder = "https://www.bragherstudio.com/data/logo/";
var portfolio = [
    {
        "name": "Finapp",
        "title": "Wallet & Banking Mobile HTML Template",
        "image": "finapp.png",
        "url": "https://finapp.bragherstudio.com"
    },
    {
        "name": "Mobilekit",
        "title": "Mobile UI Kit HTML Template",
        "image": "mobilekit.png",
        "url": "https://mobilekit.bragherstudio.com"
    },
    {
        "name": "Bitter",
        "title": "Mobile HTML Template",
        "image": "bitter.png",
        "url": "https://bitter.bragherstudio.com"
    },
];


if(dataStatus === true || dataStatus == true){
    console.log("data")
}
else{
    $(".sidebar").addClass("is-hidden");
}

for (let i = 0; i < portfolio.length; i++) {
    const item = portfolio[i];
    $(".sidebarProducts .row").append(
        "<a href='"+item.url+"' class='item col-6' data-name="+item.name+" target='_blank'>"
        +
        "<img src='"+imgFolder+item.image+"' alt='"+item.name+"' class='productlogo'>"
        +
        "<strong>"+item.name+"</strong>"
        +
        "<div class='text'>"+item.title+"</div>"
        +
        "</a>"
    )
}