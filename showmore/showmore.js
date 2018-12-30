function showmore(id, tam) {
    console.log(id);
    var x = document.getElementById(id);

    if (x.style.maxHeight == "2000px") {
      x.style.maxHeight = tam;
    } else {
      x.style.maxHeight = "2000px";
    }
  } 