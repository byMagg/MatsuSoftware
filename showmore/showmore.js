function showmore(id) {
    var x = document.getElementById(id);
    var altura = "100px";

    if (x.style.maxHeight == "2000px") {
      x.style.maxHeight = altura;
    } else {
      x.style.maxHeight = "2000px";
    }
  } 