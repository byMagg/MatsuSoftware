function toggleNav(){
    var nav = document.getElementById("nav"), maxH = "150px";

    if(nav.style.height == maxH){
        nav.style.height = "0px";
    }else{
        nav.style.height = maxH;
    }
}
 
/*
window.addEventListener("mouseup", function(event){
    if(event.target != nav && event.target.parentNode != nav){
        nav.style.height = "0px";
    }
});

*/




